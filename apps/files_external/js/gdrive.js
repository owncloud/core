$(document).ready(function() {
	var storageId = 'googledrive';
	var backendUrl = OC.filePath('files_external', 'ajax', 'oauth2.php');

	function generateUrl($tr) {
		// no mapping between client ID and Google 'project', so we always load the same URL
		return 'https://console.developers.google.com/';
	}

	OCA.External.Settings.mountConfig.whenSelectBackend(function($tr, backend, onCompletion) {
		if (backend === storageId) {
			var backendEl = $tr.find('.backend');
			var el = $(document.createElement('a'))
				.attr('href', generateUrl($tr))
				.attr('target', '_blank')
				.attr('title', t('files_external', 'Google Drive App Configuration'))
				.addClass('icon-settings svg')
			;
			el.on('click', function(event) {
				var a = $(event.target);
				a.attr('href', generateUrl($(this).closest('tr')));
			});
			el.tooltip({placement: 'top'});
			backendEl.append(el);
		}
	});

	/**
	 * ------- OAUTH2 Events ----------
	 * 
	 * The files_external_{storageId} app's CUSTOM JS should handle the OAuth2 events itself
	 * instead on relying on the core for the implemention. These two functions
	 * [1] OCA.External.Settings.OAuth2.getAuthUrl, [2] OCA.External.Settings.OAuth2.verifyCode
	 * abstract away the details of sending the request to backend for getting the AuthURL or
	 * verifying the code, mounting the storage config etc
	 */
	$('.configuration').on('oauth_step1', function (event, data) {
		if (data['storage_id'] !== storageId) {
			return false;	// means the trigger is not for this storage adapter
		}

		OCA.External.Settings.OAuth2.getAuthUrl(backendUrl, data, function (authUrl) {
			// (Optional) do some extra task - then control shifts back to getAuthUrl
		})
	});

	$('.configuration').on('oauth_step2', function (event, data) {
		if (data['storage_id'] !== storageId || data['code'] === undefined) {
			return false;		// means the trigger is not for this OAuth2 grant
		}

		OCA.External.Settings.OAuth2.verifyCode(backendUrl, data, function (storageConfig) {
			// do any additional task once storage is verified
		})
	});

});
