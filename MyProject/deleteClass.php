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

	if (isset($_GET['classNo']) && is_numeric($_GET['classNo']))
	{
	$classNo = $_GET['classNo'];

	$result = mysqli_query($db,"DELETE FROM classdetails WHERE classNo='".$classNo."'");
	

	header("Location: ShowClass.php");
	}
	else

	{
	header("Location: ShowClass.php");
	}
?>