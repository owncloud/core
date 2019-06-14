/**
* ownCloud
*
* @author Vincent Petry
* @copyright Copyright (c) 2018 Vincent Petry <pvince81@owncloud.com>
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
describe('OC.Share.ShareDialogView', function() {
	var $container;
	var oldAppConfig;
	var autocompleteStub;
	var oldEnableAvatars;
	var avatarStub;
	var placeholderStub;
	var oldCurrentUser;

	var fetchStub;
	var notificationStub;

	var configModel;
	var shareModel;
	var fileInfoModel;
	var dialog;

	beforeEach(function() {
		// horrible parameters
		$('#testArea').append('<input id="allowShareWithLink" type="hidden" value="yes">');
		$('#testArea').append('<input id="mailPublicNotificationEnabled" name="mailPublicNotificationEnabled" type="hidden" value="yes">');
		$container = $('#shareContainer');
		/* jshint camelcase:false */
		oldAppConfig = _.extend({}, oc_appconfig.core);

		fetchStub = sinon.stub(OC.Share.ShareItemModel.prototype, 'fetch');

		fileInfoModel = new OCA.Files.FileInfoModel({
			id: 123,
			name: 'shared_file_name.txt',
			path: '/subdir',
			size: 100,
			mimetype: 'text/plain',
			permissions: 31,
			sharePermissions: 31
		});

		var attributes = {
			itemType: fileInfoModel.isDirectory() ? 'folder' : 'file',
			itemSource: fileInfoModel.get('id'),
			possiblePermissions: 31,
			permissions: 31
		};
		configModel = new OC.Share.ShareConfigModel({
			isResharingAllowed: true,
			isDefaultExpireDateEnabled: false,
			isDefaultExpireDateEnforced: false,
			defaultExpireDate: 7
		});
		shareModel = new OC.Share.ShareItemModel(attributes, {
			configModel: configModel,
			fileInfoModel: fileInfoModel
		});
		dialog = new OC.Share.ShareDialogView({
			configModel: configModel,
			model: shareModel
		});

		// required for proper event propagation when simulating clicks in some cases (jquery bugs)
		$('#testArea').append(dialog.$el);

		// triggers rendering
		shareModel.set({
			shares: []
		});

		autocompleteStub = sinon.stub($.fn, 'autocomplete').callsFake(function() {
			// dummy container with the expected attributes
			if (!$(this).length) {
				// simulate the real autocomplete that returns
				// nothing at all when no element is specified
				// (and potentially break stuff)
				return null;
			}
			var $el = $('<div></div>').data('ui-autocomplete', {});
			return $el;
		});

		oldEnableAvatars = oc_config.enable_avatars;
		oc_config.enable_avatars = false;
		avatarStub = sinon.stub($.fn, 'avatar');
		placeholderStub = sinon.stub($.fn, 'imageplaceholder');

		oldCurrentUser = OC.currentUser;
		OC.currentUser = 'user0';
		capsSpec = sinon.stub(OC, 'getCapabilities');
		capsSpec.returns({
			'files_sharing': {
				'search_min_length': 2
			}
		});
	});
	afterEach(function() {
		capsSpec.restore();
		OC.currentUser = oldCurrentUser;
		/* jshint camelcase:false */
		oc_appconfig.core = oldAppConfig;

		dialog.remove();
		fetchStub.restore();

		autocompleteStub.restore();
		avatarStub.restore();
		placeholderStub.restore();
		oc_config.enable_avatars = oldEnableAvatars;
	});
	describe('check for avatar', function() {
		beforeEach(function() {
			shareModel.set({
				reshare: {
					share_type: OC.Share.SHARE_TYPE_USER,
					uid_owner: 'owner',
					displayname_owner: 'Owner',
					permissions: 31
				},
				shares: [{
					id: 100,
					item_source: 123,
					permissions: 31,
					share_type: OC.Share.SHARE_TYPE_USER,
					share_with: 'user1',
					share_with_displayname: 'User One'
				},{
					id: 101,
					item_source: 123,
					permissions: 31,
					share_type: OC.Share.SHARE_TYPE_GROUP,
					share_with: 'group',
					share_with_displayname: 'group'
				},{
					id: 102,
					item_source: 123,
					permissions: 31,
					share_type: OC.Share.SHARE_TYPE_REMOTE,
					share_with: 'foo@bar.com/baz',
					share_with_displayname: 'foo@bar.com/baz'

				}]
			});
		});

		describe('avatars enabled', function() {
			beforeEach(function() {
				oc_config.enable_avatars = true;
				avatarStub.reset();
				dialog.render();
			});

			afterEach(function() {
				oc_config.enable_avatars = false;
			});

			it('test correct function calls', function() {
				expect(avatarStub.calledTwice).toEqual(true);
				expect(placeholderStub.calledTwice).toEqual(true);
				expect(dialog.$('.shareWithList').children().length).toEqual(3);
				expect(dialog.$('.avatar').length).toEqual(4);
			});

			it('test avatar owner', function() {
				var args = avatarStub.getCall(0).args;
				expect(args.length).toEqual(2);
				expect(args[0]).toEqual('owner');
			});

			it('test avatar user', function() {
				var args = avatarStub.getCall(1).args;
				expect(args.length).toEqual(2);
				expect(args[0]).toEqual('user1');
			});

			it('test avatar for groups', function() {
				var args = placeholderStub.getCall(0).args;
				expect(args.length).toEqual(1);
				expect(args[0]).toEqual('group ' + OC.Share.SHARE_TYPE_GROUP);
			});

			it('test avatar for remotes', function() {
				var args = placeholderStub.getCall(1).args;
				expect(args.length).toEqual(1);
				expect(args[0]).toEqual('foo@bar.com/baz ' + OC.Share.SHARE_TYPE_REMOTE);
			});
		});

		describe('avatars disabled', function() {
			beforeEach(function() {
				dialog.render();
			});

			it('no avatar classes', function() {
				expect($('.avatar').length).toEqual(0);
				expect(avatarStub.callCount).toEqual(0);
				expect(placeholderStub.callCount).toEqual(0);
			});
		});
	});
	describe('remote sharing', function() {
		it('shows remote share info when allowed', function() {
			configModel.set({
				isRemoteShareAllowed: true
			});
			dialog.render();
			expect(dialog.$el.find('.shareWithRemoteInfo').length).toEqual(1);
		});
		it('does not show remote share info when not allowed', function() {
			configModel.set({
				isRemoteShareAllowed: false
			});
			dialog.render();
			expect(dialog.$el.find('.shareWithRemoteInfo').length).toEqual(0);
		});
	});
	describe('autocompletion of users', function() {
		xit('is sorted naturally', function () {
			dialog.render();
			var response = sinon.stub();
			dialog.autocompleteHandler({term: 'p'}, response);
			var jsonData = JSON.stringify({
				'ocs' : {
					'meta' : {
						'status' : 'success',
						'statuscode' : 100,
						'message' : null
					},
					'data' : {
						'exact' : {
							'users'  : [],
							'groups' : [],
							'remotes': []
						},
						'users'  : [{
							"label": "Peter A.",
							"value": {
								"shareType": 0,
								"shareWith": "Peter A."
							}
						},
							{
								"label": "Petra",
								"value": {
									"shareType": 0,
									"shareWith": "Petra"
								}
							},
							{
								"label": "peter B.",
								"value": {
									"shareType": 0,
									"shareWith": "peter B."
								}
							}],
						'groups' : [],
						'remotes': []
					}
				}
			});

			fakeServer.requests[0].respond(
				200,
				{'Content-Type': 'application/json'},
				jsonData
			);

			expect(response.getCall(0).args[0]).toEqual([
				{
					"label": "Peter A.",
					"value": {
						"shareType": 0,
						"shareWith": "Peter A."
					}
				},
				{
					"label": "peter B.",
					"value": {
						"shareType": 0,
						"shareWith": "peter B."
					}
				},
				{
					"label": "Petra",
					"value": {
						"shareType": 0,
						"shareWith": "Petra"
					}
				}
			]);
			expect(response.getCall(0).args[1].ocs).toBeDefined();
		});
		it('triggers autocomplete display and focus with data when ajax search succeeds', function () {
			dialog.render();
			var response = sinon.stub();
			dialog.autocompleteHandler({term: 'bob'}, response);
			var jsonData = JSON.stringify({
				'ocs' : {
					'meta' : {
						'status' : 'success',
						'statuscode' : 100,
						'message' : null
					},
					'data' : {
						'exact' : {
							'users'  : [],
							'groups' : [],
							'remotes': []
						},
						'users'  : [{'label': 'bob', 'value': {'shareType': 0, 'shareWith': 'test'}}],
						'groups' : [],
						'remotes': []
					}
				}
			});
			fakeServer.requests[0].respond(
					200,
					{'Content-Type': 'application/json'},
					jsonData
			);
			expect(response.getCall(0).args[0]).toEqual(JSON.parse(jsonData).ocs.data.users);
			expect(autocompleteStub.calledWith("option", "autoFocus", true)).toEqual(true);
		});

		describe('filter out', function() {
			it('the current user', function () {
				dialog.render();
				var response = sinon.stub();
				dialog.autocompleteHandler({term: 'bob'}, response);
				var jsonData = JSON.stringify({
					'ocs': {
						'meta': {
							'status': 'success',
							'statuscode': 100,
							'message': null
						},
						'data': {
							'exact': {
								'users': [],
								'groups': [],
								'remotes': []
							},
							'users': [
								{
									'label': 'bob',
									'value': {
										'shareType': 0,
										'shareWith': OC.currentUser
									}
								},
								{
									'label': 'bobby',
									'value': {
										'shareType': 0,
										'shareWith': 'imbob'
									}
								}
							],
							'groups': [],
							'remotes': []
						}
					}
				});
				fakeServer.requests[0].respond(
					200,
					{'Content-Type': 'application/json'},
					jsonData
				);
				expect(response.getCall(0).args[0]).toEqual([{
					'label': 'bobby',
					'value': {'shareType': 0, 'shareWith': 'imbob'}
				}]);
				expect(autocompleteStub.calledWith("option", "autoFocus", true)).toEqual(true);
			});

			it('the share owner', function () {
				shareModel.set({
					reshare: {
						uid_owner: 'user1'
					},
					shares: [],
					permissions: OC.PERMISSION_READ
				});

				dialog.render();
				var response = sinon.stub();
				dialog.autocompleteHandler({term: 'bob'}, response);
				var jsonData = JSON.stringify({
					'ocs': {
						'meta': {
							'status': 'success',
							'statuscode': 100,
							'message': null
						},
						'data': {
							'exact': {
								'users': [],
								'groups': [],
								'remotes': []
							},
							'users': [
								{
									'label': 'bob',
									'value': {
										'shareType': 0,
										'shareWith': 'user1'
									}
								},
								{
									'label': 'bobby',
									'value': {
										'shareType': 0,
										'shareWith': 'imbob'
									}
								}
							],
							'groups': [],
							'remotes': []
						}
					}
				});
				fakeServer.requests[0].respond(
					200,
					{'Content-Type': 'application/json'},
					jsonData
				);
				expect(response.getCall(0).args[0]).toEqual([{
					'label': 'bobby',
					'value': {'shareType': 0, 'shareWith': 'imbob'}
				}]);
				expect(autocompleteStub.calledWith("option", "autoFocus", true)).toEqual(true);
			});

			describe('already shared with', function () {
				beforeEach(function() {
					shareModel.set({
						reshare: {},
						shares: [{
							id: 100,
							item_source: 123,
							permissions: 31,
							share_type: OC.Share.SHARE_TYPE_USER,
							share_with: 'user1',
							share_with_displayname: 'User One'
						},{
							id: 101,
							item_source: 123,
							permissions: 31,
							share_type: OC.Share.SHARE_TYPE_GROUP,
							share_with: 'group',
							share_with_displayname: 'group'
						},{
							id: 102,
							item_source: 123,
							permissions: 31,
							share_type: OC.Share.SHARE_TYPE_REMOTE,
							share_with: 'foo@bar.com/baz',
							share_with_displayname: 'foo@bar.com/baz'

						}]
					});
				});

				it('users', function () {
					dialog.render();
					var response = sinon.stub();
					dialog.autocompleteHandler({term: 'bob'}, response);
					var jsonData = JSON.stringify({
						'ocs': {
							'meta': {
								'status': 'success',
								'statuscode': 100,
								'message': null
							},
							'data': {
								'exact': {
									'users': [],
									'groups': [],
									'remotes': []
								},
								'users': [
									{
										'label': 'bob',
										'value': {
											'shareType': OC.Share.SHARE_TYPE_USER,
											'shareWith': 'user1'
										}
									},
									{
										'label': 'bobby',
										'value': {
											'shareType': OC.Share.SHARE_TYPE_USER,
											'shareWith': 'imbob'
										}
									}
								],
								'groups': [],
								'remotes': []
							}
						}
					});
					fakeServer.requests[0].respond(
						200,
						{'Content-Type': 'application/json'},
						jsonData
					);
					expect(response.getCall(0).args[0]).toEqual([{
						'label': 'bobby',
						'value': {'shareType': OC.Share.SHARE_TYPE_USER, 'shareWith': 'imbob'}
					}]);
					expect(autocompleteStub.calledWith("option", "autoFocus", true)).toEqual(true);
				});

				it('groups', function () {
					dialog.render();
					var response = sinon.stub();
					dialog.autocompleteHandler({term: 'group'}, response);
					var jsonData = JSON.stringify({
						'ocs': {
							'meta': {
								'status': 'success',
								'statuscode': 100,
								'message': null
							},
							'data': {
								'exact': {
									'users': [],
									'groups': [],
									'remotes': []
								},
								'users': [],
								'groups': [
									{
										'label': 'group',
										'value': {
											'shareType': OC.Share.SHARE_TYPE_GROUP,
											'shareWith': 'group'
										}
									},
									{
										'label': 'group2',
										'value': {
											'shareType': OC.Share.SHARE_TYPE_GROUP,
											'shareWith': 'group2'
										}
									}
								],
								'remotes': []
							}
						}
					});
					fakeServer.requests[0].respond(
						200,
						{'Content-Type': 'application/json'},
						jsonData
					);
					expect(response.getCall(0).args[0]).toEqual([{
						'label': 'group2',
						'value': {'shareType': OC.Share.SHARE_TYPE_GROUP, 'shareWith': 'group2'}
					}]);
					expect(autocompleteStub.calledWith("option", "autoFocus", true)).toEqual(true);
				});

				it('remotes', function () {
					dialog.render();
					var response = sinon.stub();
					dialog.autocompleteHandler({term: 'bob'}, response);
					var jsonData = JSON.stringify({
						'ocs': {
							'meta': {
								'status': 'success',
								'statuscode': 100,
								'message': null
							},
							'data': {
								'exact': {
									'users': [],
									'groups': [],
									'remotes': []
								},
								'users': [],
								'groups': [],
								'remotes': [
									{
										'label': 'foo@bar.com/baz',
										'value': {
											'shareType': OC.Share.SHARE_TYPE_REMOTE,
											'shareWith': 'foo@bar.com/baz'
										}
									},
									{
										'label': 'foo2@bar.com/baz',
										'value': {
											'shareType': OC.Share.SHARE_TYPE_REMOTE,
											'shareWith': 'foo2@bar.com/baz'
										}
									},
									{
										'label': 'foo@knowncloud.com',
										'value': {
											'shareType': OC.Share.SHARE_TYPE_REMOTE,
											'shareWith': 'foo@knowncloud.com',
											'server': 'knowncloud.com'
										}
									}
								]
							}
						}
					});
					fakeServer.requests[0].respond(
						200,
						{'Content-Type': 'application/json'},
						jsonData
					);
					expect(response.getCall(0).args[0]).toEqual([{
						'label': 'foo2@bar.com/baz',
						'value': {'shareType': OC.Share.SHARE_TYPE_REMOTE, 'shareWith': 'foo2@bar.com/baz'}
					},{
						'label': 'foo@knowncloud.com',
						'value': {
							'shareType': OC.Share.SHARE_TYPE_REMOTE,
							'shareWith': 'foo@knowncloud.com',
							'server': 'knowncloud.com'
						}
					}]);
					expect(autocompleteStub.calledWith("option", "autoFocus", true)).toEqual(true);
				});
			});
		});

		it('gracefully handles successful ajax call with failure content', function () {
			dialog.render();
			var response = sinon.stub();
			dialog.autocompleteHandler({term: 'bob'}, response);
			var jsonData = JSON.stringify({
				'ocs' : {
					'meta' : {
						'status': 'failure',
						'statuscode': 400
					}
				}
			});
			fakeServer.requests[0].respond(
					200,
					{'Content-Type': 'application/json'},
					jsonData
			);
			expect(response.getCall(0).args[0]).not.toBeDefined();
			expect(response.getCall(0).args[1].ocs).toBeDefined();
		});

		it('throws a notification when the ajax search lookup fails', function () {
			notificationStub = sinon.stub(OC.Notification, 'show');
			dialog.render();
			dialog.autocompleteHandler({term: 'bob'}, sinon.stub());
			fakeServer.requests[0].respond(500);
			expect(notificationStub.calledOnce).toEqual(true);
			notificationStub.restore();
		});

		describe('renders the autocomplete elements', function() {
			it('renders a group element', function() {
				dialog.render();
				var el = dialog.autocompleteRenderItem(
						$("<ul></ul>"),
						{label: "1", value: { shareType: OC.Share.SHARE_TYPE_GROUP }}
				);
				expect(el.is('li')).toEqual(true);
				expect(el.hasClass('group')).toEqual(true);
			});

			it('renders user element', function() {
				dialog.render();
				var el = dialog.autocompleteRenderItem(
						$("<ul></ul>"),
						{
							label: "User One",
							value: {
								shareType: OC.Share.SHARE_TYPE_USER,
								shareWithAdditionalInfo: 'user@example.com'
							}
						}
				);
				expect(el.is('li')).toEqual(true);
				expect(el.hasClass('user')).toEqual(true);
				expect(el.find('.autocomplete-item-displayname').text()).toEqual('User One');
				expect(el.find('.autocomplete-item-additional-info').text()).toEqual('(user@example.com)');
			});

			it('renders a remote element', function() {
				dialog.render();
				var el = dialog.autocompleteRenderItem(
						$("<ul></ul>"),
						{label: "1", value: { shareType: OC.Share.SHARE_TYPE_REMOTE }}
				);
				expect(el.is('li')).toEqual(true);
				expect(el.hasClass('user')).toEqual(true);
			});
		});

		it('calls addShare after selection', function() {
			dialog.render();

			var shareWith = $('.shareWithField')[0];
			var $shareWith = $(shareWith);
			var addShareStub = sinon.stub(shareModel, 'addShare');
			var autocompleteOptions = autocompleteStub.getCall(0).args[0];
			autocompleteOptions.select(new $.Event('select', {target: shareWith}), {
				item: {
					label: 'User Two',
					value: {
						shareType: OC.Share.SHARE_TYPE_USER,
						shareWith: 'user2'
					}
				}
			});

			expect(addShareStub.calledOnce).toEqual(true);
			expect(addShareStub.firstCall.args[0]).toEqual({
				shareType: OC.Share.SHARE_TYPE_USER,
				shareWith: 'user2'
			});

			//Input is locked
			expect($shareWith.val()).toEqual('User Two');
			expect($shareWith.attr('disabled')).toEqual('disabled');

			//Callback is called
			addShareStub.firstCall.args[1].success();

			//Input is unlocked
			expect($shareWith.val()).toEqual('');
			expect($shareWith.attr('disabled')).toEqual(undefined);

			addShareStub.restore();
		});

		it('calls addShare after selection and fail to share', function() {
			dialog.render();

			var shareWith = $('.shareWithField')[0];
			var $shareWith = $(shareWith);
			var addShareStub = sinon.stub(shareModel, 'addShare');
			var autocompleteOptions = autocompleteStub.getCall(0).args[0];
			autocompleteOptions.select(new $.Event('select', {target: shareWith}), {
				item: {
					label: 'User Two',
					value: {
						shareType: OC.Share.SHARE_TYPE_USER,
						shareWith: 'user2'
					}
				}
			});

			expect(addShareStub.calledOnce).toEqual(true);
			expect(addShareStub.firstCall.args[0]).toEqual({
				shareType: OC.Share.SHARE_TYPE_USER,
				shareWith: 'user2'
			});

			//Input is locked
			expect($shareWith.val()).toEqual('User Two');
			expect($shareWith.attr('disabled')).toEqual('disabled');

			//Callback is called
			addShareStub.firstCall.args[1].error();

			//Input is unlocked
			expect($shareWith.val()).toEqual('User Two');
			expect($shareWith.attr('disabled')).toEqual(undefined);

			addShareStub.restore();
		});

		it('displays message when not enough characters were typed in and the server returned no matches', function() {
			dialog.render();
			var $shareWithField = $('.shareWithField');
			$shareWithField.val('b');
			var response = sinon.stub();
			dialog.autocompleteHandler({term: 'b'}, response);

			var jsonData = JSON.stringify({
				'ocs': {
					'data': {
						'exact': {
							'users': [],
							'groups': [],
							'remotes': [],
						},
						'users': [],
						'groups': [],
						'remotes': []
					},
					'meta': {
						'status': 'success',
						'statuscode': 100
					}
				}
			});
			expect(fakeServer.requests.length).toEqual(1);
			fakeServer.requests[0].respond(
					200,
					{'Content-Type': 'application/json'},
					jsonData
			);
			expect(response.calledOnce).toEqual(true);
			expect(response.getCall(0).args[0]).toBeUndefined();

			expect($shareWithField.attr('data-original-title'))
				.toEqual('No users found for b. Please enter at least 2 characters for suggestions');
		});

		it('does not display a message when not enough characters were typed in but the server returned an exact match', function() {
			dialog.render();
			var $shareWithField = $('.shareWithField');
			var response = sinon.stub();
			dialog.autocompleteHandler({term: '成'}, response);

			var jsonData = JSON.stringify({
				'ocs': {
					'data': {
						'exact' : {
							'users'  : [{
								'label': '成 龙',
								'value': {
									'shareType': 0,
									'shareWith': 'jackie_chan'
								}
							}],
							'groups' : [],
							'remotes': []
						},
						'users': [],
						'groups': [],
						'remotes': []
					},
					'meta': {
						'status': 'success',
						'statuscode': 100
					}
				}
			});
			expect(fakeServer.requests.length).toEqual(1);
			fakeServer.requests[0].respond(
					200,
					{'Content-Type': 'application/json'},
					jsonData
			);
			expect(response.calledOnce).toEqual(true);
			expect(response.getCall(0).args[0]).toBeDefined();

			expect($shareWithField.attr('data-original-title'))
				.not.toContain('for suggestions');
		});
	});
	describe('reshare permissions', function() {
		it('does not show sharing options when sharing not allowed', function() {
			shareModel.set({
				reshare: {},
				shares: [],
				permissions: OC.PERMISSION_READ
			});
			dialog.render();
			expect(dialog.$el.find('.noSharingPlaceholder').length).toEqual(1);
		});
		it('shows reshare owner for single user share', function() {
			shareModel.set({
				reshare: {
					uid_owner: 'user1',
					displayname_owner: 'User One',
					share_type: OC.Share.SHARE_TYPE_USER
				},
				shares: [],
				permissions: OC.PERMISSION_READ
			});
			dialog.render();
			expect(dialog.$el.find('.resharerInfoView .reshare').length).toEqual(1);
			expect(dialog.$el.find('.resharerInfoView .reshare').text().trim()).toEqual('Shared with you by User One');
		});
		it('shows reshare owner for single user share', function() {
			shareModel.set({
				reshare: {
					uid_owner: 'user1',
					displayname_owner: 'User One',
					share_with: 'group2',
					share_with_displayname: 'Group Two',
					share_type: OC.Share.SHARE_TYPE_GROUP
				},
				shares: [],
				permissions: OC.PERMISSION_READ
			});
			dialog.render();
			expect(dialog.$el.find('.resharerInfoView .reshare').length).toEqual(1);
			expect(dialog.$el.find('.resharerInfoView .reshare').text().trim()).toEqual('Shared with you and the group Group Two by User One');
		});
		it('does not show reshare owner if owner is current user', function() {
			shareModel.set({
				reshare: {
					uid_owner: OC.currentUser
				},
				shares: [],
				permissions: OC.PERMISSION_READ
			});
			dialog.render();
			expect(dialog.$el.find('.resharerInfoView .reshare').length).toEqual(0);
		});
	});
	describe('tabs', function() {
		beforeEach(function() {
			dialog.render();
		});
		it('renders tabs', function() {
			expect(dialog.$('.subTabHeaders>.subTabHeader').length).toEqual(2);
			expect(dialog.$('.tabsContainer>.tab').length).toEqual(2);
		});
		it('does not render tab headers is sharing is not allowed', function() {
			// remove share permission
			shareModel.set('permissions', OC.PERMISSION_READ);

			expect(dialog.$('.subTabHeaders').length).toEqual(0);
			expect(dialog.$('.tabsContainer').length).toEqual(0);
		});
		it('does not render tab headers is link sharing is not allowed', function() {
			$('#allowShareWithLink').val('no');

			dialog.render();

			// only hide headers
			expect(dialog.$('.subTabHeaders').length).toEqual(0);
			expect(dialog.$('.tabsContainer').length).toEqual(1);
		});
		it('initially selects first tab', function() {
			expect(dialog.$('.subTabHeaders>.subTabHeader:eq(0)').hasClass('selected')).toEqual(true);
			expect(dialog.$('.subTabHeaders>.subTabHeader:eq(1)').hasClass('selected')).toEqual(false);
			expect(dialog.$('.tabsContainer>.tab:eq(0)').hasClass('hidden')).toEqual(false);
			expect(dialog.$('.tabsContainer>.tab:eq(1)').hasClass('hidden')).toEqual(true);
		});
		it('switches tab when clicking on it', function() {

			dialog.$('.subTabHeaders>.subTabHeader:eq(1)').click();

			expect(dialog.$('.subTabHeaders>.subTabHeader:eq(0)').hasClass('selected')).toEqual(false);
			expect(dialog.$('.subTabHeaders>.subTabHeader:eq(1)').hasClass('selected')).toEqual(true);
			expect(dialog.$('.tabsContainer>.tab:eq(0)').hasClass('hidden')).toEqual(true);
			expect(dialog.$('.tabsContainer>.tab:eq(1)').hasClass('hidden')).toEqual(false);
		});
		it('creates link share view only after selecting tab', function() {
			expect(dialog.$('.linkShareView').is(':empty')).toEqual(true);
			
			dialog.$('.subTabHeaders>.subTabHeader:eq(1)').click();

			expect(dialog.$('.linkShareView').is(':empty')).toEqual(false);
		});
	});
});
