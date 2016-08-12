<!DOCTYPE html>
<html>
<head>
<head>
    <link rel="stylesheet" href="webstyles.css">
	<meta charset="utf-8" />
	<title>My Assignment/UpdateForm </title>
	<style>
	    table
		{
			border: 0px;
			margin-bottom:200px;
			margin-top: 0px;
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
				
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL; ".mysql_connect_error();
				}
				
				$result = mysqli_query($con,"SELECT Store_Id, Store_Address, Phone_Number FROM Stores");
				
				echo "<div align = 'center'><br></br><h1 ALIGN = 'CENTER' COLOUR = 'gray'>List Of Stores</h1>";
				echo "<table border = '0' ALIGN = 'CENTER' CELLSPACING = '20'>
				<tr>
				<th>Store Id</th>
				<th>Store Address</th>
				<th>Phone Number</th>
				</tr>";
				
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>".$row['Store_Id'].   "</td>";
					echo "<td>".$row['Store_Address'].    "</td>";
					echo "<td>".$row['Phone_Number'].  "</td>";
					echo "</tr>";
					echo "<br>";
				}
				
				mysqli_close($con);
			?>
			</div>
		</div>
	</body>	
</html>