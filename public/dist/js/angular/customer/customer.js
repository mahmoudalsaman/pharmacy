app.controller('CustomerController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings) {
	var vm = this;

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

	$('#customer_modal').on('hidden.bs.modal', function() {
		vm.dtInstance.changeData(vm.newPromise);
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
});