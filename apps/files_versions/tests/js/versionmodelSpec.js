/*
 * Copyright (c) 2015
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/* global dav */
describe('OCA.Versions.VersionModel', function() {
	var VersionModel = OCA.Versions.VersionModel;
	var model;

	var requestStub;
	var requestDeferred;
	var currentUserStub;

	beforeEach(function() {
		model = new VersionModel({
			id: 123456789,
			fileId: 10000000,
			timestamp: 10000000,
			fullPath: '/subdir/some file.txt',
			name: 'some file.txt',
			size: 150,
		});
		currentUserStub = sinon.stub(OC, 'getCurrentUser').returns({uid: 'user0'});

		requestDeferred = new $.Deferred();
		requestStub = sinon.stub(dav.Client.prototype, 'request').returns(requestDeferred.promise());
	});
	afterEach(function() {
		currentUserStub.restore();
		requestStub.restore();
	});

	it('returns the full path', function() {
		expect(model.getFullPath()).toEqual('/subdir/some file.txt');
	});
	it('returns the preview url', function() {
		expect(model.getPreviewUrl())
			.toEqual(OC.generateUrl('/apps/files_versions/preview') +
					'?file=%2Fsubdir%2Fsome%20file.txt&version=10000000'
			);
	});
	it('returns the download url', function() {
		expect(model.getDownloadUrl())
			.toEqual(
				OC.linkToRemoteBase('dav') + '/meta/10000000/v/123456789'
			);
	});
	describe('reverting', function() {
		var revertEventStub;
		var successStub;
		var errorStub;

		beforeEach(function() {
			revertEventStub = sinon.stub();
			errorStub = sinon.stub();
			successStub = sinon.stub();

			model.on('revert', revertEventStub);
			model.on('error', errorStub);
		});
		
		it('tells the server to revert when calling the revert method', function() {
			model.revert({
				success: successStub
			});

			expect(requestStub.calledOnce).toEqual(true);
			expect(requestStub.getCall(0).args[0]).toEqual('COPY');
			expect(requestStub.getCall(0).args[1]).toEqual(
					'/owncloud/remote.php/dav/meta/10000000/v/123456789'
			);
			expect(requestStub.getCall(0).args[2]['Destination']).toEqual(
				OC.TestUtil.buildAbsoluteUrl('/owncloud/remote.php/dav/files/user0/subdir/some%20file.txt')
			);

			requestDeferred.resolve({
				status: 204,
				body: ''
			});

			expect(revertEventStub.called).toEqual(true);
			expect(successStub.calledOnce).toEqual(true);
			expect(errorStub.notCalled).toEqual(true);
		});
		it('triggers error event when server returns a failure', function() {
			model.revert({
				success: successStub
			});

			expect(requestStub.calledOnce).toEqual(true);

			requestDeferred.resolve({
				status: 400,
				body: ''
			});

			expect(revertEventStub.notCalled).toEqual(true);
			expect(successStub.notCalled).toEqual(true);
			expect(errorStub.calledOnce).toEqual(true);
		});
	});
});
