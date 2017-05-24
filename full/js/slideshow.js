var slide_show = {
	gallery_slideshow_path : ".body_div .main_div#slide_show div[class='slideshow_image']",
	gallery_slideshow_img : ".body_div .main_div#slide_show div img:not(.loader_image)",
	gallery_slideshow_path_finished : true
}

$(document).ready( function() {
	$(slide_show.gallery_slideshow_path).click( function() {
		if(!slide_show.gallery_slideshow_path_finished) return;
		$('.title_gallery').append("<img style='position:absolute;margin-top:10px;margin-left:10px;' class='loader_image' src='http://www.itbusinessedge.com/images/ajax-loader.gif'/>");
		slide_show.gallery_slideshow_path_finished = false;
		var current_image = $(slide_show.gallery_slideshow_img).attr("data-name");
		var gallery_id = $(slide_show.gallery_slideshow_img).attr("id");
		$.get("other/slideshow/get_image.php", { "gallery_id" : gallery_id ,"current_image" : current_image }, function (data, status) {
			if(status == "success") {
				try {
					info = JSON.parse(data);
					var slideshow_id = "[id='" + gallery_id + "']";
					$(slide_show.gallery_slideshow_img + slideshow_id).attr("data-name", parseInt(info.current_image)+1); 
					$(slide_show.gallery_slideshow_img + slideshow_id).attr("src", info.image_url);
				}catch(e){
					console.log("Wasn't able to connect to database");
				};
			} else {
				console.log("Error, while trying to send a request to the server");
			}
			$('.title_gallery .loader_image').remove();
			slide_show.gallery_slideshow_path_finished = true;
		});
	});
});