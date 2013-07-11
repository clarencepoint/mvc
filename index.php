
<?php
//Login using username and pasword not in url
	session_start();

	date_default_timezone_set("Asia/Manila");

//connect to database root server
	mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db ('mvc') or die(mysql_error());

//Response to click Login User Date and Time
	if (isset($_POST['login'])) { 

		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$query = "Select * FROM tblUsers WHERE UserName = '$username' AND Password = '$password'";
		$result = mysql_query($query);

//Set for Mysql=date,userid login to logbook with admin user
		if($result){
			$num_rows = mysql_num_rows($result);
			$row = mysql_fetch_array($result);
			$id = $row['ID']; 
			$time = date("Y-m-d H:i:s");
			$update = "UPDATE tbllogbook SET Login='$time' WHERE ID='$id'";
			mysql_query($update);

			$query = "INSERT INTO tblLogbook VALUES(NULL,$id,'$time',NULL)";
			$result = mysql_query($query);
			if(!$result)
				echo mysql_error();

			$_SESSION['USERID'] = $row['ID'];
			
			header('location:home.php?id='.$id);

			}
		}
			//if ($num_rows > 0){
				//$row = mysql_fetch_array($result);
				//$_SESSION['USERID'] = $row['ID'];
				//$id = $_SESSION['USERID'];
				//$date = date("Y-m-d H:i:s");

//Insert to Table Logbook
				
					
			//} 	
	
?>
<!--Text username and password-->
<html>


	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Login/Logout</title>
	</head>


	<body>
		<center>
			<font face="Times New Roman" size="+1" color="#86F803">
			<h1 class="Title">PHP Login/Logout Using OOP & MVC</h1>
			</font>	
		</center>
		<form method='Post' action='#' class="search"><p>
			<b class="text droidtext">Username:</b> <input type='text' name='username' value='' style="color: #ffffff; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72a4e2;" size="10" maxlength="30"><p>
			<b class="text">Password:</b> <input type='password' name='password' value='' style="color: #ffffff; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72a4e2;" size="10" maxlength="30"><p>
			<input type='submit' name='login' value='login'>
		</form>
		
			
	</body>
</html>