<?php
include("mpdf/mpdf.php");
//$mpdf=new mPDF('th','A5-L'); 
$mpdf=new mPDF('th','A5-L', 0, 0, 5, 5, 5, 5); 

$html='

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size: 18 px">นาข่า-คูณสมบัติ-089-8636871 หินทราย</td>
    <td width="10%" align="center" style="font-size: 18 px">20/11/2561</td>
    <td width="10%" align="center" style="font-size: 18 px">09:07</td>
    <td width="10%" align="left" style="font-size: 18 px">B09881</td>
    <td rowspan="2" align="right" style="font-size: 30 px;font-weight: bold;text-decoration: underline;">2,040.00</td>
  </tr>
  <tr>
    <td style="font-size: 18 px">tpn-510-297-4561 คูณพรมวงษ์</td>
    <td width="10%" align="center" style="font-size: 18 px">20/11/2561</td>
    <td width="10%" align="center" style="font-size: 18 px">&nbsp;</td>
    <td width="10%" align="left" style="font-size: 18 px">P1/005126</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 18 px">
  <tr>
    <td width="13%" align="center" bgcolor="#CCCCCC">รหัสสินค้า</td>
    <td align="center" bgcolor="#CCCCCC">รายการ</td>
    <td width="10%" align="center" bgcolor="#CCCCCC">จำนวน</td>
    <td width="12%" align="center" bgcolor="#CCCCCC">หน่วยละ</td>
    <td width="12%" align="center" bgcolor="#CCCCCC">จำนวนเงิน</td>
    <td width="8%">&nbsp;</td>
  </tr>
  <tr>
    <td height="310" valign="top">HIN<br />
    HIN01<br />
    POONCM</td>
    <td valign="top">หิน *3/4<br />
    ทราย<br />
    ปูนแดง</td>
    <td align="center" valign="top">2<br />
      1<br />
      3</td>
    <td align="right" valign="top">600.00<br />
    450.00<br />
    130.00</td>
    <td align="right" valign="top">1,200.00<br />
    450.00<br />
    390.00</td>
    <td align="right" valign="top">12 P<br />
    6 P<br />
    13 P</td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 18 px">
  <tr>
    <td width="60%">&nbsp;</td>
    <td align="right" style="font-size: 30 px;font-weight: bold;text-decoration: underline;">2,040.00</span></td>
  </tr>
  <tr>
    <td>โทรสั่งสินค้าล่วงหน้า-สะดวก-รวดเร็ว-ไม่ต้องรอ<br />
    086-6373767, 086-6386622, 042-292111-2 F042292505<br />
    ** สินค้าซื้อขาด-ไม่รับเปลี่ยน/คืน ** หยุดวันอาทิตย์</td>
    <td align="right" valign="top"><span style="font-size:18 px">อึ้งไล้เฮง - โชคดีตราชั่ง</span><br />
    223 หมู่ 3 กม.ที่ 4 ถ.อุดร-ขอนแก่น<br />อ.เมือง จ.อุดรธานี 41000
  </td>
  </tr>
</table>


';


$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;  
$mpdf->WriteHTML($html,2);
$mpdf->Output();
exit;
?>