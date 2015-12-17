<?php
	require_once '../functions.php';
	checkMember();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Simple CMS Admin</title>
		<link rel="stylesheet" type="text/css" href="../css/admin_styles.css" />
	</head>
	<body>

		<form action="create_handle.php" method="post">
			<p>
				<label for="title">Title:</label>
				<input name="title" id="title" type="text" maxlength="150" />
			</p>

			<p>
				<label for="body">Body Text:</label>
				<textarea name="body" id="body"></textarea>
			</p>

			<p>
				<input type="submit" value="Publish" />
			</p>
		</form>

		<p>&copy;2012 Simple CMS Company</p>
	</body>
</html>