app.controller('BranchController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings) {
	var vm = this;

	vm.formBranch = {};

	vm.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
		return getBranches();
	})
	.withPaginationType('full_numbers');

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

	$('#branch_modal').on('hidden.bs.modal', function() {
		vm.dtInstance.changeData(vm.newPromise);
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
});