/**
 * ownCloud
 *
 * @author Tom Needham
 * @copyright Copyright (c) 2015 Tom Needham <tom@owncloud.com>
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

/* global oc_appconfig */
describe('OC.Share.ShareDialogShareeListView', function () {

	var oldCurrentUser;
	var fileInfoModel;
	var configModel;
	var shareModel;
	var listView;
	var updateShareStub;

	beforeEach(function () {
		/* jshint camelcase:false */
		oldAppConfig = _.extend({}, oc_appconfig.core);

		$('#testArea').append('<input id="mailNotificationEnabled" name="mailNotificationEnabled" type="hidden" value="yes">');

		fileInfoModel = new OCA.Files.FileInfoModel({
			id: 123,
			name: 'shared_file_name.txt',
			path: '/subdir',
			size: 100,
			mimetype: 'text/plain',
			permissions: 31,
			sharePermissions: 31
		});

		var properties = {
			itemType: fileInfoModel.isDirectory() ? 'folder' : 'file',
			itemSource: fileInfoModel.get('id'),
			possiblePermissions: 31,
			permissions: 31
		};

		shareModel = new OC.Share.ShareItemModel(properties, {
			configModel: configModel,
			fileInfoModel: fileInfoModel
		});

		configModel = new OC.Share.ShareConfigModel({
			isResharingAllowed: true,
			isDefaultExpireDateEnabled: false,
			isDefaultExpireDateEnforced: false,
			defaultExpireDate: 7
		});

		listView = new OC.Share.ShareDialogShareeListView({
			configModel: configModel,
			model: shareModel
		});

		// required for proper event propagation when simulating clicks in some cases (jquery bugs)
		$('#testArea').append(listView.$el);

		shareModel.set({
			linkShare: {isLinkShare: false}
		});

		oldCurrentUser = OC.currentUser;
		OC.currentUser = 'user0';
		updateShareStub = sinon.stub(OC.Share.ShareItemModel.prototype, 'updateShare');
	});

	afterEach(function () {
		OC.currentUser = oldCurrentUser;
		/* jshint camelcase:false */
		oc_appconfig.core = oldAppConfig;
		listView.remove();
		updateShareStub.restore();
	});

	describe('rendering', function() {
		it('Renders shares', function() {
			shareModel.set('shares', [
				{
					id: 100,
					item_source: 123,
					permissions: 1,
					share_type: OC.Share.SHARE_TYPE_USER,
					share_with: 'user1',
					share_with_displayname: 'User One',
					share_with_additional_info: 'user1@example.com'
				},
				{
					id: 101,
					item_source: 123,
					permissions: 1,
					attributes: [],
					share_type: OC.Share.SHARE_TYPE_GROUP,
					share_with: 'group1',
					share_with_displayname: 'Group One'
				}]
			);
			listView.render();

			expect(listView.$('li').length).toEqual(2);

			var $li = listView.$('li').eq(0);
			expect($li.attr('data-share-id')).toEqual('100');
			expect($li.find('.username').text()).toEqual('User One');
			expect($li.find('.user-additional-info').text()).toEqual('(user1@example.com)');

			$li = listView.$('li').eq(1);
			expect($li.attr('data-share-id')).toEqual('101');
			expect($li.find('.username').text()).toEqual('Group One (group)');
			expect($li.find('.user-additional-info').length).toEqual(0);
		});

		it('renders share attribute correctly', function () {
			shareModel.registerShareAttribute({
				scope: "test",
				key: "test-attribute",
				default: true,
				label: "test attribute",
				shareType : [],
				incompatiblePermissions: [],
				requiredPermissions: [],
				incompatibleAttributes: []
			});

			shareModel.set('shares', [{
				id: 100,
				item_source: '123',
				permissions: 1,
				attributes: [{ scope: 'test', key: 'test-attribute', enabled: true }],
				share_type: OC.Share.SHARE_TYPE_USER,
				share_with: 'user1',
				share_with_displayname: 'User One'
			}]);

			listView.render();
			var $li = listView.$('li').eq(0);
			var input = $li.find("input[name='test-attribute']");
			expect(input.is(':checked')).toEqual(true);
			expect(input.labels().text()).toEqual('test attribute');
		});
	});

	describe('Manages checkbox events correctly', function () {

		it('Checks cruds boxes when edit box checked', function () {
			shareModel.set('shares', [{
				id: 100,
				item_source: 123,
				permissions: 1,
				share_type: OC.Share.SHARE_TYPE_USER,
				share_with: 'user1',
				share_with_displayname: 'User One'
			}]);
			listView.render();
			listView.$el.find("input[name='edit']").click();
			expect(listView.$el.find("input[name='update']").is(':checked')).toEqual(true);
			expect(updateShareStub.calledOnce).toEqual(true);
		});

		it('Checks edit box when create/update/delete are checked', function () {
			shareModel.set('shares', [{
				id: 100,
				item_source: 123,
				permissions: 1,
				share_type: OC.Share.SHARE_TYPE_USER,
				share_with: 'user1',
				share_with_displayname: 'User One'
			}]);
			listView.render();
			listView.$el.find("input[name='update']").click();
			expect(listView.$el.find("input[name='edit']").is(':checked')).toEqual(true);
			expect(updateShareStub.calledOnce).toEqual(true);
		});

		it('shows cruds checkboxes when toggled', function () {
			shareModel.set('shares', [{
				id: 100,
				item_source: 123,
				permissions: 1,
				share_type: OC.Share.SHARE_TYPE_USER,
				share_with: 'user1',
				share_with_displayname: 'User One'
			}]);
			listView.render();
			listView.$el.find('a.showCruds').click();
			expect(listView.$el.find('li.cruds').hasClass('hidden')).toEqual(false);
		});

		it('sends notification to user when button clicked', function () {
			var notifStub = sinon.stub(OC.Notification, 'show');
			shareModel.set('shares', [{
				id: 100,
				item_source: 123,
				permissions: 1,
				share_type: OC.Share.SHARE_TYPE_USER,
				share_with: 'user1',
				share_with_displayname: 'User One'
			}]);
			listView.render();
			var deferred = new $.Deferred();
			var notificationStub = sinon.stub(listView.model, 'sendNotificationForShare').returns(deferred.promise());
			listView.$el.find("input[name='mailNotification']").click();
			// spinner appears
			expect(listView.$el.find('.mailNotificationSpinner').hasClass('hidden')).toEqual(false);
			expect(notificationStub.called).toEqual(true);
			notificationStub.restore();

			deferred.resolve({ ocs: { meta: {status: 'ok' }}});
			expect(notifStub.calledOnce).toEqual(true);
			notifStub.restore();

			// button is removed
			expect(listView.$el.find("input[name='mailNotification']").length).toEqual(0);

		});

		it('displays error if email notification not sent', function () {
			var notifStub = sinon.stub(OC.dialogs, 'alert');
			shareModel.set('shares', [{
				id: 100,
				item_source: 123,
				permissions: 1,
				share_type: OC.Share.SHARE_TYPE_USER,
				share_with: 'user1',
				share_with_displayname: 'User One'
			}]);
			listView.render();
			var deferred = new $.Deferred();
			var notificationStub = sinon.stub(listView.model, 'sendNotificationForShare').returns(deferred.promise());
			listView.$el.find("input[name='mailNotification']").click();
			expect(notificationStub.called).toEqual(true);
			notificationStub.restore();

			deferred.resolve({ ocs: { meta: {status: 'error', message: 'message'}}});
			expect(notifStub.calledOnce).toEqual(true);
			notifStub.restore();

			// button is still there
			expect(listView.$el.find("input[name='mailNotification']").length).toEqual(1);
			expect(listView.$el.find("input[name='mailNotification']").hasClass('hidden')).toEqual(false);
		});

		it('share attribute can be unchecked', function () {
			shareModel.registerShareAttribute({
				scope: "test",
				key: "test-attribute",
				default: true,
				label: "test attribute",
				shareType : [],
				incompatiblePermissions: [],
				requiredPermissions: [],
				incompatibleAttributes: []
			});

			shareModel.set('shares', [{
				id: 100,
				item_source: '123',
				permissions: 1,
				attributes: [{ scope: 'test', key: 'test-attribute', enabled: true }],
				share_type: OC.Share.SHARE_TYPE_USER,
				share_with: 'user1',
				share_with_displayname: 'User One'
			}]);

			listView.render();
			listView.$el.find("input[name='test-attribute']").click();
			expect(listView.$el.find("input[name='test-attribute']").is(':checked')).toEqual(false);
			expect(updateShareStub.calledOnce).toEqual(true);
		});

		it('share attribute checkbox enabled by checking required permission', function () {
			shareModel.registerShareAttribute({
				scope: "test",
				key: "test-attribute",
				default: true,
				label: "test attribute",
				shareType : [],
				incompatiblePermissions: [],
				requiredPermissions: [ OC.PERMISSION_UPDATE ],
				incompatibleAttributes: []
			});

			shareModel.set('shares', [{
				id: 100,
				item_source: '123',
				permissions: 1,
				attributes: [],
				share_type: OC.Share.SHARE_TYPE_USER,
				share_with: 'user1',
				share_with_displayname: 'User One'
			}]);

			listView.render();

			expect(listView.$el.find("input[name='test-attribute']").length > 0).toEqual(false);

			updateShareStub.callsFake(function() {
				// Updated share permission should now enable the permission
				shareModel.set('shares', [{
					id: 100,
					item_source: '123',
					permissions: 1,
					attributes: [{ scope: 'test', key: 'test-attribute', enabled: true }],
					share_type: OC.Share.SHARE_TYPE_USER,
					share_with: 'user1',
					share_with_displayname: 'User One'
				}]);
			});

			// Click on update should cause attribute test-attribute
			// to appear as requiredPermissions got satisfied
			listView.$el.find("input[name='update']").click();
			expect(listView.$el.find("input[name='test-attribute']").is(':checked')).toEqual(true);
			expect(updateShareStub.calledOnce).toEqual(true);
		});

		it('share attribute checkbox enabled by unchecking incompatible attribute', function () {
			shareModel.registerShareAttribute({
				scope: "test",
				key: "incompatible-attribute",
				default: true,
				label: "incompatible attribute",
				shareType : [],
				incompatiblePermissions: [],
				requiredPermissions: [ ],
				incompatibleAttributes: []
			});
			shareModel.registerShareAttribute({
				scope: "test",
				key: "test-attribute",
				default: true,
				label: "test attribute",
				shareType : [],
				incompatiblePermissions: [],
				requiredPermissions: [ ],
				incompatibleAttributes: [{ scope: 'test', key: 'incompatible-attribute', enabled: true }]
			});

			shareModel.set('shares', [{
				id: 100,
				item_source: '123',
				permissions: 1,
				attributes: [{ scope: 'test', key: 'incompatible-attribute', enabled: true }],
				share_type: OC.Share.SHARE_TYPE_USER,
				share_with: 'user1',
				share_with_displayname: 'User One'
			}]);

			listView.render();

			expect(listView.$el.find("input[name='incompatible-attribute']").is(':checked')).toEqual(true);
			expect(listView.$el.find("input[name='test-attribute']").length > 0).toEqual(false);

			updateShareStub.callsFake(function() {
				// Updated share permission should now enable the permission
				shareModel.set('shares', [{
					id: 100,
					item_source: '123',
					permissions: 1,
					attributes: [
						{ scope: 'test', key: 'incompatible-attribute', enabled: false },
						{ scope: 'test', key: 'test-attribute', enabled: true }
					],
					share_type: OC.Share.SHARE_TYPE_USER,
					share_with: 'user1',
					share_with_displayname: 'User One'
				}]);
			});

			listView.$el.find("input[name='incompatible-attribute']").click();

			expect(listView.$el.find("input[name='incompatible-attribute']").is(':checked')).toEqual(false);
			expect(listView.$el.find("input[name='test-attribute']").is(':checked')).toEqual(true);
			expect(updateShareStub.calledOnce).toEqual(true);
		});
	});

});
