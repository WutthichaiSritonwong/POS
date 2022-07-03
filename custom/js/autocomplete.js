$(document).ready(function($){
    $('#custName').autocomplete({
	source : 'ajaxCustomers.php', 
	autoFocus : true,
	minLength : 3,
	delay: 0,
	select: function(event, ui) {
		$('#custIDCard').val(ui.item.idc);
        $('#custName').val(ui.item.label);
        $('#custAddress').val(ui.item.address);
        return false; 
    },
	focus: function(event, ui) {
		event.preventDefault();
		$('#custName').val(ui.item.label);
	}
	
    });
	
	$('#sales').autocomplete({
	source : 'ajaxSales.php', 
	autoFocus : true,
	multiple: true,
	matchContains: true,
	minLength : 3,
	delay: 0,
	
	select: function(event, ui) {
		$('#sales').val(ui.item.id);
		$('#saleProductID').val(ui.item.id);
		$('#firstname').val(ui.item.id);
    },
	focus: function(event, ui) {
		event.preventDefault();
		$('#sales').val(ui.item.label);
	}
	
    });

    //Date picker
    $('#saleDate').datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		autoclose: true
    });
	
    $('#startDate').datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		autoclose: true
    });

    $('#endDate').datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		autoclose: true
    });



});

