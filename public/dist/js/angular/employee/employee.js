app.controller('EmployeeController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings, $window, tableService) {
	var vm = this;

	vm.isAdd = true;
	vm.formEmployee = {};

	vm.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
		return getEmployees();
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
		DTColumnBuilder.newColumn('user_id').withTitle('ID'),
		DTColumnBuilder.newColumn('user_id').withTitle('Image'),
		DTColumnBuilder.newColumn('first_name').withTitle('First Name'),
		DTColumnBuilder.newColumn('middle_name').withTitle('Middle Name'),
		DTColumnBuilder.newColumn('last_name').withTitle('Last Name'),
		DTColumnBuilder.newColumn('date_of_birth').withTitle('Birth Date'),
		DTColumnBuilder.newColumn('cell_number').withTitle('Cellphone Number'),
		DTColumnBuilder.newColumn('created_at').withTitle('Created At'),
		DTColumnBuilder.newColumn('updated_at').withTitle('Updated At')
	];

	vm.dtOptions.drawCallback = function() {
    	var table = this.DataTable();

    	tableService.setTableInstance(table);
    };

	$('#employee_modal').on('hidden.bs.modal', function() {
		vm.dtInstance.changeData(vm.newPromise);

		vm.isAdd = true;
	});

	vm.newPromise = getEmployees;
	vm.dtInstance = {};

	function getEmployees() {
		var defer = $q.defer();

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/users?userType=1')
			.then(function(response) {
				defer.resolve(response.data.active_users);
			}, function(error) {
				alert('Error fetching employee data!');
			});

		return defer.promise;
	};

	$window.onload = function() {
		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/branches')
		.then(function(response) {
			vm.branches = response.data.active_branches;
		}, function(response) {
			alert(response.data.message);
		});
	};

	vm.showEmployeeDataOnClick = function() {
		vm.isAdd = false;

		var employeeId = tableService.getTableInstance().row({selected: true}).data().user_id;

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/users/' + employeeId + '/edit?userType=1')
			.then(function(response) {
				console.log(response.data.user_details);
				vm.formEmployee.firstName = response.data.user_details.first_name;
				vm.formEmployee.middleName = response.data.user_details.middle_name;
				vm.formEmployee.lastName = response.data.user_details.last_name;
				vm.formEmployee.branch = response.data.user_details.name;
				vm.formEmployee.birthDate = response.data.user_details.date_of_birth;
				vm.formEmployee.phoneNumber = response.data.user_details.cell_number;

				$('#employee_modal').modal('show');
			}, function(error) {
				alert("Error fetching employee data");
			});
	}

	vm.employeeOnSubmit = function(isAdd) {
		if(isAdd) {
			$http({
				url: appSettings.BASE_URL + 'pharmacy/api/v1/users?userType=1',
				method: 'POST',
				data: $.param({
					'branch_id_fk': vm.formEmployee.branch.branch_id,
					'user_type': 1,
					'first_name': vm.formEmployee.firstName,
					'middle_name': vm.formEmployee.middleName,
					'last_name': vm.formEmployee.lastName,
					'date_of_birth': vm.formEmployee.birthDate,
					'cell_number': vm.formEmployee.phoneNumber,
					'password': 'employee12345'
				}),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(response) {
				$('#employee_modal').modal('hide');
				vm.formEmployee = null;

				alert(response.data.message);
			}, function(response) {
				alert(response.data.message);
			});
		} else {
			var employeeId = tableService.getTableInstance().row({selected: true}).data().user_id;

			$http({
				url: appSettings.BASE_URL + 'pharmacy/api/v1/users/' + employeeId + '?userType=1',
				method: 'PUT',
				data: $.param({
					'branch_id_fk': vm.formEmployee.branch.branch_id,
					'user_type': 1,
					'first_name': vm.formEmployee.firstName,
					'middle_name': vm.formEmployee.middleName,
					'last_name': vm.formEmployee.lastName,
					'date_of_birth': vm.formEmployee.birthDate,
					'cell_number': vm.formEmployee.phoneNumber,
					'password': 'employee12345'
				}),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(response) {
				$('#employee_modal').modal('hide');
				vm.formEmployee = null;

				alert(response.data.message);
			}, function(response) {
				alert(response.data.message);
			});
		}
	};



	vm.deleteEmployeeOnClick = function() {
		var userIds = [];
		var selectedUserData = tableService.getTableInstance().rows({selected: true}).data();

		console.log(selectedUserData.count());
		for(var i = 0; i < selectedUserData.count(); i++) {
			userIds.push(selectedUserData[i].user_id);
		}

		$http({
			url: appSettings.BASE_URL + 'pharmacy/api/v1/users/1?userIds=' + JSON.stringify(userIds),
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