<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Robin Appelman <icewind@owncloud.com>
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

use OCA\DAV\Connector\Sabre\Directory;
use OCA\DAV\Connector\Sabre\File;
use OCA\DAV\Connector\Sabre\QuotaPlugin;
use OCA\DAV\Upload\FutureFile;
use Sabre\DAV\Tree;
use Test\TestCase;

/**
 * Copyright (c) 2013 Thomas Müller <thomas.mueller@tmit.eu>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
class QuotaPluginTest extends TestCase {

	/** @var \Sabre\DAV\Server | \PHPUnit\Framework\MockObject\MockObject */
	private $server;

	/** @var \OCA\DAV\Connector\Sabre\QuotaPlugin | \PHPUnit\Framework\MockObject\MockObject */
	private $plugin;

	private function init($quota, $checkedPath = '') {
		$view = $this->buildFileViewMock($quota, $checkedPath);
		$this->server = new \Sabre\DAV\Server();
		$this->plugin = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\QuotaPlugin')
			->setConstructorArgs([$view])
			->setMethods(['getFileChunking'])
			->getMock();
		$this->plugin->initialize($this->server);
	}

	/**
	 * @dataProvider lengthProvider
	 */
	public function testLength($expected, $headers) {
		$this->init(0);
		$this->plugin->expects($this->never())
			->method('getFileChunking');
		$this->server->httpRequest = new \Sabre\HTTP\Request(null, null, $headers);
		$length = $this->plugin->getLength();
		$this->assertEquals($expected, $length);
	}

	/**
	 * @dataProvider quotaOkayProvider
	 */
	public function testCheckQuota($quota, $headers) {
		$this->init($quota);
		$this->plugin->expects($this->never())
			->method('getFileChunking');

		$this->server->httpRequest = new \Sabre\HTTP\Request(null, null, $headers);
		$result = $this->plugin->checkQuota('');
		$this->assertTrue($result);
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\InsufficientStorage
	 * @dataProvider quotaExceededProvider
	 */
	public function testCheckExceededQuota($quota, $headers) {
		$this->init($quota);
		$this->plugin->expects($this->never())
			->method('getFileChunking');

		$this->server->httpRequest = new \Sabre\HTTP\Request(null, null, $headers);
		$this->plugin->checkQuota('');
	}

	/**
	 * @dataProvider quotaOkayProvider
	 */
	public function testCheckQuotaOnPath($quota, $headers) {
		$this->init($quota, 'sub/test.txt');
		$this->plugin->expects($this->never())
			->method('getFileChunking');

		$this->server->httpRequest = new \Sabre\HTTP\Request(null, null, $headers);
		$result = $this->plugin->checkQuota('/sub/test.txt');
		$this->assertTrue($result);
	}

	public function quotaOkayProvider() {
		return [
			[1024, []],
			[1024, ['X-EXPECTED-ENTITY-LENGTH' => '1024']],
			[1024, ['CONTENT-LENGTH' => '512']],
			[1024, ['OC-TOTAL-LENGTH' => '1024', 'CONTENT-LENGTH' => '512']],
			// \OCP\Files\FileInfo::SPACE-UNKNOWN = -2
			[-2, []],
			[-2, ['X-EXPECTED-ENTITY-LENGTH' => '1024']],
			[-2, ['CONTENT-LENGTH' => '512']],
			[-2, ['OC-TOTAL-LENGTH' => '1024', 'CONTENT-LENGTH' => '512']],
			// \OCP\Files\FileInfo::SPACE-UNLIMITED = -3
			[-3, []],
			[-3, ['X-EXPECTED-ENTITY-LENGTH' => '1024']],
			[-3, ['CONTENT-LENGTH' => '512']],
			[-3, ['OC-TOTAL-LENGTH' => '1024', 'CONTENT-LENGTH' => '512']],
		];
	}

	public function quotaExceededProvider() {
		return [
			[1023, ['X-EXPECTED-ENTITY-LENGTH' => '1024']],
			[511, ['CONTENT-LENGTH' => '512']],
			[2047, ['OC-TOTAL-LENGTH' => '2048', 'CONTENT-LENGTH' => '1024']],
		];
	}

	public function lengthProvider() {
		return [
			[null, []],
			[1024, ['X-EXPECTED-ENTITY-LENGTH' => '1024']],
			[512, ['CONTENT-LENGTH' => '512']],
			[2048, ['OC-TOTAL-LENGTH' => '2048', 'CONTENT-LENGTH' => '1024']],
			[4096, ['OC-TOTAL-LENGTH' => '2048', 'X-EXPECTED-ENTITY-LENGTH' => '4096']],
			[null, ['X-EXPECTED-ENTITY-LENGTH' => 'A']],
			[null, ['CONTENT-LENGTH' => 'A']],
			[1024, ['OC-TOTAL-LENGTH' => 'A', 'CONTENT-LENGTH' => '1024']],
			[1024, ['OC-TOTAL-LENGTH' => 'A', 'X-EXPECTED-ENTITY-LENGTH' => '1024']],
			[null, ['OC-TOTAL-LENGTH' => '2048', 'X-EXPECTED-ENTITY-LENGTH' => 'A']],
			[null, ['OC-TOTAL-LENGTH' => '2048', 'CONTENT-LENGTH' => 'A']],
		];
	}

	public function quotaChunkedOkProvider() {
		return [
			[1024, 0, ['X-EXPECTED-ENTITY-LENGTH' => '1024']],
			[1024, 0, ['CONTENT-LENGTH' => '512']],
			[1024, 0, ['OC-TOTAL-LENGTH' => '1024', 'CONTENT-LENGTH' => '512']],
			// with existing chunks (allowed size = total length - chunk total size)
			[400, 128, ['X-EXPECTED-ENTITY-LENGTH' => '512']],
			[400, 128, ['CONTENT-LENGTH' => '512']],
			[400, 128, ['OC-TOTAL-LENGTH' => '512', 'CONTENT-LENGTH' => '500']],
			// \OCP\Files\FileInfo::SPACE-UNKNOWN = -2
			[-2, 0, ['X-EXPECTED-ENTITY-LENGTH' => '1024']],
			[-2, 0, ['CONTENT-LENGTH' => '512']],
			[-2, 0, ['OC-TOTAL-LENGTH' => '1024', 'CONTENT-LENGTH' => '512']],
			[-2, 128, ['X-EXPECTED-ENTITY-LENGTH' => '1024']],
			[-2, 128, ['CONTENT-LENGTH' => '512']],
			[-2, 128, ['OC-TOTAL-LENGTH' => '1024', 'CONTENT-LENGTH' => '512']],
			// \OCP\Files\FileInfo::SPACE-UNLIMITED = -3
			[-3, 0, ['X-EXPECTED-ENTITY-LENGTH' => '1024']],
			[-3, 0, ['CONTENT-LENGTH' => '512']],
			[-3, 0, ['OC-TOTAL-LENGTH' => '1024', 'CONTENT-LENGTH' => '512']],
			[-3, 128, ['X-EXPECTED-ENTITY-LENGTH' => '1024']],
			[-3, 128, ['CONTENT-LENGTH' => '512']],
			[-3, 128, ['OC-TOTAL-LENGTH' => '1024', 'CONTENT-LENGTH' => '512']],
		];
	}

	/**
	 * @dataProvider quotaChunkedOkProvider
	 */
	public function testCheckQuotaChunkedOk($quota, $chunkTotalSize, $headers) {
		$this->init($quota, 'sub/test.txt');

		$mockChunking = $this->getMockBuilder('\OC_FileChunking')
			->disableOriginalConstructor()
			->getMock();
		$mockChunking->expects($this->once())
			->method('getCurrentSize')
			->will($this->returnValue($chunkTotalSize));

		$this->plugin->expects($this->once())
			->method('getFileChunking')
			->will($this->returnValue($mockChunking));

		$headers['OC-CHUNKED'] = 1;
		$this->server->httpRequest = new \Sabre\HTTP\Request(null, null, $headers);
		$result = $this->plugin->checkQuota('/sub/test.txt-chunking-12345-3-1');
		$this->assertTrue($result);
	}

	public function quotaChunkedFailProvider() {
		return [
			[400, 0, ['X-EXPECTED-ENTITY-LENGTH' => '1024']],
			[400, 0, ['CONTENT-LENGTH' => '512']],
			[400, 0, ['OC-TOTAL-LENGTH' => '1024', 'CONTENT-LENGTH' => '512']],
			// with existing chunks (allowed size = total length - chunk total size)
			[380, 128, ['X-EXPECTED-ENTITY-LENGTH' => '512']],
			[380, 128, ['CONTENT-LENGTH' => '512']],
			[380, 128, ['OC-TOTAL-LENGTH' => '512', 'CONTENT-LENGTH' => '500']],
		];
	}

	/**
	 * @dataProvider quotaChunkedFailProvider
	 * @expectedException \Sabre\DAV\Exception\InsufficientStorage
	 */
	public function testCheckQuotaChunkedFail($quota, $chunkTotalSize, $headers) {
		$this->init($quota, 'sub/test.txt');

		$mockChunking = $this->getMockBuilder('\OC_FileChunking')
			->disableOriginalConstructor()
			->getMock();
		$mockChunking->expects($this->once())
			->method('getCurrentSize')
			->will($this->returnValue($chunkTotalSize));

		$this->plugin->expects($this->once())
			->method('getFileChunking')
			->will($this->returnValue($mockChunking));

		$headers['OC-CHUNKED'] = 1;
		$this->server->httpRequest = new \Sabre\HTTP\Request(null, null, $headers);
		$this->plugin->checkQuota('/sub/test.txt-chunking-12345-3-1');
	}

	private function buildFileViewMock($quota, $checkedPath) {
		// mock file systen
		$view = $this->getMockBuilder('\OC\Files\View')
			->setMethods(['free_space'])
			->setConstructorArgs([])
			->getMock();
		$view->expects($this->any())
			->method('free_space')
			->with($this->identicalTo($checkedPath))
			->will($this->returnValue($quota));

		return $view;
	}

	public function pathDataProvider() {
		$node = $this->createMock(File::class);
		$node->method('getPath')->willReturn('/test/sub/test.txt');

		$parentNode = $this->createMock(Directory::class);
		$parentNode->method('getPath')->willReturn('/test/sub');

		return [
			['beforeWriteContent', ['/files/user0/test/sub/test.txt', $node, null, false], '/test/sub/test.txt'],
			['beforeCreateFile', ['/files/user0/test/sub/test.txt', null, $parentNode, false], '/test/sub/test.txt'],
		];
	}

	/**
	 * @dataProvider pathDataProvider
	 */
	public function testPath($event, $eventArgs, $expectedPath) {
		$plugin = $this->getMockBuilder(QuotaPlugin::class)
			->setConstructorArgs([null])
			->setMethods(['getFileChunking', 'checkQuota'])
			->getMock();

		$server = new \Sabre\DAV\Server();
		$plugin->initialize($server);

		$plugin->expects($this->once())
			->method('checkQuota')
			->with($expectedPath);

		$server->emit($event, $eventArgs);
	}

	public function testPathBeforeModeTargetExists() {
		$plugin = $this->getMockBuilder(QuotaPlugin::class)
			->setConstructorArgs([null])
			->setMethods(['getFileChunking', 'checkQuota'])
			->getMock();

		$server = new \Sabre\DAV\Server();
		$server->tree = $this->createMock(Tree::class);

		$source = '/uploads/chunking-1/.file';
		$destination = '/files/user0/test/sub/test.txt';

		$sourceNode = $this->createMock(FutureFile::class);
		$sourceNode->method('getSize')->willReturn(12345);

		$destinationNode = $this->createMock(File::class);
		$destinationNode->method('getPath')->willReturn('/test/sub/test.txt');

		$server->tree->method('nodeExists')
			->with($destination)
			->willReturn(true);
		$server->tree->method('getNodeForPath')
			->will($this->returnValueMap([
				[$source, $sourceNode],
				[$destination, $destinationNode],
			]));

		$plugin->initialize($server);
		$plugin->expects($this->once())
			->method('checkQuota')
			->with('/test/sub/test.txt', 12345);

		$server->emit('beforeMove', [$source, $destination]);
	}

	public function testPathBeforeModeTargetDoesNotExists() {
		$plugin = $this->getMockBuilder(QuotaPlugin::class)
			->setConstructorArgs([null])
			->setMethods(['getFileChunking', 'checkQuota'])
			->getMock();

		$server = new \Sabre\DAV\Server();
		$server->tree = $this->createMock(Tree::class);

		$source = '/uploads/chunking-1/.file';
		$destination = '/files/user0/test/sub/test.txt';

		$sourceNode = $this->createMock(FutureFile::class);
		$sourceNode->method('getSize')->willReturn(12345);

		$parentDestinationNode = $this->createMock(Directory::class);
		$parentDestinationNode->method('getPath')->willReturn('/test/sub');

		$server->tree->method('nodeExists')
			->with($destination)
			->willReturn(false);
		$server->tree->method('getNodeForPath')
			->will($this->returnValueMap([
				[$source, $sourceNode],
				['/files/user0/test/sub', $parentDestinationNode],
			]));

		$plugin->initialize($server);
		$plugin->expects($this->once())
			->method('checkQuota')
			->with('/test/sub', 12345);

		$server->emit('beforeMove', [$source, $destination]);
	}
}
