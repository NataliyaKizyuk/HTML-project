<?php
	session_start();
	ob_start();
	$_SESSION['usern'] = '';
	$_SESSION['passw'] = '';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="webstyles.css">
	<meta charset="utf-8" />
	<title>My Assignment/Login Page</title>
</head>
	<body >
		<?php
			$con = mysqli_connect("localhost","root","","natadatabase");
			$msg = '';
			
			if (isset($_POST['usern']) && isset($_POST['passw'])) 
			{
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL; ".mysql_connect_error();
				}
				
				//to check if username and password exist in my database table
				$sql = "SELECT * FROM Phone_Customer WHERE Username ='$_POST[usern]' and Password = '$_POST[passw]';";
				$result = mysqli_query($con,$sql);
				
				if($result === FALSE)//if query return false then user doesn't exist
				{
					$msg = "Something went wrong!!! Try Again or Try to Change your Password";
				}
				else
				{
					// Mysql_num_row is counting table row
					$count = mysqli_num_rows($result);
				}

				// If result matched $username and $password, table row must be 1 row
				if($count!=0)
				{
					$_SESSION['usern'] = $_POST['usern'];
					$_SESSION['passw'] = $_POST['passw'];
					$_SESSION['valid'] = true;
					$_SESSION['timeout'] = time();
					
					$msg = 'Hello '.$_SESSION['usern'].'. ';					
					if( isset( $_SESSION['usern'] ) ) 
					{
						header("location: myphone.html");
					}
					else 
					{
						$_SESSION['usern'] = $username;
						
						$msg = "Autentication is failed!!!
								Session variable is not set!!!";
					}
				}
				else
				{
					$msg = " Wrong Username or Password!!! Try Again.";
					session_destroy();
				}
				mysqli_close($con);
			}
		?>
		<div id="wrapper">
			<header><img src="logo.png" style="float:left;"><br><br><br>
				<h1 style = "color:#333333; font-size:30">Mobile Phone Service Provider</h1><br><br>
				<a href="home.html" class="button">Home</a>
				<a href="shop.html" class="button">Shop</a>
				<a href="help.html" class="button">Help</a>
				<a href="http://freq.ie/mobile-coverage-map-ireland/" class="button">4G Map</a>
				<a href="http://www.thejournal.ie/smartphones/news/" class="button">News</a>
				<a href="login.php" class="button">Login</a> 
				<a href="register.php" class="button">Register</a>
			</header>
    		<div id="sideBar" ><br>
			    <div class="left1"><br>
				
    		    <form id='login' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method='post' accept-charset='UTF-8' style = "background-color:#f2f2f2;">
					<fieldset >
					    <p>
							<br>
							<h1 style = "color: gray; margin-left:16px;">Log In / Sign In</h1>
							<br><br>
							<h4 style ="margin-left:16px;"> * Required field</h4>
						</p>
							<br>
							<h4 style = "color:red"><span class="error"> <?php echo $msg;?></span></h4><br>
						<p>
							<input type='hidden' name='submitted' id='submitted' />
							<label for="usern">Username*: </label>
						    <input type="text" name='usern' id="usern" required placeholder ="Enter username" title="Enter username" maxlength="50" autofocus > 
						</p>
							<br>
						<p>
							<label for="passw"> Password*: </label>
							<input type="password" name='passw' id='pass' maxlength="50" required placeholder= "Enter password" >
						</p>
							<br>
						<p>
							<input type="checkbox" name="checkbox" value="checkbox" style ="margin-left:10px;"> Remember me						
							<input class="button2" type='submit' name='Submit' value='Login'/>

						</p>
							<br><br>
						<p style ="margin-left:16px;"> Not a member yet ?
							<a style ="margin-left:20px;" href="register.php" >Join us / Register now >></a>
						</p>
						    <br><br><br><br><br>
					</fieldset>
				</form>
				</div>	
			</div>
			<div id="mainContent" >
					<div class="f_right">
						<br>
						<script>
						  (function() { /*referense: https://cse.google.com/cse/create/new*/
							var cx = '005845152589576555699:emkqbomxhxi';
							var gcse = document.createElement('script');
							gcse.type = 'text/javascript';
							gcse.async = true;
							gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
							var s = document.getElementsByTagName('script')[0];
							s.parentNode.insertBefore(gcse, s);
						  })();
						</script>
						<gcse:search></gcse:search>         
						<br>
							<a href="login.php"><img src="user.png"/></a>
						<ul >
							<li style = "margin-left:50px;"><a href = "help.html"> Username help</a></li><br>
							<li style = "margin-left:50px;"><a href = "help.html"> Password help</a></li><br>
							<li style = "margin-left:50px;"><a href = "help.html"> Contact Us</a></li><br>
						</ul><br>
				    </div>
			</div>
		</div>
	</body>
		<footer style = "width: 70%; "><br>
			<h5 style = "color:#A9D0F5;"> MyPhone Mobile Phone Service Provider</h5><br>
			<a href="home.html" class="button">Home</a>
			<a href="shop.html" class="button">Shop</a>
			<a href="help.html" class="button">Help</a>
			<a href="http://freq.ie/mobile-coverage-map-ireland/" class="button">4G Map</a>
			<a href="http://www.thejournal.ie/smartphones/news/" class="button">News</a>
			<a href="login.php" class="button">Login</a> 
			<a href="register.php" class="button">Register</a>
		</footer>
</html>