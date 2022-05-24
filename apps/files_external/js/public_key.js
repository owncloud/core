$(document).ready(function() {

	OCA.External.Settings.mountConfig.whenSelectAuthMechanism(function($tr, authMechanism, scheme, onCompletion) {
		if (scheme === 'publickey') {
			var config = $tr.find('.configuration');
			if (config.find('[name="public_key_generate"]').length === 0) {
				setupTableRow($tr, config);
				onCompletion.then(function() {
					// If there's no private key, build one
					var $privateKeyElem = config.find('[data-parameter="private_key"]');
					if ($privateKeyElem.length !== 0 && $privateKeyElem.val().length === 0) {
						// the private_key element might be removed in some scenarios such as
						// global mount showing in the personal mounts
						generateKeys($tr);
					}
				});
			}
		}
	});

	$('#externalStorage').on('click', '[name="public_key_generate"]', function(event) {
		event.preventDefault();
		var tr = $(this).parent().parent();
		generateKeys(tr);
	});

	function setupTableRow(tr, config) {
		$(config).append($(document.createElement('input'))
			.addClass('button auth-param')
			.attr('type', 'button')
			.attr('value', t('files_external', 'Generate keys'))
			.attr('name', 'public_key_generate')
		);
	}

	function generateKeys(tr) {
		var config = $(tr).find('.configuration');

		var $table = $(tr).parentsUntil('#files_external', '#externalStorage');
		var isAdmin = $table.data('admin');

		var postData = {};
		if (!isAdmin) {
			postData = {
				'userId': OC.currentUser
			};
		}
		$.post(OC.filePath('files_external', 'ajax', 'public_key.php'), postData, function(result) {
			if (result && result.status === 'success') {
				$(config).find('[data-parameter="public_key"]').val(result.data.public_key).keyup();
				$(config).find('[data-parameter="private_key"]').val(result.data.private_key);
				OCA.External.Settings.mountConfig.saveStorageConfig(tr, function() {
					// Nothing to do
				});
			} else {
				OC.dialogs.alert(result.data.message, t('files_external', 'Error generating key pair') );
			}
		});
	}
});
