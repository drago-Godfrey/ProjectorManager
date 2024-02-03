<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a database connection
    $conn = new mysqli('localhost', 'root', '', 'projector');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input
    $adminID = $_POST["adminID"];
    $password = $_POST["password"];

    // Query to check if the user exists
    $query = "SELECT * FROM admin WHERE adminID = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $adminID, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user is found
    if ($result->num_rows == 1) {
        // Set session variables
        $_SESSION["adminID"] = $adminID;

        // Redirect to the dashboard or another page
        header("Location: dashsuper.php");
        exit();
    } else {
        // Invalid credentials, handle accordingly (e.g., display an error message)
        echo "Invalid credentials. Please try again.";
		
		//header("Location: loginsuper.html");
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
