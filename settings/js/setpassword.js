(function () {
	var SetPassword = {
		init : function() {
			$('#set-password #submit').click(this.onClickSetPassword);
		},

		onClickSetPassword : function(event){
			var passwordObj = $('#password');
			var retypePasswordObj = $('#retypepassword');
			passwordObj.parent().removeClass('shake');
			event.preventDefault();
			if (passwordObj.val() === retypePasswordObj.val()) {
				$.post(
					passwordObj.parents('form').attr('action'),
					{password: passwordObj.val()}
				).done(function (result) {
					OCA.UserManagement.SetPassword._resetDone(result);
				}).fail(function (result) {
					OCA.UserManagement.SetPassword._onSetPasswordFail(result);
				});
			} else {
				//Password mismatch happened
				passwordObj.val('');
				retypePasswordObj.val('');
				passwordObj.parent().addClass('shake');
				$('#message').addClass('warning');
				$('#message').text('Passwords do not match');
				$('#message').show();
				passwordObj.focus();
			}
		},

		_onSetPasswordFail: function(result) {
			var responseObj = JSON.parse(result.responseText);
			var errorObject = $('#error-message');
			var showErrorMessage = false;

			var errorMessage;
			errorMessage = responseObj.message;

			if (!errorMessage) {
				errorMessage = t('core', 'Failed to set password. Please contact your administrator.');
			}

			errorObject.text(errorMessage);
			errorObject.show();
			$('#submit').prop('disabled', false);
		},

		_resetDone : function(result){
			if (result && result.status === 'success') {
				var getRootPath = OC.getRootPath();
				if (getRootPath === '') {
					/**
					 * If owncloud is not run inside subfolder, the getRootPath
					 * will return empty string
					 */
					getRootPath = "/";
				}
				OC.redirect(getRootPath);
			}
		}
	};

	if (!OCA.UserManagement) {
		OCA.UserManagement = {};
	}
	OCA.UserManagement.SetPassword = SetPassword;
})();

$(document).ready(function () {
	OCA.UserManagement.SetPassword.init();
	$('#password').keypress(function () {
		/*
		 The warning message should be shown only during password mismatch.
		 Else it should not.
		 */
		if (($('#password').val().length >= 0) && ($('#retypepassword').val().length === 0)) {
			$('#message').removeClass('warning');
			$('#message').text('');
		}
	});
});
