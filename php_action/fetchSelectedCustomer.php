<?php     

require_once 'core.php';

$id = $_POST['id'];

$sql = "SELECT cust_id, cust_code, cust_name, cust_phone, cust_address FROM customers WHERE cust_id = $id";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);