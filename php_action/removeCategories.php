<?php     

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$categoriesId = $_POST['categoriesId'];

if($categoriesId) { 

 $sql = "DELETE FROM categories WHERE categories_id = {$categoriesId}";

 if($connect->query($sql) === TRUE) {
     $valid['success'] = true;
    $valid['messages'] = "ลบข้อมูลเรียบร้อยแล้ว";        
 } else {
     $valid['success'] = false;
     $valid['messages'] = "ไม่สามารถลบข้อมูลได้";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST