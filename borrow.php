
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $EmployeeID = $_POST["employee"];
    $ProjectorID = $_POST["projector"];
    $comments = $_POST["comments"];
    
    // Create a DateTime object for the current date and time
    $borrow_datetime = new DateTime('now', new DateTimeZone('UTC'));
    
    // Format the DateTime object as a string for MySQL
    $formatted_datetime = $borrow_datetime->format('Y-m-d H:i:s');

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'projector');
    
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the borrow table
    $stmt = $conn->prepare("INSERT INTO borrowed_projectors (employee_id, projector_model, comments, borrow_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $EmployeeID, $ProjectorID, $comments, $formatted_datetime);
    $stmt->execute();

    // Insert data into the all time borrow table 
    $stmt = $conn->prepare("INSERT INTO borrowed_projectors_alltime (employee_id, projector_model, comments, borrow_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $EmployeeID, $ProjectorID, $comments, $formatted_datetime);
    $stmt->execute();

    // Check for success and close the connection
    if ($stmt->affected_rows > 0) {
        header("Location:borrowview.php");
    } else {
        echo "Error recording borrowing information: " . $conn->error;
    }
 $conn->close();

} else {
    // Redirect to the form if accessed directly
    header("Location: borrow.html");
    exit();
}
?>