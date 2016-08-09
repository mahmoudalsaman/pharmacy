app.controller('BrandController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings, tableService) {
	var vm = this;

	vm.isAdd = true;
	vm.formBrand = {};

	vm.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
		return getBrands();
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
		DTColumnBuilder.newColumn('brand_id').withTitle('ID'),
		DTColumnBuilder.newColumn('brand_id').withTitle('Image'),
		DTColumnBuilder.newColumn('name').withTitle('Name'),
		DTColumnBuilder.newColumn('description').withTitle('Description'),
		DTColumnBuilder.newColumn('created_at').withTitle('Created At'),
		DTColumnBuilder.newColumn('updated_at').withTitle('Updated At')
	];

	vm.dtOptions.drawCallback = function() {
    	var table = this.DataTable();

    	tableService.setTableInstance(table);
    };

	$('#brand_modal').on('hidden.bs.modal', function() {
		vm.dtInstance.changeData(vm.newPromise);

		vm.isAdd = true;
		vm.formBrand = {};
	});

	vm.newPromise = getBrands;
	vm.dtInstance = {};

	function getBrands() {
		var defer = $q.defer();

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/brands')
			.then(function(response) {
				defer.resolve(response.data.active_brands);
			}, function(error) {
				alert('Error fetching brand data!');
			});

		return defer.promise;
	};

	vm.showBrandDataOnClick = function() {
		vm.isAdd = false;

		var brandId = tableService.getTableInstance().row({selected: true}).data().brand_id;

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/brands/' + brandId + '/edit')
			.then(function(response) {
				vm.formBrand.brandName = response.data.brand_details.name;
				vm.formBrand.brandDescription = response.data.brand_details.description;

				$('#brand_modal').modal('show');
			}, function(error) {
				alert("Error fetching brand data");
			});
	}

	vm.brandOnSubmit = function(isAdd) {
		if(isAdd) {
			$http({
				url: appSettings.BASE_URL + 'pharmacy/api/v1/brands',
				method: 'POST',
				data: $.param({
					'name': vm.formBrand.brandName,
					'description': vm.formBrand.brandDescription
				}),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(response) {
				$('#brand_modal').modal('hide');

				alert(response.data.message);
			}, function(response) {
				alert(response.data.message);
			});
		} else {
			var brandId = tableService.getTableInstance().row({selected: true}).data().brand_id;

			$http({
				url: appSettings.BASE_URL + 'pharmacy/api/v1/brands/' + brandId,
				method: 'PUT',
				data: $.param({
					'name': vm.formBrand.brandName,
					'description': vm.formBrand.brandDescription
				}),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(response) {
				$('#brand_modal').modal('hide');

				alert(response.data.message);
			}, function(response) {
				alert(response.data.message);
			});
		}
	};


	vm.deleteBrandOnClick = function() {
		var brandIds = [];
		var selectedBrandData = tableService.getTableInstance().rows({selected: true}).data();

		console.log(selectedBrandData.count());
		for(var i = 0; i < selectedBrandData.count(); i++) {
			brandIds.push(selectedBrandData[i].brand_id);
		}
		$http({
			url: appSettings.BASE_URL + 'pharmacy/api/v1/brands/1?brandIds=' + JSON.stringify(brandIds),
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