app.controller('EmployeeAddUpdateController', function($http, appSettings) {
	var vm = this;

	vm.employeeOnSubmit = function() {
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
	};
})