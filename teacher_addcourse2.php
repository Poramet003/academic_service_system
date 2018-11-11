
<!-- Link ไปส่วนของ Header พวก Menu ต่างๆ  -->
<?php 
session_start();
include 'header_teacher.php';

          
?>

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
        height: 100%;
    }

    td {
        text-align: center;
        padding: 8px;
    }

    

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
 
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">       
<link rel="stylesheet" href="css/admin_managecourse.css">

<?php


if ($_POST["inputnumber"] == "" || $_POST["inputnumber"] == "0" ) {

              echo '<script language="javascript" type="text/javascript"> 
                          alert("ขออภัย ! คุณยังไม่ได้กรอกจำนวนการสอน");
                          window.location = "teacher_index.php";
                      </script>';
                  }
?>
  
<div class="container">
                        <br>
                        <br>
                        <center>
                                            <h4>จัดการตาราการสอน</h4>
                        <br>
                        </center>
                                            <div class="well">
                                            <?php
                                            $connect = mysqli_connect("localhost","root","","academicservicedb");
                                            mysqli_set_charset($connect, "utf8");
                                                    if (!isset($smtUpdate)) {
                                                        $sql = 'SELECT * FROM  course_teacher ';
                                                        // -- $sql = 'SELECT * FROM  users As d1
                                                        // -- INNER JOIN course AS d2 
                                                        // -- ON (d1.teacher_ID=d2.teacher_ID)
                                                        // -- INNER JOIN users_teacher AS d3
                                                        // -- ON (d1.teacher_ID=d3.teacher_ID) 
                                                        // -- ';                                                        
                                                        $result = mysqli_query($connect,$sql);
                                                        $numrows = mysqli_num_rows($result);
                                                        $numfields = mysqli_num_fields($result);
                                                 
                                                        if (!$result) {
                                                            echo '<b>Error</b>'.mysqli_error().'<br>';
                                                        } else{ 
                                                            echo'  
                                                        <center>
                                                            <table width="100%">
                                                                <tr>
                                                                    <td> <b> &nbsp; ครั้งที่สอน            </b> </td>
                                                                    <td> <b> &nbsp; วันที่สอน      </b> </td>
                                                                    <td> <b> &nbsp; รายละเอียดเนื้อหา            </b> </td>
                                                                    <td> <b> &nbsp; เช็คชื่อ      </b> </td>
                                                                    <td> <b> &nbsp; แนบไฟล์ </b> </td>
                                                                </tr>
                                                                
                                                                        <form name="frmUpdate" method="post"  action="teacher_addcourse3.php"> 
                                                                            <div class="input-group">
                                                                ';
                                                                        for($i=1;$i<=$_POST["inputnumber"];$i++)
                                                                            { 
                                                                echo'   
                                                                                <tr>
                                                                                    <input type="hidden" class="form-control login-field" name="idcourse[]" value="'.$_POST['idcourse'].'"/>
                                                                                    <input type="hidden" class="form-control login-field" name="tid[]" value="'.$_POST['teacherid'].'" />

                                                                                    <td><input type="text" class="form-control login-field" name="week[]" value="'.$i.'" readonly /></td>
                                                                    ';
                                                                        $a =  rand(357,400);         $b=rand(111,100);  
                                                                echo'
                                                                                    <td><input type="date"   class="form-control login-field" name="dc[]"></td>
                                                                                    <td><textarea id="Detail" cols="45" rows="4" name="detailc[]" placeholder="รายละเอียด"></textarea></td>
                                                                                    <td><input type="text" class= "form-control" name="numbercheckname[]" value=" '."$a"."$b".'" readonly/></td>
                                                                                    <td><input type="file" class="form-control" name="fileupload[]"></td>
                                                                                </tr>
                                                                    ';  
                                                                            };
                                                                echo'        
                                                                            </div>
                                                                <table width="100%">
                                                                    <tr>
                                                                        <td>
                                                                            <input type="submit"  style="width:100%" class="btn btn-success"  value="เพิ่ม" onClick="return confirmUpdate();">  
                                                                            <input type="reset"  style="width:100%" class="btn btn-danger"   class="btn btn-danger"  value="ยกเลิก" onClick="return confirmUpdate();">
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                </form>
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
