<?php
    function valid($subjectName, $subCode, $classNo,$teacherId, $error)
    {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>Edit Subject Records</title>
	</head>
	<style type="text/css">
		td {
			padding: 20px;
			shape-outside: ellipse(2px);
			text-align: center;
			border-style: inherit;
			border-radius: 5%;
			border-width: 2px;
			border-color: white;
			background: transparent;
		}
		body {
			background-image: url(images/background6.jpg);
			background-repeat: no-repeat;
			background-size: cover;
			height: 100%;
		}
		.form {
			align-content: center;
		}
		.edit {
			width: 40%;
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
<body>
<?php

if ($error != '')
		{
		echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
		}
		?>
		<br><br><br><br><br><br>
		<form class="form" action="" method="post">
		<input type="hidden" name="subCode" value="<?php echo $subCode; ?>"/>

		<center><table border="1" width="30%" >
		<tr>
		<td height="60" colspan="2" style="background-color: lightgreen"><b><font size="5px" color='black'>Edit Subject Records </font></b></td>
		</tr>
		<tr>
		<td width="179"><b><font color='white'>Subject Name<em>*</em></font></b></td>
		<td><label>
		<input  type="text" name="subjectName" value="<?php echo $subjectName; ?>" />
		</label></td>
		</tr>

		<tr>
		<td width="179"><b><font color='white'>Class NO<em>*</em></font></b></td>
		<td><label>
		<input type="text" name="classNo" value="<?php echo $classNo; ?>" />
		</label></td>
		</tr>

		<tr>
		<td width="179"><b><font color='white'>Teacher ID<em>*</em></font></b></td>
		<td><label>
		<input type="text" name="teacherId" value="<?php echo $teacherId; ?>" />
		</label></td>
		</tr>

		<tr align="Right">
		<td colspan="2"><label>
		<input class="edit" type="submit" name="submit" value="Edit Records">
		</label></td>
		</tr>
		</table>
	</center>
		</form>
		</body>
		</html>
		<?php
		}

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

		if (isset($_POST['submit']))
		{

		if (is_numeric($_POST['subCode']))
		{

		$subjectName = mysqli_real_escape_string($db, $_POST['subjectName']);
		$subCode = $_POST['subCode'];
		$classNo = mysqli_real_escape_string($db, $_POST['classNo']);
		$teacherId = mysqli_real_escape_string($db, $_POST['teacherId']);


		if ($subjectName == '' || $subCode == '' || $classNo == '' || $teacherId == '')
		{

		$error = 'ERROR: Please fill in all required fields!';


		valid($subjectName,$subCode,$classNo,$teacherId, $error);
		}
		else
		{

		mysqli_query($db, "UPDATE subjectdetails SET subjectName='$subjectName', classNo='$classNo', teacherId='$teacherId' WHERE subCode='$subCode'")
		or die(mysqli_error($db));

		header("Location: ShowSubject.php");
		}
		}
		else
		{

		echo 'Error1!';
		}
		}
		else

		{

		if (isset($_GET['subCode']) && is_numeric($_GET['subCode']) && $_GET['subCode'] > 0)
		{

		$subCode = $_GET['subCode'];
		$result = mysqli_query($db,"SELECT * FROM subjectdetails WHERE subCode=$subCode")
		or die(mysqli_error($db));
		$row = mysqli_fetch_array($result);

		if($row)
		{

		$subjectName = $row['subjectName'];
		$classNo = $row['classNo'];
		$teacherId = $row['teacherId'];

		valid($subjectName,$subCode,$classNo,$teacherId, '');
		}
		else
		{
		echo "No results!";
		}
		}
		else

		{
		echo 'Error2!';
		}
		}
?>