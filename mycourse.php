
<!-- Link ไปส่วนของ Header พวก Menu ต่างๆ  -->
<!--Style สำหรับภาพปกCourse + ตาราง -->
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
<?php  
session_start();

include_once 'header_user.php';
?>
 
  
                   <div class="container">
                        <br>
                        <br>
                        
                        <center>
                                            <h4>คอร์สเรียนของฉัน</h4>
                        </center>
                                            <div class="well">
                                                    <?php
                                                    $connect = mysqli_connect("localhost","root","","academicservicedb");
                                                    mysqli_set_charset($connect, "utf8");
                                                            if (!isset($smtUpdate)) {
                                                            $sql = 'SELECT * FROM course as d1
                                                                    INNER JOIN    course_teacher as d2
                                                                    ON d1.Course_ID=d2.Course_ID
                                                                    INNER JOIN course_user as d3
                                                                    ON d1.Course_ID=d3.Course_ID
                                                                    WHERE users_id = '.$_SESSION['user_id'].'';

                                                    $result = mysqli_query($connect,$sql);
                                                    $row = mysqli_fetch_array($result);
                                                    
                                                    if (!$result) {
                                                        echo '<b>Error</b>'.mysqli_error().'<br>';
                                                                }

                                                    else {
                                                        
                                                        echo'
                                                                            
                                                                ';
                                                        }
                                                    }
                                                    
                                                        mysqli_close($connect);
                                                    ?>
                                                
                                          
                                          
                                            <?php
                                            $connect = mysqli_connect("localhost","root","","academicservicedb");
                                            mysqli_set_charset($connect, "utf8");
                                                    if (!isset($smtUpdate)) {
                                                    $sql = 'SELECT * FROM course as d1
                                                            INNER JOIN    course_teacher as d2
                                                            ON d1.Course_ID=d2.Course_ID
                                                            INNER JOIN course_user as d3
                                                            ON d1.Course_ID=d3.Course_ID
                                                            WHERE users_id = '.$_SESSION['user_id'].'';
                                                       

                                                        $result = mysqli_query($connect,$sql);
                                                        $numrows = mysqli_num_rows($result);
                                                        $numfields = mysqli_num_fields($result);

                                                        if (!$result) {
                                                            echo '<b>Error</b>'.mysqli_error().'<br>';
                                                        } elseif ($numrows==0) {
                                                   
                                                        }else { 
                                                            
                                                            echo'
                                                             
                                                            ';
                                                           
                                                           // การทำงานคือ  สมมุติ  number = A 
                                                           // หาก number ไม่เท่ากับ C มันจะเข้าไปปริ้นหัวข้อตาราง
                                                           // เสร็จกำหนดให้ c = A
                                                           // พอรอบต่อไป  a = c แล้ว เลยไม่เข้าไปทำ 
                                                           
                                                                $number2 = '';
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                
                                                                $number = $row['Name_Course'];
                                                                if($number != $number2){
                                                                echo' 
                                                                        <table border="1">
                                                                        <br>
                                                                        <br>
                                                                        <button class="btn btn-primary btn-large">
                                                                        <font size="5">
                                                                            '.$row['Name_Course'].'
                                                                        </font>
                                                                        </button>
                                                                  
                                                                
                                                                                <tr>
                                                                                    <td> <b> &nbsp; ครั้งที่เรียน           </b> </td>
                                                                                    <td> <b> &nbsp; วันที่      </b> </td>
                                                                                    <td> <b> &nbsp; รายละเอียด            </b> </td>
                                                                                    <td> <b> &nbsp; เช็คชื่อ      </b> </td>
                                                                                    <td> <b> &nbsp; QUIZ </b> </td>
                                                                                </tr>  
                                                                                <br>
                                                                    ';
                                                                  
                                                                $number2 = $row['Name_Course'];

                                                                } 
                                                                echo' <form name="frmUpdate" method="post"  action="check_name.php">          
                                                                                <tr>
                                                                                    <td>   '.$row['week'].'        </td>
                                                                                    <td>   '.$row['date_study'].'      </td>
                                                                                    <td>   '.$row['detail'].'            </td>

                                                                    ';
                                                                if($row['check_name_user'] == "เข้าเรียน"){
                                                                echo'
                                                                                    <td >   <button type="button" style="width:100%" class="btn btn-success">'.$row['check_name_user'].'</button>  </td>
                                                                    ';
                                                                }else{
                                                                echo'
                                                                                    <td>    <input type="text"  class="form-control login-field" name="checkname" value="'.$row['check_name_user'].'"/><input type="submit"  style="width:100%" class="btn btn-warning"  value="เช็คชื่อ" onClick="return confirmUpdate();">  </td>
                                                                    ';
                                                                }
                                                                echo'
                                                                                    
                                                                                    <td>   '.$row['file_upload'].'  </td>
                                                                                </tr>
                                                                      </form>          
                                                                    ';                           
                                                                    
                                                                          
                                                                                                        }
                                                                                                                         
                                                                                                        echo'
                                                                                                      
                                                                                                
                                                                                                        </table> 
                                                                                                        <br>
                                                                                                        ';             
                                                                }
                                                                            }
                                                                                 
                                                    mysqli_close($connect);
                                            ?>
                                            <br>

                            </div>
                    </div class="container">
      


<?php include 'footer.php';?>
