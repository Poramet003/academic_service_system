<html>
	<head>
	<title> </title>
	</head>
<body>

<?php

// for($i=0;$i<count($_POST["idcourse"]);$i++)

// {

//     echo "IDcourse  = ".$_POST["idcourse"][$i]."<br>";
//     echo "teacherID  = ".$_POST["tid"][$i]."<br>";
//     echo "Week  = ".$_POST["week"][$i]."<br>";
//     echo "date  = ".$_POST["dc"][$i]."<br>";
//     echo "detail  = ".$_POST["detailc"][$i]."<br>";
//     echo "CheackName  = ".$_POST["numbercheckname"][$i]."<br>";
//     echo "fileupload  = ".$_POST["fileupload"][$i]."<br><br><br>";


// }



ini_set('display_errors', 1);
    error_reporting(~0);
    
    $link = mysqli_connect("localhost", "root", "", "academicservicedb");
    mysqli_set_charset($link, "utf8");
    
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
     
    for($i=0;$i<count($_POST["idcourse"]);$i++){
        $sql = "INSERT INTO course_teacher (teacher_ID,Course_ID,week,date_study,detail,check_name_code,file_upload) VALUES ('".$_POST["tid"][$i]."','".$_POST["idcourse"][$i]."','".$_POST["week"][$i]."','".$_POST["dc"][$i]."','".$_POST["detailc"][$i]."','".$_POST["numbercheckname"][$i]."','".$_POST["fileupload"][$i]."')";
        $result = mysqli_query($link,$sql);
    }
    if($result){
        echo '<script language="javascript" type="text/javascript"> 
        alert("สำเร็จ ! ทำการเพิ่มตารางการเรียนเรียบร้อยแล้ว");
        window.location = "teacher_index.php";
        </script>';
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
     
    // Close connection
    mysqli_close($link);
    ?>


</body>
</html>
