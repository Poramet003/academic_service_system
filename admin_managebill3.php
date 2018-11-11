
<?php
$connect = mysqli_connect("localhost","root","","academicservicedb");
mysqli_set_charset($connect, "utf8");
 
$sql = 'UPDATE course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID SET order_no = "'.$_POST['oid'].'" WHERE order_no = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID SET Status = "กำลังตรวจสอบ" WHERE order_no = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
if ($result) {
    echo '<script language="javascript" type="text/javascript"> 
		    alert("สำเร็จ ! ทำการเปลี่ยนสถานะ การแจ้งชำระเรียบร้อย");
		    window.location = "admin_managebill.php";
            </script>';
} else {
    echo 'No Complete';
}

// header("Location: admin_managecourse.php");

mysqli_close($connect);
?>
