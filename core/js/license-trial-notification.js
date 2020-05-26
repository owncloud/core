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
 * This gets only loaded if there is a grace period active
 */
OC.License = {
	NOTIFICATION_TEMPLATE:
		'<div id="license_notification" title="{{title}}">' +
		'  <div>' +
		'    {{#each msgs}}' +
		'    <p>' +
		'      {{this}}' +
		'    </p>' +
		'    {{/each}}' +
		'    <br/>' +
		'    <p><a class="button" target="_blank" href="{{clickable_link}}">{{clickable_link_text}}</a></p>' +
		'    <br/>' +
		'    <p>{{time_remaining_msg}}</p>' +
		'  </div>' +
		'  <div style="display:flex">' +
		'  <input id="license" type="text" placeholder="{{placeholder}}" style="flex:1 1 auto"/>' +
		'  <button id="license_button">{{license_button_text}}</button>' +
		'  </div>' +
		'</div>',

	showNotification: function() {
		if (!this._template) {
			this._template = Handlebars.compile(this.NOTIFICATION_TEMPLATE);
		}

		var tmpl = this._template;
		var self = this;

		$.get(OC.generateUrl('/license/graceperiod'))
			.done(function(data) {
				if (!data || data.apps < 1) {
					return;
				}

				var link = 'https://owncloud.com/try-enterprise/';
				if (data.demoKeyLink) {
					link = data.demoKeyLink;
				}

				// adjust moment's time thresholds for better accuracy:
				// it will show "24 hours" instead of "a day" and "89 minutes" instead of "2 hours"
				// we'll have to restore the defaults afterwards.
				var thresholdH = moment.relativeTimeThreshold('h');
				var thresholdM = moment.relativeTimeThreshold('m');
				moment.relativeTimeThreshold('h', 25);
				moment.relativeTimeThreshold('m', 90);
				var relativeTime = moment(data.end * 1000).fromNow(true);
				moment.relativeTimeThreshold('h', thresholdH);
				moment.relativeTimeThreshold('m', thresholdM);

				var paragraphs = [
					t('core', 'You have enabled one or more ownCloud Enterprise apps but your installation does not have a valid license yet.'),
					t('core', 'A grace period of 24 hours has started to allow you to get going right away. Once the grace period ends, all Enterprise apps will become disabled unless you supply a valid license key.'),
					t('core', 'To try ownCloud Enterprise, just start a 30-day demo and enter the provided license key below.')
				];

				var dialog = $(tmpl({
					title: t('core', 'Upgrade to ownCloud Enterprise'),
					msgs: paragraphs,
					time_remaining_msg: t('core', 'Remaining time: {rtime}', {
						rtime: relativeTime
					}),
					clickable_link: link,
					clickable_link_text: t('core', 'Get your demo key'),
					placeholder: t('core', 'Enter license key'),
					license_button_text: t('core', 'Set new key')
				}))
					.appendTo('body')
					.ocdialog({
						modal: true
					});

				self._initializeDialogEvents(dialog);
			});
	},

	_initializeDialogEvents: function(jqDialog) {
		jqDialog.on("ocdialogclose", function() {
			jqDialog.remove();
		});

		jqDialog.find('#license_button').click(function () {
			var license = jqDialog.find('#license').val();
			$.post(OC.generateUrl('/license/license'), {
				licenseString: license
			}).done(function () {
				jqDialog.ocdialog('close');
			})
		});
	}
}

$(document).ready(function(){
	OC.License.showNotification();
});
