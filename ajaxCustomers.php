<?php
include("php_action/core.php");

$term=$_GET["term"];
$sql = "SELECT * FROM customers WHERE cust_name LIKE  '%$term%' ORDER BY customers.cust_id ASC ";
$result = $connect->query($sql);
$rows = array();

if ($result->num_rows > 0) {
     while($array = $result->fetch_array()) {
        $rows[]=array(
                    'idc'=> $array["cust_id"],
                    'label' => $array["cust_name"],
                    'address'=> $array["cust_address"]
					);
    }
}    
 echo json_encode($rows);

?>