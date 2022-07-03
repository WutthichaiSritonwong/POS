<?php     
require_once 'core.php';
require_once 'readThaiBath.php';
$user_id = $_SESSION['userId'];
$q = "SELECT username FROM users WHERE user_id ='$user_id' ";
$result = $connect->query($q);
$rs = $result->fetch_array();
$usern = $rs['0'];

$sql = "SELECT order_id, SUM(total) AS SumTotal, SUM(discount) AS SumDisCount
		FROM order_item 
		WHERE rec_username = '$usern' 
		GROUP BY rec_username
		"; 
$result = $connect->query($sql);
$row = $result->fetch_array();
$orderID = $row[0];
$sum_discount = $row['SumDisCount'];
$sum_total = $row['SumTotal'];
$sum_totaln = number_format($sum_total, 2, '.', '');
$vat = ($sum_total*7)/107;
$sum = $sum_total-$vat;
$sum_n = number_format($sum, 2, '.', '');

$fsum_discount = number_format($sum_discount,2);
$fsum_total = number_format($sum_total,2);
$fvat = number_format($vat,2);
$fsum = number_format($sum,2);
?>


<div class="box-body">
					<div class="form-horizontal">
						<div class="box-body">
						<div class="form-group">   
							<label class="col-sm-5  control-label"><h3>ราคาก่อนภาษี</h3></label>   
							<div class="col-sm-7">
								<input type="hidden" name="orderID" id="orderID" value="<?php echo $orderID;?>">
								<input type="hidden" name="grandTotal" id="grandTotal" value="<?php echo $sum_totaln;?>">
								<input type="hidden" name="subTotal" id="subTotal" value="<?php echo $sum_n;?>">
								<input class="form-control" name="subTotalValue" rows="1" class="form-control" 
								id="subTotalValue" disabled style="font-size: 24pt;color:#03E5F7;
								background-color:#000000;text-align:right;height:60px " 
								value="<?php echo $fsum;?>" require="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5  control-label"><h3>ภาษี 7%</h3></label>
							<div class="col-sm-7">
								<input class="form-control" name="taxAmount" rows="1" class="form-control" 
								id="taxAmount" disabled style="font-size: 24pt;color:#F72E03;
								background-color:#000000;text-align: right;height: 60px"
								value="<?php echo $fvat;?>" require="">
							</div>    
						</div>
						<div class="form-group">
							<label class="col-sm-5  control-label"><h3>รวมยอดชำระ</h3></label>
							<div class="col-sm-7">
								<input class="form-control" rows="1" class="form-control" disabled style="font-size: 24pt;color:#FFD133;background-color:#000000;text-align: right;height: 60px" 
								value="<?php echo $fsum_total;?>" require="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5  control-label"><h3>ชำระเงินโดย</h3></label>
							<div class="col-sm-7">
								
                  				<select name="PayTypes" id="PayTypes" class="form-control form-control-lg" style="font-size: 20pt;color:#FFFFFF;background-color:#000000;height:60px">
                    				<option value="1">เงินสด</option>
                    				<option value="2">บัตรเครดิต</option>
                    				<option value="3">เช็ค</option>
                  				</select>
                				
							</div>
						</div>
						
									
					</div>
				</div>
				<div class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
								<button type="submit" class="btn btn-primary btn-success btn-block btnpayment" 
								id="btnpayment" data-toggle="modal" data-target="#modal-default">
									<h3><i class="fa fa-shopping-cart"></i> บันทึกและรับชำระเงิน</h3>
								</button>
						</div>
					</div>
				</div>

        		<!-- /.modal -->
        		<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 				 	<div class="modal-dialog modal-dialog-centered" role="document">
    				<div class="modal-content">
      				<div class="modal-header">
        			<p align="center"><h4>บันทึกข้อมูลเรียบร้อยแล้ว</h4></p>
      				</div>
      				<div class="modal-body">
	        			<!-- <button type="button" class="btn btn-success" data-dismiss="modal" id="newSale">เริ่มรายการขายใหม่</button> -->
						<button type="button" class="btn btn-block btn-info" onclick="window.location.href='listSales.php'">พิมพ์ใบเสร็จ</button>
      				</div>
      				<div class="modal-footer">
	        			
      				</div>
    				</div>
  					</div>
				</div>


</div>
