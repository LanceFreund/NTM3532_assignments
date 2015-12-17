<?php
	require_once '../functions.php';
	$dbc = connect();
	checkMember();

	$id = $_GET['id'];

	$result = mysqli_query($dbc, "SELECT title, body FROM pages WHERE id='$id'");
	$row = mysqli_fetch_array($result);

	$title= $row['title'];
	$body = $row['body'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Simple CMS Admin</title>
		<link rel="stylesheet" type="text/css" href="../css/admin_styles.css" />
	</head>
	<body>

		<?php if (findPage($id)): ?>
			<form action="update_handle.php?id=<?php echo $id; ?>" method="post">
				<p>
					<label for="title">Title:</label>
					<input name="title" id="title" type="text" maxlength="150" value="<?php echo $title; ?>" />
				</p>

				<p>
					<label for="body">Body Text:</label>
					<textarea name="body" id="body"><?php echo $body; ?></textarea>
				</p>

				<p>
					<label for="date">Change the date?</label>
					<input type="checkbox" name="date" value="1" />
				</p>

				<p>
					<input type="submit" value="Publish" />
				</p>
			</form>
		<?php else: ?>
			<p>Page not found</p>
		<?php endif; ?>

		<p>&copy;2012 Simple CMS Company</p>
	</body>
</html>