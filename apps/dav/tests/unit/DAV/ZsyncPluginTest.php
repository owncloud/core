<?php
/**
 * @author Ahmed Ammar <ahmed.a.ammar@gmail.com>
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

use OCA\DAV\Files\ZsyncPlugin;
use OCP\Files\NotFoundException;
use OCP\Files\NotPermittedException;
use Test\TestCase;
use OCP\IRequest;
use OCP\AppFramework\Http;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Sabre\DAV\Server;
use OC\Files\View;

class ZsyncPluginTest extends TestCase {
	/** @var \OCP\IUserSession */
	private $userSession;
	/** @var ZsyncPlugin */
	private $plugin;
	/** @var \OC\Files\View */
	private $view;
	/** @var ResponseInterface | \PHPUnit_Framework_MockObject_MockObject */
	private $response;
	/** @var RequestInterface | \PHPUnit_Framework_MockObject_MockObject */
	private $request;

	public function setUp() {
		$this->view = $this->getMockBuilder('\OC\Files\View')
			->disableOriginalConstructor()
			->getMock();
		$this->view->expects($this->once())
			->method('mkdir')
			->with('files_zsync');

		$this->request = $this->getMockBuilder('Sabre\HTTP\RequestInterface')->getMock();
		$this->response = $this->getMockBuilder('Sabre\HTTP\ResponseInterface')->getMock();
		$this->server = $this->getMockBuilder('Sabre\DAV\Server')->getMock();
		$this->plugin = new ZsyncPlugin($this->view);

		$this->plugin->initialize($this->server);
	}

	/**
	 * @dataProvider providesQueryParams
	 * @param $param
	 */
	public function testQueryParams($param) {
		$this->request->expects($this->exactly(2))->method('getQueryParameters')->willReturn($param);
		$this->assertTrue($this->plugin->httpGet($this->request, $this->response));
		$this->assertTrue($this->plugin->httpDelete($this->request, $this->response));
	}

	public function providesQueryParams() {
		return [
			[[]],
			[['1']],
			[['foo' => 'bar']],
		];
	}


	public function testShowRouteWithExistsFile() {
		$this->view->expects($this->any())->method('file_exists')->willReturn(true);

		$fileInfo = $this->createMock('\OC\Files\FileInfo');
		$fileInfo->expects($this->exactly(2))->method('getId')->willReturn('13124');
		$this->view->expects($this->exactly(2))->method('getFileInfo')->with('files/target')->willReturn($fileInfo);

		$this->view->expects($this->once())->method('file_get_contents')->willReturn('bar');

		$this->request->expects($this->exactly(2))->method('getQueryParameters')->willReturn(['zsync' => true]);
		$this->request->expects($this->exactly(2))->method('getPath')->willReturn('files/testuser1/target');

		$this->response->expects($this->exactly(2))->method('setStatus')->with(Http::STATUS_OK);
		$this->response->expects($this->once())->method('setBody')->with('bar');

		$this->assertFalse($this->plugin->httpGet($this->request, $this->response));
		$this->assertFalse($this->plugin->httpDelete($this->request, $this->response));
	}


	public function testShowRouteWithMissingBaseFile() {
		$this->view->expects($this->any())->method('file_exists')->willReturn(false);

		$this->request->expects($this->exactly(2))->method('getQueryParameters')->willReturn(['zsync' => true]);
		$this->request->expects($this->exactly(2))->method('getPath')->willReturn('files/testuser1/target');

		$this->response->expects($this->exactly(2))->method('setStatus')->with(Http::STATUS_NOT_FOUND);

		$this->assertFalse($this->plugin->httpGet($this->request, $this->response));
		$this->assertFalse($this->plugin->httpDelete($this->request, $this->response));
	}

	public function testShowRouteWithMissingZsyncFile() {
		$this->view->expects($this->exactly(4))->method('file_exists')
			->withConsecutive(['files/target'], ['files_zsync/13124'], ['files/target'], ['files_zsync/13124'])
			->willReturnOnConsecutiveCalls(true, false, true, false);

		$fileInfo = $this->createMock('\OC\Files\FileInfo');
		$fileInfo->expects($this->exactly(2))->method('getId')->willReturn('13124');
		$this->view->expects($this->exactly(2))->method('getFileInfo')->with('files/target')->willReturn($fileInfo);

		$this->request->expects($this->exactly(2))->method('getQueryParameters')->willReturn(['zsync' => true]);
		$this->request->expects($this->exactly(2))->method('getPath')->willReturn('files/testuser1/target');

		$this->response->expects($this->exactly(2))->method('setStatus')->with(Http::STATUS_NOT_FOUND);

		$this->assertFalse($this->plugin->httpGet($this->request, $this->response));
		$this->assertFalse($this->plugin->httpDelete($this->request, $this->response));
	}

	public function testGetPropertyWithExistsFile() {
		$propFind = $this->getMockBuilder('\Sabre\DAV\PropFind')->disableOriginalConstructor()->getMock();
		$node = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\File')->disableOriginalConstructor()->getMock();
		$node->expects($this->any())->method('getPath')->willReturn('target');

		$this->view->expects($this->once())->method('is_file')->with('files/target')->willReturn(true);
		$fileInfo = $this->createMock('\OC\Files\FileInfo');
		$fileInfo->expects($this->once())->method('getId')->willReturn('13124');
		$this->view->expects($this->once())->method('getFileInfo')->with('files/target')->willReturn($fileInfo);
		$this->view->expects($this->once())->method('file_exists')->with('files_zsync/13124')->willReturn(true);

		$this->assertNull($this->plugin->handleGetProperties($propFind, $node));
	}

	public function testGetPropertyWithNotExistsFile() {
		$propFind = $this->getMockBuilder('\Sabre\DAV\PropFind')->disableOriginalConstructor()->getMock();
		$node = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\File')->disableOriginalConstructor()->getMock();
		$node->expects($this->any())->method('getPath')->willReturn('target');

		$this->view->expects($this->once())->method('is_file')->with('files/target')->willReturn(false);

		$this->assertNull($this->plugin->handleGetProperties($propFind, $node));
	}

}
