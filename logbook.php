<?php
	mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db ('mvc') or die(mysql_error());
//Query for Login & Logout User
	$query = "SELECT tblLogbook.ID, tblLogbook.Login, tblLogbook.Logout, tblUsers.Username FROM tblUsers, tblLogbook 
	WHERE tblUsers.ID = tblLogbook.UserID ORDER BY tblLogbook.Login";
	$result = mysql_query($query); 

	//echo '<a href="' . $_SERVER["home.php"] . '">Back</a>';

	//echo '<form action="' . $_SERVER["REFERER"] . '" method="get">
	//<input type="submit" value="Back">
	//</form>'; 

?>

<?php
//Back Button
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo "<a href='home.php?id'><button>Back</button></a>"; 
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<!--"<a href="home.php?id">Back</a>" Back Button--> 
		<center>
			<font face="Times New Roman" size="+1" color="#86F803">
			<h1 class="Title">Time Records</h1>
			</font>	
		</center>
		<div align="center">
		<table border="4" cellpadding="2" cellspacing="2" width="50%">
		<tr><th>Username</th>
			<th>Login</th>
			<th>Logout</th>
		</tr>
		</div>

<?php if($result):
        while ($row = mysql_fetch_assoc($result))
        {
        	echo "<tr>";
        	echo "<td>".$row["Username"]."</td>";
        	echo "<td>".$row["Login"]."</td>";
        	echo "<td>".$row["Logout"]."</td>";
        	echo "</tr>";
        }
       endif;

      // header("Location: home.php");
	//exit;
?>
		</table>
	</body>
</html>