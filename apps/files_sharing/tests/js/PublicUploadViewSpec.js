/*
 * Copyright (c) 2017 Vincent Petry <pvince81@owncloud.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

describe('OCA.Sharing.PublicUploadView tests', function() {
	var view;
	var dummyUploader;
	var uploaderStub;
	var filesClientStub;
	var getHostStub;
	var getRootPathStub;
	var getProtocolStub;
	var dummyFilesClient;
	var notificationStub;

	beforeEach(function() {
		notificationStub = sinon.stub(OC.Notification, 'show');
		dummyUploader = _.extend({}, OC.Backbone.Events);
		uploaderStub = sinon.stub(OC, 'Uploader').returns(dummyUploader);
		dummyFilesClient = {};
		filesClientStub = sinon.stub(OC.Files, 'Client').returns(dummyFilesClient);
		getHostStub = sinon.stub(OC, 'getHost').returns('dummyhost:1234');
		getRootPathStub = sinon.stub(OC, 'getRootPath').returns('/owncloud');
		getProtocolStub = sinon.stub(OC, 'getProtocol').returns('https');

		view = new OCA.Sharing.PublicUploadView({
			shareToken: 'tehtoken'
		});
		view.render();
	});

	afterEach(function() { 
		getHostStub.restore();
		getRootPathStub.restore();
		getProtocolStub.restore();
		view.remove();
		uploaderStub.restore(); 
		filesClientStub.restore();
		notificationStub.restore();
	});

	describe('setting up', function() {
		it('renders upload form', function() {
			expect(view.$('.uploader').length).toEqual(1);
			expect(view.$('.public-upload-view--completed').length).toEqual(1);
		});
		
		it('initializes uploader', function() {
			var $uploader = view.$('.uploader');
			expect(uploaderStub.calledOnce).toEqual(true);
			expect($uploader.is(uploaderStub.getCall(0).args[0])).toEqual(true);

			var uploaderOptions = uploaderStub.getCall(0).args[1];
			expect(uploaderOptions.filesClient).toEqual(dummyFilesClient);
			expect(uploaderOptions.dropZone.is(view.$('.public-upload-view--dropzone'))).toEqual(true);

			expect(filesClientStub.getCall(0).args[0]).toEqual({
				host: 'dummyhost:1234',
				userName: 'tehtoken',
				root: '/owncloud/public.php/webdav',
				useHTTPS: true
			});
		});
	});

	describe('uploading', function() {
		it('sets conflict mode to autorename on server side', function() {
			var dummyUpload = {
				setConflictMode: sinon.stub()
			};
			dummyUploader.trigger('beforeadd', dummyUpload);

			expect(dummyUpload.setConflictMode.calledOnce).toEqual(true);
			expect(dummyUpload.setConflictMode.calledWith(OC.FileUpload.CONFLICT_MODE_AUTORENAME_SERVER)).toEqual(true);
		});
		it('adds upload to completed box when completed', function() {
			var dummyUpload1 = {
				getFileName: sinon.stub().returns('file1.txt'),
				data: {
					jqXHR: {
						status: 200
					}
				}
			};
			var dummyUpload2 = {
				getFileName: sinon.stub().returns('file2.txt'),
				data: {
					jqXHR: {
						status: 200
					}
				}
			};
			dummyUploader.trigger('done', null, dummyUpload1);
			dummyUploader.trigger('done', null, dummyUpload2);

			var $lis = view.$('.public-upload-view--completed ul>li');
			expect($lis.length).toEqual(2);
			expect($lis.eq(0).text()).toEqual('file1.txt');
			expect($lis.eq(1).text()).toEqual('file2.txt');
		});
	});
	
});
