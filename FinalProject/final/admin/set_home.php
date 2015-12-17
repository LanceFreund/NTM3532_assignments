<?php
	require_once '../functions.php';
	$dbc = connect();
	checkMember();

	$id = $_GET['id'];

	if (findPage($id)) {
		$result = mysqli_query($dbc, "UPDATE settings SET value='$id' WHERE name='homePage'");
		redirect('Your home page has been set.', '/admin/index.php');
		if (mysqli_affected_rows() == 0) {
			$result = mysqli_query($dbc,"INSERT INTO settings (name, value) VALUES ('homePage','$id');");
			redirect('Your home page has been set.', '/admin/index.php');
		}
	} else {
		echo "Page not found";
	}