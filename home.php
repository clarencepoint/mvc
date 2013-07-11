<?php
//if no user id you will go to index.php
session_start();

date_default_timezone_set("Asia/Manila");

mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db ('mvc') or die(mysql_error());

if (!isset($_SESSION['USERID'])){
	header('location:index.php');
}

echo "You are login.";

//Destroy the session and go back to index.php

if (isset($_POST['logout'])){

	$time = date("Y-m-d H:i:s");
	$id = $_SESSION['USERID'];

	$query = "UPDATE tblLogbook SET Logout='$time' WHERE UserID=$id AND Logout IS NULL";
	$result = mysql_query($query);

	if(!$result)
		echo mysql_error(); 
	session_destroy();
	header('location:index.php');

}
?>

<form action='#' method='Post'>
	<input type='submit' name='logout' value='Logout'>
</form>


<?php
//The admin only can view logbook
$id=$_GET['id'];

if ($id == 1){
	echo "<a href=\"logbook.php\">View logbook</a>";
}
			
?>



<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<center>
			<font face="Times New Roman" size="+1" color="#86F803">
			<h1 class="Title">Welcome to the New World</h1>
			</font>	
		</center>
		<div align="center">
	</body>
</html>