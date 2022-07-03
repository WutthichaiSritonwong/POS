<?php 
require_once 'php_action/db_connect.php';

session_start();

if(isset($_SESSION['userId'])) {
    header('location: dashboard.php');    
}

$errors = array();

if($_POST) {        

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)) {
        if($username == "") {
            $errors[] = "กรุณากรอก Username ";
        } 

        if($password == "") {
            $errors[] = "กรุณากรอก Password ";
        }
    } else {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $connect->query($sql);

        if($result->num_rows == 1) {
            $password = md5($password);
            // exists
            $mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $mainResult = $connect->query($mainSql);

            if($mainResult->num_rows == 1) {
                $value = $mainResult->fetch_assoc();
                $user_id = $value['user_id'];
                $user_name = $value['username'];
                $user_fn = $value['fname'];
                $user_ln = $value['lname'];
                $user_level = $value['level'];

                // set session
                $_SESSION['userId'] = $user_id;
                $_SESSION['username'] = $user_name;
                $_SESSION['fname'] = $user_fn;
                $_SESSION['lname'] = $user_ln;
                $_SESSION['level'] = $user_level;

                header('location: sales.php');    
            } else{
                
                $errors[] = "Username หรือ Password ไม่ถูกต้อง ";
            } // /else
        } else {        
            $errors[] = "Username หรือ Password ไม่ถูกต้อง ";
        } // /else
    } // /else not empty username // password
    
} // /if $_POST
?>

<!DOCTYPE html>
<html>
<head>
    <title>ระบบขายสินค้า | ตัวอย่าง DEMO</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- bootstrap theme-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="font-awesome/css/AdminLTE.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="custom/css/custom.css">    

    <!-- jquery -->
    <script src="jquery/jquery.min.js"></script>
    <!-- jquery ui -->  
    <link rel="stylesheet" href="plugins/jQueryUI/jquery-ui.min.css">
    <script src="plugins/jQueryUI/jquery-ui.min.js"></script>

    <!-- bootstrap js -->
    <script src="assests/bootstrap/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition login-page">

<div class="login-box">
  
  <a href="#"><h3>ระบบขายสินค้า : ตัวอย่าง DEMO</h3></a>
  
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><i class="glyphicon glyphicon-record"></i>
    Login to start your session <i class="glyphicon glyphicon-record"></i>
    </p>

    <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
      <div class="form-group has-feedback">
        <div class="col-xs-12">
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" />
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <div class="col-xs-12">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-5">
          <button type="submit" class="btn btn-block btn-success btn-flat">
            <i class="glyphicon glyphicon-log-in"></i> Sign In</button>
        </div>
      </div><br />
      <div class="messages">
            <?php if($errors) {
                foreach ($errors as $key => $value) {
                 echo '<div class="callout callout-info">
                 <i class="fa fa-fw fa-sign-in"></i>
                 '.$value.'</div>';                                        
                }
            } 
            ?>
      </div>
    </form>
  </div>
</div> 

<!-- jQuery 3.1.1 -->
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->

</body>
</html>
