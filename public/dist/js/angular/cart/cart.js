app.controller('CartController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings, $window, tableService) {
	var vm = this;

	vm.formUserCart = {};

	vm.isPickUp = true;
	vm.totalAmountDueUntouched = 0;

	vm.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
		return getUserCart();
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
    	DTColumnBuilder.newColumn('customer_cart_id').withTitle('ID')
			.notSortable()
			.notVisible(),
		DTColumnBuilder.newColumn('product_id').withTitle('Product ID'),
		DTColumnBuilder.newColumn('name').withTitle('Product Name'),
		DTColumnBuilder.newColumn('is_prescription').withTitle('Prescription Medicine')
			.renderWith(function(data, type, full) {
				return full.is_prescription ? 'Yes' : 'No';
			}),
		DTColumnBuilder.newColumn('description').withTitle('Product Description')
			.renderWith(function(data, type, full) {
				return full.description != null ? full.description : '---';
			}),
		DTColumnBuilder.newColumn('price').withTitle('Product Price'),
		DTColumnBuilder.newColumn('quantity').withTitle('Quantity Ordered'),
		DTColumnBuilder.newColumn('subtotal').withTitle('Subtotal')
	];

	vm.dtOptions.drawCallback = function() {
    	var table = this.DataTable();

    	tableService.setTableInstance(table);
    };

	$('#cart').on('hidden.bs.modal', function() {
		vm.dtInstance.changeData(vm.newPromise);
	});

	vm.newPromise = getUserCart;
	vm.dtInstance = {};

	function getUserCart() {
		var defer = $q.defer();

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/carts')
			.then(function(response) {
				defer.resolve(response.data.active_carts);

				if(response.data.active_carts.length <= 0) {
					vm.noCheckOut = true;
				} else {
					var deliveryTypes = {};

					vm.noCheckOut = false;

					if(response.data.has_prescription) {
						deliveryTypes = [
							{
								delivery_type_id: 'pick-up',
								name: 'Pick-up'
							}
						];
					} else {
						deliveryTypes = [
							{
								delivery_type_id: 'pick-up',
								name: 'Pick-up'
							},
							{
								delivery_type_id: 'delivery',
								name: 'Delivery'
							}
						];
					}
					
					vm.deliveryTypes = deliveryTypes;
				}
				
				vm.totalAmountDueUntouched = response.data.active_cart_total[0] != null ? response.data.active_cart_total[0].total : 0;

				if(vm.totalAmountDueUntouched > 1 && vm.totalAmountDueUntouched < 500 && vm.deliveryType == 'delivery') {
					vm.deliveryCharge = 20.00;
					vm.totalAmountDue = Number(vm.totalAmountDueUntouched) + 20;					
				} else {
					vm.deliveryCharge = 0.00;
					vm.totalAmountDue = vm.totalAmountDueUntouched;
				}
			}, function(error) {
				alert('Error fetching product cart data!');
			});

		return defer.promise;
	};

	vm.deliveryTypeOnChange = function() {
		if(vm.deliveryType.delivery_type_id == 'delivery') {
			vm.isPickUp = false;
			if(vm.totalAmountDueUntouched > 1 && vm.totalAmountDueUntouched < 500) {
					vm.deliveryCharge = 20.00;
					vm.totalAmountDue = Number(vm.totalAmountDueUntouched) + 20;			
				} else {
					vm.deliveryCharge = 0.00;
					vm.totalAmountDue = vm.totalAmountDueUntouched;
				}
		} else {
			vm.isPickUp = true;
			vm.totalAmountDue = vm.totalAmountDueUntouched;
		}
	}

	vm.showUserCartDataOnClick = function() {
		var userCart = tableService.getTableInstance().row({selected: true}).data();

		vm.formUserCart.quantity = userCart.quantity;
		vm.formUserCart.totalAmount = userCart.quantity * userCart.price;

		$('#cart').modal('show');
	}

	vm.quantityOnChange = function() {
		var userCart = tableService.getTableInstance().row({selected: true}).data();

		vm.formUserCart.totalAmount = vm.formUserCart.quantity * userCart.price;
	}

	vm.updateCartOnClick = function() {
		var userCart = tableService.getTableInstance().row({selected: true}).data();		

		$http({
			url: appSettings.BASE_URL + 'pharmacy/api/v1/carts/' + userCart.customer_cart_id,
			method: 'PUT',
			data: $.param({
				'product_id': userCart.product_id,
				'quantity': vm.formUserCart.quantity,
			}),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(function(response) {
			alert(response.data.message);

			$('#cart').modal('hide');
		}, function(response) {
			alert(response.data.message);
		});
	}

	vm.deleteUserCartOnClick = function() {
		var userCartIds = [];
		var userCarts = tableService.getTableInstance().rows({selected: true}).data();

		for(var i = 0; i < userCarts.count(); i++) {
			userCartIds.push(userCarts[i].customer_cart_detail_id);
		}

		$http({
			url: appSettings.BASE_URL + 'pharmacy/api/v1/carts/' + userCarts[0].customer_cart_id + '?userCartIds=' + JSON.stringify(userCartIds),
			method: 'DELETE',
		}).then(function(response) {
			alert(response.data.message);

			vm.dtInstance.changeData(vm.newPromise);			
		}, function(response) {
			alert(response.data.message);
		});
	}

	vm.checkOutOnClick = function() {
		var tableData = tableService.getTableInstance().rows().data();

		var tableDataFiltered = [];

		for(var i = 0; i < tableData.count(); i++) {
			tableDataFiltered.push(tableData[i]);
		}

		$http({
			url: appSettings.BASE_URL + 'pharmacy/api/v1/sales-invoices',
			method: 'POST',
			data: $.param({
				'remarks': vm.isPickUp == false ? 'Delivery' : 'Pick-up',
				'delivery_address': vm.deliveryAddress,
				'ordered_products': tableDataFiltered
			}),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(function(response) {
			alert(response.data.message);

			vm.noCheckOut = true;
			$window.location = appSettings.BASE_URL + 'cart';
		}, function(response) {
			alert(response.data.message);
		});
	};
});