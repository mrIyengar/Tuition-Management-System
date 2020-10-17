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

    if (isset($_POST["classNo"], $_POST["Day"], $_POST["classes_from"], $_POST["to"], $_POST["teacherId"]))
        {
    $classNo = $_POST['classNo'];
    $Day = $_POST['Day'];
    $classes_from = $_POST['classes_from'];
    $to = $_POST['to'];
    $teacherId = $_POST['teacherId'];
    
    $requestMethod = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : null;
   if($requestMethod == "POST")
   {
 	$sql = "insert into classdetails values('$classNo','$Day','$classes_from','$to','$teacherId')";
        $query = mysqli_query($db,$sql);
      //nothing
	        if($query) echo "<script>alert('Successfully registered');
    							window.location.href='ShowClass.php';</script>";	
	     
   		     else  echo "<script>alert('Error');
    							window.location.href='ClassDetails.php';</script>";	
       		     
   }  
}
       
?>





<!DOCTYPE html>
<html>
<head>
	<title>Class Deatils</title>
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
			background-image: url("images/background1.jpg");
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
		<h1 style="color: white; font-size: 40px">Class Details</h1>
	</div>
	<br>
	<br>
	<br>
	<form method="POST">
		<center>
			<div class="form">
				<input id="a" type="number" name="classNo" placeholder="Class number "  required="true" ><br><br><br>
				<input id="c" type="name" name="Day" placeholder="Day"  required="true" ><br><br><br>
				from &nbsp;&nbsp;<input id="b" type="time" name="classes_from" placeholder="Class Time "  required="true" >&nbsp; &nbsp;To &nbsp;&nbsp;<input id="d"  type="time" name="to" placeholder="Class Hours" required="true"><br><br><br>
				<input id="b" type="text" name="teacherId" placeholder="Teacher ID"  required="true" ><br><br><br>
				<button class="edit" style="padding: 10px;outline-color: red" type="submit" name="submit">Submit</button>
			</div>
		</center>
	</form>
</body>
</html>