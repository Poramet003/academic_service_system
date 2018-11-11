<?php
 
 $connect = mysqli_connect("localhost","root","","academicservicedb");
 mysqli_set_charset($connect, "utf8");
         if (!isset($smtUpdate)) {
        //  $sql = 'SELECT * FROM course as d1
        //          INNER JOIN    course_teacher as d2
        //          ON d1.Course_ID=d2.Course_ID
        //          INNER JOIN course_user as d3
        //          ON d1.Course_ID=d3.Course_ID
        //          WHERE users_id = '.$_SESSION['user_id'].''; 
            $sql = 'SELECT check_name_code,check_name_user FROM course_teacher '; 
     
            $result = mysqli_query($connect,$sql);
            $numrows = mysqli_num_rows($result);
            $numfields = mysqli_num_fields($result);

     
            if (!$result) {
                echo '<b>Error</b>'.mysqli_error().'<br>';
            } elseif ($numrows==0) {
                echo '<b>Query executed successfully but no row returns!</b>';
            }else { 
                while ($row = mysqli_fetch_array($result)) {

                    if($_POST['checkname'] == $row['check_name_code']){
                        while ($row = mysqli_fetch_array($result)) {
                                $sql = 'UPDATE course_teacher SET check_name_user = "เข้าเรียน" WHERE check_name_code = "'.$_POST["checkname"].'"';
                                $result = mysqli_query($connect,$sql);
                                if($result){
                                    echo '<script language="javascript" type="text/javascript"> 
                                    alert("รหัสถูกต้อง ! เช็คชื่อเรียบร้อยแล้วค่ะ");
                                    window.location = "mycourse.php";
                                    </script>';
                                            }
                                                                    }
                    }elseif($_POST['checkname'] != $row['check_name_code']){
                        echo '<script language="javascript" type="text/javascript"> 
                        alert("รหัสผิดพลาด ! โปรดลองใหม่อีกครั้ง");
                        window.location = "mycourse.php";
                        </script>';
                                                                            }
                                                            }
                  }
            
                mysqli_close($connect);
                                        };



?>