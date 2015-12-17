<?php
	require_once '../functions.php';
	$dbc = connect();
	checkMember();

	if ($_POST['title']) {
		$title = mysqli_real_escape_string($dbc, $_POST['title']);
	} else {
		echo '<p>The title field is empty.</p>';
	}

	if ($_POST['body']) {
		$body = mysqli_real_escape_string($dbc, $_POST['body']);
	} else {
		echo '<p>The body field is empty.</p>';
	}

	$date = time();

	if ($title && $body) {
		// TODO Add to Existing: Between the quotes in the line below write an insert statement that inserts the '$title', '$body', '$date' variables into the pages table
		$query = "";
		$results = mysqli_query($dbc, $query);
		redirect('Your page has been created.', '/admin/index.php');
	} else {
		redirect('There was an error.', '/admin/create.php');
	}