<?php
include "gallery.php";
include "query.php";
class GalleryDatabase {
	public static function load($gallery_id) {
		$gallery_id = Query::clean_string($gallery_id);
		
		$query = new Query();
		
		$gallery = self::make_empty_gallery($query, $gallery_id);
		$images = $query->get_array_info("url", "pictures", "gallery_id", $gallery_id);
				
		$gallery->set_image_array($images);
		$gallery->set_gallery_id($gallery_id);
		
		return $gallery;
	}
	
	public static function fill_gallery_with_images($query, $gallery_info) {
		$images = $query->get_array_info("url", "pictures", "gallery_id", $gallery_info['gallery_id']);
		$gallery = new Gallery($gallery_info['name']);
		$gallery->set_image_array($images);
		$gallery->gallery_id = $gallery_info['gallery_id'];
		return $gallery;
	}
	
	public static function load_all($where = "1", $equal = "1") {
		$query = new Query();
		$galleries = $query->get_array_info("name, gallery_id", "gallery", $where, $equal);
		foreach($galleries as $gallery) {
			$gallery = self::fill_gallery_with_images($query, $gallery);
			$gallery->show();
		}
	}
	
	private static function make_empty_gallery($query, $gallery_id) {		
		$name = $query->get_gallery_name($gallery_id, "gallery");
		return new Gallery($name);
	}
};
?>