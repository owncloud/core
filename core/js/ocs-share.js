OC.OCSShare={
	unshare:function(id, callback) {
		$.ajax({
			url: OC.linkToOCS('apps/files_sharing/api/v1/shares') + id + '?format=json',
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

