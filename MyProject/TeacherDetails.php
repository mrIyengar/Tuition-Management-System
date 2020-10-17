
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

 		if (isset($_POST["name"], $_POST["teacherId"], $_POST["Email"], $_POST["gender"], $_POST["DOB"], $_POST["staffId"]))
        {
    $name = $_POST['name'];
    $teacherId = $_POST['teacherId'];
    $Email = $_POST['Email'];
    $gender = $_POST['gender'];
    $DOB = $_POST['DOB'];
    $staffId = $_POST['staffId'];
    
    $requestMethod = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : null;
   if($requestMethod == "POST")
   {
 	$sql = "insert into teacherdetails values('$name','$teacherId','$Email','$gender','$DOB','$staffId')";
        $query = mysqli_query($db,$sql);
      //nothing
	        if($query) echo "<script>alert('Successfully registered');
    							window.location.href='ShowTeacher.php';</script>";	
	     
   		     else  echo "<script>alert('Error');
    							window.location.href='TeacherDetails.php';</script>";	
       		     
   }  
  }      
?>



<!DOCTYPE html>
<html>
<head>
	<title>Teacher Deatils</title>
	<style type="text/css">
		.head {
			text-align: center;
			background-color: grey;
			padding: 15px;
		}
		.form {
			background-clip: content-box, padding-box;
		}
		#a,#b,#c,#d,#e,#f {
			padding: 10px;
			shape-outside: ellipse(2px);
		}
		.body {
			background-image: url(images/background16.jpg);
			background-repeat: no-repeat;
			background-size: cover;
			height: 100%;
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
		<h1 style="color: white; font-size: 40px">Teacher Details</h1>
	</div>
	<br>
	<form method="POST">
		<center>
			<div class="form">
				<input id="a" type="name" name="name" placeholder="Teacher name"  required="true" ><br><br><br>
				<input id="b" type="text" name="teacherId" placeholder="Teacher ID"  required="true" ><br><br><br>
				<input id="c" type="Email" name="Email" placeholder="E-mail"  required="true" ><br><br><br>
				<input id="d"  type="name" name="gender" placeholder="Male/Female" required="true"><br><br><br>
				<input id="e" type="date" name="DOB" placeholder="DOB"  required="true" ><br><br><br>
				<input id="f" type="text" name="staffId" placeholder="Staff ID"  required="true" ><br><br><br>
				<button class="edit" style="padding: 10px;outline-color: red" type="Submit" name="Submit">Submit</button>
			</div>
		</center>
	</form>
</body>
</html>