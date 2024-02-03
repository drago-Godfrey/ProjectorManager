<?php
// update.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $recordId = $_POST['id'];

        // Retrieve updated data from the form
        // Modify this section based on your actual form input names
        $updatedusername = $_POST['username']; 
        $updatedpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $updatedemail = $_POST['email'];
        $updatedeemployee_id = $_POST['adminID'];
        $updatedecontact = $_POST['phone_number'];		

        // Update the record in the database
        $conn = new mysqli('localhost', 'root', '', 'projector');
        if ($conn->connect_error) {
            die('Connection Failed: ' . $conn->connect_error);
        }

        $sql = "UPDATE admins SET 
                username = '$updatedusername', 
                password = '$updatedpassword', 
                email = '$updatedemail',
                employee_id = '$updatedeemployee_id',	
                phone_number= '$updatedecontact'				
                WHERE id = $recordId";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully.";
			header("Location: viewadmin.php");
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
