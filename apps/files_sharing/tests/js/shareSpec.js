/*
 * Copyright (c) 2014 Vincent Petry <pvince81@owncloud.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

describe('OCA.Sharing.Util tests', function() {
	var fileList;
	var testFiles;
	var oldCoreConfig;
	var oldSharingConfig;

	function getImageUrl($el) {
		// might be slightly different cross-browser
		var url = $el.css('background-image');
		var r = url.match(/url\(['"]?([^'")]*)['"]?\)/);
		if (!r) {
			return url;
		}
		return r[1];
	}

	beforeEach(function() {
		oldCoreConfig = _.extend({}, oc_appconfig.core);
		oldSharingConfig = OC.appConfig.files_sharing;
		oc_appconfig.core = oc_appconfig.core || {};
		OC.appConfig.files_sharing = OC.appConfig.files_sharing || {};

		var $content = $('<div id="content"></div>');
		$('#testArea').append($content);
		// dummy file list
		var $div = $(
			'<div id="listContainer">' +
			'<table id="filestable">' +
			'<thead></thead>' +
			'<tbody id="fileList"></tbody>' +
			'</table>' +
			'</div>');
		$('#content').append($div);

		var fileActions = new OCA.Files.FileActions();
		fileList = new OCA.Files.FileList(
			$div, {
				fileActions : fileActions
			}
		);
		OCA.Sharing.Util.attach(fileList);

		testFiles = [{
			id: 1,
			type: 'file',
			name: 'One.txt',
			path: '/subdir',
			mimetype: 'text/plain',
			size: 12,
			permissions: OC.PERMISSION_ALL,
			etag: 'abc',
			shareOwner: 'User One',
			isShareMountPoint: false,
			shareTypes: [OC.Share.SHARE_TYPE_USER]
		}];
	});
	afterEach(function() {
		oc_appconfig.core = oldCoreConfig;
		OC.appConfig.files_sharing = oldSharingConfig;
		delete OCA.Sharing.sharesLoaded;
		delete OC.Share.droppedDown;
		fileList.destroy();
		fileList = null;
	});
	describe('Share action icon', function() {
		it('do not shows share text when not shared', function() {
			var $action, $tr;
			OC.Share.statuses = {};
			fileList.setFiles([{
				id: 1,
				type: 'dir',
				name: 'One',
				path: '/subdir',
				mimetype: 'httpd/unix-directory',
				size: 12,
				permissions: OC.PERMISSION_ALL,
				etag: 'abc',
				shareTypes: []
			}]);
			$tr = fileList.$el.find('tbody tr:first');
			$action = $tr.find('.action-share');
			expect($action.find('.icon').hasClass('icon-shared')).toEqual(true);
			expect($action.find('.icon').hasClass('icon-public')).toEqual(false);
			expect(OC.basename(getImageUrl($tr.find('.filename .thumbnail')))).toEqual('folder.svg');
		});
		it('shows simple share text with share icon', function() {
			var $action, $tr;
			fileList.setFiles([{
				id: 1,
				type: 'dir',
				name: 'One',
				path: '/subdir',
				mimetype: 'text/plain',
				size: 12,
				permissions: OC.PERMISSION_ALL,
				etag: 'abc',
				shareTypes: [OC.Share.SHARE_TYPE_USER]
			}]);
			$tr = fileList.$el.find('tbody tr:first');
			$action = $tr.find('.action-share');
			expect($action.find('>span').text().trim()).toEqual('Shared');
			expect($action.find('.icon').hasClass('icon-shared')).toEqual(true);
			expect($action.find('.icon').hasClass('icon-public')).toEqual(false);
			expect(OC.basename(getImageUrl($tr.find('.filename .thumbnail')))).toEqual('folder-shared.svg');
		});
		it('shows simple share text with public icon when shared with link', function() {
			var $action, $tr;
			OC.Share.statuses = {1: {link: true, path: '/subdir'}};
			fileList.setFiles([{
				id: 1,
				type: 'dir',
				name: 'One',
				path: '/subdir',
				mimetype: 'text/plain',
				size: 12,
				permissions: OC.PERMISSION_ALL,
				etag: 'abc',
				shareTypes: [OC.Share.SHARE_TYPE_LINK]
			}]);
			$tr = fileList.$el.find('tbody tr:first');
			$action = $tr.find('.action-share');
			expect($action.find('>span').text().trim()).toEqual('Shared');
			expect($action.find('.icon').hasClass('icon-shared')).toEqual(false);
			expect($action.find('.icon').hasClass('icon-public')).toEqual(true);
			expect(OC.basename(getImageUrl($tr.find('.filename .thumbnail')))).toEqual('folder-public.svg');
		});
		it('shows owner name when owner is available', function() {
			var $action, $tr;
			fileList.setFiles([{
				id: 1,
				type: 'dir',
				name: 'One.txt',
				path: '/subdir',
				mimetype: 'text/plain',
				size: 12,
				permissions: OC.PERMISSION_ALL,
				shareOwner: 'User One',
				etag: 'abc',
				shareTypes: []
			}]);
			$tr = fileList.$el.find('tbody tr:first');
			$action = $tr.find('.action-share');
			expect($action.find('>span').text().trim()).toEqual('User One');
			expect($action.find('.icon').hasClass('icon-shared')).toEqual(true);
			expect($action.find('.icon').hasClass('icon-public')).toEqual(false);
			expect(OC.basename(getImageUrl($tr.find('.filename .thumbnail')))).toEqual('folder-shared.svg');
		});
		it('shows recipients when recipients are available', function() {
			var $action, $tr;
			fileList.setFiles([{
				id: 1,
				type: 'dir',
				name: 'One.txt',
				path: '/subdir',
				mimetype: 'text/plain',
				size: 12,
				permissions: OC.PERMISSION_ALL,
				recipientsDisplayName: 'User One, User Two',
				etag: 'abc',
				shareTypes: [OC.Share.SHARE_TYPE_USER]
			}]);
			$tr = fileList.$el.find('tbody tr:first');
			$action = $tr.find('.action-share');
			expect($action.find('>span').text().trim()).toEqual('Shared with User One, User Two');
			expect($action.find('.icon').hasClass('icon-shared')).toEqual(true);
			expect($action.find('.icon').hasClass('icon-public')).toEqual(false);
			expect(OC.basename(getImageUrl($tr.find('.filename .thumbnail')))).toEqual('folder-shared.svg');
		});
		it('shows share action when shared with user who has no share permission', function() {
			var $action, $tr;
			fileList.setFiles([{
				id: 1,
				type: 'dir',
				name: 'One',
				path: '/subdir',
				mimetype: 'text/plain',
				size: 12,
				permissions: OC.PERMISSION_CREATE,
				etag: 'abc',
				shareOwner: 'User One'
			}]);
			$tr = fileList.$el.find('tbody tr:first');
			expect($tr.find('.action-share').length).toEqual(1);
		});
		it('do not show share action when share exists but neither permission nor owner is available', function() {
			var $action, $tr;
			fileList.setFiles([{
				id: 1,
				type: 'dir',
				name: 'One',
				path: '/subdir',
				mimetype: 'text/plain',
				size: 12,
				permissions: OC.PERMISSION_CREATE,
				etag: 'abc'
			}]);
			$tr = fileList.$el.find('tbody tr:first');
			expect($tr.find('.action-share').length).toEqual(0);
		});
	});
	describe('Share action', function() {
		var shareTab;

		function makeDummyShareItem(displayName) {
			return {
				share_with_displayname: displayName
			};
		}

		beforeEach(function() {
			// make it look like not the "All files" list
			fileList.id = 'test';
			shareTab = fileList._detailsView._tabViews[0];
		});
		afterEach(function() {
			shareTab = null;
		});
		it('clicking share action opens sidebar and share tab', function() {
			var showDetailsViewStub = sinon.stub(fileList, 'showDetailsView');

			fileList.setFiles([{
				id: 1,
				type: 'file',
				name: 'One.txt',
				path: '/subdir',
				mimetype: 'text/plain',
				size: 12,
				permissions: OC.PERMISSION_ALL,
				etag: 'abc'
			}]);

			var $tr = fileList.$el.find('tr:first');
			$tr.find('.action-share').click();

			expect(showDetailsViewStub.calledOnce).toEqual(true);
			expect(showDetailsViewStub.getCall(0).args[0]).toEqual('One.txt');
			expect(showDetailsViewStub.getCall(0).args[1]).toEqual('shareTabView');

			showDetailsViewStub.restore();
		});
		it('adds share icon after sharing a non-shared file', function() {
			var $action, $tr;
			OC.Share.statuses = {};
			fileList.setFiles([{
				id: 1,
				type: 'file',
				name: 'One.txt',
				path: '/subdir',
				mimetype: 'text/plain',
				size: 12,
				permissions: OC.PERMISSION_ALL,
				etag: 'abc'
			}]);
			$action = fileList.$el.find('tbody tr:first .action-share');
			$tr = fileList.$el.find('tr:first');

			$tr.find('.action-share').click();

			// simulate updating shares
			shareTab._dialog.model.set({
				shares: [
					{share_with_displayname: 'User One'},
					{share_with_displayname: 'User Two'},
					{share_with_displayname: 'Group One'},
					{share_with_displayname: 'Group Two'}
				]
			});

			expect($tr.attr('data-share-recipients')).toEqual('Group One, Group Two, User One, User Two');

			expect($action.find('>span').text().trim()).toEqual('Shared with Group One, Group Two, User One, User Two');
			expect($action.find('.icon').hasClass('icon-shared')).toEqual(true);
			expect($action.find('.icon').hasClass('icon-public')).toEqual(false);
		});
		it('updates share icon after updating shares of a file', function() {
			var $action, $tr;
			OC.Share.statuses = {1: {link: false, path: '/subdir'}};
			fileList.setFiles([{
				id: 1,
				type: 'file',
				name: 'One.txt',
				path: '/subdir',
				mimetype: 'text/plain',
				size: 12,
				permissions: OC.PERMISSION_ALL,
				etag: 'abc'
			}]);
			$action = fileList.$el.find('tbody tr:first .action-share');
			$tr = fileList.$el.find('tr:first');

			$tr.find('.action-share').click();

			// simulate updating shares
			shareTab._dialog.model.set({
				shares: [
					{share_with_displayname: 'User One'},
					{share_with_displayname: 'User Two'},
					{share_with_displayname: 'User Three'}
				]
			});

			expect($tr.attr('data-share-recipients')).toEqual('User One, User Three, User Two');

			expect($action.find('>span').text().trim()).toEqual('Shared with User One, User Three, User Two');
			expect($action.find('.icon').hasClass('icon-shared')).toEqual(true);
			expect($action.find('.icon').hasClass('icon-public')).toEqual(false);
		});
		it('removes share icon after removing all shares from a file', function() {
			var $action, $tr;
			OC.Share.statuses = {1: {link: false, path: '/subdir'}};
			fileList.setFiles([{
				id: 1,
				type: 'file',
				name: 'One.txt',
				path: '/subdir',
				mimetype: 'text/plain',
				size: 12,
				permissions: OC.PERMISSION_ALL,
				etag: 'abc',
				recipients: 'User One, User Two'
			}]);
			$action = fileList.$el.find('tbody tr:first .action-share');
			$tr = fileList.$el.find('tr:first');

			$tr.find('.action-share').click();

			// simulate updating shares
			shareTab._dialog.model.set({
				shares: []
			});

			expect($tr.attr('data-share-recipients')).not.toBeDefined();
		});
		it('keep share text after updating reshare', function() {
			var $action, $tr;
			OC.Share.statuses = {1: {link: false, path: '/subdir'}};
			fileList.setFiles([{
				id: 1,
				type: 'file',
				name: 'One.txt',
				path: '/subdir',
				mimetype: 'text/plain',
				size: 12,
				permissions: OC.PERMISSION_ALL,
				etag: 'abc',
				shareOwner: 'User One'
			}]);
			$action = fileList.$el.find('tbody tr:first .action-share');
			$tr = fileList.$el.find('tr:first');

			$tr.find('.action-share').click();

			// simulate updating shares
			shareTab._dialog.model.set({
				shares: [{share_with_displayname: 'User Two'}]
			});

			expect($tr.attr('data-share-recipients')).toEqual('User Two');

			expect($action.find('>span').text().trim()).toEqual('User One');
			expect($action.find('.icon').hasClass('icon-shared')).toEqual(true);
			expect($action.find('.icon').hasClass('icon-public')).toEqual(false);
		});
		it('keep share text after unsharing reshare', function() {
			var $action, $tr;
			OC.Share.statuses = {1: {link: false, path: '/subdir'}};
			fileList.setFiles([{
				id: 1,
				type: 'file',
				name: 'One.txt',
				path: '/subdir',
				mimetype: 'text/plain',
				size: 12,
				permissions: OC.PERMISSION_ALL,
				etag: 'abc',
				shareOwner: 'User One',
				recipients: 'User Two'
			}]);
			$action = fileList.$el.find('tbody tr:first .action-share');
			$tr = fileList.$el.find('tr:first');

			$tr.find('.action-share').click();

			// simulate updating shares
			shareTab._dialog.model.set({
				shares: []
			});

			expect($tr.attr('data-share-recipients')).not.toBeDefined();

			expect($action.find('>span').text().trim()).toEqual('User One');
			expect($action.find('.icon').hasClass('icon-shared')).toEqual(true);
			expect($action.find('.icon').hasClass('icon-public')).toEqual(false);
		});
	});
	describe('formatRecipients', function() {
		it('returns a single recipient when one passed', function() {
			expect(OCA.Sharing.Util.formatRecipients(['User one']))
				.toEqual('User one');
		});
		it('returns two recipients when two passed', function() {
			expect(OCA.Sharing.Util.formatRecipients(['User one', 'User two']))
				.toEqual('User one, User two');
		});
		it('returns four recipients with plus when five passed', function() {
			var recipients = [
				'User one',
				'User two',
				'User three',
				'User four',
				'User five'
			];
			expect(OCA.Sharing.Util.formatRecipients(recipients))
				.toEqual('User four, User one, User three, User two, +1');
		});
		it('returns four recipients with plus when ten passed', function() {
			var recipients = [
				'User one',
				'User two',
				'User three',
				'User four',
				'User five',
				'User six',
				'User seven',
				'User eight',
				'User nine',
				'User ten'
			];
			expect(OCA.Sharing.Util.formatRecipients(recipients))
				.toEqual('User four, User one, User three, User two, +6');
		});
		it('returns four recipients with plus when four passed with counter', function() {
			var recipients = [
				'User one',
				'User two',
				'User three',
				'User four'
			];
			expect(OCA.Sharing.Util.formatRecipients(recipients, 10))
				.toEqual('User four, User one, User three, User two, +6');
		});
	});
	describe('Excluded lists', function() {
		function createListThenAttach(listId) {
			var fileActions = new OCA.Files.FileActions();
			fileList.destroy();
			fileList = new OCA.Files.FileList(
				$('#listContainer'), {
					id: listId,
					fileActions: fileActions
				}
			);
			OCA.Sharing.Util.attach(fileList);
			fileList.setFiles(testFiles);
			return fileList;
		}

		it('does not attach to trashbin or public file lists', function() {
			createListThenAttach('trashbin');
			expect($('.action-share').length).toEqual(0);
			expect($('[data-share-recipient]').length).toEqual(0);
			createListThenAttach('files.public');
			expect($('.action-share').length).toEqual(0);
			expect($('[data-share-recipient]').length).toEqual(0);
		});
	});

	describe('ShareTabView interaction', function() {
		var onSpy;
		var fileInfoModel;
		var configModel;
		var shareModel;

		beforeEach(function() {
			onSpy = sinon.spy(OCA.Sharing.ShareTabView.prototype, 'on');

			var attributes = {
				itemType: 'file',
				itemSource: 123,
				possiblePermissions: 31,
				permissions: 31
			};
			fileInfoModel = new OCA.Files.FileInfoModel(testFiles[0]);
			configModel = new OC.Share.ShareConfigModel({
				enforcePasswordForPublicLink: false,
				isResharingAllowed: true,
				isDefaultExpireDateEnabled: false,
				isDefaultExpireDateEnforced: false,
				defaultExpireDate: 7
			});
			shareModel = new OC.Share.ShareItemModel(attributes, {
				configModel: configModel,
				fileInfoModel: fileInfoModel
			});

			/* jshint camelcase: false */
			shareModel.set({
				reshare: {},
				shares: [{
					id: 100,
					item_source: 1,
					permissions: 31,
					share_type: OC.Share.SHARE_TYPE_USER,
					share_with: 'user1',
					share_with_displayname: 'User One'
				}, {
					id: 102,
					item_source: 1,
					permissions: 31,
					share_type: OC.Share.SHARE_TYPE_REMOTE,
					share_with: 'foo@bar.com/baz',
					share_with_displayname: 'foo@bar.com/baz'

				}]
			}, {parse: true});

			fileList.destroy();
			fileList = new OCA.Files.FileList(
				$('#listContainer'), {
					id: 'files',
					fileActions: new OCA.Files.FileActions()
				}
			);
			OCA.Sharing.Util.attach(fileList);
			fileList.setFiles(testFiles);
		});
		afterEach(function() { 
			onSpy.restore();
		});

		it('updates fileInfoModel when shares changed', function() {
			var changeHandler = sinon.stub();
			fileInfoModel.on('change', changeHandler);

			onSpy.thisValues[0].trigger('sharesChanged', shareModel);

			expect(changeHandler.calledOnce).toEqual(true);
			expect(changeHandler.getCall(0).args[0].changed).toEqual({
				shareTypes: [
					OC.Share.SHARE_TYPE_USER,
					OC.Share.SHARE_TYPE_REMOTE,
				]
			});
		});
	});

	describe('public link quick action', function() {
		var currentUserStub;
		var notificationStub;
		var fetchStub;
		var linkCollectionStub;
		var fetchDeferred;
		var collection;

		beforeEach(function() {
			$('#testArea').append('<input id="allowShareWithLink" type="hidden" value="yes">');

			fileList.destroy();
			fileList = new OCA.Files.FileList(
				$('#listContainer'), {
					id: 'files',
					fileActions: new OCA.Files.FileActions()
				}
			);

			currentUserStub = sinon.stub(OC, 'getCurrentUser');
			currentUserStub.returns({
				uid: 'admin',
				displayName: 'admin',
				groups: ['admin'],
			});

			notificationStub = sinon.stub(OC.Notification, 'show');

			fetchDeferred = new $.Deferred();
			fetchStub = sinon.stub(OC.Share.ShareItemModel.prototype, 'fetch').returns(fetchDeferred.promise());

			collection = new OC.Share.SharesCollection();
			collection.add(
				{
					displayname_owner: 'admin',
					expiration: '2017-10-12 00:00:00',
					share_type: OC.Share.SHARE_TYPE_LINK,
					uid_owner: 'admin',
					attributes: [],
				}
			);
			linkCollectionStub = sinon.stub(OC.Share.ShareItemModel.prototype, 'getLinkSharesCollection').returns(collection);
		});
		afterEach(function() {
			currentUserStub.restore();
			notificationStub.restore();
			fetchStub.restore();
			linkCollectionStub.restore();

			OC.appConfig.files_sharing.showPublicLinkQuickAction = false;
			oc_appconfig.core.enforceLinkPasswordReadOnly = false;
			$('#allowShareWithLink').val('yes');
		});
		function makeOcsResponse(data) {
			return [{
				ocs: {
					data: data
				}
			}];
		}
		it('renders the quick action', function() {
			OC.appConfig.files_sharing.showPublicLinkQuickAction = true;
			oc_appconfig.core.enforceLinkPasswordReadOnly = false;
			oc_appconfig.files_sharing.publicShareSharersGroupsAllowlistEnabled = true;
			oc_appconfig.files_sharing.publicShareSharersGroupsAllowlist = ['admin'];

			fetchDeferred.resolve(makeOcsResponse([]));

			OCA.Sharing.Util.attach(fileList);
			fileList.setFiles(testFiles);

			var $quickAction = $('.action-create-public-link');

			$quickAction.click();
		});
		it('copies the quick link to clipboard', function() {
			OC.appConfig.files_sharing.showPublicLinkQuickAction = true;
			oc_appconfig.core.enforceLinkPasswordReadOnly = false;
			oc_appconfig.files_sharing.publicShareSharersGroupsAllowlistEnabled = true;
			oc_appconfig.files_sharing.publicShareSharersGroupsAllowlist = ['admin'];

			fetchDeferred.resolve(makeOcsResponse([]));

			collection.add({
				displayname_owner: 'admin',
				expiration: '2020-10-12 00:00:00',
				share_type: OC.Share.SHARE_TYPE_LINK,
				uid_owner: 'admin',
				attributes: [{
					scope: 'files_sharing',
					key: 'isQuickLink',
					value: true,
				}]
			});

			OCA.Sharing.Util.attach(fileList);
			fileList.setFiles(testFiles);

			var $quickAction = $('.action-create-public-link');
			expect($quickAction.length).toEqual(1);

			$quickAction.click();

			expect(notificationStub).toHaveBeenCalledWith(
				'Public link has been copied to the clipboard.',
				{timeout: 7}
			);
		});
		it('does not render the quick action because of config', function() {
			OC.appConfig.files_sharing.showPublicLinkQuickAction = false;
			oc_appconfig.core.enforceLinkPasswordReadOnly = false;

			OCA.Sharing.Util.attach(fileList);
			fileList.setFiles(testFiles);

			expect($('.action-create-public-link').length).toEqual(0);
		});
		it('does not render the quick action because of password enforcement', function() {
			OC.appConfig.files_sharing.showPublicLinkQuickAction = true;
			oc_appconfig.core.enforceLinkPasswordReadOnly = true;

			OCA.Sharing.Util.attach(fileList);
			fileList.setFiles(testFiles);
			expect($('.action-create-public-link').length).toEqual(0);
		});
		it('does not render the quick action because public link sharing disabled', function() {
			OC.appConfig.files_sharing.showPublicLinkQuickAction = true;
			oc_appconfig.core.enforceLinkPasswordReadOnly = false;
			$('#allowShareWithLink').val('no');

			OCA.Sharing.Util.attach(fileList);
			fileList.setFiles(testFiles);
			expect($('.action-create-public-link').length).toEqual(0);
		});
		it('does not render the quick action because of allow list', function() {
			OC.appConfig.files_sharing.showPublicLinkQuickAction = true;
			oc_appconfig.core.enforceLinkPasswordReadOnly = false;
			oc_appconfig.files_sharing.publicShareSharersGroupsAllowlistEnabled = true;
			oc_appconfig.files_sharing.publicShareSharersGroupsAllowlist = ['allowedGroup'];

			OCA.Sharing.Util.attach(fileList);
			fileList.setFiles(testFiles);
			expect($('.action-create-public-link').length).toEqual(0);
		});
	});
	
});
