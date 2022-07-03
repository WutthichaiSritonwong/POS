<?php
include("php_action/core.php");

if(!empty($_POST['type'])){
	$type = $_POST['type'];
	$name = $_POST['name_startsWith'];
	$sql = "SELECT * FROM products WHERE quantity !=0 AND product_code LIKE '$name%' OR product_name LIKE '%$name%' ";
	$result = $connect->query($sql);
	$data = array();
	while ($row = $result->fetch_array()) {
		$pid = $row['product_id'];
		$pname = $row['product_name'];
		$rate = $row['rate'];
		$name = $pid.'|'.$pname.'|'.$rate;
		array_push($data, $name);
	}	
	echo json_encode($data);
	exit;
}

?>