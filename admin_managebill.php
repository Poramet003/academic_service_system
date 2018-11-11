
<!-- Link ไปส่วนของ Header พวก Menu ต่างๆ  -->
<?php include 'header_admin.php';?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">       
<link rel="stylesheet" href="css/admin_managecourse.css">


<style>
    body{
        background-color:#FFFFFF
    }
    .w3-content
        {position:relative;margin-top:0em; height:300; width:1594px; background-image: url("../User/images/building.png");}
    .w3-btn,.w3-button
        {border:none;display:inline-block;outline:0;padding:8px 16px;vertical-align:middle;overflow:hidden;text-decoration:none;color:inherit;background-color:inherit;text-align:center;cursor:pointer;white-space:nowrap}
    .w3-btn,.w3-button
        {-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none} 
    .w3-disabled,.w3-btn:disabled,.w3-button:disabled
        {cursor:not-allowed;opacity:0.3}.w3-disabled *,:disabled *{pointer-events:none}
    .w3-bar-block .w3-dropdown-hover .w3-button,.w3-bar-block .w3-dropdown-click .w3-button
        {width:100%;text-align:left;padding:8px 16px}
    .w3-button:hover
        {color:#000!important;background-color:#ccc!important}
    .w3-content button {
        position: absolute;
        top: 32%;
        }
    .w3-display-right 
    {right:0}
    .w3-display-left 
        {left:0}

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td {
        text-align: center;
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
            <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="height:120px">
                <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'a1')">      สถานะรอการชำระเงิน</button>
                <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'a2')">         สถานะกำลังตรวจสอบ</button>
                <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'a3')">         สถานะเสร็จสิ้น</button>

            </div>
          
          <div style="margin-left:200px">
            <div id="a1" class="w3-container city" style="display:none">
                        <center>
                                            <h4>จัดการแจ้งชำระเงิน [รอการชำระเงิน]</h4>
                        </center>
                                            <div class="well">
                
                                            <table border="1">
                                            <tr>
                                                <td> <b> &nbsp; No.             </b> </td>
                                                <td> <b> &nbsp; ชื่อคอร์สเรียน      </b> </td>
                                                <td> <b> &nbsp; ราคา            </b> </td>
                                                <td> <b> &nbsp; วัน/เวลาที่โอน      </b> </td>
                                                <td> <b> &nbsp; หลักฐานการชำระเงิน </b> </td>
                                                <td> <b> &nbsp; สถานะการตรวจสอบ </b> </td>
                                            </tr>
                                          
                                            <?php
                                            $connect = mysqli_connect("localhost","root","","academicservicedb");
                                            mysqli_set_charset($connect, "utf8");
                                                    if (!isset($smtUpdate)) {
                                                        $sql = 'SELECT * FROM  course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID  WHERE Status = "รอการชำระเงิน" ';
                                                        $result = mysqli_query($connect,$sql);
                                                        $numrows = mysqli_num_rows($result);
                                                        $numfields = mysqli_num_fields($result);
                                                        if (!$result) {
                                                            echo '<b>Error</b>'.mysqli_error().'<br>';
                                                        } elseif ($numrows==0) {
                                                           
                                                        }else { 
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                echo'                                                              
                                                                                <tr>
                                                                                    <td>   '.$row['order_no'].' </td>
                                                                                    <td>   '.$row['Name_Course'].' </td>
                                                                                    <td>   '.$row['Price'].'  </td>
                                                                                    <td>    '.$row['Date_pay'].'  &nbsp;  '.$row['Time_pay'].' </td>
                                                                                    <td>    '.$row['Picture_pay'].' </td>
                                                                                    <td>  '.$row['Status'].' </td>
                                                                    ';
                                                                               echo '</tr>';

                                                                      
                                                                                                        }
                                                                                }
                                                                            }
                                                    mysqli_close($connect);
                                            ?>
                                            </table>
                                            <br>

                            </div>
            </div>
            <div id="a2" class="w3-container city" style="display:none">
            <center>
                                            <h4>จัดการแจ้งชำระเงิน [กำลังตรวจสอบ]</h4>
                        </center>
                                            <div class="well">
                
                                            <table border="1">
                                            <tr>
                                                <td> <b> &nbsp; No.             </b> </td>
                                                <td> <b> &nbsp; ชื่อคอร์สเรียน      </b> </td>
                                                <td> <b> &nbsp; ราคา            </b> </td>
                                                <td> <b> &nbsp; วัน/เวลาที่โอน      </b> </td>
                                                <td> <b> &nbsp; หลักฐานการชำระเงิน </b> </td>
                                                <td> <b> &nbsp; สถานะการตรวจสอบ </b> </td>
                                                <td> <b> &nbsp; เปลี่ยนสถานะ </b> </td>
                                            </tr>
                                          
                                            <?php
                                            $connect = mysqli_connect("localhost","root","","academicservicedb");
                                            mysqli_set_charset($connect, "utf8");
                                                    if (!isset($smtUpdate)) {
                                                        $sql = 'SELECT * FROM  course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID  WHERE Status = "กำลังตรวจสอบ" ';
                                                        $result = mysqli_query($connect,$sql);
                                                        $numrows = mysqli_num_rows($result);
                                                        $numfields = mysqli_num_fields($result);
                                                        $path = 'images/'; 
                                                        if (!$result) {
                                                            echo '<b>Error</b>'.mysqli_error().'<br>';
                                                        } elseif ($numrows==0) {
                                                           
                                                        }else { 
                                                            echo'    <form name="frminsert" action="admin_managebill2.php" method="post"> ';
                                                            
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                echo'                                                              
                                                                                <tr>
                                                                                    <td>   '.$row['order_no'].' </td>
                                                                                    <td>   '.$row['Name_Course'].' </td>
                                                                                    <td>   '.$row['Price'].'  </td>
                                                                                    <td>    '.$row['Date_pay'].'  &nbsp;  '.$row['Time_pay'].' </td>
                                                                                    <td>     <img src="'. $path.$row['Picture_pay'].'"  width="200px" height="150px"></td>
                                                                    ';
                                                                    echo ' <td>';
                                                                    echo '   <select name="เสร็จสิ้น" >';
                                                                    echo '      <option value="เสร็จสิ้น"> ' .$row['Status'].'   </option>';
                                                                    echo '  </select>';
                                                                    echo ' </td> ';
                                                                    echo '<td>';
                                                                    echo '<input type="hidden" name="idforupdate" value="'.$row['order_no'].'">';
                                                                    echo' <input type="submit" class="btn btn-primary btn-lg btn-block " value="ยืนยัน">';
                                                                    echo '</td>';
                                                               
                                                                      
                                                                                                        }
                                                                             echo '       </form>';     
                                                                                }
                                                                            }
                                                    mysqli_close($connect);
                                            ?>
                                            </table>
                                            <br>

                            </div>
                  
            </div>
            <div id="a3" class="w3-container city" style="display:none">
            <center>
                                            <h4>จัดการแจ้งชำระเงิน [เสร็จสิ้น]</h4>
                        </center>
                                            <div class="well">
                
                                            <table border="1">
                                            <tr>
                                                <td> <b> &nbsp; No.             </b> </td>
                                                <td> <b> &nbsp; ชื่อคอร์สเรียน      </b> </td>
                                                <td> <b> &nbsp; ราคา            </b> </td>
                                                <td> <b> &nbsp; วัน/เวลาที่โอน      </b> </td>
                                                <td> <b> &nbsp; หลักฐานการชำระเงิน </b> </td>
                                                <td> <b> &nbsp; สถานะการตรวจสอบ </b> </td>
        
                                            </tr>
                                          
                                            <?php
                                            $connect = mysqli_connect("localhost","root","","academicservicedb");
                                            mysqli_set_charset($connect, "utf8");
                                                    if (!isset($smtUpdate)) {
                                                        $sql = 'SELECT * FROM  course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID  WHERE Status = "เสร็จสิ้น" ';
                                                        $result = mysqli_query($connect,$sql);
                                                        $numrows = mysqli_num_rows($result);
                                                        $numfields = mysqli_num_fields($result);
                                                        if (!$result) {
                                                            echo '<b>Error</b>'.mysqli_error().'<br>';
                                                        } elseif ($numrows==0) {
                                                           
                                                        }else { 
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                echo'                                                              
                                                                                <tr>
                                                                                    <td>   '.$row['order_no'].' </td>
                                                                                    <td>   '.$row['Name_Course'].' </td>
                                                                                    <td>   '.$row['Price'].'  </td>
                                                                                    <td>    '.$row['Date_pay'].'  &nbsp;  '.$row['Time_pay'].' </td>
                                                                                    <td>    '.$row['Picture_pay'].' </td>
                                                                                    <td>
                                                                    ';
                                                                    echo ' <font color="red"> ';
                                                                    echo '      ' .$row['Status'].'  ';
                                                                    echo '      </font>';
                                                                
                                                                    echo ' </td> ';

                                                                                                        }  
                                                                                }
                                                                            }
                                                    mysqli_close($connect);
                                            ?>
                                            </table>
                                            <br>

                            </div>        
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



