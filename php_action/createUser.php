<?php     

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
    $prefix = $_POST['prefix'];
    $fn = $_POST['fname'];
    $ln = $_POST['lname'];
    $username = $_POST['username'];
    $password2 = $_POST['password2']; 
    $password = md5($password2);
    $email = $_POST['email'];
    $level = $_POST['UsersLevel'];

    $sql = "INSERT INTO users (user_id, username, password, prefix_id, fname, lname, email, level) VALUES
    ('0', '$username', '$password', '$prefix', '$fn', '$ln', '$email', '$level')";

    if($connect->query($sql) === TRUE) {
         $valid['success'] = true;
         $valid['messages'] = "บันทึกข้อมูลแล้ว";
    } else {
         $valid['success'] = false;
         $valid['messages'] = "ไม่สามารถบันทึกข้อมูลได้";
    }
     

    $connect->close();

    echo json_encode($valid);
 
} // /if $_POST