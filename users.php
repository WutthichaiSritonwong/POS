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
        <li class="active">พนักงาน</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
 
      <!-- Main row -->

	<div class="box box-success">

          <div class="box-header">
            <h3 class="box-title">รายชื่อพนักงานทั้งหมด</h3>
			    <div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-primary button1" data-toggle="modal" id="addUsersModalBtn" data-target="#addUsersModal"> <i class="glyphicon glyphicon-plus-sign"></i> เพิ่มพนักงาน </button>

				  </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
			       <div class="remove-messages"></div>
			       <table id="manageUsersTable" class="table table-bordered table-striped">
               <thead>
                  <tr>
							     <th style="width:10%;">#</th>
                   <th>ชื่อ - นามสกุล</th>
                   <th style="width:15%;">รหัสเข้าใช้งาน</th>
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

<!-- add Users -->
<div class="modal fade" id="addUsersModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

        <form class="form-horizontal" id="submitUsersForm" action="php_action/createUser.php" method="POST">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-plus"></i> เพิ่มพนักงาน</h4>
          </div>
          <div class="modal-body">

            <div id="add-Users-messages"></div>

            <div class="form-group">
                <label for="UsersName" class="col-sm-4 control-label">รหัสเข้าใช้งาน </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="UsersName" placeholder="UsersName" 
                      name="username" autocomplete="off">
                    </div>
            </div>
            <div class="form-group">
                <label for="UsersName" class="col-sm-4 control-label">รหัสผ่าน </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-7">
                      <input type="password" class="form-control" id="Password" placeholder="Password" 
                      name="password1" autocomplete="off">
                    </div>
            </div>
            <div class="form-group">
                <label for="UsersName" class="col-sm-4 control-label">รหัสผ่าน(อีกครั้ง) </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-7">
                      <input type="password" class="form-control" id="ConfirmPassword" placeholder="Confirm Password" 
                      name="password2" autocomplete="off"><h5><span id='message'></span></h5>
                    </div>
            </div>
            <div class="form-group">
                <label for="UsersStatus" class="col-sm-4 control-label">คำนำหน้าชื่อ </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-7">
                      <select class="form-control" id="prefix" name="prefix">
                          <option value="">~~เลือก~~</option>
                          <option value="1">นาย</option>
                          <option value="2">นาง</option>
                          <option value="3">นางสาว</option>
                          <option value="4">ว่าที่ร้อยตรี</option>
                      </select>
                    </div>
            </div>
            <div class="form-group">
                <label for="UsersName" class="col-sm-4 control-label">ชื่อ </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="fname" placeholder="First Name" 
                      name="fname" autocomplete="off">
                    </div>
            </div>
            <div class="form-group">
                <label for="UsersName" class="col-sm-4 control-label">นามสกุล </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="lname" placeholder="Last Name" 
                      name="lname" autocomplete="off">
                    </div>
            </div>
            <div class="form-group">
                <label for="UsersName" class="col-sm-4 control-label">อีเมลล์ </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="email" placeholder="Email" 
                      name="email" autocomplete="off">
                    </div>
            </div>
            <div class="form-group">
                <label for="UsersStatus" class="col-sm-4 control-label">ระดับการใช้งาน </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-7">
                      <select class="form-control" id="UsersLevel" name="UsersLevel">
                          <option value="">~~เลือก~~</option>
                          <option value="9">ผู้ดูแลระบบ</option>
                          <option value="1">ผู้ใช้งานทั่วไป</option>
                      </select>
                    </div>
            </div> <!-- /form-group-->                         
          </div> <!-- /modal-body -->
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> ปิด</button>
            
            <button type="submit" class="btn btn-primary" id="createUsersBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> บันทึก</button>
          </div> <!-- /modal-footer -->          
         </form> <!-- /.form -->         
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add Users -->


<!-- edit Users Users -->
<div class="modal fade" id="editUsersModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        
        <form class="form-horizontal" id="editUsersForm" action="php_action/editUsers.php" method="POST">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขพนักงาน</h4>
          </div>
          <div class="modal-body">

            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">ข้อมูลส่วนตัว</a></li>
              <li><a href="#tab_2" data-toggle="tab">รหัสผ่าน</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                
            <div class="form-group">
                <label for="UsersName" class="col-sm-4 control-label">รหัสเข้าใช้งาน </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="editUsersName" placeholder="UsersName" 
                      name="editUsersName" autocomplete="off">
                    </div>
            </div>
                <div class="form-group">
                <label for="UsersStatus" class="col-sm-4 control-label">คำนำหน้าชื่อ </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-7">
                      <select class="form-control" id="editprefix" name="prefix">
                          <option value="">~~เลือก~~</option>
                          <option value="1">นาย</option>
                          <option value="2">นาง</option>
                          <option value="3">นางสาว</option>
                          <option value="4">ว่าที่ร้อยตรี</option>
                      </select>
                    </div>
            </div>
            <div class="form-group">
                <label for="UsersName" class="col-sm-4 control-label">ชื่อ </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="editfname" placeholder="First Name" 
                      name="editfname" autocomplete="off">
                    </div>
            </div>
            <div class="form-group">
                <label for="UsersName" class="col-sm-4 control-label">นามสกุล </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="editlname" placeholder="Last Name" 
                      name="editlname" autocomplete="off">
                    </div>
            </div>
            <div class="form-group">
                <label for="UsersName" class="col-sm-4 control-label">อีเมลล์ </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="editemail" placeholder="Email" 
                      name="editemail" autocomplete="off">
                    </div>
            </div>
            <div class="form-group">
                <label for="UsersStatus" class="col-sm-4 control-label">ระดับการใช้งาน </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-7">
                      <select class="form-control" id="editUsersLevel" name="UsersLevel">
                          <option value="">~~เลือก~~</option>
                          <option value="9">ผู้ดูแลระบบ</option>
                          <option value="1">ผู้ใช้งานทั่วไป</option>
                      </select>
                    </div>
            </div> <!-- /form-group-->

              <!-- /edit Users result -->

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">

                <div class="form-group">
                <label for="UsersName" class="col-sm-4 control-label">รหัสผ่าน </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-7">
                      <input type="password" class="form-control" id="Password" placeholder="Password" 
                      name="password1" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                <label for="UsersName" class="col-sm-4 control-label">รหัสผ่าน(อีกครั้ง) </label>
                <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-7">
                      <input type="password" class="form-control" id="ConfirmPassword" placeholder="Confirm Password" 
                      name="password2" autocomplete="off"><h5><span id='message'></span></h5>
                    </div>
                </div>

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>

              <div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                        <span class="sr-only">Loading...</span>
              </div>

              

          </div> <!-- /modal-body -->
          
          <div class="modal-footer editUsersFooter">
            <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> ปิด</button>
            
            <button type="submit" class="btn btn-success" id="editUsersBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> บันทึก</button>
          </div>
          <!-- /modal-footer -->
         </form>
         <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /Users Users -->

<!-- Users Remove -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeUsersModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> ลบพนักงาน</h4>
      </div>
      <div class="modal-body">
        <p>คุณต้องการจะลบพนักงานใช่หรือไม่ ?</p>
      </div>
      <div class="modal-footer removeUsersFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign">
        </i> ปิด</button>
        <button type="button" class="btn btn-primary" id="removeUsersBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> ลบ</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /Users Users -->
  
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
<script src="custom/js/Users.js"></script>
</body>
</html>