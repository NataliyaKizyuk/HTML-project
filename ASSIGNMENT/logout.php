<?php
	session_start();
	unset($_SESSION['valid']);
	unset($_SESSION['timeout']) ;
    unset($_SESSION["username"]);
    unset($_SESSION["password"]);
   
    echo 'You have logout';
    header('Refresh: 2; URL = login.php');
	session_destroy();
	header("Location: home.html");
?>