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
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('localhost', 'root', '', 'projector');
	if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect and sanitize user input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $employee_id = intval($_POST['adminID']); // Convert to integer
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
	$role=$_POST['role'];

    // Insert the data into the database
    $query = "INSERT INTO admins (username, password, email, adminID, phone_number, role) 
              VALUES ('$username', '$password', '$email', $employee_id, '$phone_number','$role')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Admin registration successful.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Admin | Projector Manager</title>
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
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
			
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
    <h2>Admin Registration</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Name:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="employee_id">Employee ID:</label>
        <input type="text" name="adminID" required><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" required><br>
		
		<label for="role">Role:</label>
        <select id="role" name="role">
            <option value="#">Choose Role</option>
			<option value="Admin">Admin</option>
			<option value="Super Admin">Super Admin</option>
        </select>
		<br><br>
        <input type="submit" value="Register">
		<input class="styled-button" type="button" onclick="window.location.href='viewadmin.php'" value="View Admins">
    </form>
</body>
</html>
