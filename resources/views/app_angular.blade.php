<script type="text/javascript">
	var app = angular.module('pharmacyApp', ['datatables', 'datatables.select'])
		.constant('appSettings', {
			// 'BASE_URL'	: 'http://radiant-scrubland-85792.herokuapp.com/',
			'BASE_URL'	: 'http://localhost:8000/',	
			'CSRF_TOKEN': '{!! csrf_token() !!}'
		});

	app.service('tableService', function() {
		var tableInstance;

		this.setTableInstance = function(tableInstance) {
			this.tableInstance = tableInstance;
		};

		this.getTableInstance = function() {
			return this.tableInstance;
		}

		this.getSelectedRowCount = function(tableInstance) {
			return tableInstance.rows({selected: true}).count();
		};

		this.getSelectedRowData = function(tableInstance) {
			return tableInstance.rows({selected: true}).data();
		};
	});
</script>