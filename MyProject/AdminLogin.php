<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'mydb');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $Email = mysqli_real_escape_string($db,$_POST['Email']);
      $name = mysqli_real_escape_string($db,$_POST['Email']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 

      
      $sql = "SELECT Email,name,password FROM admindetails WHERE(name = '$name' OR Email = '$Email') AND password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $Email and $password, table row must be 1 row
		
      if($count == 1) {
        // session_register("Email");
        // $_SESSION['Email'] = $Email;
        
         header("location: AdminOptions.php");
         
      }else {
       //$error = "Your Login Name or Password is invalid";
         echo "<script>alert('Login Error');
                  window.location.href='AdminLogin.php';</script>"; 
      }
   }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<style type="text/css">
		.email {
			padding: 8px;
		}
		.password {
			padding: 8px;
		}
		.register {
		color: black;
		text-align: center;
		padding: 10px;
		}
		.b {
		    width: 340px;
		    height: 460px;
		    background: transparent;
		    color: #fff;
		    top: 50%;
		    left: 50%;
		    position: absolute;
		    transform: translate(-50%, -50%);
		    box-sizing: border-box;
		    padding: 20px 30px;
		    border-width: 10px;
		    border-color: black;
		}
			
			
			 .email, .password
			{
			    border: none;
			    border-bottom: 1px solid #ffff;
			    background: transparent;
			    outline: none;
			    height: 40px;
			    color: #fff;
			    font-size: 16px;
			    border-color: white;
			    border-width: 2px;
			}

			.b .submit {
			    border: none;
			    outline: none;
			    height: 40px;
			    background: black;
			    color:#fff;
			    font-size: 18px;
			    border-radius: 100px;
			    width: 70%;
			}

			.b .submit {
			    border: none;
			    outline: none;
			    height: 40px;
			    background:#1c8adb;
			    color:#fff;
			    font-size: 18px;
			    border-radius: 20px;
			}

			.b .submit:hover
			{
			    cursor: pointer;
			    background: grey;
			  
			}
		
	</style>
</head>
<body style="background-image: url(images/background4.jpg);">
	<div>
		<div class="a">
			<h1 align="center" style="color: white;font-size: 40px;padding: 30px;background-color: grey">Admin Login</h1>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<center>

				<div class="b" >
					<form role="form" method="POST" name="login">
						<br>
						<br>
						<br>

							<div class="form-group">
								<input class="email" placeholder="E-mail / Username" name="Email"  required="true" align="center">
							</div>
							<br>
							<div>
								<input class="password" placeholder="Password" name="password" type="password" required="true">
							</div>
							<br>
							<div>
								<!--<center><button class="zx"><a href="joke2.html"  type="submit"  style="color: red" >register</a></button></center>-->
								<button class="submit" type="submit" name="submit" value="submit">Submit</button>
								<br>
								
							</div>

					</form>
					<br>
					<br>
					<br>
					<div>
						<p style="color: grey">New here ?... Then click on Register</p>
						<button class="submit" type="submit" name="submit" onclick="window.location.href='AdminDetails.php';">Register </button>
					</div>
				</div>
			
		</center>
	</div>	
</body>
</html>