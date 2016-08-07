app.controller('ProductAddUpdateController', function($http, appSettings, $window) {
	var vm = this;

	vm.productOnSubmit = function() {
		$http({
			url: appSettings.BASE_URL + 'pharmacy/api/v1/products',
			method: 'POST',
			data: $.param({
				'name': vm.formProduct.productName,
				'brand_id_fk': vm.formProduct.brand.brand_id,
				'description': vm.formProduct.productDescription,
				'price': vm.formProduct.productPrice,
				'tags': [vm.formProduct.category.tag_id]
			}),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(function(response) {
			$('#product_modal').modal('hide');
			vm.formBranch = null;

			alert(response.data.message);
		}, function(response) {
			alert(response.data.message);
		});
	};

	$window.onload = function() {
		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/brands')
			.then(function(response) {
				vm.brands = response.data.active_brands;
			}, function(response) {
				alert(response.data.message);
			});

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/tags')
			.then(function(response) {
				vm.categories = response.data.active_tags;
			}, function(response) {
				alert(response.data.message);
			});
	};
})