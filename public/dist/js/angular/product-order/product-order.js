app.controller('ProductOrderController', function($http, appSettings) {
	var vm = this;

	vm.quantity = 0;
	vm.totalAmount = 0;
	vm.productId;
	vm.accumAmount = 0;

	$('#add_to_cart').on('hidden.bs.modal', function() {
		vm.quantity = 0;
		vm.totalAmount = 0; 
	});

	$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/categories')
		.then(function(response) {
			vm.categories = response.data.active_categories;
		}, function(response) {
			alert(response.data.message);
		});

	$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/products')
		.then(function(response) {
			vm.products = response.data.active_products;
		}, function(response) {
			alert(response.data.message);
		});

	vm.formatProductPrice = function(price) {
		return price + 'Php';
	}

	vm.buyOnClick = function(productId, price, currentStock) {
		vm.productId = productId;
		vm.accumAmount = price;
		vm.currentStock = currentStock;

		$('#add_to_cart').modal('show');
	}

	vm.quantityOnChange = function() {
		vm.totalAmount = vm.accumAmount * vm.quantity;
	}

	vm.productOrderOnSubmit = function() {
		if(vm.quantity > vm.currentStock) {
			alert('Not enough item stock! (Maximum stock: ' + vm.currentStock + ')');
		} else if(vm.quantity <= 0) {
			alert('Invalid quantity input!');
		} else {
			$http({
				url: appSettings.BASE_URL + 'pharmacy/api/v1/carts',
				method: 'POST',
				data: $.param({
					'product_id': vm.productId,
					'quantity': vm.quantity
				}),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(response) {
				$('#add_to_cart').modal('hide');

				alert(response.data.message);
			}, function(response) {
				alert(response.data.message);
			});
		}
	}

	vm.categoryonChange = function() {
		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/products?categoryId=' + vm.category.category_id)
			.then(function(response) {
				vm.products = response.data.active_products;
			}, function(error) {
				alert(error.data.message);
			})
	}
});