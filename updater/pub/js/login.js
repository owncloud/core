/**
 * Copyright (c) 2016
 *  Lukas Reschke <lukas@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or later.
 * See the COPYING-README file.
 */

var OC = {};
var loginToken;

(function(OC) {
	OC.Login = OC.Login || {};

	OC.Login = {
		onLogin: function () {
			loginToken = $('#password').val();
			$.ajax({
				url: '.',
				headers: {
					'X-Updater-Auth': loginToken,
				},
				method: 'POST',
				success: function(data){
					if(data !== 'false') {
						var body = $('body');
						body.html(data);
						body.removeAttr('id');
						body.attr('id', 'body-settings');
					} else  {
						$('#invalidPasswordWarning').show();
					}
				}
			});

			return false;
		}
	}

})(OC);

$(document).ready(function() {
	$('form[name=login]').submit(OC.Login.onLogin);
});
