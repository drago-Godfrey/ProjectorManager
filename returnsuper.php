<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $borrowID = $_POST["borrow_id"];
    $comments = $_POST["comments"];
    
    // Create a DateTime object for the current date and time
    $return_datetime = new DateTime('now', new DateTimeZone('UTC'));
    
    // Format the DateTime object as a string for MySQL
    $formatted_datetime = $return_datetime->format('Y-m-d H:i:s');

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'projector');
    
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the borrow table
    $stmt = $conn->prepare("INSERT INTO returned_projectors (borrow_id, comments, return_date) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $borrowID,  $comments, $formatted_datetime);
    $stmt->execute();

    // Check for success and close the connection
    if ($stmt->affected_rows > 0) {
        //to delete record
		$stmt_delete = $conn->prepare("DELETE FROM borrowed_projectors WHERE employee_id = ?");
        $stmt_delete->bind_param("i", $borrowID);
        $stmt_delete->execute();
		
        header("Location: returnviewsuper.php");
    } else {
        echo "Error recording returning information: " . $conn->error;
    }

    
    $conn->close();

} else {
    // Redirect to the form if accessed directly
    header("Location: return.html");
    exit();
}
?>