<?php     

	require_once 'core.php';
	
	if(isset($_POST['add'])){
		$user_id = $_SESSION['userId'];
		$q = "SELECT username FROM users WHERE user_id ='$user_id' ";
		$result = $connect->query($q);
		$rs = $result->fetch_array();
		$usern = $rs['0'];

		
		$q = "SELECT order_id FROM order_item WHERE rec_username = '$usern' GROUP BY order_id ";
		$result = $connect->query($q);
		$rs = $result->fetch_array();
		$transID = $rs['0'];

		$sql = "SELECT transNumber FROM transaction WHERE transType = '2' ";  //การ transType = 2 ขายสินค้า
		$result = $connect->query($sql);
		$rs = $result->fetch_array();
		$trans_num = $rs['0']+1;
		$y_now = substr(date("Y")+543,2,2);
		$ym_now = $y_now.date("m");
		$n = substr("0000000000".$trans_num,-10,10);    
		$transNumber = $ym_now.$n;

		$IDCust = $_POST['custIDCard'];
		$sale_channel = $_POST['channel'];
		$subTotal = $_POST['subTotal'];
		$tax = $_POST['taxAmount'];
		$grandTotal = $_POST['grandTotal'];
		$PayTypes = $_POST['PayTypes'];


		$sql = "INSERT INTO sales (sales_id, sales_date, sales_time, transaction, ref_docinv, IDCust, sub_total, vat, grand_total, payment_type, payment_status, sales_status, sale_channel_id, username) VALUES 
			('0', CURDATE(),NOW(),'$transID','$transNumber','$IDCust','$subTotal','$tax', '$grandTotal', '$PayTypes', '1', '1', 
			'$sale_channel', '$usern' )";
		$resulti = $connect->query($sql);

		if($resulti) {
		$sql = "UPDATE transaction SET transNumber = '$trans_num' WHERE transType='2' "; //ให้ Update ที่ transType = 2 ขายสินค้า
		$connect->query($sql);

		$sql = "INSERT INTO sales_item SELECT * FROM order_item WHERE rec_username = '$usern' ";
		$connect->query($sql);

		$sql = "DELETE FROM order_item WHERE rec_username = '$usern' ";
		$connect->query($sql);


		} 
		
	} 
	
	$connect->close();
	
?>