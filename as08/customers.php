<?php
// Start of session.
session_start();

// The code below will redirect the user to index.php if username or password isn't set.
if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
   header('Location: index.php');
}

// The code below establishes the connection to the mysqli server.
require("connect.php");
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($dbc ->connect_error) die($dbc ->connect_error);

// The code below uses real_escape_string method to sanitize user input for MySQL and assign the input into php variables.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$fn = mysqli_real_escape_string($dbc, $_POST['first_name']); // TODO Add to existing: trim the $_POST['first_name'] variable
$ln = mysqli_real_escape_string($dbc, $_POST['last_name']); // TODO Add to existing: trim the $_POST['last_name'] variable
$email = mysqli_real_escape_string($dbc, $_POST['email']); // TODO Add to existing: trim the $_POST['email'] variable
$comments = mysqli_real_escape_string($dbc, $_POST['comments']); // TODO Add to existing: trim the $_POST['comments'] variable

// This is a SQL INSERT statement that inserts the customer information into the SQL database.
$query = "INSERT INTO customers (first_name, last_name, email, comments) VALUES ('$fn', '$ln', '$email', '$comments') "; // TODO Add to existing: Create a string for the 'INSERT INTO' sql query
// This line of code runs the preceeding INSERT statement
$results = mysqli_query ($dbc, $query);// TODO Add to existing: Run the sql query string with the mysql query function using the $dbc database connection.

  if ($results == true) {
    echo '<h1>Thank you!</h1><p>The customer has been added!</p><p><br /></p>';
  } else {
    echo '<h1>System Error</h1><p>Their was a system error. We apologize for any inconvenience.</p>';
    echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $query . '</p>';
  }

// TODO New line: Close the $dbc database connection.
$results->close();
$dbc->close();
}
?>

<!-- html form for capturing user inpur -->
<!DOCTYPE html>
<html>
<head>
<title>Customer Form</title>
</head>

<body>
<p><a href="view_customers.php">View Customers</a></p>
<p><a href="logout.php">Logout</a></p>

<h1>Add Customer</h1>
<form action="customers.php" method="post">
<p>First Name: <input type="text" name="first_name" /></p>
<p>Last Name: <input type="text" name="last_name" /></p>
<p>Email Address: <input type="text" name="email" /> </p>
<p>Comments: <textarea name="comments"></textarea></p>
<p><input type="submit" name="submit" value="Submit" /></p>

</form>
</body>
</html>