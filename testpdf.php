<?php
session_start();  
ob_start();
include("mpdf.php");
$mpdf=new mPDF('th',array(190,236));     //Portrait Page
//$mpdf=new mPDF('th',array(236,190));   //Landscape Page

$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("testjq");
$sql = "SELECT * FROM customer ";
mysql_query("SET NAMES UTF8");
$result = mysql_query($sql);

$html .= '
<p style="font-family: Garuda">ทดสอบ PDF ภาษาไทย</p>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#666666">
<tr bgcolor="#CCCCCC">
<td>Cust ID</td>
<td>Name</td>
<td>Email</td>
<td>Country</td>
</tr>
';

    while ($rows = mysql_fetch_array($result)) {
     
$html .= '
    <tr>
    <td bgcolor="#FFFFFF" style="font-family: Garuda">' . $rows['CustomerID'] . '</td>
    <td bgcolor="#FFFFFF" style="font-family: Garuda">' . $rows['Name'] . '</td>
    <td bgcolor="#FFFFFF" style="font-family: Garuda">' . $rows['Email'] . '</td>
    <td bgcolor="#FFFFFF" style="font-family: Garuda">' . $rows['CountryCode'] . '</td>
    </tr>';
}
$html .= '</table>';
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;  
$mpdf->WriteHTML($html,2);
$mpdf->SetAutoFont();
$mpdf->Output('testpdf.pdf','I');
exit();
?>