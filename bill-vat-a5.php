<?php
include "php_action/core.php";
include "mpdf/mpdf.php";
$mpdf=new mPDF('th','A5-L', 0, 0, 5, 5, 5, 5); 
$iv = $_GET['inv'];
//============================================================================
$user_id = $_SESSION['userId'];
$q = "SELECT username FROM users WHERE user_id ='$user_id' ";
$result = $connect->query($q);
$rs = $result->fetch_array();
$usern = $rs['0'];
//============================================================================
$q1 = "SELECT sales.sales_date, sales.sales_time, sales.ref_docinv, sales.transaction, sales.grand_total, 
      sales.username, customers.cust_id, customers.cust_name, customers.cust_address
      FROM sales 
      INNER JOIN customers ON (sales.IDCust = customers.cust_id) 
      WHERE ref_docinv = '$iv' AND sales.username = '$usern' 
      ";
$result = $connect->query($q1);
$rs = $result->fetch_array();
$date_sale = $rs[0];
$time_sale = $rs[1];
$refid = $rs[2];
$transID = $rs[3];  
$custName = $rs[7];
$custAddress = $rs[8];
$total = number_format($rs[4],2);
$ref_id = "IV".$refid;
//============================================================================
$q2 = "SELECT * FROM sales_item INNER JOIN products ON (sales_item.product_id = products.pid) 
    WHERE sales_item.sales_id = '$transID' 
    ";
$result2 = $connect->query($q2);
$count_r = $result2->num_rows;
//============================================================================
$header='

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="70%" align="left" style="font-size:24px">อึ้งไล้เฮง (นายวิชัย&nbsp; อิงคณะองอาจ) สำนักงานใหญ่</td>
    <td width="30%" rowspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000" >
      <tr>
        <td height="60" align="center" bgcolor="#CCCCCC" style="font-size:16px">&nbsp;&nbsp;&nbsp;ใบเสร็จรับเงิน / ใบกำกับภาษี&nbsp;&nbsp;&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr align="left">
    <td width="70%" style="font-size:14px">223 หมู่ 3 กม.ที่ 4 ถ.อุดร-ขอนแก่น อ.เมือง จ.อุดรธานี 41000<br />
      โทรศัพท์ 042-292111-2&nbsp;&nbsp;โทรสาร 042-292505&nbsp;&nbsp;&nbsp;&nbsp;เลขที่ผู้เสียภาษี
    &nbsp;&nbsp;3101300045756</td>
  </tr>
</table>
';

$html ='
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:14px">
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000">
      <tr>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>ชื่อลูกค้า</td>
              <td style="font-weight: bold">ร้านพูนกิจอุปกรณ์</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>152 ม.11 ต.ทับกุง อ.หนองแสง จ.อุดรธานี</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td></td>
            </tr>
            <tr>
              <td width="10%">&nbsp;</td>
              <td>เลขที่ผู้เสียภาษี 3410400896001</td>
            </tr>
        </table></td>
      </tr>
    </table></td>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000">
      <tr>
        <td valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="45%">วันที่เอกสาร</td>
            <td>21/11/2561</td>
          </tr>
          <tr>
            <td width="45%">เลขที่เอกสาร</td>
            <td>V58/22663</td>
          </tr>
          <tr>
            <td width="45%">เลขที่ใบกำกับภาษี</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="45%">พนักงานขาย</td>
            <td>'.$usern.'</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000">
      <tr>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2" align="center">คลังสินค้า</td>
            </tr>
          <tr>
            <td colspan="2" align="center">01</td>
            </tr>
          <tr>
            <td width="45%">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="45%">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="3" bgcolor="#000000" style="font-size:14px">
  <tr>
    <td height="3%" align="center" bgcolor="#CCCCCC">ลำดับ</td>
    <td align="center" bgcolor="#CCCCCC">รหัสสินค้า</td>
    <td align="center" bgcolor="#CCCCCC">รายการสินค้า</td>
    <td height="10%" align="center" bgcolor="#CCCCCC">จำนวน</td>
    <td height="12%" align="center" bgcolor="#CCCCCC">หน่วยละ</td>
    <td height="12%" align="center" bgcolor="#CCCCCC">ส่วนลด</td>
    <td height="15%" align="center" bgcolor="#CCCCCC">จำนวนเงิน</td>
  </tr>
  <tr>
    <td height="140" align="center" valign="top" bgcolor="#FFFFFF">1<br />
    2</td>
    <td valign="top" bgcolor="#FFFFFF">1PP2Y3<br />
    1PP2Y15</td>
    <td valign="top" bgcolor="#FFFFFF">ประปา Y 3"*25.5-770-796-1000/19<br />
    ประปา Y 11/2"*12-382-394-470</td>
    <td align="center" valign="top" bgcolor="#FFFFFF">5 ส<br />
    8 ส</td>
    <td align="right" valign="top" bgcolor="#FFFFFF">1,000.00<br />
    470.00</td>
    <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFFFFF">5,000.00<br />
    3,760.00</td>
  </tr>
  
  <tr>
    <td colspan="7" align="center" bgcolor="#CCCCCC">- แปดพันเจ็ดร้อยหกสิบบาทถ้วน -</td>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="80%" rowspan="3" valign="top" bgcolor="#FFFFFF">ได้รับสินค้าถูกต้องตามรายการข้างบนแล้วสินค้าซื้อแล้วไม่รับเปลี่ยนคืน<br />
          กรรมสิทธิ์ในสินค้าตามสัญญานี้ยังไม่โอนเป็นของผู้ซื้อ<br />
          จนกว่าผู็ขายจะได้รับชำระตามสัญญานี้แล้ว</td>
        <td width="15%" bgcolor="#FFFFFF">รวมเงินทั้งสิ้น</td>
        <td width="15%" align="right" bgcolor="#FFFFFF">8,760.00</td>
      </tr>
      <tr>
        <td width="15%" bgcolor="#FFFFFF">ภาษีมูลค่าเพิ่ม 7%</td>
        <td width="15%" align="right" bgcolor="#FFFFFF">573.08</td>
      </tr>
      <tr>
        <td width="15%" bgcolor="#FFFFFF">รวมมูลค่าสินค้า</td>
        <td width="15%" align="right" bgcolor="#FFFFFF">8,186.92</td>
      </tr>
    </table></td>
  </tr>
</table><br />
';

$footer = '
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000" style="font-size:14px">
  <tr>
    <td height="65" align="center" bgcolor="#FFFFFF">....................................<br />
    ผู้อนุมัติ</td>
    <td height="65" align="center" bgcolor="#FFFFFF">....................................<br />
ผู้ส่ง</td>
    <td height="65" align="center" bgcolor="#FFFFFF">....................................<br />
ผู้รับสินค้า</td>
    <td height="65" align="center" bgcolor="#FFFFFF">....................................<br />
ผู้รับเงิน</td>
  </tr>
</table>

';

$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLFooter($footer);
$mpdf->AddPage();
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;  
$mpdf->WriteHTML($html,2);
$mpdf->Output();
exit;
$connect->close();
?>