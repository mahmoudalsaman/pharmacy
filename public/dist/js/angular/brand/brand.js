app.controller('BrandController', function($http, $q, DTOptionsBuilder, DTColumnBuilder, appSettings) {
	var vm = this;

	vm.formBrand = {};

	vm.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
		return getBrands();
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
		DTColumnBuilder.newColumn('brand_id').withTitle('ID'),
		DTColumnBuilder.newColumn('brand_id').withTitle('Image'),
		DTColumnBuilder.newColumn('name').withTitle('Name'),
		DTColumnBuilder.newColumn('description').withTitle('Description'),
		DTColumnBuilder.newColumn('created_at').withTitle('Created At'),
		DTColumnBuilder.newColumn('updated_at').withTitle('Updated At')
	];

	$('#brand_modal').on('hidden.bs.modal', function() {
		vm.dtInstance.changeData(vm.newPromise);
	});

	vm.newPromise = getBrands;
	vm.dtInstance = {};

	function getBrands() {
		var defer = $q.defer();

		$http.get(appSettings.BASE_URL + 'pharmacy/api/v1/brands')
			.then(function(response) {
				defer.resolve(response.data.active_brands);
			}, function(error) {
				alert('Error fetching brand data!');
			});

		return defer.promise;
	};
});