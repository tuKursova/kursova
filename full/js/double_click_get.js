$(document).ready( function() {
	$('div.title_gallery').on('dblclick', function() {
		var id = $(this).attr('data-id');
		var code = '<iframe src="http://' + location.host + '/api/show.php?id=' + id + '&opacity=0.5&color=white&text=black" style="width:100%; height: 100%; border:0px; overflow: auto;"></iframe>';
		prompt("Ctrl+C to copy this code", code);
	});
});