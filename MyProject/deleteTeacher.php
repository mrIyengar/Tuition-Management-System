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

	if (isset($_GET['teacherId']) && is_numeric($_GET['teacherId']))
	{
	$teacherId = $_GET['teacherId'];

	$result = mysqli_query($db,"DELETE FROM teacherdetails WHERE teacherId='".$teacherId."'");
	

	header("Location: ShowTeacher.php");
	}
	else

	{
	header("Location: ShowTeacher.php");
	}
?>