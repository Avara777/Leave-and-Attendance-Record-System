<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
	<link rel="stylesheet" href="http://localhost/Leave and Attendance Record System/myCss.css"></link>
	<title>Time In Or Time Out - Leave and Attendance Record System</title>
</head>
<body  align="center">
	<h1 >Time In Or Time Out - Leave and Attendance Record System</h1>
<?php
	echo "<br><br>";
	$serverName = "localhost";
	$userName = "root";
	$dbPswrd = "";
	$dbName = "Leave and Attendance Record System";
	$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error);	//connection
				
			$id = ($_SESSION['ID']);
			// Employee input taken
			
			$query = "SELECT TimeIn, TimeOut FROM  Employee WHERE Id='$id'";
			$result = ($conn->query($query));
			if($result->num_rows > 0)
			{
				while($row = ($result->fetch_assoc()))
				{
					$OLDTIN=( $row['TimeIn']);
					$OLDTOUT=( $row['TimeOut']);
				}	
			}
			// Getting old timein/ timeout of Employee
			
			if(isset($_POST['TimeIn']))
			{
				$TIN = $_POST['TimeIn'];
				// Gettin time in value 
				if(( $OLDTIN == NULL) && ($TIN=='TimeIn'))
			{	
				date_default_timezone_set('Asia/Karachi');
				$dateTime;
				$dateTime= (date('y/m/d h:i:sa', time()));
				$query = "UPDATE Employee SET TimeIn='$dateTime' WHERE Id='$id'";
				echo "<h2>Time In Stored</h2><br>";		
			}
			else if(( $OLDTIN != NULL) && ($TIN=='TimeIn'))
			{
				echo "<h2>Log in Time already stored, Press Time out button when done <br></h2>";
			}
				
			}
			
			if(isset($_POST['TimeOut']))
			{
				$TOUT = $_POST['TimeOut'];
				if(( $OLDTOUT == NULL) && ($TOUT=='TimeOut'))
			{	
				date_default_timezone_set('Asia/Karachi');
				$dateTime;
				$dateTime= (date('y/m/d h:i:sa', time()));
				$query = "UPDATE Employee SET TimeOut='$dateTime' WHERE Id='$id'";
				echo "<h2>Time Out Stored</h2><br>";		
			}
			else if(( $OLDTOUT != NULL) && ($TOUT=='TimeOut'))
			{
				echo "<h2>Log out Time already stored, Press Time in button when starting <br></h2>";
			}
				
			}
			($conn->query($query));				
?>
		</p>
	</form>
</body>
</html>