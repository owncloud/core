/*
 * Copyright (c) 2018
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function () {
	var TEMPLATE =
		'<ul class="locks"></ul>' +
		'<div class="clear-float"></div>' +
		'{{#each locks}}' +
		'<div class="lock-entry" data-index="{{index}}">' +
		'<div style="display: inline;">{{displayText}}</div>' +
		// TODO: no inline css
		'<a href="#" class="unlock" style="float: right" title="{{unlockLabel}}">' +
		'<span class="icon icon-lock-open" style="display: block" /></a>' +
		'</div>' +
		'{{else}}' +
		'<div class="empty">{{emptyResultLabel}}</div>' +
		'{{/each}}' +
		'';

	function formatLocks(locks) {
		var client = OC.Files.getClient();

		return _.map(locks, function(lock, index) {
			var path = client.getRelativePath(lock.lockroot) || lock.lockroot;

			// TODO: what if user in root doesn't match ?

			return {
				index: index,
				displayText: t('files', '{owner} has locked this resource via {path}', {owner: lock.owner, path: path}),
				locktoken: lock.locktoken,
				lockroot: lock.lockroot
			};
		});
	}

	/**
	 * @memberof OCA.Files
	 */
	var LockTabView = OCA.Files.DetailTabView.extend(
		/** @lends OCA.Files.LockTabView.prototype */ {
			id: 'lockTabView',
			className: 'tab lockTabView',

			events: {
				'click a.unlock': '_onClickUnlock'
			},

			_onClickUnlock: function (event) {
				var self = this;
				var $target = $(event.target).closest('.lock-entry');
				var lockIndex = parseInt($target.attr('data-index'), 10);

				var currentLock = this.model.get('activeLocks')[lockIndex];

				// FIXME: move to FileInfoModel
				this.model._filesClient.getClient().request('UNLOCK',
					currentLock.lockroot,
					{
						'Lock-Token': currentLock.locktoken
					}).then(function (result) {
						if (result.status === 204) {
							// implicit clone of array else backbone doesn't fire change event
							var locks = _.without(self.model.get('activeLocks') || [], currentLock);
							self.model.set('activeLocks', locks);
							self.render();
						}
						else if (result.status === 403) {
							OC.Notification.show(t('files', 'Could not unlock, please contact the lock owner {owner}', {owner: currentLock.owner}));
						} else {
							// TODO: add more information
							OC.Notification.show(t('files', 'Unlock failed with status {status}', {status: result.status}));
						}
				});
			},

			getLabel: function () {
				return t('files', 'Locks');
			},

			template: function (data) {
				if (!this._template) {
					this._template = Handlebars.compile(TEMPLATE);
				}

				return this._template(data);
			},

			/**
			 * Renders this details view
			 */
			render: function () {
				if (!this.model) {
					return;
				}
				this.$el.html(this.template({
					emptyResultLabel: t('files', 'Resource is not locked'),
					locks: formatLocks(this.model.get('activeLocks'))
				}));
			},

			/**
			 * Returns whether the current tab is able to display
			 * the given file info, for example based on mime type.
			 *
			 * @param {OCA.Files.FileInfoModel} fileInfo file info model
			 * @return {bool} whether to display this tab
			 */
			canDisplay: function(fileInfo) {
				// don't display if no lock is set
				return fileInfo && fileInfo.get('activeLocks') && fileInfo.get('activeLocks').length > 0;
			}
		});

	OCA.Files.LockTabView = LockTabView;
})();

