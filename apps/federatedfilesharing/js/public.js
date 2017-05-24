$(document).ready(function() {
	$('#header #details').prepend(
		'<span id="save">' +
		'	<button id="save-button">'+t('files_sharing', 'Add to your ownCloud')+'</button>' +
		'	<form class="save-form hidden" action="#">' +
		'		<input type="text" id="remote_address" placeholder="example.com/owncloud"/>' +
		'		<button id="save-button-confirm" class="icon-confirm svg" disabled></button>' +
		'	</form>' +
		'</span>');
});
