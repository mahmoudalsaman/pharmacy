app.controller('CategoryController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings) {
	var vm = this;

	vm.formCategory = {};

	vm.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
		return getTags();
	})
	.withPaginationType('full_numbers');

	vm.dtColumns = [
		DTColumnBuilder.newColumn('tag_id').withTitle('ID'),
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

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/tags')
			.then(function(response) {
				defer.resolve(response.data.active_tags);
			}, function(error) {
				alert('Error fetching tag data!');
			});

		return defer.promise;
	};
});