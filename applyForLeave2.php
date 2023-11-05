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
<body style ="background-color:Gainsboro;" align="center">
	<h1 align="center">Leave Application - Leave and Attendance Record System</h1>
	<?php
	
	$serverName = "localhost";
	$userName = "root";
	$dbPswrd = "";
	$dbName = "Leave and Attendance Record System";
	$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error); 
	//connection
	$id = $_SESSION['ID'];
		
	$query="SELECT LeaveRequested FROM Employee WHERE id=$id";
	$result=($conn->query($query));
	if($result->num_rows>0)
	{
		while($row=($result->fetch_assoc()))
		{
			if(($row['LeaveRequested'])===0)
			{
				$query="UPDATE LeaveRequested='1', LeaveStatus='Pending' WHERE id=$id";
				$conn->query($query);
			}
		}
					
				if(isset($_POST['_LeaveType']))
				{
					$LeaveType=$_POST['_LeaveType'];
					echo "<h2>Leave Type is ".$LeaveType."</h2><br>";	
				}
				if(isset($_POST['_LeaveDescription']))
				{
					$LeaveDescription = $_POST['_LeaveDescription'];
					echo "<h2>Leave Description is ".$LeaveDescription."</h2><br>";
				}
				if(isset($_POST['ROL']))
				{
				$ROL=$_POST['ROL'];
				echo "<h2>Reason of leave is ".$ROL."</h2><br>";
				}	
				if($_POST['FromDate'])
				{
					$FromDate=$_POST['FromDate'];
					echo "<h2> From date is ".$FromDate."</h2><br>";
				}
				if($_POST['ToDate'])
				{
					$ToDate=$_POST['ToDate'];
					echo "<h2>To date is ".$ToDate."</h2><br>";
				}
				if($_POST['uploadFile'])
				{
					$uploadFile=$_POST['uploadFile'];
					echo "<h2>Image is ".$uploadFile."</h2><br>";
				}
				if($_POST['_LeaveType'])
				{
					$leavetype=$_POST['_LeaveType'];
					if($leavetype==='Partial')
					{
						if($LeaveDescription==='Casual')
						{
							$MinCasualLeave=0.5;
							$query="UPDATE Employee SET AvailedCasualLeave='$MinCasualLeave' WHERE id=$id";
							$conn->query($query);
						}
						if($LeaveDescription==='Compensatory')
						{
							$MinCompensatoryLeave=0.5;
							$query="UPDATE Employee SET AvailedCompensatoryLeave='$MinCompensatoryLeave' WHERE id=$id";
							$conn->query($query);
						}
						if($LeaveDescription==='Earned')
						{
							$MinEarnedLeave=0.5;
							$query="UPDATE Employee SET AvailedEarnedLeave='$MinEarnedLeave' WHERE id=$id";
							$conn->query($query);
						}
					}
					else if($leavetype==='Full')
					{
						if($LeaveDescription==='Casual')
						{
							$MinCasualLeave=1;
							$query="UPDATE Employee SET AvailedCasualLeave='$MinCasualLeave' WHERE id=$id";
							$conn->query($query);
						}
						if($LeaveDescription==='Compensatory')
						{
							$MinCompensatoryLeave=1;
							$query="UPDATE Employee SET AvailedCompensatoryLeave='$MinCompensatoryLeave' WHERE id=$id";
							$conn->query($query);
						}
						if($LeaveDescription==='Earned')
						{
							$MinEarnedLeave=1;
							$query="UPDATE Employee SET AvailedEarnedLeave='$MinEarnedLeave' WHERE id=$id";
							$conn->query($query);
						}
					}
				}
			}
				
			$query="UPDATE Employee SET LeaveType='$LeaveType' , LeaveDescription='$LeaveDescription' , LeaveReason='$ROL' ,
			FromDate='$FromDate' ,ToDate='$ToDate', LeaveRequested='1', LeaveStatus='Pending' WHERE id=$id";
			if($conn->query($query))
			{
				echo "<br><h2>Leave request sent </h2><br>";
			}	
			else
			{
				echo "error <br>";
			}	
			if($conn->query($query))
			{
				echo "<br><h2>Leave request sent </h2><br>";
			}					
			else
			{
				echo "<h2><br><br>Leave already requested, Please wait for it's decision before requesting another leave</h2><br>";
			}			
	?>
</body>
</html>