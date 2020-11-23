/**
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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
 */

$(document).ready(function() {
	$.get(OC.generateUrl('/license/licenseMessage'), {app: 'core'})
		.done(function(data) {
			OC.Notification.showHtml(data.translated_message.join('<br/>'), {type: 'error'});
		});
});
