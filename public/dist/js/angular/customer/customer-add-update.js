app.controller('CustomerAddUpdateController', function($http, appSettings) {
	var vm = this;

	vm.customerOnSubmit = function() {
		$http({
			url: appSettings.BASE_URL + 'pharmacy/api/v1/users?userType=2',
			method: 'POST',
			data: $.param({
				'user_type': 2,
				'first_name': vm.formCustomer.firstName,
				'middle_name': vm.formCustomer.middleName,
				'last_name': vm.formCustomer.lastName,
				'date_of_birth': vm.formCustomer.birthDate,
				'cell_number': vm.formCustomer.phoneNumber,
				'password': 'customer12345'
			}),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(function(response) {
			$('#customer_modal').modal('hide');
			vm.formCustomer = null;

			alert(response.data.message);
		}, function(response) {
			alert(response.data.message);
		});
	};
})