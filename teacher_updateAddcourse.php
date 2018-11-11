
<!-- Link ไปส่วนของ Header พวก Menu ต่างๆ  -->
<?php 
session_start();
include 'header_teacher.php';?>
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


<div class="container">
            <?php
                $connect = mysqli_connect("localhost","root","","academicservicedb");
                mysqli_set_charset($connect, "utf8");
                            if (!isset($smtUpdate)) {
                                $sql = 'SELECT * FROM  course WHERE Course_ID = '.$_POST['idcourse'].' '; 
                                $result = mysqli_query($connect,$sql);
                                $row = mysqli_fetch_array($result);
                                                    }
                                                    
                                    mysqli_close($connect);
            ?>  

          <!-- เรียกใช้งาน PHP-->                                
          <?php
              $connect = mysqli_connect("localhost","root","","academicservicedb");
              mysqli_set_charset($connect, "utf8");
                    if (!isset($smtUpdate)) {
                        $sql = 'SELECT * FROM  course_teacher WHERE Course_ID = '.$_POST['idcourse'].' ';
                        // $sql = 'SELECT * FROM  course INNER JOIN course_teacher ON course_teacher.Course_ID=course.Course_ID WHERE Course_ID = '.$_POST['idcourse'].'';

                        $result = mysqli_query($connect,$sql);
                        $numrows = mysqli_num_rows($result);
                        $numfields = mysqli_num_fields($result);
                        $path = 'images/';   // Path สำหรับเชื่อมไปยังที่เก็บไฟล์รูป
                        
                    if (!$result) {
                        echo '<b>Error</b>'.mysqli_error().'<br>';
                    } elseif ($numrows==0) {
                        echo '<script language="javascript" type="text/javascript"> 
                        alert("ขออภัยค่ะ ! คุณยังไม่ได้เพิ่มตารางคอร์สของคุณ");
                        window.location = "teacher_index.php";
                        </script>';
                    }else { 
                        echo' <h2>แก้ไขตารางคอร์สเรียน  &nbsp;&nbsp;<font size="6" color="#1ec71e">'.$row['Name_Course'].'</font></h2>';
                        
                            echo'   
                            <center>
                                <table width="100%">
                                    <tr>
                                        <td> <b> &nbsp; ครั้งที่สอน            </b> </td>
                                        <td> <b> &nbsp; วันที่สอน      </b> </td>
                                        <td> <b> &nbsp; รายละเอียดเนื้อหา            </b> </td>
                                        <td> <b> &nbsp; เช็คชื่อ      </b> </td>
                                        <td> <b> &nbsp; แนบไฟล์ </b> </td>
                                        <td>    </td>
                                    </tr>
                                        <p align="right">
                                        <form name="frmUpdate" method="post"  action="teacher_deleteAddcourse.php"> 
                                            <input type="hidden" name="deleteid" value="'.$row['Course_ID'].'"></input>
                                            <input type="submit"  style="width:20%" class="btn btn-danger"   class="btn btn-danger"  value="ลบตารางการสอนทั้งหมด" onClick="return confirmUpdate();">
                                        </form>
                                        <form name="frmUpdate" method="post"  action="teacher_updateAddcourse2.php"> 
                                            <input type="submit"  style="width:20%" class="btn btn-success"  value="แก้ไข" onClick="return confirmUpdate();">  </input>
                                            <input type="hidden"   id="idforupdate"  name="idforupdate" value="'.$row['Course_ID'].'"></input>
                                        </p>     
                                            <br>
                                            <div class="input-group">
                                    ';
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo'  
                                                    <tr>
                                                         <input type="hidden" class="form-control login-field" name="csid[]" value="'.$row['course_teacher_ID'].'"/>
                                                        <input type="hidden" class="form-control login-field" name="idcourse[]" value="'.$row['Course_ID'].'"/>
                                                        <input type="hidden" class="form-control login-field" name="tid[]" value="'.$row['teacher_ID'].'" />
                                                        <td><input type="text" class="form-control login-field" name="week[]" value="'.$row['week'].'"  /></td>
                                                        <td><input type="date"   class="form-control login-field" name="dc[]" value="'.$row['date_study'].'"></td>
                                                        <td><textarea id="Detail" cols="45" rows="4" name="detailc[]" >'.$row['detail'].'</textarea></td>
                                                        <td><input type="text" class= "form-control" name="numbercheckname[]" value=" '.$row['check_name_code'].'" readonly/></td>
                                                        <td><input type="file" class="form-control" name="fileupload[]"  value=" '.$row['file_upload'].'" ></td>
                                        ';                              
                                    
                                                                                                   
                                    echo'                   
                                     </form>
                                        <td>
                                            <form name="frmUpdate" method="post"  action="teacher_deleteSomeoneAddcourse.php"> 
                                                <input type="hidden" class="form-control login-field" name="deletesomeone2" value="'.$row['course_teacher_ID'].'"/>
                                                <input type="submit"  style="width:30%" class="btn btn-danger"  class="btn btn-danger"  value="ลบ" onClick="return confirmUpdate();">
                                            </form>
                                        </td>
                                        </tr>  
                                                                                    

                                        ';                                  
                                                                        };                     

                                  
   
                                    echo'        
                                            </div>
                                     </table>
                            </center>
                                        ';
                        }
                    }    
              mysqli_close($connect);
          ?>
          
           


            
</div>
    <br>
    <br>
    <br>
<?php include 'footer.php';?>
