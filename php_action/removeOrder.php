<?php     

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$orderId = $_POST['orderId'];

if($orderId) { 

 $sql = "DELETE FROM orders WHERE order_id = {$orderId}";

 //$orderItem = "UPDATE order_item SET order_item_status = 2 WHERE  order_id = {$orderId}";
 //if($connect->query($sql) === TRUE && $connect->query($orderItem) === TRUE) {
 
 if($connect->query($sql) === TRUE) {
     $valid['success'] = true;
     $valid['messages'] = "ź���������º��������";
 } else {
     $valid['success'] = false;
     $valid['messages'] = "�������öź��������";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST