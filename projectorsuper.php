<?php
$Model= $_POST["Model"];
$Conditions= $_POST["Conditions"];
$SerialNumber= $_POST["SerialNumber"];
$Colour= $_POST["Colour"];

$conn = new mysqli('localhost','root','','projector');
if($conn->connect_error){die('Connection Failed :'.$conn->connect_error);}
else{
	$stmt=$conn->prepare("insert into projector(Model,Conditions,SerialNumber,Colour)values(?,?,?,?)");
	$stmt->bind_param("ssss",$Model,$Conditions,$SerialNumber,$Colour);
	$stmt->execute();
	
}

if($stmt){
	 echo "Projector added successfully.";
		header("Location: projectorviewsuper.php");
	}
 else {
    echo "No data available.";
}

$conn->close();
?>