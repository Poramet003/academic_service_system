
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
    height: 100%;
}
</style>

 <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-8">
                   <div class="container">
                        <br>
                        <br>
                        <center>
                                            <h4>จัดการตาราการสอน</h4>
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
                                                                    <form name="frmUpdate" method="post"  action="teacher_addcourse2.php"> 
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="inputnumber" placeholder="&nbsp;&nbsp; จำนวนครั้งที่คุณต้องการสอน">
                                                                            <span class="input-group-btn">
                                                                                <input type="hidden" name="idcourse" value="'.$_POST['idcourse'].'"/> 
                                                                                <input type="hidden" name="teacherid" value="'.$_POST['idforteacher'].'"/>  
                                                                                <input type="submit"  class="btn btn-default"  value="เพิ่ม" onClick="return confirmUpdate();">
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
   
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>


            </div>
	    </div>
    </div>


<?php include 'footer.php';?>
