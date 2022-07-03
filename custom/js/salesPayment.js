$(document).ready(function(){
		salesTablePayment();	
	});
	$(document).on('click', '#addnew', function(){
		salesTablePayment();
	});
	//Showing our Table
	function salesTablePayment(){
		$.ajax({
			url: 'php_action/fetchSalesPay.php',
			type: 'POST',
			async: false,
			data:{
				show: 1
			},
			success: function(response){
				$('#payment').html(response);
			}
		});
	}