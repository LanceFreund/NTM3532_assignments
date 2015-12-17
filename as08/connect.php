<?php

	// Set the database access information as constants:
	// Fill in the following credentials to connect to your database:

  // The code below holds the constants that will be used to connect to the mysqli server.
	DEFINE ('DB_HOST', 'localhost'); // TODO Add to existing: Fill in the Host
	DEFINE ('DB_USER', 'root'); // TODO Add to existing: Fill in your nitrous.io root username
	DEFINE ('DB_PASSWORD', 'ntm3532'); // TODO Add to existing: Fill in your nitrous.io root password
	DEFINE ('DB_NAME', 'site'); /// TODO Add to existing: Fill in your Database Name
	// Make the connection:
	// TODO Fill in the arguments for the @mysqli_connect function

  // The code below stores the constants of the mysqli_connect function in $dbc.
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

	mysqli_set_charset($dbc, 'utf8');
?>