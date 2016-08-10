app.controller('CustomerController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings, tableService) {
	var vm = this;

	vm.isAdd = true;
	vm.formCustomer = {};

	vm.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
		return getCustomers();
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

	$('#customer_modal').on('hidden.bs.modal', function() {
		vm.dtInstance.changeData(vm.newPromise);
		vm.isAdd = true;
		vm.formCustomer = {};
	});

	vm.newPromise = getCustomers;
	vm.dtInstance = {};

	function getCustomers() {
		var defer = $q.defer();

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/users?userType=2')
			.then(function(response) {
				defer.resolve(response.data.active_users);
			}, function(error) {
				alert('Error fetching customer data!');
			});

		return defer.promise;
	};

	vm.showCustomerDataOnClick = function() {
		vm.isAdd = false;

		var employeeId = tableService.getTableInstance().row({selected: true}).data().user_id;

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/users/' + employeeId + '/edit?userType=2')
			.then(function(response) {
				console.log(response.data.user_details);
				vm.formCustomer.firstName = response.data.user_details.first_name;
				vm.formCustomer.middleName = response.data.user_details.middle_name;
				vm.formCustomer.lastName = response.data.user_details.last_name;
				vm.formCustomer.birthDate = response.data.user_details.date_of_birth;
				vm.formCustomer.phoneNumber = response.data.user_details.cell_number;

				$('#customer_modal').modal('show');
			}, function(error) {
				alert("Error fetching customer data");
			});
	}

	vm.customerOnSubmit = function(isAdd) {
		if(isAdd) {
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
					'password': 'employee12345'
				}),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(response) {
				$('#customer_modal').modal('hide');

				alert(response.data.message);
			}, function(response) {
				alert(response.data.message);
			});
		} else {
			var employeeId = tableService.getTableInstance().row({selected: true}).data().user_id;

			$http({
				url: appSettings.BASE_URL + 'pharmacy/api/v1/users/' + employeeId + '?userType=2',
				method: 'PUT',
				data: $.param({
					'user_type': 1,
					'first_name': vm.formCustomer.firstName,
					'middle_name': vm.formCustomer.middleName,
					'last_name': vm.formCustomer.lastName,
					'date_of_birth': vm.formCustomer.birthDate,
					'cell_number': vm.formCustomer.phoneNumber,
					'password': 'employee12345'
				}),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(response) {
				$('#customer_modal').modal('hide');

				alert(response.data.message);
			}, function(response) {
				alert(response.data.message);
			});
		}
	};



	vm.deleteCustomerOnClick = function() {
		var userIds = [];
		var selectedCategoryData = tableService.getTableInstance().rows({selected: true}).data();

		console.log(selectedCategoryData.count());
		for(var i = 0; i < selectedCategoryData.count(); i++) {
			userIds.push(selectedCategoryData[i].user_id);
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