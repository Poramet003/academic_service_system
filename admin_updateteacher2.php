
<?php
$connect = mysqli_connect("localhost","root","","academicservicedb");
mysqli_set_charset($connect, "utf8");

$sql = 'UPDATE teacher SET teacher_ID = "'.$_POST['cid'].'" WHERE teacher_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
// $sql = 'UPDATE teacher SET Teacher_Picture = "'$_FILES['image']['name'];'" WHERE Teacher_Picture = "'.$_POST["idforupdate"].'"';
// $result = mysqli_query($connect,$sql);
$sql = 'UPDATE teacher SET teacher_name = "'.$_POST['nc'].'" WHERE teacher_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE teacher SET teacher_detail = "'.$_POST['dc'].'" WHERE teacher_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE teacher SET Teacher_Picture = "'.$_POST['imageteacher'].'" WHERE teacher_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);

 
$result = mysqli_query($connect,$sql);
if ($result) {
    echo '<script language="javascript" type="text/javascript"> 
    alert("สำเร็จ ! ทำการแก้ไขโปรไฟล์ผู้สอนเรียบร้อยแล้ว");
    window.location = "admin_manageteacher.php";
    </script>';
} else {
    echo 'No Complete';
}
// header("Location: admin_manageteacher.php");

mysqli_close($connect);
?>
