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

describe('OC.Upload tests', function() {
	var $dummyUploader;
	var testFile;
	var uploader;
	var failStub;
	var currentUserStub;
	var getFolderContentsStub;

	beforeEach(function() {
		testFile = {
			name: 'test.txt',
			size: 5000, // 5 KB
			type: 'text/plain',
			lastModifiedDate: new Date()
		};
		// need a dummy button because file-upload checks on it
		$('#testArea').append(
			'<input type="file" id="file_upload_start" name="files[]" multiple="multiple">' +
			'<input type="hidden" id="free_space" name="free_space" value="50000000">' + // 50 MB
			// TODO: handlebars!
			'<div id="uploadprogressbar"></div>' +
			'<div id="new">' +
			'<a>New</a>' +
			'<ul>' +
			'<li data-type="file" data-newname="New text file.txt"><p>Text file</p></li>' +
			'</ul>' +
			'</div>'
		);
		$dummyUploader = $('#file_upload_start');
		uploader = new OC.Uploader($dummyUploader);
		failStub = sinon.stub();
		uploader.on('fail', failStub);

		currentUserStub = sinon.stub(OC, 'getCurrentUser').returns({uid: 'current@user'});
		getFolderContentsStub = sinon.stub(OC.Files.Client.prototype, 'getFolderContents');
	});
	afterEach(function() {
		$dummyUploader = undefined;
		failStub = undefined;
		currentUserStub.restore();
		getFolderContentsStub.restore();
		uploader.clear();
		uploader = null;
	});

	/**
	 * Add file for upload
	 * @param {Array.<File>} files array of file data to simulate upload
	 * @return {Array.<Object>} array of uploadinfo or null if add() returned false
	 */
	function addFiles(uploader, files) {
		return _.map(files, function(file) {
			var jqXHR = {status: 200};
			var uploadInfo = {
				originalFiles: files,
				files: [file],
				jqXHR: jqXHR,
				response: sinon.stub().returns(jqXHR),
				submit: sinon.stub(),
				abort: sinon.stub()
			};
			if (uploader.fileUploadParam.add.call(
					$dummyUploader[0],
					{},
					uploadInfo
				)) {
				return uploadInfo;
			}
			return null;
		});
	}

	describe('Adding files for upload', function() {
		it('adds file when size is below limits', function() {
			var result = addFiles(uploader, [testFile]);
			expect(result[0]).not.toEqual(null);
			expect(result[0].submit.calledOnce).toEqual(true);
		});
		it('adds file when free space is unknown', function() {
			var result;
			$('#free_space').val(-2);

			result = addFiles(uploader, [testFile]);

			expect(result[0]).not.toEqual(null);
			expect(result[0].submit.calledOnce).toEqual(true);
			expect(failStub.notCalled).toEqual(true);
		});
		it('does not add file if it exceeds free space', function() {
			var result;
			$('#free_space').val(1000);

			result = addFiles(uploader, [testFile]);

			expect(result[0]).toEqual(null);
			expect(failStub.calledOnce).toEqual(true);
			expect(failStub.getCall(0).args[1].textStatus).toEqual('notenoughspace');
			expect(failStub.getCall(0).args[1].errorThrown).toEqual(
				'Not enough free space, you are uploading 5 KB but only 1000 B is left'
			);
		});
		it('triggers event before adding', function() {
			var handler = sinon.stub();
			uploader.on('beforeadd', handler);
			addFiles(uploader, [testFile]);

			expect(handler.calledOnce).toEqual(true);
			var upload = handler.getCall(0).args[0];
			expect(upload).toBeDefined();
			expect(upload.getFileName()).toEqual('test.txt');
		});
		it('clear leaves pending uploads', function() {
			uploader._uploads = {
				'abc': {name: 'a job well done.txt', isDone: true},
				'def': {name: 'whatevs.txt'},
				'ghi': {name: 'aborted.txt', aborted: true}
			};

			uploader.clear();

			//This does verify that aborted upload(s) will not be available in the _uploads
			expect(uploader._uploads).toEqual({'def': {name: 'whatevs.txt'}});
		});
	});
	describe('Upload conflicts', function() {
		var conflictDialogStub;
		var fileList;

		beforeEach(function() {
			$('#testArea').append(
				'<div id="tableContainer">' +
				'<table id="filestable">' +
				'<thead><tr>' +
				'<th id="headerName" class="hidden column-name">' +
				'<input type="checkbox" id="select_all_files" class="select-all">' +
				'<a class="name columntitle" data-sort="name"><span>Name</span><span class="sort-indicator"></span></a>' +
				'<span id="selectedActionsList" class="selectedActions hidden">' +
				'<a href class="download"><img/>Download</a>' +
				'<a href class="delete-selected">Delete</a></span>' +
				'</th>' +
				'<th class="hidden column-size"><a class="columntitle" data-sort="size"><span class="sort-indicator"></span></a></th>' +
				'<th class="hidden column-mtime"><a class="columntitle" data-sort="mtime"><span class="sort-indicator"></span></a></th>' +
				'</tr></thead>' +
				'<tbody id="fileList"></tbody>' +
				'<tfoot></tfoot>' +
				'</table>' +
				'</div>'
			);
			fileList = new OCA.Files.FileList($('#tableContainer'));

			fileList.add({name: 'conflict.txt', mimetype: 'text/plain'});
			fileList.add({name: 'conflict2.txt', mimetype: 'text/plain'});

			conflictDialogStub = sinon.stub(OC.dialogs, 'fileexists');

			uploader = new OC.Uploader($dummyUploader, {
				fileList: fileList
			});

			var deferred = $.Deferred();
			conflictDialogStub.returns(deferred.promise());
			deferred.resolve();
		});
		afterEach(function() {
			conflictDialogStub.restore();

			fileList.destroy();
		});
		it('does not show conflict dialog when no client side conflict', function() {
			var result = addFiles(uploader, [{name: 'noconflict.txt'}, {name: 'noconflict2.txt'}]);

			expect(conflictDialogStub.notCalled).toEqual(true);
			expect(result[0].submit.calledOnce).toEqual(true);
			expect(result[1].submit.calledOnce).toEqual(true);
		});
		it('shows conflict dialog when no client side conflict', function() {
			var result = addFiles(uploader, [
				{name: 'conflict.txt'},
				{name: 'conflict2.txt'},
				{name: 'noconflict.txt'}
			]);

			expect(conflictDialogStub.callCount).toEqual(3);
			expect(conflictDialogStub.getCall(1).args[0].getFileName())
				.toEqual('conflict.txt');
			expect(conflictDialogStub.getCall(1).args[1])
				.toEqual({ name: 'conflict.txt', mimetype: 'text/plain', directory: '/' });
			expect(conflictDialogStub.getCall(1).args[2]).toEqual({ name: 'conflict.txt' });

			// yes, the dialog must be called several times...
			expect(conflictDialogStub.getCall(2).args[0].getFileName()).toEqual('conflict2.txt');
			expect(conflictDialogStub.getCall(2).args[1])
				.toEqual({ name: 'conflict2.txt', mimetype: 'text/plain', directory: '/' });
			expect(conflictDialogStub.getCall(2).args[2]).toEqual({ name: 'conflict2.txt' });

			expect(result[0].submit.calledOnce).toEqual(false);
			expect(result[1].submit.calledOnce).toEqual(false);
			expect(result[2].submit.calledOnce).toEqual(true);
		});
		it('cancels upload when skipping file in conflict mode', function() {
			var fileData = {name: 'conflict.txt'};
			var uploadData = addFiles(uploader, [
				fileData
			]);

			var upload = new OC.FileUpload(uploader, uploadData[0]);
			var deleteStub = sinon.stub(upload, 'deleteUpload');

			uploader.onSkip(upload);
			expect(deleteStub.calledOnce).toEqual(true);
		});
		it('overwrites file when choosing replace in conflict mode', function() {
			var fileData = {name: 'conflict.txt'};
			var uploadData = addFiles(uploader, [
				fileData
			]);

			expect(uploadData[0].submit.notCalled).toEqual(true);

			var upload = new OC.FileUpload(uploader, uploadData[0]);

			uploader.onReplace(upload);
			expect(upload.getConflictMode()).toEqual(OC.FileUpload.CONFLICT_MODE_OVERWRITE);
			expect(uploadData[0].submit.calledOnce).toEqual(true);
		});
		it('autorenames file when choosing replace in conflict mode', function() {
			// needed for _.defer call
			var clock = sinon.useFakeTimers();
			var fileData = {name: 'conflict.txt'};
			var uploadData = addFiles(uploader, [
				fileData
			]);

			expect(uploadData[0].submit.notCalled).toEqual(true);

			var upload = new OC.FileUpload(uploader, uploadData[0]);
			var getResponseStatusStub = sinon.stub(upload, 'getResponseStatus');

			uploader.onAutorename(upload);
			expect(upload.getConflictMode()).toEqual(OC.FileUpload.CONFLICT_MODE_AUTORENAME);
			expect(upload.getFileName()).toEqual('conflict (2).txt');
			expect(uploadData[0].submit.calledOnce).toEqual(true);

			// in case of server-side conflict, tries to rename again
			getResponseStatusStub.returns(412);
			uploader.fileUploadParam.fail.call($dummyUploader[0], {}, uploadData[0]);
			clock.tick(500);
			expect(upload.getFileName()).toEqual('conflict (3).txt');
			expect(uploadData[0].submit.calledTwice).toEqual(true);

			clock.restore();
		});
		it('server-side autorename mode sets OC-Autorename header', function() {
			var fileData = {name: 'conflict.txt'};
			var uploadData = addFiles(uploader, [
				fileData
			]);

			expect(uploadData[0].submit.notCalled).toEqual(true);

			var upload = new OC.FileUpload(uploader, uploadData[0]);
			upload.setConflictMode(OC.FileUpload.CONFLICT_MODE_AUTORENAME_SERVER);
			upload.submit();

			expect(upload.data.headers['OC-Autorename']).toEqual('1');
		});
	});
	describe('submitting uploads', function() {
		describe('headers', function () {
			function testHeaders (fileData) {
				var uploadData = addFiles(uploader, [
					fileData
				]);

				return uploadData[0].headers;
			}

			it('sets request token', function () {
				var oldToken = OC.requestToken;
				OC.requestToken = 'abcd';
				var headers = testHeaders({
					name: 'headerstest.txt'
				});

				expect(headers['requesttoken']).toEqual('abcd');
				OC.requestToken = oldToken;
			});
			it('sets the mtime header when lastModifiedDate is set', function () {
				var headers = testHeaders({
					name: 'mtimetest.txt',
					lastModifiedDate: new Date(Date.UTC(2018, 7, 26, 14, 55, 22, 500))
				});

				expect(headers['X-OC-Mtime']).toEqual('1535295322.5');
			});
			it('sets the mtime header when lastModified is set', function () {
				var headers = testHeaders({
					name: 'mtimetest.txt',
					lastModified: 1535295322500
				});

				expect(headers['X-OC-Mtime']).toEqual('1535295322.5');
			});
		});
	});
	describe('Chunked upload', function() {
		it('rewires data url when uploading chunks', function() {
			var result = addFiles(uploader, [testFile]);
			var upload = uploader.getUpload(result[0]);
			expect(result[0]).not.toEqual(null);
			expect(result[0].submit.calledOnce).toEqual(true);

			result[0].contentRange = 'bytes 100-250/150';
			result[0].headers['Content-Range'] = 'bytes 100-250/150';
			result[0].retries = 3;

			$dummyUploader.trigger('fileuploadchunksend', result[0]);

			expect(result[0].contentRange).not.toBeDefined();
			expect(result[0].headers['Content-Range']).not.toBeDefined();
			expect(result[0].url)
				.toEqual(OC.getRootPath() + '/remote.php/dav/uploads/current%40user/' + upload.getId() + '/100');
			expect(result[0].retries).toEqual(0);
		});

		it('retries stalled chunk on failure', function() {
			var clock = sinon.useFakeTimers();

			uploader = new OC.Uploader($dummyUploader, {
				maxChunkSize: 150
			});
			uploader.on('fail', failStub);

			var result = addFiles(uploader, [testFile]);
			var upload = uploader.getUpload(result[0]);

			// chunk upload doesn't call "submit" initially
			expect(result[0].submit.notCalled).toEqual(true);

			upload.data.stalled = true;

			result[0].headers['If-None-Match'] = '*';

			result[0].uploadedBytes = 300; // less than expected

			uploader.fileUploadParam.fail.call($dummyUploader[0], {}, result[0]);

			expect(upload.data.retries).toEqual(1);
			expect(failStub.notCalled).toEqual(true);

			expect(getFolderContentsStub.notCalled).toEqual(true);

			var deferred = $.Deferred();
			getFolderContentsStub.returns(deferred.promise());

			// trigger retry
			clock.tick(10000);

			expect(getFolderContentsStub.calledOnce).toEqual(true);
			expect(getFolderContentsStub.getCall(0).args[0]).toEqual('uploads/current@user/' + upload.getId());

			deferred.resolve(207, [
				{
					name: '0',
					size: 150
				},
				{
					name: '150',
					size: 150
				},
				// this chunk is smaller and needs to be retried
				{
					name: '300',
					size: 100
				},
				// ignored
				{
					name: '.file',
					size: 10000
				}
			]);

			// uploaded bytes was set to the sum of all chunk sizes
			expect(result[0].uploadedBytes).toEqual(300);
			expect(result[0].data).toBeFalsy();
			expect(upload.data.stalled).toEqual(false);

			// header was cleared for overwriting
			expect(result[0].headers['If-None-Match']).not.toBeDefined();

			expect(result[0].submit.calledOnce).toEqual(true);

			clock.restore();
		});

		it('stalled progress will set stalled flag after a while', function() {
			var clock = sinon.useFakeTimers();

			uploader = new OC.Uploader($dummyUploader, {
				uploadStallTimeout: 10
			});

			var result = addFiles(uploader, [testFile]);
			var upload = uploader.getUpload(result[0]);

			$dummyUploader.trigger('fileuploadstart', result[0]);

			result[0].uploadedBytes = 300;

			expect(upload.data.stalled).toBeFalsy();

			$dummyUploader.trigger('fileuploadprogressall', {loaded: 300, total: 5000});
			clock.tick(5000);

			expect(upload.data.stalled).toBeFalsy();

			result[0].uploadedBytes = 400; // some progress, no stall

			$dummyUploader.trigger('fileuploadprogressall', {loaded: 400, total: 5000});
			clock.tick(10000);

			expect(upload.data.stalled).toBeFalsy();

			expect(result[0].abort.notCalled).toEqual(true);

			// no progress, stalled
			$dummyUploader.trigger('fileuploadprogressall', {loaded: 400, total: 5000});

			clock.tick(10000);

			expect(upload.data.stalled).toEqual(true);

			expect(result[0].abort.calledOnce).toEqual(true);

			clock.restore();
		});
	});
});
