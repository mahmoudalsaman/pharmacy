app.controller('BranchController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings, tableService) {
	var vm = this;

	vm.isAdd = true;

	vm.formBranch = {};

	vm.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
		return getBranches();
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
            .renderWith(function() {return '';}),
		DTColumnBuilder.newColumn('branch_id').withTitle('Branch ID'),
		DTColumnBuilder.newColumn('branch_id').withTitle('Image'),
		DTColumnBuilder.newColumn('name').withTitle('Branch Name'),
		DTColumnBuilder.newColumn('description').withTitle('Description'),
		DTColumnBuilder.newColumn('address').withTitle('Address'),
		DTColumnBuilder.newColumn('created_at').withTitle('Created At'),
		DTColumnBuilder.newColumn('updated_at').withTitle('Updated At')
	];

	vm.dtOptions.drawCallback = function() {
    	var table = this.DataTable();

    	tableService.setTableInstance(table);
    };

	$('#branch_modal').on('hidden.bs.modal', function() {
		vm.dtInstance.changeData(vm.newPromise);
		vm.isAdd = true;
		vm.formBranch = {};
	});

	vm.newPromise = getBranches;
	vm.dtInstance = {};

	function getBranches() {
		var defer = $q.defer();

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/branches')
			.then(function(response) {
				defer.resolve(response.data.active_branches);
			}, function(error) {
				alert('Error fetching branch data!');
			});

		return defer.promise;
	};

	vm.showBranchDataOnClick = function() {
		vm.isAdd = false;

		var branchId = tableService.getTableInstance().row({selected: true}).data().branch_id;

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/branches/' + branchId + '/edit')
			.then(function(response) {
				var branchDetails = response.data.branch_details;

				vm.formBranch.branchName = branchDetails.name;
				vm.formBranch.branchDescription = branchDetails.description;
				vm.formBranch.branchAddress = branchDetails.address;

				$('#branch_modal').modal('show');

				console.log(response.data.branch_details);
			}, function(error) {
				alert("Error fetching branch data");
			});
	}

	vm.branchOnSubmit = function(isAdd) {
		if(isAdd) {
			$http({
				url: appSettings.BASE_URL + 'pharmacy/api/v1/branches',
				method: 'POST',
				data: $.param({
					'name': vm.formBranch.branchName,
					'description': vm.formBranch.branchDescription,
					'address': vm.formBranch.branchAddress
				}),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(response) {
				$('#branch_modal').modal('hide');

				alert(response.data.message);
			}, function(response) {
				alert(response.data.message);
			});
		} else {
			var branchId = tableService.getTableInstance().row({selected: true}).data().branch_id;

			$http({
				url: appSettings.BASE_URL + 'pharmacy/api/v1/branches/' + branchId,
				method: 'PUT',
				data: $.param({
					'name': vm.formBranch.branchName,
					'description': vm.formBranch.branchDescription,
					'address': vm.formBranch.branchAddress
				}),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(response) {
				$('#branch_modal').modal('hide');

				alert(response.data.message);
			}, function(response) {
				alert(response.data.message);
			});	
		}
	};

	vm.deleteBranchOnClick = function() {
		var branchIds = [];
		var selectedBranchData = tableService.getTableInstance().rows({selected: true}).data();

		console.log(selectedBranchData.count());
		for(var i = 0; i < selectedBranchData.count(); i++) {
			branchIds.push(selectedBranchData[i].branch_id);
		}

		$http({
			url: appSettings.BASE_URL + 'pharmacy/api/v1/branches/1?branchIds=' + JSON.stringify(branchIds),
			method: 'DELETE',
			data: $.param({
				'_token': appSettings.CSRF_TOKEN,
			})
		}).then(function(response) {
			$('#branch_modal').modal('hide');

			alert(response.data.message);
		}, function(response) {
			alert(response.data.message);
		});
	};
});