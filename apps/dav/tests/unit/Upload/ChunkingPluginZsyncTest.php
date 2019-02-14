<?php
/*
 * Copyright (C) by Ahmed Ammar <ahmed.a.ammar@gmail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
 * Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
 * OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 */
namespace OCA\DAV\Tests\unit\Upload;

use OCA\DAV\Upload\ChunkingPluginZsync;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Test\TestCase;
use OCA\DAV\Upload\FutureFileZsync;
use OCA\DAV\Connector\Sabre\Directory;
use OC\Files\View;
use Sabre\DAV\Exception\NotFound;

class ChunkingPluginZsyncTest extends TestCase {
	const TEST_CHUNKING_USER1 = "test-chunking-user1";

	/**
	 * @var \Sabre\DAV\Server | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $server;

	/**
	 * @var \Sabre\DAV\Tree | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $tree;

	/**
	 * @var OC\Files\View | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $view;

	/**
	 * @var ChunkingPluginZsync
	 */
	private $plugin;
	/** @var RequestInterface | \PHPUnit\Framework\MockObject\MockObject */
	private $request;
	/** @var ResponseInterface | \PHPUnit\Framework\MockObject\MockObject */
	private $response;

	public function setUp(): void {
		parent::setUp();

		$this->server = $this->getMockBuilder('\Sabre\DAV\Server')
			->disableOriginalConstructor()
			->getMock();
		$this->tree = $this->getMockBuilder('\Sabre\DAV\Tree')
			->disableOriginalConstructor()
			->getMock();
		$this->view = $this->getMockBuilder('\OC\Files\View')
			->disableOriginalConstructor()
			->getMock();
		$this->view->expects($this->once())
			->method('mkdir')
			->with('files_zsync');

		$this->server->tree = $this->tree;
		$this->plugin = new ChunkingPluginZsync($this->view);
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
			->willReturn($node);
		$this->response->expects($this->never())
			->method('setStatus');

		$this->assertNull($this->plugin->beforeMove('source', 'target'));
	}

	public function testBeforeMoveFutureFileSkipNonExistingBackingFile() {
		$sourceNode = $this->createMock(FutureFileZsync::class);
		$sourceNode->expects($this->once())
			->method('getSize')
			->willReturn(4);

		$node = $this->createMock(\OCA\DAV\Connector\Sabre\Node::class);

		$target = 'files/'.self::TEST_CHUNKING_USER1.'/target';

		$node->expects($this->once())
			->method('getDavPermissions')
			->willReturn('');

		$targetNode = $this->createMock(\Sabre\DAV\IFile::class);

		$stream = \fopen('php://memory', 'w+');
		\fwrite($stream, 'bar');
		\rewind($stream);

		$targetNode->expects($this->once())
			->method('get')
			->willReturn($stream);
		$targetNode->expects($this->any())
			->method('getSize')
			->willReturn(3);

		$this->tree->expects($this->exactly(4))
			->method('getNodeForPath')
			->withConsecutive(
				['source/.file.zsync'],
				[$target],
				[\dirname($target)],
				['source/.zsync'])
			->willReturnOnConsecutiveCalls(
				$sourceNode,
				$this->throwException(new NotFound),
				$node,
				$targetNode);

		$this->tree->expects($this->exactly(2))
			->method('nodeExists')
			->with($target)
			->willReturn(false);

		$this->response->expects($this->once())
			->method('setStatus')
			->with(201);

		$this->request->expects($this->exactly(2))
			->method('getHeader')
			->withConsecutive(
				['OC-Total-Length'],
				['OC-Total-File-Length'])
			->willReturn('4');

		$fileInfo = $this->createMock('\OC\Files\FileInfo');
		$fileInfo->expects($this->once())
			->method('getId')
			->willReturn('13124');

		$this->view->expects($this->once())
			->method('getFileInfo')
			->with('files/target')
			->willReturn($fileInfo);

		$this->assertFalse($this->plugin->beforeMove('source/.file.zsync', $target));
	}

	public function testBeforeMoveFutureFileMoveItWithZsync() {
		$sourceNode = $this->createMock(FutureFileZsync::class);
		$sourceNode->expects($this->once())
			->method('getSize')
			->willReturn(4);

		$node = $this->createMock(\OCA\DAV\Connector\Sabre\Node::class);

		$target = 'files/'.self::TEST_CHUNKING_USER1.'/target';

		$node->expects($this->once())
			->method('getDavPermissions')
			->willReturn('');

		$targetNode = $this->createMock(\Sabre\DAV\IFile::class);

		$stream = \fopen('php://memory', 'w+');
		\fwrite($stream, 'bar');
		\rewind($stream);

		$targetNode->expects($this->once())
			->method('get')
			->willReturn($stream);
		$targetNode->expects($this->any())
			->method('getSize')
			->willReturn(3);

		$this->tree->expects($this->exactly(5))
			->method('getNodeForPath')
			->withConsecutive(
				['source/.file.zsync'],
				[$target],
				[\dirname($target)],
				['source/.zsync'],
				[$target])
			->willReturnOnConsecutiveCalls(
				$sourceNode,
				$this->throwException(new NotFound),
				$node,
				$targetNode,
				$sourceNode);

		$this->tree->expects($this->exactly(2))
			->method('nodeExists')
			->with($target)
			->willReturn(true);

		$this->response->expects($this->once())
			->method('setStatus')
			->with(204);

		$this->request->expects($this->exactly(2))
			->method('getHeader')
			->withConsecutive(
				['OC-Total-Length'],
				['OC-Total-File-Length'])
			->willReturn('4');

		$fileInfo = $this->createMock('\OC\Files\FileInfo');
		$fileInfo->expects($this->once())
			->method('getId')
			->willReturn('13124');

		$this->view->expects($this->once())
			->method('getFileInfo')
			->with('files/target')
			->willReturn($fileInfo);

		$this->assertFalse($this->plugin->beforeMove('source/.file.zsync', $target));
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\BadRequest
	 * @expectedExceptionMessage Chunks on server do not sum up to 4 but to 3
	 */
	public function testBeforeMoveSizeIsWrong() {
		$sourceNode = $this->createMock(FutureFileZsync::class);
		$sourceNode->expects($this->once())
			->method('getSize')
			->willReturn(3);

		$this->tree->expects($this->exactly(1))
			->method('getNodeForPath')
			->with('source')
			->willReturn($sourceNode);

		$this->request->expects($this->once())
			->method('getHeader')
			->with('OC-Total-Length')
			->willReturn('4');

		$this->assertFalse($this->plugin->beforeMove('source', 'target'));
	}

	public function testBeforeMoveSizeIsNull() {
		$sourceNode = $this->createMock(FutureFileZsync::class);
		$node = $this->createMock(\OCA\DAV\Connector\Sabre\Node::class);

		$target = 'files/'.self::TEST_CHUNKING_USER1.'/target';

		$node->expects($this->once())
			->method('getDavPermissions')
			->willReturn('M');

		$this->tree->expects($this->exactly(3))
			->method('getNodeForPath')
			->withConsecutive(
				['source/.file.zsync'],
				[$target],
				[\dirname($target)])
			->willReturnOnConsecutiveCalls(
				$sourceNode,
				$this->throwException(new NotFound),
				$node);

		$this->request->expects($this->once())
			->method('getHeader')
			->with('OC-Total-Length')
			->willReturn(null);

		$this->assertFalse($this->plugin->beforeMove('source/.file.zsync', $target));
	}
}
