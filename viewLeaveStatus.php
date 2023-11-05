<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
	<link rel="stylesheet" href="http://localhost/Leave and Attendance Record System/myCss.css"></link>
	<title>View Leave Status - Leave and Attendance Record System</title>
</head>
<body align="center">
	<h1 >View Leave Status - Leave and Attendance Record System</h1>
	
	<?php
	echo "<br><br>";
	$serverName = "localhost";
			$userName = "root";
			$dbPswrd = "";
			$dbName = "Leave and Attendance Record System";
			$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error);	//connection successful
			
			$id = ($_SESSION['ID']);
			
			$query = "SELECT LeaveStatus FROM Employee WHERE Id=$id";
			
			$result = ($conn->query($query));
			if ($result->num_rows > 0)
						{ 
							while($row = ($result->fetch_assoc()))
							{
							 $empLS =	 $row['LeaveStatus'];
							}
						}
			echo "<h2 align ='center'> Your leave status is ".$empLS."</h2><br>";
	?>
</body>
</html>