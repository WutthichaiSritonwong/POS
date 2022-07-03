<?php     

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array(), 'order_id' => '');
// print_r($valid);
if($_POST) {    

  $salesDate              = date('Y-m-d');
  $transID                 = date('Y-m-d');
  $id_cust                  = $_POST['IDCust'];
  $subTotalValue         = $_POST['subTotalValue'];
  $vatValue                =    $_POST['vatValue'];
  $totalAmountValue     = $_POST['totalAmountValue'];
  $discount                 = "0";
  $grandTotalValue      = $totalAmountValue;
  $paid                      = $_POST['paid'];
  $dueValue               = $_POST['dueValue'];
  $paymentType         = "1";
  $paymentStatus        = "1";
  $salesStatus				= "1";
  $user 						= "1101";

                
    $sql = "INSERT INTO orders (sales_date, transaction, IDCust, sub_total, vat, total_amount, discount, grand_total, paid, due, payment_type, payment_status, sales_status, username)
	VALUES ($salesDate,$transID,$id_cust,$subTotalValue,$vatValue,$totalAmountValue,$discount,$grandTotalValue,$paid,$dueValue,$paymentType,$paymentStatus,$salesStatus,$user) ";
    $order_id;
    $orderStatus = false;
    if($connect->query($sql) === true) {
        $order_id = $connect->insert_id;
        $valid['order_id'] = $order_id;    

        $orderStatus = true;
    }

    // echo $_POST['productName'];
    $orderItemStatus = false;

    for($x = 0; $x < count($_POST['productName']); $x++) {            
        $updateProductQuantitySql = "SELECT product.quantity FROM product WHERE product.product_id = ".$_POST['productName'][$x]."";
        $updateProductQuantityData = $connect->query($updateProductQuantitySql);
        
        
        while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
            $updateQuantity[$x] = $updateProductQuantityResult[0] - $_POST['quantity'][$x];                            
                // update product table
                $updateProductTable = "UPDATE product SET quantity = '".$updateQuantity[$x]."' WHERE product_id = ".$_POST['productName'][$x]."";
                $connect->query($updateProductTable);

                // add into order_item
                $orderItemSql = "INSERT INTO order_item (order_id, product_id, quantity, rate, total, order_item_status) 
                VALUES ('$order_id', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rateValue'][$x]."', '".$_POST['totalValue'][$x]."', 1)";

                $connect->query($orderItemSql);        

                if($x == count($_POST['productName'])) {
                    $orderItemStatus = true;
                }        
        } // while    
    } // /for quantity

    $valid['success'] = true;
    $valid['messages'] = "Successfully Added";        
    
    $connect->close();

    echo json_encode($valid);
 
} // /if $_POST
// echo json_encode($valid);