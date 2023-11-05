<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
   
   <head>
   <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
	<link rel="stylesheet" href="http://localhost/Leave and Attendance Record System/myCss.css"></link>
    <title>Register New Employee - Leave and Attendance Record System</title>
   </head>
   
   <body align="center">
   <h1>Register New Employee - Leave and Attendance Record System</h1>
      <?php
			$serverName = "localhost";
			$userName = "root";
			$dbPswrd = "";
			$dbName = "Leave and Attendance Record System";
			$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error); 
			//Conndection established
			
			$query = "SELECT NumberOfEmployees FROM Data";
			$result = ($conn->query($query));
			if ($result->num_rows > 0)
			{ // output data of each row
				while($row = ($result->fetch_assoc()))
				{
					$noOfEmp = $row['NumberOfEmployees'];
				}
			}
			//Getting number of employees from data
			
			$noOfEmp2=0;
			$query = "SELECT Name FROM Employee";
			$result = ($conn->query($query));
			if ($result->num_rows > 0)
			{ 
				while($row = ($result->fetch_assoc()))
				{
					$noOfEmp2++;
				}
			}
			else
			{
				echo "<h2>0 number of employees in the employee table </h2> <br>";
			}
			echo "<h2>The number of employees were ".$noOfEmp2."</h2><br><br>";
			// Getting the number of employees from employee table
			
			$generatedEmpId=($noOfEmp2 + 1);
			//Emp id generated
			$sum = rand(0,9);
			for($count=1; $count < 10; $count++)
			{
				$temp = rand(0,9);
				$sum = ($sum . $temp); 
			}
			$generatedEmpPassword = $sum;
			//emp password generated
			if(isset($_POST['NAME']))
			{
				$name = ($_POST['NAME']);
			}
			if(isset($_POST['QUAL']))
			{
				$qual = ($_POST['QUAL']);
			}
			if(isset($_POST['PHNO']))
			{
				$phno= ($_POST['PHNO']);
			}
			if(isset ($_POST['DOB']))
			{
				$dob = ($_POST['DOB']);
			}
			if(isset($_POST['EXP']))
			{
				$exp = ($_POST['EXP']);
			}
			if(($_POST['EMAIL']))
			{
				$email = ($_POST['EMAIL']);
			}
			
			$query = "INSERT INTO Employee (Id, Name, DateOfBirth, Experience, Qualification, PhoneNumber, Email, Password)
			VALUES ('$generatedEmpId','$name', '$dob', '$exp', '$qual', '$phno', '$email', '$generatedEmpPassword')";
			if($conn->query($query))
			{
				echo "<h2>New record created successfully</h2><br><br>";
				echo "<h2>The generated employee id is ".$generatedEmpId."</h2><br><br>";
				echo "<h2>The generated password is ".$generatedEmpPassword."</h2><br><br>";
				$noOfEmp2=($noOfEmp2+1);
				$query2="UPDATE Data SET NumberOfEmployees='$noOfEmp2'";
				if($conn->query($query2))
				{
					echo "<h2>Number of employees record updated successfully</h2><br><br>";
				}
				else
				{
					echo "error: " . $query . "<br>" . $conn->error."<br>";
				}
			}
			else
			{
				echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
			}			
	  ?>
   </body>
</html>