<?php     

require_once 'core.php';

$sql = "SELECT order_item.product_id, product.product_name, order_item.quantity, order_item.rate
		FROM order_item 
		INNER JOIN product ON (order_item.product_id = product.product_id)
		ORDER BY order_item.order_item_id
		";
$result = $connect->query($sql);

//$output = array('data' => array());
$output = array();

if($result->num_rows > 0) { 

 $i=0;
 while($row = $result->fetch_array()) {
     $i++;
     $id = $row[0];
	 $row2 = number_format($row[2],2);
	 $row3 = number_format($row[3],2);
	 $total = $row[2]*$row[3];
	 $format_total = number_format($total,2);
     $button = '<!-- Single button -->
    <div class="btn-group">
        <a href="#" type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeBrands('.$id.')"> <i class="glyphicon glyphicon-trash"></i> ลบ</a>
    </div>';
    
     $output['data'][] = array(
                                $i,
								$row[0],
                                $row[1],
                                $row3,
								$row2,
								$format_total,
                                $button
                                );        


    array_push($output, $name);     
    
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);