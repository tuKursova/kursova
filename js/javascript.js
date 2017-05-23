//flog variables
var flog_effect_div = "div[name='flog_effect']";
var flog_effect_image = "div[name='flog_effect'] img";
//end flog variables

//gallery images variables
var size_cookie = "size_images_gallery";

var images_in_gallery = ".main_div[data-type='gallery'] img";
var select_menu_path = "select[name='image_size']";
//end gallery images variables

function find_cookie(cookies, search_for_cookie) {
	for(i = 0; i < cookies.length; i++) {
		cookies[i] = cookies[i].split("=");
		if(cookies[i][0].replace(/\n|\s/g, '') == search_for_cookie)
			return i;
	}
	return -1;
}

//init gallery
function set_gallery_size__select_menu(image_info) {
	$(select_menu_path).prepend("<option selected>" + image_info + "</option>");
}

function set_gallery_size__image(image_info) {
	$(images_in_gallery).css( { "height":image_info, "width":image_info } );
}

function set_current_menu_selected() {
	var path = ".top_menu li a";
	var current_location = location.pathname.substr(1);
	$(path).each(function() {
		if($(this).attr('href') ==  current_location) {
			$(this).css({"border-color":"white", "border-bottom":"1px solid white"});
			return false;	// breaking from each function, according to the documentation
		}
	});
}

function set_gallery_size() {
	//find cookie
	var cookies = document.cookie.split(";");
	var index = find_cookie(cookies, size_cookie);
	//end find cookie
	if(index >= 0) {
		var image_info = cookies[index][1];
		set_gallery_size__image(image_info);
		set_gallery_size__select_menu(image_info);
	}
}
//init gallery

// --------- MAIN PART --------- //

$(document).ready( function() {
	set_gallery_size();
	set_current_menu_selected();

	$(select_menu_path).change( function() {
		$(images_in_gallery).css({"height":this.value, "width":this.value});
		$(select_menu_path).val(this.value);
		document.cookie = size_cookie + "=" + this.value;
	});
	
	$(images_in_gallery).click( function () {
		var image_link = $(this).attr("src");
		$('body').append('<div name="flog_effect"><img src=""/></div>');
		$(flog_effect_image).attr("src", image_link);
		$('<img src="' + image_link + '" />').load( function () {
			$(flog_effect_image).css( { "max-width":this.width, "max-height":this.height } );
		});
	});
	
	$('body').on('click', flog_effect_div, function() {
		$(this).remove();
	}); 
});

// --------- END MAIN PART --------- //