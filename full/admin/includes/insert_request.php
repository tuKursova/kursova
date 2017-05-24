<?php
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		include "../../includes/classes/query.php";
		$query = new Query();
		$name = Query::clean_string($_GET['name']);
		$url = Query::clean_string($_GET['url']);
		$gallery_id = Query::clean_string($_GET['gallery_id']);
		
		echo $query->insert_request("pictures", "name, url, gallery_id", "'$name','$url', '$gallery_id'"); 
	}

?>