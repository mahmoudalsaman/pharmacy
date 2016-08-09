app.controller('ProductController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings, tableService, $window) {
	var vm = this;

	vm.isAdd = true;
	vm.formProduct = {};

	vm.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
		return getProducts();
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
		DTColumnBuilder.newColumn('product_id').withTitle('ID'),
		DTColumnBuilder.newColumn('product_id').withTitle('Image'),
		DTColumnBuilder.newColumn('brand_name').withTitle('Brand'),
		DTColumnBuilder.newColumn('category_name').withTitle('Category'),
		DTColumnBuilder.newColumn('product_name').withTitle('Name'),
		DTColumnBuilder.newColumn('amount').withTitle('Dosage Amount'),
		DTColumnBuilder.newColumn('previous_value').withTitle('Previous Stock'),
		DTColumnBuilder.newColumn('current_value').withTitle('Current Stock'),
		DTColumnBuilder.newColumn('abbreviation').withTitle('Unit of Measurement'),
		DTColumnBuilder.newColumn('description').withTitle('Description'),
		DTColumnBuilder.newColumn('price').withTitle('Price'),
		DTColumnBuilder.newColumn('created_at').withTitle('Created At'),
		DTColumnBuilder.newColumn('updated_at').withTitle('Updated At')
	];

	vm.dtOptions.drawCallback = function() {
    	var table = this.DataTable();

    	tableService.setTableInstance(table);
    };

	$('#product_modal').on('hidden.bs.modal', function() {
		vm.dtInstance.changeData(vm.newPromise);

		vm.isAdd = true;
		vm.formProduct = {};
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

	vm.showProductDataOnClick = function() {
		vm.isAdd = false;

		var productId = tableService.getTableInstance().row({selected: true}).data().product_id;

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/products/' + productId + '/edit')
			.then(function(response) {
				vm.formProduct.productName = response.data.product_details.product_name;
				vm.formProduct.productDescription = response.data.product_details.description;
				vm.formProduct.productPrice = response.data.product_details.price;
				vm.formProduct.dosageAmount = response.data.product_details.amount;

				$('#product_modal').modal('show');
			}, function(error) {
				alert("Error fetching product data");
			});
	}

	vm.productOnSubmit = function(isAdd) {
		if(isAdd) {
			$http({
				url: appSettings.BASE_URL + 'pharmacy/api/v1/products',
				method: 'POST',
				data: $.param({
					'name': vm.formProduct.productName,
					'brand_id_fk': vm.formProduct.brand.brand_id,
					'description': vm.formProduct.productDescription,
					'price': vm.formProduct.productPrice,
					'category_id_fk': vm.formProduct.category.category_id,
					'amount': vm.formProduct.dosageAmount,
					'unit_of_measurement_id_fk': vm.formProduct.uom.unit_of_measurement_id,
					'quantity': vm.formProduct.quantity
				}),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(response) {
				$('#product_modal').modal('hide');

				alert(response.data.message);
			}, function(response) {
				alert(response.data.message);
			});
		} else {
			var productId = tableService.getTableInstance().row({selected: true}).data().product_id;

			$http({
				url: appSettings.BASE_URL + 'pharmacy/api/v1/products/' + productId,
				method: 'PUT',
				data: $.param({
					'name': vm.formProduct.productName,
					'brand_id_fk': vm.formProduct.brand.brand_id,
					'description': vm.formProduct.productDescription,
					'price': vm.formProduct.productPrice,
					'category_id_fk': vm.formProduct.category.category_id,
					'amount': vm.formProduct.dosageAmount,
					'unit_of_measurement_id_fk': vm.formProduct.uom.unit_of_measurement_id,
					'quantity': vm.formProduct.quantity
				}),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(response) {
				$('#product_modal').modal('hide');

				alert(response.data.message);
			}, function(response) {
				alert(response.data.message);
			});
		}
	};

	$window.onload = function() {
		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/brands')
			.then(function(response) {
				vm.brands = response.data.active_brands;
			}, function(response) {
				alert(response.data.message);
			});

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/categories')
			.then(function(response) {
				vm.categories = response.data.active_categories;
			}, function(response) {
				alert(response.data.message);
			});

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/uoms')
			.then(function(response) {
				vm.uoms = response.data.active_uoms;
			}, function(response) {
				alert(response.data.message);
			});		
	};
});