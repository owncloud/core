$(document).ready(function () {
	$('#header #details').prepend(
		'<span id="save">' +
		'<a href="#" class="button" id="save-to-oc-button">' +
		'<span id="save-to-oc-button-text">' +
		t('federatedfilesharing', 'Add to') + ' ' + OC.getHostName() +
		'<span></span>' +
		'</span>' +
		'<span id="save-to-oc-button-loading" class="hidden">' +
		t('federatedfilesharing', 'Loading...') +
		'<img src="' + OC.imagePath('core', 'loading-small.gif') + '"' +
		'</span>' +
		'</a>' +
		'<div id="save-to-oc-expand-container" class="menutoggle">' +
		'<a href="#" class="button" id="save-to-oc-button-expand">' +
		'		<img class="svg" alt="" src="'+ OC.imagePath('core', 'actions/triangle-s') +'">' +
		'</a>' +
		'<div id="expanddiv">' +
		'<ul>' +
		'<li><a id="current-server" href="#"><span class="icon icon-fed-current-server"></span>' + OC.getHostName() + '</a></li>' +
		'<li><a id="change-server" href="#"><span class="icon icon-fed-change-server"></span>' +
		t('federatedfilesharing', 'Change server...') +
		'	</a></li>' +
		'</ul>' +
		'</div>' +
		'</div>' +
		'</span>');
});
