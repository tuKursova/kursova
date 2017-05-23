$(document).ready( function() {
	$('ul.top_menu li#hide_button').click( function() {
		$('ul.top_menu li:not(#hide_button)').toggle(100);
	});
});