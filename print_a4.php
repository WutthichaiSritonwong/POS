<?php

include "php_action/core.php";
include "mpdf/mpdf.php";
include "php_action/readThaiBath.php";

$mpdf = new mPDF('th','A4');     //Portrait Page
//$mpdf=new mPDF('th',array(236,190));   //Landscape Page

$user_id = $_SESSION['userId'];
$q = "SELECT username FROM users WHERE user_id ='$user_id' ";
$result = $connect->query($q);
$rs = $result->fetch_array();
$usern = $rs['0'];

$q = "SELECT sales.sales_date, sales.transaction, sales.IDCust, customers.custIDCard, customers.custName, 
	customers.custAddress, customers.custPhone
	FROM sales
	INNER JOIN customers ON ( customers.custIDCard = sales.IDCust ) 
	WHERE sales.username =  '$usern'
	ORDER BY sales.sales_id DESC LIMIT 1;
	";
$result = $connect->query($q);
$rs = $result->fetch_array();
$sales_date = $rs['0'];
$transaction = $rs['1'];
$IDCust = $rs['2'];
$custIDCard = $rs['3'];
$custName = $rs['4'];
$custAddress = $rs['5'];


$html .= '
<div align="center" style="font-family: Garuda;font-size: 30px">บริษัท  จีซอฟท์ จำกัด <br/>
<div align="center" style="font-family: Garuda;font-size: 20px">
242/35 ซ.จันทร์สว่าง  ถ.อุดรดุษฏี  ต.หมากแข้ง  อ.เมืองอุดรธานี  จ.อุดรธานี  41000 <br />
โทรศัพท์  084-5135800  โทรสาร  042-123456  หมายเลขประจำตัวผู้เสียภาษี  4410100009092 สาขาที่  สำนักงานใหญ่
</div>
</div><hr color="#000000">
<div align="center" style="font-family: Garuda;font-size: 30px">
ใบกํากับภาษี / ใบเสร็จรับเงิน
</div>
<table width="100%" border="0" cellpadding="0" cellspacing="1" 
bgcolor="#000000" style="font-family: Garuda;font-size: 18px">
  <tr>
    <td bgcolor="#FFFFFF" width="75%">
    ชื่อลูกค้า&nbsp;' .$custName. '<br />
	ที่อยู่&nbsp;' .$custAddress. '<br />
	หมายเลขประจำตัวผู้เสียภาษี&nbsp;' .$IDCust. '
    </td>
    <td bgcolor="#FFFFFF" valign="top" width="25%">
    วันที่&nbsp;' .$sales_date. '<br />
    </td>
  </tr>
</table><br />
';


$html .= '
<table width="100%"  style="font-family: Garuda;font-size: 16px">
  <tr>
  	<td bgcolor="#EAEAEA" align="center" width="5%"><b>ลำดับ</b></td>
  	<td bgcolor="#EAEAEA" align="center" width="10%"><b>รหัสสินค้า</b></td>
  	<td bgcolor="#EAEAEA" align="center" width="35%"><b>รายละเอียด</b></td>
  	<td bgcolor="#EAEAEA" align="center" width="12%"><b>ราคาต่อหน่วย</b></td>
  	<td bgcolor="#EAEAEA" align="center" width="5%"><b>จำนวน</b></td>
  	<td bgcolor="#EAEAEA" align="center" width="8%"><b>ส่วนลด</b></td>
  	<td bgcolor="#EAEAEA" align="center" width="12%"><b>รวมเป็นเงิน</b></td>
  </tr>
';

$sql = "SELECT * 
		FROM sales
		INNER JOIN sales_item ON ( sales.transaction = sales_item.order_id ) 
		INNER JOIN customers ON ( customers.custIDCard = sales.IDCust ) 
		WHERE transaction = '$transaction' AND sales.username =  '$usern'
		ORDER BY sales_item.order_item_id 
	 ";

$result = $connect->query($sql);
$num = $result->num_rows;
	$n = 0;
    while($row = $result->fetch_array()) {
    $n++;
    $id = $row[0];
	$row3 = number_format($row['rate'],2);
	$total = $row['rate']*$row['quantity'];
	$format_total = number_format($total,2);
	$discount = $row['discount'];
	$grandTotal = $total - $discount;
	$sum_discount += $discount;
	$format_sum_discount = number_format($sum_discount,2);
	$sum_total += $grandTotal;
	$grandTotalVAT = $sum_total * 1.07;
	$FgrandTotalVAT = number_format($grandTotalVAT,2);
	$vat = $grandTotalVAT - $sum_total;
	$$sum_total - $sum_discount;
	$Fvat = number_format($vat,2);
	$formatS_total = number_format($sum_total,2);
	$format_grandtotal = number_format($grandTotal,2);
	$format_discount = number_format($discount,2);
    
$html .= '
    <tr>
    <td align="center">' . $n . '</td>
    <td align="">' . $row['product_id'] . '</td>
    <td align="">' . $row['product_id'] . '</td>
    <td align="right">' . $row3 . '</td>
    <td align="center">' . $row['quantity'] . '</td>
    <td align="right">' . $discount . '</td>
    <td align="right">' . $format_grandtotal . '</td>
    </tr>';
}

$html .= '
<tr>
	<td bgcolor="#EAEAEA" colspan="2" align="center"><b>หมายเหตุ</b></td>
	<td bgcolor="#EAEAEA" colspan="3" align="center"></td>
	<td bgcolor="#EAEAEA">&nbsp;ราคารวม</td>
	<td bgcolor="#EAEAEA" align="right">' . $formatS_total . '</td>
</tr>
<tr>
	<td bgcolor="#FFFFFF" colspan="5"></td>
	<td bgcolor="#EAEAEA">&nbsp;ส่วนลด</td>
	<td bgcolor="#EAEAEA" align="right">' . $format_sum_discount . '</td>
</tr>
<tr>
	<td bgcolor="#FFFFFF" colspan="5"></td>
	<td bgcolor="#EAEAEA">&nbsp;ราคาสินค้า</td>
	<td bgcolor="#EAEAEA" align="right">' . $formatS_total . '</td>
</tr>
<tr>
	<td bgcolor="#FFFFFF" colspan="5"></td>
	<td bgcolor="#EAEAEA">&nbsp;ภาษีมูลค่าเพิ่ม 7%</td>
	<td bgcolor="#EAEAEA" align="right">' . $Fvat . '</td>
</tr>
<tr>
	<td bgcolor="#FFFFFF" colspan="5"></td>
	<td bgcolor="#EAEAEA">&nbsp;ราคารวมสุทธิ</td>
	<td bgcolor="#EAEAEA" align="right">' . $FgrandTotalVAT . '</td>
</tr>
<tr>
	<td align="center" bgcolor="#EAEAEA" colspan="2"><b>ราคารวมทั้งสิ้น</b></td>
	<td align="center" bgcolor="#EAEAEA" colspan="4"><b>- ' . num2thai($grandTotalVAT). ' -</b></td>
	<td align="right" bgcolor="#EAEAEA"><b>' . $FgrandTotalVAT . '</b></td>
</tr>
</table>
';



$html .= '<br /><br /><hr />
<table width="100%" border="0" cellpadding="0" cellspacing="1" 
bgcolor="#000000" style="font-family: Garuda;font-size: 18px">
  <tr>
    <td bgcolor="#FFFFFF" width="50%">
    ผู้ส่งสินค้า
    </td>
  </tr>
</table><br />
';

//$html .= '<hr>';
$connect->close();
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;  
$mpdf->WriteHTML($html,2);
$mpdf->SetAutoFont();
$mpdf->Output('testpdf.pdf','I');
exit();
?>
