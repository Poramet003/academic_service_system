
<!-- Link ไปส่วนของ Header พวก Menu ต่างๆ  -->
<?php include 'header_admin.php';?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">       
<link rel="stylesheet" href="css/admin_managecourse.css">

<div id="information" class="spacer reserve-info ">
    <div class="container">
            <div class="row">
            <div class="col-sm-12">
            <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="height:40px">
                <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'manageteacher')">       จัดการผู้เรียน</button>
            </div>
          
          <div style="margin-left:200px">
            <div id="manageteacher" class="w3-container city" style="display:none">
                    <?php
                            $connect = mysqli_connect("localhost","root","","academicservicedb");
                            mysqli_set_charset($connect, "utf8");
                            
                            if (!isset($smtUpdate)) {
                                $sql='SELECT *  FROM users WHERE User_Type ="0" ';
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
                                                <img src="  "  width="273px" height="240px">
                                                    <div class="info">
                                                        <center>  
                                                            <b>  
                                                                        '.$row['firstname'].'  &nbsp; '.$row['lastname'].'
                                                            </b>
                                                        <br>
                                                        <br>
                                                            <input type="hidden" name="idfordelete" value="'.$row['user_id'].'">  
                                                            <input type="submit" name="smtDelete" class="btn btn-success btn-large"  style="width:100%" value="ดูข้อมูลสถานะ" onClick="return confirmUpdate();">
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
