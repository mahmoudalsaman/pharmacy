app.controller('SalesApprovalController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings, tableService) {
	var vm = this;

	vm.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
		return getTags();
	})
	.withPaginationType('full_numbers')
	.withSelect({
        style:    'os',
        selector: 'td:first-child'
    });

	vm.dtOptions.drawCallback = function() {
    	var table = this.DataTable();

    	tableService.setTableInstance(table);
    };

	vm.dtColumns = [
		DTColumnBuilder.newColumn(null).withTitle('')
            .notSortable()
            .withClass('select-checkbox')
            // Need to define the mRender function, otherwise we get a [Object Object]
            .renderWith(function() {
            	return '';
        	}),
		DTColumnBuilder.newColumn('customer_sales_invoice_id').withTitle('Order ID'),
		DTColumnBuilder.newColumn('first_name').withTitle('Customer Name')
			.renderWith(function(data, type, full) {
				return full.first_name + ' ' + full.middle_name + ' ' + full.last_name;
			}),
		DTColumnBuilder.newColumn('ordered_at').withTitle('Order Date'),
		DTColumnBuilder.newColumn('status').withTitle('Order Status'),
		DTColumnBuilder.newColumn('remarks').withTitle('Type'),
		DTColumnBuilder.newColumn('delivery_status').withTitle('Delivery Status')
			.renderWith(function(data, type, full) {
				return full.delivery_status != null ? full.delivery_status : '---';
			}),
	];

	$('#ordered_list').on('hidden.bs.modal', function() {
		vm.dtInstance.changeData(vm.newPromise);
	});

	vm.newPromise = getTags;
	vm.dtInstance = {};

	function getTags() {
		var defer = $q.defer();

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/sales-approvals')
			.then(function(response) {
				defer.resolve(response.data.sales_invoice_approval_lists);
			}, function(error) {
				alert('Error fetching sales approval data!');
			});

		return defer.promise;
	};

	vm.showSalesDetailsOnClick = function() {
		var salesDetails = tableService.getTableInstance().row({selected: true}).data();

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/sales-invoices/' + salesDetails.customer_sales_invoice_id)
			.then(function(response) {
				vm.salesInvoiceDetails 	= response.data.sales_invoice_details;
				vm.totalAmount			= response.data.sales_invoice_total[0].subtotal;

				$('#ordered_list').modal('show');
			}, function(error) {
				alert("Error fetching category data");
			});
	}

	vm.categoryOnSubmit = function(isAdd) {
		if(isAdd) {
			$http({
				url: appSettings.BASE_URL + 'pharmacy/api/v1/categories',
				method: 'POST',
				data: $.param({
					'name': vm.formCategory.categoryName
				}),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(response) {
				$('#category_modal').modal('hide');
			
				alert(response.data.message);
			}, function(response) {
				alert(response.data.message);
			});
		} else {
			var categoryId = tableService.getTableInstance().row({selected: true}).data().category_id;

			$http({
				url: appSettings.BASE_URL + 'pharmacy/api/v1/categories/' + categoryId,
				method: 'PUT',
				data: $.param({
					'name': vm.formCategory.categoryName
				}),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(response) {
				$('#category_modal').modal('hide');
			
				alert(response.data.message);
			}, function(response) {
				alert(response.data.message);
			});
		}
	};

	vm.deleteCategoryOnClick = function() {
		var categoryIds = [];
		var selectedCategoryData = tableService.getTableInstance().rows({selected: true}).data();

		console.log(selectedCategoryData.count());
		for(var i = 0; i < selectedCategoryData.count(); i++) {
			categoryIds.push(selectedCategoryData[i].category_id);
		}
		$http({
			url: appSettings.BASE_URL + 'pharmacy/api/v1/categories/1?categoryIds=' + JSON.stringify(categoryIds),
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

	vm.approveOrdersOnClick = function() {
		var salesDetails = tableService.getTableInstance().row({selected: true}).data();

		$http({
				url: appSettings.BASE_URL + 'pharmacy/api/v1/sales-approvals?salesInvoiceId=' + salesDetails.customer_sales_invoice_id,
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(response) {
				vm.dtInstance.changeData(vm.newPromise);
			
				alert(response.data.message);
			}, function(response) {
				alert(response.data.message);
		});
	};
});