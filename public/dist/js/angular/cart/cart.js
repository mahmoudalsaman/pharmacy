app.controller('CartController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings, $window, tableService) {
	var vm = this;

	vm.formEmployee = {};

	vm.isPickUp = true;
	vm.deliveryType = 'pick-up';
	vm.totalAmountDueUntouched = 0;

	vm.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
		return getEmployees();
	})
	.withPaginationType('full_numbers');

	vm.dtColumns = [
		DTColumnBuilder.newColumn('product_id').withTitle('Product ID'),
		DTColumnBuilder.newColumn('name').withTitle('Product Name'),
		DTColumnBuilder.newColumn('description').withTitle('Product Description'),
		DTColumnBuilder.newColumn('price').withTitle('Product Price'),
		DTColumnBuilder.newColumn('quantity').withTitle('Quantity Ordered'),
		DTColumnBuilder.newColumn('subtotal').withTitle('Subtotal')
	];

	vm.dtOptions.drawCallback = function() {
        	var table = this.DataTable();

        	tableService.setTableInstance(table);

        	table.on('select', function() {
        		var selectedRowCount = table.rows( { selected: true } ).count();

        		if(selectedRowCount > 1) {
        			table.button(1).enable(false);
        		} else {
        			for(var i = 1; i <= 2; i++) {
        				table.button(i).enable(true);
        			}
        		}
        	});

        	table.on('deselect', function() {
				var selectedRowCount = table.rows( { selected: true } ).count();

				if(selectedRowCount == 0) {
        			for(var i = 1; i <= 2; i++) {
        				table.button(i).enable(false);
        			}
        		} 
        	});	
        };

	$('#employee_modal').on('hidden.bs.modal', function() {
		vm.dtInstance.changeData(vm.newPromise);
	});

	vm.newPromise = getEmployees;
	vm.dtInstance = {};

	function getEmployees() {
		var defer = $q.defer();

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/carts')
			.then(function(response) {
				defer.resolve(response.data.active_carts);
				vm.totalAmountDueUntouched = response.data.active_cart_total[0].total;

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
		if(vm.deliveryType == 'delivery') {
			vm.isPickUp = false;
			console.log(vm.totalAmountDueUntouched);
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

	vm.checkOutOnClick = function() {
		console.log(tableService.getTableInstance().rows().data());

		$http({
			url: appSettings.BASE_URL + 'pharmacy/api/v1/sales-invoices',
			method: 'POST',
			data: $.param({
				'branch_id_fk': vm.formEmployee.branch.branch_id,
			}),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(function(response) {
		
			alert(response.data.message);
		}, function(response) {
			alert(response.data.message);
		});
	};
});