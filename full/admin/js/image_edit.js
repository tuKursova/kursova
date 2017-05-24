var remove_image_path = "ul li img";
var add_image_path = "ul.adding_image "; 
var add_image_path_status = "ul.adding_image li[id='status']"; 

$(document).ready( function() {
	$(remove_image_path).click( function () {
		var id = $(this).attr("id");
		$("ul[id='" + id + "']").remove();
		$.get("includes/delete_request.php", { "id" : id }, function(data, status) {
			if(status != "success")
				alert("error");
		}); 
	});
	
	$(add_image_path + " input[type='submit']").click( function() { 
		$(add_image_path_status).text (function () {
			return "Sending..";
		});
		var name = $(add_image_path + "li input[name='name']").val();
		var url = $(add_image_path + "li input[name='url']").val();
		var gallery_id = $(add_image_path + "li select").find(":selected").attr("id");
		$(add_image_path + "li input[name='name']").val(function() { return ""; });
		$(add_image_path + "li input[name='url']").val(function() { return ""; });
		$.get("includes/insert_request.php", { "name" : name, "url" : url, "gallery_id" : gallery_id },function(data, status) {
			if(status == "success") {
				$(add_image_path_status).text (function () {
					return "Sended";
				});
			} else {
				alert("error");
			}
		});
	});
	
});