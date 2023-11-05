<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>	
	<link rel="stylesheet" href="http://localhost/Leave and Attendance Record System/myCss.css"></link>
	<title>Add total number of leave per year - Leave and Attendance Record System</title>
</head>
<body align="center">
	<h1 >Add total number of leave per year - Leave and Attendance Record System</h1>
	<?php
	echo "<br><br>";
	$serverName = "localhost";
	$userName = "root";
	$dbPswrd = "";
	$dbName = "Leave and Attendance Record System";
	$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error);
	
	$query = "SELECT LeaveRecord FROM Employee";
	
	$result = ($conn->query($query));
	if ($result->num_rows > 0)
	{ // output data of each row
		$sum = 0;
		while($row = ($result->fetch_assoc()))
		{
			$sum =($sum + ($row["LeaveRecord"]));
		}
	}	
	else
	{
		echo "<h2>0 results </h2><br>";
	}
	?>
	<h2 align='center'>
	<?php
	echo "The total number of leave per year is ".$sum."<br> </h2>";
	?>
</body>
</html>