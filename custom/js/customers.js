var manageCustomersTable;

$(document).ready(function() {
	// active top navbar customers
	$('#navcustomers').addClass('active');	

	manageCustomersTable = $('#manageCustomersTable').DataTable({
		'ajax' : 'php_action/fetchCustomers.php',
		'columnDefs': [
			{ className : 'text-center', targets : [0, 1] }
		],
		'order': []
	}); // manage customers Data Table


	$("#customerForm").unbind('submit').bind('submit', function() {

		var form = $(this);

		$(".text-danger").remove();

		var custCode = $("#custCode").val();
		var custName = $("#custName").val();
		var custPhone = $("#custPhone").val();
		var custAddr = $("#custAddr").val();
		var custComment = $("#custComment").val();

		if(custCode == "" || custName == "" || custPhone == "" || custAddr == "") {
			if(custCode == "") {
				$("#custCode").after('<p class="text-danger">กรุณากรอกรหัสลูกค้า</p>');
				$("#custCode").closest('.form-group').addClass('has-error');
			} else {
				$("#custCode").closest('.form-group').removeClass('has-error');
				$(".text-danger").remove();
			}

			if(custName == "") {
				$("#custName").after('<p class="text-danger">กรุณากรอกชื่อลูกค้า</p>');
				$("#custName").closest('.form-group').addClass('has-error');
			} else {
				$("#custName").closest('.form-group').removeClass('has-error');
				$(".text-danger").remove();
			}

			if(custPhone == "") {
				$("#custPhone").after('<p class="text-danger">กรุณากรอกหมายเลขโทรศัพท์</p>');
				$("#custPhone").closest('.form-group').addClass('has-error');
			} else {
				$("#custPhone").closest('.form-group').removeClass('has-error');
				$(".text-danger").remove();
			}
			if(custAddr == "") {
				$("#custAddr").after('<p class="text-danger">กรุณากรอกที่อยู่</p>');
				$("#custAddr").closest('.form-group').addClass('has-error');
			} else {
				$("#custAddr").closest('.form-group').removeClass('has-error');
				$(".text-danger").remove();
			}


		} else {
			$(".form-group").removeClass('has-error');
			$(".text-danger").remove();

			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					console.log(response);
					if(response.success == true) {
					$('.createCustomerMessages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
	          	'</div>');

				// remove the mesages
	          	$(".alert-success").delay(500).show(10, function() {
							$(this).delay(2000).fadeOut('slow');
						}); // /.alert	    
				} 


				} // /success function
			}); // /ajax function

		} // /else


		return false;
	});


	$("#customerEditForm").unbind('submit').bind('submit', function() {

		var form = $(this);

		$(".text-danger").remove();

		var custCode = $("#custCode").val();
		var custName = $("#custName").val();
		var custPhone = $("#custPhone").val();
		var custAddr = $("#custAddr").val();
		var custComment = $("#custComment").val();

		if(custCode == "" || custName == "" || custPhone == "" || custAddr == "") {
			if(custCode == "") {
				$("#custCode").after('<p class="text-danger">กรุณากรอกรหัสลูกค้า</p>');
				$("#custCode").closest('.form-group').addClass('has-error');
			} else {
				$("#custCode").closest('.form-group').removeClass('has-error');
				$(".text-danger").remove();
			}

			if(custName == "") {
				$("#custName").after('<p class="text-danger">กรุณากรอกชื่อลูกค้า</p>');
				$("#custName").closest('.form-group').addClass('has-error');
			} else {
				$("#custName").closest('.form-group').removeClass('has-error');
				$(".text-danger").remove();
			}

			if(custPhone == "") {
				$("#custPhone").after('<p class="text-danger">กรุณากรอกหมายเลขโทรศัพท์</p>');
				$("#custPhone").closest('.form-group').addClass('has-error');
			} else {
				$("#custPhone").closest('.form-group').removeClass('has-error');
				$(".text-danger").remove();
			}
			if(custAddr == "") {
				$("#custAddr").after('<p class="text-danger">กรุณากรอกที่อยู่</p>');
				$("#custAddr").closest('.form-group').addClass('has-error');
			} else {
				$("#custAddr").closest('.form-group').removeClass('has-error');
				$(".text-danger").remove();
			}


		} else {
			$(".form-group").removeClass('has-error');
			$(".text-danger").remove();

			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					console.log(response);
					if(response.success == true) {
					$('.editCustomerMessages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
	          	'</div>');

				// remove the mesages
	          	$(".alert-success").delay(500).show(10, function() {
							$(this).delay(2000).fadeOut('slow');
						}); // /.alert	    
				} 


				} // /success function
			}); // /ajax function

		} // /else


		return false;
	});
	

}); // /document


// remove customer function
function removeCustomer(id = null) {
		
	$.ajax({
		url: 'php_action/fetchSelectedCustomer.php',
		type: 'post',
		data: {id: id},
		dataType: 'json',
		success:function(response) {			

			// remove customer btn clicked to remove the customer function
			$("#removeCustomerBtn").unbind('click').bind('click', function() {
				// remove customer btn
				$("#removeCustomerBtn").button('loading');

				$.ajax({
					url: 'php_action/removeCustomer.php',
					type: 'post',
					data: {id: id},
					dataType: 'json',
					success:function(response) {
						if(response.success == true) {
 							// remove customer btn
							$("#removeCustomerBtn").button('reset');
							// close the modal 
							$("#removeCustomerModal").modal('hide');
							// update the manage customer table
							manageCustomersTable.ajax.reload(null, false);
							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
							$(this).delay(2000).fadeOut('slow');
							}); // /.alert	    
 						} else {
 							// close the modal 
							$("#removeCustomerModal").modal('hide');

 							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
							$(this).delay(2000).fadeOut('slow');
							}); // /.alert
 						} // /else
						
						
					} // /success function
				}); // /ajax function request server to remove the customer data
			}); // /remove customer btn clicked to remove the customer function

		} // /response
	}); // /ajax function to fetch the customer data
} // remove customer function