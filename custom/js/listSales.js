var manageListSalesTable;

$(document).ready(function() {
	// active top navbar customers
	$('#navcustomers').addClass('active');	

	manageListSalesTable = $('#manageListSalesTable').DataTable({
		'ajax' : 'php_action/fetchListSales.php',
		'columnDefs': [
			{ className : 'text-left', targets : [2] },
			{ className : 'text-center', targets : [0,1,3,5,7] },
			{ className : 'text-right', targets : [4] },
		],
		'order': []
	}); 

});
