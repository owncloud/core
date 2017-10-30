<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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


namespace OCA\DAV\Tests\unit\Upload;


use OCA\DAV\Upload\ChunkingPlugin;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Test\TestCase;
use OCA\DAV\Upload\FutureFile;
use OCA\DAV\Connector\Sabre\Directory;
use OC\Files\View;
use OCP\Files\NotFoundException;

class ChunkingPluginTest extends TestCase {
	const TEST_CHUNKING_USER1 = "test-chunking-user1";

	/**
	 * @var \Sabre\DAV\Server | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $server;

	/**
	 * @var \Sabre\DAV\Tree | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $tree;

	/**
	 * @var \OC\Files\Node\Folder | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $dir;

	/**
	 * @var ChunkingPlugin
	 */
	private $plugin;
	/** @var RequestInterface | \PHPUnit_Framework_MockObject_MockObject */
	private $request;
	/** @var ResponseInterface | \PHPUnit_Framework_MockObject_MockObject */
	private $response;

	public function setUp() {
		parent::setUp();

		$this->server = $this->getMockBuilder('\Sabre\DAV\Server')
			->disableOriginalConstructor()
			->getMock();
		$this->tree = $this->getMockBuilder('\Sabre\DAV\Tree')
			->disableOriginalConstructor()
			->getMock();

		$this->dir = $this->createMock('\OC\Files\Node\Folder');
		$dir = $this->createMock('\OC\Files\Node\Folder');
		$dir->expects($this->once())
			->method('get')
			->with('files_zsync')
			->will($this->throwException(new NotFoundException));
		$dir->expects($this->once())
			->method('newFolder')
			->with('files_zsync')
			->willReturn($this->dir);

		$this->server->tree = $this->tree;
		$this->plugin = new ChunkingPlugin($dir, self::TEST_CHUNKING_USER1);
		$this->request = $this->createMock(RequestInterface::class);
		$this->response = $this->createMock(ResponseInterface::class);
		$this->server->httpRequest = $this->request;
		$this->server->httpResponse = $this->response;

		$this->plugin->initialize($this->server);
	}

	public function testBeforeMoveFutureFileSkip() {
		$node = $this->createMock(Directory::class);

		$this->tree->expects($this->any())
			->method('getNodeForPath')
			->with('source')
			->will($this->returnValue($node));
		$this->response->expects($this->never())
			->method('setStatus');

		$this->assertNull($this->plugin->beforeMove('source', 'target'));
	}

	public function testBeforeMoveFutureFileSkipNonExisting() {
		$sourceNode = $this->createMock(FutureFile::class);
		$sourceNode->expects($this->once())
			->method('getSize')
			->willReturn(4);

		$this->tree->expects($this->any())
			->method('getNodeForPath')
			->with('source')
			->will($this->returnValue($sourceNode));
		$this->tree->expects($this->exactly(2))
			->method('nodeExists')
			->withConsecutive(['target'], ['source'])
			->willReturnOnConsecutiveCalls($this->returnValue(false), $this->returnValue(false));
		$this->response->expects($this->once())
			->method('setStatus')
			->with(201);
		$this->request->expects($this->once())
			->method('getHeader')
			->with('OC-Total-Length')
			->willReturn(4);

		$this->assertFalse($this->plugin->beforeMove('source', 'target'));
	}

	public function testBeforeMoveFutureFileMoveIt() {
		$sourceNode = $this->createMock(FutureFile::class);
		$targetNode = $this->createMock('\Sabre\DAV\IFile');
		$sourceNode->expects($this->once())
			->method('getSize')
			->willReturn(4);

		$this->tree->expects($this->exactly(2))
			->method('getNodeForPath')
			->withConsecutive(['source'], ['target'])
			->willReturnOnConsecutiveCalls($this->returnValue($sourceNode), $this->returnValue($targetNode));
		$this->tree->expects($this->exactly(2))
			->method('nodeExists')
			->withConsecutive(['target'], ['source'])
			->willReturnOnConsecutiveCalls($this->returnValue(true), $this->returnValue(false));
		$this->tree->expects($this->once())
			->method('move')
			->with('source', 'target');

		$this->response->expects($this->once())
			->method('setHeader')
			->with('Content-Length', '0');
		$this->response->expects($this->once())
			->method('setStatus')
			->with(204);
		$this->request->expects($this->exactly(2))
			->method('getHeader')
			->withConsecutive(['OC-Total-Length'], ['OC-Total-File-Length'])
			->willReturn(4);

		$this->assertFalse($this->plugin->beforeMove('source', 'target'));
	}

	public function testBeforeMoveFutureFileMoveItWithZsync() {
		$sourceNode = $this->createMock(FutureFile::class);
		$targetNode = $this->createMock(\Sabre\DAV\IFile::class);
		$file = $this->createMock('\OC\Files\Node\File');
		$dir = $this->createMock('\OC\Files\Node\Folder');

		$stream = fopen('php://memory', 'w+');
		fwrite($stream, 'bar');
		rewind($stream);

		$target = 'files/'.self::TEST_CHUNKING_USER1.'/target';

		$targetNode->expects($this->once())
			->method('get')
			->willReturn($stream);

		$targetNode->expects($this->any())
			->method('getSize')
			->willReturn(3);

		$sourceNode->expects($this->once())
			->method('getSize')
			->willReturn(4);

		$this->tree->expects($this->exactly(3))
			->method('getNodeForPath')
			->withConsecutive(['source/.file'],
			                  [$target],
			                  ['source/.zsync'])
			->willReturnOnConsecutiveCalls($this->returnValue($sourceNode),
			                               $this->returnValue($targetNode),
			                               $this->returnValue($targetNode));
		$this->tree->expects($this->exactly(2))
			->method('nodeExists')
			->withConsecutive([$target], ['source/.zsync'])
			->willReturnOnConsecutiveCalls($this->returnValue(true), $this->returnValue(true));
		$this->tree->expects($this->once())
			->method('move')
			->with('source/.file', $target);

		$this->dir->expects($this->once())
			->method('get')
			->with('.')
			->will($this->throwException(new NotFoundException));
		$this->dir->expects($this->once())
			->method('newFolder')
			->with('.')
			->willReturn($dir);

		$dir->expects($this->once())
			->method('newFile')
			->with('target.zsync')
			->willReturn($file);

		$file->expects($this->once())
			->method('putContent')
			->with('bar')
			->willReturn(true);

		$this->response->expects($this->once())
			->method('setHeader')
			->with('Content-Length', '0');
		$this->response->expects($this->once())
			->method('setStatus')
			->with(204);
		$this->request->expects($this->exactly(2))
			->method('getHeader')
			->withConsecutive(['OC-Total-Length'], ['OC-Total-File-Length'])
			->willReturn(4);

		$this->assertFalse($this->plugin->beforeMove('source/.file', $target));
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\BadRequest
	 * @expectedExceptionMessage Chunks on server do not sum up to 4 but to 3
	 */
	public function testBeforeMoveSizeIsWrong() {
		$sourceNode = $this->createMock(FutureFile::class);
		$sourceNode->expects($this->once())
			->method('getSize')
			->willReturn(3);

		$this->tree->expects($this->any())
			->method('getNodeForPath')
			->with('source')
			->will($this->returnValue($sourceNode));
		$this->request->expects($this->once())
			->method('getHeader')
			->with('OC-Total-Length')
			->willReturn('4');

		$this->assertFalse($this->plugin->beforeMove('source', 'target'));
	}

	public function testBeforeMoveSizeIsNull() {
		$sourceNode = $this->createMock(FutureFile::class);
		$this->tree->expects($this->any())
			->method('getNodeForPath')
			->with('source')
			->will($this->returnValue($sourceNode));
		$this->request->expects($this->once())
			->method('getHeader')
			->with('OC-Total-Length')
			->willReturn(null);

		$this->assertFalse($this->plugin->beforeMove('source', 'target'));
	}

}
