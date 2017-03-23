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
describe('OC.Share.ShareDialogMailView', function() {

	var view;
	var model;
	var itemModel;
	var autocompleteStub;

	beforeEach(function() {
		var configModel = new OC.Share.ShareConfigModel();
		var fileInfoModel = new OCA.Files.FileInfoModel({
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

		autocompleteStub = sinon.stub($.fn, 'autocomplete').callsFake(function() {
			$(this).data('ui-autocomplete', {});
			return $(this);
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
		autocompleteStub.restore();
	});

	it('rendering', function() {
		expect(view.$('.emailField').length).toEqual(1);
	});

	describe('autocomplete', function() {

		it('asks the server for matching email addresses', function() {
			expect(autocompleteStub.calledOnce).toEqual(true);

			var callback = sinon.stub();
			autocompleteStub.getCall(0).args[0].source({
				term: 'search@example.com'
			}, callback);

			expect(fakeServer.requests.length).toEqual(1);

			expect(fakeServer.requests[0].method).toEqual('GET');
			expect(fakeServer.requests[0].url).toEqual(OC.generateUrl('core/ajax/share.php') + '?fetch=getShareWithEmail&search=search%40example.com');

			fakeServer.requests[0].respond(
				200,
				{ 'Content-Type': 'application/json' },
				JSON.stringify({
					status: 'success',
					data: [
						'someresult1',
						'someresult2'
					]
				})
			);

			expect(callback.calledOnce).toEqual(true);
			expect(callback.getCall(0).args[0]).toEqual([
				'someresult1',
				'someresult2'
			]);

		});
	});

	describe('sending emails', function() {
		it('sends entered emails when calling sendEmails()', function() {
			var callback = sinon.stub();
			view.$('.emailField').val('email@example.com');
			view.sendEmails().then(callback);

			expect(callback.notCalled).toEqual(true);

			expect(fakeServer.requests.length).toEqual(1);

			expect(fakeServer.requests[0].method).toEqual('POST');
			expect(fakeServer.requests[0].url)
				.toEqual(OC.generateUrl('core/ajax/share.php'));
			expect(OC.parseQueryString(fakeServer.requests[0].requestBody)).toEqual({
				action: 'email',
				toaddress: 'email@example.com',
				link: model.getLink(),
				itemType: 'folder',
				itemSource: '123',
				file: 'shared_folder',
				expiration: '2017-10-12'
			});

			fakeServer.requests[0].respond(
				200,
				{ 'Content-Type': 'application/json' },
				JSON.stringify({
					status: 'success',
					data: [
						'someresult1',
						'someresult2'
					]
				})
			);

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
			view.$('.emailField').val('email@example.com');
			view.sendEmails().then(callback).fail(rejectCallback);

			expect(callback.notCalled).toEqual(true);

			expect(fakeServer.requests.length).toEqual(1);
			fakeServer.requests[0].respond(
				200,
				{ 'Content-Type': 'application/json' },
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
