<?php
    function valid($name, $studentId, $Email, $gender, $DOB, $place, $teacherId, $error)
    {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>Edit Student's Records</title>
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
		<input type="hidden" name="studentId" value="<?php echo $studentId; ?>"/>

		<center><table border="1" width="30%" >
		<tr>
		<td height="60" colspan="2" style="background-color: lightgreen"><b><font size="5px" color='black'>Edit Student's Records </font></b></td>
		</tr>
		<tr>
		<td width="179"><b><font color='white'>Name<em>*</em></font></b></td>
		<td><label>
		<input  type="text" name="name" value="<?php echo $name; ?>" />
		</label></td>
		</tr>

		<tr>
		<td width="179"><b><font color='white'>Email<em>*</em></font></b></td>
		<td><label>
		<input type="text" name="Email" value="<?php echo $Email; ?>" />
		</label></td>
		</tr>

		<tr>
		<td width="179"><b><font color='white'>gender<em>*</em></font></b></td>
		<td><label>
		<input type="text" name="gender" value="<?php echo $gender; ?>" />
		</label></td>
		</tr>

		<tr>
		<td width="179"><b><font color='white'>DOB<em>*</em></font></b></td>
		<td><label>
		<input type="date" name="DOB" value="<?php echo $DOB; ?>" />
		</label></td>
		</tr>

		<tr>
		<td width="179"><b><font color='white'>Place<em>*</em></font></b></td>
		<td><label>
		<input type="text" name="place" value="<?php echo $place; ?>" />
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

		if (is_numeric($_POST['studentId']))
		{

		
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$studentId = $_POST['studentId'];
		$Email = mysqli_real_escape_string($db, $_POST['Email']);
		$gender = mysqli_real_escape_string($db, $_POST['gender']);
		$DOB = mysqli_real_escape_string($db, $_POST['DOB']);
		$place = mysqli_real_escape_string($db, $_POST['place']);
		$teacherId = mysqli_real_escape_string($db, $_POST['teacherId']);


		if ($name == '' || $studentId == '' || $Email == '' || $gender == '' || $DOB == '' || $place == '' || $teacherId == '')
		{

		$error = 'ERROR: Please fill in all required fields!';


		valid($name,$studentId,$Email,$gender,$DOB,$place,$teacherId, $error);
		}
		else
		{

		mysqli_query($db, "UPDATE studentdetails SET name='$name', Email='$Email' ,gender='$gender' , DOB='$DOB' ,place='$place' ,teacherId='$teacherId' WHERE studentId='$studentId'")
		or die(mysql_error());
		

		header("Location: ShowStudent.php");
		}
		}
		else
		{

		echo 'Error!';
		}
		}
		else

		{

		if (isset($_GET['studentId']) && is_numeric($_GET['studentId']) && $_GET['studentId'] > 0)
		{

		$studentId = $_GET['studentId'];
		$result = mysqli_query($db,"SELECT * FROM studentdetails WHERE studentId=$studentId")
		or die(mysqli_error($db));
		$row = mysqli_fetch_array($result);

		if($row)
		{

		$name = $row['name'];
		$Email = $row['Email'];
		$gender = $row['gender'];
		$DOB = $row['DOB'];
		$place = $row['place'];
		$teacherId = $row['teacherId'];

		valid($name,$studentId,$Email,$gender,$DOB,$place,$teacherId, '');
		}
		else
		{
		echo "No results!";
		}
		}
		else

		{
		echo 'Error!';
		}
		}
?>