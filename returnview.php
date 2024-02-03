
<?php
// dashboard.php

session_start(); // Start or resume the session

// Check if the user is logged in
if (!isset($_SESSION["adminID"])) {
    // Redirect to the login page if not logged in
    header("Location: login.html");
    exit();
}

$adminID = $_SESSION["adminID"];
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrows | Projector Manager</title>
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
    </style>
	<link rel="stylesheet" href="styling.css"/>
</head>
<body>

    <header>
        Projector Manager.
    </header>

    <nav>
        <a href="dash.php">Home</a>
        <a href="empForm.php">Employee</a>
		<a href="projectorsForm.php">Projectors</a>
        <a href="borrowForm.php">Borrow</a>
        <a href="returnForm.php">Return</a>
		<a class="ide "href="logout.php">Logout</a>
		<a class="ide"><?php echo $adminID;?></a>
    </nav>

    <section>
	

        
<?php
$conn = new mysqli('localhost', 'root', '', 'projector');
if ($conn->connect_error) {
    die('Connection Failed :' . $conn->connect_error);
}
else{
$result = $conn->query("SELECT * FROM returned_projectors");
}


  // Display data in an HTML table
if ($result && $result->num_rows > 0) {
    echo "<h2>Returns</h2>";
    echo "<table border='1' class='tables'>";
    echo "<tr><th>Borrower's ID</th><th>Comment</th><th>Date/Time of Return</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        
		echo "<td>" . $row["borrow_id"] . "</td>";
        echo "<td>" . $row["comments"] . "</td>";
        echo "<td>" . $row["return_date"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No data available.";
}

$conn->close();
?>
<input class="styled-button"  type="button" onclick="window.location.href='returnForm.php'" value="Return Projector"> 
    </section>
<footer>
        <p>&copy; 2023 DragoApps. All rights reserved.</p>
    </footer>
</body>
</html>