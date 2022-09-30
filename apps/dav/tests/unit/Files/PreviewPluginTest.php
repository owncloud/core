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

use OC\Files\Node\File;
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
use PHPUnit\Framework\MockObject\MockObject;
use Sabre\DAV\Exception\BadRequest;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\Exception\NotAuthenticated;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\Exception\ServiceUnavailable;
use Sabre\DAV\Server;
use Sabre\DAV\Tree;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Test\TestCase;

class PreviewPluginTest extends TestCase {
	/** @var RequestInterface | MockObject */
	private $request;
	/** @var IPreviewNode | MockObject */
	private $previewNode;
	/** @var IPreview | MockObject */
	private $previewManager;
	/** @var PreviewPlugin */
	private $plugin;
	/** @var ResponseInterface| MockObject */
	private $response;

	public function setUp(): void {
		parent::setUp();

		$this->previewManager = $this->createMock(IPreview::class);
		$this->previewManager->method('isAvailable')->willReturn(true);

		$this->previewNode = $this->createMock(File::class);

		$this->request = $this->createMock(RequestInterface::class);
		/** @var ResponseInterface | MockObject $response */
		$this->response = $this->createMock(ResponseInterface::class);

		$this->initPlugin();
	}

	private function initPlugin(): void {
		/** @var ITimeFactory | MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		$timeFactory->method('getTime')->willReturn(1234567);

		$this->plugin = new PreviewPlugin($timeFactory, $this->previewManager);

		/** @var IFileNode | MockObject $node */
		$node = $this->createMock(IFileNode::class);
		$node->method('getNode')->willReturn($this->previewNode);

		/** @var Tree | MockObject $tree */
		$tree = $this->createMock(Tree::class);
		$tree->method('getNodeForPath')->willReturn($node);

		/** @var Server | MockObject $server */
		$server = $this->createMock(Server::class);
		$server->tree = $tree;

		$this->plugin->initialize($server);
	}

	public function testPreviewParamNotSet(): void {
		$this->request
			->expects($this->once())
			->method('getQueryParameters')
			->willReturn([]);
		$this->assertTrue($this->plugin->httpGet($this->request, $this->response));
	}

	/**
	 * @param $expectedExceptionClass
	 * @param $exception
	 * @throws Forbidden
	 * @throws FileLocked
	 * @throws NotAuthenticated
	 * @throws NotFound
	 * @throws ServiceUnavailable
	 * @dataProvider providesExceptions
	 */
	public function testPreviewWithExceptions($expectedExceptionClass, $exception): void {
		$this->previewNode->method('getThumbnail')->willThrowException($exception);

		$this->request->method('getQueryParameters')->willReturn([
			'preview' => '1'
		]);

		$this->expectException($expectedExceptionClass);
		$this->plugin->httpGet($this->request, $this->response);
	}

	public function providesExceptions(): array {
		return [
			[Forbidden::class, new GenericEncryptionException()],
			[ServiceUnavailable::class, new StorageNotAvailableException()],
			[Forbidden::class, new ForbiddenException('', false)],
			[FileLocked::class, new LockedException('')]
		];
	}

	public function testPreviewNoImage(): void {
		$this->previewNode->method('getThumbnail')->willReturn(null);

		$this->request->method('getQueryParameters')->willReturn([
			'preview' => '1'
		]);

		$this->expectException(NotFound::class);
		$this->plugin->httpGet($this->request, $this->response);
	}

	public function testInvalidPreviewParameters(): void {
		$this->previewNode->method('getThumbnail')->willThrowException(new \Exception('Invalid parameter'));

		$this->request->method('getQueryParameters')->willReturn([
			'preview' => '1',
			'x' => 'abcd'
		]);

		$this->expectException(BadRequest::class);
		$this->plugin->httpGet($this->request, $this->response);
	}

	public function testPreviewDisabled(): void {
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

	public function testPreviewCreatesImage(): void {
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
				['Expires', \gmdate('D, d M Y H:i:s', 1234567 + 86400) . ' GMT']
			);

		$this->assertFalse($this->plugin->httpGet($this->request, $this->response));
	}
}
