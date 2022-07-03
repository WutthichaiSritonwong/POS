<?php 
require_once 'php_action/core.php'; 
// ค้นหา Username
    $user_id = $_SESSION['userId'];
    $q = "SELECT username FROM users WHERE user_id ='$user_id' ";
    $result = $connect->query($q);
    $rs = $result->fetch_array();
    $usern = $rs['0'];
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


    <!-- Main content -->
    <section class="content-header">
      <h1>ระบบขายสินค้า</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li class="active">ขายสินค้า</li>
      </ol>
    </section>
  
    <form action="reportDaySummaryView.php" method="post" target="_blank">
    <input type="hidden" name="username" value="<?php echo $usern;?>">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h4 class="bordercool">1. รายงานการขายสินค้าประจำวัน(สรุป)</h4>
        	     <div class="col-md-2"><br />
        	     <div class="row"><h4>กรุณาระบุวันที่</h4>
          
              <div class="input-group input-group-md">
                <input input type="text" name="saleDate" id="saleDate" class="form-control" placeholder="วันที่ / เดือน / ปี" 
                value="<?php echo date("Y-m-d");?>" autocomplete="off">
                    <span class="input-group-btn">
                      <input type="submit" name="submit" value="ดูรายงาน" class="btn btn-info btn-flat">
                    </span>
              </div><br />
            </div>
          </div>
        </div>
        </div>
      </div>
   	</section>
   </form>

</div>
<?php include("footer.php");?>

<!-- jQuery 3.1.1 -->
<script src="assests/jquery/jquery.js"></script>

<!-- file input -->
<script src="assests/plugins/fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>    
<script src="assests/plugins/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>    
<script src="assests/plugins/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
<script src="assests/plugins/fileinput/js/fileinput.min.js"></script>    
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="custom/js/autocomplete.js" type="text/javascript"></script>

</body>
</html>
