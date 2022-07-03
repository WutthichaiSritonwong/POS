<?php     

require_once 'core.php';

$sql = "SELECT cust_id, cust_code, cust_name, cust_phone, cust_address, comment
FROM customers ORDER BY customers.cust_id ";
$result = $connect->query($sql);

$output = array();

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $activeCategories = ""; 
   $i=0;
 while($row = $result->fetch_array()) {
     $i++;
     $id = $row[0];
     $button = '
     <a href="customerEdit.php?edit='.$id.' ">
        <button type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></button>
     </a>
     <a href="#" data-toggle="modal" data-target="#removeCustomerModal" onclick="removeCustomer('.$id.')">
        <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i></button>
     </a>
    ';

     $output['data'][] = array(    
         $i,
         $row[1],
         $row[2],
         $row[3],
         $row[4],
         $row[5],
         $button         
         );
     //array_push($output,$name);
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);