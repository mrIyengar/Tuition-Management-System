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

	if (isset($_GET['subCode']) && is_numeric($_GET['subCode']))
	{
	$subCode = $_GET['subCode'];

	$result = mysqli_query($db,"DELETE FROM subjectdetails WHERE subCode='".$subCode."'");
	

	header("Location: ShowSubject.php");
	}
	else

	{
	header("Location: ShowSubject.php");
	}
?>