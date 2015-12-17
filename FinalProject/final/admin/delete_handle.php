<?php
	require_once '../functions.php';
	$dbc = connect();
	checkMember();
	$id = $_GET['id'];

	if (findPage($id)) {
		// TODO Add to Existing: Between the quotes in the line below write a delete statement that deletes the page where the id equals the value of the variable '$id'
		$query = "";
		mysqli_query($dbc,$query);
		redirect('Your page has been deleted.', '/admin/index.php');
	} else {
		echo '<p>Page not found</p>';
	}