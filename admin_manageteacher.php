
<!-- Link ไปส่วนของ Header พวก Menu ต่างๆ  -->
<?php include 'header_admin.php';?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">       
<link rel="stylesheet" href="css/admin_managecourse.css">

<div id="information" class="spacer reserve-info ">
    <div class="container">
            <div class="row">
            <div class="col-sm-12">
            <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="height:130px">
                <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'manageteacher')">       จัดการผู้สอน</button>
                <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'delete')">       จัดการไอดีส่วนเกิน</button>
                <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'addteacher')">          เพิ่มผู้สอน</button>
            </div>
          
          <div style="margin-left:200px">
            <div id="manageteacher" class="w3-container city" style="display:none">
                    <?php
                            $connect = mysqli_connect("localhost","root","","academicservicedb");
                            mysqli_set_charset($connect, "utf8");
                            
                            if (!isset($smtUpdate)) {
                                $sql='SELECT *  FROM users_teacher WHERE User_Type ="2" ';
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
                                                <img src="'. $path.$row['teacher_Picture'].'"  width="273px" height="240px">
                                                    <div class="info">
                                                        <center>  
                                                            <h3><b>  
                                                                        '.$row['teacher_Name'].'
                                                            </h3></b>
                                                        <br>
                                                        <form name="frmUpdate'.$row['teacher_ID'].'" method="post"  action="admin_deleteteacher.php">
                                                            <input type="hidden" name="idfordelete" value="'.$row['teacher_ID'].'">  
                                                            <input type="submit" name="smtDelete" class="btn btn-danger btn-large"  style="width:100%" value="ลบออกจากสถานะผู้สอน" onClick="return confirmUpdate();">
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
            
            <div id="delete" class="w3-container city" style="display:none">
            <center>
                                    <h3>เลือกข้อมูลที่ท่านต้องการจะลบออกจากฐานข้อมูล</h3>
                                    </center>
                                    <form action="admin_deletefaketeacher.php" name="frmAdd" method="post" enctype="multipart/form-data">
                                    <br>
                                    
                                        <div class="login-form">
                                                    <div class="form-group">
                                                    <?php
                                                            $connect = mysqli_connect("localhost","root","","academicservicedb");
                                                            mysqli_set_charset($connect, "utf8");
                                                            
                                                            if (!isset($smtUpdate)) {
                                                                $sql='SELECT * FROM users_teacher';
                                                                $result = mysqli_query($connect,$sql);
                                                                $numrows = mysqli_num_rows($result);
                                                                $numfields = mysqli_num_fields($result);
                                        
                                                            $path = 'images/'; //---->เช่น 'images/'
                                                                if (!$result) {
                                                                    echo '<b>Error</b>'.mysqli_error().'<br>';
                                                                } elseif ($numrows==0) {
                                                                    echo '<b>Query executed successfully but no row returns!</b>';
                                                                }else { 
                                                                echo '   <select name="deletefaketeacher" >';
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                
                                                                echo '  
                                                                <option value="' .$row['teacher_ID'].' "> ' .$row['teacher_Name'].'   </option>      
                                                                     ';
                                                                                                                }
                                                                echo'     </select>';
                                                                    }
                                                                                    }
                                                                echo'
                                                                </div>
                                                                <input type="submit" name="smtDelete" class="btn btn-danger btn-large"  style="width:100%" value="ลบ" onClick="return confirmUpdate();">
                                                                ';
                                                                                    mysqli_close($connect);
                                                    ?>
                                                   
                                        </div>
                                    </form>
            </div>

            <div id="addteacher" class="w3-container city" style="display:none">
                                    <center>
                                    <h3>เพิ่มผู้สอนจากรายชื่อที่ต้องการ</h3>
                                    </center>
                                    <form action="admin_addteacher.php" name="frmAdd" method="post" enctype="multipart/form-data">
                                    <br>
                                    
                                        <div class="login-form">
                                                    <div class="form-group">
                                                    <?php
                                                            $connect = mysqli_connect("localhost","root","","academicservicedb");
                                                            mysqli_set_charset($connect, "utf8");
                                                            
                                                            if (!isset($smtUpdate)) {
                                                                $sql='SELECT * FROM users_teacher';
                                                                $result = mysqli_query($connect,$sql);
                                                                $numrows = mysqli_num_rows($result);
                                                                $numfields = mysqli_num_fields($result);
                                        
                                                            $path = 'images/'; //---->เช่น 'images/'
                                                                if (!$result) {
                                                                    echo '<b>Error</b>'.mysqli_error().'<br>';
                                                                } elseif ($numrows==0) {
                                                                    echo '<b>Query executed successfully but no row returns!</b>';
                                                                }else { 
                                                                echo '   <select name="addteacher" >';
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                
                                                                echo '  
                                                                <option value="' .$row['teacher_ID'].' "> ' .$row['teacher_Name'].'   </option>      
                                                                     ';
                                                                                                                }
                                                                echo'     </select>';
                                                                    }
                                                                                    }
                                                                echo'
                                                                </div>
                                                                <input button type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="เพิ่มผู้สอน"></button>
                                                                ';
                                                                                    mysqli_close($connect);
                                                    ?>
                                                   
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
        
    </div>      <!--ปิด   <div class="w3-container w3-content w3-padding-64" style="max-width:1500px" id="band">  -->
        
            </div>
	    </div>
    </div>
</div>



<?php include 'footer.php';?>
