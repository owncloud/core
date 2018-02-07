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

describe('OC.Share.ShareDialogExpirationView', function() {
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
			shareType: OC.Share.SHARE_TYPE_LINK,
			itemType: 'folder',
			stime: 1489657516,
			permissions: OC.PERMISSION_READ,
			share_with: null,
			expireDate: null,
		});

		view = new OC.Share.ShareDialogExpirationView({
			model: model,
			itemModel: itemModel
		});
		view.render();
	});
	afterEach(function() {
		tooltipStub.restore();
		view.remove();
	});

	describe('rendering', function() {
		it('renders fields populated with model values', function() {
			view.render();
			expect(view.$('.expirationDate').val()).toEqual('');

			model.set({
				expireDate: '2017-10-12',
			});
			view.render();

			expect(view.$('.expirationDate').val()).toEqual('12-10-2017');
		});
		describe('enforced expiration', function() {
			it('renders enforced message when enforced', function() {
				configModel.set('isDefaultExpireDateEnforced', true);
				view.render();
				expect(view.$('.defaultExpireMessage').length).toEqual(1);
				expect(view.$('.required-indicator').length).toEqual(1);
			});
			it('does not render enforced message when not enforced', function() {
				configModel.set('isDefaultExpireDateEnforced', false);
				view.render();
				expect(view.$('.defaultExpireMessage').length).toEqual(0);
				expect(view.$('.required-indicator').length).toEqual(0);
			});
			it('shows error message on validate if expiration date is empty', function() {
				configModel.set('isDefaultExpireDateEnforced', true);
				view.render();
				view.$('.expirationDate').val('');
				expect(view.validate()).toEqual(false);
				expect(view.$('.error-message').hasClass('hidden')).toEqual(false);
				expect(view.$('.error-message').text()).toContain('required');
			});
			it('does not show error message on validate when not enforced', function() {
				configModel.set('isDefaultExpireDateEnforced', false);
				view.render();
				view.$('.expirationDate').val('');
				expect(view.validate()).toEqual(true);
				expect(view.$('.error-message').hasClass('hidden')).toEqual(true);
			});
		});
		describe('date picker defaults', function() {
			var clock;
			var expectedMinDate;
			var setDefaultsStub;
			var datepickerStub;

			beforeEach(function() {
				// pick a fake date
				clock = sinon.useFakeTimers(new Date(2014, 0, 20, 14, 0, 0).getTime());
				expectedMinDate = new Date(2014, 0, 21, 14, 0, 0);

				datepickerStub = sinon.stub($.fn, 'datepicker');
				setDefaultsStub = sinon.stub($.datepicker, 'setDefaults');

				configModel.set({
					isDefaultExpireDateEnabled: false,
					isDefaultExpireDateEnforced: false,
					defaultExpireDate: 7
				});

				model.set('expireDate', null);
			});
			afterEach(function() {
				clock.restore();
				datepickerStub.restore();
				setDefaultsStub.restore();
			});

			it('sets date picker format', function() {
				view.render();
				expect(datepickerStub.calledOnce).toEqual(true);
				expect(datepickerStub.getCall(0).args[0]).toEqual({dateFormat: 'dd-mm-yy'});
			});
			it('does not check expiration date checkbox when no date was set', function() {
				view.render();

				expect(view.$el.find('.datepicker').val()).toEqual('');
			});
			it('does not check expiration date checkbox for new share', function() {
				view.render();

				expect(view.$el.find('.datepicker').val()).toEqual('');
			});
			it('checks expiration date checkbox and populates field when expiration date was set', function() {
				model.set('expireDate', '2014-02-01 00:00:00');
				view.render();
				expect(view.$el.find('.datepicker').val()).toEqual('01-02-2014');
			});
			it('sets default date when default date setting is enabled', function() {
				configModel.set('isDefaultExpireDateEnabled', true);
				view.render();
				// here fetch would be called and the server returns the expiration date
				model.set('expireDate', '2014-1-27 00:00:00');
				view.render();

				// enabled by default
				expect(view.$el.find('.datepicker').val()).toEqual('27-01-2014');
			});
			it('enforces default date when enforced date setting is enabled', function() {
				configModel.set({
					isDefaultExpireDateEnabled: true,
					isDefaultExpireDateEnforced: true
				});
				view.render();
				// here fetch would be called and the server returns the expiration date
				model.set('expireDate', '2014-1-27 00:00:00');
				view.render();

				expect(view.$el.find('.datepicker').val()).toEqual('27-01-2014');
			});
			it('sets picker minDate to today and no maxDate by default', function() {
				view.render();
				expect(setDefaultsStub.getCall(0).args[0].minDate).toEqual(expectedMinDate);
				expect(setDefaultsStub.getCall(0).args[0].maxDate).toEqual(null);
			});
			it('limits the date range to X days after share time when enforced', function() {
				configModel.set({
					isDefaultExpireDateEnabled: true,
					isDefaultExpireDateEnforced: true
				});
				model.set('stime', new Date(2014, 0, 20, 11, 0, 25).getTime() / 1000);
				view.render();
				expect(setDefaultsStub.lastCall.args[0].minDate).toEqual(expectedMinDate);
				expect(setDefaultsStub.lastCall.args[0].maxDate).toEqual(new Date(2014, 0, 27, 0, 0, 0, 0));
			});
			it('limits the date range to X days after share time when enforced, even when redisplayed the next days', function() {
				// item exists, was created two days ago
				model.set({
					expireDate: '2014-1-27',
					// share time has time component but must be stripped later
					stime: new Date(2014, 0, 20, 11, 0, 25).getTime() / 1000
				});
				configModel.set({
					isDefaultExpireDateEnabled: true,
					isDefaultExpireDateEnforced: true
				});
				view.render();
				expect(setDefaultsStub.getCall(0).args[0].minDate).toEqual(expectedMinDate);
				expect(setDefaultsStub.getCall(0).args[0].maxDate).toEqual(new Date(2014, 0, 27, 0, 0, 0, 0));
			});
		});
	});

	it('returns field value', function() {
		view.$('.expirationDate').val('03-04-2017');
		expect(view.getValue()).toEqual('03-04-2017');
	});
});
