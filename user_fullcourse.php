<?php
        session_start();
        include_once 'header.php';
        include_once 'dbconnect.php';
        $error = false; //ไว้สำหรับกำหนดค่า error ให้เป็น false หากไม่กำหนด ในช่อง Textbox สมัครสมาชิกจะ error

//  [สมัครสมาชิก] Insert  +  ดักค่าที่กรอกข้อมูล
        if (isset($_POST['signup'])) {
        // รับค่า
        $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        // ดักค่า
        if (!preg_match("/^[a-zA-Z ก-ฮ]+$/",$firstname)) {
          $error = true;
          $firstname_error = "Name must contain only alphabets and space";
        }
        if (!preg_match("/^[a-zA-Z ก-ฮ]+$/",$lastname)) {
          $error = true;
          $lastname_error = "Name must contain only alphabets and space";
        }
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
        if (!preg_match("/^[0-9]+$/",$phone)) {
          $error = true;
          $phone_error = "Name must contain only alphabets and space";
        }
        if (!$error) {
        // หากสำเร็จ หรือ ล้มเหลว ให้เด้งเเจ้งเตือนเป็น Popup  
          if(mysqli_query($con, "INSERT INTO users(firstname,lastname,phone,email,password) VALUES('" . $firstname . "','" . $lastname . "','" . $phone . "', '" . $email . "', '" . md5($password) . "')")) {
            echo '<script language="javascript" type="text/javascript"> 
                      alert("สมัครสมาชิกเรียบร้อยแล้ว !");
                      window.location = "index.php";
                  </script>';
          } else {
            echo '<script language="javascript" type="text/javascript"> 
                      alert("ข้อมูลผิดพลาด ! กรุณาตรวจสอบใหม่อีกครั้ง");
                      window.location.href = "index.php";
                  </script>';
                 }
                     }
                                    }


    // [เข้าสู่ระบบ] 
        if (isset($_POST['login'])) {
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");
            
            //กำหนดให้ ชื่อ Colum ในฐานข้อมูลที่ชื่อ  user_id , firstname เป็น Session ที่ชื่อ user_id และ user_name เอาไว้เด้งชื่อผู้ใช้บนเมนูล็อคอิน
            //โดยหากในฐานข้อมูลที่ชื่อ User_Type เป็น 0 ให้ไปหน้า user แต่หากเป็น 1 ไปหน้า admin

            if ($row = mysqli_fetch_array($result)) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['firstname'];
                if($row['User_Type'] == 0){
                    header("Location: user_home.php");
                                                }
                    else if($row['User_Type'] == 1){
                    header("Location: admin_index.php");
                                                        }
            } else {
                echo '<script language="javascript" type="text/javascript"> 
                        alert("รหัสผ่านไม่ถูกต้อง ! กรุณาตรวจสอบใหม่อีกครั้ง");
                        window.location = "index.php";
                    </script>';
                }
                                    }       
                                    
 // [เข้าสู่ระบบ] สำหรับ Teacher
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM users_teacher WHERE email = '" . $email. "' and password = '" . md5($password) . "'");
          if ($row = mysqli_fetch_array($result)) {
              $_SESSION['user_id'] = $row['teacher_ID'];
              $_SESSION['user_name'] = $row['email'];
                  if($row['User_Type'] == 2){
                  header("Location: teacher_index.php");                                
                } else {
                    echo '<script language="javascript" type="text/javascript"> 
                                alert("รหัสผ่านไม่ถูกต้อง ! กรุณาตรวจสอบใหม่อีกครั้ง");
                                window.location = "index.php";
                            </script>';
                        }
                                                    }   
                            }                                                  
                                   
                                    
?>  

<!--[Popup แบบฟอร์ม] สมัครสมาชิก , เข้าสู่ระบบ-->
    <div id="myModal" class="modal">
  <!-- ฟอร์มหลัก -->
	  <div class="form">
        <ul class="tab-group">
          <li class="tab active"><a href="#signup">สมัครสมาชิก</a></li>
          <li class="tab "><a href="#login">เข้าสู่ระบบ</a></li>
        </ul>
        <div class="tab-content">
            <div id="signup">   
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                    <div class="top-row">
                        <div class="field-wrap">
                            <input type="text" name="firstname" placeholder="ชื่อ " required value="<?php if($error) echo $firstname; ?>" class="form-control" />
                            <span class="text-danger"><?php if (isset($firstname_error)) echo $firstname_error; ?></span>
                        </div>

                        <div class="field-wrap">
                            <input type="text" name="lastname" placeholder="นามสกุล " required value="<?php if($error) echo $lastname; ?>" class="form-control" />
                            <span class="text-danger"><?php if (isset($lastname_error)) echo $lastname_error; ?></span>
                        </div>
                    </div>

                        <div class="field-wrap">
                            <input type="text" name="email" placeholder="อีเมลล์ " required value="<?php if($error) echo $email; ?>" class="form-control" />
                            <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                        </div>
              
                        <div class="field-wrap">
                          <input type="password" name="password" placeholder="รหัสผ่าน " required class="form-control" />
                          <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                        </div>
          
                        <div class="field-wrap">
                          <input type="password" name="cpassword" placeholder="ยืนยันรหัสผ่าน " required class="form-control" />
                          <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                        </div>
          
                        <div class="field-wrap">
                          <input type="text" name="phone" placeholder="ระบุเบอร์โทรศัพท์ " required class="form-control" />
                          <span class="text-danger"><?php if (isset($phone_error)) echo $phone_error; ?></span>
                        </div>

                      <button type="submit" name="signup" class="button button-block"/>สมัครสมาชิก</button>
                </form>
                      <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
                      <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
            </div> <!-- ปิด <div id="signup">  -->
          
            <div id="login">   
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                    <div class="field-wrap">
                        <label>
                          Email <span class="req"></span>
                        </label>
                        <input type="text" name="email" placeholder="Your Email" required class="form-control" />
                    </div>
              
                    <div class="field-wrap">
                        <label>
                        Password<span class="req"></span>
                        </label>
                        <input type="password" name="password" placeholder="Your password" required class="form-control" />
                    </div>
                    <p class="forgot"><a href="#">ลืมรหัสผ่าน?</a></p>
              
                    <button class="button button-block" name="login">เข้าสู่ระบบ</button>
                </form>
                      <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
            </div> <!-- ปิด  <div id="login">                -->
        </div>     <!-- ปิด  <div class="tab-content">       -->   
    </div>         <!-- ปิด  </form">                        -->
</div>   

<!-- [PHP] ส่วนสำหรับโชว์รายละเอียดคอร์สแบบเต็มทั้งหมด -->
    <!-- ใช้ INNER JOIN ในการรวม table ทั้งสองอัน -->
    <?php
            $connect = mysqli_connect("localhost","root","","academicservicedb");
                mysqli_set_charset($connect, "utf8");
                    $sql='SELECT Course_ID,Name_Course,Detail_Course,Price,Start_Course,End_Course,Course_Benfit,Content_Course,Picture_Banner FROM course ';
                        if (!isset($smtUpdate)) {
                             $sql = 'SELECT * FROM  course INNER JOIN users_teacher ON course.teacher_ID=users_teacher.teacher_ID where Course_ID ='.$_POST['idforshow'].'';
                            
                            $result = mysqli_query($connect,$sql);
                            $row = mysqli_fetch_array($result);
                            
                            $path = 'images/'; 
                                if (!$result) {
                                echo '<b>Error</b>'.mysqli_error().'<br>';
                                            }
                                else {
    ?>
<!-- [ภาพปก] Course -->
                                        <div class="">    
                                            <?php 
                                                echo '      
                                                    <table background="images/building.png"  width="100%" height="50%">
                                                        <tr> 
                                                            <td>  
                                                                <br>   
                                                                <center>                                           
                                                                <img src="'. $path.$row['Picture_Banner'].'"   width="78%" height="40%"   class="img-thumbnail">
                                                                </center>
                                                                <br>
                                                            </td>
                                                            <td width="39%" height="50%"> 
                                                                <div class="col-sm-10">
                                                                    <div class="well">
                                                                        <h1> 
                                                                            <a>
                                                                                '.$row['Name_Course'].'   
                                                                            </a>
                                                                        </h1>
                                                                    </div>
                                                                </div>
                                                                </td>
                                                        </tr>
                                                    </table>
                                                    <br>
                                                    ';                         
                                            ?>                   
                                        </div>
<!-- [เนื้อหา] Course -->
                            <?php
                                echo'     
                                            <div class="container">    
                                                    <div class="col-sm-7">
                                                        <div class="well">
                                                            <h4>รายละเอียด</h4>
                                                                <p> &nbsp;&nbsp;&nbsp;&nbsp;'.$row['Detail_Course'].'</p>
                                                        </div>
                                                        <div class="well">
                                                            <h4>สิ่งที่คุณจะได้รับ</h4>
                                                                <p> &nbsp;&nbsp;&nbsp;&nbsp;'.$row['Course_Benfit'].'</p>
                                                        </div>
                                                        <div class="well">
                                                            <h4>เนื้อหา</h4>
                                                                <p> &nbsp;&nbsp;&nbsp;&nbsp;'.$row['Content_Course'].'</p>
                                                        </div>
                                                    </div>
                                                
                              
                                                    <div class="col-sm-5">
                                                        <div class="well">
                                                            <center>
                                                                <h4> ราคา  '.$row['Price'].'  บาท</h4>
                                                                    <form name="frmUpdate'.$row['Course_ID'].'" method="post">
                                                                        <input type="hidden" name="idforpay" value="'.$row['Course_ID'].'"/>
                                                                    </form>    
                                '?> 
                                                                         <button  class="btn btn-primary btn-lg" id="myBtn2"> สมัคร </button>
                                                                    <br>
                                <?php                                
                                 echo'                                    
                                                                 
                                                                <br> 
                                                                        เริ่มเรียน   '.$row['Start_Course'].'  สิ้นสุด   '.$row['End_Course'].'
                                                                <br>
                                                                <br>    
                                                            </center>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; แชร์ 
                                                        </div>
                                                    </div>              
                                                    <div class="col-sm-5">
                                                            <div class="well">
                                                                <h4>ผู้สอน</h4>
                                                                    <center>
                                                                    <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="user_profileteacher.php">
                                                                    <input type="hidden" name="idforshow" value="'.$row['Course_ID'].'"/>                             
                                                                    <input type="hidden" name="idforshow2" value="'.$row['teacher_ID'].'"/>
                                                                    <img src="'. $path.$row['teacher_Picture'].'"  width="273px" height="240px"  class="img-circle">
                                                                        <div class="info">
                                                                            <center>  
                                                                            <br>
                                                                            <br>
                                                                                <h4><b>  
                                                                                            '.$row['teacher_Name'].'
                                                                                </h4></b>

                                                                                <p>
                                                                                             '.$row['teacher_Detail'].'
                                                                                </p>
                                                                            </center>
                                                                        </div>
                                                                    <input type="submit" name="viewfullcourse" class="btn btn-primary btn-large"  value="ดูเพิ่มเติม" onClick="return confirmUpdate();"> 
                                                                    </form> 
                                                                    </center>
                                                            </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="well">
                                                                 <h4>คอร์สที่เกี่ยวข้อง</h4>
                                                        </div>
                                                    </div>
                                            </div>
                                    '; 
                                           
                                }                
                                            }
 
            mysqli_close($connect); ?>

<?php include 'footer.php';?>

<!-- [เชื่อม] JS เพื่อเวลากดแล้วเด้งของ Popup ของสมัครสมาชิก 
   ** ต้องไว้ตรงนี้หากไปไว้ใน header จะไม่ทำงาน ** -->
    <script src="js/popupForSignupAndSignin2.js"></script>
    <script src="js/popupForSignupAndSignin.js"></script>



