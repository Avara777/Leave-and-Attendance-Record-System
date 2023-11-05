<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
	<link rel="stylesheet" href="http://localhost/Leave and Attendance Record System/myCss.css"></link>
	<title>View attendance/leave record of an employee - Leave and Attendance Record System</title>
</head>
<body  align="center">
<h1>View attendance/leave record of an employee - Leave and Attendance Record System
</h1>
<?php
	echo "<br><br>";
			$serverName = "localhost";
			$userName = "root";
			$dbPswrd = "";
			$dbName = "Leave and Attendance Record System";
			$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error);	//connection
			
			if(isset($_POST['ID']))
			{
			$id = ($_POST['ID']);
			}
			
			$query = "SELECT LeaveRecord, AttendanceRecord  FROM Employee WHERE Id=$id";
					
							global $LEVREC;
							global $ATTREC;
			$result = ($conn->query($query));
			if ($result->num_rows > 0)
						{ 
							while($row = ($result->fetch_assoc()))
							{
							 $LEVREC =	 $row['LeaveRecord'];
							 $ATTREC =	 $row['AttendanceRecord'];
							}								
						}
			?>
			<p align='center'>
			<table align='center'>
			<tr>
			<th><h2> Leave Record Of Employee:
			</th>
			<td><h2> <?php echo $LEVREC."<br></h2>"; ?>
			</td>	
			</tr>
			<tr>
			<th><h2> Attendance Record Of Employee:
			</th>
			<td><h2> <?php echo $ATTREC."<br></h2>";?>
			</td>
			</tr>
			</table>
			</form>
			</p>
			</h3><br>
</body>
</html>