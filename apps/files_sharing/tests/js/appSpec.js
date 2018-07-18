/**
* ownCloud
*
* @author Vincent Petry
* @copyright Copyright (c) 2018 Vincent Petry <pvince81@owncloud.com>
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

describe('OCA.Sharing.App tests', function() {
	var App = OCA.Sharing.App;
	var fileListIn;
	var fileListOut;

	beforeEach(function() {
		$('#testArea').append(
			'<div id="app-navigation">' +
			'<ul><li data-id="files"><a>Files</a></li>' +
			'<li data-id="sharingin"><a></a></li>' +
			'<li data-id="sharingout"><a></a></li>' +
			'</ul></div>' +
			'<div id="app-content">' +
			'<div id="app-content-files" class="hidden">' +
			'</div>' +
			'<div id="app-content-sharingin" class="hidden">' +
			'</div>' +
			'<div id="app-content-sharingout" class="hidden">' +
			'</div>' +
			'</div>' +
			'</div>'
		);
		fileListIn = App.initSharingIn($('#app-content-sharingin'));
		fileListOut = App.initSharingOut($('#app-content-sharingout'));
	});
	afterEach(function() {
		App.destroy();
	});

	describe('initialization', function() {
		it('inits sharing-in list on show', function() {
			expect(fileListIn._sharedWithUser).toEqual(true);
		});
		it('inits sharing-out list on show', function() {
			expect(fileListOut._sharedWithUser).toBeFalsy();
		});
	});
	describe('file actions', function() {
		var oldLegacyFileActions;

		beforeEach(function() {
			oldLegacyFileActions = window.FileActions;
			window.FileActions = new OCA.Files.FileActions();
		});

		afterEach(function() {
			window.FileActions = oldLegacyFileActions;
		});
		it('provides default file actions', function() {
			_.each([fileListIn, fileListOut], function(fileList) {
				var fileActions = fileList.fileActions;

				expect(fileActions.actions.all).toBeDefined();
				expect(fileActions.actions.all.Delete).toBeDefined();
				expect(fileActions.actions.all.Rename).toBeDefined();
				expect(fileActions.actions.all.Download).toBeDefined();

				expect(fileActions.defaults.dir).toEqual('Open');
			});
		});
		it('provides custom file actions', function() {
			var actionStub = sinon.stub();
			// regular file action
			OCA.Files.fileActions.register(
					'all',
					'RegularTest',
					OC.PERMISSION_READ,
					OC.imagePath('core', 'actions/shared'),
					actionStub
			);

			App._inFileList = null;
			fileListIn = App.initSharingIn($('#app-content-sharingin'));

			expect(fileListIn.fileActions.actions.all.RegularTest).toBeDefined();
		});
		it('does not provide legacy file actions', function() {
			var actionStub = sinon.stub();
			// legacy file action
			window.FileActions.register(
					'all',
					'LegacyTest',
					OC.PERMISSION_READ,
					OC.imagePath('core', 'actions/shared'),
					actionStub
			);

			App._inFileList = null;
			fileListIn = App.initSharingIn($('#app-content-sharingin'));

			expect(fileListIn.fileActions.actions.all.LegacyTest).not.toBeDefined();
		});
		it('redirects to files app when opening a directory', function() {
			var oldList = OCA.Files.App.fileList;
			// dummy new list to make sure it exists
			OCA.Files.App.fileList = new OCA.Files.FileList($('<table><thead></thead><tbody></tbody></table>'));

			var setActiveViewStub = sinon.stub(OCA.Files.App, 'setActiveView');
			// create dummy table so we can click the dom
			var $table = '<table><thead></thead><tbody id="fileList"></tbody></table>';
			$('#app-content-sharingin').append($table);

			App._inFileList = null;
			fileListIn = App.initSharingIn($('#app-content-sharingin'));

			fileListIn.setFiles([{
				name: 'testdir',
				type: 'dir',
				path: '/somewhere/inside/subdir',
				counterParts: ['user2'],
				shareOwner: 'user2',
				shareState: OC.Share.STATE_ACCEPTED
			}]);

			fileListIn.findFileEl('testdir').find('td .nametext').click();

			expect(OCA.Files.App.fileList.getCurrentDirectory()).toEqual('/somewhere/inside/subdir/testdir');

			expect(setActiveViewStub.calledOnce).toEqual(true);
			expect(setActiveViewStub.calledWith('files')).toEqual(true);

			setActiveViewStub.restore();

			// restore old list
			OCA.Files.App.fileList = oldList;
		});
		describe('pending shares', function() {
			var fileData;
			var showMenuStub;

			beforeEach(function() {
				showMenuStub = sinon.stub(OC, 'showMenu');
				fileData = {
					id: '111',
					shares: [{id: '123'}, {id: '234'}],
					name: 'testdir',
					type: 'dir',
					path: '/somewhere/inside/subdir',
					counterParts: ['user2'],
					shareOwner: 'user2'
				};
			});
			afterEach(function() {
				showMenuStub.restore();
			});
			it('provides accept and reject actions for pending shares', function() {
				fileData.shareState = OC.Share.STATE_PENDING;
				var $tr = fileListIn.add(fileData);

				expect($tr.find('.fileactions .action-accept').length).toEqual(1);
				expect($tr.find('.fileactions .action-reject').length).toEqual(1);
			});
			it('provides accept action for rejected shares', function() {
				fileData.shareState = OC.Share.STATE_REJECTED;
				var $tr = fileListIn.add(fileData);

				expect($tr.find('.fileactions .action-accept').length).toEqual(1);
				expect($tr.find('.fileactions .action-reject').length).toEqual(0);
			});
			it('provides reject action in dropdown for accepted shares ', function() {
				fileData.shareState = OC.Share.STATE_ACCEPTED;
				var $tr = fileListIn.add(fileData);

				expect($tr.find('.fileactions .action-accept').length).toEqual(0);
				expect($tr.find('.fileactions .action-reject').length).toEqual(0);

				$tr.find('.fileactions .action-menu').click();

				var $menuEl = showMenuStub.getCall(0).args[1];
				expect($menuEl.find('.action-reject').length).toEqual(1);
				// delete action has been replaced
				expect($menuEl.find('.action-delete').length).toEqual(0);
			});

			var actionProvider = [
				{
					description: 'accepting',
					action: 'action-accept',
					method: 'POST',
					newState: OC.Share.STATE_ACCEPTED
				},
				{
					description: 'rejecting',
					action: 'action-reject',
					method: 'DELETE',
					newState: OC.Share.STATE_REJECTED
				}
			];

			_.each(actionProvider, function(spec) {
				it('sends server request when ' + spec.description + ' a share', function() {
					var updateRowSpy = sinon.spy(fileListIn, 'updateRow');
					fileData.shareState = OC.Share.STATE_PENDING;
					var $tr = fileListIn.add(fileData);

					expect(parseInt($tr.attr('data-share-state'), 10)).toEqual(fileData.shareState);

					$tr.find('.fileactions .' + spec.action).click();

					expect(fakeServer.requests.length).toEqual(1);
					var request = fakeServer.requests[0];
					expect(request.url).toEqual(OC.linkToOCS('apps/files_sharing/api/v1') + 'shares/pending/123?format=json');
					expect(request.method).toEqual(spec.method);

					var response = {
						ocs: {
							data: [{
								state: spec.newState,
								file_target: '/dir/testdir (2)'
							}],
							meta: {
								status: 'ok'
							}
						}
					};
					request.respond(200, {'Content-Type': 'application/json'}, JSON.stringify(response));

					expect(updateRowSpy.calledOnce).toEqual(true);

					$tr = updateRowSpy.getCall(0).returnValue;

					expect(parseInt($tr.attr('data-share-state'), 10)).toEqual(spec.newState);
					expect($tr.attr('data-file')).toEqual('testdir (2)');
					expect($tr.attr('data-path')).toEqual('/dir');
				});

			});

			it('shows error when one occurs during share state update', function() {
				var notificationStub = sinon.stub(OC.Notification, 'show');
				fileData.shareState = OC.Share.STATE_PENDING;
				var $tr = fileListIn.add(fileData);

				$tr.find('.fileactions .action-accept').click();

				expect(fakeServer.requests.length).toEqual(1);
				var request = fakeServer.requests[0];

				var response = {
					ocs: {
						data: [],
						meta: {
							status: 'failure',
							message: 'test error'
						}
					}
				};
				request.respond(200, {'Content-Type': 'application/json'}, JSON.stringify(response));

				expect(notificationStub.calledOnce).toEqual(true);
				expect(notificationStub.getCall(0).args[0]).toContain('test error');

				notificationStub.restore();
			});
		});
	});
	describe('Action events', function() {
		var oldList;
		var appReloadStub;
		var fileListInReloadStub;

		beforeEach(function() {
			oldList = OCA.Files.App.fileList;
			// dummy new list to make sure it exists
			OCA.Files.App.fileList = new OCA.Files.FileList($('<table><thead></thead><tbody></tbody></table>'));

			appReloadStub = sinon.stub(OCA.Files.App.fileList, 'reload');
			fileListInReloadStub = sinon.stub(fileListIn, 'reload');

			App.registerNotificationHandler();
		});
		afterEach(function() {
			appReloadStub.restore();
			fileListInReloadStub.restore();

			// restore old list
			OCA.Files.App.fileList = oldList;
			App.destroy();
		});
		it('accept share triggers reload of sharein and files fileLists', function() {
			var ev = new $.Event('OCA.Notification.Action', {
				notification: {
					app: 'files_sharing',
				},
				action: {
					url: 'https://randomurl',
					type: 'POST'
				}
			});
			$('body').trigger(ev);

			expect(fileListInReloadStub.callCount).toEqual(1);
			expect(appReloadStub.callCount).toEqual(1);
		});
		it('reject share only triggers reload of sharein fileList', function() {
			var ev = new $.Event('OCA.Notification.Action', {
				notification: {
					app: 'files_sharing',
				},
				action: {
					url: 'https://randomurl',
					type: 'DELETE'
				}
			});
			$('body').trigger(ev);

			expect(fileListInReloadStub.callCount).toEqual(1);
			expect(appReloadStub.notCalled).toEqual(true);
		});
		it('ignore events from notifications not related to files_sharing', function() {
			var ev = new $.Event('OCA.Notification.Action', {
				notification: {
					app: 'notifications',
				},
				action: {
					url: 'https://randomurl',
					type: 'DELETE'
				}
			});
			$('body').trigger(ev);

			expect(fileListInReloadStub.notCalled).toEqual(true);
			expect(appReloadStub.notCalled).toEqual(true);
		});
		it('after destroyed no events will be processed', function() {
			var ev = new $.Event('OCA.Notification.Action', {
				notification: {
					app: 'files_sharing',
				},
				action: {
					url: 'https://randomurl',
					type: 'POST'
				}
			});

			App.destroy();
			$('body').trigger(ev);

			expect(fileListInReloadStub.notCalled).toEqual(true);
			expect(appReloadStub.notCalled).toEqual(true);
		});
	});
});
