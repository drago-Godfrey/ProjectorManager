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
	

    <h2>Register Projector</h2>

    <form action="projectors.php" method="post" enctype="multipart/form-data">
        <label for="model">Model:</label>
        <input type="text" name="Model" required><br>

        <label for="condition">Condition:</label>
        <input type="text" name="Conditions" required><br>

        <label for="serial_number">Serial Number:</label>
        <input type="text" name="SerialNumber" required><br>

        <label for="color">Colour:</label>
        <input type="text" name="Colour" required><br>

        
        <input type="submit" value="Submit"></input>
		
		
		<input class="styled-button" type="button" onclick="window.location.href='projectorview.php'" value="View Projectors">
    </form>


    </section>
<footer>
        <p>&copy; 2023 DragoApps. All rights reserved.</p>
    </footer>
</body>
</html>