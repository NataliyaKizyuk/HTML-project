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
			border: 1px;
			border-color:gray;
			margin-bottom: 100px;
			margin-top: 0px;
			CELLSPACING:0;
			padding:0;
			position:relative;
			text-align: center;
		}
		
		td, th 
		{
		  border: 1px solid #000;
		  width: 200px;
		  height: 40px;
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
				session_start();
				$con = mysqli_connect("localhost","root","","natadatabase");
				
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL; ".mysql_connect_error();
				}
				
				$result = mysqli_query($con,"SELECT Phone_Name, Phone_Brand, Manufacturer, Phone_Storage,Phone_Cost, Account_Price FROM Phone_Description");
				
				echo "<div align = 'center'><h1 ALIGN = 'CENTER'>Phone Description</h1>";
				echo "<table >
				<tr>
				<th>Name</th>
				<th>Brand</th>
				<th>Manufacturer</th>
				<th>Storage</th>
				<th>Cost</th>
				<th>Account Price</th>
				</tr>";
				
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>".$row['Phone_Name']."</td> ";
					echo "<td>".$row['Phone_Brand']."</td> ";
					echo "<td>".$row['Manufacturer']."</td> ";
					echo "<td>".$row['Phone_Storage']."</td> ";
					echo "<td>".$row['Phone_Cost']."</td> ";
					echo "<td>".$row['Account_Price']."</td> ";
					echo "</tr>";
					echo "<br>";
				}
				echo "</div><br></br><br></br>";
				
				mysqli_close($con);
			?>
			</div>
	    </div>
	</body>	
</html>