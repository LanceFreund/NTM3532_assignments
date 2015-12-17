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
		<ul id="nav">
			<li><a href="create.php">New Page</a></li>
			<li><a href="login.php?status=logout">Log Out</a></li>
		</ul>
		<?php
			if (isset($_GET['message']) && isset($_SESSION[$_GET['message']])) {
				echo "<p id='message'>" . $_SESSION[$_GET['message']] ."</p>";
				unset($_SESSION[$_GET['message']]);
			}
		?>
		<table cellspacing='0' border='1' cellpadding='5'>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Date</th>
				<th>Actions</th>
			</tr>
			<?php displayAdmin(); ?>
		</table>
		<p>&copy;2012 Simple CMS Company</p>
	</body>
</html>