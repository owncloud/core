<?php
/**
 * @author Artur Neumann <artur@jankaritech.com>
 *
 * @copyright 2018 ownCloud GmbH
 * @license AGPL-3.0 <http://www.gnu.org/licenses/>
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
 * You should have received a copy of the GNU Affero General Public License,
 * version 3, along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\DAV\Tests\Unit\Files;

use Sabre\DAV\Tree;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Test\TestCase;
use OCA\DAV\Files\PreviewPlugin;
use OCP\ILogger;
use OCP\Files\ForbiddenException;
use OCP\Files\IPreviewNode;
use OCA\DAV\Files\IFileNode;
use Sabre\DAV\Server;
use OCA\DAV\Connector\Sabre\Exception\Forbidden;

/**
 *
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class PreviewPluginTest extends TestCase {

	/**
	 * @var RequestInterface | \PHPUnit_Framework_MockObject_MockObject $request
	 */
	private $request;
	/**
	 * @var ResponseInterface | \PHPUnit_Framework_MockObject_MockObject $response
	 */
	private $response;
	/**
	 * @var PreviewPlugin
	 */
	private $plugin;
	
	/**
	 * {@inheritDoc}
	 *
	 * @see \Test\TestCase::setUp()
	 * @return void
	 */
	protected function setUp() {
		$this->request = $this->createMock(RequestInterface::class);
		$this->response = $this->createMock(ResponseInterface::class);
		$logger = $this->createMock(ILogger::class);
		$this->plugin = new PreviewPlugin($logger);
	}
	
	/**
	 * @return void
	 */
	public function testPreviewParamNotSet() {
		$this->request
			->expects($this->once())
			->method('getQueryParameters')
			->will($this->returnValue([]));
		$this->assertTrue($this->plugin->httpGet($this->request, $this->response));
	}
	
	/**
	 * @return void
	 */
	public function testForbiddenAccess() {
		$this->request
			->expects($this->once())
			->method('getQueryParameters')
			->will($this->returnValue(['preview' => 1]));
		/**
		 * @var Server | \PHPUnit_Framework_MockObject_MockObject $server
		 */
		$server = $this->createMock(Server::class);
		$this->plugin->initialize($server);
		
		/**
		 * @var Tree | \PHPUnit_Framework_MockObject_MockObject $tree
		 */
		$tree = $this->createMock(Tree::class);
		$server->tree = $tree;
		
		/**
		 * @var IFileNode | \PHPUnit_Framework_MockObject_MockObject $node
		 */
		$node = $this->createMock(IFileNode::class);
		$tree->expects($this->once())
			->method('getNodeForPath')
			->will($this->returnValue($node));
		
		/**
		 * @var IPreviewNode | \PHPUnit_Framework_MockObject_MockObject $fileNode
		 */
		$fileNode = $this->createMock(IPreviewNode::class);
		$node->expects($this->once())
			->method('getNode')
			->will($this->returnValue($fileNode));
		
		/**
		 * @var ForbiddenException | \PHPUnit_Framework_MockObject_MockObject
		 *      $exception
		 */
		$exception = $this->createMock(ForbiddenException::class);
		$fileNode->expects($this->once())
			->method('getThumbnail')
			->will($this->throwException($exception));
		
		$this->expectException(Forbidden::class);
		$this->plugin->httpGet($this->request, $this->response);
	}
}
