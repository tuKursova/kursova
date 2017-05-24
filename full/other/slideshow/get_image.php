<?php
	require '../../includes/classes/query.php';
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$current_image = $_GET['current_image'];
		$gallery_id = $_GET['gallery_id'];
		
		Query::clean_string($current_image);
		Query::clean_string($gallery_id);
		
		$query = new Query();
		$result = $query->get_array_info("url", "pictures", "gallery_id", "$gallery_id");
		
		// setting up return
		$current_image %= sizeof($result);
		$image_url = $result[$current_image]['url'];
		echo '{ "image_url": "' . $image_url . '", "current_image": "' . $current_image . '" }';
	} else {
		echo "hello my friend, what are you doing here, shouldn't you be in school";
	}
?>