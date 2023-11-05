<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
	<link rel="stylesheet" href="http://localhost/Leave and Attendance Record System/myCss.css"></link>
	<title>accept / Reject Leave Requests - Leave and Attendance Record System</title>
</head>
<body  align="center">
	<h1 >Accept / Reject Leave Requests - Leave and Attendance Record System</h1>
	<?php
	$serverName = "localhost";
	$userName = "root";
	$dbPswrd = "";
	$dbName = "Leave and Attendance Record System";
	$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error);	//connection
				
	$query="SELECT LeaveRequested, Id, Name, LeaveReason, LeaveType, LeaveDescription, FromDate, ToDate FROM Employee WHERE LeaveRequested='1'";
	$result = ($conn->query($query));
	$idCount=0;
	if($result->num_rows>0)
	{
		while($row=($result->fetch_assoc()))
		{
			?>
			<form action="http://localhost/Leave and Attendance Record System/acceptRejectLeaveRequests2.php" method="post"> 
			<?php 
			echo "<p><b>Employee id: ".$row['Id']."<br>";
			$id = $row['Id'];
			echo "<b>Employee name: ".$row['Name']."<br>";
			echo "<b>Type of leave: ".$row['LeaveType']."<br>";
			echo "<b>Leave description: ".$row['LeaveDescription']."<br>";
			echo "<b>Reason of leave: ".$row['LeaveReason']."<br>";
			echo "<b>Leave From Date: ".$row['FromDate']."<br>";
			echo "<b>Leave To Date: ".$row['ToDate']."</b><br>"; 
			$idCount++;
			echo $idCount."<br>";
			?>
			<input type="hidden" value="" name="ID" id="id">
			<script>
				var idJS='<?php echo $id;?>';
				var idCount='<?php echo $idCount;?>';
				document.getElementById("id").id=idCount;
				document.getElementById(idCount).value=idJS;
				var id
			</script>
			<button type="submit"  formaction="http://localhost/Leave and Attendance Record System/acceptRejectLeaveRequests2.php"
			value="Accept" name="accBut">Accept Leave request</button>
			<button type="submit" name="rejBut"  formaction="http://localhost/Leave and Attendance Record System/acceptRejectLeaveRequests2.php" 
			value="Reject">Reject Leave request</button>
			</form>	
			<?php echo "</p><br>"; 
		}
	}
	else
	{
		 echo "<br><br>
		 <h2>No employee requests submitted yet<br>"; 
	}?>
</body>
</html>