<?php
    session_start();
    include_once 'header_user.php';
?>

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

        <?php
            $connect = mysqli_connect("localhost","root","","academicservicedb");
                mysqli_set_charset($connect, "utf8");
 
                    // $sql='SELECT Course_ID,Name_Course,Detail_Course,Price,Start_Course,End_Course,Course_Benfit,Content_Course,Picture_Banner FROM course';
                        if (!isset($smtUpdate)) {
                            $sql = 'select * from course,users where Course_ID ='.$_POST['idforpay'].'';
                            $result = mysqli_query($connect,$sql);
                            $row = mysqli_fetch_array($result);
                            $path = 'images/'; 
                            
                                if (!$result) {
                                    echo '<b>Error</b>'.mysqli_error().'<br>';
                                            }
                                else {
        ?>

                            <center> 
                            <br>
                            <div class="container-fluid">
                            <br>
        <?php
                            echo'
                                <div class="row">
                                    <div class="col-sm-7">
                                        <center>
                                            <h4>สรุปรายการลงทะเบียนคอร์สเรียน</h4>
                                        </center>
                                            <div class="well">
                                                <table  width="100%" height="100%">
                                                        <center>                                           
                                                            <img src="'. $path.$row['Picture_Banner'].'"    style="width:400px; height:200px;   class="img-thumbnail">
                                                        </center>
                                                            <br>
                                                            <div class="col-sm-12">
                                                                <div class="well" style="background-color:white;">
                                                                    <font size="6" color="black"> 
                                                                        <b> '.$row['Name_Course'].'  </b>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                </table>
                                            </div>
                                            
                                            <div class="well">
                                                <table>
                                                    <tr>
                                                        <th> <b> สิ่งที่คุณจะได้รับ</b> </th>
                                                        <td>'.$row['Name_Course'].' </td>
                                                    </tr>
                                                    <tr>
                                                        <th> <b> ราคา</b>   </th>
                                                        <td>'.$row['Price'].' บาท   </td>
                                                    </tr>
                                                    <tr>
                                                        <th>   <b> รหัสส่วนลด</b>  </th>
                                                        <td> คอร์สนี้ไม่เข้าร่วมรายการส่วนลด</td>
                                                    </tr>
                                                    <tr>
                                                        <th>ราคาสุทธิ</th>
                                                        <td><a> '.$row['Price'].'  บาท</a></td>
                                                    </tr>
                                                </table> 
                                            
                                            </div>
                                    </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <center>
                                            <h4> เลือกช่องทางการชำระเงิน</h4>
                                        </center>
                                            <div class="well">
                                                 <form name="frminsert" action="user_paycourse2.php" method="post">
                                                       <input type="hidden" name="courseid" value="'.$row['Course_ID'].'">
                                                       <input type="hidden" name="user" value="'.$_SESSION['user_id'].'">
                                                       <input type="submit" name="viewfullcourse" class="btn btn-primary btn-large"  value="จ่ายเงิน" onClick="return confirmUpdate();">       
                                                 </form>      
                                            </div>
                                    </div>
                                    <div class="col-sm-5">
                                            <div class="well">
                                           

                                            </div>
                                    </div>
                                    <div class="col-sm-5">
                                            <div class="well">

                                            </div>
                                    </div>
                                </div>
                                
                                ';      }        
        
                                                }
                mysqli_close($connect);
        ?>
                            <br>
                            </div>
        </center>
      
</div class="container">
<?php include 'footer.php';?>