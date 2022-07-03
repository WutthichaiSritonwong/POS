<?php
require_once 'php_action/core.php';
$user_id = $_SESSION['userId'];
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

        <?php include("headerMenu.php"); ?>
        <!-- Full Width Column -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>ระบบบริหารการขายสินค้า</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                    <li class="active">เพิ่มข้อมูลลูกค้า</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Main row -->

                <div class="box box-success">

                    <div class="box-header">
                        <h3 class="box-title">เพิ่มข้อมูลลูกค้า</h3>
                    </div>
                    <form action="php_action/createCustomer.php" method="post" class="form-horizontal" id="customerForm">
                        <fieldset>
                            <div class="createCustomerMessages"></div>
                            <div class="form-group">
                                <label for="customerForm" class="col-sm-3 control-label">รหัสลูกค้า</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="custCode" name="custCode" placeholder="รหัสลูกค้า" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="customerForm" class="col-sm-3 control-label">ชื่อลูกค้า</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="custName" name="custName" placeholder="ชื่อลูกค้า" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="customerForm" class="col-sm-3 control-label">โทรศํพท์</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" id="custPhone" name="custPhone" placeholder="โทรศํพท์" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="customerForm" class="col-sm-3 control-label">ที่อยู่</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="custAddr" name="custAddr" placeholder="ที่อยู่" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="customerForm" class="col-sm-3 control-label">หมายเหตุ</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="custComment" name="custComment" placeholder="หมายเหตุ" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary" onclick="javascript:history.go(-1)"> <i class="glyphicon glyphicon-ok-sign"></i> บันทึก </button>
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

        <?php include("footer.php"); ?>

    </div>
    <!-- ./wrapper -->



</body>
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
<script src="custom/js/customers.js"></script>
<!-- page script -->

</html>