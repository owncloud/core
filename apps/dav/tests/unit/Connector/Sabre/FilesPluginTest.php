<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Markus Goetz <markus@woboq.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Stefan Weil <sw@weilnetz.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace OCA\DAV\Tests\unit\Connector\Sabre;

use OC\User\User;
use OCA\DAV\Connector\Sabre\Directory;
use OCA\DAV\Connector\Sabre\File;
use OCA\DAV\Connector\Sabre\FilesPlugin;
use OCA\DAV\Connector\Sabre\Node;
use OCA\DAV\Meta\MetaFile;
use OCP\Files\FileInfo;
use OCP\Files\StorageNotAvailableException;
use OCP\IConfig;
use OCP\IRequest;
use Sabre\DAV\PropFind;
use Sabre\DAV\PropPatch;
use Sabre\DAV\Server;
use Sabre\DAV\Tree;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Test\TestCase;

/**
 * Copyright (c) 2015 Vincent Petry <pvince81@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
class FilesPluginTest extends TestCase {
	const GETETAG_PROPERTYNAME = FilesPlugin::GETETAG_PROPERTYNAME;
	const FILEID_PROPERTYNAME = FilesPlugin::FILEID_PROPERTYNAME;
	const INTERNAL_FILEID_PROPERTYNAME = FilesPlugin::INTERNAL_FILEID_PROPERTYNAME;
	const SIZE_PROPERTYNAME = FilesPlugin::SIZE_PROPERTYNAME;
	const PERMISSIONS_PROPERTYNAME = FilesPlugin::PERMISSIONS_PROPERTYNAME;
	const SHARE_PERMISSIONS_PROPERTYNAME = '{http://open-collaboration-services.org/ns}share-permissions';
	const LASTMODIFIED_PROPERTYNAME = FilesPlugin::LASTMODIFIED_PROPERTYNAME;
	const DOWNLOADURL_PROPERTYNAME = FilesPlugin::DOWNLOADURL_PROPERTYNAME;
	const OWNER_ID_PROPERTYNAME = FilesPlugin::OWNER_ID_PROPERTYNAME;
	const OWNER_DISPLAY_NAME_PROPERTYNAME = FilesPlugin::OWNER_DISPLAY_NAME_PROPERTYNAME;
	const DATA_FINGERPRINT_PROPERTYNAME = FilesPlugin::DATA_FINGERPRINT_PROPERTYNAME;

	/**
	 * @var Server | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $server;

	/**
	 * @var Tree | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $tree;

	/**
	 * @var FilesPlugin
	 */
	private $plugin;

	/**
	 * @var IConfig | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $config;

	/**
	 * @var IRequest | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $request;

	public function setUp() {
		parent::setUp();
		$this->server = $this->getMockBuilder(Server::class)
			->disableOriginalConstructor()
			->getMock();
		$this->tree = $this->getMockBuilder(Tree::class)
			->disableOriginalConstructor()
			->getMock();
		$this->config = $this->createMock(IConfig::class);
		$this->config->method('getSystemValue')
			->with($this->equalTo('data-fingerprint'), $this->equalTo(''))
			->willReturn('my_fingerprint');
		$this->request = $this->createMock(IRequest::class);

		$this->plugin = new FilesPlugin(
			$this->tree,
			$this->config,
			$this->request
		);

		$response = $this->getMockBuilder(ResponseInterface::class)
				->disableOriginalConstructor()
				->getMock();
		$request = $this->createMock(RequestInterface::class);
		$this->server->httpResponse = $response;
		$this->server->httpRequest = $request;

		$this->plugin->initialize($this->server);
	}

	/**
	 * @param string $class
	 * @param string $path
	 * @return \PHPUnit_Framework_MockObject_MockObject
	 */
	private function createTestNode($class, $path = '/dummypath') {
		$node = $this->getMockBuilder($class)
			->disableOriginalConstructor()
			->getMock();

		$node
			->method('getId')
			->willReturn(123);

		$this->tree
			->method('getNodeForPath')
			->with($path)
			->willReturn($node);

		$node
			->method('getFileId')
			->willReturn('00000123instanceid');
		$node
			->method('getInternalFileId')
			->willReturn('123');
		$node
			->method('getEtag')
			->willReturn('"abc"');
		$node
			->method('getDavPermissions')
			->willReturn('DWCKMSR');

		$fileInfo = $this->createMock(FileInfo::class);
		$fileInfo
			->method('isReadable')
			->willReturn(true);

		$node
			->method('getFileInfo')
			->willReturn($fileInfo);

		return $node;
	}

	public function testGetPropertiesForFile() {
		/** @var File | \PHPUnit_Framework_MockObject_MockObject $node */
		$node = $this->createTestNode(File::class);

		$propFind = new PropFind(
			'/dummyPath',
			[
				self::GETETAG_PROPERTYNAME,
				self::FILEID_PROPERTYNAME,
				self::INTERNAL_FILEID_PROPERTYNAME,
				self::SIZE_PROPERTYNAME,
				self::PERMISSIONS_PROPERTYNAME,
				self::SHARE_PERMISSIONS_PROPERTYNAME,
				self::DOWNLOADURL_PROPERTYNAME,
				self::OWNER_ID_PROPERTYNAME,
				self::OWNER_DISPLAY_NAME_PROPERTYNAME,
				self::DATA_FINGERPRINT_PROPERTYNAME,
			],
			0
		);

		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('foo');
		$user
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('M. Foo');

		$node->expects($this->once())
			->method('getDirectDownload')
			->willReturn(['url' => 'http://example.com/']);
		$node->expects($this->exactly(2))
			->method('getOwner')
			->willReturn($user);
		$node->method('getSharePermissions')
			->willReturn(666);

		$this->plugin->handleGetProperties(
			$propFind,
			$node
		);

		$this->assertEquals('"abc"', $propFind->get(self::GETETAG_PROPERTYNAME));
		$this->assertEquals('00000123instanceid', $propFind->get(self::FILEID_PROPERTYNAME));
		$this->assertEquals('123', $propFind->get(self::INTERNAL_FILEID_PROPERTYNAME));
		$this->assertNull($propFind->get(self::SIZE_PROPERTYNAME));
		$this->assertEquals('DWCKMSR', $propFind->get(self::PERMISSIONS_PROPERTYNAME));
		$this->assertEquals(666, $propFind->get(self::SHARE_PERMISSIONS_PROPERTYNAME));
		$this->assertEquals('http://example.com/', $propFind->get(self::DOWNLOADURL_PROPERTYNAME));
		$this->assertEquals('foo', $propFind->get(self::OWNER_ID_PROPERTYNAME));
		$this->assertEquals('M. Foo', $propFind->get(self::OWNER_DISPLAY_NAME_PROPERTYNAME));
		$this->assertEquals('my_fingerprint', $propFind->get(self::DATA_FINGERPRINT_PROPERTYNAME));
		$this->assertEquals([self::SIZE_PROPERTYNAME], $propFind->get404Properties());
	}

	public function testGetPropertiesStorageNotAvailable() {
		/** @var File | \PHPUnit_Framework_MockObject_MockObject $node */
		$node = $this->createTestNode(File::class);

		$propFind = new PropFind(
			'/dummyPath',
			[
				self::DOWNLOADURL_PROPERTYNAME,
			],
			0
		);

		$node->expects($this->once())
			->method('getDirectDownload')
			->will($this->throwException(new StorageNotAvailableException()));

		$this->plugin->handleGetProperties(
			$propFind,
			$node
		);

		$this->assertFalse($propFind->get(self::DOWNLOADURL_PROPERTYNAME));
	}

	public function testGetPublicPermissions() {
		$this->plugin = new FilesPlugin(
			$this->tree,
			$this->config,
			$this->request,
			true);
		$this->plugin->initialize($this->server);

		$propFind = new PropFind(
			'/dummyPath',
			[
				self::PERMISSIONS_PROPERTYNAME,
			],
			0
		);

		/** @var File | \PHPUnit_Framework_MockObject_MockObject $node */
		$node = $this->createTestNode(File::class);
		$node
			->method('getDavPermissions')
			->willReturn('DWCKMSR');

		$this->plugin->handleGetProperties(
			$propFind,
			$node
		);

		$this->assertEquals('DWCKR', $propFind->get(self::PERMISSIONS_PROPERTYNAME));
	}

	public function testGetPropertiesForDirectory() {
		/** @var Directory | \PHPUnit_Framework_MockObject_MockObject $node */
		$node = $this->createTestNode(Directory::class);

		$propFind = new PropFind(
			'/dummyPath',
			[
				self::GETETAG_PROPERTYNAME,
				self::FILEID_PROPERTYNAME,
				self::SIZE_PROPERTYNAME,
				self::PERMISSIONS_PROPERTYNAME,
				self::DOWNLOADURL_PROPERTYNAME,
				self::DATA_FINGERPRINT_PROPERTYNAME,
			],
			0
		);

		$node->expects($this->once())
			->method('getSize')
			->willReturn(1025);

		$this->plugin->handleGetProperties(
			$propFind,
			$node
		);

		$this->assertEquals('"abc"', $propFind->get(self::GETETAG_PROPERTYNAME));
		$this->assertEquals('00000123instanceid', $propFind->get(self::FILEID_PROPERTYNAME));
		$this->assertEquals(1025, $propFind->get(self::SIZE_PROPERTYNAME));
		$this->assertEquals('DWCKMSR', $propFind->get(self::PERMISSIONS_PROPERTYNAME));
		$this->assertNull($propFind->get(self::DOWNLOADURL_PROPERTYNAME));
		$this->assertEquals('my_fingerprint', $propFind->get(self::DATA_FINGERPRINT_PROPERTYNAME));
		$this->assertEquals([self::DOWNLOADURL_PROPERTYNAME], $propFind->get404Properties());
	}

	public function testGetPropertiesForRootDirectory() {
		/** @var Directory | \PHPUnit_Framework_MockObject_MockObject $node */
		$node = $this->getMockBuilder(Directory::class)
			->disableOriginalConstructor()
			->getMock();
		$node->method('getPath')->willReturn('/');

		$fileInfo = $this->createMock(FileInfo::class);
		$fileInfo
			->method('isReadable')
			->willReturn(true);

		$node
			->method('getFileInfo')
			->willReturn($fileInfo);

		$propFind = new PropFind(
			'/',
			[
				self::DATA_FINGERPRINT_PROPERTYNAME,
			],
			0
		);

		$this->plugin->handleGetProperties(
			$propFind,
			$node
		);

		$this->assertEquals('my_fingerprint', $propFind->get(self::DATA_FINGERPRINT_PROPERTYNAME));
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\NotFound
	 */
	public function testGetPropertiesWhenNoPermission() {
		/** @var Directory | \PHPUnit_Framework_MockObject_MockObject $node */
		$node = $this->getMockBuilder(Directory::class)
			->disableOriginalConstructor()
			->getMock();
		$node->method('getPath')->willReturn('/');

		$fileInfo = $this->createMock(FileInfo::class);
		$fileInfo
			->method('isReadable')
			->willReturn(false);

		$node
			->method('getFileInfo')
			->willReturn($fileInfo);

		$propFind = new PropFind(
			'/test',
			[
				self::DATA_FINGERPRINT_PROPERTYNAME,
			],
			0
		);

		$this->plugin->handleGetProperties(
			$propFind,
			$node
		);
	}

	public function testUpdateProps() {
		$node = $this->createTestNode(File::class);

		$testDate = 'Fri, 13 Feb 2015 00:01:02 GMT';

		$node->expects($this->once())
			->method('touch')
			->with($testDate);

		$node->expects($this->once())
			->method('setEtag')
			->with('newetag')
			->willReturn(true);

		// properties to set
		$propPatch = new PropPatch([
			self::GETETAG_PROPERTYNAME => 'newetag',
			self::LASTMODIFIED_PROPERTYNAME => $testDate
		]);

		$this->plugin->handleUpdateProperties(
			'/dummypath',
			$propPatch
		);

		$propPatch->commit();

		$this->assertEmpty($propPatch->getRemainingMutations());

		$result = $propPatch->getResult();
		$this->assertEquals(200, $result[self::LASTMODIFIED_PROPERTYNAME]);
		$this->assertEquals(200, $result[self::GETETAG_PROPERTYNAME]);
	}

	public function testUpdatePropsForbidden() {
		$propPatch = new PropPatch([
			self::OWNER_ID_PROPERTYNAME => 'user2',
			self::OWNER_DISPLAY_NAME_PROPERTYNAME => 'User Two',
			self::FILEID_PROPERTYNAME => 12345,
			self::PERMISSIONS_PROPERTYNAME => 'C',
			self::SIZE_PROPERTYNAME => 123,
			self::DOWNLOADURL_PROPERTYNAME => 'http://example.com/',
		]);

		$this->plugin->handleUpdateProperties(
			'/dummypath',
			$propPatch
		);

		$propPatch->commit();

		$this->assertEmpty($propPatch->getRemainingMutations());

		$result = $propPatch->getResult();
		$this->assertEquals(403, $result[self::OWNER_ID_PROPERTYNAME]);
		$this->assertEquals(403, $result[self::OWNER_DISPLAY_NAME_PROPERTYNAME]);
		$this->assertEquals(403, $result[self::FILEID_PROPERTYNAME]);
		$this->assertEquals(403, $result[self::PERMISSIONS_PROPERTYNAME]);
		$this->assertEquals(403, $result[self::SIZE_PROPERTYNAME]);
		$this->assertEquals(403, $result[self::DOWNLOADURL_PROPERTYNAME]);
	}

	/**
	 * Testcase from https://github.com/owncloud/core/issues/5251
	 *
	 * |-FolderA
	 *  |-text.txt
	 * |-test.txt
	 *
	 * FolderA is an incoming shared folder and there are no delete permissions.
	 * Thus moving /FolderA/test.txt to /test.txt should fail already on that check
	 *
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 * @expectedExceptionMessage FolderA/test.txt cannot be deleted
	 */
	public function testMoveSrcNotDeletable() {
		$fileInfoFolderATestTXT = $this->getMockBuilder(FileInfo::class)
			->disableOriginalConstructor()
			->getMock();
		$fileInfoFolderATestTXT->expects($this->once())
			->method('isDeletable')
			->willReturn(false);

		$node = $this->createMock(Node::class);
		$node->expects($this->once())
			->method('getFileInfo')
			->willReturn($fileInfoFolderATestTXT);

		$this->tree->expects($this->once())->method('getNodeForPath')
			->willReturn($node);

		$this->plugin->checkMove('FolderA/test.txt', 'test.txt');
	}

	public function testMoveSrcDeletable() {
		$fileInfoFolderATestTXT = $this->getMockBuilder(FileInfo::class)
			->disableOriginalConstructor()
			->getMock();
		$fileInfoFolderATestTXT->expects($this->once())
			->method('isDeletable')
			->willReturn(true);

		$node = $this->createMock(Node::class);
		$node->expects($this->once())
			->method('getFileInfo')
			->willReturn($fileInfoFolderATestTXT);

		$this->tree->expects($this->once())->method('getNodeForPath')
			->willReturn($node);

		$this->plugin->checkMove('FolderA/test.txt', 'test.txt');
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\NotFound
	 * @expectedExceptionMessage FolderA/test.txt does not exist
	 */
	public function testMoveSrcNotExist() {
		$node = $this->createMock(Node::class);
		$node->expects($this->once())
			->method('getFileInfo')
			->willReturn(null);

		$this->tree->expects($this->once())->method('getNodeForPath')
			->willReturn($node);

		$this->plugin->checkMove('FolderA/test.txt', 'test.txt');
	}

	public function downloadHeadersProvider() {
		return [
			[
				false,
				'attachment; filename*=UTF-8\'\'somefile.xml; filename="somefile.xml"'
			],
			[
				true,
				'attachment; filename="somefile.xml"'
			],
		];
	}

	/**
	 * @dataProvider downloadHeadersProvider
	 * @param boolean $isClumsyAgent
	 * @param string $contentDispositionHeader
	 */
	public function testDownloadHeaders($isClumsyAgent, $contentDispositionHeader) {
		/** @var RequestInterface | \PHPUnit_Framework_MockObject_MockObject $request */
		$request = $this->getMockBuilder(RequestInterface::class)
			->disableOriginalConstructor()
			->getMock();
		/** @var ResponseInterface | \PHPUnit_Framework_MockObject_MockObject $response */
		$response = $this->getMockBuilder(ResponseInterface::class)
			->disableOriginalConstructor()
			->getMock();

		$request
			->expects($this->once())
			->method('getPath')
			->willReturn('test/somefile.xml');

		$node = $this->getMockBuilder(File::class)
			->disableOriginalConstructor()
			->getMock();
		$node
			->expects($this->once())
			->method('getName')
			->willReturn('somefile.xml');

		$node->expects($this->once())
			->method('getChecksum')
			->with('sha1')
			->willReturn('abcdefghijkl');

		$this->tree
			->expects($this->once())
			->method('getNodeForPath')
			->with('test/somefile.xml')
			->willReturn($node);

		$this->request
			->expects($this->once())
			->method('isUserAgent')
			->willReturn($isClumsyAgent);

		$response
			->expects($this->exactly(2))
			->method('addHeader')
			->withConsecutive(
				['OC-Checksum', 'abcdefghijkl'],
				['X-Accel-Buffering', 'no']
			);

		$response
			->expects($this->once())
			->method('setHeader')
			->with('Content-Disposition', $contentDispositionHeader);

		$this->plugin->httpGet($request, $response);
	}

	public function testAdditionalHeaders() {
		/** @var RequestInterface | \PHPUnit_Framework_MockObject_MockObject $request */
		$request = $this->getMockBuilder(RequestInterface::class)
			->disableOriginalConstructor()
			->getMock();
		/** @var ResponseInterface | \PHPUnit_Framework_MockObject_MockObject $response */
		$response = $this->getMockBuilder(ResponseInterface::class)
			->disableOriginalConstructor()
			->getMock();

		$request
			->expects($this->once())
			->method('getPath')
			->willReturn('test/somefile.xml');

		$node = $this->getMockBuilder(MetaFile::class)
			->disableOriginalConstructor()
			->getMock();
		$node
			->expects($this->once())
			->method('getName')
			->willReturn('somefile.xml');

		$this->tree
			->expects($this->once())
			->method('getNodeForPath')
			->with('test/somefile.xml')
			->willReturn($node);

		$node
			->expects($this->once())
			->method('getHeaders')
			->willReturn([
				'a' => 'b'
			]);

		$response
			->expects($this->once())
			->method('addHeaders')
			->with(
				['a' => 'b']
			);

		$this->plugin->httpGet($request, $response);
	}
}
