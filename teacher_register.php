<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Academic Service System</title>
     

<!-- [เชื่อม] Font -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800|Old+Standard+TT' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800' rel='stylesheet' type='text/css'>
<!-- [เชื่อม] font awesome -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- [เชื่อม] bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/style.css">
<!-- [เชื่อม] uniform -->
    <link type="text/css" rel="stylesheet" href="assets/uniform/css/uniform.default.min.css" />
<!-- [เชื่อม] animate.css -->
    <link rel="stylesheet" href="assets/wow/animate.css" />
<!-- [เชื่อม] gallery -->
    <link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css">
<!-- [เชื่อม] favicon -->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
<!-- [เชื่อม] CSS ตกแต่ง -->    
    <link rel="stylesheet" href="css/popupForSignupAndSignin.css"> <!-- POPUP สมัครสมาชิก / ล็อคอิน -->  
  </head>

<body style="background-color:white;">

<!-- header -->
<nav class="navbar  navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="images/logococ.png"  alt="holiday crown"></a>
    </div>
<!-- แก้ไข Menu -->
   
  </div><!-- container-fluid -->
</nav>


<?php
    
          session_start();
          include_once 'dbconnect.php';
          $error = false;   //ไว้สำหรับกำหนดค่า error ให้เป็น false หากไม่กำหนด ในช่อง Textbox สมัครสมาชิกจะ error




          if (isset($_POST['signup'])) {
            mysqli_set_charset($con, "utf8");
            // รับค่า
            $nameteacher = mysqli_real_escape_string($con, $_POST['nameteacher']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
            $detailteach = mysqli_real_escape_string($con, $_POST['detailteach']);
            $imgteacher = mysqli_real_escape_string($con, $_POST['imgteacher']);
            // ดักค่า

            if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
              $error = true;
              $email_error = "Please Enter Valid Email ID";
            }
            if(strlen($password) < 6) {
              $error = true;
              $password_error = "Password must be minimum of 6 characters";
            }
            if($password != $cpassword) {
              $error = true;
              $cpassword_error = "Password and Confirm Password doesn't match";
            }
            
            if (!$error) {
            // หากสำเร็จ หรือ ล้มเหลว ให้เด้งเเจ้งเตือนเป็น Popup  
              if(mysqli_query($con, "INSERT INTO users_teacher(email,password,teacher_Picture,teacher_Name,teacher_Detail) VALUES('" . $email . "','" . md5($password) . "','" . $imgteacher . "', '" . $nameteacher . "', '" . $detailteach . "')")) {
                echo '<script language="javascript" type="text/javascript"> 
                          alert("สมัครสมาชิกเรียบร้อยแล้ว !");
                          window.location = "index.php";
                      </script>';
              } else {
                echo '<script language="javascript" type="text/javascript"> 
                          alert("ข้อมูลผิดพลาด ! กรุณาตรวจสอบใหม่อีกครั้ง");
                          window.location = "teacher_register.php";
                      </script>';
                     }
                         }
                                        }
?>






<!-- [เนื้อหา] POPUP คอร์สเรียนแต่ละอัน-->
<div class="container">
    <br>
    <br>
   
    <button class="button button-block">
    <br>
    <h4>ส่วนสำหรับสมัครสมาชิก อาจาย์ผู้สอน</h4>
    </button>        
  <!-- ฟอร์มหลัก -->
	  <div class="form">

                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                        <div class="top-row">                
                            <button class="button button-block"> รายละเอียดข้อมูล </button> 
                        </div>           
                        <div class="field-wrap">
                            <input type="text" name="nameteacher" placeholder="ชื่อ " required value="<?php if($error) echo $nameteacher; ?>" class="form-control" />
                            <span class="text-danger"><?php if (isset($nameteacher_error)) echo $nameteacher_error; ?></span>
                        </div>
                  

                        <div class="field-wrap">
                            <input type="text" name="email" placeholder="อีเมลล์ " required value="<?php if($error) echo $email; ?>" class="form-control" />
                            <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                        </div>
              
                        <div class="top-row">                
                            <div class="field-wrap">
                            <input type="password" name="password" placeholder="รหัสผ่าน " required class="form-control" />
                            <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                            </div>
            
                            <div class="field-wrap">
                            <input type="password" name="cpassword" placeholder="ยืนยันรหัสผ่าน " required class="form-control" />
                            <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                            </div>
                        </div>

                        <div class="field-wrap">
                            <textarea  id="detailteach"  class="form-control" cols="50" rows="4" name="detailteach" placeholder="รายละเอียดประวัติผู้สอน"></textarea>
                        </div>
                        
                        <div class="top-row">                
                            <button class="button button-block"> เลือกรูปภาพผู้สอน </button> 
                        </div>
                        
                        <div class="field-wrap">
                            <input type="file" name="imgteacher" id="imgteacher" required class="form-control" placeholder="เลือกรูปภาพผู้สอน" />
                        </div>


                      <button type="submit" name="signup" class="button button-block"/>สมัครสมาชิก</button>
                </form>
                      <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
                      <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
           
          
        
    </div>         <!-- ปิด  </form">                        -->
</div>



<!-- [เชื่อม] JS เพื่อเวลากดแล้วเด้งของ Popup ของสมัครสมาชิก 
        ** ต้องไว้ตรงนี้หากไปไว้ใน header จะไม่ทำงาน **     -->
