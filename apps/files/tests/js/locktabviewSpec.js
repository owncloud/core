/**
* ownCloud
*
* @author Vincent Petry
* @copyright Copyright (c) 2018 Vincent Petry <pvince81@owncloud.com>
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either
* comment 3 of the License, or any later comment.
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

/* global dav */
describe('OCA.Files.LockTabView tests', function() {
	var view, fileInfoModel;
	var fetchStub;
	var lockData1;
	var lockData2;

	beforeEach(function() {
		view = new OCA.Files.LockTabView();
		lockData1 = {
			lockscope: 'shared',
			locktype: 'read',
			lockroot: '/owncloud/remote.php/dav/files/currentuser/basepath',
			depth: 'infinite',
			timeout: '12345',
			locktoken: 'tehtoken',
			owner: 'some girl'
		};
		lockData2 = {
			lockscope: 'shared',
			locktype: 'read',
			lockroot: '/owncloud/remote.php/dav/files/currentuser/basepath/One.txt',
			depth: '0',
			timeout: '12345',
			locktoken: 'anothertoken',
			owner: 'some guy'
		};
		fileInfoModel = new OCA.Files.FileInfoModel({
			id: '5',
			name: 'One.txt',
			mimetype: 'text/plain',
			permissions: 31,
			path: '/subdir',
			size: 123456789,
			etag: 'abcdefg',
			mtime: Date.UTC(2016, 1, 0, 0, 0, 0),
			activeLocks: [lockData1, lockData2],
		}, {
			filesClient: OC.Files.getClient()
		});
		view.render();
	});
	afterEach(function() {
		view.remove();
		view = undefined;
	});
	describe('rendering', function() {
		it('renders list of locks', function() {
			view.setFileInfo(fileInfoModel);
			expect(view.$('.lock-entry').length).toEqual(2);
			var $lock1 = view.$('.lock-entry').eq(0);
			var $lock2 = view.$('.lock-entry').eq(1);

			expect($lock1.first().text()).toEqual('some girl has locked this resource via /owncloud/remote.php/dav/files/currentuser/basepath');
			expect($lock2.first().text()).toEqual('some guy has locked this resource via /owncloud/remote.php/dav/files/currentuser/basepath/One.txt');
		});
	});
	describe('unlocking', function() {
		var requestDeferred;
		var requestStub;

		beforeEach(function() {
			requestDeferred = new $.Deferred();
			requestStub = sinon.stub(dav.Client.prototype, 'request').returns(requestDeferred.promise());
		});
		afterEach(function() { 
			requestStub.restore(); 
		});
		
		it('clicking action sends unlock request', function() {
			view.setFileInfo(fileInfoModel);
			expect(view.$('.lock-entry').length).toEqual(2);
			view.$('.lock-entry').eq(1).find('.unlock').click();

			expect(requestStub.calledOnce).toEqual(true);
			expect(requestStub.getCall(0).args[0]).toEqual('UNLOCK');
			expect(requestStub.getCall(0).args[1]).toEqual('/owncloud/remote.php/dav/files/currentuser/basepath/One.txt');
			expect(requestStub.getCall(0).args[2]).toEqual({'Lock-Token': 'anothertoken'});

			requestDeferred.resolve({
				status: 204,
				body: ''
			});

			// only one lock left
			expect(view.$('.lock-entry').length).toEqual(1);
			var $lock1 = view.$('.lock-entry').eq(0);

			expect($lock1.first().text()).toEqual('some girl has locked this resource via /owncloud/remote.php/dav/files/currentuser/basepath');
		});
	});
});
