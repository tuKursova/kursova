<?php

/*
	include gallery and query
*/

class ImagesEdit {
	function add_image_bar() {
		$query = new Query();
		echo "<ul class='adding_image' style='list-style-type:none; padding:0px; margin:0px;width:100%;border-bottom: 3px solid grey; overflow: auto;'>";
			echo 	"<li style = 'overflow-x:hidden;display:block;padding:4px;width:20%;float:left;text-align:left;'>Name: <input type = 'text' name='name'></li>";
			echo 	"<li style = 'overflow-x:hidden;display:block;padding:4px;width:20%;float:left;text-align:center;'>Url: <input type = 'text' name='url'></li>";
			echo 	"<li style = 'overflow-x:hidden;display:block;padding:4px;width:20%;float:left;text-align:right;'><select>";
			$galleries = $query->get_array_info("gallery_id, name", "gallery", "1", "1");
			foreach($galleries as $gallery) {
				echo "<option id = " . $gallery['gallery_id'] . ">" . $gallery['name'] . "</option>";
			}
			echo    "</select></li>";
			echo 	"<li style = 'overflow-x:hidden;display:block;padding:4px;width:20%;float:left;text-align:right;'><input type = 'submit' name='submit' value='add'></li>";
			echo 	"<li style = 'overflow-x:hidden;display:block;padding:4px;width:10%;float:left;text-align:right;' id='status'></li>";
		echo "</ul>";
	}

	function show_images() {
		$query = new Query();
		$images = $query->get_array_info("id, url, name", "pictures", "1", "1");
		foreach($images as $image) {
			echo "<ul style='list-style-type:none; padding:0px; margin:0px;width:100%;border-bottom: 1px solid black; overflow: auto;' id='" . $image['id'] . "'>";
			echo 	"<li style = 'overflow-x:hidden;display:block;padding:4px;width:20%;float:left;text-align:left;'>" . $image['name'] . "</li>";
			echo 	"<li style = 'overflow-x:hidden;display:block;padding:4px;width:50%;float:left;text-align:center;'>" . $image['url'] . "</li>";
			echo 	"<li style = 'overflow-x:hidden;display:block;padding:4px;width:20%;float:left;text-align:right;'><img src='https://tech.knime.org/files/remove_fav.png' id='" . $image['id'] . "'></li>";
			echo "</ul>";
		}
	}
};

?>