<?php
include("mpdf/mpdf.php");
//$mpdf=new mPDF('th','A5-L'); 
$mpdf=new mPDF('th','A5-L', 0, 0, 10, 10, 10, 10); 

$html='

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="70" colspan="2" align="center" style="font-family: Garuda;font-size:24px"><b>รายงานค่าจ้างพนักงาน</b>
    <br />อึ้งไล้เฮง (นายวิชัย&nbsp; อิงคณะองอาจ) สำนักงานใหญ่</td>
  </tr>
  <tr>
    <td width="90%" style="font-family: Garuda;font-size:18px">ระหว่างวันที่&nbsp;&nbsp;<span style="text-decoration: underline;"> 19/11/2561 </span>&nbsp;&nbsp;&nbsp;&nbsp; ถึงวันที่&nbsp;&nbsp;<span style="text-decoration: underline;"> 26/11/2561 </span></td>
    <td style="font-family: Garuda;font-size:18px">หน้าที่ 1/1</td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000">
  <tr>
    <td width="10%" align="center" bgcolor="#CCCCCC" style="font-family: Garuda;font-size:16px">วันที่</td>
    <td width="20%" align="center" bgcolor="#CCCCCC" style="font-family: Garuda;font-size:16px">ชื่อพนักงาน</td>
    <td width="10%" align="center" bgcolor="#CCCCCC" style="font-family: Garuda;font-size:16px">เวลาเข้าเช้า</td>
    <td width="10%" align="center" bgcolor="#CCCCCC" style="font-family: Garuda;font-size:16px">เวลาออกเช้า</td>
    <td width="10%" align="center" bgcolor="#CCCCCC" style="font-family: Garuda;font-size:16px">เวลาเข้าบ่าย</td>
    <td width="10%" align="center" bgcolor="#CCCCCC" style="font-family: Garuda;font-size:16px">เวลาออกบ่าย</td>
    <td width="10%" align="center" bgcolor="#CCCCCC" style="font-family: Garuda;font-size:16px">รวมเวลา</td>
    <td width="10%" align="center" bgcolor="#CCCCCC" style="font-family: Garuda;font-size:16px">ค่าจ้าง/ชม.</td>
    <td align="center" bgcolor="#CCCCCC" style="font-family: Garuda;font-size:16px">เบิกล่วงหน้า</td>
    <td align="center" bgcolor="#CCCCCC" style="font-family: Garuda;font-size:16px">รวมค่าจ้าง</td>
  </tr>
  <tr>
    <td height="320" valign="top" bgcolor="#FFFFFF" style="font-family: Garuda;font-size:16px" align="center">21/11/2561</td>
    <td valign="top" bgcolor="#FFFFFF" style="font-family: Garuda;font-size:16px">&nbsp;ตา2</td>
    <td valign="top" bgcolor="#FFFFFF" style="font-family: Garuda;font-size:16px" align="center">13:42</td>
    <td valign="top" bgcolor="#FFFFFF" style="font-family: Garuda;font-size:16px" align="center">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF" style="font-family: Garuda;font-size:16px" align="center">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF" style="font-family: Garuda;font-size:16px" align="center">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF" style="font-family: Garuda;font-size:16px" align="center">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF" style="font-family: Garuda;font-size:16px" align="center">40.00</td>
    <td valign="top" bgcolor="#FFFFFF" style="font-family: Garuda;font-size:16px" align="right">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF" style="font-family: Garuda;font-size:16px" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" bgcolor="#CCCCCC" style="font-family: Garuda;font-size:18px">&nbsp;&nbsp;&nbsp;&nbsp;รวม&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1&nbsp; รายการ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    รวมจำนวนเงินทั้งสิ้น</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>


';


$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;  
$mpdf->WriteHTML($html,2);
$mpdf->Output();
exit;
?>