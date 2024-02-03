
<?php
session_start(); // Start or resume the session

// Check if the user is logged in
if (!isset($_SESSION["adminID"])) {
    // Redirect to the login page if not logged in
    header("Location: loginsuper.html");
    exit();
}

$adminID = $_SESSION["adminID"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projectors | Projector Manager</title>
    <link rel="stylesheet" href="styling.css"/>
<style>

        header {
            background-color: #3498db; /* Blue header */
            color: #fff;
            padding: 10px;
            text-align: center;
	    font-size:24px;
        }

        nav {
            background-color: #f39c12; /* Yellow navigation bar */
            overflow: hidden;
			
        }

        nav a {
            float:left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #555; /* Darker yellow on hover */
        }

        section {
            margin-left: 0; /* No margin on the left */
            padding: 20px;
        }
		a {
			text-decoration:none;
		}
	.tables {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        border: 1px solid #ddd;
    }

    .tables th, .tables td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .tables th {
        background-color: #3498db;
        color: #fff;
    }

    .tables tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    /* Your existing styles */

    /* Additional styles for buttons */
    .edit-btn,
    .delete-btn {
        padding: 8px 12px;
        margin-right: 5px;
        cursor: pointer;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .edit-btn {
        background-color: #3498db; /* Green for edit button */
        color: white;
    }

    .delete-btn {
        background-color: #f44336; /* Red for delete button */
        color: white;
    }

    /* Hover styles */
    .edit-btn:hover,
    .delete-btn:hover {
        background-color: #45a049; /* Darker green on hover for edit button */
    }

    .delete-btn:hover {
        background-color: #f44336; /* Darker red on hover for delete button */
    }
</style>

    </style>
	<link rel="stylesheet" href="styling.css"/>
</head>
<body>

    <header>
        Projector Manager.
    </header>

    <nav>
        <a href="dashsuper.php">Home</a>
        <a href="empFormsuper.php">Employee</a>
		<a href="projectorsFormsuper.php">Projectors</a>
        <a href="borrowFormsuper.php">Borrow</a>
        <a href="returnFormsuper.php">Return</a>
		<a href="admins.php">Admins</a>
		<a class="ide"><?php echo $adminID;?></a>
		<a class="ide "href="logoutsuper.php">Logout</a>
    </nav>

    <section>
	

        
<?php
$conn = new mysqli('localhost', 'root', '', 'projector');

// Check the connection
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

// Perform the SQL query
$result = $conn->query("SELECT * FROM projector");

// Display data in an HTML table
if ($result && $result->num_rows > 0) {
    echo "<h2>Projectors</h2>";
    echo "<table border='1' class='tables'>";
    echo "<tr><th>Model</th><th>Condition</th><th>Serial Number</th><th>Colour</th><th>Action</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        
        echo "<td>" . $row["Model"] . "</td>";
        echo "<td>" . $row["Conditions"] . "</td>";
        echo "<td>" . $row["SerialNumber"] . "</td>";
        echo "<td>" . $row["Colour"] . "</td>";
        echo "<td>";
		// Edit button redirects to edit.php with record ID
        echo "<button class='edit-btn' onclick='editRecord(" . $row["id"] . ")'>Edit</button>";
        // Delete button calls deleteRecord function with record ID
        echo "<button class='delete-btn' onclick='deleteRecord(" . $row["id"] . ")'>Delete</button>";
        echo "</td>";
        echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No data available.";
        }

        // Close the connection
        $conn->close();
        ?>

        <input class="styled-button" type="button" onclick="window.location.href='projectorsFormsuper.php'" value="Register Projector">
    </section>

    <footer>
        <p>&copy; 2023 DragoApps. All rights reserved.</p>
    </footer>

    <!-- JavaScript to handle edit and delete actions -->
    <script>
        // Function to handle edit action
        function editRecord(recordId) {
            window.location.href = 'editprosuper.php?id=' + recordId;
        }

        // Function to handle delete action
        function deleteRecord(recordId) {
            if (confirm('Are you sure you want to delete this record?')) {
                window.location.href = 'deleteprosuper.php?id=' + recordId;
            }
        }
    </script>
</body>
</html>