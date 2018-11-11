
<?php
$connect = mysqli_connect("localhost","root","","academicservicedb");
mysqli_set_charset($connect, "utf8");

$courseid =  $_POST['imgbillpayment'];
if($courseid == "")
{
    echo '<script language="javascript" type="text/javascript"> 
    alert("คุณยังไม่ได้อัพโหลดหลักฐานการชำระเงินค่ะ !");
    window.location = "bill_pay.php";
    </script>';
}
else{

$sql = 'UPDATE course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID SET order_no = "'.$_POST['cuid'].'" WHERE course_user_ID = "'.$_POST["orderno"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID SET Course_ID = "'.$_POST['cid'].'" WHERE course_user_ID = "'.$_POST["orderno"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID SET Status = "กำลังตรวจสอบ" WHERE course_user_ID = "'.$_POST["orderno"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID SET Channel_pay = "'.$_POST['channelpay'].'" WHERE course_user_ID = "'.$_POST["orderno"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID SET Date_pay = "'.$_POST['datepay'].'" WHERE course_user_ID = "'.$_POST["orderno"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID SET Time_pay = "'.$_POST['datetime'].'" WHERE course_user_ID = "'.$_POST["orderno"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID SET Picture_pay = "'.$_POST['imgbillpayment'].'" WHERE course_user_ID = "'.$_POST["orderno"].'"';
$result = mysqli_query($connect,$sql);
 

$result = mysqli_query($connect,$sql);
if ($result) {
    echo '<script language="javascript" type="text/javascript"> 
		    alert("แจ้งชำระโอนเรียบร้อยแล้วค่ะ !");
		    window.location = "stats_pay.php";
            </script>';
} else {
    echo 'No Complete';
}
}
// header("Location: admin_managecourse.php");

mysqli_close($connect);
?>
