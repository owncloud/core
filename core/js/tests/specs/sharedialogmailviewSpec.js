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

/* global oc_appconfig */
describe('OC.Share.ShareDialogMailView', function() {

	var view;
	var model;
	var itemModel;
	var currentUserStub;

	beforeEach(function() {
		var configModel = new OC.Share.ShareConfigModel();
		var fileInfoModel = new OCA.Files.FileInfoModel({
			id: '123',
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

		currentUserStub = sinon.stub(OC, 'getCurrentUser').returns({
			uid: 'someuser',
			displayName: 'Some User',
			email: 'someuser@example.org'
		});

		model = new OC.Share.ShareModel({
			id: 1,
			name: 'first link',
			token: 'tehtokenz',
			shareType: OC.Share.SHARE_TYPE_LINK,
			itemType: 'folder',
			stime: 1489657516,
			permissions: OC.PERMISSION_READ,
			shareWith: 'somepassword',
			expireDate: '2017-10-12',
		});

		view = new OC.Share.ShareDialogMailView({
			model: model,
			itemModel: itemModel
		});
		view.render();
	});

	afterEach(function() {
		view.remove();
		currentUserStub.restore();
	});

	describe('renders', function() {
		it('bcc checkbox field if usermail is present', function() {
			// mail set in initial currentUserStub
			expect(view.$('.emailPrivateLinkForm--emailToSelf').length).toEqual(1);
		});
	});

	describe('adding and removing addresses', function() {
		it('works as expected', function() {
			view._addAddress('Ada.Wong@umbrella.com');
			view._addAddress('Albert.Wesker@umbrella.com');
			view._addAddress('Jill.Valentine@umbrella.com');

			expect(view._addresses.length).toEqual(3);
			expect(view._addresses[2]).toEqual('jill.valentine@umbrella.com');

			// remove one
			view._removeAddress('Albert.Wesker@umbrella.com');
			expect(view._addresses.length).toEqual(2);
			expect(view._addresses[1]).toEqual('jill.valentine@umbrella.com');
		});
	});

	describe('validating addresses', function() {
		it('works as expected', function() {
			expect(view.validateEmail('Ada.Wong@umbrella.com')).toEqual(true);
			expect(view.validateEmail('Albert.Wesker@umbrella.sub-domain.com')).toEqual(true);
			expect(view.validateEmail('Albert_Wesker@umbrella.sub-domain.com')).toEqual(true);
			expect(view.validateEmail('Albert-Wesker@umbrella-new.sub-domain.com')).toEqual(true);
			expect(view.validateEmail('Jill.Valentine@um#rella.com')).toEqual(true);

			expect(view.validateEmail('Jill.Valentine@umbrella..c')).toEqual(false);
		});
	});

	describe('sending emails', function() {
		var clock;

		beforeEach(function() {
			clock = sinon.useFakeTimers();
		});
		afterEach(function() { 
			clock.restore(); 
		});
		
		it('sends entered emails when calling sendEmails()', function() {
			var callback = sinon.stub();

			view._addAddress('ernie@example.com');
			view._addAddress('bert@example.com');
			view.sendEmails().then(callback);

			expect(callback.notCalled).toEqual(true);
			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].method).toEqual('POST');
			expect(fakeServer.requests[0].url).toEqual(OC.generateUrl('core/ajax/share.php'));
			expect(OC.parseQueryString(fakeServer.requests[0].requestBody)).toEqual({
				action: 'email',
				toAddress: 'ernie@example.com,bert@example.com',
				link: model.getLink(),
				itemType: 'folder',
				itemSource: '123',
				file: 'shared_folder',
				expiration: '2017-10-12',
				emailBody: '',
				toSelf: 'false'
			});

			fakeServer.requests[0].respond(
				200, {
					'Content-Type': 'application/json'
				},
				JSON.stringify({
					status: 'success',
					data: [
						'someresult1',
						'someresult2'
					]
				})
			);

			expect(callback.notCalled).toEqual(true);

			// only call after a delay
			clock.tick(3000);

			expect(callback.calledOnce).toEqual(true);
		});
		it('sends mail to self if BCC is checked', function() {
			var callback = sinon.stub();
			view._addAddress('GlaDOS@aperture.com');
			view.$('.emailPrivateLinkForm--emailToSelf').prop('checked', 'checked');
			view.$('.emailPrivateLinkForm--emailBodyField').val('The Cake Is A Lie!');
			view.sendEmails().then(callback);

			expect(callback.notCalled).toEqual(true);
			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].method).toEqual('POST');
			expect(fakeServer.requests[0].url).toEqual(OC.generateUrl('core/ajax/share.php'));
			expect(OC.parseQueryString(fakeServer.requests[0].requestBody)).toEqual({
				action: 'email',
				toAddress: 'glados@aperture.com',
				link: model.getLink(),
				itemType: 'folder',
				itemSource: '123',
				file: 'shared_folder',
				expiration: '2017-10-12',
				emailBody: 'The Cake Is A Lie!',
				toSelf: 'true'
			});

			fakeServer.requests[0].respond(
				200, {
					'Content-Type': 'application/json'
				},
				JSON.stringify({
					status: 'success',
					data: [
						'someresult1',
						'someresult2'
					]
				})
			);

			expect(callback.notCalled).toEqual(true);

			// only call after a delay
			clock.tick(3000);

			expect(callback.calledOnce).toEqual(true);
		});

		it('does not send anything if no emails were input', function() {
			var callback = sinon.stub();
			view.sendEmails().then(callback);
			expect(callback.calledOnce).toEqual(true);
		});

		it('rejects promise in case of failure', function() {
			var callback = sinon.stub();
			var rejectCallback = sinon.stub();
			view._addAddress('email@example.com');
			view.sendEmails().then(callback).fail(rejectCallback);

			expect(callback.notCalled).toEqual(true);

			expect(fakeServer.requests.length).toEqual(1);
			fakeServer.requests[0].respond(
				200, {
					'Content-Type': 'application/json'
				},
				JSON.stringify({
					status: 'error',
					data: {
						message: 'whatever...'
					}
				})
			);

			expect(callback.notCalled).toEqual(true);
			expect(rejectCallback.calledOnce).toEqual(true);
		});
	});
});
