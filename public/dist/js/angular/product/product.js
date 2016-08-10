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
		DTColumnBuilder.newColumn('category_name').withTitle('Category'),
		DTColumnBuilder.newColumn('product_name').withTitle('Name'),
		DTColumnBuilder.newColumn('is_prescription').withTitle('Prescription Medicine')
			.renderWith(function(data, type, full) {
				return full.is_prescription ? 'Yes' : 'No';
			}),
		DTColumnBuilder.newColumn('amount').withTitle('Dosage Amount'),
		DTColumnBuilder.newColumn('previous_value').withTitle('Previous Stock'),
		DTColumnBuilder.newColumn('current_value').withTitle('Current Stock'),
		DTColumnBuilder.newColumn('abbreviation').withTitle('Unit of Measurement'),
		DTColumnBuilder.newColumn('description').withTitle('Description')
			.renderWith(function(data, type, full) {
				return full.description != null ? full.description : '---';
			}),
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

	function submitForm(url, httpVerb) {
		$http({
				url: url,
				method: httpVerb,
				data: $.param({
					'name': vm.formProduct.productName,
					'description': vm.formProduct.productDescription,
					'price': vm.formProduct.productPrice,
					'category_id_fk': vm.formProduct.category.category_id,
					'is_prescription': vm.formProduct.isPrescriptionMed ? 1 : 0,
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

	vm.productOnSubmit = function(isAdd) {
		if(isAdd) {
			submitForm(appSettings.BASE_URL + 'pharmacy/api/v1/products', 'POST');
		} else {
			var productId = tableService.getTableInstance().row({selected: true}).data().product_id;

			submitForm(appSettings.BASE_URL + 'pharmacy/api/v1/products/' + productId, 'PUT');
		}
	};

	$window.onload = function() {
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



	vm.deleteProductOnClick = function() {
		var productIds = [];
		var selectedProductData = tableService.getTableInstance().rows({selected: true}).data();

		console.log(selectedProductData.count());
		for(var i = 0; i < selectedProductData.count(); i++) {
			productIds.push(selectedProductData[i].product_id);
		}

		$http({
			url: appSettings.BASE_URL + 'pharmacy/api/v1/products/1?productIds=' + JSON.stringify(productIds),
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