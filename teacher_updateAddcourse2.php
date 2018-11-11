


    
<?php
    $connect = mysqli_connect("localhost", "root", "", "academicservicedb");
    mysqli_set_charset($conn , "utf8");
    
    if($conn  === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

 for($i=0;$i<count($_POST["idcourse"]);$i++){

    $sql = 'UPDATE course_teacher SET week = "'.$_POST['week'][$i].'" WHERE course_teacher_ID = "'.$_POST["csid"][$i].'"';
    $result = mysqli_query($connect,$sql);
    $sql = 'UPDATE course_teacher SET teacher_ID = "'.$_POST['tid'][$i].'" WHERE course_teacher_ID = "'.$_POST["csid"][$i].'"';
    $result = mysqli_query($connect,$sql);
    $sql = 'UPDATE course_teacher SET Course_ID  ="'.$_POST['idcourse'][$i].'" WHERE course_teacher_ID = "'.$_POST["csid"][$i].'"';
    $result = mysqli_query($connect,$sql);
    $sql = 'UPDATE course_teacher SET week = "'.$_POST['week'][$i].'" WHERE course_teacher_ID = "'.$_POST["csid"][$i].'"';
    $result = mysqli_query($connect,$sql);
    $sql = 'UPDATE course_teacher SET date_study = "'.$_POST['dc'][$i].'" WHERE course_teacher_ID = "'.$_POST["csid"][$i].'"';
    $result = mysqli_query($connect,$sql);
    $sql = 'UPDATE course_teacher SET detail = "'.$_POST['detailc'][$i].'" WHERE course_teacher_ID = "'.$_POST["csid"][$i].'"';
    $result = mysqli_query($connect,$sql);
    $sql = 'UPDATE course_teacher SET check_name_date = "'.$_POST['numbercheckname'][$i].'" WHERE course_teacher_ID = "'.$_POST["csid"][$i].'"';
    $result = mysqli_query($connect,$sql);
    $sql = 'UPDATE course_teacher SET file_upload = "'.$_POST['file_uploadas'][$i].'" WHERE course_teacher_ID = "'.$_POST["csid"][$i].'"';
    $result = mysqli_query($connect,$sql);
 
  };


    if($result){
        echo '<script language="javascript" type="text/javascript"> 
        alert("สำเร็จ ! ทำการแก้ไขตารางการเรียนเรียบร้อยแล้ว");
        window.location = "teacher_index.php";
        </script>';
    } else{
        echo "ERROR: Could not able to execute $sql. " .  die( mysql_error() ); 
    }
     
    // Close connection
    mysqli_close($conn);
    ?>


</body>
</html>


<?php



  