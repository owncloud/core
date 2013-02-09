$(window).resize(function() {
	$('#ifm').css('height', $(window).height() - $('#header').height() - $('controls').height());
});
$(window).ready(function(){
	$(window).trigger('resize');
});