<?php
// update.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $recordId = $_POST['id'];

        // Retrieve updated data from the form
        // Modify this section based on your actual form input names
        $updatedModel = $_POST['Model']; 
        $updatedCondition = $_POST['Conditions']; 
        $updatedSerialNumber = $_POST['SerialNumber'];
        $updatedColour = $_POST['Colour']; 

        // Update the record in the database
        $conn = new mysqli('localhost', 'root', '', 'projector');
        if ($conn->connect_error) {
            die('Connection Failed: ' . $conn->connect_error);
        }

        $sql = "UPDATE projector SET 
                Model = '$updatedModel', 
                Conditions = '$updatedCondition', 
                SerialNumber = '$updatedSerialNumber', 
                Colour = '$updatedColour' 
                WHERE id = $recordId";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully.";
			header("Location: projectorviewsuper.php");
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
