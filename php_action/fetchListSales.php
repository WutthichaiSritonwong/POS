<?php     

require_once 'core.php';

$sql = "SELECT sales.sales_date, sales.transaction, sales.ref_docinv, sales.grand_total, 
    sales.username, customers.cust_id, customers.cust_name, customers.cust_phone, sales_channel.sale_channel
    FROM sales 
    INNER JOIN customers ON (sales.IDCust = customers.cust_id) 
    INNER JOIN sales_channel ON (sales_channel.sale_channel_id = sales.sale_channel_id)
    ORDER BY sales.ref_docinv DESC
    ";
$result = $connect->query($sql);

//$output = array('data' => array());
$output = array();

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $activeCategories = ""; 
     $i=0;
 while($row = $result->fetch_array()) {
     $i++;
     $iv = "IV".$row[2];
     $inv = "<a href='ref_ID.php?inv=$row[1]' target='_blank' >".$iv."</a>";
     $price = number_format($row[3],2);
     $button = '
     <a href="bill-sale.php?inv='.$row[1].'" target="_blank">
     <span class="btn-info btn"><i class="fa fa-print"></i> ใบเเสร็จธรรมดา</span>
     </a>
     <a href="bill-sale-vat.php?inv='.$row[1].'" target="_blank">
     <span class="btn-success btn"><i class="fa fa-file"></i> ใบเสร็จภาษี</span>
     </a>
     ';
     $channel = '<span class="badge bg-blue">'.$row[8].'</span>';

     $output['data'][] = array(    
         $inv,
		 $row[0],
		 $row[6],
         $row[7],
         $price,
         $channel,
         $button,
         $row[4],
         );
     array_push($output, $name);     
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);