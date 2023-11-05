<?php
	session_start();
?>
<!DOCTYPE html>
<html>
   <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
	<link rel="stylesheet" href="http://localhost/Leave and Attendance Record System/myCss.css"></link>
	<title>Delete Employee - Leave and Attendance Record System</title>
</head>
<body  align="center">
   <h1>Delete Employee - Leave and Attendance Record System</h1>
  
   <?php error_reporting (E_ALL ^ E_NOTICE); ?>
      <?php
	  echo "<br><br>";
			$serverName = "localhost";
			$userName = "root";
			$dbPswrd = "";
			$dbName = "Leave and Attendance Record System";
			$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error);
			//connection established
			$id = ($_POST['EMPID']);
			//del emp
			$query = "DELETE FROM Employee  WHERE Id='$id'";
			if($conn->query($query))
			{
				echo "<h2>Employee with id :$id  deleted</h2><br>";	
			}
			else
			{
				echo "<h2>ERROR: Employee with id :$id could not be deleted</h2><br> $conn_error";	
			}
			?>
   </body>
</html> 
</body>
</html>