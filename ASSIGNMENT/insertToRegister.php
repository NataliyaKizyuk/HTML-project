<?php
	session_start();	
	$con = mysqli_connect("localhost","root","","natadatabase");
	$id = mysqli_insert_id($con);
	
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
	
	$sql = "INSERT INTO phone_customer(Customer_Id, Name, Address, Email, Username, Password)
	VALUES 
	('$id','$_POST[Name]', '$_POST[Address]','$_POST[Email]','$_POST[Username]','$_POST[Password]')";
	
	if(!mysqli_query($con,$sql))
	{
		echo "<script language='javascript'>";
		echo "alert('Error:'.mysqli_error().' Try Again.')";
		echo "</script>";
		header("refresh:2; url=register.html" );
	}
	else
	{
		echo "<script language='javascript'>";
		echo "alert('Your registration is successful!!! '<br>'Your personal details was added to your account. ')";
		echo "</script>";
		header("refresh:2; url=login.php" );
	}
	
	mysqli_close($con);
?>