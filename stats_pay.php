
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
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-8">
                   <div class="container">
                        <br>
                        <br>
                        
                        <center>
                                            <h4>สถานะการชำระค่าลงทะเบียนเรียน</h4>
                        </center>
                                            <div class="well">
                
                                            <table border="1">
                                            <tr>
                                                <td> <b> &nbsp; No.             </b> </td>
                                                <td> <b> &nbsp; ชื่อคอร์สเรียน      </b> </td>
                                                <td> <b> &nbsp; ราคา            </b> </td>
                                                <td> <b> &nbsp; วัน/เวลาที่โอน      </b> </td>
                                                <td> <b> &nbsp; สถานะการตรวจสอบ </b> </td>
                                            </tr>
                                          
                                            <?php
                                            $connect = mysqli_connect("localhost","root","","academicservicedb");
                                            mysqli_set_charset($connect, "utf8");
                                                    if (!isset($smtUpdate)) {
                                                        $sql = 'SELECT * FROM  course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID  WHERE users_id = '.$_SESSION['user_id'].' ';
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
                                                                                    <td>   '.$row['order_no'].'        </td>
                                                                                    <td>   '.$row['Name_Course'].'      </td>
                                                                                    <td>   '.$row['Price'].'            </td>
                                                                                    <td>    '.$row['Date_pay'].'  &nbsp; '.$row['Time_pay'].'     </td>
                                                                                    <td>   '.$row['Status'].'  </td>
                                                                                </tr>
                                                                              
                                                                    ';      }                
                                                                                    }
                                                                                }
                                                    mysqli_close($connect);
                                            ?>
                                            </table>
                                            <br>

                            </div>
                    </div class="container">
        
            </div>
	    </div>
    </div>
</div>



<?php include 'footer.php';?>
