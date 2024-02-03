<?php
$EmployeeID= $_POST["EmployeeID"];
$UserName= $_POST["UserName"];
$Contact= $_POST["Contact"];
$email= $_POST["email"];

$conn = new mysqli('localhost','root','','projector');
if($conn->connect_error){die('Connection Failed :'.$conn->connect_error);}
else{
	$stmt=$conn->prepare("insert into Users(EmployeeID,UserName,Contact,email)values(?,?,?,?)");
	$stmt->bind_param("ssss",$EmployeeID,$UserName,$Contact,$email);
	$stmt->execute();
		
}

if ($stmt) {
        echo "Employee added successfully.";
		header("Location: empview.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

$conn->close();
?>