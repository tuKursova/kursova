<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../js/javascript.js"></script>
<link rel="stylesheet" type="text/css" href="../css/gallery.css">
<style>
	body, div {
		background-color: <?php echo $_GET['color']; ?>;
		color: <?php echo $_GET['text']; ?>;
	}
	div[name='flog_effect'] {
		background-color: rgba(0, 0, 0, <?php echo $_GET['opacity'];?>);
	}
	
	div.main_div {
		text-align: center;
		width: 100%;
		height:100%;
	}
</style>

<?php 
	if(isset($_GET['id']) && !empty($_GET['id'])) {
		$id = mysql_real_escape_string($_GET['id']);
		
		if(is_numeric($id) && $id > 0) {
			include "../includes/classes/gallery_database.php";

			$gallery = GalleryDatabase::load($id);
			$gallery->show();
		}
	}
?>