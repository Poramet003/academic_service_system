<?php
$connect = mysqli_connect("localhost","root","","academicservicedb");
mysqli_set_charset($connect, "utf8");

$_POST["addteacher"];
$sql = 'UPDATE users_teacher SET User_Type = "0" WHERE teacher_ID = "'.$_POST["addteacher"].'"';
$result = mysqli_query($connect,$sql);


$result = mysqli_query($connect,$sql);
if ($result) {
    echo '<script language="javascript" type="text/javascript"> 
		    alert("สำเร็จ ! ทำการลบออกจากสถานะผู้สอนเรียบร้อยแล้วค่ะ");
		    window.location = "admin_manageteacher.php";
            </script>';
} else {
    echo 'No Complete';
}

mysqli_close($connect);
?>
