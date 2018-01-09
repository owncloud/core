$(document).ready(function() {
	var backendId = 'googledrive';
	var backendUrl = OC.generateUrl('apps/files_external/ajax/oauth2.php');

	function generateUrl($tr) {
		// no mapping between client ID and Google 'project', so we always load the same URL
		return 'https://console.developers.google.com/';
	}

	OCA.External.Settings.mountConfig.whenSelectBackend(function($tr, backend, onCompletion) {
		if (backend === backendId) {
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
	 * The files_external_{backendId} app's CUSTOM JS should handle the OAuth2 events itself
	 * instead on relying on the core for the implemention. These two functions
	 * [1] OCA.External.Settings.OAuth2.getAuthUrl, [2] OCA.External.Settings.OAuth2.verifyCode
	 * abstract away the details of sending the request to backend for getting the AuthURL or
	 * verifying the code, mounting the storage config etc
	 */
	$('.configuration').on('oauth_step1', function (event, data) {
		if (data['backend_id'] !== backendId) {
			return;	// means the trigger is not for this storage adapter
		}

		// Redirects the User on success else displays an alert (with error message sent by backend)
		OCA.External.Settings.OAuth2.getAuthUrl(backendUrl, data);
	});

	$('.configuration').on('oauth_step2', function (event, data) {
		if (data['backend_id'] !== backendId || data['code'] === undefined) {
			return;		// means the trigger is not for this OAuth2 grant
		}

		OCA.External.Settings.OAuth2.verifyCode(backendUrl, data)
		.fail(function (message) {
			OC.dialogs.alert(message,
				t('files_external', 'Error verifying OAuth2 Code for ' + backendId)
			);
		})
	});

});
