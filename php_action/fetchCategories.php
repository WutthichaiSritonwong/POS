<?php     

require_once 'core.php';

$sql = "SELECT categories_id, categories_name, categories_active, categories_status FROM categories 
        WHERE categories_status = '1' 
        ORDER BY categories_id";
$result = $connect->query($sql);

//$output = array('data' => array());
$output = array();

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $activeCategories = ""; 
    $i=0;
 while($row = $result->fetch_array()) {
    $i++;
    $categoriesId = $row[0];
    // active 
    if($row[2] == 1) {
         $activeCategories = "<button type='button' class='btn btn-success btn-sm'><i class='fa fa-fw fa-check'></i> ประเภทสินค้าพร้อมจำหน่าย</button>";
    } else {
         $activeCategories = "<button type='button' class='btn btn-warning btn-sm'><i class='fa fa-fw fa-close'></i> ประเภทสินค้าไม่พร้อมจำหน่าย</button>";
    }

    $button = '
     <a href="#" data-toggle="modal" data-target="#editCategoriesModal" onclick="editCategories('.$categoriesId.')">
     <button type="button" class="btn btn-info btn-sm"><i class="fa fa-fw fa-edit"></i> แก้ไขข้อมูล</button>
     </a>
     <a href="#" data-toggle="modal" data-target="#removeCategoriesModal" onclick="removeCategories('.$categoriesId.')">
     <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i> ลบข้อมูล</button>
    </a>
    ';

     $output['data'][] = array(    
         $i,
         $row[1],         
         $activeCategories,
         $button         
         );
     array_push($output,$name);     
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);