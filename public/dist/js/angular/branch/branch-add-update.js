app.controller('BranchAddUpdateController', function($http, appSettings) {
	var vm = this;

	vm.branchOnSubmit = function() {
		$http({
			url: appSettings.BASE_URL + 'pharmacy/api/v1/branches',
			method: 'POST',
			data: $.param({
				'name': vm.formBranch.branchName,
				'description': vm.formBranch.branchDescription,
				'address': vm.formBranch.branchAddress
			}),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(function(response) {
			$('#branch_modal').modal('hide');
			vm.formBranch = null;

			alert(response.data.message);
		}, function(response) {
			alert(response.data.message);
		});
	};
})