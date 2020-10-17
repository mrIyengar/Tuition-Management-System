<?php
$dbhost = 'localhost';
$dbuser = 'root';//change to ur mysql installed user
$dbpass = '';//give mysql password of ur system
$dbase = 'mydb';//give database name created in ur system

   $db = mysqli_connect($dbhost,$dbuser,$dbpass,$dbase);
  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    if (isset($_POST["subjectName"], $_POST["subCode"], $_POST["classNo"], $_POST["teacherId"]))
	{
    $subjectName = $_POST['subjectName'];
    $subCode = $_POST['subCode'];
    $classNo = $_POST['classNo'];
    $teacherId = $_POST['teacherId'];
    
    $requestMethod = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : null;
   if($requestMethod == "POST")
   {
 	$sql = "insert into subjectdetails values('$subjectName','$subCode','$classNo','$teacherId')";
        $query = mysqli_query($db,$sql);
      //nothing
	        if($query) echo "<script>alert('Successfully registered');
    							window.location.href='ShowSubject.php';</script>";	
	     
   		     else  echo "<script>alert('Error');
    							window.location.href='SubjectDetails.php';</script>";	
       		     
   }  
 }      
?>



<!DOCTYPE html>
<html>
<head>
	<title>Subject Details</title>
	<style type="text/css">
		.head {
			text-align: center;
			background-color: grey;
			padding: 15px;
		}
		.form {
			background-clip: content-box, padding-box;
		}
		#a,#b,#c,#d,#e {
			padding: 10px;
			shape-outside: ellipse(2px);
		}
		.body {
			background-image: url(images/background11.jpg);
			background-repeat: no-repeat;
			background-size: cover;
		}
		.edit {
			width: 10%;
			padding: 10px;
			background-color: brown;
			border-radius: 20%;
			color: white;
			font-size: 15px;
		}
		.edit:hover {
			background-color: black;
		}
	</style>
</head>
<body class="body">
	<div class="head">
		<h1 style="color: white; font-size: 40px">Subject Details</h1>
	</div>
	<br>
	<br>
	<br>
	<form method="POST">
		<center>
			<div class="form">
				<input id="a" type="name" name="subjectName" placeholder="Subject Name"  required="true" ><br><br><br>
				<input id="b" type="text" name="subCode" placeholder="Subject Code"  required="true" ><br><br><br>
				<input id="c" type="number" name="classNo" placeholder="Class Number"  required="true" ><br><br><br>
				<input id="d" type="text" name="teacherId" placeholder="Teacher ID"  required="true" ><br><br><br>
				<button class="edit" style="padding: 10px;outline-color: red" type="Submit" name="Submit">Submit</button>
			</div>
		</center>
	</form>
</body>
</html>