<!-- [เชื่อม] ส่วนของ Header_User + เช็คว่าเข้าสู่ระบบหรือยังหากต้องการดูรายละเอียด Course-->
<?php
        session_start();
        include_once 'header_user.php';
        
?>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    th {
        text-align: left;
        padding: 8px;
    }

    td {
        text-align: right;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
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
<!-- [ภาพปก] Profile -->
                                        <div class="">    
                                            <?php 
                                                echo '      
                                                    <table background="images/building.png"  width="100%" height="50%">
                                                        <tr> 
                                                          <td width="39%" height="50%">   
                                                                <br>   
                                                                <center>                                           
                                                                <img src="'. $path.$row['teacher_Picture'].'"   width="25%" height="40%"    class="img-circle">
                                                                </center>
                                                    </table>
                                                    <br>
                        
                                            <div class="container">    
                                                    <div class="col-sm-14">
                                                        <div class="well">
                                                                <center>
                                                                <a>
                                                                <h2><b>'.$row['teacher_Name'].'</b></h2>
                                                                </a>
                                                                <center>
                                                                '.$row['teacher_Detail'].'
                                                        </div>
                                                    </div>
                                                    <center>
                                                    <div class="col-sm-5">
                                                            <div class="well">
                                                                <h4>คอร์สที่ดูแลโดย  <a> '.$row['teacher_Name'].' </a> </h4>
                                                            </div>  
                                                    </div>
                                                    </center>
                                                    <table width="100%">
                                                        <tr>
                                                            <td>
                                                          
                                                            </td>
                                                        </tr>
                                                    </table>
    '?>
    <?php
         $connect = mysqli_connect("localhost","root","","academicservicedb");
         mysqli_set_charset($connect, "utf8");
                     
               if (!isset($smtUpdate)) {
                   $sql = 'SELECT * FROM  course INNER JOIN users_teacher ON course.teacher_ID=users_teacher.teacher_ID WHERE Course_ID ='.$_POST['idforshow'].' ';                  
                   $result = mysqli_query($connect,$sql);
                   $numrows = mysqli_num_rows($result);
                   $numfields = mysqli_num_fields($result);
                   $path = 'images/';   // Path สำหรับเชื่อมไปยังที่เก็บไฟล์รูป
                   
               if (!$result) {
                   echo '<b>Error</b>'.mysqli_error().'<br>';
               } elseif ($numrows==0) {
                   echo '<b>Query executed successfully but no row returns!</b>';
               }else { 
                   while ($row = mysqli_fetch_array($result)) {


    echo'
                                            <div class="col-sm-4 wowload fadeInUp"> 
                                            <div class="rooms">
                                            <img src="'. $path.$row['Picture_Banner'].'"  width="350px" height="240px">
                                                <div class="info">
                                                    <center>  
                                                        <h3><b>  
                                                                    '.$row['Name_Course'].'
                                                        </h3></b>
                                                    </center>
                                                    <p> 
                                                                    '.$row['Detail_Course'].'  
                                                    </p>
                                                        <br>
                                                        ผู้สอน 
                                                    
                                                        <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="user_profileteacherlogin.php"> 
                                                        <center>
                                                        <button style="background-color:#E8E7E0; border:0;">                                
                                                            &nbsp; &nbsp; <a>'.$row['teacher_Name'].'</a>
                                                            <input type="hidden" name="idforshow" value="'.$row['Course_ID'].'"/>   
                                                            <input type="hidden" name="idforshow2" value="'.$row['teacher_ID'].'"/>  
                                                            </button type="hidden">      
                                                        </center>                              
                                                        </form>
                                                            <br>
                                                    <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="user_fullcourseForlogin.php">
                                                        <input type="hidden" name="idforshow" value="'.$row['Course_ID'].'"/> 
                                                        <input type="submit" name="viewfullcourse" class="btn btn-primary btn-large"  value="ดูเพิ่มเติม" onClick="return confirmUpdate();">
                                                    </form>      
                                                </div>
                                            </div>
                                        </div>
                                                    ';                                     
                                                       
                                                                }  
                    }
                                        }
                                    }          
                                             }       
 
            mysqli_close($connect); ?> 
                                        </div>  

                                        <!--  -->
                                        
         <div class="container">    

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
<!-- [ภาพปก] Profile -->
                                        <div class="">    
                                            <?php 
                                                echo '      
                                                    <center>
                                                    <div class="col-sm-5">
                                                            <div class="well">
                                                                <h4>คอร์สผู้ช่วยสอนของ <a> '.$row['teacher_Name'].' </a> </h4>
                                                            </div>  
                                                    </div>
                                                    </center>
                                                    <table width="100%">
                                                        <tr>
                                                            <td>
                                                          
                                                            </td>
                                                        </tr>
                                                    </table>
    '?>
    <?php
         $connect = mysqli_connect("localhost","root","","academicservicedb");
         mysqli_set_charset($connect, "utf8");
                     
               if (!isset($smtUpdate)) {
                   $sql = 'SELECT * FROM  course INNER JOIN users_teacher ON course.teacher_ID=users_teacher.teacher_ID  where teacher_assitant ='.$_POST['idforshow2'].'  ';                  
                   $result = mysqli_query($connect,$sql);
                   $numrows = mysqli_num_rows($result);
                   $numfields = mysqli_num_fields($result);
                   $path = 'images/';   // Path สำหรับเชื่อมไปยังที่เก็บไฟล์รูป
                   
               if (!$result) {
                   echo '<b>Error</b>'.mysqli_error().'<br>';
               } elseif ($numrows==0) {
                   echo ' ';
               }else { 
                   while ($row = mysqli_fetch_array($result)) {


    echo'
                                            <div class="col-sm-4 wowload fadeInUp"> 
                                            <div class="rooms">
                                            <img src="'. $path.$row['Picture_Banner'].'"  width="350px" height="240px">
                                                <div class="info">
                                                    <center>  
                                                        <h3><b>  
                                                                    '.$row['Name_Course'].'
                                                        </h3></b>
                                                    </center>
                                                    <p> 
                                                                    '.$row['Detail_Course'].'  
                                                    </p>
                                                        <br>
                                                        ผู้สอน 
                                                    
                                                        <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="user_profileteacherlogin.php"> 
                                                        <center>
                                                        <button style="background-color:#E8E7E0; border:0;">                                
                                                            &nbsp; &nbsp; <a>'.$row['teacher_Name'].'</a>
                                                            <input type="hidden" name="idforshow" value="'.$row['Course_ID'].'"/>   
                                                            <input type="hidden" name="idforshow2" value="'.$row['teacher_ID'].'"/>  
                                                            </button type="hidden">      
                                                        </center>                              
                                                        </form>
                                                            <br>
                                            
                                                    <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="user_fullcourseForlogin.php">
                                                        <input type="hidden" name="idforshow" value="'.$row['Course_ID'].'"/> 
                                                        <input type="submit" name="viewfullcourse" class="btn btn-primary btn-large"  value="ดูเพิ่มเติม" onClick="return confirmUpdate();">
                                                    </form>      
                                                </div>
                                            </div>
                                        </div>
                                                    ';                                     
                                                       
                                                                }  
                    }
                                        }
                                    }          
                                             }       
 
            mysqli_close($connect); ?> 
                                        </div>

 </div>

                                        
<?php include 'footer.php';?>

<!-- [เชื่อม] JS เพื่อเวลากดแล้วเด้งของ Popup ของสมัครสมาชิก 
   ** ต้องไว้ตรงนี้หากไปไว้ใน header จะไม่ทำงาน ** -->
    <script src="js/popupForSignupAndSignin2.js"></script>
    <script src="js/popupForSignupAndSignin.js"></script>


