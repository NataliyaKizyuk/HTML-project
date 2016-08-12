<?php
	session_start();
	ob_start();
	echo "Hello  ".$_SESSION['usern'];
	//echo $_SESSION['passw'];
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="webstyles.css">
	<meta charset="utf-8" />
	<title>My Assignment/UpdateForm </title>
</head>
	<body >
	<?php
		$msg      = " ";
		
		if (isset($_POST['Name']) && isset($_POST['Address']) && isset($_POST['Email']) 
			 && isset($_POST['usern']) && isset($_POST['passw']) ) 
	    {
			 $conn = mysqli_connect("localhost","root","","natadatabase");
		
			// Check connection
			if ($conn->connect_error) 
			{
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql = "UPDATE Phone_Customer SET Name = '$_POST[Name]', Address ='$_POST[Address]',
                   	Email = '$_POST[Email]', Username ='$_POST[usern]', Password ='$_POST[passw]'	
					WHERE Username = '$_SESSION[usern]' && Password = '$_SESSION[passw]' ";

			if ($conn->query($sql) === TRUE) 
			{
				mysqli_refresh($conn,MYSQLI_REFRESH_TABLES);
				
				$sql = "SELECT * From Phone_Customer WHERE Username = '$_POST[usern]' && Password = '$_POST[passw]' ";
				$result=mysqli_query($conn,$sql);

				// Mysql_num_row is counting table row
				$count = mysqli_num_rows($result);
				if($count!=0)
				{
					$row = mysqli_fetch_array($result);
					$name     = $row[1];
					$address  = $row[2];
					$email    = $row[3];
					$username = $row[4];
					$password = $row[5];
					
					$msg = "Your Personal Information was changed!";
					//updating session variables
					$_SESSION['usern'] = $_POST['usern'] ;
					$_SESSION['passw'] = $_POST['passw'] ;
				}
				else
				{
					$msg = "Something went wrong!!! Try Again";
				}
			} 
			else 
			{
				$msg = "Error updating record: " . $conn->error;
			}

			$conn->close();
	   }
	else
	{
		$msg = "Please fill in the fields above";
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
							<h1 style = "color: gray; margin-left:16px;">Change Your Details</h1>
							<br><br>
						</p>
							<br><h4 style ="margin-left:16px;"> * Required fields</h4><br>
						<p> 
							<label class = "label1" for="Name">Insert new  Name: * </label>
							<input id="Name" name="Name" type="text" required="required" placeholder="FirstName LastName" />
						</p>
							<br>
						<p> 
							<label class = "label1" for="Address">Insert new Address: * </label>
							<input id="Address" name="Address"  type="text" required="required" placeholder="Street, City, County" />
						</p>
							<br>
						<p> 
							<label class = "label1" for="Email" >Insert new Email: * </label>
							<input id="Email" name="Email" type="email" required="required" placeholder="mysupermail@mail.com"/> 
						</p>
							<br>
						<p>
							<input type='hidden' name='submitted' id='submitted' value='1'/>
							<label class = "label1" for="usern">Insert new Username: * </label>
						    <input type="text" name="usern" id="usern" required="required" placeholder ="Enter username" title="Enter username" maxlength="50"> 
						</p>
							<br>
						<p>
							<label class = "label1" for="passw">Insert new Password: * </label>
							<input type="password" name='passw' id='passw' maxlength="50" required="required" placeholder= "Enter password" >
						</p>
							<br></br>
						<p>					
							<input class="button2" type='submit' name='Submit' value='Submit'/>
							<input class="button2" type='submit' value='Cancel' onclick = "window.location.href ='http://localhost/assignment/myphone.html' "/></a>
							
						</p>
							<br><br>
							<span class="error"><?php echo $msg;?></span>
							<br><br>
							<a style ="margin-left:20px;" href="register.php" ></a>
						</p>
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
					<p><br></br>	
						<ul >
							<li style = "margin-left:50px;"><a href = "help.html"> Username help</a></li><br></br>
							<li style = "margin-left:50px;"><a href = "help.html"> Password help</a></li><br></br>
							<li style = "margin-left:50px;"><a href = "help.html"> Contact Us</a></li><br></br>
						</ul><br></br>
					</p><br></br>
					<input class='button2' type='submit' style = 'width: 200px;' value='My Account' onclick = "window.location.href ='http://localhost/assignment/myphone.html' "/></a>	
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