<?php 
class Gallery {
	public $gallery_size = array(300, 200, 120, 60, 30);
	public $title;
	public $images = array();
	public $gallery_id;

	public function set_gallery_id($id) {
		$this->gallery_id = $id;
	}
	
	public function __construct($title) {
		$this->title = $title;
	}
	
	public function set_image($url) {
		array_push($this->images, $url);
	}
	
	public function set_image_array($array_url) {
		foreach($array_url as $url) {
			$this->set_image($url["url"]);
		}
	}
	
	// slide show
	public function slide_show($height, $width) {
		$this->images_size = sizeof($this->images); 
		$this->current_index = 0;
		echo '<div class="main_div" id="slide_show">';    // gallery
			echo '<div class = "title_gallery">';   		// title_gallery
			echo $this->title;
			echo '</div>'; 									// end title_gallery
			if(sizeof($this->images) <= 0) {
				echo "empty slide show";
			} else {
				$first_image = $this->images[0];
				$gallery_id = $this->gallery_id;
				echo "<div class='slideshow_image' style='width:100%;max-width:$width;height:$height;'>";
				echo "<img style='max-width:100%;max-height:$height;' data-name='1' id='$gallery_id' src='$first_image' alt=''/>";
				echo "</div>";
			}
		echo '</div>';
	}
	// slide show
	
	public function show() {
		echo '<div class="main_div" data-type="gallery">';    // gallery
			echo '<div class = "title_gallery" data-id="' . $this->gallery_id . '">';   	// title_gallery
			echo $this->title;
			echo '<select name="image_size">';			// select
			
			foreach($this->gallery_size as $size) {
				echo "<option>$size</option>";
			}
			
			echo '</select>';							// end select
			echo '</div>'; 								// end title_gallery
			
			foreach($this->images as $image) { 
				echo "<img style='padding:2px;height:" . $this->gallery_size[0] . "px;width:" . $this->gallery_size[0] ."px' src='$image' alt=''/>";
			} 
		echo '</div>';									// end gallery
	} 													//end of show function
};
 ?>