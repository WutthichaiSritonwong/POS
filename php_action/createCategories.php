<?php     

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {    

    $categoriesName = $_POST['categoriesName'];
    $categoriesStatus = $_POST['categoriesStatus']; 

    $sql = "INSERT INTO categories (categories_name, categories_active, categories_status) 
    VALUES ('$categoriesName', '$categoriesStatus', 1)";
    
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