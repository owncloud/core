$(document).ready(function() {

	function displayGranted($tr) {
		$tr.find('.configuration input.auth-param').attr('disabled', 'disabled').addClass('disabled-success');
	}

	OCA.External.Settings.mountConfig.whenSelectAuthMechanism(function($tr, authMechanism, scheme, onCompletion) {
		if (authMechanism === 'oauth2::oauth2') {
			var config = $tr.find('.configuration');
			config.append($(document.createElement('input'))
				.addClass('button auth-param')
				.attr('type', 'button')
				.attr('value', t('files_external', 'Grant access'))
				.attr('name', 'oauth2_grant')
			);

			onCompletion.then(function() {
				var configured = $tr.find('[data-parameter="configured"]');
				if ($(configured).val() == 'true') {
					displayGranted($tr);
				} else {
					var client_id = $tr.find('.configuration [data-parameter="client_id"]').val();
					var client_secret = $tr.find('.configuration [data-parameter="client_secret"]').val();

					var params = {};
					window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
						params[key] = value;
					});

					if (
						params.code !== undefined
						&& typeof client_id === "string"
						&& client_id !== ''
						&& typeof client_secret === "string"
						&& client_secret !== ''
					) {
						$tr.find('.configuration').trigger('oauth_step2', [{
							backend_id: $tr.attr('class'),
							client_id: client_id,
							client_secret: client_secret,
							redirect: location.protocol + '//' + location.host + location.pathname + '?sectionid=storage',
							tr: $tr,
							code: params.code || ''
						}]);
					}
				}
			});
		}
	});

	$('#externalStorage').on('click', '[name="oauth2_grant"]', function(event) {
		event.preventDefault();
		var tr = $(this).parent().parent();
		var client_id = $(this).parent().find('[data-parameter="client_id"]').val();
		var client_secret = $(this).parent().find('[data-parameter="client_secret"]').val();
		
		if (client_id !== '' && client_secret !== '') {
			var button = $(event.target);
			button.prop('disabled', true);

			tr.one('oauth_step1_finished', function(event, data){
				if (!data['success']) {
					button.prop('disabled', false);
				}
			});

			tr.find('.configuration').trigger('oauth_step1', [{
				backend_id: tr.attr('class'),
				client_id: client_id,
				client_secret: client_secret,
				redirect: location.protocol + '//' + location.host + location.pathname + '?sectionid=storage',
				tr: tr
			}]);
		}
	});

});
