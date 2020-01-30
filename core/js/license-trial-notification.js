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

/**
 * This gets only loaded if the integrity check has failed and then shows a notification
 */
$(document).ready(function(){
	var text = t(
			'core',
			'<a href="{trialsUrl}">There are apps running under a trial period. More information…</a>',
			{
				trialsUrl: OC.generateUrl('/settings/admin?sectionid=general#trials')
			}
	);

	OC.Notification.showHtml(
		text,
		{
			isHTML: true
		}
	);
});
