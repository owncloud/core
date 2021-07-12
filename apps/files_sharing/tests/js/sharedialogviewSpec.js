/**
* ownCloud
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
describe('OCA.Sharing.ShareDialogView tests', function() {
	var $container;
	var oldAppConfig;
	var oldCurrentUser;

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
		oc_appconfig.files_sharing = oc_appconfig.files_sharing || {};

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
		configModel = new OC.Share.ShareConfigModel();
		shareModel = new OC.Share.ShareItemModel(attributes, {
			configModel: configModel,
			fileInfoModel: fileInfoModel
		});
		dialog = new OC.Share.ShareDialogView({
			configModel: configModel,
			model: shareModel
		});

		OCA.Sharing.ShareDialogView.attach(dialog);

		$('#testArea').append(dialog.$el);

		// triggers rendering
		shareModel.set({
			shares: []
		});

		oldCurrentUser = OC.currentUser;
		OC.currentUser = 'user0';
		OC.currentUser.groups = ['admin'];
	});
	afterEach(function() {
		OC.currentUser = oldCurrentUser;
		/* jshint camelcase:false */
		oc_appconfig.core = oldAppConfig;
		dialog.remove();
	});

	describe('tabs', function() {
		it('renders tabs', function() {
			oc_appconfig.files_sharing.publicShareSharersGroupsAllowlistEnabled = false;
			dialog.render();
			expect(dialog.$('.subTabHeaders>.subTabHeader').length).toEqual(2);
			expect(dialog.$('.tabsContainer>.tab').length).toEqual(2);
		});
		it('does not render public sharing tab when not allowed', function() {
			oc_appconfig.files_sharing.publicShareSharersGroupsAllowlistEnabled = true;
			oc_appconfig.files_sharing.publicShareSharersGroupsAllowlist = ['allowedGroup'];
			dialog.render();
			expect(dialog.$('.subTabHeaders>.subtab-publicshare').length).toEqual(0);
		});
	});

});
