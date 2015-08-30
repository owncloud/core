<?php
/**
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
namespace OC\Core\Preview;

use OC;
use OC\Core\Application;
use OCP\AppFramework\IAppContainer;
use OC\Files\Filesystem;
use OCP\AppFramework\Http;
use OCP\Image;
use OCP\Files\Folder;
use OCP\Files\File;

/**
 * Class PreviewControllerTest
 *
 * @package OC\Core\Preview
 */
class PreviewControllerTest extends \Test\TestCase {

	/** @var IAppContainer */
	private $container;
	/** @var PreviewController */
	private $previewController;
	
	protected function setUp() {
		$app = new Application;
		$this->container = $app->getContainer();

		$this->container['AppName'] = 'core';
		$this->container['PreviewManager'] = $this->getMockBuilder('OCP\IPreview')
			->disableOriginalConstructor()->getMock();
		$this->container['Request'] = $this->getMockBuilder('OCP\IRequest')
			->disableOriginalConstructor()->getMock();
		$this->container['UserFolder'] = $this->getMockBuilder('OCP\Files\Folder')
			->disableOriginalConstructor()->getMock();
		$this->container['MimeTypeDetector'] = $this->getMockBuilder('OCP\Files\IMimeTypeDetector')
			->disableOriginalConstructor()->getMock();

		$this->previewController = $this->container['PreviewController'];
	}

	public function testNoFile() {
		$response = $this->previewController->getPreview();

		$this->assertEquals(Http::STATUS_BAD_REQUEST, $response->getStatus());
	}

	public function testMaxXZero() {
		$response = $this->previewController->getPreview('foo', 0);

		$this->assertEquals(Http::STATUS_BAD_REQUEST, $response->getStatus());
	}

	public function testMaxYZero() {
		$response = $this->previewController->getPreview('foo', 32, 0);

		$this->assertEquals(Http::STATUS_BAD_REQUEST, $response->getStatus());
	}

	public function testFileNotFound() {
		$this->container['UserFolder']->expects($this->once())
			->method('get')
			->will($this->throwException(new \OCP\Files\NotFoundException()));

		$response = $this->previewController->getPreview('foo', 32, 32);
		$this->assertEquals(Http::STATUS_NOT_FOUND, $response->getStatus());
	}

	public function testNoValidPreview() {
		$info = $this->getMockBuilder('OCP\Files\FileInfo')
			->disableOriginalConstructor()->getMock();
		$this->container['UserFolder']->expects($this->once())
			->method('get')
			->willReturn($info);

		$this->container['PreviewManager']->expects($this->once())
			->method('isAvailable')
			->willReturn(false);

		$response = $this->previewController->getPreview('foo', 32, 32);
		$this->assertEquals(Http::STATUS_NOT_FOUND, $response->getStatus());
	}

	public function testNoValidPreviewForced() {
		$info = $this->getMockBuilder('OCP\Files\FileInfo')
			->disableOriginalConstructor()->getMock();
		$this->container['UserFolder']->expects($this->once())
			->method('get')
			->willReturn($info);

		$image = $this->getMockBuilder('OCP\IImage')
			->disableOriginalConstructor()->getMock();
		$image->expects($this->once())
			->method('valid')
			->willReturn(false);

		$this->container['PreviewManager']->expects($this->once())
			->method('createPreview')
			->willReturn($image);

		$this->container['UserFolder']->expects($this->once())
			->method('getParent')
			->will($this->returnSelf());


		$response = $this->previewController->getPreview('foo', 32, 32, false, false, true);
		$this->assertEquals(Http::STATUS_NOT_FOUND, $response->getStatus());
	}

	public function testValidPreview() {
		$info = $this->getMockBuilder('OCP\Files\FileInfo')
			->disableOriginalConstructor()->getMock();
		$this->container['UserFolder']->expects($this->once())
			->method('get')
			->willReturn($info);

		$image = $this->getMockBuilder('OCP\IImage')
			->disableOriginalConstructor()->getMock();
		$image->expects($this->once())
			->method('valid')
			->willReturn(true);
		$image->expects($this->once())
			->method('data')
			->willReturn('FOO');
		$image->expects($this->once())
			->method('mimeType')
			->willReturn('foo/bar');

		$this->container['PreviewManager']->expects($this->once())
			->method('createPreview')
			->willReturn($image);

		$this->container['UserFolder']->expects($this->once())
			->method('getParent')
			->will($this->returnSelf());


		$response = $this->previewController->getPreview('foo', 32, 32, false, false, true);
		$this->assertEquals(Http::STATUS_OK, $response->getStatus());
		$this->assertEquals('FOO', $response->getData());
		$this->assertArrayHasKey('Content-Type', $response->getHeaders());
		$this->assertEquals('foo/bar', $response->getHeaders()['Content-Type']);
	}



}
