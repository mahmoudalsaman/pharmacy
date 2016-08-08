app.controller('CategoryController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings) {
	var vm = this;

	vm.isOneRowSelected = false;
	vm.isManyRowSelected = false;

	vm.formCategory = {};

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
		DTColumnBuilder.newColumn('category_id').withTitle('ID'),
		DTColumnBuilder.newColumn('name').withTitle('Name'),
		DTColumnBuilder.newColumn('created_at').withTitle('Created At'),
		DTColumnBuilder.newColumn('updated_at').withTitle('Updated At')
	];

	$('#category_modal').on('hidden.bs.modal', function() {
		vm.dtInstance.changeData(vm.newPromise);
	});

	vm.newPromise = getTags;
	vm.dtInstance = {};

	function getTags() {
		var defer = $q.defer();

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/categories')
			.then(function(response) {
				defer.resolve(response.data.active_categories);
			}, function(error) {
				alert('Error fetching tag data!');
			});

		return defer.promise;
	};
});