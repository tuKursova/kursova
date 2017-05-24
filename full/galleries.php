<?php include "includes/classes/gallery_database.php" ?> 

<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
	<?php include "includes/js_css.php" ?>
	<script src="js/double_click_get.js"></script>
</head>
<body>
	<?php include "/includes/top.php"; ?>
	<?php
		GalleryDatabase::load_all();
	?>
	<?php include "includes/bottom.php" ?>
</body>
</html>