/**
* ownCloud
*
* @author Vincent Petry
* @copyright 2015 Vincent Petry <pvince81@owncloud.com>
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

describe('OC.Files.Client tests', function() {
	var Client = OC.Files.Client;
	var baseUrl;
	var client;

	beforeEach(function() {
		baseUrl = 'https://testhost:999/owncloud/remote.php/webdav/';

		client = new Client({
			host: 'testhost',
			port: 999,
			root: '/owncloud/remote.php/webdav',
			useHTTPS: true
		});
	});
	afterEach(function() {
		client = null;
	});

	/**
	 * Send an status response and check that the given
	 * deferred gets its success handler called with the error
	 * status code
	 *
	 * @param {Deferred} deferred deferred object
	 * @param {int} status status to test
	 * @param {Function} done done function
	 */
	function respondAndCheckStatus(deferred, status, done) {
		var successHandler = sinon.stub();
		var failHandler = sinon.stub();

		deferred.done(successHandler);
		deferred.fail(failHandler);

		fakeServer.requests[0].respond(
			status,
			{'Content-Type': 'application/xml'},
			''
		);

		deferred.then(function() {
			expect(successHandler.calledOnce).toEqual(true);
			expect(successHandler.getCall(0).args[0]).toEqual(status);

			expect(failHandler.notCalled).toEqual(true);

			done();
		});
	}

	/**
	 * Send an error response and check that the given
	 * deferred gets its fail handler called with the error
	 * status code
	 *
	 * @param {Deferred} deferred deferred object
	 * @param {int} status error status to test
	 * @param {Function} done done function
	 */
	function respondAndCheckError(deferred, status, done) {
		done();
		return; // FIXME
		var successHandler = sinon.stub();
		var failHandler = sinon.stub();
		deferred.done(successHandler);
		deferred.fail(failHandler);

		fakeServer.requests[0].respond(
			status,
			{'Content-Type': 'application/xml'},
			''
		);

		deferred.then(function() {
			expect(failHandler.calledOnce).toEqual(true);
			expect(failHandler.calledWith(status)).toEqual(true);

			expect(successHandler.notCalled).toEqual(true);

			done();
		});
	}

	/**
	 * Returns a list of request properties parsed from the given request body.
	 *
	 * @param {string} requestBody request XML
	 *
	 * @return {Array.<String>} array of request properties in the format
	 * "{NS:}propname"
	 */
	function getRequestedProperties(requestBody) {
		var doc = (new window.DOMParser()).parseFromString(
				requestBody,
				'application/xml'
		);
		var propRoots = doc.getElementsByTagNameNS('DAV:', 'prop');
		var propsList = propRoots.item(0).childNodes;
		return _.map(_.filter(propsList, function(propNode) {
			return propNode.nodeType === Node.ELEMENT_NODE;
		}), function(propNode) {
			return '{' + propNode.namespaceURI + '}' + propNode.localName;
		});
	}

	function makePropBlock(props) {
		var s = '<d:prop>\n';

		_.each(props, function(value, key) {
			s += '<' + key + '>' + value + '</' + key + '>\n';
		});

		return s + '</d:prop>\n';
	}

	function makeResponseBlock(href, props, failedProps) {
		var s = '<d:response>\n';
		s += '<d:href>' + href + '</d:href>\n';
		s += '<d:propstat>\n';
		s += makePropBlock(props);
		s += '<d:status>HTTP/1.1 200 OK</d:status>';
		s += '</d:propstat>\n';
		if (failedProps) {
			s += '<d:propstat>\n';
			s += '<d:prop>\n';
			_.each(failedProps, function(prop) {
				s += '<' + prop + '/>\n';
			});
			s += '</d:prop>\n';
			s += '<d:status>HTTP/1.1 404 Not Found</d:status>\n';
			s += '</d:propstat>\n';
		}
		return s + '</d:response>\n';
	}

	describe('file listing', function() {

		var folderContentsXml =
			'<?xml version="1.0" encoding="utf-8"?>' +
			'<d:multistatus xmlns:d="DAV:" xmlns:s="http://sabredav.org/ns" xmlns:oc="http://owncloud.org/ns">' +
			makeResponseBlock(
			'/owncloud/remote.php/webdav/path/to%20space/%E6%96%87%E4%BB%B6%E5%A4%B9/',
			{
				'd:getlastmodified': 'Fri, 10 Jul 2015 10:00:05 GMT',
				'd:getetag': '"56cfcabd79abb"',
				'd:resourcetype': '<d:collection/>',
				'oc:id': '00000011oc2d13a6a068',
				'oc:permissions': 'RDNVCK',
				'oc:size': 120
			},
			[
				'd:getcontenttype',
				'd:getcontentlength'
			]
			) +
			makeResponseBlock(
			'/owncloud/remote.php/webdav/path/to%20space/%E6%96%87%E4%BB%B6%E5%A4%B9/One.txt',
			{
				'd:getlastmodified': 'Fri, 10 Jul 2015 13:38:05 GMT',
				'd:getetag': '"559fcabd79a38"',
				'd:getcontenttype': 'text/plain',
				'd:getcontentlength': 250,
				'd:resourcetype': '',
				'oc:id': '00000051oc2d13a6a068',
				'oc:permissions': 'RDNVW'
			},
			[
				'oc:size',
			]
			) +
			makeResponseBlock(
			'/owncloud/remote.php/webdav/path/to%20space/%E6%96%87%E4%BB%B6%E5%A4%B9/sub',
			{
				'd:getlastmodified': 'Fri, 10 Jul 2015 14:00:00 GMT',
				'd:getetag': '"66cfcabd79abb"',
				'd:resourcetype': '<d:collection/>',
				'oc:id': '00000015oc2d13a6a068',
				'oc:permissions': 'RDNVCK',
				'oc:size': 100
			},
			[
				'd:getcontenttype',
				'd:getcontentlength'
			]
			) +
			'</d:multistatus>';

		it('sends PROPFIND with explicit properties to get file list', function() {
			client.getFolderContents('path/to space/文件夹');

			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].method).toEqual('PROPFIND');
			expect(fakeServer.requests[0].url).toEqual(baseUrl + 'path/to%20space/%E6%96%87%E4%BB%B6%E5%A4%B9');
			expect(fakeServer.requests[0].requestHeaders.Depth).toEqual(1);

			var props = getRequestedProperties(fakeServer.requests[0].requestBody);
			expect(props).toContain('{DAV:}getlastmodified');
			expect(props).toContain('{DAV:}getcontentlength');
			expect(props).toContain('{DAV:}getcontenttype');
			expect(props).toContain('{DAV:}getetag');
			expect(props).toContain('{DAV:}resourcetype');
			expect(props).toContain('{http://owncloud.org/ns}id');
			expect(props).toContain('{http://owncloud.org/ns}size');
			expect(props).toContain('{http://owncloud.org/ns}permissions');
		});
		it('sends PROPFIND to base url when empty path given', function() {
			client.getFolderContents('');
			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].url).toEqual(baseUrl);
		});
		it('sends PROPFIND to base url when root path given', function() {
			client.getFolderContents('/');
			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].url).toEqual(baseUrl);
		});
		it('parses the result list into a FileInfo array', function(done) {
			var deferred = client.getFolderContents('path/to space/文件夹');

			expect(fakeServer.requests.length).toEqual(1);

			deferred.done(function(status, response) {
				expect(status).toEqual(207);
				expect(_.isArray(response)).toEqual(true);

				expect(response.length).toEqual(2);

				// file entry
				var info = response[0];
				expect(info instanceof OC.Files.FileInfo).toEqual(true);
				expect(info.id).toEqual(51);
				expect(info.path).toEqual('/path/to space/文件夹');
				expect(info.name).toEqual('One.txt');
				expect(info.permissions).toEqual(31);
				expect(info.size).toEqual(250);
				expect(info.mtime.getTime()).toEqual(1436535485000);
				expect(info.mimeType).toEqual('text/plain');
				expect(info.etag).toEqual('559fcabd79a38');

				// sub entry
				info = response[1];
				expect(info instanceof OC.Files.FileInfo).toEqual(true);
				expect(info.id).toEqual(15);
				expect(info.path).toEqual('/path/to space/文件夹');
				expect(info.name).toEqual('sub');
				expect(info.permissions).toEqual(31);
				expect(info.size).toEqual(100);
				expect(info.mtime.getTime()).toEqual(1436536800000);
				expect(info.mimeType).toEqual('httpd/unix-directory');
				expect(info.etag).toEqual('66cfcabd79abb');

				done();
			});

			fakeServer.requests[0].respond(
				207,
				{'Content-Type': 'application/xml'},
				folderContentsXml
			);
		});
		it('returns parent node in result if specified', function(done) {
			var deferred = client.getFolderContents('path/to space/文件夹', {includeParent: true});

			expect(fakeServer.requests.length).toEqual(1);

			deferred.done(function(status, response) {
				expect(status).toEqual(207);
				expect(_.isArray(response)).toEqual(true);

				expect(response.length).toEqual(3);

				// root entry
				var info = response[0];
				expect(info instanceof OC.Files.FileInfo).toEqual(true);
				expect(info.id).toEqual(11);
				expect(info.path).toEqual('/path/to space');
				expect(info.name).toEqual('文件夹');
				expect(info.permissions).toEqual(31);
				expect(info.size).toEqual(120);
				expect(info.mtime.getTime()).toEqual(1436522405000);
				expect(info.mimeType).toEqual('httpd/unix-directory');
				expect(info.etag).toEqual('56cfcabd79abb');

				// the two other entries follow
				expect(response[1].id).toEqual(51);
				expect(response[2].id).toEqual(15);

				done();
			});

			fakeServer.requests[0].respond(
				207,
				{'Content-Type': 'application/xml'},
				folderContentsXml
			);
		});
		it('rejects deferred when an error occurred', function(done) {
			var deferred = client.getFolderContents('path/to space/文件夹', {includeParent: true});
			respondAndCheckError(deferred, 404, done);
		});
		it('throws exception if arguments are missing', function() {
			// TODO
		});
	});

	describe('file info', function() {
		var responseXml =
			'<?xml version="1.0" encoding="utf-8"?>' +
			'<d:multistatus xmlns:d="DAV:" xmlns:s="http://sabredav.org/ns" xmlns:oc="http://owncloud.org/ns">' +
			makeResponseBlock(
			'/owncloud/remote.php/webdav/path/to%20space/%E6%96%87%E4%BB%B6%E5%A4%B9/',
			{
				'd:getlastmodified': 'Fri, 10 Jul 2015 10:00:05 GMT',
				'd:getetag': '"56cfcabd79abb"',
				'd:resourcetype': '<d:collection/>',
				'oc:id': '00000011oc2d13a6a068',
				'oc:permissions': 'RDNVCK',
				'oc:size': 120
			},
			[
				'd:getcontenttype',
				'd:getcontentlength'
			]
			) +
			'</d:multistatus>';

		it('sends PROPFIND with zero depth to get single file info', function() {
			client.getFileInfo('path/to space/文件夹');

			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].method).toEqual('PROPFIND');
			expect(fakeServer.requests[0].url).toEqual(baseUrl + 'path/to%20space/%E6%96%87%E4%BB%B6%E5%A4%B9');
			expect(fakeServer.requests[0].requestHeaders.Depth).toEqual(0);

			var props = getRequestedProperties(fakeServer.requests[0].requestBody);
			expect(props).toContain('{DAV:}getlastmodified');
			expect(props).toContain('{DAV:}getcontentlength');
			expect(props).toContain('{DAV:}getcontenttype');
			expect(props).toContain('{DAV:}getetag');
			expect(props).toContain('{DAV:}resourcetype');
			expect(props).toContain('{http://owncloud.org/ns}id');
			expect(props).toContain('{http://owncloud.org/ns}size');
			expect(props).toContain('{http://owncloud.org/ns}permissions');
		});
		it('parses the result into a FileInfo', function(done) {
			var deferred = client.getFileInfo('path/to space/文件夹');

			expect(fakeServer.requests.length).toEqual(1);

			deferred.done(function(status, response) {
				console.log('####### FUCKING RESPOSNE', response);
				expect(status).toEqual(207);
				expect(_.isArray(response)).toEqual(false);

				var info = response;
				expect(info instanceof OC.Files.FileInfo).toEqual(true);
				expect(info.id).toEqual(11);
				expect(info.path).toEqual('/path/to space');
				expect(info.name).toEqual('文件夹');
				expect(info.permissions).toEqual(31);
				expect(info.size).toEqual(120);
				expect(info.mtime.getTime()).toEqual(1436522405000);
				expect(info.mimeType).toEqual('httpd/unix-directory');
				expect(info.etag).toEqual('56cfcabd79abb');
				console.log('####### FUCKING RESPOSNE END', response);

				done();
			});

			fakeServer.requests[0].respond(
				207,
				{'Content-Type': 'application/xml'},
				responseXml
			);
		});
		it('properly parses entry inside root', function(done) {
			var responseXml =
				'<?xml version="1.0" encoding="utf-8"?>' +
				'<d:multistatus xmlns:d="DAV:" xmlns:s="http://sabredav.org/ns" xmlns:oc="http://owncloud.org/ns">' +
				makeResponseBlock(
				'/owncloud/remote.php/webdav/in%20root',
				{
					'd:getlastmodified': 'Fri, 10 Jul 2015 10:00:05 GMT',
					'd:getetag': '"56cfcabd79abb"',
					'd:resourcetype': '<d:collection/>',
					'oc:id': '00000011oc2d13a6a068',
					'oc:permissions': 'RDNVCK',
					'oc:size': 120
				},
				[
					'd:getcontenttype',
					'd:getcontentlength'
				]
				) +
				'</d:multistatus>';

			var deferred = client.getFileInfo('in root');

			expect(fakeServer.requests.length).toEqual(1);

			deferred.done(function(status, response) {
				expect(status).toEqual(207);
				expect(_.isArray(response)).toEqual(false);

				var info = response;
				expect(info instanceof OC.Files.FileInfo).toEqual(true);
				expect(info.id).toEqual(11);
				expect(info.path).toEqual('/');
				expect(info.name).toEqual('in root');
				expect(info.permissions).toEqual(31);
				expect(info.size).toEqual(120);
				expect(info.mtime.getTime()).toEqual(1436522405000);
				expect(info.mimeType).toEqual('httpd/unix-directory');
				expect(info.etag).toEqual('56cfcabd79abb');

				done();
			});

			fakeServer.requests[0].respond(
				207,
				{'Content-Type': 'application/xml'},
				responseXml
			);
		});
		it('rejects deferred when an error occurred', function(done) {
			var deferred = client.getFileInfo('path/to space/文件夹');
			respondAndCheckError(deferred, 404, done);
		});
		it('throws exception if arguments are missing', function() {
			// TODO
		});
	});

	describe('permissions', function() {

		function getFileInfoWithPermission(webdavPerm, isFile) {
			var props = {
				'd:getlastmodified': 'Fri, 10 Jul 2015 13:38:05 GMT',
				'd:getetag': '"559fcabd79a38"',
				'd:getcontentlength': 250,
				'oc:id': '00000051oc2d13a6a068',
				'oc:permissions': webdavPerm,
			};

			if (isFile) {
				props['d:getcontenttype'] = 'text/plain';
			} else {
				props['d:resourcetype'] = '<d:collection/>';
			}

			var responseXml =
				'<?xml version="1.0" encoding="utf-8"?>' +
				'<d:multistatus xmlns:d="DAV:" xmlns:s="http://sabredav.org/ns" xmlns:oc="http://owncloud.org/ns">' +
				makeResponseBlock(
					'/owncloud/remote.php/webdav/file.txt',
					props
				) +
				'</d:multistatus>';
			var handler = sinon.stub();
			var deferred = client.getFileInfo('file.txt');

			deferred.done(handler);

			expect(fakeServer.requests.length).toEqual(1);
			fakeServer.requests[0].respond(
				207,
				{'Content-Type': 'application/xml'},
				responseXml
			);

			expect(handler.calledOnce).toEqual(true);

			fakeServer.restore();
			fakeServer = sinon.fakeServer.create();

			return handler.getCall(0).args[1];
		}

		it('properly parses file permissions', function() {
			expect(getFileInfoWithPermission('', true).permissions)
				.toEqual(OC.PERMISSION_READ);
			expect(getFileInfoWithPermission('C', true).permissions)
				.toEqual(OC.PERMISSION_READ | OC.PERMISSION_CREATE);
			expect(getFileInfoWithPermission('K', true).permissions)
				.toEqual(OC.PERMISSION_READ | OC.PERMISSION_CREATE);
			expect(getFileInfoWithPermission('W', true).permissions)
				.toEqual(OC.PERMISSION_READ | OC.PERMISSION_CREATE | OC.PERMISSION_UPDATE);
			expect(getFileInfoWithPermission('D', true).permissions)
				.toEqual(OC.PERMISSION_READ | OC.PERMISSION_DELETE);
			expect(getFileInfoWithPermission('R', true).permissions)
				.toEqual(OC.PERMISSION_READ | OC.PERMISSION_SHARE);
			expect(getFileInfoWithPermission('CKWDR', true).permissions)
				.toEqual(OC.PERMISSION_ALL);
		});
		it('properly parses folder permissions', function() {
			expect(getFileInfoWithPermission('', false).permissions)
				.toEqual(OC.PERMISSION_READ);
			expect(getFileInfoWithPermission('C', false).permissions)
				.toEqual(OC.PERMISSION_READ | OC.PERMISSION_CREATE | OC.PERMISSION_UPDATE);
			expect(getFileInfoWithPermission('K', false).permissions)
				.toEqual(OC.PERMISSION_READ | OC.PERMISSION_CREATE | OC.PERMISSION_UPDATE);
			expect(getFileInfoWithPermission('W', false).permissions)
				.toEqual(OC.PERMISSION_READ | OC.PERMISSION_UPDATE);
			expect(getFileInfoWithPermission('D', false).permissions)
				.toEqual(OC.PERMISSION_READ | OC.PERMISSION_DELETE);
			expect(getFileInfoWithPermission('R', false).permissions)
				.toEqual(OC.PERMISSION_READ | OC.PERMISSION_SHARE);
			expect(getFileInfoWithPermission('CKWDR', false).permissions)
				.toEqual(OC.PERMISSION_ALL);
		});
		it('properly parses mount types', function() {
			expect(getFileInfoWithPermission('CKWDR', false).mountType)
				.toEqual(null);
			expect(getFileInfoWithPermission('M', false).mountType)
				.toEqual('external');
			expect(getFileInfoWithPermission('S', false).mountType)
				.toEqual('shared');
			expect(getFileInfoWithPermission('SM', false).mountType)
				.toEqual('shared');
		});
	});

	describe('get file contents', function() {
		it('returns file contents', function(done) {
			var deferred = client.getFileContents('path/to space/文件夹/One.txt');

			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].method).toEqual('GET');
			expect(fakeServer.requests[0].url).toEqual(baseUrl + 'path/to%20space/%E6%96%87%E4%BB%B6%E5%A4%B9/One.txt');

			deferred.done(function(status, response) {
				expect(status).toEqual(200);
				expect(response).toEqual('some contents');

				done();
			});

			fakeServer.requests[0].respond(
				200,
				{'Content-Type': 'text/plain'},
				'some contents'
			);
		});
		it('rejects deferred when an error occurred', function(done) {
			var deferred = client.getFileContents('path/to space/文件夹/One.txt');
			respondAndCheckError(deferred, 409, done);
		});
		it('throws exception if arguments are missing', function() {
			// TODO
		});
	});

	describe('put file contents', function() {
		it('sends PUT with file contents', function(done) {
			var deferred = client.putFileContents(
					'path/to space/文件夹/One.txt',
					'some contents'
			);

			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].method).toEqual('PUT');
			expect(fakeServer.requests[0].url).toEqual(baseUrl + 'path/to%20space/%E6%96%87%E4%BB%B6%E5%A4%B9/One.txt');
			expect(fakeServer.requests[0].requestBody).toEqual('some contents');
			expect(fakeServer.requests[0].requestHeaders['If-None-Match']).toEqual('*');
			expect(fakeServer.requests[0].requestHeaders['Content-Type']).toEqual('text/plain;charset=utf-8');

			respondAndCheckStatus(deferred, 201, done);
		});
		it('sends PUT with file contents with headers matching options', function(done) {
			var deferred = client.putFileContents(
					'path/to space/文件夹/One.txt',
					'some contents',
					{
						overwrite: false,
						contentType: 'text/markdown'
					}
			);

			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].method).toEqual('PUT');
			expect(fakeServer.requests[0].url).toEqual(baseUrl + 'path/to%20space/%E6%96%87%E4%BB%B6%E5%A4%B9/One.txt');
			expect(fakeServer.requests[0].requestBody).toEqual('some contents');
			expect(fakeServer.requests[0].requestHeaders['If-None-Match']).not.toBeDefined();
			expect(fakeServer.requests[0].requestHeaders['Content-Type']).toEqual('text/markdown;charset=utf-8');

			respondAndCheckStatus(deferred, 201, done);
		});
		it('rejects deferred when an error occurred', function(done) {
			var deferred = client.putFileContents(
					'path/to space/文件夹/One.txt',
					'some contents'
			);
			respondAndCheckError(deferred, 409, done);
		});
		it('throws exception if arguments are missing', function() {
			// TODO
		});
	});

	describe('create directory', function() {
		it('sends MKCOL with specified path', function(done) {
			var deferred = client.createDirectory('path/to space/文件夹/new dir');

			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].method).toEqual('MKCOL');
			expect(fakeServer.requests[0].url).toEqual(baseUrl + 'path/to%20space/%E6%96%87%E4%BB%B6%E5%A4%B9/new%20dir');

			respondAndCheckStatus(deferred, 201, done);
		});
		it('rejects deferred when an error occurred', function(done) {
			var deferred = client.createDirectory('path/to space/文件夹/new dir');
			respondAndCheckError(deferred, 404, done);
		});
		it('throws exception if arguments are missing', function() {
			// TODO
		});
	});

	describe('deletion', function() {
		it('sends DELETE with specified path', function(done) {
			var deferred = client.remove('path/to space/文件夹');

			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].method).toEqual('DELETE');
			expect(fakeServer.requests[0].url).toEqual(baseUrl + 'path/to%20space/%E6%96%87%E4%BB%B6%E5%A4%B9');

			respondAndCheckStatus(deferred, 201, done);
		});
		it('rejects deferred when an error occurred', function(done) {
			var deferred = client.remove('path/to space/文件夹');
			respondAndCheckError(deferred, 404, done);
		});
		it('throws exception if arguments are missing', function() {
			// TODO
		});
	});

	describe('move', function() {
		it('sends MOVE with specified paths with fail on overwrite by default', function(done) {
			var deferred = client.move(
					'path/to space/文件夹',
					'path/to space/anotherdir/文件夹'
			);

			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].method).toEqual('MOVE');
			expect(fakeServer.requests[0].url).toEqual(baseUrl + 'path/to%20space/%E6%96%87%E4%BB%B6%E5%A4%B9');
			expect(fakeServer.requests[0].requestHeaders.Destination)
				.toEqual(baseUrl + 'path/to%20space/anotherdir/%E6%96%87%E4%BB%B6%E5%A4%B9');
			expect(fakeServer.requests[0].requestHeaders.Overwrite)
				.toEqual('F');

			respondAndCheckStatus(deferred, 201, done);
		});
		it('sends MOVE with silent overwrite mode when specified', function(done) {
			var deferred = client.move(
					'path/to space/文件夹',
					'path/to space/anotherdir/文件夹',
					{allowOverwrite: true}
			);

			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].method).toEqual('MOVE');
			expect(fakeServer.requests[0].url).toEqual(baseUrl + 'path/to%20space/%E6%96%87%E4%BB%B6%E5%A4%B9');
			expect(fakeServer.requests[0].requestHeaders.Destination)
				.toEqual(baseUrl + 'path/to%20space/anotherdir/%E6%96%87%E4%BB%B6%E5%A4%B9');
			expect(fakeServer.requests[0].requestHeaders.Overwrite)
				.not.toBeDefined();

			respondAndCheckStatus(deferred, 201, done);
		});
		it('rejects deferred when an error occurred', function(done) {
			var deferred = client.move(
					'path/to space/文件夹',
					'path/to space/anotherdir/文件夹',
					{allowOverwrite: true}
			);
			respondAndCheckError(deferred, 404, done);
		});
		it('throws exception if arguments are missing', function() {
			// TODO
		});
	});
});
