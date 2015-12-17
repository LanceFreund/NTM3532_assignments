<?php
	require_once 'functions.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php title(); ?></title>
		<link rel="stylesheet" type="text/css" href="css/site_styles.css" />
	</head>
	<body>
		<div id="container">
			<div id="nav">
				<ul><?php listPages(); ?></ul>
			</div>
			<div id="main">
				<?php
					if (findPage($_GET['id']) || !$_GET) {
						echo "<h1 id='title'>" . pageDetails('title') . "</h1>";
						echo "<div id='body'>" . pageDetails('body') . "</div>";
					} else {
						echo "<p>Not found</p>";
					}
				?>
		</div>
	</body>
</html>