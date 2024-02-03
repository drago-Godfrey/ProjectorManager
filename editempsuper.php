
<?php
// dashboard.php

session_start(); // Start or resume the session

// Check if the user is logged in
if (!isset($_SESSION["adminID"])) {
    // Redirect to the login page if not logged in
    header("Location: loginsuper.html");
    exit();
}

$adminID = $_SESSION["adminID"];
?>
<?php
// edit.php

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $recordId = $_GET['id'];

    // Fetch the record from the database based on the ID
    $conn = new mysqli('localhost', 'root', '', 'projector');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    $result = $conn->query("SELECT * FROM users WHERE id = $recordId");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // $row now contains the data of the record, you can use it to pre-fill your edit form
    } else {
        echo "Record not found.";
    }

    $conn->close();
} else {
    echo "Invalid record ID.";
}
?>

<!-- HTML form for editing the record -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee | Projector Manager</title>
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
    <h2>Edit Projector</h2>
    <form action="updateempsuper.php" method="post">
        <label for="EmployeeID">Employee ID:</label>
		<input type="text" name="EmployeeID" value="<?php echo $row['EmployeeID']; ?>">
        
		<label for="name">Name:</label>
		<input type="text" name="UserName" value="<?php echo $row['UserName']; ?>">
		
		<label for="contact">Contact:</label>
		<input type="text" name="Contact" value="<?php echo $row['Contact']; ?>">
		
		<label for="email">E-mail:</label>
		<input type="text" name="email" value="<?php echo $row['email']; ?>">
		
		<input type="hidden" name="id" value="<?php echo $recordId; ?>">
        <input type="submit" value="Save Changes">
		
		<input class="styled-button" type="button" onclick="window.location.href='empviewsuper.php" value="Cancel">

    </form>
	
<footer>
        <p>&copy; 2023 DragoApps. All rights reserved.</p>
    </footer>
</body>
</html>
