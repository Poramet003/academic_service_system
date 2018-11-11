<!-- Link ไปส่วนของ Header พวก Menu ต่างๆ  -->
<?php 
session_start();
include 'header_teacher.php';?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">       
<link rel="stylesheet" href="css/admin_managecourse.css">
<style>
body{
        background-color:#FFFFFF
    }
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




    <div class="container">
        <div class="row">
        <h2>คอร์สสอนทั้งหมดของฉัน</h2>
        <div class="col-sm-11">
          <div style="margin-left:0px">
              
                    <?php
                    	$connect = mysqli_connect("localhost","root","","academicservicedb");
                        mysqli_set_charset($connect, "utf8");
                        
                        if (!isset($smtUpdate)) {
                            $sql = 'SELECT * FROM  users_teacher WHERE teacher_ID ='.$_SESSION['user_id'].'';

                                 $result = mysqli_query($connect,$sql);
                                $row = mysqli_fetch_array($result);
                                if (!$result) {
                                    echo '<b>Error</b>'.mysqli_error().'<br>';
                                }
                            else {

                            }
                        };
                        mysqli_close($connect);
                        ?>

<?php
                
                            $connect = mysqli_connect("localhost","root","","academicservicedb");
                        mysqli_set_charset($connect, "utf8");
                        
                        if (!isset($smtUpdate)) {
                            $sql = 'SELECT * FROM  course WHERE teacher_ID ='.$_SESSION['user_id'].'';
                            

                            // $sql = 'SELECT * form users_teacher  INNER JOIN course 
                            // ON users_teacher.teacher_ID=course.teacher_ID  
                            // Where users_teacher.teacher_ID =" '.$_SESSION['user_id'].' " ';
                            


                                $sql = 'SELECT * FROM  users As d1
                                INNER JOIN course AS d2 
                                ON (d1.teacher_ID=d2.teacher_ID)
                                INNER JOIN users_teacher AS d3
                                ON (d1.teacher_ID=d3.teacher_ID)  WHERE user_id = '.$_SESSION['user_id'].' ';
                                
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
                                                <img src="'. $path.$row['Picture_Banner'].'"  width="318px" height="240px">
                                                    <div class="info">
                                                        <center>  
                                                            <h3><b>  
                                                                        '.$row['Name_Course'].'
                                                            </h3></b>
                                                        </center>
                                               
                                    ';
                                    
                                                        // <p> 
                                                        //                 '.$row['Detail_Course'].'  
                                                        //     <br>
                                                        //     <br>
                                                        //     ผู้สอน 
                                                        
                                                        //     <center>
                                                        //     <button style="background-color:#E8E7E0; border:0;">                                
                                                        //         <img src="'. $path.$row['teacher_Picture'].'"  width="50px" height="50px"  class="img-circle">
                                                        //         &nbsp; &nbsp; <a>'.$row['teacher_Name'].'</a>
                                                        //         <input type="hidden" name="idforshow" value="'.$row['Course_ID'].'"/>   
                                                        //     </button type="hidden">      
                                                        //     </center>                              
                                                        //         <br>
                                                        //         ';

                                                        //         echo'
                                                        //         <td><font size="6"><a> '.$row['Price'].' </a></font></td>
                                     echo'                     
                                                        </p>
                                                        <center>
                                                        <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="teacher_addcourse.php">
                                                            <input type="hidden" name="idforteacher" value="'.$row['teacher_ID'].'"/>   
                                                            <input type="hidden" name="idcourse" value="'.$row['Course_ID'].'"/>  
                                                            <input type="submit" name="smtUpdate" class="btn btn-info"  style="width:100%" value="จัดการตารางสอน" onClick="return confirmUpdate();">
                                                        </form>
                                                        <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="teacher_updateAddcourse.php">
                                                            <input type="hidden" name="idforteacher" value="'.$row['teacher_ID'].'"/>   
                                                            <input type="hidden" name="idcourse" value="'.$row['Course_ID'].'"/>  
                                                            <input type="submit" name="smtUpdate" class="btn btn-default" style="width:100%" value="แก้ไขตารางการสอน" onClick="return confirmUpdate();">
                                                        </form>
                                                        <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="teacher_updatecourse.php">
                                                        <input type="hidden" name="idforupdate" value="'.$row['Course_ID'].'"\> 
                                                        <input type="submit" name="smtUpdate" class="btn btn-danger btn-large"   style="width:100%" value="แก้ไขข้อมูลคอร์ส" onClick="return confirmUpdate();">
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
            </div>
	    </div>
    </div>
</div>

<?php include 'footer.php';?>
