app.controller('CategoryController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings, tableService) {
	var vm = this;

	vm.isAdd = true;

	vm.formCategory = {};

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
		DTColumnBuilder.newColumn('category_id').withTitle('ID'),
		DTColumnBuilder.newColumn('name').withTitle('Name'),
		DTColumnBuilder.newColumn('created_at').withTitle('Created At'),
		DTColumnBuilder.newColumn('updated_at').withTitle('Updated At')
	];

	$('#category_modal').on('hidden.bs.modal', function() {
		vm.dtInstance.changeData(vm.newPromise);
		vm.formCategory.categoryName = '';
		vm.isAdd = true;
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

	vm.showCategoryDataOnClick = function() {
		vm.isAdd = false;

		var categoryId = tableService.getTableInstance().row({selected: true}).data().category_id;

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/categories/' + categoryId + '/edit')
			.then(function(response) {
				vm.formCategory.categoryName = response.data.category_details.name;

				$('#category_modal').modal('show');
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

});