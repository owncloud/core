$(document).ready(function() {

	// run setup checks then gather error messages
	$.when(
		OC.SetupChecks.checkWebDAV(),
		OC.SetupChecks.checkWellKnownUrl('/.well-known/caldav/', oc_defaults.docPlaceholderUrl, $('#postsetupchecks').data('check-wellknown') === 'true'),
		OC.SetupChecks.checkWellKnownUrl('/.well-known/carddav/', oc_defaults.docPlaceholderUrl, $('#postsetupchecks').data('check-wellknown') === 'true'),
		OC.SetupChecks.checkSetup(),
		OC.SetupChecks.checkGeneric(),
		OC.SetupChecks.checkDataProtected()
	).then(function (check1, check2, check3, check4, check5, check6) {
		var messages = [].concat(check1, check2, check3, check4, check5, check6);
		var $el = $('#postsetupchecks');
		$el.find('.loading').addClass('hidden');

		var hasMessages = false;
		var $errorsEl = $el.find('.errors');
		var $warningsEl = $el.find('.warnings');
		var $infoEl = $el.find('.info');

		for (var i = 0; i < messages.length; i++) {
			switch (messages[i].type) {
				case OC.SetupChecks.MESSAGE_TYPE_INFO:
					$infoEl.append('<li>' + messages[i].msg + '</li>');
					break;
				case OC.SetupChecks.MESSAGE_TYPE_WARNING:
					$warningsEl.append('<li>' + messages[i].msg + '</li>');
					break;
				case OC.SetupChecks.MESSAGE_TYPE_ERROR:
				default:
					$errorsEl.append('<li>' + messages[i].msg + '</li>');
			}
		}

		if ($errorsEl.find('li').length > 0) {
			$errorsEl.removeClass('hidden');
			hasMessages = true;
		}
		if ($warningsEl.find('li').length > 0) {
			$warningsEl.removeClass('hidden');
			hasMessages = true;
		}
		if ($infoEl.find('li').length > 0) {
			$infoEl.removeClass('hidden');
			hasMessages = true;
		}

		if (hasMessages) {
			$el.find('.hint').removeClass('hidden');
		} else {
			var securityWarning = $('#security-warning');
			if (securityWarning.children('ul').children().length === 0) {
				$('#security-warning-state').find('span').removeClass('hidden');
			}
		}
	});

});