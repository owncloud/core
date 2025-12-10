/**
 * Copyright (c) 2018, ownCloud GmbH
 *
 * @author Lukas Reschke <lukas@owncloud.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

$(document).ready(function(){
	$('#release-channel').change(function() {
		var newChannel = $('#release-channel').find(":selected").val();

		if (newChannel === 'git' || newChannel === 'daily') {
			$('#oca_updatenotification_groups em').removeClass('hidden');
		} else {
			$('#oca_updatenotification_groups em').addClass('hidden');
		}

		$.post(
			OC.generateUrl('/apps/updatenotification/channel'),
			{
				'channel': newChannel
			},
			function(data){
				OC.msg.finishedAction('#channel_save_msg', data);
			}
		);
	});

	var $notificationTargetGroups = $('#oca_updatenotification_groups_list');
	OC.Settings.setupGroupsSelect($notificationTargetGroups);
	$notificationTargetGroups.change(function(ev) {
		var groups = ev.val || [];
		groups = JSON.stringify(groups);
		OC.AppConfig.setValue('updatenotification', 'notify_groups', groups);
	});
});
