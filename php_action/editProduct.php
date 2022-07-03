<?php     

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
  $productId     = $_POST['pID'];
  $productCode   = $_POST['productCode'];
  $productName   = $_POST['productName']; 
  $quantity      = $_POST['qty'];
  $rate          = $_POST['rate'];
  $uid           = $_POST['unit'];
  $categoryID    = $_POST['categories'];
  $productStatus = $_POST['active'];

                
    $sql = "UPDATE products SET product_id = '$productCode', product_name = '$productName', categories_id = '$categoryID', 
    quantity = '$quantity', uID='$uid', rate = '$rate', status = '$productStatus' WHERE pid = $productId ";
    $connect->query("SET NAMES UTF8");
    if($connect->query($sql) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "บันทึกข้อมูลแล้ว";     
    } else {
        $valid['success'] = false;
        $valid['messages'] = "ไม่สามารถบันทึกข้อมูลได้";
    }

} // /$_POST
     
$connect->close();

echo json_encode($valid);
 
?>