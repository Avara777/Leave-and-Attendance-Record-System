<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
	<link rel="stylesheet" href="http://localhost/Leave and Attendance Record System/myCss.css"></link>
	<title>Accept / Reject Leave Requests - Leave and Attendance Record System</title>
</head>
<body  align="center">
	<h1 >Accept / Reject Leave Requests - Leave and Attendance Record System</h1>
	<?php
	echo "<br><br>";
	$serverName = "localhost";
	$userName = "root";
	$dbPswrd = "";
	$dbName = "Leave and Attendance Record System";
	$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error);	//connection
	
	if(isset($_POST['ID']))	
	{
		echo "<h2>The Employee id is: ".$_POST['ID']."</h2><br>";
		$id=$_POST['ID'];
	}
	if(isset($_POST['accBut']))
	{
		$accBut=$_POST['accBut'];
	}
	if(isset($_POST['rejBut']))
	{
		$rejBut=$_POST['rejBut'];
	}	
	//Admin decision and emp id taken
	
	$query2="SELECT TotalCasualLeave, TotalCompensatoryLeave, TotalEarnedLeave FROM Data";
		$result=($conn->query($query2));
		if($result->num_rows>0)
		{
			while($row=($result->fetch_assoc()))
			{
				$TotCasLeave=$row['TotalCasualLeave'];
				$TotComLeave=$row['TotalCompensatoryLeave'];
				$TotEarLeave=$row['TotalEarnedLeave'];
			}
		}	
		//Getting Total leaves
		
		$query2="SELECT  LeaveRequested, LeaveDescription, AvailedCasualLeave, AvailedCompensatoryLeave, AvailedEarnedLeave FROM Employee WHERE Id='$id'";
		$result=($conn->query($query2));
		if($result->num_rows>0)
		{
			while($row=($result->fetch_assoc()))
			{
				$LeaveDescription=$row['LeaveDescription'];
				$CasLeave=$row['AvailedCasualLeave'];
				$ComLeave=$row['AvailedCompensatoryLeave'];
				$EarLeave=$row['AvailedEarnedLeave'];
				$LeaveRequested=$row['LeaveRequested'];
			}
		}
		// Getting Leave description
	if($LeaveRequested == 1)
	{
		if(isset($_POST['accBut']))	//IF ACCEPT 
		{
			if($LeaveDescription == 'Casual')
			{
				if($CasLeave <= $TotCasLeave )
				{	
					$CasLeave++;
					$query="UPDATE Employee SET LeaveStatus='Accepted', LeaveRequested='0', AvailedCasualLeave='$CasLeave' WHERE Id='$id'";
				}
				else
				{
					echo "<h2>No more Casual leaves available</h2><br>";
				}
			}
			if($LeaveDescription == 'Compensatory')
			{
				if($ComLeave <= $TotComLeave )
				{	
					$ComLeave++;
					$query="UPDATE Employee SET LeaveStatus='Accepted', LeaveRequested='0', AvailedCompensatoryLeave='$ComLeave' WHERE Id='$id'";
				}
				else
				{
					echo "<h2>No more Compensatory leaves available</h2><br>";
				}
			}
			if($LeaveDescription == 'Earned')
			{
				if($EarLeave <= $TotEarLeave )
				{	
					$EarLeave++;
					$query="UPDATE Employee SET LeaveStatus='Accepted', LeaveRequested='0', AvailedEarnedLeave='$EarLeave' WHERE Id='$id'";
				}
				else
				{
					echo "<h2>No more Earned leaves available</h2><br>";
				}
			}
			if($conn->query($query))
			{
				echo "<h2>Desicion saved<br> Leave Accepted for employee id: $id <br>
				Leave status updated<br></h2>";
			}
			else
			{
				echo "error <br>";
			}
			//executing query(Leave status ,Leaverequested, availedleaves updated )
		
			$query="UPDATE Employee SET LeaveType='None', LeaveDescription='None', LeaveReason='None', FromDate='NULL', ToDate='NULL'  WHERE Id='$id'";
			if ($conn->query($query))
			{
				echo "<h2>LeaveType, LeaveDescription, LeaveReason, FromDate, ToDate for employee $id updated</h2><br> <br>";
			}
			else
			{
				echo "error <br>";
			}
			//	related leave columns Nulled
		}
	
		if(isset($_POST['rejBut']))	//IF REJECT 
		{
			if($LeaveDescription == 'Casual')
			{			
				$query="UPDATE Employee SET LeaveStatus='Rejected', LeaveRequested='0' WHERE Id='$id'";
			}
			if($LeaveDescription == 'Compensatory')
			{	
				$query="UPDATE Employee SET LeaveStatus='Rejected', LeaveRequested='0' WHERE Id='$id'";
			}
			if($LeaveDescription == 'Earned')
			{		
				$query="UPDATE Employee SET LeaveStatus='Rejected', LeaveRequested='0' WHERE Id='$id'";
			}
	
			if ($conn->query($query))
			{
				echo "<h2>Desicion saved<br> Leave Rejected for employee id: $id <br>Leave status updated</h2><br>";
			}
			else
			{
				echo "error <br>";
			}
			//executing query(Leave status ,Leaverequested updated )
		
			$query="UPDATE Employee SET LeaveType='None', LeaveDescription='None', LeaveReason='None', FromDate='NULL', ToDate='NULL'  WHERE Id='$id'";
			if($conn->query($query))
			{
				echo "<h2>LeaveType, LeaveDescription, LeaveReason, FromDate, ToDate for employee $id updated</h2><br> <br>";
			}
			else
			{
				echo "error <br>";
			}
			//	related leave columns Nulled
		
		}
	}
	else
	{
		echo "<h2>error No Leave Requested <br></h2>";
	}?>
</body>
</html>