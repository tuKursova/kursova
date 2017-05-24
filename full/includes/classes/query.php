<?php

/*
	include gallery
*/

class Query {
	private $host = "";
	private $host_user = "";
	private $host_password = "";
	private $gallery_database = "";
	private $connection;

	public static function clean_string($str) {
		return mysql_real_escape_string($str);
	}
	
	public function __construct() {
		$this->init();
	}
	
	private function init() {
		$this->connection = mysql_connect($this->host, $this->host_user, $this->host_password);
		mysql_select_db($this->gallery_database);
	}
	
	private function select_request($equal, $table, $colums, $where) {
		$command = "SELECT $colums FROM $table WHERE $where='$equal'";
		return mysql_query($command, $this->connection);
	}
	
	public function delete_request($table, $where, $equal) {
		$command = "DELETE FROM $table WHERE $where='$equal'";
		return mysql_query($command, $this->connection);
	}	
	
	public function insert_request($table, $where, $values) {
		$command = "INSERT INTO $table ($where) VALUES ($values)";
		return mysql_query($command, $this->connection);
	}
	
	public function get_array_info($select, $table, $where, $gallery_id) {
		$images_info = $this->select_request($gallery_id, $table, $select, $where);
		$pictures = array();
		while($row = mysql_fetch_array($images_info))
			array_push($pictures, $row);
		return $pictures;
	}
	
	// private case part // must be fixed 

	public function get_gallery_name($gallery_id, $table) {
		$gallery_info = $this->select_request($gallery_id, $table, "name", "gallery_id");
		return mysql_fetch_array($gallery_info)['name'];
	}
		
	// end private case part
};
?>