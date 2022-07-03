<?php     

	require_once 'core.php';
	
	if(isset($_POST['add'])){
		$saleProductID=$_POST['saleProductID'];

		// ค้นหา Username
		$user_id = $_SESSION['userId'];
		$q = "SELECT username FROM users WHERE user_id ='$user_id' ";
		$result = $connect->query($q);
		$rs = $result->fetch_array();
		$usern = $rs['0'];

		// ค้นหารหัสสินค้ากับราคา
		$sql = "SELECT pid,rate FROM products WHERE pid = '$saleProductID' ";
		$result = $connect->query($sql);
		$row = $result->fetch_array();
		$col1 = $row['pid'];
		$col2 = $row['rate'];
		$price = $col2*1;
		$discount = '0.00';
		
		// ค้นหารหัสสินค้ากับราคาว่ามีในตาราง order_item หรือไม่
		$sql_1 = "SELECT order_item_id,quantity,product_id,rate FROM order_item 
				  WHERE product_id = '$col1' AND rec_username = '$usern' ";
		$result_1 = $connect->query($sql_1);
		$row_1= $result_1->fetch_array();
		$num_1 = mysqli_num_rows($result_1);
		$qty = $row_1['quantity']+1;
		$ftotal = $row_1['rate']*$qty;
		
		//ถ้ามีแล้วให้ให้จำนวนสินค้าบวก 1 และให้ราคาต่อชิ้นคูณจำนวน
		if($num_1>0) {
			$sql_u = "UPDATE order_item SET quantity='$qty', total='$ftotal' 
					  WHERE product_id = '$col1' AND rec_username = '$usern' ";
			$connect->query($sql_u);
		} else {

		// ค้นหาเพื่อจัดการ Order ID
		$sql_trns = "SELECT order_id FROM order_item WHERE rec_username = '$usern'  ";
		$result = $connect->query($sql_trns);
		$rs_trns = $result->fetch_array();
		$num_rows = mysqli_num_rows($result);
		$transOrderID = $rs_trns['0'];

		// ถ้ามีให้ใช้ $transOrderID อันเดิม
		if ($num_rows>0) {
			$sql_i = "INSERT INTO order_item (order_item_id, order_id, product_id, quantity, rate, total, 
			discount, order_item_status,order_timestamp,rec_username) 
		VALUES ('0','$transOrderID','$col1','1','$col2','$price','$discount','1', NOW(), '$usern' )"; 
		} else {
		// ถ้าไม่มีให้ใช้ $transOrderID จากตาราง transaction
			$qt = "SELECT transNumber FROM transaction WHERE transType='2' ORDER BY transID DESC LIMIT 1 ";
			$result = $connect->query($qt);
			$rs = $result->fetch_array();
			$transID = $rs['0']+1;
			$sql_t = "UPDATE transaction SET transNumber = '$transID' WHERE transType='11' ";
			$connect->query($sql_t);
			$sql_i = "INSERT INTO order_item (order_item_id, order_id, product_id, quantity, rate, total, 
			discount, order_item_status,order_timestamp,rec_username) 
		VALUES ('0','$transID','$col1','1','$col2','$price','$discount','1', NOW(), '$usern' )";
		}

		$connect->query($sql_i);

		} 

		$connect->close();
	}

?>