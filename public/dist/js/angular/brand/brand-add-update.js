app.controller('BrandAddUpdateController', function($http, appSettings) {
	var vm = this;

	vm.brandOnSubmit = function() {
		$http({
			url: appSettings.BASE_URL + 'pharmacy/api/v1/brands',
			method: 'POST',
			data: $.param({
				'name': vm.formBrand.brandName,
				'description': vm.formBrand.brandDescription
			}),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(function(response) {
			$('#brand_modal').modal('hide');
			vm.formBrand = null;

			alert(response.data.message);
		}, function(response) {
			alert(response.data.message);
		});
	};
})