app.controller('UomAddUpdateController', function($http, appSettings) {
	var vm = this;

	vm.uomOnSubmit = function() {
		$http({
			url: appSettings.BASE_URL + 'pharmacy/api/v1/uoms',
			method: 'POST',
			data: $.param({
				'name': vm.formUom.uomName,
				'abbreviation': vm.formUom.uomAbbreviation
			}),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(function(response) {
			$('#uom_modal').modal('hide');
			vm.formUom = null;

			alert(response.data.message);
		}, function(response) {
			alert(response.data.message);
		});
	};
})