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
				
				$result = mysqli_query($con,"SELECT type_of_service, unit_cost, unit_size, unit_type FROM price_list");
				
				echo "<div align = 'center'><h1 ALIGN = 'CENTER'>Services Provided</h1>";
				echo "<table border = '0' ALIGN = 'CENTER' CELLSPACING = '20'>
				<tr>
				<th>Type Of Usage</th>
				<th>Cost Per Unit</th>
				<th>Size Per Unit</th>
				<th>Type Of Unit</th>
				</tr>";
				
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>".$row['type_of_service']."</td>";
					echo "<td>".$row['unit_cost']."</td>";
					echo "<td>".$row['unit_size']."</td>";
					echo "<td>".$row['unit_type']."</td>";
					echo "</tr>";
					echo "<br>";
				}
				
				mysqli_close($con);
			?>
			</div>
		</div>
	</body>	
</html>