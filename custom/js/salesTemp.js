
$(document).ready(function(){
		salesTableShow();
		salesTablePayment();

		$(document).on('click', '#btnpayment', function(){
			if($.trim($('#subTotal').val()) == '0'){				
				alert('กรุณาตรวจสอบรายการซื้อสินค้า...');
				$('#subTotal').focus();
			} else {

			$orderID=$('#orderID').val();
			$custIDCard=$('#custIDCard').val();
			$channel=$('#channel').val();
			$subTotal=$('#subTotal').val();
			$taxAmount=$('#taxAmount').val();
			$grandTotal=$('#grandTotal').val();
			$PayTypes=$('#PayTypes').val();
				$.ajax({
					type: "POST",
					url: "php_action/createSales.php",
					data: {
						orderID: $orderID,
						custIDCard: $custIDCard,
						channel: $channel,
						subTotal: $subTotal,
						taxAmount: $taxAmount,
						grandTotal: $grandTotal,
						PayTypes: $PayTypes,
						add: 1,
					},
					success: function(result){
						$("#modal-default").modal('show');
					}
				});
			}
			
		});

		//new Sale
		$(document).on('click', '#newSale', function(){
				$.ajax({
					data: {
					},
					success: function(html){
						location.reload();
					}
				});
		});

		//Add New
		$(document).on('click', '#addnew', function(){
			//if ($('#saleProductID').val()=="" || $('#IDCust').val()=="") {
			if($.trim($('#custName').val()) == ''){				
				alert('กรุณากรอกชื่อลูกค้า...');
				$('#custName').focus();
			}
			if($.trim($('#saleProductID').val()) == ''){				
				alert('กรุณากรอกรหัสสินค้าหรือชื่อสินค้า...');
				$('#sales').focus();
			}
			else{
			$saleProductID=$('#saleProductID').val();
				$.ajax({
					type: "POST",
					url: "php_action/createSalesTemp.php",
					data: {
						saleProductID: $saleProductID,
						add: 1,
					},
					success: function(data){
						clearform();
						salesTableShow();
						salesTablePayment();
					}
				});
			}
		});

		
		//Delete
		$(document).on('click', '.delete', function(){
			$id=$(this).val();
				$.ajax({
					type: "POST",
					url: "php_action/removeSalesTemp.php",
					data: {
						id: $id,
						del: 1,
					},
					success: function(){
						salesTableShow();
						salesTablePayment();
					}
				});
		});
		
		//Update
		$(document).on('click', '.updateuser', function(){
			$uid=$(this).val();
			$('#edit'+$uid).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			//$ufirstname=$('#ufirstname'+$uid).val();
			//$ulastname=$('#ulastname'+$uid).val();
				$.ajax({
					type: "POST",
					url: "update.php",
					data: {
						id: $uid,
						//firstname: $ufirstname,
						//lastname: $ulastname,
						edit: 1,
					},
					success: function(){
						salesTableShow();
						salesTablePayment();
					}
				});
		});
	
	});
	
	//Showing our Table
	function salesTableShow(){
		$.ajax({
			url: 'php_action/fetchSalesTemp.php',
			type: 'POST',
			async: false,
			data:{
				show: 1
			},
			success: function(response){
				$('#salesTable').html(response);
			}
		});
	}

	//Clear Form
	function clearform(){
    	document.getElementById("sales").value=""; //don't forget to set the textbox ID
    	document.getElementById("saleProductID").value=""; //don't forget to set the textbox ID
	}

	function refreshPage(){
    	setTimeout(function () {
        location.reload()
    	}, 100);
	}


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
				//refreshPage();
			}
		});
	}

	
