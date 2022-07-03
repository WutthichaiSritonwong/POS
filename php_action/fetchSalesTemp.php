<?php     
require_once 'core.php';
require_once 'readThaiBath.php';
$user_id = $_SESSION['userId'];
$q = "SELECT username FROM users WHERE user_id ='$user_id' ";
$result = $connect->query($q);
$rs = $result->fetch_array();
$usern = $rs['0'];
?>
		<table class="table table-bordered">
			<thead>
			<tr class="bg-primary">
				<td style="width: 4%" class="text-center">#</td>
				<td style="width: 12%">รหัสสินค้า</td>
				<td style="width: 50%" class="text-center">ชื่อสินค้า</td>
				<td style="width: 12%" class="text-center">ราคาต่อหน่วย</td>
				<td class="text-center">จำนวน</td>
				<td style="width: 6%" class="text-center">หน่วย</td>
				<td style="width: 10%" class="text-center">รวมเป็นเงิน</td>
				<td style="width: 4%" class="text-center">ลบ</td>
			</tr>
			</thead>
			<tbody>
<?php
$sql = "SELECT order_item.product_id, products.product_id, products.product_name, order_item.quantity, 
		units.unitName, order_item.rate, order_item.discount
		FROM order_item 
		INNER JOIN products ON (order_item.product_id = products.pid)
		INNER JOIN units ON (products.uID = units.uID)
		WHERE rec_username = '$usern'
		ORDER BY order_item.order_item_id
		"; //echo $sql;
$result = $connect->query($sql);
$nums = $result->num_rows;
if($nums > 0) { 
	$i=0;
	$sum_total = 0;
 while($row = $result->fetch_array()) {
 	$n++;
	if($n%2==0){
		$bg = "#EDFBFE";
	} else {
		$bg = "#FFFFFF";
	}
     $i++;
     $id = $row[0];
	 $row3 = number_format($row[5],2);
	 $total = $row[3]*$row[5];
	 $format_total = number_format($total,2);
	 $unit = $row[4];
	 $discount = $row[6];
	 $grandTotal = $total - $discount;
	 $sum_total += $grandTotal;
	 $formatS_total = number_format($sum_total,2);
	 $format_grandtotal = number_format($grandTotal,2);
	 $format_discount = number_format($discount,2);
?>	
	<tr bgcolor="<?=$bg;?>">
		<td align="center"><?php echo $i; ?></td>
		<td><?php echo $row[1]; ?></td>
		<td><?php echo $row[2]; ?></td>
		<td align="right"><?php echo $row3;?></td>
		<td align="center"><?php echo $row[3];?></td>
		<td align="center"><?php echo $unit;?></td>
		<td align="right"><?php echo $format_grandtotal; ?> .-</td>
    	<td>
    		<button class="btn btn-danger btn-xs delete" value="<?php echo $id;?>">
    			<span class = "glyphicon glyphicon-trash"></span>
    		</button>
    	</td>
	</tr>
<?php } ?>
	</tbody>
<?php } else { ?>
	<tr>
		<td align="center" colspan="8"><div class="bg-maroon-active color-palette"><b>-  ยังไม่มีรายการขาย  -</b></div></td>
	</tr>
	</table>
<?php } $connect->close(); ?>