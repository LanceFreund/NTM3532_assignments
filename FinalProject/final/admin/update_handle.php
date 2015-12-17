<?php
	require_once '../functions.php';

	$dbc = connect();
	checkMember();
	$id = $_GET['id'];

	if (findPage($id)) {

		if ($_POST['title']) {
			$title = mysqli_real_escape_string($dbc, $_POST['title']);
		} else {
			echo '<p>The title is empty.</p>';
		}

		if ($_POST['body']) {
			$body = mysqli_real_escape_string($dbc, $_POST['body']);
		} else {
			echo '<p>The body is empty.</p>';
		}

		if (isset($title) && isset($body)) {
			if (isset($_POST['date'])) {
				$date = mysqli_real_escape_string($dbc, time());
				/* TODO Add to Existing: Between the quotes in the line below write an update statement for the pages table that sets the title, body, and date fields.
				   Make sure you have a where clause so you only update the record where the id equals the '$id' variable.
				   Set the values to their new values stored in the '$title', '$body', '$date' variables. */
				$query = "";
				$result = mysqli_query($dbc, $query);
				if ($result) {
					redirect('Your page has been updated.', '/admin/index.php');
				} else {
					echo "Error adding record: " . mysqli_error($dbc);
				}

			} else {
				/* TODO Add to Existing: Between the quotes in the line below write an update statement for the pages table that sets the title, and body fields.
				   Make sure you have a where clause so you only update the record where the id equals the '$id' variable.
				   Set the values to their new values stored in the '$title', '$body' variables. */
				$query = "";
				$result = mysqli_query($dbc, $query);
				if ($result) {
					redirect('Your page has been updated.', '/admin/index.php');
				} else {
					echo "Error adding record: " . mysqli_error($dbc);
				}
			}
		} else {
			echo '<p><a href="update.php">Back</a></p>';
		}
	} else {
		echo '<p>Page not found</p>';
	}