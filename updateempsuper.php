<?php
// update.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $recordId = $_POST['id'];

        // Retrieve updated data from the form
        // Modify this section based on your actual form input names
        $updatedEmployeeID = $_POST['EmployeeID']; 
        $updatedUserName = $_POST['UserName']; 
        $updatedContact = $_POST['Contact'];
        $updatedemail = $_POST['email']; 

        // Update the record in the database
        $conn = new mysqli('localhost', 'root', '', 'projector');
        if ($conn->connect_error) {
            die('Connection Failed: ' . $conn->connect_error);
        }

        $sql = "UPDATE users SET 
                EmployeeID = '$updatedEmployeeID', 
                UserName = '$updatedUserName', 
                Contact = '$updatedContact', 
                email = '$updatedemail' 
                WHERE id = $recordId";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully.";
			header("Location: empviewsuper.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Invalid record ID.";
    }
} else {
    echo "Invalid request method.";
}
?>
