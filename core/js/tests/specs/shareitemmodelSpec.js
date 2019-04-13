/**
* ownCloud
*
* @author Vincent Petry
* @copyright Copyright (c) 2015 Vincent Petry <pvince81@owncloud.com>
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
describe('OC.Share.ShareItemModel', function() {
	var fetchSharesStub, fetchReshareStub;
	var fetchSharesDeferred, fetchReshareDeferred;
	var fileInfoModel, configModel, model;
	var oldCurrentUser;
	var capsSpec;

	beforeEach(function() {
		oldCurrentUser = OC.currentUser;

		fetchSharesDeferred = new $.Deferred();
		fetchSharesStub = sinon.stub(OC.Share.ShareItemModel.prototype, '_fetchShares')
			.returns(fetchSharesDeferred.promise());
		fetchReshareDeferred = new $.Deferred();
		fetchReshareStub = sinon.stub(OC.Share.ShareItemModel.prototype, '_fetchReshare')
			.returns(fetchReshareDeferred.promise());

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
			possiblePermissions: fileInfoModel.get('sharePermissions')
		};
		configModel = new OC.Share.ShareConfigModel();
		model = new OC.Share.ShareItemModel(properties, {
			configModel: configModel,
			fileInfoModel: fileInfoModel
		});
		capsSpec = sinon.stub(OC, 'getCapabilities');
		capsSpec.returns({
			'files_sharing': {
				'default_permissions': OC.PERMISSION_ALL
			}
		});
	});
	afterEach(function() {
		capsSpec.restore(); 
		if (fetchSharesStub) {
			fetchSharesStub.restore();
		}
		if (fetchReshareStub) {
			fetchReshareStub.restore();
		}
		OC.currentUser = oldCurrentUser;
	});

	function makeOcsResponse(data) {
		return [{
			ocs: {
				data: data
			}
		}];
	}

	describe('Fetching and parsing', function() {
		it('fetches both outgoing shares and the current incoming share', function() {
			model.fetch();

			expect(fetchSharesStub.calledOnce).toEqual(true);
			expect(fetchReshareStub.calledOnce).toEqual(true);
		});
		it('fetches shares for the current path', function() {
			fetchSharesStub.restore();

			model._fetchShares();

			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].method).toEqual('GET');
			expect(fakeServer.requests[0].url).toEqual(
				OC.linkToOCS('apps/files_sharing/api/v1', 2) +
				'shares?format=json&path=%2Fsubdir%2Fshared_file_name.txt&reshares=true'
			);

			fetchSharesStub = null;
		});
		it('fetches reshare for the current path', function() {
			fetchReshareStub.restore();

			model._fetchReshare();

			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].method).toEqual('GET');
			expect(fakeServer.requests[0].url).toEqual(
				OC.linkToOCS('apps/files_sharing/api/v1', 2) +
				'shares?format=json&path=%2Fsubdir%2Fshared_file_name.txt&shared_with_me=true'
			);

			fetchReshareStub = null;
		});
		it('populates properties with parsed response', function() {
			/* jshint camelcase: false */
			fetchReshareDeferred.resolve(makeOcsResponse([
				{
					share_type: OC.Share.SHARE_TYPE_USER,
					uid_owner: 'owner',
					displayname_owner: 'Owner',
					permissions: 31
				}
			]));
			fetchSharesDeferred.resolve(makeOcsResponse([
				{
					id: 100,
					item_source: 123,
					permissions: 31,
					attributes: '[{"scope":"test","key":"test","enabled":false}]',
					share_type: OC.Share.SHARE_TYPE_USER,
					share_with: 'user1',
					share_with_displayname: 'User One'
				}, {
					id: 101,
					item_source: 123,
					permissions: 31,
					attributes: '[]',
					share_type: OC.Share.SHARE_TYPE_GROUP,
					share_with: 'group',
					share_with_displayname: 'group'
				}, {
					id: 102,
					item_source: 123,
					permissions: 31,
					attributes: '[]',
					share_type: OC.Share.SHARE_TYPE_REMOTE,
					share_with: 'foo@bar.com/baz',
					share_with_displayname: 'foo@bar.com/baz'

				}, {
					displayname_owner: 'root',
					expiration: null,
					file_source: 123,
					file_target: '/folder',
					id: 20,
					item_source: '123',
					item_type: 'folder',
					mail_send: '0',
					parent: null,
					path: '/folder',
					permissions: OC.PERMISSION_READ,
					share_type: OC.Share.SHARE_TYPE_LINK,
					share_with: null,
					stime: 1403884258,
					storage: 1,
					token: 'tehtoken',
					uid_owner: 'root',
					name: 'first link share'
				}, {
					displayname_owner: 'root',
					expiration: '2017-10-12 00:00:00',
					file_source: 123,
					file_target: '/folder',
					id: 21,
					item_source: '123',
					item_type: 'folder',
					mail_send: '0',
					parent: null,
					path: '/folder',
					permissions: OC.PERMISSION_READ,
					share_type: OC.Share.SHARE_TYPE_LINK,
					share_with: 'somepassword',
					stime: 1403884259,
					storage: 1,
					token: 'tehtoken2',
					uid_owner: 'root',
					name: 'second link share'
				}
			]));

			OC.currentUser = 'root';

			model.fetch();

			var shares = model.get('shares');
			expect(shares.length).toEqual(3);
			expect(shares[0].id).toEqual(100);
			expect(shares[0].permissions).toEqual(31);
			expect(shares[0].attributes).toEqual([{ scope: 'test', key: 'test', enabled: false }]);
			expect(shares[0].share_type).toEqual(OC.Share.SHARE_TYPE_USER);
			expect(shares[0].share_with).toEqual('user1');
			expect(shares[0].share_with_displayname).toEqual('User One');

			expect(model.hasLinkShare()).toEqual(true);

			var linkShares = model.getLinkSharesCollection();
			expect(linkShares.length).toEqual(2);

			expect(linkShares.at(0).get('name')).toEqual('first link share');
			expect(linkShares.at(0).get('token')).toEqual('tehtoken');
			expect(linkShares.at(0).get('password')).not.toBeDefined();
			expect(linkShares.at(0).get('encryptedPassword')).toEqual(null);
			expect(linkShares.at(0).get('expireDate')).toEqual(null);

			expect(linkShares.at(1).get('name')).toEqual('second link share');
			expect(linkShares.at(1).get('token')).toEqual('tehtoken2');
			expect(linkShares.at(1).get('password')).not.toBeDefined();
			expect(linkShares.at(1).get('encryptedPassword')).toEqual('somepassword');
			expect(linkShares.at(1).get('expireDate')).toEqual('2017-10-12 00:00:00');
		});
		it('groups reshare info into a single item', function() {
			/* jshint camelcase: false */
			fetchReshareDeferred.resolve(makeOcsResponse([
				{
					id: '1',
					share_type: OC.Share.SHARE_TYPE_USER,
					uid_owner: 'owner',
					displayname_owner: 'Owner',
					share_with: 'root',
					share_with_displayname: 'Wurzel',
					permissions: 1
				},
				{
					id: '2',
					share_type: OC.Share.SHARE_TYPE_GROUP,
					uid_owner: 'owner',
					displayname_owner: 'Owner',
					share_with: 'group1',
					permissions: 15
				},
				{
					id: '3',
					share_type: OC.Share.SHARE_TYPE_GROUP,
					uid_owner: 'owner',
					displayname_owner: 'Owner',
					share_with: 'group1',
					permissions: 17
				}
			]));
			fetchSharesDeferred.resolve(makeOcsResponse([]));

			OC.currentUser = 'root';

			model.fetch();

			var reshare = model.get('reshare');
			// max permissions
			expect(reshare.permissions).toEqual(31);
			// user share has higher priority
			expect(reshare.share_type).toEqual(OC.Share.SHARE_TYPE_USER);
			expect(reshare.share_with).toEqual('root');
			expect(reshare.share_with_displayname).toEqual('Wurzel');
			expect(reshare.id).toEqual('1');

			expect(model.getReshareWith()).toEqual('root');
			expect(model.getReshareWithDisplayName()).toEqual('Wurzel');
		});
		it('does not parse link share when for a different file', function() {
			/* jshint camelcase: false */
			fetchReshareDeferred.resolve(makeOcsResponse([]));
			fetchSharesDeferred.resolve(makeOcsResponse([{
					displayname_owner: 'root',
					expiration: null,
					file_source: 456,
					file_target: '/folder',
					id: 20,
					item_source: '456',
					item_type: 'folder',
					mail_send: '0',
					parent: null,
					path: '/folder',
					permissions: OC.PERMISSION_READ,
					share_type: OC.Share.SHARE_TYPE_LINK,
					share_with: null,
					stime: 1403884258,
					storage: 1,
					token: 'tehtoken',
					uid_owner: 'root'
				}]
			));

			model.fetch();

			var shares = model.get('shares');
			// remaining share appears in this list
			expect(shares.length).toEqual(1);

			var linkShare = model.getLinkSharesCollection();
			expect(linkShare.length).toEqual(0);
			expect(model.hasLinkShare()).toEqual(false);
		});
		it('parses correct link share when a nested link share exists along with parent one', function() {
			/* jshint camelcase: false */
			fetchReshareDeferred.resolve(makeOcsResponse([]));
			fetchSharesDeferred.resolve(makeOcsResponse([{
					displayname_owner: 'root',
					expiration: '2015-10-12 00:00:00',
					file_source: 123,
					file_target: '/folder',
					id: 20,
					item_source: '123',
					item_type: 'file',
					mail_send: '0',
					parent: null,
					path: '/folder',
					permissions: OC.PERMISSION_READ,
					share_type: OC.Share.SHARE_TYPE_LINK,
					share_with: null,
					stime: 1403884258,
					storage: 1,
					token: 'tehtoken',
					uid_owner: 'root'
				}, {
					displayname_owner: 'root',
					expiration: '2015-10-15 00:00:00',
					file_source: 456,
					file_target: '/file_in_folder.txt',
					id: 21,
					item_source: '456',
					item_type: 'file',
					mail_send: '0',
					parent: null,
					path: '/folder/file_in_folder.txt',
					permissions: OC.PERMISSION_READ,
					share_type: OC.Share.SHARE_TYPE_LINK,
					share_with: null,
					stime: 1403884509,
					storage: 1,
					token: 'anothertoken',
					uid_owner: 'root'
				}]
			));
			OC.currentUser = 'root';
			model.fetch();

			var shares = model.get('shares');
			// the parent share remains in the list
			expect(shares.length).toEqual(1);

			var linkShares = model.getLinkSharesCollection();
			expect(linkShares.length).toEqual(1);
			expect(linkShares.at(0).get('token')).toEqual('tehtoken');

			// TODO: check child too
		});
		it('reduces reshare permissions to the ones from the original share', function() {
			/* jshint camelcase: false */
			fetchReshareDeferred.resolve(makeOcsResponse([{
				id: 123,
				permissions: OC.PERMISSION_READ,
				uid_owner: 'user1'
			}]));
			fetchSharesDeferred.resolve(makeOcsResponse([]));
			model.fetch();

			// no resharing allowed
			expect(model.get('permissions')).toEqual(OC.PERMISSION_READ);
		});
		it('reduces reshare permissions to possible permissions', function() {
			/* jshint camelcase: false */
			fetchReshareDeferred.resolve(makeOcsResponse([{
				id: 123,
				permissions: OC.PERMISSION_ALL,
				uid_owner: 'user1'
			}]));
			fetchSharesDeferred.resolve(makeOcsResponse([]));

			model.set('possiblePermissions', OC.PERMISSION_READ);
			model.fetch();

			// no resharing allowed
			expect(model.get('permissions')).toEqual(OC.PERMISSION_READ);
		});
		it('allows owner to share their own share when they are also the recipient', function() {
			OC.currentUser = 'user1';
			fetchReshareDeferred.resolve(makeOcsResponse([]));
			fetchSharesDeferred.resolve(makeOcsResponse([]));

			model.fetch();

			// sharing still allowed
			expect(model.get('permissions') & OC.PERMISSION_SHARE).toEqual(OC.PERMISSION_SHARE);
		});
		it('properly parses integer values when the server is in the mood of returning ints as string', function() {
			/* jshint camelcase: false */
			fetchReshareDeferred.resolve(makeOcsResponse([]));
			fetchSharesDeferred.resolve(makeOcsResponse([{
					displayname_owner: 'root',
					expiration: '2015-10-12 00:00:00',
					file_source: '123',
					file_target: '/folder',
					id: '20',
					item_source: '123',
					item_type: 'file',
					mail_send: '0',
					parent: '999',
					path: '/folder',
					permissions: '' + OC.PERMISSION_READ,
					share_type: '' + OC.Share.SHARE_TYPE_USER,
					share_with: 'user1',
					stime: '1403884258',
					storage: '1',
					token: 'tehtoken',
					uid_owner: 'root'
				}]
			));

			model.fetch();

			var shares = model.get('shares');
			expect(shares.length).toEqual(1);

			var share = shares[0];
			expect(share.id).toEqual(20);
			expect(share.file_source).toEqual(123);
			expect(share.file_target).toEqual('/folder');
			expect(share.item_source).toEqual(123);
			expect(share.item_type).toEqual('file');
			expect(share.displayname_owner).toEqual('root');
			expect(share.mail_send).toEqual(0);
			expect(share.parent).toEqual(999);
			expect(share.path).toEqual('/folder');
			expect(share.permissions).toEqual(OC.PERMISSION_READ);
			expect(share.share_type).toEqual(OC.Share.SHARE_TYPE_USER);
			expect(share.share_with).toEqual('user1');
			expect(share.stime).toEqual(1403884258);
			expect(share.expiration).toEqual('2015-10-12 00:00:00');
		});
	});
	describe('hasUserShares', function() {
		it('returns false when no user shares exist', function() {
			fetchReshareDeferred.resolve(makeOcsResponse([]));
			fetchSharesDeferred.resolve(makeOcsResponse([]));

			model.fetch();

			expect(model.hasUserShares()).toEqual(false);
		});
		it('returns true when user shares exist on the current item', function() {
			/* jshint camelcase: false */
			fetchReshareDeferred.resolve(makeOcsResponse([]));
			fetchSharesDeferred.resolve(makeOcsResponse([{
				id: 1,
				share_type: OC.Share.SHARE_TYPE_USER,
				share_with: 'user1',
				item_source: '123'
			}]));

			model.fetch();

			expect(model.hasUserShares()).toEqual(true);
		});
		it('returns true when group shares exist on the current item', function() {
			/* jshint camelcase: false */
			fetchReshareDeferred.resolve(makeOcsResponse([]));
			fetchSharesDeferred.resolve(makeOcsResponse([{
				id: 1,
				share_type: OC.Share.SHARE_TYPE_GROUP,
				share_with: 'group1',
				item_source: '123'
			}]));

			model.fetch();

			expect(model.hasUserShares()).toEqual(true);
		});
		it('returns false when share exist on parent item', function() {
			/* jshint camelcase: false */
			fetchReshareDeferred.resolve(makeOcsResponse([]));
			fetchSharesDeferred.resolve(makeOcsResponse([{
				id: 1,
				share_type: OC.Share.SHARE_TYPE_GROUP,
				share_with: 'group1',
				item_source: '111'
			}]));

			model.fetch();

			expect(model.hasUserShares()).toEqual(false);
		});
	});

	describe('Util', function() {
		it('parseTime should properly parse strings', function() {

			_.each([
				[ '123456', 123456],
				[  123456 , 123456],
				['0123456', 123456],
				['abcdefg',   null],
				['0x12345',   null],
				[       '',   null],
			], function(value) {
				expect(OC.Share.ShareItemModel.prototype._parseTime(value[0])).toEqual(value[1]);
			});

		});
	});

	describe('share permissions', function() {
		beforeEach(function() {
			oc_appconfig.core.resharingAllowed = true;
		});

		/**
		 * Tests sharing with the given possible permissions
		 *
		 * @param {int} possiblePermissions
		 * @return {int} permissions sent to the server
		 */
		function testWithPermissions(possiblePermissions) {
			model.set({
				permissions: possiblePermissions,
				possiblePermissions: possiblePermissions
			});
			model.addShare({
				shareType: OC.Share.SHARE_TYPE_USER,
				shareWith: 'user2'
			});

			var requestBody = OC.parseQueryString(_.last(fakeServer.requests).requestBody);
			return parseInt(requestBody.permissions, 10);
		}

		describe('regular sharing', function() {
			it('shares with given permissions with default config', function() {
				configModel.set('isResharingAllowed', true);
				model.set({
					reshare: {},
					shares: []
				});
				expect(
					testWithPermissions(OC.PERMISSION_READ | OC.PERMISSION_UPDATE | OC.PERMISSION_SHARE)
				).toEqual(OC.PERMISSION_READ | OC.PERMISSION_UPDATE | OC.PERMISSION_SHARE);
				expect(
					testWithPermissions(OC.PERMISSION_READ | OC.PERMISSION_SHARE)
				).toEqual(OC.PERMISSION_READ | OC.PERMISSION_SHARE);
			});
			it('removes share permission when not allowed', function() {
				configModel.set('isResharingAllowed', false);
				model.set({
					reshare: {},
					shares: []
				});
				expect(
					testWithPermissions(OC.PERMISSION_READ | OC.PERMISSION_UPDATE | OC.PERMISSION_SHARE)
				).toEqual(OC.PERMISSION_READ | OC.PERMISSION_UPDATE);
			});
			it('automatically adds READ permission even when not specified', function() {
				configModel.set('isResharingAllowed', false);
				model.set({
					reshare: {},
					shares: []
				});
				expect(
					testWithPermissions(OC.PERMISSION_UPDATE | OC.PERMISSION_SHARE)
				).toEqual(OC.PERMISSION_READ | OC.PERMISSION_UPDATE);
			});
			it('uses default permissions from capabilities', function() {
				capsSpec.returns({
					'files_sharing': {
						'default_permissions': OC.PERMISSION_READ | OC.PERMISSION_CREATE | OC.PERMISSION_SHARE
					}
				});
				configModel.set('isResharingAllowed', true);
				model.set({
					reshare: {},
					shares: []
				});
				expect(
					testWithPermissions(OC.PERMISSION_ALL)
				).toEqual(OC.PERMISSION_READ | OC.PERMISSION_CREATE | OC.PERMISSION_SHARE);
			});
		});
	});

	describe('share attributes', function() {
		beforeEach(function() {
			model.set({
				reshare: {},
				shares: [],
				_registeredAttributes: []
			});
		});

		/**
		 * Creates dummy attribute
		 *
		 * @return {OC.Share.Types.RegisteredShareAttribute} registered attribute
		 */
		function createRegisteredAttribute() {
			return {
				scope: "test",
				key: "test",
				default: true,
				label: "test",
				shareType : [
					OC.Share.SHARE_TYPE_GROUP,
					OC.Share.SHARE_TYPE_USER
				],
				incompatiblePermissions: [],
				requiredPermissions: [],
				incompatibleAttributes: []
			};
		}

		/**
		 * Parses attributes of share creation
		 * request (request send to the server)
		 *
		 * @return {OC.Share.Types.ShareAttribute[]}
		 */
		function parseLastRequestAttributes() {
			var requestBody = OC.parseQueryString(fakeServer.requests[0].requestBody);

			var i = -1;
			var attributes = [];
			_.map(Object.keys(requestBody), function(key) {
				if (key.indexOf('attributes') !== -1) {
					if (key.indexOf('scope') !== -1) {
						i = i + 1;
						attributes.push({});
						attributes[i].scope = requestBody[key];
					}
					if (key.indexOf('key') !== -1) {
						attributes[i].key = requestBody[key];
					}
					if (key.indexOf('enabled') !== -1) {
						attributes[i].enabled = JSON.parse(requestBody[key]);
					}
				}
			});

			//console.log(requestBody);
			return attributes;
		}

		/**
		 * Tests sharing with the given possible attributes
		 *
		 * @param {int} permissionsToSet
		 * @param {OC.Share.Types.RegisteredShareAttribute[]} attributesToRegister
		 * @param {Object} sharePropertiesToUpdate
		 * @return {OC.Share.Types.ShareAttribute[]}
		 */
		function testShareWithAttributes(permissionsToSet, attributesToRegister, sharePropertiesToUpdate) {
			model.set({
				permissions: permissionsToSet,
				possiblePermissions: permissionsToSet
			});

			_.map(attributesToRegister, function (attributeToRegister) {
				model.registerShareAttribute(attributeToRegister);
			});

			if (Object.keys(sharePropertiesToUpdate).length > 0) {
				// if there are properties to update, update share
				model.updateShare(123, sharePropertiesToUpdate, {});
			} {
				// no share properties to update, so new share
				model.addShare({
					shareType: OC.Share.SHARE_TYPE_USER,
					shareWith: 'user2'
				});
			}

			return parseLastRequestAttributes();
		}

		describe('new share', function() {

			it('no registered attributes', function () {
				// define test
				var permissionsToSet = OC.PERMISSION_READ | OC.PERMISSION_UPDATE | OC.PERMISSION_SHARE;
				var attributesToRegister = [];
				var sharePropertiesToUpdate = {};

				// define expected result and test
				expect(
					testShareWithAttributes(permissionsToSet, attributesToRegister, sharePropertiesToUpdate)
				).toEqual([]);
			});

			it('registered attributes become default attributes', function () {
				// define test
				var permissionsToSet = OC.PERMISSION_READ | OC.PERMISSION_UPDATE | OC.PERMISSION_SHARE;
				var attr1 = createRegisteredAttribute();
				var attributesToRegister = [
					attr1
				];
				var sharePropertiesToUpdate = {};

				// define expected result
				var attributesToExpect = [
					{scope: "test", key: "test", enabled: true}
				];

				// test
				expect(
					testShareWithAttributes(permissionsToSet, attributesToRegister, sharePropertiesToUpdate)
				).toEqual(attributesToExpect);
			});

			it('test registering attributes with all filters', function () {
				var attr1 = createRegisteredAttribute();
				attr1.key = "requires-create";
				attr1.incompatiblePermissions = [];
				attr1.requiredPermissions = [OC.PERMISSION_CREATE];
				attr1.incompatibleAttributes = [];

				var attr2 = createRegisteredAttribute();
				attr2.key = "requires-update";
				attr2.incompatiblePermissions = [];
				attr2.requiredPermissions = [OC.PERMISSION_UPDATE];
				attr2.incompatibleAttributes = [];

				var attr3 = createRegisteredAttribute();
				attr3.key = "incompatible-create";
				attr3.incompatiblePermissions = [OC.PERMISSION_CREATE];
				attr3.requiredPermissions = [];
				attr3.incompatibleAttributes = [];

				var attr4 = createRegisteredAttribute();
				attr4.key = "incompatible-update";
				attr4.incompatiblePermissions = [OC.PERMISSION_UPDATE];
				attr4.requiredPermissions = [];
				attr4.incompatibleAttributes = [];

				var attr5 = createRegisteredAttribute();
				attr5.key = "incompatible-attribute-requires-update-true";
				attr5.incompatiblePermissions = [];
				attr5.requiredPermissions = [];
				attr5.incompatibleAttributes = [{
					scope: "test",
					key: "requires-update",
					enabled: true
				}];

				var attr6 = createRegisteredAttribute();
				attr6.key = "incompatible-attribute-requires-update-false";
				attr6.incompatiblePermissions = [];
				attr6.requiredPermissions = [];
				attr6.incompatibleAttributes = [{
					scope: "test",
					key: "requires-update",
					enabled: false
				}];

				// register attribute
				var permissionsToSet = OC.PERMISSION_READ | OC.PERMISSION_UPDATE | OC.PERMISSION_SHARE;
				var attributesToRegister = [
					attr1, attr2, attr3, attr4, attr5, attr6
				];

				// this test does not update existing share
				var sharePropertiesToUpdate = {};

				// expect that new created share will have following attributes
				var attributesToExpect = [
					{scope: "test", key: "requires-update", enabled: true},
					{scope: "test", key: "incompatible-create", enabled: true},
					{
						scope: "test",
						key: "incompatible-attribute-requires-update-false",
						enabled: true
					}
				];

				// test
				expect(
					testShareWithAttributes(permissionsToSet, attributesToRegister, sharePropertiesToUpdate)
				).toEqual(attributesToExpect);
			});
		});

		describe('update share', function() {
			it('update with new attribute but none registered (error handling scenario)', function() {
				// define test
				var permissionsToSet = OC.PERMISSION_READ | OC.PERMISSION_UPDATE | OC.PERMISSION_SHARE;
				var attributesToRegister = [];
				var sharePropertiesToUpdate = {
					attributes: [
						{ scope: "test", key: "test", enabled: false }
					],
					permissions: permissionsToSet
				};

				// define expected result and test
				expect(
					testShareWithAttributes(permissionsToSet, attributesToRegister, sharePropertiesToUpdate)
				).toEqual([]);
			});

			it('update existing default attribute with new enabled value', function() {
				// define test
				var permissionsToSet = OC.PERMISSION_READ | OC.PERMISSION_UPDATE | OC.PERMISSION_SHARE;

				var attr1 = createRegisteredAttribute();
				attr1.scope = "test";
				attr1.key = "test";
				attr1.default = true;
				var attributesToRegister = [attr1];

				var sharePropertiesToUpdate = {
					attributes: [
						{ scope: "test", key: "test", enabled: false }
					],
					permissions: permissionsToSet
				};

				// define expected result
				var attributesToExpect = [
					{ scope: "test", key: "test", enabled: false }
				];

				// test
				expect(
					testShareWithAttributes(permissionsToSet, attributesToRegister, sharePropertiesToUpdate)
				).toEqual(attributesToExpect);
			});

			it('update permission with incompatible/required permissions filter', function() {
				// define test
				var permissionsToSet = OC.PERMISSION_READ;

				var attr1 = createRegisteredAttribute();
				attr1.key = "incompatible-create";
				attr1.incompatiblePermissions = [ OC.PERMISSION_CREATE ];
				attr1.requiredPermissions = [];
				attr1.incompatibleAttributes = [];
				var attr2 = createRegisteredAttribute();
				attr2.key = "required-create";
				attr2.incompatiblePermissions = [];
				attr2.requiredPermissions = [ OC.PERMISSION_CREATE ];
				attr2.incompatibleAttributes = [];

				var attributesToRegister = [attr1, attr2];

				var sharePropertiesToUpdate = {
					permissions: OC.PERMISSION_READ | OC.PERMISSION_CREATE
				};

				// define expected result
				var attributesToExpect = [
					{ scope: "test", key: "required-create", enabled: true }
				];

				// test
				expect(
					testShareWithAttributes(permissionsToSet, attributesToRegister, sharePropertiesToUpdate)
				).toEqual(attributesToExpect);
			});

			it('update permissions with incompatible filter for previously enabled attribute', function() {
				// define test
				var permissionsToSet = OC.PERMISSION_READ | OC.PERMISSION_UPDATE;

				// test attribute which is enabled only without update permission
				var attr1 = createRegisteredAttribute();
				attr1.key = "incompatible-update";
				attr1.incompatiblePermissions = [ OC.PERMISSION_UPDATE ];
				attr1.requiredPermissions = [ ];
				attr1.incompatibleAttributes = [];

				// test attribute which is not available when review attr is enabled
				var attr2 = createRegisteredAttribute();
				attr2.key = "incompatible-with-attribute";
				attr2.incompatiblePermissions = [];
				attr2.requiredPermissions = [];
				attr2.incompatibleAttributes = [{ scope: "test", key: "incompatible-update", enabled: true }];

				// test attribute that can always be registered
				var attr3 = createRegisteredAttribute();
				attr3.key = "test-attribute";
				attr3.incompatiblePermissions = [];
				attr3.requiredPermissions = [];
				attr3.incompatibleAttributes = [];

				var attributesToRegister = [attr1, attr2, attr3];

				var sharePropertiesToUpdate = {
					permissions: OC.PERMISSION_READ
				};

				// define expected result - restricted-options should not appear
				var attributesToExpect = [
					{ scope: "test", key: "incompatible-update", enabled: true },
					{ scope: "test", key: "test-attribute", enabled: true }
				];

				// test
				expect(
					testShareWithAttributes(permissionsToSet, attributesToRegister, sharePropertiesToUpdate)
				).toEqual(attributesToExpect);
			});
		});
	});

	describe('creating shares', function() {
		it('sends POST method to endpoint with passed values', function() {
			model.addShare({
				shareType: OC.Share.SHARE_TYPE_GROUP,
				shareWith: 'group1'
			});

			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].method).toEqual('POST');
			expect(fakeServer.requests[0].url).toEqual(
				OC.linkToOCS('apps/files_sharing/api/v1', 2) +
				'shares?format=json'
			);
			expect(OC.parseQueryString(fakeServer.requests[0].requestBody)).toEqual({
				path: '/subdir/shared_file_name.txt',
				permissions: '' + OC.PERMISSION_READ,
				shareType: '' + OC.Share.SHARE_TYPE_GROUP,
				shareWith: 'group1'
			});
		});
		it('calls error handler with error message', function() {
			var errorStub = sinon.stub();
			model.addShare({
				shareType: OC.Share.SHARE_TYPE_GROUP,
				shareWith: 'group1'
			}, {
				error: errorStub
			});

			expect(fakeServer.requests.length).toEqual(1);
			fakeServer.requests[0].respond(
				400,
				{ 'Content-Type': 'application/json' },
				JSON.stringify({
					ocs: {
						meta: {
							message: 'Some error message'
						}
					}
				})
			);

			expect(errorStub.calledOnce).toEqual(true);
			expect(errorStub.lastCall.args[1]).toEqual('Some error message');
		});
	});
	describe('updating shares', function() {
		it('sends PUT method to endpoint with passed values', function() {
			model.updateShare(123, {
				permissions: OC.PERMISSION_READ | OC.PERMISSION_SHARE
			});

			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].method).toEqual('PUT');
			expect(fakeServer.requests[0].url).toEqual(
				OC.linkToOCS('apps/files_sharing/api/v1', 2) +
				'shares/123?format=json'
			);
			expect(OC.parseQueryString(fakeServer.requests[0].requestBody)).toEqual({
				permissions: '' + (OC.PERMISSION_READ | OC.PERMISSION_SHARE)
			});
		});
		it('calls error handler with error message', function() {
			var errorStub = sinon.stub();
			model.updateShare(123, {
				permissions: OC.PERMISSION_READ | OC.PERMISSION_SHARE
			}, {
				error: errorStub
			});

			expect(fakeServer.requests.length).toEqual(1);
			fakeServer.requests[0].respond(
				400,
				{ 'Content-Type': 'application/json' },
				JSON.stringify({
					ocs: {
						meta: {
							message: 'Some error message'
						}
					}
				})
			);

			expect(errorStub.calledOnce).toEqual(true);
			expect(errorStub.lastCall.args[1]).toEqual('Some error message');
		});
	});
	describe('removing shares', function() {
		it('sends DELETE method to endpoint with share id', function() {
			model.removeShare(123);

			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].method).toEqual('DELETE');
			expect(fakeServer.requests[0].url).toEqual(
				OC.linkToOCS('apps/files_sharing/api/v1', 2) +
				'shares/123?format=json'
			);
		});
		it('calls error handler with error message', function() {
			var errorStub = sinon.stub();
			model.removeShare(123, {
				error: errorStub
			});

			expect(fakeServer.requests.length).toEqual(1);
			fakeServer.requests[0].respond(
				400,
				{ 'Content-Type': 'application/json' },
				JSON.stringify({
					ocs: {
						meta: {
							message: 'Some error message'
						}
					}
				})
			);

			expect(errorStub.calledOnce).toEqual(true);
			expect(errorStub.lastCall.args[1]).toEqual('Some error message');
		});
	});

	describe('getShareTypes', function() {

		var dataProvider = [
			[
			],
			[
				OC.Share.SHARE_TYPE_USER,
				OC.Share.SHARE_TYPE_USER,
			],
			[
				OC.Share.SHARE_TYPE_USER,
				OC.Share.SHARE_TYPE_GROUP,
				OC.Share.SHARE_TYPE_LINK,
				OC.Share.SHARE_TYPE_REMOTE
			],
			[
				OC.Share.SHARE_TYPE_USER,
				OC.Share.SHARE_TYPE_GROUP,
				OC.Share.SHARE_TYPE_GROUP,
				OC.Share.SHARE_TYPE_LINK,
				OC.Share.SHARE_TYPE_LINK,
				OC.Share.SHARE_TYPE_REMOTE,
				OC.Share.SHARE_TYPE_REMOTE,
				OC.Share.SHARE_TYPE_REMOTE
			],
			[
				OC.Share.SHARE_TYPE_LINK,
				OC.Share.SHARE_TYPE_LINK,
				OC.Share.SHARE_TYPE_USER
			]
		];

		_.each(dataProvider, function testCase(shareTypes, i) {
			it('returns set of share types for case ' + i, function() {
				/* jshint camelcase: false */
				fetchReshareDeferred.resolve(makeOcsResponse([]));

				var id = 100;
				var shares = _.map(shareTypes, function(shareType) {
					return {
						id: id++,
						item_source: 123,
						permissions: 31,
						share_type: shareType,
						uid_owner: 'root'
					};
				});

				var expectedResult = _.uniq(shareTypes).sort();

				fetchSharesDeferred.resolve(makeOcsResponse(shares));

				OC.currentUser = 'root';

				model.fetch();

				expect(model.getShareTypes().sort()).toEqual(expectedResult);
			});
		});
	});
});

