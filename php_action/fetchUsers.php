<?php     

require_once 'core.php';

$sql = "SELECT * FROM users 
        INNER JOIN prefix ON (users.prefix_id=prefix.prefix_id) 
        ORDER BY users.user_id";
$result = $connect->query($sql);

//$output = array('data' => array());
$output = array();

if($result->num_rows > 0) { 
    $i;
 while($row = $result->fetch_array()) {
    $i++;   
    $UsersId = $row[0];
    $fn = $row['prefix_name'].$row['fname']."&nbsp;&nbsp;".$row['lname'];
    $username = $row['username'];
    $button = '<!-- Single button -->
    <div class="btn-group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        ตัวเลือก <span class="caret"></span>
      </button>
      <ul class="dropdown-menu">
        <li><a href="#" type="button" data-toggle="modal" data-target="#editUsersModal" onclick="editUsers('.$UsersId.')"> <i class="glyphicon glyphicon-edit"></i> แก้ไข</a></li>
        <li><a href="#" type="button" data-toggle="modal" data-target="#removeUsersModal" onclick="removeUsers('.$UsersId.')"> <i class="glyphicon glyphicon-trash"></i> ลบ</a></li>       
      </ul>
    </div>';       

     $output['data'][] = array(        
         $i,$fn,$username,$button        
     ); 
     array_push($output, $name);    
    
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);