
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="webstyles.css">
	<meta charset="utf-8" />
	<title>My Assignment</title>
</head>
	<body>
		<?php
			session_start();	
			$con = mysqli_connect("localhost","root","","natadatabase");
			$msgE = "  ";
			$msgS = " ";
			
			if(isset($_POST['Name']) && isset($_POST['Address']) && isset($_POST['Email']) 
				&& isset($_POST['Username']) && isset($_POST['Password']))
			{
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL; ".mysqli_connect_error();
				}
				function test_input($data) 
				{
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
				
				$sql = "INSERT INTO phone_customer(Name, Address, Email, Username, Password)
				VALUES 
				('$_POST[Name]', '$_POST[Address]','$_POST[Email]','$_POST[Username]','$_POST[Password]')";
				
				if(!mysqli_query($con,$sql))
				{
					$msgE ='Something went wrong!  Please Try Again.';
				}
				else
				{
					
					$msgS ='Your registration is successful!!!  Your personal details was added to your account. ';
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
							<h1 style = "color: gray; margin-left:16px;">Register / Sign Up</h1>
							<br><br>
							<h4 style ="margin-left:16px;"> * Required fields</h4><br>
						</p>
							
						<p>
							<h4 style = "color:red; margin-left:16px;"><span class="error"> <?php echo $msgE;?></span></h4><br>
						</p>
						<p> 
							<label class = "label1" for="Name">Your name *</label>
							<input id="Name" name="Name" required="required" type="text" placeholder="FirstName LastName" />
						</p>
							<br>
						<p> 
							<label class = "label1" for="Address">Your address *</label>
							<input id="Address" name="Address" required="required" type="text" placeholder="Street, City, County" />
						</p>
							<br>
						<p> 
							<label class = "label1" for="Email" > Your email *</label>
							<input id="Email" name="Email" required="required" type="email" placeholder="mysupermail@mail.com"/> 
						</p>
							<br>
						<p> 
							<label class = "label1" for="Username">Your username *</label>
							<input id="Username" name="Username" required="required" type="text" placeholder="mysuperusername690" />
						</p>
							<br>
						<p> 
							<label class = "label1" for="Password">Your password * </label>
							<input id="Password" name="Password" required="required" type="password" placeholder="eg. X8df!90EO"/>
						</p>
							<br>
						<p style ="margin-left:215px;"> 
							<input class="button2" type='submit' name='Submit' value="Submit" /> 
						</p>
							<br>
						<p>
							<h4 style = "color:navy; margin-left:16px;"><span class="error"> <?php echo $msgS;?></span></h4>
						</p>
							<br>
						<p style ="margin-left:16px;">  Already a member ?
							<a style ="margin-left:20px;" href="login.php"> Go and log in >></a>
						</p>
							<br><br>
					</fieldset >
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
						<a href="login.php"><img src="add_user.png"/></a>
						<ul>
							<li style = "margin-left:50px;"><a href = "help.html"> Username help</a></li><br>
							<li style = "margin-left:50px;"><a href = "help.html"> Password help</a></li><br>
							<li style = "margin-left:50px;"><a href = "help.html"> Contact Us</a></li><br>
						</ul><br><br><br><br>
				    </div>
			</div>
		</div>
	</body>
		<footer style = "width: 70%; ">
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