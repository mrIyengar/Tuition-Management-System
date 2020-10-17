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

    if (isset($_POST["studentId"], $_POST["billNo"], $_POST["totalPay"], $_POST["date"]))
        {
    $studentId = $_POST['studentId'];
    $billNo = $_POST['billNo'];
    $totalPay = $_POST['totalPay'];
    $date = $_POST['date'];
    
    $requestMethod = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : null;
   if($requestMethod == "POST")
   {
 	$sql = "insert into feedetails values('$studentId','$billNo','$totalPay','$date')";
        $query = mysqli_query($db,$sql);
      //nothing
	        if($query) echo "<script>alert('Successfully registered');
    							window.location.href='ShowFee.php';</script>";	
	     
   		     else  echo "<script>alert('Error');
    							window.location.href='FeeDetails.php';</script>";	
       		     
   }  
}
       
?>





<!DOCTYPE html>
<html>
<head>
	<title>Fee Details</title>
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
			background-image: url(images/background10.png);
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
		<h1 style="color: white; font-size: 40px">Fee Details</h1>
	</div>
	<br>
	<br>
	<br>
	<form method="POST">
		<center>
			<div class="form">
				<input id="a" type="text" name="studentId" placeholder="Student ID "  required="true" ><br><br><br>
				<input id="b" type="number" name="billNo" placeholder="Bill Number "  required="true" ><br><br><br>
				<input id="c" type="number" name="totalPay" placeholder="Total Payment"  required="true" ><br><br><br>
				<input id="d" type="date" name="date" placeholder="Paid Date "  required="true" ><br><br><br>
				<button class="edit" style="padding: 10px;outline-color: red" type="Submit" name="Submit">Submit</button>
			</div>
		</center>
	</form>
</body>
</html>