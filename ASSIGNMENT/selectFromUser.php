<?php
	session_start();
	ob_start();
	echo "Hello  ".$_SESSION['usern'];
	//echo $_SESSION['passw'];
?>
<!DOCTYPE html>
<html>
<head>
<head>
    <link rel="stylesheet" href="webstyles.css">
	<meta charset="utf-8" />
	<title>My Assignment/UpdateForm </title>
	<style>
	    .main
		{
			border: 0px;
			margin-bottom:300px;
			margin-top: 200px;
			margin-left:300px;
			padding:0;
			position:relative;
		}
		
	</style>
</head>
	<body >
		<div id="wrapper">
			<header>
				<a href="home.html" class="button">Home</a>
				<a href="shop.html" class="button">Shop</a>
				<a href="help.html" class="button">Help</a>
				<a href="http://freq.ie/mobile-coverage-map-ireland/" class="button">4G Map</a>
				<a href="http://www.thejournal.ie/smartphones/news/" class="button">News</a>
				<a href="login.php" class="button">Login</a> 
				<a href="register.php" class="button">Register</a>
			</header>
			<?php
				$con = mysqli_connect("localhost","root","","natadatabase");
				mysqli_refresh($con,MYSQLI_REFRESH_TABLES);
				
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL; ".mysql_connect_error();
				}
				
				if(isset($_SESSION['usern'])&& isset($_SESSION['passw']))
				{
					$result = mysqli_query($con,"SELECT Customer_Id, Name, Address, Email FROM Phone_Customer WHERE Username = '$_SESSION[usern]' && Password = '$_SESSION[passw]' ");
					
					if($result == false)
					{
						echo "Autentication is failed!!!";
						echo "Username or Password entered is incorect!!!";
						echo "Or your account does not exist.";
						echo "Please try again or go to Registration.";
					}
					while($row = mysqli_fetch_array($result))
					{
						$id      = stripslashes($row[0]);
						$name    = trim($row[1]);
						$address = trim($row[2]);
						$email   = stripslashes($row[3]);
					}
						echo "<div class ='main'><h2> Hello  ".$name. "!<br></br></h2>";
						echo "<h2 style='color:blue;'>Your Personal Details:<br></br></h2>";
						echo "<tr>";
						echo "<td>User Id: </td> ";
						echo "<td>".$id."</td><br></br> ";
						echo "</tr>";
						echo "<tr>";
						echo "<td>Name:     </td> ";
						echo "<td>".$name."</td><br></br> ";
						echo "</tr>";
						echo "<tr>";
						echo "<td>Address:  </td> ";
						echo "<td>".$address."</td><br></br> ";
						echo "</tr>";
						echo "<tr>";
						echo "<td>Email:    </td> ";
						echo "<td>".$email."</td><br></br> ";
						echo "</tr>";
						echo "<tr><br></br>";
						echo "<td><a  href='myphone.html' ><input class='button2' style = 'width: 200px;' type='submit' name='Submit' value='My Account'/></a></td> ";
						echo "</tr>";
						echo "<br>";	
				}
				else
				{
					echo "The Session variables not set";
				}
				
				mysqli_close($con);
			?>
       		</div>
		</div>
	</body>	
</html>