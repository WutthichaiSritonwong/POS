<?php

include "php_action/core.php";
include "mpdf/mpdf.php";
include "php_action/readThaiBath.php";
$mpdf = new mPDF('th','A5-L', 4, 3, 3, 3, 5, 5, 'L'); 
$iv = $_GET['inv'];
//============================================================================
$user_id = $_SESSION['userId'];
$q = "SELECT username FROM users WHERE user_id ='$user_id' ";
$result = $connect->query($q);
$rs = $result->fetch_array();
$usern = $rs['0'];
//============================================================================
$q1 = "SELECT sales.sales_date, sales.ref_docinv, sales.transaction, sales.sub_total, sales.vat, 
      sales.grand_total, sales.username, customers.cust_id, customers.cust_name, 
      customers.cust_address, customers.cust_phone
      FROM sales INNER JOIN customers ON (sales.IDCust = customers.cust_id)
      WHERE sales.transaction = '$iv' AND sales.username = '$usern' 
      ";
$result = $connect->query($q1);
$rs = $result->fetch_array();
$date_sale = $rs[0];
list($year, $month, $day) = split('[/.-]', $date_sale);
$dateSales = $day."/".$month."/".$year;
$refid = $rs[1];
$transID = $rs[2];
$sub_total = $rs[3];
$vat = $rs[4];
$total = $rs[5];
$custName = $rs[8];
$custAddress = $rs[9];
$custTel = $rs[10];

$fsub_total = number_format($sub_total,2);
$fvat = number_format($vat,2);
$ftotal = number_format($total,2);
//============================================================================
$header='
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="15%" align="left" valign="top">&nbsp;&nbsp;&nbsp;<img src="assests/images/logo.jpg" width="110"></td>
    <td width="85%">
      <div style="font-family: thsarabun;font-size:20px;font-weight:bold;color:#000000">ไอที เน็ตเวิร์ค</div><br />
      <div style="font-family: thsarabun;font-size:18px;font-weight:bold;color:#000000">527/6  ซ.โนนพิบูลย์ ต.หมากแข้ง อ.เมือง จ.อุดรธานี 41000<br />
      IT NETWORK 527/6 NonPibun , Amphoe Mueng Udonthani 41000</div><br />
      <div style="font-family: thsarabun;font-size:18px;font-weight:bold;color:#000000">
      TAX ID: 1101400073313&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      TEL: 084-5199890, 042-324052</div>
    </td>
  </tr>
</table>
';

$html ='<br /><br /><br /><br /><br /><br /><br /><br /><br />';
$html .= '<hr style="height:1.5 px;border-width:0;color:#000000;background-color:#000000"><br /><br />
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="35%" height="30" style="text-align:center;font-family: thsarabun;font-size:22px;font-weight:bold;color:#fff" width="10%" bgcolor="#000000">&nbsp;&nbsp;&nbsp;Receipt/Tax Invoice : '.$refid.'&nbsp;&nbsp;&nbsp;
    </td>
    <td width="40%" height="30">&nbsp;</td>
    <td width="25%" height="30" style="text-align:center;font-family: thsarabun;font-size:22px;font-weight:bold;color:#fff" width="10%" bgcolor="#000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$dateSales.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </td>
  </tr>
  <tr>
    <td width="100%" colspan="3" style="font-family: thsarabun;font-size:16px;font-weight:bold;color:#000000">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$custName.'&nbsp;&nbsp;&nbsp;('.$custTel.')<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$custAddress.'<br />
    </td>
  </tr>
</table><br />
';

$html .= '
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#000000" style="font-family: thsarabun;font-size:20px;font-weight:bold;color:#000000">
  <tr>
    <td width="5%" align="center" bgcolor="#ffffff">No.</td>
    <td width="40%" align="center" bgcolor="#ffffff">Detail List</td>
    <td width="10%" align="center" bgcolor="#ffffff">Quantity</td>
    <td width="10%" align="center" bgcolor="#ffffff">Unit</td>
    <td width="10%" align="center" bgcolor="#ffffff">Amount</td>
    <td width="15%" align="center" bgcolor="#ffffff">Total Amount</td>
  </tr>
';
//============================================================================
$q2 = "SELECT products.product_id, products.product_name, sales_item.quantity, sales_item.rate, sales_item.total 
    FROM sales_item INNER JOIN products ON (sales_item.product_id = products.pid) 
    WHERE sales_item.sales_id = '$transID' 
    ";
$result2 = $connect->query($q2);    
$i=0;
  while($row = $result2->fetch_array()) {
$i++;
$pd_code = $row['product_id'];
$pd_name = $row['product_name'];
$sales_qty = $row['quantity'];
$rate = $row['rate'];
$total_d = $row['total'];
$product = $pd_code."-".$pd_name;


$html .='
  <tr>
    <td width="5%" align="center" bgcolor="#FFFFFF">'.$i.'</td>
    <td width="40%" align="left" bgcolor="#FFFFFF">'.$product.'</td>
    <td width="10%" align="center" bgcolor="#FFFFFF">'.$sales_qty.'</td>
    <td width="10%" align="center" bgcolor="#FFFFFF">Piece</td>
    <td width="10%" align="right" bgcolor="#FFFFFF">'.$rate.'</td>
    <td width="15%" align="right" bgcolor="#FFFFFF">'.$total_d.'</td>
  </tr>
';
}

$html .='</table>';



$html .='
<table width="100%" style="font-family: thsarabun;font-size:20px;font-weight:bold;color:#000000" align="right">
<tr style="background-color: #fff;">
  <td style="text-align:center;" width="5%" height="30"></td>
  <td style="text-align:center;" width="40%" height="30"></td>
  <td style="text-align:center;" width="10%" height="30"></td>
  <td style="text-align:center;" width="10%" height="30"></td>
  <td style="text-align:right;" width="10%" colspan="2" height="30"><b>Total Amount</b></td>
  <td style="text-align:right;border-bottom:1.5pt double #000000;" width="15%">'.$ftotal.'&nbsp;</td>
</tr>
';
$html .='
<tr style="background-color: #fff;" height="30">
  <td style="text-align:center;" height="30"></td>
  <td style="text-align:center;" height="30"></td>
  <td style="text-align:center;" height="30"></td>
  <td style="text-align:center;" height="30"></td>
  <td style="text-align:right;" colspan="2" height="30"></td>
  <td style="text-align:center;" height="30"></td>
</tr>
';
$html .='
<tr style="background-color: #fff;" height="30">  
  <td style="text-align:center;font-family: thsarabun;font-size:22px;font-weight:bold;color:#fff" width="10%" bgcolor="#000000"
   colspan="4" height="30">( '.num2thai($total).' )</td>
  <td style="text-align:right;" colspan="2" height="30"></td>
  <td style="text-align:center;" height="30"></td>
</tr>
</table>
';

$footer = '
<br /><br /><br /><br /><br /><br /><br /><br /><br />
<table cellpadding="0" cellspacing="0" width="80%" style="font-family: thsarabun;font-size:20px;font-weight:bold;color:#000000" align="center">
  <tr>
    <td width="30%">&nbsp;</td>
    <td width="40%">&nbsp;</td>
    <td width="30%" align="center"></td>
  </tr>
  <tr>
    <td width="30%" style="text-align:center;border-top:1.0pt dotted #000000;" height="30">Accept Payment By</td>
    <td width="40%"></td>
    <td width="30%" style="text-align:center;border-top:1.0pt dotted #000000;" height="30">Authorized</td>
  </tr>
</table>
';

$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLFooter($footer);
$mpdf->AddPage();
$mpdf->WriteHTML($html,2);
$mpdf->SetDisplayMode('real');
$mpdf->list_indent_first_level = 0;  
$mpdf->Output();
exit();
$connect->close();
