<!DOCTYPE html>
<html>
	<head>
		<title>Welcome</title>
		<style type="text/css">
			.home,.about,.contact,.admin {
				padding: 50px;
				color: black;
				column-fill: balance;
				background-color: lightpink;

			}
			.head {
				text-align: center;
				background-size: 50px;
				padding: 50px;
				font-size: 40px;
				background-color: lightblue;
			}
			ul {
    				float: right;
   				 	list-style-type:none;
   					 margin-top: 25px;
    
			}

			ul li{
    				display: inline-block;
    				font-size: 25px;
    				
			}

			ul li a {
				    text-decoration: none;
				    color:grey;
				    padding: 25px 35px;
				    border:1px solid transparent;
				    transition:0.3s ease ;
			}

			ul li a:hover {
				    background-color: grey;
				    color: black;
   			}

  			 ul li.active a{
  					  background-color: none;
  					  color: black;
   			}


		</style>
	</head>


	<body style="background-image: url(images/background5.jpg); background-blend-mode: overlay;background-repeat: no-repeat;background-size: cover;">

		<h1 class="head">Tuition Management System</h1>

		 <ul>
			        <li class="active"><a href="#"> Home</a></li>
			        <li><a href="AdminLogin.php"> Admin</a></li>
			        <li><a href="About.php"> About</a></li>
    	</ul>

		<!--<center>
			<div class="home" style="display: inline-block">
   				Home
			</div>
			<div class="admin" style="display: inline-block">
   				<a href="AdminLogin.php" style="text-decoration: none;color: black">Admin</a>
			</div>
			<div class="about" style="display: inline-block">
   				<a href="About.php" style="text-decoration: none;color: black">About</a>
			</div>
			
		</center>-->
		<br>
		<br>
		<img src="images/sirmv.jpg" style="margin-left: 40px;margin-right: 50px;margin-bottom: 30px;float: left;">
		<br>
		<br>
		<br><br>
		<br>
		<h1 style="color: lightgreen">To give real service, you must add something which cannot be bought or measured with money</h1>
		<h2 style="color: lightgreen">-Sir M Visvesvaraya </h2>
	</body>
</html>