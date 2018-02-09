/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

(function(OC, OCA) {

	if (!OCA.Notifications_Mail) {
		OCA.Notifications_Mail = {};
	}

	OCA.Notifications_Mail = {
		sendNotificationMailOptions: function(value) {
			OC.msg.startSaving('#email_notifications .msg');
			var requests = $.ajax({
				url: OC.generateUrl('/apps/notifications_mail/settings/personal/setEmailNotificationOption'),
				type: 'POST',
				data: {'value': value},
			}).done(function(result) {
				OC.msg.finishedSaving('#email_notifications .msg', result);
			}).fail(function(result) {
				OC.msg.finishedSaving('#email_notifications .msg', result.responseJSON);
			});
		}
	};
})(OC, OCA);

$(document).ready(function(){
	$('#email_sending_option').change(function(){
		OCA.Notifications_Mail.sendNotificationMailOptions($(this).val());
	});
});
