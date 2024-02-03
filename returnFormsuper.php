
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
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Returns | Projector Manager</title>
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
		select {
		padding: 8px;
		font-size: 16px;
		border: 2px solid #3498db;
		border-radius: 4px;
		}

/* Style the arrow icon (carets) */
select::-ms-expand {
  display: none; /* Remove the default arrow in Internet Explorer/Edge */
}

/* Customize appearance */
select {
  background-color: #fff; /* Background color */
  color: #333; /* Text color */
}

/* Hover and focus styles */
select:hover,
select:focus {
  border-color: #007bff; /* Change border color on hover/focus */
}

/* Disabled state */
select:disabled {
  opacity: 0.6; /* Reduce opacity for disabled state */
}

/* Styling for dropdown arrow icon */
select option {
  background-color: #fff;
  color: #333;
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
	

        <h2>Returns</h2>
		<form action="returnsuper.php" method="post">
        <label for="projector">Borrower's ID</label>
        <select id="projector" name="borrow_id">
            <?php
            $conn = new mysqli('localhost', 'root', '', 'projector');
			if ($conn->connect_error) { die('Connection Failed :' . $conn->connect_error);}
			// SQL query to retrieve projectors
			$sql = "SELECT employee_id FROM borrowed_projectors";
			$result = $conn->query($sql);
			// Check if there are results
			if ($result->num_rows > 0) {
				// Fetch data and store in an array
				$borrs = array();
				while ($row = $result->fetch_assoc()) {
					$borrs[] = $row['employee_id'];
					}
					} else {
						$projectors = array();}
			// Close the database connection
			$conn->close();
			?>
            
			<option value="#">Borrower's ID</option>
			
			<?php
            // Populate the dropdown list with projectors
            foreach ($borrs as $borr) {
                echo "<option value=\"$borr\">$borr</option>";
            }
            ?>
        </select>
		<br><br>

        <label>Comments:</label>
        <input type="text" name="comments" /><br>
		
        <input type="submit" value="Submit">
		
        
		
		<input class="styled-button" type="button" onclick="window.location.href='returnviewsuper.php'" value="View Returned"> 
		</form>


    </section>
<footer>
        <p>&copy; 2023 DragoApps. All rights reserved.</p>
    </footer>
</body>
</html>