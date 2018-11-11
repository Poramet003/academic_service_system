
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

        .input-group .form-control {
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
    height: 30;
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
                                            <h4>แจ้งชำระเงิน</h4>
                        </center>
                                            <div class="well">
                                            <?php
                                            $connect = mysqli_connect("localhost","root","","academicservicedb");
                                            mysqli_set_charset($connect, "utf8");
                                                    if (!isset($smtUpdate)) {
                                                        $sql = 'SELECT * FROM  course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID ';
                                                        $result = mysqli_query($connect,$sql);
                                                        $numrows = mysqli_num_rows($result);
                                                        $numfields = mysqli_num_fields($result);
                                                        if (!$result) {
                                                            echo '<b>Error</b>'.mysqli_error().'<br>';
                                                        } else{ 
                                                   echo'
                                                   <center>
                                                        <table width="30%">
                                                            <tr>
                                                                <td>
                                                                    <form name="frmUpdate" method="post"  action="bill_pay2.php"> 
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="orderno" placeholder="&nbsp;&nbsp; กรุณากรอกเลข Order No.">
                                                                            <span class="input-group-btn">
                                                                                <input type="submit" name="viewfullcourse" class="btn btn-default"  value="ค้นหา" onClick="return confirmUpdate();">
                                                                            </span>
                                                                    </div>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </center>
                                                   ';
                                                              }
                                                                            };
                                                    mysqli_close($connect);
                                            ?>                                   
                                            <br>
                            </div>
                    </div class="container">
        
            </div>
	    </div>
    </div>
</div>



<?php include 'footer.php';?>
