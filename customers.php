<?php 
require_once 'php_action/core.php'; 
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
        <li class="active">รายการลูกค้าทั้งหมด</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
 
      <!-- Main row -->

	    <div class="box box-success">

            <div class="box-header">
              <h3 class="box-title">รายการลูกค้าทั้งหมด</h3>
            <div class="div-action pull pull-right" style="padding-bottom:20px;">
              <a href="customersAdd.php">
                <button class="btn btn-primary button1" >
                <i class="glyphicon glyphicon-plus-sign"></i> เพิ่มข้อมูลลูกค้า </button>
              </a>
       
            </div> <!-- /div-action -->  
            </div>

            <!-- /.box-header -->

            <div class="box-body">

			      <div class="remove-messages"></div>          

			      <table id="manageCustomersTable" class="table table-bordered table-striped table-hover">
              <thead>
              <tr>
				        <th style="text-align: center;width:2%;">#</th>
				        <th style="text-align: center;width:5%;">รหัส</th>
                <th style="text-align: center;width:10%;">ชื่อลูกค้า</th>
                <th style="text-align: center;width:7%;">โทรศัพท์</th>
                <th style="text-align: center;width:30%;">ที่อยู่</th>
                <th style="text-align: center;width:10%;">หมายเหตุ</th>
                <th style="text-align: center;width: 5%;">แก้ไข-ลบ</th>
              </tr>
              </thead>
            </table>
            </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Remove Customer -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeCustomerModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> ลบรายชื่อลูกค้า </h4>
      </div>
      <div class="modal-body">
        <p>คุณต้องการจะลบรายชื่อลูกค้าใช่หรือไม่ ?</p>
      </div>
      <div class="modal-footer removeCategoriesFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> ยกเลิก</button>
        <button type="button" class="btn btn-danger" id="removeCustomerBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> ยืนยันลบ</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->

  
 <?php include("footer.php");?>

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

<!-- page script -->
<script src="custom/js/customers.js"></script>
</body>
</html>
