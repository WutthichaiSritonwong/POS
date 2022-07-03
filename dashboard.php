<?php 
include("php_action/core.php");

$countSql = "SELECT COUNT(categories_id) AS categories_id FROM categories ";
$result = $connect->query($countSql);
$rs = $result->fetch_array();
$countCategories = $rs['categories_id'];

$countSql = "SELECT COUNT(pid) AS count_pid FROM products WHERE status = '1' ";
$result = $connect->query($countSql);
$rs = $result->fetch_array();
$countProducts = $rs['count_pid'];


$salesSql = "SELECT COUNT(sales_id) AS sales_pid FROM sales WHERE sales_status = '1' ";
$result = $connect->query($salesSql);
$rs2 = $result->fetch_array();
$countSales = $rs2['sales_pid'];

$custSql = "SELECT COUNT(cust_id) AS count_customer FROM customers";
$result = $connect->query($custSql);
$rs3 = $result->fetch_array();
$countCust = $rs3['count_customer'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ระบบขายสินค้า | MrG Soft</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
      <h1>ระบบขายสินค้า  <small>Version 1.0</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li class="active">ข้อมูลรวม</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->


      <div class="row">
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>Categories</h4>
              <p>จำนวน <?php echo $countCategories;?> รายการ</p>
            </div>
            <div class="icon">
              <i class="fa fa-list"></i>
            </div>
            <a href="categories.php" class="small-box-footer"><h5>รายการประเภทสินค้า <i class="fa fa-arrow-circle-right"></i></h5></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4>Products</h4>
              <p>จำนวน <?php echo $countProducts;?> รายการ </p>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-pinterest-p"></i>
            </div>
            <a href="products.php" class="small-box-footer"><h5>รายการสินค้า <i class="fa fa-arrow-circle-right"></i></h5></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4>Selling Products</h4>
              <p>จำนวน <?php echo $countSales;?> รายการ</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="customers.php" class="small-box-footer"><h5>รายการขายสินค้าทั้งหมด <i class="fa fa-arrow-circle-right"></i></h5></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h4>POS</h4>
              <p>Point Of Sales</p>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-cart-plus"></i>
            </div>
            <a href="sales.php" class="small-box-footer"><h5>ขายสินค้า <i class="fa fa-arrow-circle-right"></i></h5></a>
          </div>
        </div>        
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h4>Customers</h4>
              <p>จำนวน <?php echo $countCust;?> ราย</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="customers.php" class="small-box-footer"><h5>ข้อมูลลูกค้าทั้งหมด <i class="fa fa-arrow-circle-right"></i></h5></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h4>Reports</h4>
              <p>รายงานขายสินค้าประจำวัน</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <a href="reportDaySummary.php" class="small-box-footer"><h5>รายงานสินค้าประจำวัน(สรุป) <i class="fa fa-arrow-circle-right"></i></h5></a>
          </div>
        </div>                
        <!-- ./col -->        
      </div>

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h4 class="box-title">รายการสั่งซื้อล่าสุด</h4>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th style="text-align: center">หมายเลขอ้างอิง</th>
                    <th style="text-align: center">วัน / เดือน / ปี</th>
                    <th style="text-align: center">ชื่อลูกค้า</th>
                    <th style="text-align: center">ที่อยู่</th>
                    <th style="text-align: center">โทรศัพท์</th>
                    <th style="text-align: center">ช่องทางขาย</th>
                    <th style="text-align: right">ยอดรวม(บาท)</th>
                    <th style="text-align: center">ผู้บันทึก</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $q = "SELECT sales.sales_date, sales.transaction, sales.ref_docinv, sales.grand_total, 
                  sales.username, customers.cust_id, customers.cust_name,customers.cust_address, 
                  customers.cust_phone, sales_channel.sale_channel
                  FROM sales 
                  INNER JOIN customers ON (sales.IDCust = customers.cust_id) 
                  INNER JOIN sales_channel ON (sales_channel.sale_channel_id = sales.sale_channel_id)
                  ORDER BY sales.ref_docinv DESC
                  LIMIT 0 , 10";    
                  $result_ = $connect->query($q);
                    while($row = $result_->fetch_array()) {
                  $dateSales = $row['0'];
                  $trans = $row['1'];
                  $inv = $row['2'];
                  $fsTotal = number_format($row['3'],2);
                  $custName = $row['6'];
                  $custAddress = $row['7'];
                  $custPhone = $row['8'];
                  $channel = $row['9'];
                  $userName = $row['4'];
                  ?>
                  <tr>
                    <td align="center"><a href="ref_ID.php?inv=<?php echo $trans;?>" target="_blank">#<?php echo $inv;?></a></td>
                    <td align="center"><span class="badge bg-yellow"><?php echo $dateSales;?></span></td>
                    <td align="left"><?php echo $custName;?></td>
                    <td align="left"><?php echo $custAddress;?></td>
                    <td align="center"><span class="badge bg-red"><?php echo $custPhone;?></span></td>
                    <td align="center"><span class="badge bg-blue"><?php echo $channel;?> </span></td>
                    <td align="right"><span class="badge bg-green"><?php echo $fsTotal;?></span></td>
                    <td align="center"><span class="badge bg-gray"><?php echo $userName;?></span></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="sales.php" class="btn btn-sm btn-info btn-flat pull-left">ขายสินค้า</a>
              <a href="listSales.php" class="btn btn-sm btn-success btn-flat pull-right">รายละเอียดการขายทั้งหมด</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">



          <!-- /.box -->
        </div>
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

<!-- file input -->
<script src="assests/plugins/fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>    
<script src="assests/plugins/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>    
<script src="assests/plugins/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
<script src="assests/plugins/fileinput/js/fileinput.min.js"></script>    
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script src="custom/js/customers.js"></script>
</body>
</html>
