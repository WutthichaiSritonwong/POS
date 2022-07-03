<?php 
require_once 'php_action/db_connect.php';
require_once 'php_action/core.php'; 
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
        <li class="active">สินค้า</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
		<div class="col-md-8">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="bordercool">ขายสินค้า : POS(Point Of Sale)</h3>
					<input type="text" class="form-control text-uppercase" id="txtsearchitem"  placeholder="Search item name or item id here...">				
				</div><!--./ box header-->
				<div class="box-body">
					<div class="box-body table-responsive no-padding">
						<table id="table_transaction" class="table  table-bordered table-hover ">
							<thead>
								<tr class="tableheader">
									<th style="width:40px">#</th>
									<th style="width:60px">Id</th>
									<th style="width:380px">Item</th>
									<th style="width:80px">Price</th>
									<th style="width:70px">Qty</th>
									<th style="width:70px">Disc %</th>
									<th style="width:100px">Total</th>
									<th style="width:px">Manage</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>

					</div>				
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!-- /.col-md-8 -->
		<div class="col-md-4">
			<div class="box box-danger">
				<div class="box-header with-border">
					<button type="submit" title="Reset / cancel transaction" class="btn btn-primary bg-navy" id="btncancel" ><i class="fa fa-remove"></i> Reset</button> 				
				</div><!--./ box header-->
				<div class="box-body">
					<div class="form-horizontal">
						<div class="box-body">
							<div class="form-group">   
								<label class="col-sm-3  control-label">Id Trans.</label>
								<div class="col-sm-9">
									<div class="input-group ">
										<input type="text" class="form-control " id="txtidsales"  value="<?php $dmy=date('j-m-Y'); echo "J".$dmy;?>###" disabled>
										<span class="input-group-btn ">
											<button type="submit" title="Get last transaction" class="btn btn-primary " id="btnopentransaction" name="btnopentransaction">
												<i class="fa  fa-search"></i>
											</button>
										</span>
									</div>    
								</div>  
							</div>
							<div class="form-group">   
								<label class="col-sm-3  control-label">Date Trans.</label>   
								<div class="col-sm-9">
									<input readonly="" type="text" class="form-control txtsalesdate" id="txtsalesdate"  value="<?php echo date('j-m-Y');?>" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3  control-label">Cashier</label>
								<div class="col-sm-9">
									<input type="text" class="form-control " id="txtchasiername"  value="admin"  disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3  control-label"><a href="#" class="btndisc btndiscprc">Dsc %</a></label>   <div class="col-sm-9">
								<div class="input-group ">
									<input type="text" class="form-control decimal" id="txttotaldiscprc"  value="0" >
									<span class="input-group-addon ">%</span>
								</div>    
							</div>  
						</div>
						<div class="form-group">  
							<label class="col-sm-3  control-label"><a href="#" class="btndisc btndiscrp">Dsc Rp</a></label>  
							<div class="col-sm-9">
								<div class="input-group">
									<span class="input-group-addon">Rp.</span>
									<input type="text" class="form-control money textright" id="txttotaldiscrp" name="txttotaldiscrp" value="0"  disabled>
								</div>  
							</div> 
						</div>
						<div class="form-group">  
							<label class="col-sm-3  control-label">Sub Total</label> 
							<div class="col-sm-9">
								<div class="input-group">
									<span class="input-group-addon">Rp.</span>
									<input type="text" class="form-control " id="txtsubtotal"  value="0"  disabled>
								</div>   
							</div>  
						</div>
					</div>
				</div>
				<div class="info-box" style="margin-top:15px;">
					<span class="info-box-icon bg-yellow">Rp.</span>
					<div class="info-box-content">
						<span class="info-box-number newbox" id="txttotal">0</span>
					</div><!-- /.info-box-content -->
				</div>
				<div class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-12" control-label="">
								<button type="submit" title="Payment (F9)" class="btn btn-primary btn-success btn-block btnpayment" id="btnpayment" >
									<i class="fa fa-shopping-cart"></i><h4> [F9] Proccess Payment</h4>
								</button>
							</label>  
						</div>
					</div>
				</div>		
			</div>
			<!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col-md-4 -->
</div><!-- /.row -->
</section><!-- /.content -->


<div id="modaleditparam" class="modal fade ">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">Edit</h4>
			</div><!--modal header--> 
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="box-body">
						<div class="form-group">  
							<label class="col-sm-12" control-label="">
								<input type="text" class="form-control money textright" id="txtvalue" name="txtvalue"  >
								<input type="hidden" id="txtdataparam" >
								<input type="hidden" id="txtkey">
							</label>  
						</div>
						<div class="form-group">  
							<label class="col-sm-2  control-label">
								<button type="submit" class="btn btn-primary " id="btnubahedit" >
									<i class="fa fa-edit"></i> Edit
								</button> 
								<span id="infoproses"></span>
							</label> 
							<div class="col-sm-10"> 
							</div> 
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div><!--modal footer-->
		</div><!--modal-content-->
	</div><!--modal-dialog modal-lg-->
</div><!--modaleditparam-->

<div id="modalpayment" class="modal fade ">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title"></h4>
				<h3><i class="fa fa-shopping-cart"></i> Payment</h3>
			</div><!--modal header-->
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-4  control-label">Transaction Id</label>
							<div class="col-sm-8">
								<input type="text" class="form-control " id="txtinfoidtrans"    disabled=""> </div>
							</div>
							<div class="form-group">
								<label class="col-sm-4  control-label">Transaction Date</label>
								<div class="col-sm-8">
									<input type="text" class="form-control " id="txtinfodatetrans"    disabled=""> </div>
								</div>
								<div class="form-group">
									<label class="col-sm-4  control-label">Total Payable Amount</label>
									<div class="col-sm-8">
										<div class="input-group">
											<span class="input-group-addon">Rp.</span>
											<input type="text" class="form-control money textright" id="txtgrandtotal"  value="0"  disabled="">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4  control-label">Paid</label>
									<div class="col-sm-8">
										<div class="input-group">
											<span class="input-group-addon">Rp.</span>
											<input type="text" class="form-control money textright" id="txtmoneypay"  value="0" >
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4  control-label">Return Change</label>
									<div class="col-sm-8">
										<div class="input-group">
											<span class="input-group-addon">Rp.</span>
											<input type="text" class="form-control money textright" id="txtoddmoney"  value="0"  disabled="">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4  control-label">Note</label>
									<div class="col-sm-8">
										<textarea class="form-control " maxlength="100" rows="3" id="txtnote"  placeholder="Max 100 words"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-12" control-label "=" "><hr></label>  </div><div class="form-group ">   <label class="col-sm-12 " control-label"=""><span style="color:white;background-color:red;padding:5px;">* Please double check the transaction before making the payment process </span>
								</label>
							</div>
							<div class="form-group">
								<label class="col-sm-4  control-label"></label>
								<div class="col-sm-8">
									<button type="submit" title="Save Transaction ?" class="btn btn-primary pull-right" id="btnsavetrans" ><i class="fa fa-save"></i> Proccess</button>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4  control-label"><span id="infoproccesspayment"></span>
								</label>
								<div class="col-sm-8"> </div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				<!--modal footer-->
			</div>
			<!--modal-content-->
		</div>
		<!--modal-dialog modal-lg-->
	</div>

	<div id="modallasttrans" class="modal fade ">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title">Lists of transaction</h4>
				</div>
				<!--modal header-->
				<div class="modal-body">
					<div class="form-group">
						<label for="Periode">Period : </label>
						<input readonly="" type="text" class="form-control txtperiode tgl" id="txtfirstperiod"  value="<?php echo date('j-m-Y');?>"  style="width:100px "> -
						<input readonly="" type="text" class="form-control txtperiode tgl" id="txtlastperiod"  value="<?php echo date('j-m-Y');?>"  style="width:100px ">
						<button type="submit" title="Search transaction" class="btn btn-primary " id="btnfiltersale" ><i class="fa fa-refresh"></i> Search</button>
					</div>
					<hr>
					<div class="box-body table-responsive no-padding">
						<table id="table_last_transaction" class="table  table-bordered table-hover table-striped">
							<thead>
								<tr class="tableheader">
									<th style="width:30px">#</th>
									<th style="width:87px">Date</th>
									<th style="width:87px">Id Trx</th>
									<th style="width:100px">Total</th>
									<th style="width:80px">Cashier</th>
									<th style="width:px"></th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				<!--modal footer-->
			</div>
			<!--modal-content-->
		</div>
		<!--modal-dialog modal-lg-->
	</div>

	<div id="passwordmodal" class="modal fade ">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title">Password</h4>
				</div>
				<!--modal header-->
				<div class="modal-body">
					<div class="form-horizontal">
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-12" control-label "=" "><span id="ketpassword ">Type password before edit transaction</span></label>  </div><div class="form-group ">   <label class="col-sm-12 " control-label"="">
								<input type="password" class="form-control " id="txtpass" name="txtpass"  >
								<input type="hidden" id="txthidetrxid"   >
								<input type="hidden" id="txthiddentrans"   >
							</label>
						</div>
						<div class="form-group">
							<label class="col-sm-2  control-label">
								<button type="submit" class="btn btn-primary " id="btncheckpass" name="btncheckpass"><i class="fa  fa-lock"></i> Authentication</button> <span id="infopassword"></span>
							</label>
							<div class="col-sm-10"> </div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			<!--modal footer-->
		</div>
		<!--modal-content-->
	</div>
	<!--modal-dialog modal-lg-->
</div>

  
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
<script src="custom/js/customers.js"></script>
</body>
</html>
