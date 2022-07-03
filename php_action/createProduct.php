<?php     

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {    

  $productCode  = $_POST['productCode'];
  $productName = $_POST['productName'];
  $productImage = "";
  $brand = "1";
  $cat = $_POST['categories'];
  $quantity     = $_POST['qty'];
  $uid      = $_POST['unit'];
  $rate         = $_POST['rate'];
  $active    = $_POST['active'];
  $status = "1";
  

    $sql = "INSERT INTO products (pid, product_id, product_name, product_image, brand_id, categories_id, quantity, uID, rate,
    rate2, active, status) VALUES ('0','$productCode','$productName', '$productImage','$brand' ,'$cat','$quantity', '$uid', '$rate',
    '$rate', '$active', '$status')";
    
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