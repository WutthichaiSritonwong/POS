<?php     

require_once 'core.php';

$UsersId = $_POST['UsersId'];

$sql = "SELECT * FROM users WHERE user_id = '$UsersId' ";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);