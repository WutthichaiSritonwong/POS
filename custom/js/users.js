var manageUsersTable;

$(document).ready(function() {
	// active top navbar Users
	$('#topNavUsers').addClass('active');
    

	manageUsersTable = $('#manageUsersTable').DataTable({
		'ajax' : 'php_action/fetchUsers.php',
		'columnDefs': [
			{ className : 'text-left', targets : [1] },
			{ className : 'text-center', targets : [0,2,3] },			
		],
		'order': []
	}); // manage Users Data Table


	// check password1 = password2
	$('#Password, #ConfirmPassword').on('keyup', function () {
  	if ($('#Password').val() == $('#ConfirmPassword').val()) {
    $('#message').html('รหัสผ่านตรงกัน').css('color', '#04B404');
  	} else 
    $('#message').html('รหัสผ่านไม่ตรงกันกรุณาตรวจสอบ').css('color', '#FF0040');
	});

	// on click on submit Users form modal
	$('#addUsersModalBtn').unbind('click').bind('click', function() {
		// reset the form text
		$("#submitUsersForm")[0].reset();
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// submit Users form function
		$("#submitUsersForm").unbind('submit').bind('submit', function() {

			var UsersName = $("#UsersName").val();
			var Password = $("#Password").val();
			var ConfirmPassword = $("#ConfirmPassword").val();
			var prefix = $("#prefix").val();
			var fname = $("#fname").val();
			var lname = $("#lname").val();
			var email = $("#email").val();
			var UsersLevel = $("#UsersLevel").val();

			if(UsersName == "") {
				$("#UsersName").after('<p class="text-danger">กรุณากรอก Username</p>');
				$('#UsersName').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#UsersName").find('.text-danger').remove();
				// success out for form 
				$("#UsersName").closest('.form-group').addClass('has-success');	  	
			}

			if(Password == "") {
				$("#Password").after('<p class="text-danger">กรุณากรอก Password</p>');
				$('#Password').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#Password").find('.text-danger').remove();
				// success out for form 
				$("#Password").closest('.form-group').addClass('has-success');	  	
			}

			if(ConfirmPassword == "") {
				$("#ConfirmPassword").after('<p class="text-danger">กรุณากรอก ConfirmPassword</p>');
				$('#ConfirmPassword').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#ConfirmPassword").find('.text-danger').remove();
				// success out for form 
				$("#ConfirmPassword").closest('.form-group').addClass('has-success');	  	
			}


			if(prefix == "") {
				$("#prefix").after('<p class="text-danger">กรุณาเลือกคำนำหน้าชื่อ Prefix</p>');
				$('#prefix').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#prefix").find('.text-danger').remove();
				// success out for form 
				$("#prefix").closest('.form-group').addClass('has-success');	  	
			}

			if(fname == "") {
				$("#fname").after('<p class="text-danger">กรุณากรอก First Name</p>');
				$('#fname').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#fname").find('.text-danger').remove();
				// success out for form 
				$("#fname").closest('.form-group').addClass('has-success');	  	
			}

			if(lname == "") {
				$("#lname").after('<p class="text-danger">กรุณากรอก Last Name</p>');
				$('#lname').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#lname").find('.text-danger').remove();
				// success out for form 
				$("#lname").closest('.form-group').addClass('has-success');	  	
			}

			if(email == "") {
				$("#email").after('<p class="text-danger">กรุณากรอก Email</p>');
				$('#email').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#email").find('.text-danger').remove();
				// success out for form 
				$("#email").closest('.form-group').addClass('has-success');	  	
			}

			if(UsersLevel == "") {
				$("#UsersLevel").after('<p class="text-danger">กรุณาเลือกระดับการใช้งาน Level</p>');
				$('#UsersLevel').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#UsersLevel").find('.text-danger').remove();
				// success out for form 
				$("#UsersLevel").closest('.form-group').addClass('has-success');	  	
			}

			if(UsersName && Password && prefix && fname && lname && email && UsersLevel) {
				var form = $(this);
				// button loading
				$("#createUsersBtn").button('loading');

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success:function(response) {
						// button loading
						$("#createUsersBtn").button('reset');

						if(response.success == true) {
							// reload the manage member table 
							manageUsersTable.ajax.reload(null, false);						

	  	  			// reset the form text
							$("#submitUsersForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');
	  	  			
	  	  			$('#add-Users-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
						}  // if

					} // /success
				}); // /ajax	
			} // if

			return false;
		}); // submit Users form function
	}); // /on click on submit Users form modal	

}); // /document

// edit Users function
function editUsers(UsersId = null) {
	if(UsersId) {
		// remove the added Users id 
		$('#editUsersId').remove();
		// reset the form text
		$("#editUsersForm")[0].reset();
		// reset the form text-error
		$(".text-danger").remove();
		// reset the form group errro		
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit Users messages
		$("#edit-Users-messages").html("");
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-Users-result').addClass('div-hide');
		//modal footer
		$(".editUsersFooter").addClass('div-hide');		

		$.ajax({
			url: 'php_action/fetchSelectedUsers.php',
			type: 'post',
			data: {UsersId: UsersId},
			dataType: 'json',
			success:function(response) {

				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-Users-result').removeClass('div-hide');
				//modal footer
				$(".editUsersFooter").removeClass('div-hide');	

				// set the Users name
				$("#editUsersName").val(response.Users_name);
				$("#editfname").val(response.editfname);
				
				// add the Users id 
				$(".editUsersFooter").after('<input type="hidden" name="editUsersId" id="editUsersId" value="'+response.Users_id+'" />');


				// submit of edit Users form
				$("#editUsersForm").unbind('submit').bind('submit', function() {
					var editUsersName = $("#editUsersName").val();
					var editPassword = $("#editPassword").val();
					var editConfirmPassword = $("#editPassword").val();
					var editprefix = $("#editprefix").val();
					var editfname = $("#editfname").val();
					var editlname = $("#editlname").val();
					var editemail = $("#editemail").val();
					var editUsersLevel = $("#editUsersLevel").val();

					if(editUsersName == "") {
						$("#editUsersName").after('<p class="text-danger">กรุณากรอก User Name</p>');
						$('#editUsersName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUsersName").find('.text-danger').remove();
						// success out for form 
						$("#editUsersName").closest('.form-group').addClass('has-success');	  	
					}

					if(editPassword == "") {
						$("#editPassword").after('<p class="text-danger">กรุณากรอก Password</p>');
						$('#editPassword').closest('.form-group').addClass('has-error');
					} else {
					// remov error text field
						$("#editPassword").find('.text-danger').remove();
					// success out for form 
						$("#editPassword").closest('.form-group').addClass('has-success');	  	
					}

					if(editConfirmPassword == "") {
						$("#editConfirmPassword").after('<p class="text-danger">กรุณากรอก ConfirmPassword</p>');
						$('#editConfirmPassword').closest('.form-group').addClass('has-error');
					} else {
					// remov error text field
						$("#editConfirmPassword").find('.text-danger').remove();
					// success out for form 
						$("#editConfirmPassword").closest('.form-group').addClass('has-success');	  	
					}


					if(editprefix == "") {
						$("#editprefix").after('<p class="text-danger">กรุณาเลือกคำนำหน้าชื่อ Prefix</p>');
						$('#editprefix').closest('.form-group').addClass('has-error');
					} else {
					// remov error text field
						$("#editprefix").find('.text-danger').remove();
					// success out for form 
						$("#editprefix").closest('.form-group').addClass('has-success');	  	
					}

					if(editfname == "") {
						$("#editfname").after('<p class="text-danger">กรุณากรอก First Name</p>');
						$('#editfname').closest('.form-group').addClass('has-error');
					} else {
					// remov error text field
						$("#editfname").find('.text-danger').remove();
					// success out for form 
						$("#editfname").closest('.form-group').addClass('has-success');	  	
					}

					if(editlname == "") {
						$("#editlname").after('<p class="text-danger">กรุณากรอก Last Name</p>');
						$('#editlname').closest('.form-group').addClass('has-error');
					} else {
					// remov error text field
						$("#editlname").find('.text-danger').remove();
					// success out for form 
						$("#editlname").closest('.form-group').addClass('has-success');	  	
					}

					if(editemail == "") {
						$("#editemail").after('<p class="text-danger">กรุณากรอก Email</p>');
						$('#editemail').closest('.form-group').addClass('has-error');
					} else {
					// remov error text field
						$("#editemail").find('.text-danger').remove();
					// success out for form 
						$("#editemail").closest('.form-group').addClass('has-success');	  	
					}

					if(editUsersLevel == "") {
						$("#editUsersLevel").after('<p class="text-danger">กรุณาเลือกระดับการใช้งาน Level</p>');
						$('#editUsersLevel').closest('.form-group').addClass('has-error');
					} else {
					// remov error text field
						$("#editUsersLevel").find('.text-danger').remove();
					// success out for form 
						$("#editUsersLevel").closest('.form-group').addClass('has-success');	  	
					}		

					if(UsersName && UsersStatus) {
						var form = $(this);
						// button loading
						$("#editUsersBtn").button('loading');

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								// button loading
								$("#editUsersBtn").button('reset');

								if(response.success == true) {
									// reload the manage member table 
									manageUsersTable.ajax.reload(null, false);									  	  			
									
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-Users-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								}  // if

							} // /success
						}); // /ajax	
					} // if


					return false;
				}); // /submit of edit Users form

			} // /success
		}); // /fetch the selected Users data

	} else {
		alert('Oops!! Refresh the page');
	}
} // /edit Users function

// remove Users function
function removeUsers(UsersId = null) {
		
	$.ajax({
		url: 'php_action/fetchSelectedUsers.php',
		type: 'post',
		data: {UsersId: UsersId},
		dataType: 'json',
		success:function(response) {			

			// remove Users btn clicked to remove the Users function
			$("#removeUsersBtn").unbind('click').bind('click', function() {
				// remove Users btn
				$("#removeUsersBtn").button('loading');

				$.ajax({
					url: 'php_action/removeUser.php',
					type: 'post',
					data: {UsersId: UsersId},
					dataType: 'json',
					success:function(response) {
						if(response.success == true) {
 							// remove Users btn
							$("#removeUsersBtn").button('reset');
							// close the modal 
							$("#removeUsersModal").modal('hide');
							// update the manage Users table
							manageUsersTable.ajax.reload(null, false);
							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} else {
 							// close the modal 
							$("#removeUsersModal").modal('hide');

 							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} // /else
						
						
					} // /success function
				}); // /ajax function request server to remove the Users data
			}); // /remove Users btn clicked to remove the Users function

		} // /response
	}); // /ajax function to fetch the Users data
} // remove Users function