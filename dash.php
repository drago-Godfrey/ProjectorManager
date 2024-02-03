
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
		/* Responsive Styles */

    }
    </style>
	
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
	

        <h2>Welcome to ProManger</h2>
		
		<div class="dashboard-container">
        <div class="dashboard-item item1">
            <h2>Recent Activity</h2>
            <a href="recent.php" align="center"><p>View</p></a>
        </div>

        <div class="dashboard-item item2">
            <h2>New Projectors</h2>
            <a href="newpro.php" align="center"><p>View</p></a>
        </div>
		</div>
		<div class="dashboard-container">
        <div class="dashboard-item item1">
            <h2>All Borrowing Records</h2>
            <a href="borrowviewall.php" align="center"><p>View</p></a>
        </div>

        <div class="dashboard-item item2">
            <h2>Returned Projectors</h2>
            <a href="returnview.php" align="center"><p>View</p></a>
        </div>
		</div>
		
		


    </section>
<footer>
        <p>&copy; 2023 DragoApps. All rights reserved.</p>
    </footer>
</body>
</html>