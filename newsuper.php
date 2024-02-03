
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
    <title>ProManager | Projector Manager</title>
    
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #3498db, #ffffff, #f39c12); /* Blue, White, Yellow gradient */
            color: #333; /* Text color */
        }

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
		/* Responsive Styles */

    }
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
	

        <h2>Admins</h2>
		
		<div class="dashboard-container">
        <div class="dashboard-item item1">
            <h2>Admin</h2>
            <a href="register_admin.php" align="center"><p>Add.</p></a>
        </div>

        <div class="dashboard-item item2">
            <h2>SuperAdmin</h2>
            <a href="newsuper.php" align="center"><p>Add.</p></a>
        </div>
		</div>
		<div class="dashboard-container">
        <div class="dashboard-item item1">
            <h2>Admins</h2>
            <a href="viewadmin.php" align="center"><p>View.</p></a>
        </div>

        <div class="dashboard-item item2">
            <h2>Super Admins</h2>
            <a href="viewsuper.php" align="center"><p>View.</p></a>
        </div>
		</div>


    </section>
<footer>
        <p>&copy; 2023 DragoApps. All rights reserved.</p>
    </footer>
</body>
</html>