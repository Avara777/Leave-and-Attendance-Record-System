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
<body style ="background-color:Gainsboro;">
	<h1 align="center">View Total Record Of Leave Of The Month Or Year Webpage - Leave and Attendance Record System</h1>
	<?php
	echo "<br><br>";	
	$serverName = "localhost";
	$userName = "root";
	$dbPswrd = "";
	$dbName = "Leave and Attendance Record System";
	$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error);
	//connection				
	$id = ($_SESSION['ID']);
	
	$query="SELECT TotalRecordOfAttendancePerMonth, TotalRecordOfAttendancePerYear, TotalRecordOfLeavePerMonth,
	TotalRecordOfLeavePerYear FROM Employee WHERE Id=$id";
					
	$result = ($conn->query($query));
	if ($result->num_rows > 0)
	{ 
		while($row = ($result->fetch_assoc()))
		{
			$APM =	 $row['TotalRecordOfAttendancePerMonth'];
			 $APY =	 $row['TotalRecordOfAttendancePerYear'];
			 $LPM =	 $row['TotalRecordOfLeavePerMonth'];
			 $LPY =	 $row['TotalRecordOfLeavePerYear'];
		}
	}
	echo "
	<p align='center'>
	<table align='center'>
	<tr>
	<th><h2> Total Record Of Attendance Per Month: </h2>
	</th>
	<td><h2> $APM</h2>
	</td>	
	</tr>
	<tr>
	<th><h2>Total Record Of Attendance Per Year: </h2>
	</th>
	<td><h2>$APY</h2>
	</td>
	</tr>
	
	<tr>
	<th><h2>Total Record Of Leave Per Month: </h2>
	</th>
	<td><h2>$LPM</h2>
	</td>
	</tr>
	<tr>
	<th><h2>Total Record Of Leave Per Year: </h2>
	</th>
	<td><h2>$LPY</h2>
	</td>
	</tr>
	</table>
	</form>
	</p>	
	</h3><br>";
	?>
</body>
</html>