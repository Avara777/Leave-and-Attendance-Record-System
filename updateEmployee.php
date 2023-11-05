<?php
	session_start();
?>
<!DOCTYPE html>
<html>
 <head>
 	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
	<link rel="stylesheet" href="http://localhost/Leave and Attendance Record System/myCss.css"></link>
	<title>Update Employee - Leave and Attendance Record System</title>
  </head> 
<body  align="center">
	<h1>Update Employee - Leave and Attendance Record System</h1>   
   <?php error_reporting (E_ALL ^ E_NOTICE); ?>
      <?php
			$serverName = "localhost";
			$userName = "root";
			$dbPswrd = "";
			$dbName = "Leave and Attendance Record System";
			$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error);
			//connection			
			if(isset($_POST['ID']))
			{
				$id = ($_POST['ID']);
				$id=strval($id);
				echo "<h2>Employee id entered: ".$id."</h2>";
			}
			if(isset($_POST['PASS']))
			{
				$password = ($_POST['PASS']);
				echo "<h2>New employee password entered is: ".$password."</h2>";
			$query = "UPDATE Employee SET Password='$password' WHERE Id = $id"; 
				($conn->query($query));
				echo "<h2>Password of Employee with id :$id updated</h2><br>";	
			}
			if(isset($_POST['EMAIL']))
			{
				$email = strval(($_POST['EMAIL']));
				$email = (htmlspecialchars($email));
				echo "<h2>New Employee email is: ".$email."</h2>";
				
				$query = "UPDATE Employee SET Email='$email' WHERE Id=$id";
				($conn->query($query));
			echo "<h2>Email of Employee with id :$id updated</h2><br>";	
			}
			if(isset($_POST['NAME']))
			{
				$name = ($_POST['NAME']);
				echo "<h2>New Employee name is: ".$name."</h2>";
					
				$query = "UPDATE Employee SET Name='$name' WHERE Id=$id";
				($conn->query($query));
				echo "<h2>Name of Employee with id :$id updated<br><br>";	
			}
			if(isset($_POST['PHONE']))
			{
				$phone = ($_POST['PHONE']);
				echo "<h2>New Employee phone number is: ".$phone."</h2>";
				
				$query = "UPDATE Employee SET PhoneNumber='$phone' WHERE Id=$id";
				($conn->query($query));
				echo "<h2>Phone number of Employee with id :$id updated";	
			}
			?>
   </body>
</html> 
</body>
</html>