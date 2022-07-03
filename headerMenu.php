<?php
$user_id = $_SESSION['userId'];
$user_fn = $_SESSION['fname'];
$user_ln = $_SESSION['lname'];
$user_fl = $user_fn." ".$user_ln;
$user_level = $_SESSION['level'];
?>
<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand">รุ่งนคร ก่อสร้าง</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i>  หน้าหลัก <span class="sr-only">(current)</span></a></li>
            <li><a href="categories.php"><i class="fa fa-list"></i> ประเภทสินค้า </a></li>
			      <li><a href="products.php"><i class="fa fa-fw fa-pinterest-p"></i> สินค้า </a></li>
            <li><a href="customers.php"><i class="fa fa-users"></i> ลูกค้า </a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-cart-plus"></i>  ขายสินค้า <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="sales.php"><i class="fa fa-file-text-o"></i> ขายสินค้า </a></li>
                <li><a href="listSales.php"><i class="fa fa-file-text-o"></i> รายการขายซื้อสินค้า </a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-clipboard"></i> รายงาน <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="reportDaySummary.php"><i class="fa fa-file-text"></i> 1. รายงานการขายสินค้าประจำวัน(สรุป) </a></li>
                <li><a href="reportDayDetails.php"><i class="fa fa-file-text"></i> 2. รายงานการขายสินค้าประจำวัน(รายละเอียด) </a></li>
                <li><a href="reportMonthSummary.php"><i class="fa fa-file-text"></i> 3. รายงานการขายสินค้าประจำเดือน </a></li>
              </ul>
			</li>
          <?php if ($user_level=='9') { ?>
          <li><a href="users.php"><i class="fa fa-user-plus"></i> พนักงานขาย </a></li>
          <?php } ?>
              </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Tasks Menu -->
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <i class="fa fa-user"></i>
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $user_fl; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="dist/img/logo.jpg" class="img-circle" alt="User Image">
                  <p><?php echo $user_fl;?></p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="userSetting.php" class="btn btn-warning btn-flat"><i class="fa fa-lock"></i> เปลี่ยนรหัสผ่าน</a>
                  </div>
                  <div class="pull-right">
                    <a href="logout.php?user=<?php echo $user_fl;?>" class="btn btn-success btn-flat">
                      <i class="fa fa-sign-out"></i> ออกจากระบบ
                    </a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>