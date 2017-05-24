<?php
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		include "../../includes/classes/query.php";
		
		$query = new Query();
		$id_delete = $_GET['id'];
		
		$id_delete = Query::clean_string($id_delete);
		echo $query->delete_request("pictures", "id", $id_delete);
	}
?>