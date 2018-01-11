/*
 * Copyright (c) 2014 Vincent Petry <pvince81@owncloud.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

if (!OCA.Sharing) {
	/**
	 * @namespace OCA.Sharing
	 */
	OCA.Sharing = {};
}
/**
 * @namespace
 */
OCA.Sharing.App = {

	_inFileList: null,
	_outFileList: null,

	initSharingIn: function($el) {
		if (this._inFileList) {
			return this._inFileList;
		}

		var fileActions = this._createFileActions();

		this._inFileList = new OCA.Sharing.FileList(
			$el,
			{
				id: 'shares.self',
				scrollContainer: $('#app-content'),
				sharedWithUser: true,
				fileActions: fileActions,
				config: OCA.Files.App.getFilesConfig()
			}
		);

		this._registerPendingShareActions(fileActions);
		this._extendFileList(this._inFileList);
		this._inFileList.appName = t('files_sharing', 'Shared with you');
		this._inFileList.$el.find('#emptycontent').html('<div class="icon-share"></div>' +
			'<h2>' + t('files_sharing', 'Nothing shared with you yet') + '</h2>' +
			'<p>' + t('files_sharing', 'Files and folders others share with you will show up here') + '</p>');
		return this._inFileList;
	},

	initSharingOut: function($el) {
		if (this._outFileList) {
			return this._outFileList;
		}
		this._outFileList = new OCA.Sharing.FileList(
			$el,
			{
				id: 'shares.others',
				scrollContainer: $('#app-content'),
				sharedWithUser: false,
				fileActions: this._createFileActions(),
				config: OCA.Files.App.getFilesConfig()
			}
		);

		this._extendFileList(this._outFileList);
		this._outFileList.appName = t('files_sharing', 'Shared with others');
		this._outFileList.$el.find('#emptycontent').html('<div class="icon-share"></div>' +
			'<h2>' + t('files_sharing', 'Nothing shared yet') + '</h2>' +
			'<p>' + t('files_sharing', 'Files and folders you share will show up here') + '</p>');
		return this._outFileList;
	},

	initSharingLinks: function($el) {
		if (this._linkFileList) {
			return this._linkFileList;
		}
		this._linkFileList = new OCA.Sharing.FileList(
			$el,
			{
				id: 'shares.link',
				scrollContainer: $('#app-content'),
				linksOnly: true,
				fileActions: this._createFileActions(),
				config: OCA.Files.App.getFilesConfig()
			}
		);

		this._extendFileList(this._linkFileList);
		this._linkFileList.appName = t('files_sharing', 'Shared by link');
		this._linkFileList.$el.find('#emptycontent').html('<div class="icon-public"></div>' +
			'<h2>' + t('files_sharing', 'No shared links') + '</h2>' +
			'<p>' + t('files_sharing', 'Files and folders you share by link will show up here') + '</p>');
		return this._linkFileList;
	},

	removeSharingIn: function() {
		if (this._inFileList) {
			this._inFileList.$fileList.empty();
		}
	},

	removeSharingOut: function() {
		if (this._outFileList) {
			this._outFileList.$fileList.empty();
		}
	},

	removeSharingLinks: function() {
		if (this._linkFileList) {
			this._linkFileList.$fileList.empty();
		}
	},

	/**
	 * Destroy the app
	 */
	destroy: function() {
		OCA.Files.fileActions.off('setDefault.app-sharing', this._onActionsUpdated);
		OCA.Files.fileActions.off('registerAction.app-sharing', this._onActionsUpdated);
		this.removeSharingIn();
		this.removeSharingOut();
		this.removeSharingLinks();
		this._inFileList = null;
		this._outFileList = null;
		this._linkFileList = null;
		delete this._globalActionsInitialized;
	},

	_createFileActions: function() {
		// inherit file actions from the files app
		var fileActions = new OCA.Files.FileActions();
		// note: not merging the legacy actions because legacy apps are not
		// compatible with the sharing overview and need to be adapted first
		fileActions.registerDefaultActions();
		fileActions.merge(OCA.Files.fileActions);

		if (!this._globalActionsInitialized) {
			// in case actions are registered later
			this._onActionsUpdated = _.bind(this._onActionsUpdated, this);
			OCA.Files.fileActions.on('setDefault.app-sharing', this._onActionsUpdated);
			OCA.Files.fileActions.on('registerAction.app-sharing', this._onActionsUpdated);
			this._globalActionsInitialized = true;
		}

		// when the user clicks on a folder, redirect to the corresponding
		// folder in the files app instead of opening it directly
		fileActions.register('dir', 'Open', OC.PERMISSION_READ, '', function (filename, context) {
			OCA.Files.App.setActiveView('files', {silent: true});
			OCA.Files.App.fileList.changeDirectory(OC.joinPaths(context.$file.attr('data-path'), filename), true, true);
		});
		fileActions.setDefault('dir', 'Open');

		return fileActions;
	},

	_onActionsUpdated: function(ev) {
		_.each([this._inFileList, this._outFileList, this._linkFileList], function(list) {
			if (!list) {
				return;
			}

			if (ev.action) {
				list.fileActions.registerAction(ev.action);
			} else if (ev.defaultAction) {
				list.fileActions.setDefault(
					ev.defaultAction.mime,
					ev.defaultAction.name
				);
			}
		});
	},

	_extendFileList: function(fileList) {
		// remove size column from summary
		fileList.fileSummary.$el.find('.filesize').remove();
	},

	_setShareState: function(fileId, state) {
		var method = 'POST';
		if (state === OC.Share.STATE_REJECTED) {
			method = 'DELETE';
		}

		return $.ajax({
			url: OC.linkToOCS('apps/files_sharing/api/v1') + 'shares/pending/' + encodeURIComponent(fileId) + '?format=json',
			contentType: 'application/json',
			dataType: 'json',
			type: method,
		}).fail(function(response) {
			var message = '';
			// show message if it is available
			if(response.responseJSON && response.responseJSON.message) {
				message = ': ' + response.responseJSON.message;
			}
			OC.Notification.show(t('files', 'An error occurred while updating share state: ' + message), {type: 'error'});
		});
	},

	_registerPendingShareActions: function(fileActions) {
		var self = this;

		// register pending share actions
		fileActions.registerAction({
			name: 'Accept',
			type: OCA.Files.FileActions.TYPE_INLINE,
			displayName: t('files', 'Accept Share'),
			mime: 'all',
			iconClass: 'icon-checkmark',
			permissions: OC.PERMISSION_READ,
			actionHandler: function (filename, context) {
				context.fileList.showFileBusyState(filename, true);
				self._setShareState(context.fileInfoModel.get('shareId'), OC.Share.STATE_ACCEPTED).then(function() {
					context.fileList.showFileBusyState(filename, false);
				}).done(function() {
					context.fileInfoModel.set('shareState', OC.Share.STATE_ACCEPTED);
				});
			}
		});
		fileActions.registerAction({
			name: 'Reject',
			type: OCA.Files.FileActions.TYPE_INLINE,
			displayName: t('files', 'Reject Share'),
			iconClass: 'icon-close',
			mime: 'all',
			permissions: OC.PERMISSION_READ,
			actionHandler: function (filename, context) {
				context.fileList.showFileBusyState(filename, true);
				self._setShareState(context.fileInfoModel.get('shareId'), OC.Share.STATE_REJECTED).then(function() {
					context.fileList.showFileBusyState(filename, false);
				}).done(function() {
					context.fileInfoModel.set('shareState', OC.Share.STATE_REJECTED);
				});
			}
		});

		fileActions.addAdvancedFilter(function(actions, $tr) {
			var shareState = parseInt($tr.attr('data-share-state'), 10);
			if (shareState === OC.Share.STATE_ACCEPTED) {
				delete(actions['Accept']);
				if (!OC.getCapabilities()['files_sharing']['auto_accept_share']) {
					// move "Reject" into drop down to replace "Delete" action
					actions.Reject.type = OCA.Files.FileActions.TYPE_DROPDOWN;
					delete(actions['Delete']);
				}
				return actions;
			}

			var newActions = [];
			newActions.push(actions.Share);
			if (shareState === OC.Share.STATE_PENDING || shareState === OC.Share.STATE_REJECTED) {
				newActions.push(actions.Accept);
			}
			if (shareState === OC.Share.STATE_PENDING) {
				actions.Reject.type = OCA.Files.FileActions.TYPE_INLINE;
				newActions.push(actions.Reject);
			}

			return newActions;
		});
	}
};

$(document).ready(function() {
	$('#app-content-sharingin').on('show', function(e) {
		OCA.Sharing.App.initSharingIn($(e.target));
	});
	$('#app-content-sharingin').on('hide', function() {
		OCA.Sharing.App.removeSharingIn();
	});
	$('#app-content-sharingout').on('show', function(e) {
		OCA.Sharing.App.initSharingOut($(e.target));
	});
	$('#app-content-sharingout').on('hide', function() {
		OCA.Sharing.App.removeSharingOut();
	});
	$('#app-content-sharinglinks').on('show', function(e) {
		OCA.Sharing.App.initSharingLinks($(e.target));
	});
	$('#app-content-sharinglinks').on('hide', function() {
		OCA.Sharing.App.removeSharingLinks();
	});
});

