<?php     

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {    
     $id = $_POST['custID'];
     $cust_code = $_POST['custCode'];
     $cust_name = $_POST['custName']; 
     $cust_phone = $_POST['custPhone']; 
     $cust_addr = $_POST['custAddr']; 
     $cust_comment = $_POST['custComment']; 

    $sql = "UPDATE customers SET cust_code='$cust_code', cust_name='$cust_name', cust_phone='$cust_phone', 
    cust_address='$cust_addr', comment = '$cust_comment' WHERE cust_id = '$id' ";
    
    if($connect->query($sql) === TRUE) {
         $valid['success'] = true;
         $valid['messages'] = "บันทึกข้อมูลแล้ว";
    } else {
         $valid['success'] = false;
         $valid['messages'] = "ไม่สามารถบันทึกข้อมูลได้";
    }

    $connect->close();

    echo json_encode($valid);
 
} // /if $_POST