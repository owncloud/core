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

class CopyPluginTest extends TestCase {

	/** @var Server | \PHPUnit_Framework_MockObject_MockObject */
	private $server;
	/** @var CopyPlugin */
	private $plugin;
	/** @var Tree | \PHPUnit_Framework_MockObject_MockObject */
	private $tree;
	/** @var RequestInterface | \PHPUnit_Framework_MockObject_MockObject */
	private  $request;
	/** @var ResponseInterface | \PHPUnit_Framework_MockObject_MockObject */
	private $response;

	public function setUp() {
		parent::setUp();
		$this->plugin = new CopyPlugin();

		$this->server = $this->createMock(Server::class);
		$this->tree = $this->createMock(Tree::class);
		$this->server->tree = $this->tree;
		/** @var RequestInterface | \PHPUnit_Framework_MockObject_MockObject $request */
		$this->request = $this->createMock(RequestInterface::class);
		/** @var ResponseInterface | \PHPUnit_Framework_MockObject_MockObject $response */
		$this->response = $this->createMock( ResponseInterface::class);

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
		$this->server->expects($this->once())->method('getCopyAndMoveInfo')->willReturn([
			'destinationExists' => $destinationExists,
			'destinationNode' => $destinationNode
		]);

		$returnValue = $this->plugin->httpCopy($this->request, $this->response);
		$this->assertTrue($returnValue);
	}

	public function providesSourceAndDestinations() {
		return [
			'destination does not exist' => [false, null, null],
			'destination is not a File' => [true, $this->createMock(Directory::class), $this->createMock(IFile::class)],
			'source is not a IFile' => [true, $this->createMock(File::class), $this->createMock(ICollection::class)],
		];
	}

	public function testCopyPluginReturnFalse() {

		$destinationNode = $this->createMock(File::class);
		$sourceNode = $this->createMock(IFile::class);

		$this->tree->expects($this->once())->method('getNodeForPath')->willReturn($sourceNode);
		$this->server->expects($this->once())->method('getCopyAndMoveInfo')->willReturn([
			'destinationExists' => true,
			'destinationNode' => $destinationNode,
			'destination' => 'destination.txt'
		]);

		// make sure the plugin properly emits beforeBind and afterBind
		$this->server->expects($this->exactly(2))->method('emit')->withConsecutive(
			['beforeBind', ['destination.txt']], ['afterBind', ['destination.txt']])->willReturn(true);

		// make sure the file content is actually copied over
		$sourceNode->expects($this->once())->method('get')->willReturn('123456');
		$destinationNode->expects($this->once())->method('put')->with('123456');

		// make sure http status and content length are properly set
		$this->response->expects($this->once())->method('setHeader')->with('Content-Length', '0');
		$this->response->expects($this->once())->method('setStatus')->with(204);

		$returnValue = $this->plugin->httpCopy($this->request, $this->response);
		$this->assertFalse($returnValue);
	}


}
