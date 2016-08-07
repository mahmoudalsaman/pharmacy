app.controller('ProductController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings) {
	var vm = this;

	vm.formProduct = {};

	vm.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
		return getProducts();
	})
	.withPaginationType('full_numbers');

	vm.dtColumns = [
		DTColumnBuilder.newColumn('product_id').withTitle('ID'),
		DTColumnBuilder.newColumn('product_id').withTitle('Image'),
		DTColumnBuilder.newColumn('brand_name').withTitle('Brand'),
		DTColumnBuilder.newColumn('tag_name').withTitle('Category'),
		DTColumnBuilder.newColumn('product_name').withTitle('Name'),
		DTColumnBuilder.newColumn('description').withTitle('Description'),
		DTColumnBuilder.newColumn('price').withTitle('Price'),
		DTColumnBuilder.newColumn('created_at').withTitle('Created At'),
		DTColumnBuilder.newColumn('updated_at').withTitle('Updated At')
	];

	$('#product_modal').on('hidden.bs.modal', function() {
		vm.dtInstance.changeData(vm.newPromise);
	});

	vm.newPromise = getProducts;
	vm.dtInstance = {};

	function getProducts() {
		var defer = $q.defer();

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/products')
			.then(function(response) {
				defer.resolve(response.data.active_products);
			}, function(error) {
				alert('Error fetching product data!');
			});

		return defer.promise;
	};
});