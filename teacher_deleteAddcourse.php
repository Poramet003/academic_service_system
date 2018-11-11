
 
 <?php

        $connect = mysqli_connect("localhost","root","","academicservicedb");
        $sql = 'DELETE FROM  course_teacher WHERE Course_ID = '.$_POST['deleteid'].' ';

        $result = mysqli_query($connect,$sql);
 
        if (!$result) {
            echo' error ';
      
        } else {
            echo '<script language="javascript" type="text/javascript"> 
		    alert("สำเร็จ ! ทำการลบตารางการสอนทั้งหมดเรียบร้อยแล้ว");
		    window.location = "teacher_index.php";
            </script>';

        }

        ?>
 