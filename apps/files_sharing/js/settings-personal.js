$(document).ready(function() {
	function saveSettings() {
		var postData = {};
		postData[$(this).attr('name')] = $(this).is(":checked") ? "yes" : "no";
		$.post(OC.generateUrl('apps/files_sharing/personalsettings/setuserconfig'), postData);
	}

	var userConfig = $('#files_sharing_settings');
	userConfig.find('input[type=checkbox]').change(saveSettings);
});