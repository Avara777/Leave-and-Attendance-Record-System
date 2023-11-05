<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
	<link rel="stylesheet" href="http://localhost/Leave and Attendance Record System/myCss.css"></link>
<title>Update Personal Profile - Leave and Attendance Record System</title>
</head>
<body align="center">
	<h1 >Update Personal Profile - Leave and Attendance Record System</h1>
	<?php
	echo "<br><br>";
			$serverName = "localhost";
			$userName = "root";
			$dbPswrd = "";
			$dbName = "Leave and Attendance Record System";
			$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error); //connection
			
			$id = ($_SESSION['ID']);
			if(isset($_POST['NEWPASSWORD']))
			{
			$newpswrd	=	($_POST['NEWPASSWORD']);
			}
			
			if(isset($_POST['PHNO']))
			{
				$phno = ($_POST['PHNO']);
			}
			
			if(isset($_POST['EMAIL']))
			{
			$email = $_POST['EMAIL'];			
			}
			
	$query = "UPDATE  Employee SET Password='$newpswrd', PhoneNumber='$phno', Email='$email' WHERE Id='$id'";
	if($conn->query($query))
	{
		echo"<h2 align='center'>";echo "Record updated successfully<br></h2>";
	}
	else
	{
		echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
	}
?>
</body>
</html>