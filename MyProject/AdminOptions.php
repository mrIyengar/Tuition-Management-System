<!DOCTYPE html>
<html>
<head>
	<title>Admin Options</title>
	<style type="text/css">
		.button {
			  background-color: #2F4F4F; 
			  border: none;
			  color: white;
			  padding: 20px;
			  text-align: center;
			  text-decoration: none;
			  display: inline-block;
			  font-size: 16px;
			  margin: 4px 2px;
			  cursor: pointer;
			  width: 10%;

		}
		.button1 {border-radius: 12px;}
		.button2 {border-radius: 12px;}
		.button3 {border-radius: 12px;}
		.button4 {border-radius: 12px;}
		.button5 {border-radius: 12px;}

		.button1:hover, .button2:hover, .button3:hover, .button4:hover, .button5:hover {
			cursor: pointer;
			background: black;
		}

		.Options {
			text-align: center;
			width: 50;
			padding-top: 20px;
			background-color: ;
		}
		.body {
			background-image: url(images/background3.jpg);
			background-repeat: no-repeat;
			background-size: cover;
			height: 100%;
		}
		.header {
			text-align: center;
			color: white;

			background-color: grey;
			padding: 15px;
		}

			.logout {
				float: right;
	   			list-style-type:none;
	   			margin-right: 30px;
			}
			.log {
				float: left;

			}

			ul {
    				float: right;
   				 	list-style-type:none;
   					 margin-left: 100px;

    
			}

			ul li{
    				display: inline-block;
    				font-size: 25px;

    				
			}

			ul li a {
				    text-decoration: none;
				    color:white;
				    padding: 10px 20px;
				    border:1px solid ;
				    transition:0.3s ease ;
				    padding-right: 50px;

			}

			ul li a:hover {
				    background-color: lightgreen;
				    color: black;
   			}

  			 ul li.active a{
  					  background-color: none;
  					  color: black;
   			}



	</style>
</head>
<body class="body">
	<div class="header">
		<h1> Tuition Management System</h1>
	</div>
	<br>
		<center>
			<div class="log">
    			<ul><li><a href="ShowLogs.php"> Log Details</a></li></ul>
    		</div>
		<div>
		<ul>
			        
			        <li><a href="ShowTeacher.php"> Teachers</a></li>
			        <li><a href="ShowStudent.php"> Students</a></li>
			        <li><a href="ShowClass.php"> Classes</a></li>
			        <li><a href="ShowSubject.php"> Subjects</a></li>
			        <li><a href="ShowFee.php"> Fee</a></li>
    	</ul>
    	</div>
    	</center>
    	
    	<br>
    	<br><br><br><br><br>
		
	<div class="Options">
		
		<button class="button button1" onclick="window.location.href='TeacherDetails.php';">Teacher Details</button><br><br>
		<button class="button button2" onclick="window.location.href='StudentDetails.php';">Student Details</button><br><br>
		<button class="button button3" onclick="window.location.href='ClassDetails.php';">Class Details</button><br><br>
		<button class="button button4" onclick="window.location.href='SubjectDetails.php';">Subject Details</button><br><br>
		<button class="button button5" onclick="window.location.href='FeeDetails.php';">Fee Details</button><br><br>
		

	</div>
	<div>
    		<ul class="logout"><li><a href="logout.php"> Logout</a></li></ul>
    		
    </div>
   
</body>
</html>