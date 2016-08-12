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
		$conn = mysqli_connect("localhost","root","","natadatabase");
		
		// Check connection
		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}		
		$msg      = " ";
		
			if(isset($_POST['Name']) && !empty($_POST['Name']))
			{
				$sql = "UPDATE Phone_Customer SET Name = '$_POST[Name]'  WHERE Username = '$_SESSION[usern]' && Password = '$_SESSION[passw]' ";
	            if ($conn->query($sql) === TRUE) 
			    {
					mysqli_refresh($conn,MYSQLI_REFRESH_TABLES);
					
					$msg = $msg ."<br> Your Name was changed to: ".$_POST['Name'].".";
				}
				else 
				{
					$msg = "Error updating record: " . $conn->error;
				}
			}
			
			elseif (isset($_POST['Address']) && !empty($_POST['Address']))
			{
				$sql = "UPDATE Phone_Customer SET Address ='$_POST[Address]'  WHERE Username = '$_SESSION[usern]' && Password = '$_SESSION[passw]'";
				if ($conn->query($sql) === TRUE) 
				{
					$msg = $msg ."<br> Your Address was changed to: ".$_POST['Address'].".";
				}
				else 
				{
					$msg = "Error updating record: " . $conn->error;
				}
			}
			
			elseif (isset($_POST['Email']) && !empty($_POST['Email']))
			{
				$sql = "UPDATE Phone_Customer SET Email ='$_POST[Email]'  WHERE Username = '$_SESSION[usern]' && Password = '$_SESSION[passw]'";
				if ($conn->query($sql) === TRUE) 
			    {
					$msg = $msg ."<br> Your Email was changed to: ".$_POST['Email'].".";
				}
				else 
				{
					$msg = "Error updating record: " . $conn->error;
				}
			}
			
			elseif (isset($_POST['usern']) && !empty($_POST['usern']))
			{
				$sql = "UPDATE Phone_Customer SET Username ='$_POST[usern]'  WHERE Username = '$_SESSION[usern]' && Password = '$_SESSION[passw]'";
				if ($conn->query($sql) === TRUE) 
			    {
					$msg = $msg ."<br> Your Name was changed to: ".$_POST['usern'].".";
					$_SESSION['usern'] = $_POST['usern'];
				}
				else 
				{
					$msg = "Error updating record: " . $conn->error;
				}

			}
			
			elseif (isset($_POST['passw']) && !empty($_POST['passw']))	
			{
				$sql = "UPDATE Phone_Customer SET Password ='$_POST[passw]'  WHERE Username = '$_SESSION[usern]' && Password = '$_SESSION[passw]'";
				if ($conn->query($sql) === TRUE) 
			    {
					$msg = $msg ."<br> Your Name was changed to: ".$_POST['passw'].".";
					$_SESSION['passw'] = $_POST['passw'];
				}
				else 
				{
					$msg = "Error updating record: " . $conn->error;
				}
			}
			
			else
			{
				$msg = "Fill in one field above that you want to change";
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
							<br>
						</p>
							<h3 style ="margin-left:16px;">Only one field can be changed at the time</h4><br>
							<h4 style ="margin-left:16px; color: navy;">1. Insert new information into the field which you want to change</h3><br>
							<h4 style ="margin-left:16px; color: navy;">2. And Press 'Submit' button </h4><br>
						<p> 
							<label class = "label1" for="Name">Change Name to: </label>
							<input id="Name" name="Name" type="text" placeholder="FirstName LastName" />
						</p>
							<br>
						<p> 
							<label class = "label1" for="Address">Change  Address to: </label>
							<input id="Address" name="Address"  type="text" placeholder="Street, City, County" />
						</p>
							<br>
						<p> 
							<label class = "label1" for="Email" >Change Email to: </label>
							<input id="Email" name="Email" type="email" placeholder="mysupermail@mail.com"/> 
						</p>
							<br>
						<p>
							<input type='hidden' name='submitted' id='submitted' value='1'/>
							<label class = "label1" for="usern">Change  Username to: </label>
						    <input type="text" name="usern" id="usern" placeholder ="Enter username" title="Enter username" maxlength="50"> 
						</p>
							<br>
						<p>
							<label class = "label1" for="passw">Change  Password to: </label>
							<input type="password" name='passw' id='passw' maxlength="50" placeholder= "Enter password" >
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