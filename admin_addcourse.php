<html>
	<head>
	<title>ส่วนสำหรับการ Inset คอร์สเรียนลง SQL</title>
	</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "academicservicedb";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	

//สำหรับเพิ่มรูป
$msg = "";
	// If upload button is clicked ...
if (isset($_POST['submit'])) {
	// Get image name
	$image = $_FILES['image']['name'];
	// // Get text
	// $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

	// image file directory
	$target = "images/".basename($image);

//สำหรับเพิ่มคอร์ส
	$sql = "INSERT INTO course (Name_Course,Detail_Course,Price,Start_Course,End_Course,Course_Benfit,Content_Course,Picture_Banner,teacher_ID,teacher_assitant) VALUES ('".$_POST["Name"]."','".$_POST["Detail"]."','".$_POST["Price"]."','".$_POST["checkin"]."','".$_POST["checkout"]."','".$_POST["Benfit"]."','".$_POST["Content"]."','$image','".$_POST["teachername"]."','".$_POST["teacherhelpme"]."')";
	
	// execute query
	mysqli_query($db, $sql);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		$msg = "Image uploaded successfully";
	}else{
		$msg = "Failed to upload image";
	}
}


$query = mysqli_query($conn,$sql);
$result = mysqli_query($db, "SELECT * FROM  course");

if($query) {
		// echo "Record add successfully";
		echo '<script language="javascript" type="text/javascript"> 
		alert("สำเร็จ ! ทำการเพิ่่ม Course เรียบร้อยแล้วค่ะ");
		window.location = "admin_managecourse.php";
         </script>';
	}
    
	mysqli_close($conn);
?>
</body>
</html>