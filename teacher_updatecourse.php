
<!-- Link ไปส่วนของ Header พวก Menu ต่างๆ  -->
<?php include 'header_teacher.php';?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">     
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">  
<link rel="stylesheet" href="css/admin_managecourse.css">

<div id="information" class="spacer reserve-info ">
    <div class="container">
        <div class="row">
  
                    <form name="frminsert" action="teacher_updatecourse2.php" method="post">
                        <?php
											$connect = mysqli_connect("localhost","root","","academicservicedb");
											mysqli_set_charset($connect, "utf8");
											
											if (!isset($smtUpdate)) {
                                                $sql = 'SELECT * FROM  course INNER JOIN users_teacher ON users_teacher.teacher_ID=course.teacher_ID where Course_ID ='.$_POST['idforupdate'].'';

 													$result = mysqli_query($connect,$sql);
													$row = mysqli_fetch_array($result);
													if (!$result) {
														echo '<b>Error</b>'.mysqli_error().'<br>';
													}
												else {

													echo '<div class="login-form">';
                                                    echo '<div class="form-group">';
                                                
                                                    echo '<label for="Room Remake" class="col-sm-4 col-form-label">หมายเลขไอดีคอร์สเรียน</label>';
                                                    echo '<input type="text" class="form-control login-field" name="cid" value="'.$row['Course_ID'].'" readonly />';

													echo '<label for="Room Remake" class="col-sm-4 col-form-label">ชื่อคอร์ส</label>';
                                                    echo '<input type="text" class="form-control login-field" name="nc" value="'.$row['Name_Course'].'" />';
                                                    echo '</div>';

                                                    echo '<div class="form-group">';
                                                    echo '<label for="Detail" class="col-sm-4 col-form-label">รูปคอร์สเรียน</label>';
                                                    echo '<input type="file" name="imagecourse">';
                                                    echo '</div>';

                                                    echo '<div class="form-group" >';
                                                    echo '<label for="Room Remake" class="col-sm-4 col-form-label">รายละเอียด</label>';
                                                    echo '<textarea id="Detail" cols="90" rows="6" name="dc" > '.$row['Detail_Course'].'   </textarea>';
                                                    echo '</div>';


                                                    echo '<div class="form-group">';
                                                    echo '<label for="Detail" class="col-sm-4 col-form-label">ราคา</label>';
                                                    echo '<input type="text" class="form-control login-field"  name="p" value="'.$row['Price'].'"  />  ';
                                                    echo '</div>';

                                                    echo '<div class="form-group">';
                                                    echo '<label for="Detail" class="col-sm-4 col-form-label">เริ่ม</label>';
                                                    echo '<input type="date" class= "form-control" name="sc" value="'.$row['Start_Course'].'"  >';
                                                    echo '</div>';

                                                    echo '<div class="form-group">';
                                                    echo '<label for="Detail" class="col-sm-4 col-form-label">สิ้นสุด</label>';
                                                    echo '<input type="date" class= "form-control" name="ec" value="'.$row['End_Course'].'"  ><br>';
                                                    echo '</div>';

                                                    echo '<div class="form-group" >';
                                                    echo ' <label for="Detail" class="col-sm-4 col-form-label">สิ่งที่คุณจะได้รับ</label>';
                                                    echo '<textarea id="Benfit" cols="90" rows="6" name="Benfit" placeholder="สิ่งที่ผู้เรียนจะได้รับ">'.$row['Course_Benfit'].' </textarea>';
                                                    echo '</div>';

                                                    
                                                    echo '<div class="form-group">';
                                                    echo '<label for="Detail" class="col-sm-4 col-form-label">เนื้อหาคอร์ส</label>';
                                                    echo '<textarea id="Content"  cols="90" rows="6" name="Content" placeholder="ระบุเนื้อหาของคอร์สเรียน">'.$row['Content_Course'].'</textarea>';
                                                    echo '</div>';
                                                   
                                                    echo '<br> ';
                                                             }
                                                    
                                                                    }   
		        
                                                    echo '<div class="form-group">';
                                                    echo '<label for="Detail" class="col-sm-4 col-form-label">รายละเอียดผู้สอน</label>';
                                                        $sql='SELECT teacher_ID,teacher_name FROM users_teacher ' ;

                                                        $result = mysqli_query($connect,$sql);
                                                        $numrows = mysqli_num_rows($result);
                                                        $numfields = mysqli_num_fields($result);
                        
                                                        echo '   <select name="editteacherid" >';
                                                        if (!$result) {
                                                            echo '<b>Error</b>'.mysqli_error().'<br>';
                                                        } elseif ($numrows==0) {
                                                            echo '<b>Query executed successfully but no row returns!</b>';
                                                        }else { 
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                
                                                        echo '  
                                                                <option value="' .$row['teacher_ID'].' "> ' .$row['teacher_name'].'   </option>
                                                
                                                            ';
                                                            }  echo '  </select>';
                                                        
                                                        }
                                                        echo '<input type="hidden" name="idforupdate" value="'.$row['Course_ID'].'">'."\n";
                                                        echo '</table>';
                                                        echo '</div>';
                                                    
                    ?>
                                                        <br>
                                                        <div class="form-group">
                                                            <label for="Detail" class="col-sm-4 col-form-label">รายละเอียดผู้ช่วยสอน</label>
                            
                                                        <?php
                                                        $connect = mysqli_connect("localhost","root","","academicservicedb");
                                                        mysqli_set_charset($connect, "utf8");
                                                        
                                                        if (!isset($smtUpdate)) {
                                                            $sql='SELECT teacher_ID,teacher_name FROM users_teacher    ' ;

                                                            $result = mysqli_query($connect,$sql);
                                                            $numrows = mysqli_num_rows($result);
                                                            $numfields = mysqli_num_fields($result);
                            
                                                            echo '   <select name="editteacherhelpme" >';
                                                            if (!$result) {
                                                                echo '<b>Error</b>'.mysqli_error().'<br>';
                                                            } elseif ($numrows==0) {
                                                                echo '<b>Query executed successfully but no row returns!</b>';
                                                            }else { 
                                                            echo ' <option value="0">   -  </option>';
                                                                while ($row = mysqli_fetch_array($result)) {
                                                            echo '  
                                                                    <option value="' .$row['teacher_ID'].' "> ' .$row['teacher_name'].'   </option>
                                                                
                                                                ';
                                                                }  echo '  </select>';
                                                            
                                                            }
                                                        
                                                        }
                    ?>
                                    </div>                                             
                                                      <input type="submit" class="btn btn-primary btn-lg btn-block " value="แก้ไข">

                                        </div>
                                </form>
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
    </div>      <!--ปิด   <div class="w3-container w3-content w3-padding-64" style="max-width:1500px" id="band">  -->
        
            </div>
	    </div>
    </div>
</div>



<?php include 'footer.php';?>
