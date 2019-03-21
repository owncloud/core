<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
 */

namespace OCA\DAV\Tests\Unit\Files;

use OCA\DAV\Connector\Sabre\Exception\FileLocked;
use OCA\DAV\Files\IFileNode;
use OCA\DAV\Files\PreviewPlugin;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\Encryption\Exceptions\GenericEncryptionException;
use OCP\Files\ForbiddenException;
use OCP\Files\IPreviewNode;
use OCP\Files\StorageNotAvailableException;
use OCP\IImage;
use OCP\IPreview;
use OCP\Lock\LockedException;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\Exception\ServiceUnavailable;
use Sabre\DAV\Server;
use Sabre\DAV\Tree;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Test\TestCase;
use OCP\Files\FileInfo;

class PreviewPluginTest extends TestCase {

	/** @var RequestInterface | \PHPUnit\Framework\MockObject\MockObject */
	private $request;
	/** @var IPreviewNode | \PHPUnit\Framework\MockObject\MockObject */
	private $previewNode;
	/** @var IPreview | \PHPUnit\Framework\MockObject\MockObject */
	private $previewManager;
	/** @var PreviewPlugin */
	private $plugin;
	/** @var ResponseInterface| \PHPUnit\Framework\MockObject\MockObject */
	private $response;

	public function setUp() {
		parent::setUp();

		$this->previewManager = $this->createMock(IPreview::class);
		$this->previewManager->method('isAvailable')->willReturn(true);

		$this->previewNode = $this->createMock([IPreviewNode::class, FileInfo::class]);

		$this->request = $this->createMock(RequestInterface::class);
		/** @var ResponseInterface | \PHPUnit\Framework\MockObject\MockObject $response */
		$this->response = $this->createMock(ResponseInterface::class);

		$this->initPlugin();
	}

	private function initPlugin() {
		/** @var ITimeFactory | \PHPUnit\Framework\MockObject\MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		$timeFactory->method('getTime')->willReturn(1234567);

		$this->plugin = new PreviewPlugin($timeFactory, $this->previewManager);

		/** @var IFileNode | \PHPUnit\Framework\MockObject\MockObject $node */
		$node = $this->createMock(IFileNode::class);
		$node->method('getNode')->willReturn($this->previewNode);

		/** @var Tree | \PHPUnit\Framework\MockObject\MockObject $tree */
		$tree = $this->createMock(Tree::class);
		$tree->method('getNodeForPath')->willReturn($node);

		/** @var Server | \PHPUnit\Framework\MockObject\MockObject $server */
		$server = $this->createMock(Server::class);
		$server->tree = $tree;

		$this->plugin->initialize($server);
	}

	public function testPreviewParamNotSet() {
		$this->request
			->expects($this->once())
			->method('getQueryParameters')
			->will($this->returnValue([]));
		$this->assertTrue($this->plugin->httpGet($this->request, $this->response));
	}

	/**
	 * @param $expectedExceptionClass
	 * @param $exception
	 * @throws Forbidden
	 * @throws \OCA\DAV\Connector\Sabre\Exception\FileLocked
	 * @throws \Sabre\DAV\Exception\NotAuthenticated
	 * @throws \Sabre\DAV\Exception\NotFound
	 * @throws \Sabre\DAV\Exception\ServiceUnavailable
	 * @dataProvider providesExceptions
	 */
	public function testPreviewWithExceptions($expectedExceptionClass, $exception) {
		$this->previewNode->method('getThumbnail')->willThrowException($exception);

		$this->request->method('getQueryParameters')->willReturn([
			'preview' => '1'
		]);

		$this->expectException($expectedExceptionClass);
		$this->plugin->httpGet($this->request, $this->response);
	}

	public function providesExceptions() {
		return [
			[Forbidden::class, new GenericEncryptionException()],
			[ServiceUnavailable::class, new StorageNotAvailableException()],
			[Forbidden::class, new ForbiddenException('', false)],
			[FileLocked::class, new LockedException('')]
		];
	}

	public function testPreviewNoImage() {
		$this->previewNode->method('getThumbnail')->willReturn(null);

		$this->request->method('getQueryParameters')->willReturn([
			'preview' => '1'
		]);

		$this->expectException(NotFound::class);
		$this->plugin->httpGet($this->request, $this->response);
	}

	public function testPreviewDisabled() {
		$this->previewManager = $this->createMock(IPreview::class);
		$this->previewManager->expects($this->once())
			->method('isAvailable')
			->willReturn(false);

		$this->initPlugin();

		$this->previewNode->expects($this->never())
			->method('getThumbnail');

		$this->request->method('getQueryParameters')->willReturn([
			'preview' => '1'
		]);

		$this->expectException(NotFound::class);
		$this->plugin->httpGet($this->request, $this->response);
	}

	public function testPreviewCreatesImage() {
		$image = $this->createMock(IImage::class);
		$image->method('valid')->willReturn(true);
		$this->previewNode->method('getThumbnail')->willReturn($image);

		$this->request->method('getQueryParameters')->willReturn([
			'preview' => '1'
		]);

		$this->response->method('setStatus')->with(200);
		$this->response->method('setBody')->with('');
		$this->response->expects($this->exactly(4))
			->method('setHeader')->withConsecutive(
				['Content-Type', 'application/octet-stream'],
				['Content-Disposition', 'attachment'],
				['Cache-Control', 'max-age=86400, must-revalidate'],
				['Expires', \gmdate("D, d M Y H:i:s", 1234567 + 86400) . " GMT"]
			);

		$this->assertFalse($this->plugin->httpGet($this->request, $this->response));
	}
}
