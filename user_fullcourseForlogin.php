<!-- [เชื่อม] ส่วนของ Header_User + เช็คว่าเข้าสู่ระบบหรือยังหากต้องการดูรายละเอียด Course-->
<?php
        session_start();
        include_once 'header_user.php';
        
?>
<!-- <style>
img {
    border-radius: 100%;
}
</style> -->
<!-- [PHP] ส่วนสำหรับโชว์รายละเอียดคอร์สแบบเต็มทั้งหมด -->
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
                                                                    <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="user_paycourse.php">
                                                                        <input type="hidden" name="idforpay" value="'.$row['Course_ID'].'"/> 
                                                                        <input type="submit" name="viewpaycourse" class="btn btn-primary btn-lg"  value="สมัคร" onClick="return confirmUpdate();">
                                                                    </form>
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
                                                                                <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="user_profileteacherlogin.php">
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
            
            
            
            






