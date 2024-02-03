
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees | Projector Manager</title>
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
	

        <h2>Register Employee</h2>
		
		<form action="empsuper.php" method="post">
        <label>Employee ID</label>
        <input type="text" name="EmployeeID" id="EmployeeID" required><br>

        <label>Name</label>
        <input type="text" name="UserName" id="UserName" required><br>

        <label>Contact</label>
        <input type="text" name="Contact" id="Contact" required><br>

        <label>Email</label>
        <input type="email" name="email" id="email" required><br>

        <input type="submit" value="Submit">
		
		
		<input class="styled-button" type="button" onclick="window.location.href='empviewsuper.php'" value="View Employees">
    </form>


    </section>
<footer>
        <p>&copy; 2023 DragoApps. All rights reserved.</p>
    </footer>
</body>
</html>