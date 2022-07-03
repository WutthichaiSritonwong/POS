<?php 
require_once 'php_action/core.php';
require_once 'php_action/readThaiBath.php';
$ref_id = $_GET['inv'];
$q = "
  SELECT customers.cust_name, customers.cust_phone, customers.cust_address, sales.sales_date, 
  sales.ref_docinv, sales.transaction, sales_channel.sale_channel
  FROM sales 
  INNER JOIN customers ON (customers.cust_id = sales.IDCust)
  INNER JOIN sales_channel ON (sales_channel.sale_channel_id = sales.sale_channel_id)
  WHERE sales.transaction = '$ref_id'
";
$result = $connect->query($q);
$rs = $result->fetch_array();
$refdocinv = $rs['ref_docinv'];
$date_Sales = $rs['sales_date']; 
list($year, $month, $day) = split('[/.-]', $date_Sales);
$year = $year+543;
$dateSales = $day."/".$month."/".$year;
$custIDC = $rs['custIDCard'];
$custName = $rs['cust_name'];
$custAdd = $rs['cust_address'];
$custPhone = $rs['cust_phone'];
$salesID = $rs['transaction'];
$sale_channel = $rs['sale_channel'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ระบบบริหารการขายสินค้า | MrG Soft</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="custom/css/custom.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">
  
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  
  <!-- jquery -->
    <script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>
  <script src="assests/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <?php include("headerMenu.php");?>
  <!-- Full Width Column -->
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>ระบบบริหารการขายสินค้า  <small>Version 1.0</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li class="active">รายการขาย</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
 
      <!-- Main row -->

	<div class="box box-success">


            <!-- /.box-header -->
      <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header text-light-blue">
            <i class="fa fa-globe"></i> รายการขายหมายเลขอ้างอิง #<?php echo $refdocinv;?>
            <small class="pull-right text-light-blue"><b>วันที่: <?php echo $dateSales;?></b></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>ไอที เน็ตเวิร์ค</strong><br>
            527/6  ซ.โนนพิบูลย์ ต.หมากแข้ง<br>
            อ.เมือง จ.อุดรธานี 41000<br>
            โทรศัพท์  084-5199890  042-324052<br>
            หมายเลขประจำตัวผู้เสียภาษี : 1101400073313
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <address>
            <strong><?php echo $custName;?></strong><br>
            <?php echo $custAdd;?><br>
            <?php echo $custAmphoe_City;?><br>
            โทรศัพท์: <?php echo $custPhone;?><br>
            หมายเลขประจำตัวผู้เสียภาษี : <?php echo $custIDC;?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>เลขอ้างอิง <?php echo ": INV".$refdocinv;?></b><br>
          <b>ช่องทางการขาย : <?php echo $sale_channel;?></b>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-hover">
            <thead>
            <tr class="bg-info">
              <th style="width:5%;text-align: center">ลำดับ</th>
              <th style="width:40%;text-align: center">รายละเอียด</th>
              <th style="width:10%;text-align: center">ราคาต่อหน่วย</th>
              <th style="width:10%;text-align: center">จำนวน</th>
              <th style="width:10%;text-align: center">หน่วย</th>
              <th style="width:10%;text-align: center">รวมจำนวน</th>
            </tr>
            </thead>
            <tbody>
            <?php
              $sql = "
              SELECT products.product_id, products.product_name, sales_item.quantity, units.unitName, sales_item.rate, 
              sales_item.total FROM products 
              INNER JOIN sales_item ON (products.pid = sales_item.product_id) 
              INNER JOIN units ON (products.uID = units.uID) 
              WHERE sales_item.sales_id = '$salesID' ORDER BY sales_item.sales_item_id
              ";
              $result = $connect->query($sql);
              $i=0;
             while($row = $result->fetch_array()) {
              $i++;
              $product = $row[0].'&nbsp;|&nbsp;'.$row[1];
              $unit = $row['unitName'];
              $stotal += $row['total'];
              $fs_total = number_format($stotal,2);
              $fprice = number_format($row['rate'],2);
              $ftotal = number_format($row['total'],2);
            ?>
            <tr >
              <td align="center"><?php echo $i;?></td>
              <td align="left"><?php echo $product;?></td>
              <td align="right"><?php echo $fprice;?> .-</td>
              <td align="center"><?php echo $row['quantity'];?></td>
              <td align="center"><?php echo $unit;?></td>
              <td align="right"><?php echo $ftotal;?> .-</td>
            </tr>
              <?php } ?>
            <tr class="bg-success">
              <td colspan="5" align="center"><strong>- <?php echo num2thai($stotal);?> -</strong>
              </td>
              <td align="right"><strong><?php echo $fs_total; ?> .-</strong></td>
            </tr>
            </tbody>
          </table>

        </div>
        <!-- /.col -->
      </div>

       <div class="row no-print">
        <div class="col-xs-12">
          <a href="bill-sale-vat.php?inv=<?php echo $ref_id;?>" target="_blank">
            <span class="btn-info btn pull-right"><i class="fa fa-print"></i> ใบเสร็จภาษี</span>
          </a>          
          <a href="bill-sale.php?inv=<?php echo $ref_id;?>" target="_blank">
            <span class="btn-success btn pull-right"><i class="fa fa-file"></i> ใบเเสร็จธรรมดา</span>
          </a>
        </div>
      </div>
    </section><br />

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
<?php 
include("footer.php");
$connect->close();
?>

</div>
<!-- ./wrapper -->

<!-- jQuery 3.1.1 -->
<script src="assests/jquery/jquery.js"></script>
</body>
</html>
