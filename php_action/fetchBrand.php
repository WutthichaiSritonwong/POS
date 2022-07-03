<?php     

require_once 'core.php';

//$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_status = 1";
$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands ORDER BY brand_id";
$result = $connect->query($sql);

//$output = array('data' => array());
$output = array();

if($result->num_rows > 0) { 

 $activeBrands = ""; 
 $i=0;
 while($row = $result->fetch_array()) {
     $i++;
     $brandId = $row[0];
     // active 
     if($row[2] == 1) {
         // activate
         $activeBrands = "<h4><label class='label label-success'><span class='glyphicon glyphicon-ok' aria-hidden='true'> สินค้าพร้อม </span></label></h4>";
     } else {
         // deactivate
         $activeBrands = "<h4><label class='label label-danger'><span class='glyphicon glyphicon-remove' aria-hidden='true'> ไม่มีสินค้า </span></label></h4>";
     }

     $button = '<!-- Single button -->
    <div class="btn-group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        ตัวเลือก <span class="caret"></span>
      </button>
      <ul class="dropdown-menu">
        <li><a href="#" type="button" data-toggle="modal" data-target="#editBrandModel" onclick="editBrands('.$brandId.')"> <i class="glyphicon glyphicon-edit"></i> แก้ไข</a></li>
        <li><a href="#" type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeBrands('.$brandId.')"> <i class="glyphicon glyphicon-trash"></i> ลบ</a></li>       
      </ul>
    </div>';
    
    

         
     $output['data'][] = array(
                                $i,
                                $row[1],
                                $activeBrands,
                                $button
                                );        


    array_push($output, $name);     
    
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);