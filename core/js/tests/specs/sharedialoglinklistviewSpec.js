/**
* ownCloud
*
* @author Vincent Petry
* @copyright Copyright (c) 2017 Vincent Petry <pvince81@owncloud.com>
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either
* version 3 of the License, or any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*
* You should have received a copy of the GNU Affero General Public
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
*
*/

describe('OC.Share.ShareDialogLinkListView', function() {

	var itemModel;
	var fileInfoModel;
	var configModel;
	var collection;
	var view;
	var tooltipStub;
	var showPopupStub;
	var publicLinkStub;

	beforeEach(function() {
		configModel = new OC.Share.ShareConfigModel();
		fileInfoModel = new OCA.Files.FileInfoModel({
			id: '123',
			name: 'shared_file_name.txt',
			path: '/subdir',
			size: 100,
			mimetype: 'text/plain',
			permissions: 31,
			sharePermissions: 31
		});
		itemModel = new OC.Share.ShareItemModel({
			itemType: 'folder',
			itemSource: 123
		}, {
			configModel: configModel,
			fileInfoModel: fileInfoModel
		});

		publicLinkStub = sinon.stub(OC, 'getCapabilities');
		publicLinkStub.returns({
			'files_sharing': {
				'public': {
					'defaultPublicLinkShareName': 'Public link'
				}
			}
		});
		tooltipStub = sinon.stub($.fn, 'tooltip');
		/* jshint camelcase: false */
		collection = new OC.Share.SharesCollection([{
			id: 1,
			name: 'first link',
			token: 'tehtokenz',
			share_type: OC.Share.SHARE_TYPE_LINK,
			item_type: 'folder',
			stime: 1489657516,
			permissions: OC.PERMISSION_READ,
			share_with: null,
			expiration: null,
		}, {
			id: 2,
			name: null,
			token: 'tehohtertokenz',
			share_type: OC.Share.SHARE_TYPE_LINK,
			item_type: 'file',
			stime: 1489657516,
			permissions: OC.PERMISSION_READ,
			share_with: 'password',
			expiration: '2017-10-12 00:00:00',
		}]);

		view = new OC.Share.ShareDialogLinkListView({
			collection: collection,
			itemModel: itemModel
		});
		view.render();

		showPopupStub = sinon.stub(OC.Share.ShareDialogLinkShareView.prototype, 'show');
	});
	afterEach(function() { 
		tooltipStub.restore(); 
		showPopupStub.restore();
		publicLinkStub.restore();
	});

	describe('rendering', function() {
		it('renders the list of shares', function() {
			var protocolStub = sinon.stub(OC, 'getProtocol').returns('https');
			var hostStub = sinon.stub(OC, 'getHost').returns('example.org');
			var webrootStub = sinon.stub(OC, 'getRootPath').returns('/owncloud');

			view.render();
			var $li = view.$('.link-entry');
			expect($li.length).toEqual(2);
			expect($li.eq(0).attr('data-id')).toEqual('1');
			expect($li.eq(0).find('.link-entry--icon').hasClass('icon-public-white')).toEqual(true);
			expect($li.eq(0).find('.linkText').val())
				.toEqual('https://example.org/owncloud/index.php/s/tehtokenz');
			expect($li.eq(0).find('.link-entry--title').text()).toEqual('first link');
			expect($li.eq(0).find('.clipboardButton').length).toEqual(1);
			expect($li.eq(1).attr('data-id')).toEqual('2');
			expect($li.eq(1).find('.link-entry--icon').hasClass('icon-public-white')).toEqual(true);
			expect($li.eq(1).find('.linkText').val())
				.toEqual('https://example.org/owncloud/index.php/s/tehohtertokenz');
			// renders token instead of name
			expect($li.eq(1).find('.link-entry--title').text()).toEqual('tehohtertokenz');
			expect($li.eq(1).find('.clipboardButton').length).toEqual(1);

			webrootStub.restore();
			hostStub.restore();
			protocolStub.restore();
		});
		it('renders the create button', function() {
			expect(view.$('.addLink').length).toEqual(1);
		});
		it('does not render empty message when shares exist', function() {
			expect(view.$('.empty-message').length).toEqual(0);
		});
		it('renders empty message when no shares exist', function() {
			collection.reset([]);
			view.render();
			expect(view.$('.link-entry').length).toEqual(0);
			expect(view.$('.empty-message').length).toEqual(1);
		});
	});

	describe('create link', function() {
		function showPopup() {
			view.$('.addLink').click();
			expect(showPopupStub.calledOnce).toEqual(true);
			return showPopupStub.getCall(0).thisValue;
		}

		it('sets default values and shows popup', function() {
			var defaultDateStub = sinon.stub(configModel, 'getDefaultExpirationDateString'); 
			defaultDateStub.returns('2017-03-03');
			var popup = showPopup();
			expect(popup.model.toJSON()).toEqual({
				name: 'Public link',
				password: '',
				permissions: OC.PERMISSION_READ,
				expireDate: '2017-03-03',
				shareType: OC.Share.SHARE_TYPE_LINK,
				itemType: 'folder',
				itemSource: 123
			});
			expect(popup.configModel).toEqual(configModel);
			expect(popup.itemModel).toEqual(itemModel);
			defaultDateStub.restore();
		});
		it('deduplicates default link name', function() {
			view.collection.set([{
				id: 1,
				name: 'Public link'
			}, {
				id: 2,
				name: 'Public link (2)'
			}]);
			var popup = showPopup();
			expect(popup.model.get('name')).toEqual('Public link (3)');
		});
		it('adds model to collection and rerender after saving', function() {
			var popup = showPopup();

			popup.model.set('id', 300);
			popup.trigger('saved', popup.model);

			expect(collection.length).toEqual(3);
			expect(view.$('.link-entry').length).toEqual(3);
			expect(view.$('.link-entry:eq(2)').attr('data-id')).toEqual('300');
		});
	});
	describe('edit link', function() {
		var popup;

		beforeEach(function() {
			view.$('.link-entry').eq(0).find('.editLink').click();
			expect(showPopupStub.calledOnce).toEqual(true);
			popup = showPopupStub.getCall(0).thisValue;
		});
		it('shows popup for existing model', function() {
			expect(popup.model.id).toEqual(1);
			// just an extra check
			expect(popup.model.get('token')).toEqual('tehtokenz');
			expect(popup.configModel).toEqual(configModel);
			expect(popup.itemModel).toEqual(itemModel);
		});
		it('updates model in collection and rerender after saving', function() {
			popup.model.set('name', 'changed name');
			popup.trigger('saved', popup.model);

			expect(collection.length).toEqual(2);
			expect(view.$('.link-entry').length).toEqual(2);
			expect(view.$('.link-entry:eq(0) .link-entry--title').text()).toEqual('changed name');
		});
	});
	describe('share link', function() {
		var socialConfigStub;

		beforeEach(function() {
			socialConfigStub = sinon.stub(configModel, 'isSocialShareEnabled');
		});
		afterEach(function() { 
			socialConfigStub.restore(); 
		});
		
		it('does not show share button if social is disabled', function() {
			socialConfigStub.returns(false);
			view.render();
			expect(view.$('.link-entry:eq(0) .shareLink').length).toEqual(0);
		});
		it('shows social view if enabled', function() {
			socialConfigStub.returns(true);
			view.render();
			expect(view.$('.link-entry:eq(0) .shareLink').length).toEqual(1);
			view.$('.link-entry:eq(0) .shareLink').click();

			expect(view.$('.link-entry:eq(0) .socialShareContainer').is(':empty')).toEqual(false);
		});
	});
});
