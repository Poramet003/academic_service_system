
<!-- Link ไปส่วนของ Header พวก Menu ต่างๆ  -->
<?php include 'header_admin.php';?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">       
<link rel="stylesheet" href="css/admin_managecourse.css">
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


<div id="information" class="spacer reserve-info ">
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
        <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="height:170px">
            <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'managecourse')">       จัดการคอร์สเรียน</button>
            <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'managecertificate')">  จัดการเกียรติบัตร</button>
            <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'statuscourse')">       สถานะคอร์ส</button>
            <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'addcourse')">          เพิ่มคอร์สเรียน</button>
          </div>
          
          <div style="margin-left:200px">
            <div id="managecourse" class="w3-container city" style="display:none">
                    <?php
                            $connect = mysqli_connect("localhost","root","","academicservicedb");
                            mysqli_set_charset($connect, "utf8");
                            
                            if (!isset($smtUpdate)) {
                                $sql = 'SELECT * FROM  course INNER JOIN users_teacher ON course.teacher_ID=users_teacher.teacher_ID ';
                                $result = mysqli_query($connect,$sql);
                                $numrows = mysqli_num_rows($result);
                                $numfields = mysqli_num_fields($result);

                                $path = 'images/'; //---->เช่น 'images/'
                                
                                if (!$result) {
                                    echo '<b>Error</b>'.mysqli_error().'<br>';
                                } elseif ($numrows==0) {
                                    echo '<b>Query executed successfully but no row returns!</b>';
                                }else { 
                                    while ($row = mysqli_fetch_array($result)) {
                                        
                                 // มีทั้งหมด 2 ฟอร์ม ฟอร์มแรก ส่งไปยัง update ฟอร์มสองส่งไปยัง Delete       
                                echo '  
                                        <div class="col-sm-4 wowload fadeInUp"> 
                                            <div class="rooms">
                                                <img src="'. $path.$row['Picture_Banner'].'"  width="273px" height="240px">
                                                    <div class="info">
                                                     
                                                        <h3 align="left" >
                                                              '.$row['Name_Course'].'
                                                      
                                                       </h3>
                                                                                                
                                                  <p align="left"> ผู้สอน &emsp;'.$row['teacher_Name'].' </p> 
                                                  <h3 align="right" style="color:#337ab7">'.$row['Price'].'</h3>
                                                
                                                  <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="user_profileteacher.php"> 
                                                                      
                                                  </form>
                                                                ';
               
                                                        echo'
                                                        <center>
                                                        <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="admin_updatecourse.php">
                                                            <input type="hidden" name="idforupdate" value="'.$row['Course_ID'].'"\> 
                                                            <input type="submit" name="smtUpdate" class="btn btn-primary btn-large"  style="width:100%" value="แก้ไข" onClick="return confirmUpdate();">
                                                        </form>
                                                        <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="admin_deletecourse.php">
                                                            <input type="hidden" name="idfordelete" value="'.$row['Course_ID'].'">  
                                                            <input type="submit" name="smtDelete" class="btn btn-danger btn-large"  style="width:100%" value="ลบ" onClick="return confirmUpdate();">
                                                        </form>  
                                                        <center>      
                                                    </div>
                                            </div>
                                    </div>';
                                    }
                                    echo '</table>';
                                }
                            }    
                            mysqli_close($connect);
                ?>
        
            </div>

            <div id="managecertificate" class="w3-container city" style="display:none">
                 
                        
            </div>

            <div id="statuscourse" class="w3-container city" style="display:none">
                   
                                   
           </div>

            <div id="addcourse" class="w3-container city" style="display:none">
                        <form action="admin_addcourse.php" name="frmAdd" method="post" enctype="multipart/form-data">
                                <div class="login-form">
                                    <div class="form-group">
                                        <label for="Room Remake" class="col-sm-4 col-form-label">ชื่อคอร์ส</label>
                                            <input type="text" class="form-control login-field"  placeholder="ระบุชื่อของคอร์ส" id="Name" name="Name"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="Detail" class="col-sm-4 col-form-label">รูปคอร์สเรียน</label>
                                            <input type="file" name="image" id="imagecourse">
                                    </div>

                                    <div class="form-group" >
                                        <label for="Room Remake" class="col-sm-4 col-form-label">รายละเอียด</label>
                                            <textarea id="Detail" cols="50" rows="4" name="รายละเอียด" placeholder="รายละเอียด"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="Detail" class="col-sm-4 col-form-label">ราคา</label>
                                            <input type="text" class="form-control login-field"  placeholder="ราคา" id="Price" name="Price" />  
                                    </div>

                                    <div class="form-group">
                                        <label for="Detail" class="col-sm-4 col-form-label">เริ่ม</label>
                                            <input type="date" class= "form-control" name="checkin"  value="" >
                                    </div>

                                    <div class="form-group">
                                        <label for="Detail" class="col-sm-4 col-form-label">สิ้นสุด</label>
                                            <input type="date" class= "form-control" name="checkout"  value=""><br>
                                    </div>

                                    <div class="form-group">
                                        <label for="Detail" class="col-sm-4 col-form-label">สิ่งที่คุณจะได้รับ</label>
                                            <textarea id="Benfit" cols="50" rows="4" name="Benfit" placeholder="สิ่งที่ผู้เรียนจะได้รับ"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="Detail" class="col-sm-4 col-form-label">เนื้อหาคอร์ส</label>
                                            <textarea id="Content" name="Content" cols="50" rows="4" placeholder="ระบุเนื้อหาของคอร์สเรียน"></textarea>
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <label for="Detail" class="col-sm-4 col-form-label">รายละเอียดผู้สอน</label>
        
                                    <?php
                                    $connect = mysqli_connect("localhost","root","","academicservicedb");
                                    mysqli_set_charset($connect, "utf8");
                                    
                                    if (!isset($smtUpdate)) {
                                        $sql='SELECT teacher_ID,teacher_name FROM users_teacher ' ;

                                        $result = mysqli_query($connect,$sql);
                                        $numrows = mysqli_num_rows($result);
                                        $numfields = mysqli_num_fields($result);
        
                                        echo '   <select name="teachername" >';
                                        if (!$result) {
                                            echo '<b>Error</b>'.mysqli_error().'<br>';
                                        } elseif ($numrows==0) {
                                            echo '<b>Query executed successfully but no row returns!</b>';
                                        }else { 
                                            while ($row = mysqli_fetch_array($result)) {
                                                
                                        echo '  
                                                <option value="' .$row['teacher_ID'].' "> ' .$row['teacher_name'].'   </option>
                                
                                            ';
                                            }  echo '  </select>';
                                        
                                        }
                                    
                                    }
                                ?>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <label for="Detail" class="col-sm-4 col-form-label">รายละเอียดผู้ช่วยสอน</label>
        
                                    <?php
                                    $connect = mysqli_connect("localhost","root","","academicservicedb");
                                    mysqli_set_charset($connect, "utf8");
                                    
                                    if (!isset($smtUpdate)) {
                                        $sql='SELECT teacher_ID,teacher_name FROM users_teacher    ' ;

                                        $result = mysqli_query($connect,$sql);
                                        $numrows = mysqli_num_rows($result);
                                        $numfields = mysqli_num_fields($result);
        
                                        echo '   <select name="teacherhelpme" >';
                                        if (!$result) {
                                            echo '<b>Error</b>'.mysqli_error().'<br>';
                                        } elseif ($numrows==0) {
                                            echo '<b>Query executed successfully but no row returns!</b>';
                                        }else { 
                                        echo ' <option value="0">   -  </option>';
                                            while ($row = mysqli_fetch_array($result)) {
                                        echo '  
                                                <option value="' .$row['teacher_ID'].' "> ' .$row['teacher_name'].'   </option>
                                            
                                            ';
                                            }  echo '  </select>';
                                        
                                        }
                                    
                                    }
                                ?>
                                    </div>     
                                    <br>
                                    <br>
                                    <input button type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="เพิ่มคอร์สเรียน"></button>
                                </div>
                        </form>
            </div>
       </div>
</div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>


<!-- JS สำหรับ เมนู Tab ด้านบน -->          
          <script>
          function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
               x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-red", ""); 
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " w3-red";
          }
          </script> 
            </div>
	    </div>
    </div>
</div>

<?php include 'footer.php';?>
