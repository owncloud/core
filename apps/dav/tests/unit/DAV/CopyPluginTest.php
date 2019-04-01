<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\Tests\unit\DAV;

use OCA\DAV\Connector\Sabre\Directory;
use OCA\DAV\Connector\Sabre\File;
use OCA\DAV\DAV\CopyPlugin;
use Sabre\DAV\ICollection;
use Sabre\DAV\IFile;
use Sabre\DAV\Server;
use Sabre\DAV\Tree;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Test\TestCase;
use OCP\Files\FileInfo;
use OCP\Files\ForbiddenException;
use OCA\DAV\Files\ICopySource;

class CopyPluginTest extends TestCase {

	/** @var Server | \PHPUnit\Framework\MockObject\MockObject */
	private $server;
	/** @var CopyPlugin */
	private $plugin;
	/** @var Tree | \PHPUnit\Framework\MockObject\MockObject */
	private $tree;
	/** @var RequestInterface | \PHPUnit\Framework\MockObject\MockObject */
	private $request;
	/** @var ResponseInterface | \PHPUnit\Framework\MockObject\MockObject */
	private $response;

	public function setUp() {
		parent::setUp();
		$this->plugin = new CopyPlugin();

		$this->server = $this->createMock(Server::class);
		$this->tree = $this->createMock(Tree::class);
		$this->server->tree = $this->tree;
		/** @var RequestInterface | \PHPUnit\Framework\MockObject\MockObject $request */
		$this->request = $this->createMock(RequestInterface::class);
		/** @var ResponseInterface | \PHPUnit\Framework\MockObject\MockObject $response */
		$this->response = $this->createMock(ResponseInterface::class);

		$this->plugin->initialize($this->server);
	}

	/**
	 * @dataProvider providesSourceAndDestinations
	 * @param bool $destinationExists
	 * @param $destinationNode
	 * @param $sourceNode
	 */
	public function testCopyPluginReturnTrue($destinationExists, $destinationNode, $sourceNode) {
		$this->tree->expects($this->once())->method('getNodeForPath')->willReturn($sourceNode);
		$this->server->expects($this->any())->method('getCopyAndMoveInfo')->willReturn([
			'destinationExists' => $destinationExists,
			'destinationNode' => $destinationNode
		]);

		$returnValue = $this->plugin->httpCopy($this->request, $this->response);
		$this->assertTrue($returnValue);
	}

	public function providesSourceAndDestinations() {
		return [
			'source is not a ICopySource' => [true, null, $this->createMock(IFile::class)],
			'destination does not exist' => [false, null, $this->createMock(ICopySource::class)],
			'destination is not a File' => [true, $this->createMock(Directory::class), $this->createMock(ICopySource::class)],
		];
	}

	public function testCopyPluginReturnFalse() {
		$destinationNode = $this->createMock(File::class);
		$sourceNode = $this->createMock([IFile::class, ICopySource::class]);

		$this->tree->expects($this->once())->method('getNodeForPath')->willReturn($sourceNode);
		$this->server->expects($this->once())->method('getCopyAndMoveInfo')->willReturn([
			'destinationExists' => true,
			'destinationNode' => $destinationNode,
			'destination' => 'destination.txt'
		]);

		// make sure the plugin properly emits beforeBind and afterBind
		$this->server->expects($this->exactly(2))->method('emit')->withConsecutive(
			['beforeBind', ['destination.txt']], ['afterBind', ['destination.txt']])->willReturn(true);

		$fileInfo = $this->createMock(FileInfo::class);
		$fileInfo->method('getPath')->willReturn('path/to/destination.txt');

		$sourceNode->expects($this->once())->method('copy')->with('path/to/destination.txt');

		$destinationNode->expects($this->once())->method('getFileInfo')->willReturn($fileInfo);

		// make sure http status and content length are properly set
		$this->response->expects($this->once())->method('setHeader')->with('Content-Length', '0');
		$this->response->expects($this->once())->method('setStatus')->with(204);

		$returnValue = $this->plugin->httpCopy($this->request, $this->response);
		$this->assertFalse($returnValue);
	}

	/**
	 * @expectedException OCA\DAV\Connector\Sabre\Exception\Forbidden
	 * @expectedExceptionMessage Test exception
	 */
	public function testCopyPluginRethrowForbidden() {
		$destinationNode = $this->createMock(File::class);
		$sourceNode = $this->createMock([ICopySource::class, IFile::class]);

		$this->tree->expects($this->once())->method('getNodeForPath')->willReturn($sourceNode);
		$this->server->expects($this->once())->method('getCopyAndMoveInfo')->willReturn([
			'destinationExists' => true,
			'destinationNode' => $destinationNode,
			'destination' => 'destination.txt'
		]);

		// make sure the plugin properly emits beforeBind and afterBind
		$this->server->expects($this->once(2))
			->method('emit')
			->with('beforeBind', ['destination.txt'])
			->willReturn(true);

		$sourceNode->expects($this->once())
			->method('copy')
			->will($this->throwException(new ForbiddenException('Test exception', false)));

		$fileInfo = $this->createMock(FileInfo::class);
		$fileInfo->method('isDeletable')->willReturn(true);

		$destinationNode->expects($this->once())->method('getFileInfo')->willReturn($fileInfo);

		$this->plugin->httpCopy($this->request, $this->response);
	}
}
