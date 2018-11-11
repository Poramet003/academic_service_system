
<?php
$connect = mysqli_connect("localhost","root","","academicservicedb");
mysqli_set_charset($connect, "utf8");
// course_ID เป็นตัวเชื่อม PK - FK เลยจำเป็นต้อง INNER JOIN

$sql = 'UPDATE course SET Name_Course = "'.$_POST['nc'].'" WHERE Course_ID = "'.$_POST["cid"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET Detail_Course = "'.$_POST['Detail'].'" WHERE Course_ID = "'.$_POST["cid"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET Price = "'.$_POST['p'].'" WHERE Course_ID = "'.$_POST["cid"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET Start_Course = "'.$_POST['sc'].'" WHERE Course_ID = "'.$_POST["cid"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET End_Course = "'.$_POST['ec'].'" WHERE Course_ID = "'.$_POST["cid"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET Course_Benfit = "'.$_POST['Benfit'].'" WHERE Course_ID = "'.$_POST["cid"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET Content_Course = "'.$_POST['Content'].'" WHERE Course_ID = "'.$_POST["cid"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET Picture_Banner = "'.$_POST['imagecourse'].'" WHERE Course_ID = "'.$_POST["cid"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET teacher_ID = "'.$_POST['editteacherid'].'" WHERE Course_ID = "'.$_POST["cid"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET teacher_assitant = "'.$_POST['editteacherhelpme'].'" WHERE Course_ID = "'.$_POST["cid"].'"';
$result = mysqli_query($connect,$sql);
 

if ($result) {
    echo '<script language="javascript" type="text/javascript"> 
		    alert("สำเร็จ ! ทำการแก้ไขคอร์สเรียนเรียบร้อยแล้ว");
		    window.location = "admin_managecourse.php";
            </script>';
} else {
    echo 'No Complete';
}

// header("Location: admin_managecourse.php");

mysqli_close($connect);
?>
