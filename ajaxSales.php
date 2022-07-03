<?php
include("php_action/core.php");

$term = $_GET["term"];
$sql = "SELECT * FROM products WHERE quantity > 0 AND (product_id LIKE '%$term%' OR product_name LIKE '%$term%')
		ORDER BY products.product_id ASC ";
$result = $connect->query($sql);
$rows = array();


if ($result->num_rows > 0) {
     while($array = $result->fetch_array()) {
     	$price = number_format($array["rate"],2);
		$showProduct = "รหัสสินค้า : ".$array["product_id"]." | ".$array["product_name"]. " | ราคา : " .$price.  " บาท";
        $rows[]=array(
                    'id'=> $array["pid"],
                    'label' => $showProduct
					);
    }
}    
 echo json_encode($rows);

?>