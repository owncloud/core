$(document).ready(function() {
	function saveSettings() {
		var postData = {};
		postData[$(this).attr('name')] = $(this).is(":checked") ? "yes" : "no";
		$.post(OC.generateUrl('apps/federatedfilesharing/personalsettings/setuserconfig'), postData);
	}

	var userConfig = $('#federatedfilesharing_settings');
	userConfig.find('input[type=checkbox]').change(saveSettings);
});