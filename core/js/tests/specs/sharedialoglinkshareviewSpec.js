/**
* ownCloud
*
* @author Vincent Petry
* @copyright 2017 Vincent Petry <pvince81@owncloud.com>
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

describe('OC.Share.ShareDialogLinkShareView', function() {
	var itemModel;
	var fileInfoModel;
	var configModel;
	var tooltipStub;
	var model;
	var view;

	beforeEach(function() {
		configModel = new OC.Share.ShareConfigModel();
		fileInfoModel = new OCA.Files.FileInfoModel({
			id: 123,
			name: 'shared_folder',
			path: '/subdir',
			size: 100,
			mimetype: 'httpd/unix-directory',
			permissions: 31,
			sharePermissions: 31
		});
		itemModel = new OC.Share.ShareItemModel({
			itemType: 'folder',
			itemSource: 123,
			permissions: 31
		}, {
			configModel: configModel,
			fileInfoModel: fileInfoModel
		});

		tooltipStub = sinon.stub($.fn, 'tooltip');
		/* jshint camelcase: false */
		model = new OC.Share.ShareModel({
			id: 1,
			name: 'first link',
			token: 'tehtokenz',
			share_type: OC.Share.SHARE_TYPE_LINK,
			item_type: 'folder',
			stime: 1489657516,
			permissions: OC.PERMISSION_READ,
			share_with: null,
			expiration: null,
		});

		view = new OC.Share.ShareDialogLinkShareView({
			model: model,
			itemModel: itemModel
		});
		view.render();
	});
	afterEach(function() { 
		tooltipStub.restore(); 
		view.remove();
	});

	describe('popup behavior', function() {
		var $dialog;
		var popupStub;
		var popupDeferred;

		beforeEach(function() {
			$dialog = $('<div class="oc-dialog"><div class="oc-dialog-content"></div></div>');
			$('#testArea').append($dialog);
			popupDeferred = $.Deferred();
			popupStub = sinon.stub(OC.dialogs, 'message').returns(popupDeferred.promise());

			// this trigger view rendering that injects itself into the generic dialog
			popupDeferred.resolve();
		});
		afterEach(function() { 
			popupStub.restore(); 
			$dialog.remove();
		});
	
		it('appears as popup when calling show()', function() {
			view.show();
			expect(popupStub.calledOnce).toEqual(true);
			expect(popupStub.getCall(0).args[0]).toEqual('');
			expect($dialog.find('.shareDialogLinkShare').length).toEqual(1);
		});
		it('shows edit title for existing model', function() {
			view.show();
			expect(popupStub.getCall(0).args[1]).toContain('Edit');
		});
		it('shows create title for new model', function() {
			model.unset('id');
			view.show();
			expect(popupStub.getCall(0).args[1]).toContain('Create');
		});
		it('calls save when user clicks ok', function() {
			var saveStub = sinon.stub(model, 'save');
			view.show();

			var callbackFunc = popupStub.getCall(0).args[4];
			expect(_.isFunction(callbackFunc)).toEqual(true);

			callbackFunc();

			expect(saveStub.calledOnce).toEqual(true);

			saveStub.restore();
		});
	});

	describe('rendering', function() {
		var publicUploadConfigStub;

		beforeEach(function() {
			publicUploadConfigStub = sinon.stub(configModel, 'isPublicUploadEnabled');
		});
		afterEach(function() { 
			publicUploadConfigStub.restore(); 
		});
		it('renders fields populated with model values', function() {
			publicUploadConfigStub.returns(true);
			view.render();
			expect(view.$('[name=linkName]').val()).toEqual('first link');
			expect(view.$('.publicUploadCheckbox').prop('checked')).toEqual(false);
			expect(view.$('.linkPassText').val()).toEqual('');
			expect(view.$('.expirationDate').val()).toEqual('');

			model.set({
				password: 'set',
				expiration: '2017-10-12 00:00:00',
				permissions: OC.PERMISSION_ALL
			});
			view.render();

			expect(view.$('.publicUploadCheckbox').prop('checked')).toEqual(true);
			expect(view.$('.linkPassText').val()).toEqual('');
			expect(view.$('.expirationDate').val()).toEqual('2017-10-12 00:00:00');
		});
		describe('email field', function() {
			var isMailEnabledStub;
			beforeEach(function() {
				isMailEnabledStub = sinon.stub(configModel, 'isMailPublicNotificationEnabled');
			});
			afterEach(function() { 
				isMailEnabledStub.restore();
			});
			it('renders email field for new shares', function() {
				isMailEnabledStub.returns(true);
				model.unset('id');
				view.render();
				expect(view.$('.mailView input').length).toEqual(1);
			});
			it('does not render email field for existing shares', function() {
				isMailEnabledStub.returns(true);
				view.render();
				expect(view.$('.mailView input').length).toEqual(0);
			});
			it('does not render email field when disallowed globally', function() {
				isMailEnabledStub.returns(false);
				model.unset('id');
				view.render();
				expect(view.$('.mailView input').length).toEqual(0);
			});
		});
		describe('public upload', function() {
			it('does not render public upload checkbox for files', function() {
				publicUploadConfigStub.returns(true);
				itemModel.set('itemType', 'file');
				view.render();
				expect(view.$('.publicUploadCheckbox').length).toEqual(0);
			});
			it('does not render public upload checkbox when permission missing', function() {
				publicUploadConfigStub.returns(true);
				itemModel.set({
					permissions: OC.PERMISSION_READ
				});
				view.render();
				expect(view.$('.publicUploadCheckbox').length).toEqual(0);
			});
			it('does not render public upload checkbox when disabled globally', function() {
				publicUploadConfigStub.returns(false);
				itemModel.set({
					permissions: OC.PERMISSION_READ
				});
				view.render();
				expect(view.$('.publicUploadCheckbox').length).toEqual(0);
			});
		});
		describe('password logic', function() {
			it('renders empty field if no password set', function() {
				expect(view.$('.linkPassText').val()).toEqual('');
				expect(view.$('.linkPassText').attr('placeholder')).toEqual('Choose a password for the public link');
			});
			it('renders empty field with star placeholder if password set', function() {
				itemModel.set({
					password: 'set'
				});
				view.render();
				expect(view.$('.linkPassText').val()).toEqual('');
				expect(view.$('.linkPassText').attr('placeholder')).toEqual('**********');
			});
			it('test password enforcement logic', function() {
				expect('TODO').toEqual(true);
			});
		});
		it('test enforced expiration presence logic', function() {
			expect('TODO').toEqual(true);
		});
		it('test enforced expiration range logic', function() {
			expect('TODO').toEqual(true);
		});
	});

	describe('saving', function() {
		var saveStub;
		var sendMailStub;
		var sendMailDeferred;
		var isMailEnabledStub;

		beforeEach(function() {
			saveStub = sinon.stub(OC.Share.ShareModel.prototype, 'save');
			sendMailDeferred = $.Deferred();
			sendMailStub = sinon.stub(OC.Share.ShareDialogMailView.prototype, 'sendEmails').returns(sendMailDeferred);
			isMailEnabledStub = sinon.stub(configModel, 'isMailPublicNotificationEnabled').returns(true);
		});
		afterEach(function() { 
			saveStub.restore(); 
			sendMailStub.restore();
			isMailEnabledStub.restore();
			sendMailDeferred = null;
		});
	
		it('reads values from the fields and saves', function() {
			view.$('.linkPassText').val('newpassword');
			view._save();
			expect(saveStub.calledOnce).toEqual(true);
			expect(saveStub.getCall(0).args[0]).toEqual({
				name: 'first link',
				expireDate: '',
				password: 'newpassword',
				permissions: OC.PERMISSION_READ
			});
		});
		it('sends emails after saving a new share', function() {
			model.unset('id');
			view.render();
			view._save();
			expect(sendMailStub.notCalled).toEqual(true);
			saveStub.yieldTo('success');
			expect(sendMailStub.calledOnce).toEqual(true);
		});
		it('does not send email if disabled globally', function() {
			isMailEnabledStub.returns(false);
			model.unset('id');
			view.render();
			view._save();
			expect(sendMailStub.notCalled).toEqual(true);
			saveStub.yieldTo('success');
			expect(sendMailStub.notCalled).toEqual(true);
		});
		it('does not sends emails after saving an existing share', function() {
			view._save();
			expect(sendMailStub.notCalled).toEqual(true);
			saveStub.yieldTo('success');
			expect(sendMailStub.notCalled).toEqual(true);
		});
		it('triggers "saved" event after saving', function() {
			var handler = sinon.stub();
			view.on('saved', handler);
			view._save();
			expect(handler.notCalled).toEqual(true);
			saveStub.yieldTo('success');
			expect(handler.calledOnce).toEqual(true);
			expect(handler.calledWith(model)).toEqual(true);
		});
		it('triggers "saved" event after saving and sending email', function() {
			var handler = sinon.stub();
			view.on('saved', handler);
			model.unset('id');
			view.render();
			view._save();
			expect(handler.notCalled).toEqual(true);
			saveStub.yieldTo('success');
			expect(handler.notCalled).toEqual(true);
			sendMailDeferred.resolve();
			expect(handler.calledOnce).toEqual(true);
			expect(handler.calledWith(model)).toEqual(true);
		});
		it('implements tests for validation of enforcements', function() {
			expect('TODO').toEqual(true);
		});
	});
});
