/*
 * Copyright (c) 2014
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

function switchPublicFolder() {
	var publicEnable = $('#publicEnable').is(':checked');
	// find all radiobuttons of that group
	var sharingaimGroup = $('input:radio[name=sharingaim]');
	$.each(sharingaimGroup, function(index, sharingaimItem) {
		// set all buttons to the correct state
		sharingaimItem.disabled = !publicEnable;
	});
}

function setUpload(val, success, failure) {
	$.post(OC.generateUrl('apps/files/ajax/setupload.php'), {maxUploadSize: val})
		.done(success)
		.error(failure);
}

$(document).ready(function() {
	// Execute the function after loading DOM tree
	switchPublicFolder();
	$('#publicEnable').click(function() {
		// To get rid of onClick()
		switchPublicFolder();
	});

	$('#submitFilesAdminSettings').click(function(event) {
		event.preventDefault();
		$('#setUploadMessage').remove();
		setUpload($('#maxUploadSize').val(), function(data) {
			// Success
			if(data.data != null) {
				$('#maxUploadSize').val(data.data);
			}
			// Say it saved
			$('#submitFilesAdminSettings').after('<span class="msg success" id="setUploadMessage">'+t('files', 'Saved')+'</span>');
			setTimeout(function() {
				$('#setUploadMessage').remove();
			},3000);
		}, function(err) {
			// Failure
			$('#submitFilesAdminSettings').after('<span class="msg error" id="setUploadMessage">'+t('files', 'There was an error saving')+'</span>');
		});
	});

});
