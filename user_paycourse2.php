<html>
<head>
<title>ส่วนสำหรับการ Inset </title>
</head>
<body>
<?php

						//สำหรับ insert
						ini_set('display_errors', 1);
						error_reporting(~0);
						$serverName = "localhost";
						$userName = "root";
						$userPassword = "";
						$dbName = "academicservicedb";
						$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
						mysqli_set_charset($conn, "utf8");	


			$connect = mysqli_connect("localhost","root","","academicservicedb");
			mysqli_set_charset($connect, "utf8");
			if (!isset($smtUpdate)) {
				$sql = 'SELECT * FROM  course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID WHERE users_id ='.$_POST['user'].'';
				$result = mysqli_query($connect,$sql);
				$numrows = mysqli_num_rows($result);
				$numfields = mysqli_num_fields($result);
	
				
				if (!$result) {
					echo '<b>Error</b>'.mysqli_error().'<br>';
				} 
				//หากในฐานข้อมูลแถวมากกว่า 1 คือมีข้อมูลอยู่ให้มาทำในนี้
				elseif($numrows >0){ 	
					//รับค่าคอร์สไอดี ที่ลูกค้ากดเลือก มาเทียบกับ คอร์สไอดีที่มีอยู่ในฐานข้อมูล ของ user ลูกค้า หากตรงกันให้ แจ้งเตือนและเด้งกลับ
					$courseid =  $_POST['courseid'];
					while ($row = mysqli_fetch_array($result)) {	
					$courseuser = $row['Course_ID'];	 
						 //ใส่ exit เพื่อให้หยุดการทำงาน จะได้ไม่ต้องวนลูป ไม่นั้นมันเพิ่มซ้ำได้เรื่อยๆ
							if($courseuser == $courseid){
								echo '<script language="javascript" type="text/javascript"> 
										alert("ขออภัย ! คุณมีคอร์สเรียนนี้อยู่ในระบบแล้ว");
										window.location = "stats_pay.php";
										</script>';	
										exit();
							}
						};
						//หากไม่ตรงกัน ก็ให้มาเพิ่มคอร์สได้ [แบบกรณี numrows มากกว่า 0]
							$a =  rand(100,400);         $b=rand(1000,100);    
							 
							if($courseuser != $courseid){
							 
								$orderno =  "$a"."$b"; 
								$sql = "INSERT INTO course_user (Course_ID, users_id,order_no) VALUES ('".$_POST["courseid"]."','".$_POST["user"]."','$orderno')";
								mysqli_query($db, $sql);
								$query = mysqli_query($conn,$sql);
									$result = mysqli_query($db, "SELECT * FROM course_user");
										if($query) {
											echo '<script language="javascript" type="text/javascript"> 
													alert("สมัครคอร์สเรียนเรียบเรียบร้อยแล้ว");
													alert("หมายเลข Order No. ของคุณคือ  '."$a"."$b".' ");
													window.location = "stats_pay.php";
													 </script>';
													}
														}												 
				//อันนี้คือ หากไม่มีข้อมูลในฐานเลย มันจะมาเพิ่มทันที   [แบบกรณี numrows = 0]
				}else{
					$a =  rand(100,400);         $b=rand(1000,100);   
					$orderno =  "$a"."$b"; 
					$sql = "INSERT INTO course_user (Course_ID, users_id,order_no) VALUES ('".$_POST["courseid"]."','".$_POST["user"]."','$orderno')";
					mysqli_query($db, $sql);
					$query = mysqli_query($conn,$sql);
					$result = mysqli_query($db, "SELECT * FROM course_user");
						if($query) {
							echo '<script language="javascript" type="text/javascript"> 
									alert("สมัครคอร์สเรียนเรียบเรียบร้อยแล้ว");
									alert("หมายเลข Order No. ของคุณคือ  '."$a"."$b".' ");
									window.location = "stats_pay.php";
									 </script>';
									}
					}						
									};
			
?>
</body>
</html>

