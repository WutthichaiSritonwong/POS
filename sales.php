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

    <?php include("headerMenu.php"); ?>
    <!-- Full Width Column -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


      <!-- Main content -->
      <section class="content-header">
        <h1>ระบบขายสินค้า <small>Version 1.0</small></h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
          <li class="active">ขายสินค้า</li>
        </ol>
      </section>


      <section class="content">

        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h4 class="bordercool">ขายสินค้า</h4>
                <div class="row">
                  <div class="col-xs-1">
                    <input type="text" name="custIDCard" id="custIDCard" class="form-control" placeholder="รหัสลูกค้า" disabled>
                  </div>
                  <div class="col-xs-1">
                    <button type="button" class="btn btn-block btn-info" onclick="window.location.href='adduser.php'">เพิ่มชื่อลูกค้า</button>
                  </div>
                  <div class="col-xs-3">
                    <input type="text" name="custName" id="custName" class="form-control" placeholder="ชื่อลูกค้า" required="">
                  </div>
                  <div class="col-xs-4">
                    <input type="text" name="custAddress" id="custAddress" class="form-control" placeholder="ที่อยู่ลูกค้า" disabled="">
                  </div>
                  <div class="col-xs-1">
                    <input type="text" name="saleDate" id="saleDate" class="form-control" placeholder="วันที่ / เดือน / ปี" value="<?php echo date("Y-m-d"); ?>">
                  </div>
                  <div class="col-xs-2">
                    <select name="channel" id="channel" class="form-control">
                      <option selected="selected" disabled="">- ช่องทางการขาย -</option>
                      <?php
                      $q = "SELECT * FROM sales_channel ORDER BY sale_channel_id ASC";
                      $result = $connect->query($q);
                      while ($row = $result->fetch_array()) {
                        $channelID = $row[0];
                        $channelName = $row[1];
                      ?>
                        <option value="<?php echo $channelID; ?>"><?php echo $channelName; ?> (<?php echo $channelName; ?>)</option>
                      <?php } ?>
                    </select>
                  </div>
                </div><br />
              </div>
            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-md-8">
            <div class="box box-primary">

              <div class="box-body"><br />
                <input type="hidden" name="saleProductID" id="saleProductID" class="form-control">
                <div class="input-group input-group-lg">
                  <input type="text" id="sales" name="sales" class="form-control" placeholder="ค้นหารหัสสินค้าหรือชื่อสินค้า" onkeyup="doSearch(this.value)">
                  <!-- <input type="text" name="q" id="q" value="" onkeyup="doSearch(this.value)" /> -->
                  <span class="input-group-btn">
                    <button type="submit" id="addnew" class="btn btn-info btn-flat"> เลือกสินค้า
                    </button>
                  </span>
                  <script>
                    var input = document.getElementById("sales");
                    input.addEventListener("keyup", function(event) {
                      event.preventDefault();
                      if (event.keyCode === 13) {
                        // input.focus();
                        input.select();
                        document.getElementById("addnew").click();
                        document.getElementById("text").value = "";
                      }
                    });
                  </script>
                </div><br />
                <div id="salesTable"></div>
              </div>

              <!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col-md-8 -->

          <div class="col-md-4">
            <div class="box box-danger">
              <div id="payment"></div>
              <!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
      </section><!-- /.content -->



      <?php include("footer.php"); ?>

    </div>
    <!-- ./wrapper -->

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
    <script src="custom/js/salesTemp.js" type="text/javascript"></script>
</body>

</html>