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

<!-- [เนื้อหา] สมัครสมาชิก , เข้าสู่ระบบ-->
<div class="container">
    <h2>คอร์สเรียนทั้งหมด</h2>
          <!-- เรียกใช้งาน PHP-->                                
          <?php
              $connect = mysqli_connect("localhost","root","","academicservicedb");
              mysqli_set_charset($connect, "utf8");
                    if (!isset($smtUpdate)) {
                        $sql = 'SELECT * FROM  course INNER JOIN users_teacher ON course.teacher_ID=users_teacher.teacher_ID ';
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
                        echo ' 
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
                                        <table>
                                        <tr>
                                         <td><h3><a> '.$row['Price'].' </a></h3></td>
                                        </tr>
                                    </table>

                                  <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="user_fullcourseForlogin.php">
                                      <input type="hidden" name="idforshow" value="'.$row['Course_ID'].'"/> 
                                      <input type="submit" name="viewfullcourse" class="btn btn-primary btn-large"  value="ดูเพิ่มเติม" onClick="return confirmUpdate();">
                                  </form>      
                              </div>
                        </div>
                    </div>';
                            }
                    
                        }
                    }    
              mysqli_close($connect);
          ?>
</div>

<?php include 'footer.php';?>
