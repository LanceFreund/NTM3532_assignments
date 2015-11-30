
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="container">
	<ul id="menu">
		<li><a href="autumn.php">Autumn</a></li>
		<li><a href="beaches.php">Beaches</a></li>
		<li><a href="cityscapes.php">Cityscapes</a></li>
		<li><a href="forests.php">Forests</a></li>
		<li><a href="sunsets.php">Sunsets</a></li>
	</ul>

  <?php
function displayImage($path, $caption){
    $html = "<div class='img'>";
    $html .= "<img src='$path' alt='$caption'/>";
    $html .= "<div class='desc'>$caption</div></div>";
    return $html;
}

?>