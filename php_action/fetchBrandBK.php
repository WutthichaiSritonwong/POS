<?php     

require_once 'core.php';

//$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_status = 1";
$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands ";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $activeBrands = ""; 
 $i=0;
 while($row = $result->fetch_array()) {
     $i++;
     $brandId = $row[0];
     // active 
     if($row[2] == 1) {
         // activate member
         $activeBrands = "<label class='label label-success'>สินค้าพร้อม</label>";
     } else {
         // deactivate member
         $activeBrands = "<label class='label label-danger'>ไม่มีสินค้า</label>";
     }

     $button = '<!-- Single button -->
    <div class="btn-group">
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        จัดการ <span class="caret"></span>
      </button>
      <ul class="dropdown-menu">
        <li><a type="button" data-toggle="modal" data-target="#editBrandModel" onclick="editBrands('.$brandId.')"> <i class="glyphicon glyphicon-edit"></i> แก้ไข</a></li>
        <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeBrands('.$brandId.')"> <i class="glyphicon glyphicon-trash"></i> ลบ</a></li>       
      </ul>
    </div>';

     $output['data'][] = array(         
         $i,
         $row[1],         
         $activeBrands,
         $button
         );     
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);