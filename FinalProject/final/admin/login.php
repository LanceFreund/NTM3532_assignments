<?php
	require_once '../functions.php';
	session_start();

	if ($_GET['status'] == 'logout') {
		logout();
	}
	if ($_POST['username'] && $_POST['password']) {
		$result = validateUser($_POST['username'], $_POST['password']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Simple CMS Admin</title>
<link rel="stylesheet" type="text/css" href="../css/admin_styles.css" /> 
</head>
<body>

		<form method="post">
			<p>
				<label for="name">Username: </label>
				<input type="text" name="username" />
			</p>
			
			<p>
				<label for="password">Password: </label>
				<input type="password" name="password" />
			</p>
			
			<p>
				<input type="submit" id="submit" value="Login" name="submit" />
			</p>
		</form>
		<?php if (isset($result)) echo $result; ?>

	</body>
</html>