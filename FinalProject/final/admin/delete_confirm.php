<?php
	require_once '../functions.php';
	$dbc = connect();
	checkMember();
	$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Simple CMS Admin</title>
		<link rel="stylesheet" type="text/css" href="../css/admin_styles.css" />
	</head>
	<body>

			<?php
				if (findPage($id)) {

					$result = mysqli_query($dbc, "SELECT title FROM pages WHERE id='$id'");
					$row = mysqli_fetch_array($result);

					$title = $row['title'];

					echo "<p>Are you sure you would like to delete the page <em>$title</em>?</p>";
					echo "<ul><li><a href='delete_handle.php?id=$id'>Yes</a></li>";
					echo "<li><a href='" . BASE_URL . "/admin/index.php'>No</a></li></ul>";
				} else {
					echo "<p>Page not found</p>";
				}
			?>

			<p>&copy;2012 Simple CMS Company</p>
	</body>
</html>