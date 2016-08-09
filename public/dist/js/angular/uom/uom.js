app.controller('UomController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings, tableService) {
	var vm = this;

	vm.isAdd = true;
	vm.formUom = {};

	vm.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
		return getTags();
	})
	.withPaginationType('full_numbers')
	.withSelect({
        style:    'os',
        selector: 'td:first-child'
    });

	vm.dtColumns = [
		DTColumnBuilder.newColumn(null).withTitle('')
            .notSortable()
            .withClass('select-checkbox')
            // Need to define the mRender function, otherwise we get a [Object Object]
            .renderWith(function() {
            	return '';
        	}),
		DTColumnBuilder.newColumn('unit_of_measurement_id').withTitle('ID'),
		DTColumnBuilder.newColumn('name').withTitle('Name'),
		DTColumnBuilder.newColumn('abbreviation').withTitle('Unit of Measurement'),
		DTColumnBuilder.newColumn('created_at').withTitle('Created At'),
		DTColumnBuilder.newColumn('updated_at').withTitle('Updated At')
	];

	vm.dtOptions.drawCallback = function() {
    	var table = this.DataTable();

    	tableService.setTableInstance(table);
    };

	$('#uom_modal').on('hidden.bs.modal', function() {
		vm.dtInstance.changeData(vm.newPromise);

		vm.isAdd = true;
		vm.formUom = {};
	});

	vm.newPromise = getTags;
	vm.dtInstance = {};

	function getTags() {
		var defer = $q.defer();

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/uoms')
			.then(function(response) {
				defer.resolve(response.data.active_uoms);
			}, function(error) {
				alert('Error fetching unit of measurement data!');
			});

		return defer.promise;
	};

	vm.showUomDataOnClick = function() {
		vm.isAdd = false;

		var uomId = tableService.getTableInstance().row({selected: true}).data().unit_of_measurement_id;

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/uoms/' + uomId + '/edit')
			.then(function(response) {
				vm.formUom.uomName = response.data.uom_details.name;
				vm.formUom.uomAbbreviation = response.data.uom_details.abbreviation;

				$('#uom_modal').modal('show');
			}, function(error) {
				alert("Error fetching unit of measurement data");
			});
	}

	vm.uomOnSubmit = function(isAdd) {
		if(isAdd) {
			$http({
				url: appSettings.BASE_URL + 'pharmacy/api/v1/uoms',
				method: 'POST',
				data: $.param({
					'name': vm.formUom.uomName,
					'abbreviation': vm.formUom.uomAbbreviation
				}),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(response) {
				$('#uom_modal').modal('hide');

				alert(response.data.message);
			}, function(response) {
				alert(response.data.message);
			});
		} else {
			var uomId = tableService.getTableInstance().row({selected: true}).data().unit_of_measurement_id;

			$http({
				url: appSettings.BASE_URL + 'pharmacy/api/v1/uoms/' + uomId,
				method: 'PUT',
				data: $.param({
					'name': vm.formUom.uomName,
					'abbreviation': vm.formUom.uomAbbreviation
				}),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(response) {
				$('#uom_modal').modal('hide');

				alert(response.data.message);
			}, function(response) {
				alert(response.data.message);
			});
		}
	};



	vm.deleteUonOnClick = function() {
		var uomIds = [];
		var selectedUomData = tableService.getTableInstance().rows({selected: true}).data();

		console.log(selectedUomData.count());
		for(var i = 0; i < selectedUomData.count(); i++) {
			uomIds.push(selectedUomData[i].unit_of_measurement_id);
		}
		$http({
			url: appSettings.BASE_URL + 'pharmacy/api/v1/uoms/1?uomIds=' + JSON.stringify(uomIds),
			method: 'DELETE',
			data: $.param({
				'_token': appSettings.CSRF_TOKEN,
			})
		}).then(function(response) {
			vm.dtInstance.changeData(vm.newPromise);

			alert(response.data.message);
		}, function(response) {
			alert(response.data.message);
		});
	};
});