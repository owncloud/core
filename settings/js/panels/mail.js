$(document).ready(function() {

	$('#mail_smtpauth').change(function () {
		if (!this.checked) {
			$('#mail_credentials').addClass('hidden');
		} else {
			$('#mail_credentials').removeClass('hidden');
		}
	});

	$('#mail_smtpmode').change(function () {
		if ($(this).val() !== 'smtp') {
			$('#setting_smtpauth').addClass('hidden');
			$('#setting_smtphost').addClass('hidden');
			$('#mail_smtpsecure_label').addClass('hidden');
			$('#mail_smtpsecure').addClass('hidden');
			$('#mail_credentials').addClass('hidden');
		} else {
			$('#setting_smtpauth').removeClass('hidden');
			$('#setting_smtphost').removeClass('hidden');
			$('#mail_smtpsecure_label').removeClass('hidden');
			$('#mail_smtpsecure').removeClass('hidden');
			if ($('#mail_smtpauth').is(':checked')) {
				$('#mail_credentials').removeClass('hidden');
			}
		}
	});

	$('#mail_general_settings_form').change(function () {
		OC.msg.startSaving('#mail_settings_msg');
		var post = $("#mail_general_settings_form").serialize();
		$.post(OC.generateUrl('/settings/admin/mailsettings'), post, function (data) {
			OC.msg.finishedSaving('#mail_settings_msg', data);
		});
	});

	$('#mail_credentials_settings_submit').click(function () {
		OC.msg.startSaving('#mail_settings_msg');
		var post = $("#mail_credentials_settings").serialize();
		$.post(OC.generateUrl('/settings/admin/mailsettings/credentials'), post, function (data) {
			OC.msg.finishedSaving('#mail_settings_msg', data);
		});
	});

	$('#sendtestemail').click(function (event) {
		event.preventDefault();
		OC.msg.startAction('#sendtestmail_msg', t('settings', 'Sending...'));
		$.post(OC.generateUrl('/settings/admin/mailtest'), '', function (data) {
			OC.msg.finishedAction('#sendtestmail_msg', data);
		});
	});

});