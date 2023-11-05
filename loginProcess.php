<?php
	session_start();
?>
<!DOCTYPE html>
<html>
   <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
	<link rel="stylesheet" href="http://localhost/Leave and Attendance Record System/myCss.css"></link>
	<title>Main Interface - Leave and Attendance Record System</title>
</head>
<body  align="center">
   <?php error_reporting (E_ALL ^ E_NOTICE); ?>
		<?php
		echo "<br><br>";
		$serverName = "localhost";	//connection to Db
		$userName = "root";
		$dbPswrd = "";
		$dbName = "Leave and Attendance Record System";
		$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error);	//connection to Db 
				
		if(($_POST['ID']))	//storing user id in php variable
		{
			$id = $_POST['ID'];
			$_SESSION['ID'] = $id;
		}
		if(($_POST['PASSWORD']))	//storing user password in php variable
		{
			$password = $_POST['PASSWORD'];
			$_SESSION['PASSWORD'] = $password;
		}
		global $empid;
		global $emppass;
			
			$query = "SELECT Id, Password FROM Employee WHERE Id='$id'";
			if($id !== 'XXX')
			{
				$result = ($conn->query($query));
				if ($result->num_rows > 0)
				{ 
					while($row = ($result->fetch_assoc()))
					{
						
						$empid =	 $row['Id'];
						$emppass =  $row['Password'];
					}
				}
				global $i;
				global $p;
				if(($id === $empid) and ($password === $emppass))
				{
					?><script>
					location.href = 'http://localhost/Leave and Attendance Record System/empMainPage.html';
					</script>
					<?php
				}
				else
				{
					echo "<h2>login id or password wrong for employee</h2><br>";
				}
			}			
			if($id == 'XXX')
			{
			$query = "SELECT Id, Password FROM Administrator WHERE Id='$id'";
			
			global $p;
			$result = ($conn->query($query));
			if ($result->num_rows > 0)
						{ 
							while($row = ($result->fetch_assoc()))
							{
							 $i=	 $row['Id'];
							 $p=  $row['Password'];
							}
						}
			if(($i == $id) and ($p === $password))
			{
				
				?><script>
					location.href = 'http://localhost/Leave and Attendance Record System/adminMainPage.html';
					</script>
					<?php					
			}
			else
			{
				echo "<h2>login id or password not correct for administrator</h2><br>";
			}
			}
	  ?>
   </body>
</html>