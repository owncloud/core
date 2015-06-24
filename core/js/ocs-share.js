OC.OCSShare={
	share:function(path, shareType, shareWith, permissions, expirationDate, password, callback) {
		var args = {
			format: 'json',
			path: path,
			shareType: shareType
		}

		if (shareWith) {
			args.shareWith = shareWith;
		}
		if (permissions) {
			args.permissions = permissions;
		}
		if (expirationDate) {
			args.expirationDate = expirationDate;
		}
		if (password) {
			args.password = password;
		}

		$.ajax({
			url: OC.linkToOCS('apps/files_sharing/api/v1') + 'shares?format=json',
			type: 'post',
			data: args,
			success: function(result) {
				if (result.ocs.meta.statuscode === 100) {
					if (callback) {
						callback(result.ocs.data);
					}
				} else {
					if (result.ocs.meta.message) {
						var msg = result.ocs.meta.message;
					} else {
						var msg = t('core', 'Error');
					}
					OC.dialogs.alert(msg, t('core', 'Error'));
				}
			}
		});
	},

	unshare:function(id, callback) {
		$.ajax({
			url: OC.linkToOCS('apps/files_sharing/api/v1') + 'shares/' + id + '?format=json',
			type: 'delete',
			success: function(result) {
				if (result.ocs.meta.statuscode === 100) {
					if (callback) {
						callback();
					}
				} else {
					OC.dialogs.alert(t('core', 'Error while unsharing'), t('core', 'Error'));
				}
			}
		});
	}
};

