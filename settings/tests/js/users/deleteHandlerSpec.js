/**
* ownCloud
*
* @author Vincent Petry
* @copyright Copyright (c) 2014 Vincent Petry <pvince81@owncloud.com>
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

describe('DeleteHandler tests', function() {
	var showNotificationSpy;
	var hideNotificationSpy;
	var clock;
	var removeCallback;
	var markCallback;
	var undoCallback;

	function init(markCallback, removeCallback, undoCallback) {
		var handler = new DeleteHandler('dummyendpoint.php', 'paramid', markCallback, removeCallback);
		handler.setNotification(OC.Notification, 'dataid', 'removed %oid entry', undoCallback);
		return handler;
	}

	beforeEach(function() {
		showNotificationSpy = sinon.spy(OC.Notification, 'showHtml');
		hideNotificationSpy = sinon.spy(OC.Notification, 'hide');
		clock = sinon.useFakeTimers();
		removeCallback = sinon.stub();
		markCallback = sinon.stub();
		undoCallback = sinon.stub();

		$('#testArea').append('<div id="notification"></div>');
	});
	afterEach(function() {
		showNotificationSpy.restore();
		hideNotificationSpy.restore();
		clock.restore();
	});
	it('deletes when deleteEntry is called', function() {
		fakeServer.respondWith(/\/index\.php\/dummyendpoint.php\/some_uid/, [
			200,
			{ 'Content-Type': 'application/json' },
			JSON.stringify({status: 'success'})
		]);
		var handler = init(markCallback, removeCallback, undoCallback);
		handler.mark('some_uid');

		handler.deleteEntry();
		expect(fakeServer.requests.length).toEqual(1);
		var	request = fakeServer.requests[0];
		expect(request.url).toEqual(OC.webroot + '/index.php/dummyendpoint.php/some_uid');
	});
	it('deletes when deleteEntry is called and escapes', function() {
		fakeServer.respondWith(/\/index\.php\/dummyendpoint.php\/some_uid/, [
			200,
			{ 'Content-Type': 'application/json' },
			JSON.stringify({status: 'success'})
		]);
		var handler = init(markCallback, removeCallback, undoCallback);
		handler.mark('some_uid<>/"..\\');

		handler.deleteEntry();
		expect(fakeServer.requests.length).toEqual(1);
		var	request = fakeServer.requests[0];
		expect(request.url).toEqual(OC.webroot + '/index.php/dummyendpoint.php/some_uid%3C%3E%2F%22..%5C');
	});
	it('calls removeCallback after successful server side deletion', function() {
		fakeServer.respondWith(/\/index\.php\/dummyendpoint.php\/some_uid/, [
			200,
			{ 'Content-Type': 'application/json' },
			JSON.stringify({status: 'success'})
		]);

		var handler = init(markCallback, removeCallback, undoCallback);
		handler.mark('some_uid');
		handler.deleteEntry();

		expect(fakeServer.requests.length).toEqual(1);
		var request = fakeServer.requests[0];
		var query = OC.parseQueryString(request.requestBody);

		expect(removeCallback.calledOnce).toEqual(true);
		expect(undoCallback.notCalled).toEqual(true);
		expect(removeCallback.getCall(0).args[0]).toEqual('some_uid');
	});
	it('calls undoCallback and shows alert after failed server side deletion', function() {
		// stub t to avoid extra calls
		var tStub = sinon.stub(window, 't').returns('text');
		fakeServer.respondWith(/\/index\.php\/dummyendpoint.php\/some_uid/, [
			403,
			{ 'Content-Type': 'application/json' },
			JSON.stringify({status: 'error', data: {message: 'test error'}})
		]);

		var alertDialogStub = sinon.stub(OC.dialogs, 'alert');
		var handler = init(markCallback, removeCallback, undoCallback);
		handler.mark('some_uid');
		handler.deleteEntry();

		expect(fakeServer.requests.length).toEqual(1);
		var request = fakeServer.requests[0];
		var query = OC.parseQueryString(request.requestBody);

		expect(removeCallback.notCalled).toEqual(true);
		expect(undoCallback.calledOnce).toEqual(true);
		expect(undoCallback.getCall(0).args[0]).toEqual('some_uid');

		expect(alertDialogStub.calledOnce);

		alertDialogStub.restore();
		tStub.restore();
	});
});
