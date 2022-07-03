<?php
/*
$orderDate                         = date('Y-m-d');
echo $orderDate;
*/


$chk_no = '100';
$y_now = substr(date("Y")+543,2,2);
$ym_now = $y_now.date("m");
$n = substr("0000000000".$chk_no,-10,10);    
$inv = $ym_now.$n;



echo  $inv;
?>