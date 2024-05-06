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

describe('OCA.Trashbin.FileList tests', function() {
	var testFiles, alertStub, notificationStub, fileList;

	beforeEach(function() {
		alertStub = sinon.stub(OC.dialogs, 'alert');
		notificationStub = sinon.stub(OC.Notification, 'show');

		// init parameters and test table elements
		$('#testArea').append(
			'<div id="app-content-trashbin">' +
			// init horrible parameters
			'<input type="hidden" id="dir" value="/"></input>' +
			// set this but it shouldn't be used (could be the one from the
			// files app)
			'<input type="hidden" id="permissions" value="31"></input>' +
			// dummy controls
			'<div id="controls">' +
			'   <div class="actions creatable"></div>' +
			'   <div class="notCreatable"></div>' +
			'</div>' +
			// dummy table
			// TODO: at some point this will be rendered by the fileList class itself!
			'<table id="filestable">' +
			'<thead><tr><th id="headerName" class="hidden">' +
			'<input type="checkbox" id="select_all_trash" class="select-all">' +
			'<span class="name">Name</span>' +
			'<span class="selectedActions hidden">' +
			'<a href class="undelete">Restore</a>' +
			'<a href class="delete-selected">Delete</a></span>' +
			'</th></tr></thead>' +
			'<tbody id="fileList"></tbody>' +
			'<tfoot></tfoot>' +
			'</table>' +
			'<div id="emptycontent">Empty content message</div>' +
			'</div>'
		);

		testFiles = [{
			id: 1,
			type: 'file',
			name: 'One.txt',
			mtime: 11111000,
			mimetype: 'text/plain',
			etag: 'abc'
		}, {
			id: 2,
			type: 'file',
			name: 'Two.jpg',
			mtime: 22222000,
			mimetype: 'image/jpeg',
			etag: 'def',
		}, {
			id: 3,
			type: 'file',
			name: 'Three.pdf',
			mtime: 33333000,
			mimetype: 'application/pdf',
			etag: '123',
		}, {
			id: 4,
			type: 'dir',
			mtime: 99999000,
			name: 'somedir',
			mimetype: 'httpd/unix-directory',
			etag: '456'
		}];

		// register file actions like the trashbin App does
		var fileActions = OCA.Trashbin.App._createFileActions(fileList);
		fileList = new OCA.Trashbin.FileList(
			$('#app-content-trashbin'), {
				fileActions: fileActions
			}
		);
	});
	afterEach(function() {
		testFiles = undefined;
		fileList.destroy();
		fileList = undefined;

		$('#dir').remove();
		notificationStub.restore();
		alertStub.restore();
	});
	describe('Initialization', function() {
		it('Sorts by mtime by default', function() {
			expect(fileList._sort).toEqual('mtime');
			expect(fileList._sortDirection).toEqual('desc');
		});
		it('Always returns read and delete permission', function() {
			expect(fileList.getDirectoryPermissions()).toEqual(OC.PERMISSION_READ | OC.PERMISSION_DELETE);
		});
	});
	describe('Breadcrumbs', function() {
		beforeEach(function() {
			var data = {
				status: 'success',
				data: {
					files: testFiles,
					permissions: 1
				}
			};
			fakeServer.respondWith(/\/index\.php\/apps\/files_trashbin\/ajax\/list.php\?dir=%2Fsubdir/, [
					200, {
						"Content-Type": "application/json"
					},
					JSON.stringify(data)
			]);
		});
		it('links the breadcrumb to the trashbin view', function() {
			fileList.changeDirectory('/subdir', false, true);
			fakeServer.respond();
			var $crumbs = fileList.$el.find('#controls .crumb');
			expect($crumbs.length).toEqual(2);
			expect($crumbs.eq(0).find('a').text()).toEqual('Deleted files');
			expect($crumbs.eq(0).find('a').attr('href'))
				.toEqual(OC.webroot + '/index.php/apps/files?view=trashbin&dir=/');
			expect($crumbs.eq(1).find('a').text()).toEqual('subdir');
			expect($crumbs.eq(1).find('a').attr('href'))
				.toEqual(OC.webroot + '/index.php/apps/files?view=trashbin&dir=/subdir');
		});
	});
	describe('Rendering rows', function() {
		it('renders rows with the correct data when in root', function() {
			// dir listing is false when in root
			$('#dir').val('/');
			fileList.setFiles(testFiles);
			var $rows = fileList.$el.find('tbody tr');
			var $tr = $rows.eq(0);
			expect($rows.length).toEqual(4);
			expect($tr.attr('data-id')).toEqual('1');
			expect($tr.attr('data-type')).toEqual('file');
			expect($tr.attr('data-file')).toEqual('One.txt.d11111');
			expect($tr.attr('data-size')).not.toBeDefined();
			expect($tr.attr('data-etag')).toEqual('abc');
			expect($tr.attr('data-permissions')).toEqual('9'); // read and delete
			expect($tr.attr('data-mime')).toEqual('text/plain');
			expect($tr.attr('data-mtime')).toEqual('11111000');
			expect($tr.find('a.name').attr('href')).toEqual('#');

			expect($tr.find('.nametext').text().trim()).toEqual('One.txt');

			expect(fileList.findFileEl('One.txt.d11111')[0]).toEqual($tr[0]);
		});
		it('renders rows with the correct data when in root after calling setFiles with the same data set', function() {
			// dir listing is false when in root
			$('#dir').val('/');
			fileList.setFiles(testFiles);
			fileList.setFiles(fileList.files);
			var $rows = fileList.$el.find('tbody tr');
			var $tr = $rows.eq(0);
			expect($rows.length).toEqual(4);
			expect($tr.attr('data-id')).toEqual('1');
			expect($tr.attr('data-type')).toEqual('file');
			expect($tr.attr('data-file')).toEqual('One.txt.d11111');
			expect($tr.attr('data-size')).not.toBeDefined();
			expect($tr.attr('data-etag')).toEqual('abc');
			expect($tr.attr('data-permissions')).toEqual('9'); // read and delete
			expect($tr.attr('data-mime')).toEqual('text/plain');
			expect($tr.attr('data-mtime')).toEqual('11111000');
			expect($tr.find('a.name').attr('href')).toEqual('#');

			expect($tr.find('.nametext').text().trim()).toEqual('One.txt');

			expect(fileList.findFileEl('One.txt.d11111')[0]).toEqual($tr[0]);
		});
		it('renders rows with the correct data when in subdirectory', function() {
			// dir listing is true when in a subdir
			$('#dir').val('/subdir');

			fileList.setFiles(testFiles);
			var $rows = fileList.$el.find('tbody tr');
			var $tr = $rows.eq(0);
			expect($rows.length).toEqual(4);
			expect($tr.attr('data-id')).toEqual('1');
			expect($tr.attr('data-type')).toEqual('file');
			expect($tr.attr('data-file')).toEqual('One.txt');
			expect($tr.attr('data-size')).not.toBeDefined();
			expect($tr.attr('data-etag')).toEqual('abc');
			expect($tr.attr('data-permissions')).toEqual('9'); // read and delete
			expect($tr.attr('data-mime')).toEqual('text/plain');
			expect($tr.attr('data-mtime')).toEqual('11111000');
			expect($tr.find('a.name').attr('href')).toEqual('#');

			expect($tr.find('.nametext').text().trim()).toEqual('One.txt');

			expect(fileList.findFileEl('One.txt')[0]).toEqual($tr[0]);
		});
		it('does not render a size column', function() {
			expect(fileList.$el.find('tbody tr .filesize').length).toEqual(0);
		});
	});
	describe('elementToFile', function() {
		var $tr;

		beforeEach(function() {
			fileList.setFiles(testFiles);
			$tr = fileList.findFileEl('One.txt.d11111');
		});

		it('converts data attributes to file info structure', function() {
			var fileInfo = fileList.elementToFile($tr);
			expect(fileInfo.id).toEqual(1);
			expect(fileInfo.name).toEqual('One.txt.d11111');
			expect(fileInfo.displayName).toEqual('One.txt');
			expect(fileInfo.mtime).toEqual(11111000);
			expect(fileInfo.etag).toEqual('abc');
			expect(fileInfo.permissions).toEqual(OC.PERMISSION_READ | OC.PERMISSION_DELETE);
			expect(fileInfo.mimetype).toEqual('text/plain');
			expect(fileInfo.type).toEqual('file');
		});
	});
	describe('Global Actions', function() {
		beforeEach(function() {
			fileList.setFiles(testFiles);
			fileList.findFileEl('One.txt.d11111').find('input:checkbox').click();
			fileList.findFileEl('Three.pdf.d33333').find('input:checkbox').click();
			fileList.findFileEl('somedir.d99999').find('input:checkbox').click();
		});
		describe('Delete', function() {
			it('Shows trashbin actions', function() {
				// visible because a few files were selected
				expect($('.selectedActions').is(':visible')).toEqual(true);
				expect($('.selectedActions .delete-selected').is(':visible')).toEqual(true);
				expect($('.selectedActions .undelete').is(':visible')).toEqual(true);

				// check
				fileList.$el.find('.select-all').click();

				// stays visible
				expect($('.selectedActions').is(':visible')).toEqual(true);
				expect($('.selectedActions .delete-selected').is(':visible')).toEqual(true);
				expect($('.selectedActions .undelete').is(':visible')).toEqual(true);

				// uncheck
				fileList.$el.find('.select-all').click();

				// becomes hidden now
				expect($('.selectedActions').is(':visible')).toEqual(false);
				expect($('.selectedActions .delete-selected').is(':visible')).toEqual(false);
				expect($('.selectedActions .undelete').is(':visible')).toEqual(false);
			});
			it('Deletes selected files when "Delete" clicked', function() {
				var request;
				$('.selectedActions .delete-selected').click();
				expect(fakeServer.requests.length).toEqual(1);
				request = fakeServer.requests[0];
				expect(request.url).toEqual(OC.webroot + '/index.php/apps/files_trashbin/ajax/delete.php');
				expect(OC.parseQueryString(request.requestBody))
					.toEqual({'dir': '/', files: '["One.txt.d11111","Three.pdf.d33333","somedir.d99999"]'});
				fakeServer.requests[0].respond(
					200,
					{ 'Content-Type': 'application/json' },
					JSON.stringify({
						status: 'success',
						data: {
							success: [
								{filename: 'One.txt.d11111'},
								{filename: 'Three.pdf.d33333'},
								{filename: 'somedir.d99999'}
							]
						}
					})
				);
				expect(fileList.findFileEl('One.txt.d11111').length).toEqual(0);
				expect(fileList.findFileEl('Three.pdf.d33333').length).toEqual(0);
				expect(fileList.findFileEl('somedir.d99999').length).toEqual(0);
				expect(fileList.findFileEl('Two.jpg.d22222').length).toEqual(1);
			});
			it('Deletes selected files when all files selected, some unselected, and "Delete" clicked', function() {
				var request;
				$('.select-all').click();
				fileList.findFileEl('Two.jpg.d22222').find('input:checkbox').click();
				fileList.findFileEl('Three.pdf.d33333').find('input:checkbox').click();
				$('.selectedActions .delete-selected').click();
				expect(fakeServer.requests.length).toEqual(1);
				request = fakeServer.requests[0];
				expect(request.url).toEqual(OC.webroot + '/index.php/apps/files_trashbin/ajax/delete.php');
				expect(OC.parseQueryString(request.requestBody))
					.toEqual({'dir': '/', files: '["One.txt.d11111","somedir.d99999"]'});
				fakeServer.requests[0].respond(
					200,
					{ 'Content-Type': 'application/json' },
					JSON.stringify({
						status: 'success',
						data: {
							success: [
								{filename: 'One.txt.d11111'},
								{filename: 'somedir.d99999'}
							]
						}
					})
				);
				expect(fileList.findFileEl('One.txt.d11111').length).toEqual(0);
				expect(fileList.findFileEl('somedir.d99999').length).toEqual(0);
				expect(fileList.findFileEl('Two.jpg.d22222').length).toEqual(1);
				expect(fileList.findFileEl('Three.pdf.d33333').length).toEqual(1);
			});
			it('Deletes all files when all selected when "Delete" clicked', function() {
				var request;
				$('.select-all').click();
				$('.selectedActions .delete-selected').click();
				expect(fakeServer.requests.length).toEqual(1);
				request = fakeServer.requests[0];
				expect(request.url).toEqual(OC.webroot + '/index.php/apps/files_trashbin/ajax/delete.php');
				expect(OC.parseQueryString(request.requestBody))
					.toEqual({'dir': '/', allfiles: 'true'});
				fakeServer.requests[0].respond(
					200,
					{ 'Content-Type': 'application/json' },
					JSON.stringify({status: 'success'})
				);
				expect(fileList.isEmpty).toEqual(true);
			});
		});
		describe('Restore', function() {
			it('Restores selected files when "Restore" clicked', function() {
				var request;
				$('.selectedActions .undelete').click();
				expect(fakeServer.requests.length).toEqual(1);
				request = fakeServer.requests[0];
				expect(request.url).toEqual(OC.webroot + '/index.php/apps/files_trashbin/ajax/undelete.php');
				expect(OC.parseQueryString(request.requestBody))
					.toEqual({'dir': '/', files: '["One.txt.d11111","Three.pdf.d33333","somedir.d99999"]'});
				fakeServer.requests[0].respond(
					200,
					{ 'Content-Type': 'application/json' },
					JSON.stringify({
						status: 'success',
						data: {
							success: [
								{filename: 'One.txt.d11111'},
								{filename: 'Three.pdf.d33333'},
								{filename: 'somedir.d99999'}
							]
						}
					})
				);
				expect(fileList.findFileEl('One.txt.d11111').length).toEqual(0);
				expect(fileList.findFileEl('Three.pdf.d33333').length).toEqual(0);
				expect(fileList.findFileEl('somedir.d99999').length).toEqual(0);
				expect(fileList.findFileEl('Two.jpg.d22222').length).toEqual(1);
			});
			it('Restores selected files when all files selected, some unselected, and "Restore" clicked', function() {
				var request;
				$('.select-all').click();
				fileList.findFileEl('Two.jpg.d22222').find('input:checkbox').click();
				fileList.findFileEl('Three.pdf.d33333').find('input:checkbox').click();
				$('.selectedActions .undelete').click();
				expect(fakeServer.requests.length).toEqual(1);
				request = fakeServer.requests[0];
				expect(request.url).toEqual(OC.webroot + '/index.php/apps/files_trashbin/ajax/undelete.php');
				expect(OC.parseQueryString(request.requestBody))
					.toEqual({'dir': '/', files: '["One.txt.d11111","somedir.d99999"]'});
				fakeServer.requests[0].respond(
					200,
					{ 'Content-Type': 'application/json' },
					JSON.stringify({
						status: 'success',
						data: {
							success: [
								{filename: 'One.txt.d11111'},
								{filename: 'somedir.d99999'}
							]
						}
					})
				);
				expect(fileList.findFileEl('One.txt.d11111').length).toEqual(0);
				expect(fileList.findFileEl('somedir.d99999').length).toEqual(0);
				expect(fileList.findFileEl('Two.jpg.d22222').length).toEqual(1);
				expect(fileList.findFileEl('Three.pdf.d33333').length).toEqual(1);
			});
			it('Restores all files when all selected when "Restore" clicked', function() {
				var request;
				$('.select-all').click();
				$('.selectedActions .undelete').click();
				expect(fakeServer.requests.length).toEqual(1);
				request = fakeServer.requests[0];
				expect(request.url).toEqual(OC.webroot + '/index.php/apps/files_trashbin/ajax/undelete.php');
				expect(OC.parseQueryString(request.requestBody))
					.toEqual({'dir': '/', allfiles: 'true'});
				fakeServer.requests[0].respond(
					200,
					{ 'Content-Type': 'application/json' },
					JSON.stringify({status: 'success'})
				);
				expect(fileList.isEmpty).toEqual(true);
			});
		});
	});
});
