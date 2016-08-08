app.controller('EmployeeController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings, $window) {
	var vm = this;

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

	$('#employee_modal').on('hidden.bs.modal', function() {
		vm.dtInstance.changeData(vm.newPromise);
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
});