<?php     

require_once 'core.php';

	$id = $_POST['id'];

//if($id) { 

	$sql = "DELETE FROM order_item WHERE product_id = '$id' ";
	$connect->query($sql);
 	//$connect->close();
 
//} 
?>