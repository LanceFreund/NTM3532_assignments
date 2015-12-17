<?php
  // TODO New line: Start a session
session_start();

  // This code ensures that the user is directed back to index.php if username or password aren't set
  if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
     header('Location: index.php');
  }

  // The code below establishes the connection to the MySQL database
	require("connect.php");
  $dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($dbc ->connect_error) die($dbc ->connect_error);

  // The code below builds and executes a SQL SELECT statement to view the customers.
	$query = "SELECT * FROM customers"; // TODO Add to existing: Create a string for the 'SELECT' sql query
	$results = mysqli_query ($dbc, $query); // TODO Add to existing: Run the sql query string with the mysql query function using the $dbc database connection.

	$num = mysqli_num_rows($results);

  // The code below will display the number of entries, the column titles, and the information that is recieved from the fetch_array method.
	if ($num > 0) {

		echo "<p>You have $num message(s).</p>";

		echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">';
		echo '<tr><td align="left"><b>First Name</b></td>';
		echo '<td align="left"><b>Last Name</b></td>';
		echo '<td align="left"><b>Email</b></td>';
		echo '<td align="left"><b>Comments</b></td></tr>';

		while ($row = $results->fetch_array(MYSQLI_BOTH)) {
			echo '<tr><td align="left">' . $row['first_name'] . '</td>';
			echo '<td align="left">' . $row['last_name'] . '</td>';
			echo '<td align="left">' . $row['email'] . '</td>';
			echo '<td align="left">' . $row['comments'] . '</td></tr>';
		}

		echo '</table>';

		mysqli_free_result ($results);

	} else {
		echo '<p class="error">There are currently no registered users.</p>';
	}

  // TODO New line: Close the $dbc database connection.
$results->close();
$dbc->close();
?>