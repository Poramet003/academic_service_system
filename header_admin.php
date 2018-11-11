<?php
session_start();
include_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Academic Service System</title>

<!-- Google fonts -->
  <link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800|Old+Standard+TT' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800' rel='stylesheet' type='text/css'>
<!-- font awesome -->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- bootstrap -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
<!-- uniform -->
  <link type="text/css" rel="stylesheet" href="assets/uniform/css/uniform.default.min.css" />
<!-- animate.css -->
  <link rel="stylesheet" href="assets/wow/animate.css" />
<!-- gallery -->
  <link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css">
<!-- favicon -->
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <link rel="icon" href="images/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="assets/style.css">

</head>

<body style="background-color:white;">

<!-- header -->
<nav class="navbar  navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="admin_index.php"><img src="images/logococ.png"  alt="holiday crown"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav">        
        <li><a href="admin_managecourse.php">จัดการคอร์สเรียน </a></li>
        <li><a href="admin_manageteacher.php">จัดการผู้สอน</a></li>        
        <li><a href="admin_manageuser.php">จัดการผู้เรียน</a></li>
        <li><a href="admin_managebill.php">จัดการแจ้งชำระ</a></li>

        <?php if (isset($_SESSION['user_id'])) { ?>
				<li><a href="">|&nbsp;&nbsp; <?php echo $_SESSION['user_name']; ?></a></li>
				<li><a href="logout.php">ออกจากระบบ</a></li>
				<?php } else { ?>
				<li><a href="index.php">เข้าสู่ระบบ</a></li>
				<?php } ?>

      </ul>
    </div><!-- Wnavbar-collapse -->
  </div><!-- container-fluid -->
</nav>


