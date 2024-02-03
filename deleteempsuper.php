<?php
// delete.php

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $recordId = $_GET['id'];

    // Delete the record from the database based on the ID
    $conn = new mysqli('localhost', 'root', '', 'projector');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    $result = $conn->query("DELETE FROM users WHERE id = $recordId");

    if ($result) {
        echo "Record deleted successfully.";
		header("Location: empviewsuper.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid record ID.";
}
?>
