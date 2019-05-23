$(document).ready(function() {
	function saveSettings() {
		var postData = {};
		postData[$(this).attr('name')] = $(this).is(":checked") ? "yes" : "no";
		$.post(OC.generateUrl('apps/files_sharing/personalsettings/setuserconfig'), postData);
	}

	function saveShareFolder() {
		var postData = {};
		var shareFolder =  $('#share_folder_input');
		postData[shareFolder.attr('name')] = shareFolder.val();
		OC.msg.startSaving('#share_folder_save_message');
		$.post(
			OC.generateUrl('apps/files_sharing/personalsettings/setuserconfig'),
			postData
		).done(function(result){
			if(result.accepted.includes(shareFolder.attr('name'))) {
				OC.msg.finishedSuccess('#share_folder_save_message', t('files_sharing', 'Saved'));
				return;
			}
			OC.msg.finishedError('#share_folder_save_message', t('files_sharing', 'Not accepted'));
		}).fail(function(){
			OC.msg.finishedError('#share_folder_save_message', t('files_sharing', 'Not accepted'));
		});
	}

	var userConfig = $('#files_sharing_settings');
	userConfig.find('input[type=checkbox]').change(saveSettings);
	$('#share_folder_button').click(saveShareFolder);
});