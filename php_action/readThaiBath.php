<?php //number to thai function by Dr.Yes<br>
function num2thai($thb) {
list($thb, $ths) = explode('.', $thb);
$ths = substr($ths.'00', 0, 2);
$thaiNum = array('','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า');
$unitBaht = array('บาท','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');
$unitSatang = array('สตางค์','สิบ');
$THB = '';
$j = 0;
for($i=strlen($thb)-1; $i>=0; $i--,$j++) {
$num = $thb[$i];
$tnum = $thaiNum[$num];
$unit = $unitBaht[$j];
switch(true) {
case $j==0 && $num==1 && strlen($thb)>1: $tnum = 'เอ็ด'; break;
case $j==1 && $num==1: $tnum = ''; break;
case $j==1 && $num==2: $tnum = 'ยี่'; break;
case $j==6 && $num==1 && strlen($thb)>7: $tnum = 'เอ็ด'; break;
case $j==7 && $num==1: $tnum = ''; break;
case $j==7 && $num==2: $tnum = 'ยี่'; break;
case $j!=0 && $j!=6 && $num==0: $unit = ''; break;
}
$S = $tnum . $unit;
$THB = $S . $THB;
}
if($ths=='00') {
$THS = 'ถ้วน';
} else {
$j=0;
$THS = '';
for($i=strlen($ths)-1; $i>=0; $i--,$j++) {
$num = $ths[$i];
$tnum = $thaiNum[$num];
$unit = $unitSatang[$j];
switch(true) {
case $j==0 && $num==1 && strlen($ths)>1: $tnum = 'เอ็ด'; break;
case $j==1 && $num==1: $tnum = ''; break;
case $j==1 && $num==2: $tnum = 'ยี่'; break;
case $j!=0 && $j!=6 && $num==0: $unit = ''; break;
}
$S = $tnum . $unit;
$THS = $S . $THS;
}
}
return $THB.$THS;
}
//$thb = mt_rand()/100; //random number;
//echo number_format($thb,2)."<br>";
//echo num2thai($thb);
?> 