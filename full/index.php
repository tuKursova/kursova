<?php include "includes/classes/gallery_database.php" ?> 

<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
	<?php include "includes/js_css.php" ?>
	<script src="js/slideshow.js"></script>
	<link rel="stylesheet" type="text/css" href="css/slide_show.css">
</head>
<body>
	<?php include "/includes/top.php"; ?>
	<?php
		$gallery = GalleryDatabase::load(6);
		$gallery->slide_show("500px", "700px");
	?>
	<?php include "includes/bottom.php" ?>
</body>
</html>