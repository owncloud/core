$(document).ready(function(){
	var params = OC.Util.History.parseUrlQuery();

	$('#excludedGroups').each(function (index, element) {
		OC.Settings.setupGroupsSelect($(element));
		$(element).change(function(ev) {
			var groups = ev.val || [];
			groups = JSON.stringify(groups);
			OC.AppConfig.setValue('core', $(this).attr('name'), groups);
		});
	});


	$('#loglevel').change(function () {
		$.post(OC.generateUrl('/settings/admin/log/level'), {level: $(this).val()}).done(function (data) {
			OC.msg.finishedAction('#log_level_save_msg', data);
		}).fail(function (data) {
			OC.msg.finishedAction('#log_level_save_msg', data.responseJSON);
		});
	});

	$('#shareAPIEnabled').change(function() {
		$('#shareAPI p:not(#enable)').toggleClass('hidden', !this.checked);
	});

	$('#enableEncryption').change(function() {
		$('#encryptionAPI div#EncryptionWarning').toggleClass('hidden');
	});

	$('#reallyEnableEncryption').click(function() {
		$('#encryptionAPI div#EncryptionWarning').toggleClass('hidden');
		$('#encryptionAPI div#EncryptionSettingsArea').toggleClass('hidden');
		OC.AppConfig.setValue('core', 'encryption_enabled', 'yes');
		$('#enableEncryption').attr('disabled', 'disabled');
	});

	$('#startmigration').click(function(event){
		$(window).on('beforeunload.encryption', function(e) {
			return t('settings', 'Migration in progress. Please wait until the migration is finished');
		});
		event.preventDefault();
		$('#startmigration').prop('disabled', true);
		OC.msg.startAction('#startmigration_msg', t('settings', 'Migration started …'));
		$.post(OC.generateUrl('/settings/admin/startmigration'), '', function(data){
			OC.msg.finishedAction('#startmigration_msg', data);
			if (data['status'] === 'success') {
				$('#encryptionAPI div#selectEncryptionModules').toggleClass('hidden');
				$('#encryptionAPI div#migrationWarning').toggleClass('hidden');
			} else {
				$('#startmigration').prop('disabled', false);
			}
			$(window).off('beforeunload.encryption');

		});
	});

	$('#shareapiExpireAfterNDays').change(function() {
		var value = $(this).val();
		if (isNaN(value) || (parseInt(value, 10) <= 0) || parseInt(value, 10).toString() !== value) {
			$(this).val('7');
		}
	});

	$('#shareAPI input:not(.noautosave)').change(function() {
		var value = $(this).val();
		if ($(this).attr('type') === 'checkbox') {
			if (this.checked) {
				value = 'yes';
			} else {
				value = 'no';
			}
		}
		OC.AppConfig.setValue('core', $(this).attr('name'), value);
	});

	$('#shareapiDefaultExpireDate').change(function() {
		$("#setDefaultExpireDate").toggleClass('hidden', !this.checked);
	});


	$('#shareapiExpireAfterNDaysUserShare').change(function() {
		var value = parseInt($(this).val(), 10)

		if (value <= 0 || isNaN(value)) {
			$(this).val(7);
		}
	});

	$('#shareapiDefaultExpireDateUserShare').change(function() {
		$("#setDefaultExpireDateUserShare").toggleClass('hidden', !this.checked);
	});

	$('#shareapiExpireAfterNDaysGroupShare').change(function() {
		var value = parseInt($(this).val(), 10)

		if (value <= 0 || isNaN(value)) {
			$(this).val(7);
		}
	});

	$('#shareapiDefaultExpireDateGroupShare').change(function() {
		$("#setDefaultExpireDateGroupShare").toggleClass('hidden', !this.checked);
	});

	$('#shareapiExpireAfterNDaysRemoteShare').change(function() {
		var value = parseInt($(this).val(), 10)

		if (value <= 0 || isNaN(value)) {
			$(this).val(7);
		}
	});

	$('#shareapiDefaultExpireDateRemoteShare').change(function() {
		$("#setDefaultExpireDateRemoteShare").toggleClass('hidden', !this.checked);
	});

	$('#allowLinks').change(function() {
		$("#publicLinkSettings").toggleClass('hidden', !this.checked);
		$('#setDefaultExpireDate').toggleClass('hidden', !(this.checked && $('#shareapiDefaultExpireDate')[0].checked));
	});

	$('#allowPublicMailNotification').change(function() {
		$("#publicMailNotificationLang").toggleClass('hidden', !this.checked);
	});

	$('#shareapiPublicNotificationLang').change(function() {
		var value = $(this).val();
		if (value === 'owner') {
			OC.AppConfig.deleteKey('core', $(this).attr('name'));
		} else {
			OC.AppConfig.setValue('core', $(this).attr('name'), $(this).val());
		}
	});


	$('#allowGroupSharing').change(function() {
		$('#allowGroupSharing').toggleClass('hidden', !this.checked);
	});

	$('#shareapiExcludeGroups').change(function() {
		$("#selectExcludedGroups").toggleClass('hidden', !this.checked);
	});

	$('#shareApiDefaultPermissionsSection input').change(function(ev) {
		var $el = $('#shareApiDefaultPermissions');
		var $target = $(ev.target);

		var value = $el.val();
		if ($target.is(':checked')) {
			value = value | $target.val();
		} else {
			value = value & ~$target.val();
		}

		// always set read permission
		value |= OC.PERMISSION_READ;

		// this will trigger the field's change event and will save it
		$el.val(value).change();

		ev.preventDefault();

		return false;
	});

	var $additionalInfo = $('#coreUserAdditionalInfo');
	$additionalInfo.val($additionalInfo.attr('data-value'));
	$additionalInfo.change(function(ev) {
		$(this).attr('data-value', $(this).val());
		OC.AppConfig.setValue('core', $(this).attr('name'), $(this).val());
	});
});
