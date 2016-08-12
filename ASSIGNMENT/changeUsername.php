<!DOCTYPE html>
<html>
<head>
<head>
    <link rel="stylesheet" href="webstyles.css">
	<meta charset="utf-8" />
	<title>My Assignment/UpdateForm </title>
</head>
	<body >
	<?php
	// define variable
		$msg = "Please fill in the fields above";

	   if (isset($_POST['usern']) && isset($_POST['passw']) && isset($_POST['email'])) 
	   {
			$con = mysqli_connect("localhost","root","","natadatabase");
		
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL; ".mysql_connect_error();
			}
			
			$sql = "UPDATE Phone_Customer SET Username ='$_POST[usern]' WHERE Email = '$_POST[email]' && Password = '$_POST[passw]'";
			
			if(mysqli_query($con,$sql)) //this error checking doesn't so i implemented another one below
			{
				$sql = "SELECT Username From Phone_Customer WHERE Email = '$_POST[email]' && Password = '$_POST[passw]'";
				
				$result=mysqli_query($con,$sql);

				// Mysql_num_row is counting table row
				$count = mysqli_num_rows($result);
				if($count!=0)
				{
					$row = mysqli_fetch_array($result);
					$username = $row[0];
					$msg = "Your Username was changed to: ".$username;
				}
				else
				{
					$msg = "The Email or Password  is incorrect!!! Please try again or <a href = 'register.html'> Register now ...</a>";
				}
				
			}
			else
			{
				$msg = "The Email or Password  is incorrect!!! Please try again or <a href = 'register.html'> Register now ...</a>";
				die("The Email or Password  is incorrect!!! Please try again or <a href = 'register.html'> Register now ...</a>");
				
			}	
			mysqli_close($con);	
	   }

	function test_input($data) 
	{
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
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
    		    <form id='login' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method='POST' accept-charset='UTF-8' style = "background-color:#f2f2f2;">
					<fieldset >
					    <p>
							<br>
							<h1 style = "color: gray; margin-left:16px;">To Change Your Username</h1>
							<br><br>
							<h4 style ="margin-left:16px;"> * Required fields</h4><br>
						</p>
						<p> 
							Insert Your Email:    *<input id="email" name="email" type="email" required="required" size = "24" placeholder="mysupermail@mail.com"/> 
						</p>
							<br>
						<p>
							Insert Your Password: *<input type="password" name='passw' required="required" id='passw' maxlength="50" placeholder= "Enter password" >
						</p>
							<br>
						<p>
							Insert New Username:  *<input type="text" name="usern" id="usern" required="required" placeholder ="Enter username" title="Enter username" maxlength="50">							
						</p>
							<br></br>
						<p style ="margin-left:210px;">					
							<input class="button2" type='submit' name='Submit' value='Submit'/><br></br>
						</p>
						<span class="error">* <?php echo $msg;?></span>
						<br></br>
						<p style ="margin-left:16px;"> Not a member yet ?
							<a style ="margin-left:20px;" href="register.php" >Join us / Register now >></a>
						</p><br></br>
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
					<br></br>
						<a href="login.php"><img src="username.jpg"/></a><br><br>
						<a style ="margin-left:20px;" href="login.php"> Login / Sign In >></a>
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