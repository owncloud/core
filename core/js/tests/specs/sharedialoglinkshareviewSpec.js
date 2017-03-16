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

/* global oc_appconfig */
describe('OC.Share.ShareDialogLinkShareView', function() {

	it('implements those tests!', function() {
			expect('TODO').toEqual(true);
	});

	/**
	describe('Share with link', function() {
		// TODO: test ajax calls
		// TODO: test password field visibility (whenever enforced or not)
		it('update password on focus out', function() {
			$('#allowShareWithLink').val('yes');

			dialog.model.set('linkShare', {
				isLinkShare: true
			});
			dialog.render();

			// Enable password, enter password and focusout
			dialog.$el.find('[name=showPassword]').click();
			dialog.$el.find('.linkPassText').focus();
			dialog.$el.find('.linkPassText').val('foo');
			dialog.$el.find('.linkPassText').focusout();

			expect(saveLinkShareStub.calledOnce).toEqual(true);
			expect(saveLinkShareStub.firstCall.args[0]).toEqual({
				password: 'foo'
			});
		});
		it('update password on enter', function() {
			$('#allowShareWithLink').val('yes');

			dialog.model.set('linkShare', {
				isLinkShare: true
			});
			dialog.render();

			// Toggle linkshare
			dialog.$el.find('.linkCheckbox').click();

			// Enable password and enter password
			dialog.$el.find('[name=showPassword]').click();
			dialog.$el.find('.linkPassText').focus();
			dialog.$el.find('.linkPassText').val('foo');
			dialog.$el.find('.linkPassText').trigger(new $.Event('keyup', {keyCode: 13}));

			expect(saveLinkShareStub.calledOnce).toEqual(true);
			expect(saveLinkShareStub.firstCall.args[0]).toEqual({
				password: 'foo'
			});
		});
		it('shows share with link checkbox when allowed', function() {
			$('#allowShareWithLink').val('yes');

			dialog.render();

			expect(dialog.$el.find('.linkCheckbox').length).toEqual(1);
		});
		it('does not show share with link checkbox when not allowed', function() {
			$('#allowShareWithLink').val('no');

			dialog.render();

			expect(dialog.$el.find('.linkCheckbox').length).toEqual(0);
			expect(dialog.$el.find('.shareWithField').length).toEqual(1);
		});
		it('shows populated link share when a link share exists', function() {
			// this is how the OC.Share class does it...
			var link = parent.location.protocol + '//' + location.host +
				OC.generateUrl('/s/') + 'tehtoken';
			shareModel.set('linkShare', {
				isLinkShare: true,
				token: 'tehtoken',
				link: link,
				expiration: '',
				permissions: OC.PERMISSION_READ,
				stime: 1403884258,
			});

			dialog.render();

			expect(dialog.$el.find('.linkCheckbox').prop('checked')).toEqual(true);
			expect(dialog.$el.find('.linkText').val()).toEqual(link);
		});
		it('autofocus link text when clicked', function() {
			$('#allowShareWithLink').val('yes');

			dialog.model.set('linkShare', {
				isLinkShare: true
			});
			dialog.render();

			var focusStub = sinon.stub($.fn, 'focus');
			var selectStub = sinon.stub($.fn, 'select');
			dialog.$el.find('.linkText').click();

			expect(focusStub.calledOnce).toEqual(true);
			expect(selectStub.calledOnce).toEqual(true);

			focusStub.restore();
			selectStub.restore();
		});
		describe('password', function() {
			var slideToggleStub;

			beforeEach(function() {
				$('#allowShareWithLink').val('yes');
				configModel.set({
					enforcePasswordForPublicLink: false
				});

				slideToggleStub = sinon.stub($.fn, 'slideToggle');
			});
			afterEach(function() {
				slideToggleStub.restore();
			});

			it('enforced but toggled does not fire request', function() {
				configModel.set('enforcePasswordForPublicLink', true);
				dialog.render();

				dialog.$el.find('.linkCheckbox').click();

				// The password linkPass field is shown (slideToggle is called).
				// No request is made yet
				expect(slideToggleStub.callCount).toEqual(1);
				expect(slideToggleStub.getCall(0).thisValue.eq(0).attr('id')).toEqual('linkPass');
				expect(fakeServer.requests.length).toEqual(0);
				
				// Now untoggle share by link
				dialog.$el.find('.linkCheckbox').click();
				dialog.render();

				// Password field disappears and no ajax requests have been made
				expect(fakeServer.requests.length).toEqual(0);
				expect(slideToggleStub.callCount).toEqual(2);
				expect(slideToggleStub.getCall(1).thisValue.eq(0).attr('id')).toEqual('linkPass');
			});
		});
		describe('expiration date', function() {
			var shareData;
			var shareItem;
			var clock;
			var expectedMinDate;

			beforeEach(function() {
				// pick a fake date
				clock = sinon.useFakeTimers(new Date(2014, 0, 20, 14, 0, 0).getTime());
				expectedMinDate = new Date(2014, 0, 21, 14, 0, 0);

				configModel.set({
					enforcePasswordForPublicLink: false,
					isDefaultExpireDateEnabled: false,
					isDefaultExpireDateEnforced: false,
					defaultExpireDate: 7
				});

				shareModel.set('linkShare', {
					isLinkShare: true,
					token: 'tehtoken',
					permissions: OC.PERMISSION_READ,
					expiration: null
				});
			});
			afterEach(function() {
				clock.restore();
			});

			it('does not check expiration date checkbox when no date was set', function() {
				shareModel.get('linkShare').expiration = null;
				dialog.render();

				expect(dialog.$el.find('[name=expirationCheckbox]').prop('checked')).toEqual(false);
				expect(dialog.$el.find('.datepicker').val()).toEqual('');
			});
			it('does not check expiration date checkbox for new share', function() {
				dialog.render();

				expect(dialog.$el.find('[name=expirationCheckbox]').prop('checked')).toEqual(false);
				expect(dialog.$el.find('.datepicker').val()).toEqual('');
			});
			it('checks expiration date checkbox and populates field when expiration date was set', function() {
				shareModel.get('linkShare').expiration = '2014-02-01 00:00:00';
				dialog.render();
				expect(dialog.$el.find('[name=expirationCheckbox]').prop('checked')).toEqual(true);
				expect(dialog.$el.find('.datepicker').val()).toEqual('01-02-2014');
			});
			it('sets default date when default date setting is enabled', function() {
				configModel.set('isDefaultExpireDateEnabled', true);
				dialog.render();
				dialog.$el.find('.linkCheckbox').click();
				// here fetch would be called and the server returns the expiration date
				shareModel.get('linkShare').expiration = '2014-1-27 00:00:00';
				dialog.render();

				// enabled by default
				expect(dialog.$el.find('[name=expirationCheckbox]').prop('checked')).toEqual(true);
				expect(dialog.$el.find('.datepicker').val()).toEqual('27-01-2014');

				// disabling is allowed
				dialog.$el.find('[name=expirationCheckbox]').click();
				expect(dialog.$el.find('[name=expirationCheckbox]').prop('checked')).toEqual(false);
			});
			it('enforces default date when enforced date setting is enabled', function() {
				configModel.set({
					isDefaultExpireDateEnabled: true,
					isDefaultExpireDateEnforced: true
				});
				dialog.render();
				dialog.$el.find('.linkCheckbox').click();
				// here fetch would be called and the server returns the expiration date
				shareModel.get('linkShare').expiration = '2014-1-27 00:00:00';
				dialog.render();

				expect(dialog.$el.find('[name=expirationCheckbox]').prop('checked')).toEqual(true);
				expect(dialog.$el.find('.datepicker').val()).toEqual('27-01-2014');

				// disabling is not allowed
				expect(dialog.$el.find('[name=expirationCheckbox]').prop('disabled')).toEqual(true);
				dialog.$el.find('[name=expirationCheckbox]').click();
				expect(dialog.$el.find('[name=expirationCheckbox]').prop('checked')).toEqual(true);
			});
			it('enforces default date when enforced date setting is enabled and password is enforced', function() {
				configModel.set({
					enforcePasswordForPublicLink: true,
					isDefaultExpireDateEnabled: true,
					isDefaultExpireDateEnforced: true
				});
				dialog.render();
				dialog.$el.find('.linkCheckbox').click();
				// here fetch would be called and the server returns the expiration date
				shareModel.get('linkShare').expiration = '2014-1-27 00:00:00';
				dialog.render();

				//Enter password
				dialog.$el.find('.linkPassText').val('foo');
				dialog.$el.find('.linkPassText').trigger(new $.Event('keyup', {keyCode: 13}));
				fakeServer.requests[0].respond(
					200,
					{ 'Content-Type': 'application/json' },
					JSON.stringify({data: {token: 'xyz'}, status: 'success'})
				);

				expect(dialog.$el.find('[name=expirationCheckbox]').prop('checked')).toEqual(true);
				expect(dialog.$el.find('.datepicker').val()).toEqual('27-01-2014');

				// disabling is not allowed
				expect(dialog.$el.find('[name=expirationCheckbox]').prop('disabled')).toEqual(true);
				dialog.$el.find('[name=expirationCheckbox]').click();
				expect(dialog.$el.find('[name=expirationCheckbox]').prop('checked')).toEqual(true);
			});
			it('sets picker minDate to today and no maxDate by default', function() {
				dialog.render();
				dialog.$el.find('.linkCheckbox').click();
				dialog.$el.find('[name=expirationCheckbox]').click();
				expect($.datepicker._defaults.minDate).toEqual(expectedMinDate);
				expect($.datepicker._defaults.maxDate).toEqual(null);
			});
			it('limits the date range to X days after share time when enforced', function() {
				configModel.set({
					isDefaultExpireDateEnabled: true,
					isDefaultExpireDateEnforced: true
				});
				dialog.render();
				dialog.$el.find('.linkCheckbox').click();
				expect($.datepicker._defaults.minDate).toEqual(expectedMinDate);
				expect($.datepicker._defaults.maxDate).toEqual(new Date(2014, 0, 27, 0, 0, 0, 0));
			});
			it('limits the date range to X days after share time when enforced, even when redisplayed the next days', function() {
				// item exists, was created two days ago
				var shareItem = shareModel.get('linkShare');
				shareItem.expiration = '2014-1-27';
				// share time has time component but must be stripped later
				shareItem.stime = new Date(2014, 0, 20, 11, 0, 25).getTime() / 1000;
				configModel.set({
					isDefaultExpireDateEnabled: true,
					isDefaultExpireDateEnforced: true
				});
				dialog.render();
				expect($.datepicker._defaults.minDate).toEqual(expectedMinDate);
				expect($.datepicker._defaults.maxDate).toEqual(new Date(2014, 0, 27, 0, 0, 0, 0));
			});
		});
		describe('send link by email', function() {
			var sendEmailPrivateLinkStub;
			var clock;

			beforeEach(function() {
				configModel.set({
					isMailPublicNotificationEnabled: true
				});

				shareModel.set('linkShare', {
					isLinkShare: true,
					token: 'tehtoken',
					permissions: OC.PERMISSION_READ,
					expiration: null
				});

				sendEmailPrivateLinkStub = sinon.stub(dialog.model, "sendEmailPrivateLink");
				clock = sinon.useFakeTimers();
			});
			afterEach(function() {
				sendEmailPrivateLinkStub.restore();
				clock.restore();
			});

			it('displays form when sending emails is enabled', function() {
				$('input[name=mailPublicNotificationEnabled]').val('yes');
				dialog.render();
				expect(dialog.$('.emailPrivateLinkForm').length).toEqual(1);
			});
			it('form not rendered when sending emails is disabled', function() {
				$('input[name=mailPublicNotificationEnabled]').val('no');
				dialog.render();
				expect(dialog.$('.emailPrivateLinkForm').length).toEqual(0);
			});
			it('input cleared on success', function() {
				var defer = $.Deferred();
				sendEmailPrivateLinkStub.returns(defer.promise());

				$('input[name=mailPublicNotificationEnabled]').val('yes');
				dialog.render();

				dialog.$el.find('.emailPrivateLinkForm .emailField').val('a@b.c');
				dialog.$el.find('#emailButton').trigger('click');

				expect(sendEmailPrivateLinkStub.callCount).toEqual(1);
				expect(dialog.$el.find('.emailPrivateLinkForm .emailField').val()).toEqual('Sending ...');

				defer.resolve();
				expect(dialog.$el.find('.emailPrivateLinkForm .emailField').val()).toEqual('Email sent');

				clock.tick(2000);
				expect(dialog.$el.find('.emailPrivateLinkForm .emailField').val()).toEqual('');
			});
			it('input not cleared on failure', function() {
				var defer = $.Deferred();
				sendEmailPrivateLinkStub.returns(defer.promise());

				$('input[name=mailPublicNotificationEnabled]').val('yes');
				dialog.render();

				dialog.$el.find('.emailPrivateLinkForm .emailField').val('a@b.c');
				dialog.$el.find('#emailButton').trigger('click');

				expect(sendEmailPrivateLinkStub.callCount).toEqual(1);
				expect(dialog.$el.find('.emailPrivateLinkForm .emailField').val()).toEqual('Sending ...');

				defer.reject();
				expect(dialog.$el.find('.emailPrivateLinkForm .emailField').val()).toEqual('a@b.c');
			});
		});
	});
	 *
	 */

});
