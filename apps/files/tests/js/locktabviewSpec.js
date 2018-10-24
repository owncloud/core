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
	var currentUserStub;
	var notificationStub;
	var view, fileInfoModel;
	var lockData1;
	var lockData2;

	beforeEach(function() {
		currentUserStub = sinon.stub(OC, 'getCurrentUser').returns({uid: 'currentuser'});
		notificationStub = sinon.stub(OC.Notification, 'show');

		view = new OCA.Files.LockTabView();
		lockData1 = {
			lockscope: 'shared',
			locktype: 'read',
			lockroot: '/owncloud/remote.php/dav/files/currentuser/basepath',
			depth: 'infinite',
			timeout: 'Second-12345',
			locktoken: 'tehtoken',
			owner: 'some girl'
		};
		lockData2 = {
			lockscope: 'shared',
			locktype: 'read',
			lockroot: '/owncloud/remote.php/dav/files/currentuser/basepath/One.txt',
			depth: '0',
			timeout: 'Second-12345',
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
		currentUserStub.restore();
		notificationStub.restore();
		view.remove();
		view = undefined;
	});
	describe('visibility', function() {
		it('displays tab when locks are set', function() {
			expect(view.canDisplay(fileInfoModel)).toEqual(true);
		});
		it('does not display tab when no locks are set', function() {
			fileInfoModel.set('activeLocks', []);
			expect(view.canDisplay(fileInfoModel)).toEqual(false);
		});
	});
	describe('rendering', function() {
		it('renders list of locks', function() {
			view.setFileInfo(fileInfoModel);
			expect(view.$('.lock-entry').length).toEqual(2);
			var $lock1 = view.$('.lock-entry').eq(0);
			var $lock2 = view.$('.lock-entry').eq(1);

			expect($lock1.first().text()).toEqual('some girl has locked this resource via /basepath');
			expect($lock2.first().text()).toEqual('some guy has locked this resource via /basepath/One.txt');
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
		
		it('sends unlock request then updates model', function() {
			var changeEvent = sinon.stub();

			view.setFileInfo(fileInfoModel);
			expect(view.$('.lock-entry').length).toEqual(2);
			view.$('.lock-entry').eq(1).find('.unlock').click();

			expect(requestStub.calledOnce).toEqual(true);
			expect(requestStub.getCall(0).args[0]).toEqual('UNLOCK');
			expect(requestStub.getCall(0).args[1]).toEqual('/owncloud/remote.php/dav/files/currentuser/basepath/One.txt');
			expect(requestStub.getCall(0).args[2]).toEqual({'Lock-Token': 'anothertoken'});

			fileInfoModel.on('change:activeLocks', changeEvent);

			requestDeferred.resolve({
				status: 204,
				body: ''
			});

			// only one lock left
			expect(view.$('.lock-entry').length).toEqual(1);
			var $lock1 = view.$('.lock-entry').eq(0);

			expect($lock1.first().text()).toEqual('some girl has locked this resource via /basepath');

			expect(fileInfoModel.get('activeLocks')).toEqual([lockData1]);
			expect(changeEvent.calledOnce).toEqual(true);
		});
		it('adjusts message when removing last lock', function() {
			fileInfoModel.set('activeLocks', [lockData1]);
			view.setFileInfo(fileInfoModel);
			expect(view.$('.lock-entry').length).toEqual(1);
			view.$('.lock-entry').eq(0).find('.unlock').click();

			requestDeferred.resolve({
				status: 204,
				body: ''
			});

			// only one lock left
			expect(view.$('.lock-entry').length).toEqual(0);

			expect(view.$('.empty').text()).toEqual('Resource is not locked');

			expect(fileInfoModel.get('activeLocks')).toEqual([]);
		});
		it('displays message when unlock is forbidden', function() {
			view.setFileInfo(fileInfoModel);
			expect(view.$('.lock-entry').length).toEqual(2);
			view.$('.lock-entry').eq(1).find('.unlock').click();

			requestDeferred.resolve({
				status: 403,
				body: ''
			});

			// locks left as is
			expect(view.$('.lock-entry').length).toEqual(2);
			expect(fileInfoModel.get('activeLocks')).toEqual([lockData1, lockData2]);
			
			expect(notificationStub.calledOnce).toEqual(true);
			expect(notificationStub.getCall(0).args[0]).toContain('Could not unlock, please contact the lock owner some guy');
		});
		it('displays error message when unlock failed for unknown reason', function() {
			view.setFileInfo(fileInfoModel);
			expect(view.$('.lock-entry').length).toEqual(2);
			view.$('.lock-entry').eq(1).find('.unlock').click();

			requestDeferred.resolve({
				status: 500,
				body: ''
			});

			// locks left as is
			expect(view.$('.lock-entry').length).toEqual(2);
			expect(fileInfoModel.get('activeLocks')).toEqual([lockData1, lockData2]);
			
			expect(notificationStub.calledOnce).toEqual(true);
			expect(notificationStub.getCall(0).args[0]).toContain('Unlock failed with status 500');
		});
	});
});
