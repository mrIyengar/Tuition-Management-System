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

	if (isset($_GET['billNo']) && is_numeric($_GET['billNo']))
	{
	$billNo = $_GET['billNo'];

	$result = mysqli_query($db,"DELETE FROM feedetails WHERE billNo='".$billNo."'");
	

	header("Location: ShowFee.php");
	}
	else

	{
	header("Location: ShowFee.php");
	}
?>