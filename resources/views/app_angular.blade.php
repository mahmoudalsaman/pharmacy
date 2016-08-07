<script type="text/javascript">
	var app = angular.module('pharmacyApp', ['datatables'])
		.constant('appSettings', {
			'BASE_URL'	: 'http://localhost:8000/',	
			'CSRF_TOKEN': '{!! csrf_token() !!}'
		});
</script>