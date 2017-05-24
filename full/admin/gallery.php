<?php
	if(!isset($_SESSION))
		session_start();

	if(isset($_SESSION['admin'])) {
		require "../includes/classes/gallery.php";
		require "../includes/classes/query.php";
		include "includes/classes/images_edit.php";
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin menu</title>
	<link rel="stylesheet" type="text/css"  href="../css/admin.css"></link>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/image_edit.js"></script>
</head>
<body>	
	<?php include "includes/top.php"; ?>
	
	<?php
		$editor = new ImagesEdit();
		$editor->add_image_bar();
		$editor->show_images();
		
	?>
	
	<?php include "includes/bottom.php"; ?>
</body>
</html>
<?php
	}
 ?>