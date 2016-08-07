app.controller('CategoryAddUpdateController', function($http, appSettings) {
	var vm = this;

	vm.categoryOnSubmit = function() {
		$http({
			url: appSettings.BASE_URL + 'pharmacy/api/v1/categories',
			method: 'POST',
			data: $.param({
				'name': vm.formTag.tagName
			}),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(function(response) {
			$('#category_modal').modal('hide');
			vm.formBranch = null;

			alert(response.data.message);
		}, function(response) {
			alert(response.data.message);
		});
	};
})