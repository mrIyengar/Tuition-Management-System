<?php
    function valid($studentId, $billNo, $totalPay,$date, $error)
    {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>Edit Fee Records</title>
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
		<input type="hidden" name="billNo" value="<?php echo $billNo; ?>"/>

		<center><table border="1" width="30%" >
		<tr>
		<td height="60" colspan="2" style="background-color: lightgreen"><b><font size="5px" color='black'>Edit Fee Records </font></b></td>
		</tr>
		<tr>
		<td width="179"><b><font color='white'>Student ID<em>*</em></font></b></td>
		<td><label>
		<input  type="text" name="studentId" value="<?php echo $studentId; ?>" />
		</label></td>
		</tr>

		<tr>
		<td width="179"><b><font color='white'>Total Pay<em>*</em></font></b></td>
		<td><label>
		<input type="text" name="totalPay" value="<?php echo $totalPay; ?>" />
		</label></td>
		</tr>

		<tr>
		<td width="179"><b><font color='white'>Date<em>*</em></font></b></td>
		<td><label>
		<input type="date" name="date" value="<?php echo $date; ?>" />
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

		if (is_numeric($_POST['billNo']))
		{

		$studentId = mysqli_real_escape_string($db, $_POST['studentId']);
		$billNo = $_POST['billNo'];
		$totalPay = mysqli_real_escape_string($db, $_POST['totalPay']);
		$date = mysqli_real_escape_string($db, $_POST['date']);


		if ($studentId == '' || $billNo == '' || $totalPay == '' || $date == '')
		{

		$error = 'ERROR: Please fill in all required fields!';


		valid($studentId,$billNo,$totalPay,$date, $error);
		}
		else
		{

		mysqli_query($db, "UPDATE feedetails SET studentId='$studentId', totalPay='$totalPay', `date`='$date' WHERE billNo='$billNo'")
		or die(mysqli_error($db));

		header("Location: ShowFee.php");
		}
		}
		else
		{

		echo 'Error!';
		}
		}
		else

		{

		if (isset($_GET['billNo']) && is_numeric($_GET['billNo']) && $_GET['billNo'] > 0)
		{

		$billNo = $_GET['billNo'];
		$result = mysqli_query($db,"SELECT * FROM feedetails WHERE billNo=$billNo")
		or die(mysqli_error($db));
		$row = mysqli_fetch_array($result);

		if($row)
		{

		$studentId = $row['studentId'];
		$totalPay = $row['totalPay'];
		$date = $row['date'];

		valid($studentId,$billNo,$totalPay,$date, '');
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