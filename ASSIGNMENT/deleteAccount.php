<?php
	session_start();
	$con = mysqli_connect("localhost","root","","natadatabase");
	
	$usern = $_SESSION['usern'];
	$passw = $_SESSION['passw'];
	$sql = true;
	
	if(isset($_SESSION['usern'])&& isset($_SESSION['passw']))
	{
		
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL; ".mysql_connect_error();
		}
						
		$sql = "DELETE FROM Phone_Customer WHERE Username = '$usern'";
				
		if(!mysqli_query($con,$sql))
		{
			echo "<script language='javascript'>";
			echo "alert('Your Account is not deleted!!! You Can Try Again.')";
			echo "</script>";
			header("refresh:2; url=logout.php" );
			//die('Your Account is not deleted!!! You Can Try Again');
		}
		else
		{
			echo "<script language='javascript'>";
			echo "alert('Your Account was succesfully deleted.')";
			echo "</script>";
			header("refresh:1; url=logout.php" );
		}
	}
	else
	{
		echo "The Session variables not set";
	}	
	mysqli_close($con);
?>


 
