<?php require_once 'php_action/core.php'; ?>
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
  <link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="custom/css/custom.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">
  
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
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
        <li class="active">ยี่ห้อสินค้า</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
 
      <!-- Main row -->

	<div class="box box-success">

            <div class="box-header">
              <h3 class="box-title">รายการยี่ห้อสินค้าทั้งหมด</h3>
			      <div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-primary button1" data-toggle="modal" data-target="#addBrandModel"> <i class="glyphicon glyphicon-plus-sign"></i> เพิ่มยี่ห้อสินค้า </button>
				  </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
			<div class="remove-messages"></div>
			<table id="manageBrandTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
					   <th style="width:10%;">#</th>
                            <th>ชื่อยี่ห้อสินค้า</th>
                            <th style="width:15%;">สถานะ</th>
                            <th style="width:15%;">แก้ไข - ลบ</th>
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

<!-- add brand -->
<div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        
        <form class="form-horizontal" id="submitBrandForm" action="php_action/createBrand.php" method="POST">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-plus"></i> เพิ่มยี่ห้อสินค้า</h4>
          </div>
          <div class="modal-body">

              <div id="add-brand-messages"></div>

            <div class="form-group">
                <label for="brandName" class="col-sm-3 control-label">ยี่ห้อสินค้า: </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="brandName" placeholder="Brand Name" name="brandName" autocomplete="off">
                    </div>
            </div> <!-- /form-group-->                         
            <div class="form-group">
                <label for="brandStatus" class="col-sm-3 control-label">สถานะ: </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-8">
                      <select class="form-control" id="brandStatus" name="brandStatus">
                          <option value="">~~เลือก~~</option>
                          <option value="1">มีสินค้าพร้อม</option>
                          <option value="2">ไม่มีสินค้า</option>
                      </select>
                    </div>
            </div> <!-- /form-group-->                         

          </div> <!-- /modal-body -->
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> ปิด</button>
            
            <button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off"><i class="glyphicon glyphicon-ok"></i> บันทึก</button>
          </div>
          <!-- /modal-footer -->
         </form>
         <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->


<!-- edit brand -->
<div class="modal fade" id="editBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        
        <form class="form-horizontal" id="editBrandForm" action="php_action/editBrand.php" method="POST">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไข</h4>
          </div>
          <div class="modal-body">

              <div id="edit-brand-messages"></div>

              <div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                        <span class="sr-only">Loading...</span>
                    </div>

              <div class="edit-brand-result">
                  <div class="form-group">
                    <label for="editBrandName" class="col-sm-3 control-label">ชื่อยี่ห้อสินค้า: </label>
                    <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="editBrandName" placeholder="Brand Name" name="editBrandName" autocomplete="off">
                        </div>
                </div> <!-- /form-group-->                         
                <div class="form-group">
                    <label for="editBrandStatus" class="col-sm-3 control-label">สถานะ: </label>
                    <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                          <select class="form-control" id="editBrandStatus" name="editBrandStatus">
                          <option value="">~~เลือก~~</option>
                          <option value="1">มีสินค้าพร้อม</option>
                          <option value="2">ไม่มีสินค้า</option>
                          </select>
                        </div>
                </div> <!-- /form-group-->    
              </div>                     
              <!-- /edit brand result -->

          </div> <!-- /modal-body -->
          
          <div class="modal-footer editBrandFooter">
            <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> ปิด</button>
            
            <button type="submit" class="btn btn-success" id="editBrandBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok"></i> บันทึก</button>
          </div>
          <!-- /modal-footer -->
         </form>
         <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->

<!-- /edit brand -->

<!-- remove brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> ลบชื่อยี่ห้อสินค้า </h4>
      </div>
      <div class="modal-body">
        <p>คุณต้องการที่จะลบใช่หรือไม่ ?</p>
      </div>
      <div class="modal-footer removeBrandFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> ปิด</button>
        <button type="button" class="btn btn-danger" id="removeBrandBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok"></i> ยืนยันลบ</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brand -->
  
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
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script src="custom/js/brand.js"></script>
</body>
</html>
