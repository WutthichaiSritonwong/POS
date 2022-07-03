<?php 
require_once 'php_action/core.php'; 
$user_id = $_SESSION['userId'];
$id = $_GET['edit'];
$sql = "
SELECT products.pid, products.product_id, products.product_name, categories.categories_name, 
products.categories_id,products.quantity, products.uID, units.unitName, products.rate, products.status 
FROM products 
INNER JOIN units ON (products.uID = units.uID) 
INNER JOIN categories ON (products.categories_id = categories.categories_id) 
WHERE products.pid = '$id'
";
$query = $connect->query($sql);
$rs = $query->fetch_assoc();
$status = $rs['status'];
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
      <h1>ระบบบริหารการขายสินค้า</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li class="active">เพิ่มข้อมูลสินค้า</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
 
      <!-- Main row -->

	    <div class="box box-success">

            <div class="box-header">
              <h3 class="box-title">แก้ไข้ข้อมูลสินค้า</h3>
            </div>
              <form action="php_action/editProduct.php" method="post" class="form-horizontal" id="productEditForm">
			  <input type="hidden" name="pID" value="<?php echo $id;?>">
                    <fieldset>
                      <div class="editProductMessages"></div>
                      <div class="form-group">
                        <label for="productEditForm" class="col-sm-4 control-label">รหัสสินค้า</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="productCode" name="productCode"  
                          autocomplete="off" value="<?php echo $rs['product_id'];?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="productEditForm" class="col-sm-4 control-label">ชื่อสินค้า</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="productName" name="productName" placeholder="ชื่อสินค้า" 
                          autocomplete="off" value="<?php echo $rs['product_name'];?>">
                        </div>
                      </div>

                      <div class="form-group">
                          <label for="productEditForm" class="col-sm-4 control-label">ประเภทสินค้า: </label>
                              <div class="col-sm-4">
                                <select class="form-control" id="categories" name="categories">
                                    <option value="<?php echo $rs['categories_id'];?>" selected="">
										<?php echo $rs['categories_name'];?>
									</option>
									<option disabled>~~เลือก~~</option>
                                    <?php 
                                      $sql = "SELECT categories_id, categories_name FROM categories WHERE categories_active ='1' ";
                                      $result = $connect->query($sql);
                                        while($row = $result->fetch_array()) {
                                        echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                      } 
                                          
                                    ?>
                                </select>
                              </div>
                      </div>

                      <div class="form-group">
                        <label for="productEditForm" class="col-sm-4 control-label">จำนวน</label>
                        <div class="col-sm-4">
                          <input type="number" class="form-control" id="qty" name="qty" value="<?php echo $rs['quantity'];?>" 
                          autocomplete="off">
                        </div>
                      </div>

                      <div class="form-group">
                          <label for="productEditForm" class="col-sm-4 control-label">หน่วย: </label>
                              <div class="col-sm-4">
                                <select class="form-control" id="unit" name="unit">
									<option value="<?php echo $rs['uID'];?>" selected="">
										<?php echo $rs['unitName'];?>
									</option>
                                    <option disabled>~~เลือก~~</option>
                                    <?php 
                                      $sql = "SELECT uID, unitName FROM units "; 
                                      $result = $connect->query($sql);
                                        while($row = $result->fetch_array()) {
                                        echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                      } // while
                                          
                                    ?>
                                </select>
                              </div>
                      </div>

                      <div class="form-group">
                        <label for="productEditForm" class="col-sm-4 control-label">ราคา</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="rate" name="rate" value="<?php echo $rs['rate'];?>" 
                          autocomplete="off">
                        </div>
                      </div>

                      <div class="form-group">
                          <label for="productEditForm" class="col-sm-4 control-label">สถานะสินค้า: </label>
                              <div class="col-sm-4">
                                <select class="form-control" id="active" name="active">
									<option value="<?php echo $status;?>">
										<?php
										if ($staus='1') {
											echo "สินค้าพร้อมจำหน่าย";
										}
										elseif ($staus='2') {
											echo "สินค้าหมด";
										}
										?>
									</option>
                                    <option disabled>~~เลือก~~</option>
                                    <option value="1">สินค้าพร้อมจำหน่าย</option>
                                    <option value="2">สินค้าหมด</option>
                                </select>
                              </div>
                      </div>                                                                     

                      <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-4">
                          <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> บันทึก </button>
                        </div>
                      </div>


                    </fieldset>
                </form>
            <!-- /.box-header -->
           

        <!-- /.col -->
      </div>

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
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
<script src="custom/js/product.js"></script>
<!-- page script -->

</body>
</html>
