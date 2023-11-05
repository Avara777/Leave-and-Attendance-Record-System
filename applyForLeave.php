<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
	<link rel="stylesheet" href="myCss.css"></link>
	<title>Leave Application - Leave and Attendance Record System</title>
</head>
<body >
	<h1 align="center">Leave Application - Leave and Attendance Record System</h1>
	<?php
	$serverName = "localhost";
	$userName = "root";
	$dbPswrd = "";
	$dbName = "Leave and Attendance Record System";
	$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error); //connection
	
	$id = $_SESSION['ID'];
	$query="SELECT AvailedCasualLeave, AvailedCompensatoryLeave, AvailedEarnedLeave FROM Employee WHERE id=$id";
	$result = ($conn->query($query));
	if ($result->num_rows > 0)
	{ 
		while($row = ($result->fetch_assoc()))
		{	
			$CasualLeave =	 $row['AvailedCasualLeave'];
			$CompensatoryLeave =  $row['AvailedCompensatoryLeave'];
			$EarnedLeave =  $row['AvailedEarnedLeave'];
		}
	}
	$CasLeaBalance =(15- $CasualLeave);
	$ComLeaBalance=(10 - $CompensatoryLeave);
	$EarLeaBalance=(40 - $EarnedLeave);
	?>		
	<p  padding-top="10px" padding-left="10px" padding-right="10px" padding-bottom="10px" style="color:black">
	<table align="center">
		<form method="post" action="http://localhost/Leave and Attendance Record System/applyForLeave2.php">
		<tr>
		<td >
		</td>
		<tr>			
			<td>			</td>
			<td>Total Leaves			</td>
			<td>Availed Leaves			</td>
			<td>Balance			</td>
		</tr>
		<tr>
			<td>Casual Leave		</td>
			<td>15			</td>
			<td><?php echo $CasualLeave?>			</td>
			<td><?php echo $CasLeaBalance?>			</td>
		</tr>
		<tr>
			<td>Compensatory Leaves</td>
			<td>10		</td>
			<td><?php echo $CompensatoryLeave?>			</td>
			<td><?php echo $ComLeaBalance?></td>
		</tr>
		<tr>
			<td>Earned Leave	</td>
			<td>40			</td>
			<td><?php echo $EarnedLeave?>	</td>
			<td><?php echo $EarLeaBalance?></td>
		</tr>
		
		<td>
		</td>
		</tr>
		</table>
		<table align="center">
		
		<tr>
		<td>
	<p align="center"><label for="">Type Of Leave</label> 
		</td>
		<td>
	<select size="1" name="_LeaveType" >
		<option value="Full"  selected>Full</option>
		<option value="Partial" >Partial</option>
	</select><br>
		</td>
		<td>
		</td>
		</tr>
		
		<tr>
		<td>
	Description Of Leave
		</td>
		<td>
	<select size="1" name="_LeaveDescription" >
		<option value="Casual"  selected>Casual</option>
		<option value="Compensatory"  >Compensatory</option>
		<option value="Earned"  >Earned</option>
	</select><br>
		</td>
		<td>
		</td>
		</tr>
		
		<tr>
		<td>
		Reason Of Leave
		</td>
		<td>
		<textarea name="ROL" cols="30" rows="5"></textarea>
		</td>
		<td>
		</td>
		</tr>

		<tr>
		<td>
		From Date
		</td>
		<td>
		<input type="date" id="date" name="FromDate"><br>
		</td>
		<td>
		</td>
		</tr>

		<tr>
		<td>
		To Date 
		</td>
		<td>
		<input type="date" id="date" name="ToDate"><br> 
		</td>
		<td>
		</td>
		</tr>

		<tr>
		<td>
		Upload Image
		</td>
		<td>
		<input type="file" name="uploadFile" enctype="multipart/form-data" ></input><br>
		</td>
		<td>
		</td>
		</tr>

		<tr>
		<td>
		</td>
		<td>
		<input type="submit" >
		</td>
		<td>
		</td>
		</tr>
	<br>
	</p>
	</table></p>
	</form>
</body>
</html>