/*
 * Copyright (c) 2019
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

$(document).ready(function() {
	if (!OC.isUserAdmin()) {
		// if the user isn't admin, do nothing
		return;
	}

	$.get(OC.generateUrl('/sync/info'))
		.done(function(data) {
			$.each(data, function(backend, info) {
				var enabledUsers = 0;
				if (info.usersStats['Enabled']) {
					enabledUsers += info.usersStats['Enabled'];
				}
				if (info.usersStats['Auto Disabled']) {
					enabledUsers += info.usersStats['Auto Disabled'];
				}

				if (enabledUsers > info.limits.hard) {
					$message = t('core', '{backend} has more than the allowed {userCount} users. Several users have been disabled. Please contact {entity} for additional information', {
						backend: backend,
						userCount: info.limits.hard,
						entity: OC.theme.entity
					});
					OC.Notification.show($message);
				} else if (enabledUsers > info.limits.soft) {
					if (info.warningRead.soft <= 0) {
						// soft warning already read. No need to show it again
						$message = t('core', '{backend} is getting close to the allowed limit of {userCount} users. Please contact {entity} for additional information', {
							backend: backend,
							userCount: info.limits.hard,
							entity: OC.theme.entity
						});
						OC.Notification.show($message, {
							type: 'error',
							onCloseButtonClicked: function() {
								$.post(OC.generateUrl('/sync/notifyRead'), {
									backend: backend,
									type: 'soft'
								});
							}
						});
					}
				}
			});
		});
})