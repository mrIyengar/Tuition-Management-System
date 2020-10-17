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
        if (isset($_POST["name"], $_POST["staffId"], $_POST["Department"], $_POST["phone"], $_POST["Email"], $_POST["password"]))
        {

    $name = $_POST['name'];
    $staffId = $_POST['staffId'];
    $Department = $_POST['Department'];
    $phone = $_POST['phone'];
    $Email = $_POST['Email'];
    $password = $_POST['password'];
    
    $requestMethod = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : null;
   if($requestMethod == "POST")
   {
 	$sql = "insert into admindetails values('$name','$staffId','$Department','$phone','$Email','$password')";
        $query = mysqli_query($db,$sql);
      //nothing
	        if($query) echo "<script>alert('Successfully registered');
    							window.location.href='AdminLogin.php';</script>";	
	     
   		     else  echo "<script>alert('Error');
    							window.location.href='AdminDetails.php';</script>";	
       		     
   }  
   }
       
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Details</title>
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
			background-image: url("images/background2.jpg");
		}
	</style>
</head>
<body class="body">
	<div class="head">
		<h1 style="color: white; font-size: 40px">Admin Details</h1>
	</div>
	<br>
	<form method="POST">
		<center>
			<div class="form">
				<input id="a" type="name" name="name" placeholder="Admin name"  required="true" ><br><br><br>
				<input id="b" type="text" name="staffId" placeholder="Staff ID"  required="true" ><br><br><br>
				<input id="c" type="name" name="Department" placeholder="Department"  required="true" ><br><br><br>
				<input id="d" type="numbers" name="phone" placeholder="Phone number"  required="true" ><br><br><br>
				<input id="e" type="Email" name="Email" placeholder="E-mail"  required="true" ><br><br><br>
				<input id="e" type="password" name="password" placeholder="password"  required="true" ><br><br><br>
				<button style="padding: 10px;outline-color: red" type="submit" name="submit">Submit</button>
			</div>
		</center>
	</form>
</body>
</html>