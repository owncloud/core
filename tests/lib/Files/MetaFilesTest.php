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

namespace Test\Files;

use OC\Files\Meta\MetaFileIdNode;
use OC\Files\Meta\MetaFileVersionNode;
use OC\Files\Meta\MetaRootNode;
use OC\Files\Meta\MetaVersionCollection;
use OC\Files\Node\File;
use OC\Files\View;
use OCA\Files_Versions\Hooks;
use OCP\Files\Folder;
use OCP\Files\Mount\IMountPoint;
use OCP\IImage;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class MetaFilesTest
 *
 * @package Test\Files
 * @group DB
 */
class MetaFilesTest extends TestCase {
	use UserTrait;

	/**
	 * @var string
	 */
	private $userId;

	protected function setUp() {
		parent::setUp();

		// workaround: re-setup versions hooks
		Hooks::connectHooks();

		$this->userId = $this->getUniqueID('meta-data-user-');
		$this->createUser($this->userId);
		$this->loginAsUser($this->userId);
	}

	protected function tearDown() {
		self::logout();
		parent::tearDown();
	}

	private function createFile() {
		// create file
		$file = $this->getUniqueID('file') . '.txt';
		$fileName = "{$this->userId}/files/$file";
		$view = new View();
		$view->file_put_contents($fileName, '1234');
		return $view->getFileInfo($fileName);
	}

	/**
	 * @throws \Exception
	 * @throws \OCP\Files\ForbiddenException
	 * @throws \OCP\Files\NotFoundException
	 * @throws \OCP\Files\NotPermittedException
	 */
	public function testMetaInNodeAPI() {
		$userId = $this->userId;

		// create file
		$file = $this->getUniqueID('file') . '.txt';
		$fileName = "{$this->userId}/files/$file";
		$view = new View();
		$view->file_put_contents($fileName, '1234');
		$info = $view->getFileInfo($fileName);

		// work on node api
		/** @var Folder $metaNodeOfFile */
		$metaNodeOfFile = \OC::$server->getRootFolder()->get('meta');
		$this->assertInstanceOf(MetaRootNode::class, $metaNodeOfFile);
		$this->assertEquals([], $metaNodeOfFile->getDirectoryListing());
		$this->assertEquals('/meta', $metaNodeOfFile->getPath());
		$this->assertEquals('meta', $metaNodeOfFile->getName());

		$metaNodeOfFile = \OC::$server->getRootFolder()->get("meta/{$info->getId()}");
		$this->assertInstanceOf(MetaFileIdNode::class, $metaNodeOfFile);
		$this->assertEquals("/meta/{$info->getId()}", $metaNodeOfFile->getPath());
		$this->assertEquals((string)($info->getId()), $metaNodeOfFile->getName());
		$children = $metaNodeOfFile->getDirectoryListing();
		$this->assertCount(1, $children);
		$this->assertInstanceOf(MetaVersionCollection::class, $children[0]);

		$metaNodeOfFile = \OC::$server->getRootFolder()->get("meta/{$info->getId()}/v");
		$this->assertInstanceOf(MetaVersionCollection::class, $metaNodeOfFile);
		$this->assertEquals("/meta/{$info->getId()}/v", $metaNodeOfFile->getPath());
		$this->assertEquals('v', $metaNodeOfFile->getName());
		$children = $metaNodeOfFile->getDirectoryListing();
		$this->assertCount(0, $children);

		// write again to get another version
		$view->file_put_contents($fileName, '1234567890');
		$children = $metaNodeOfFile->getDirectoryListing();
		$this->assertCount(1, $children);
		$this->assertInstanceOf(MetaFileVersionNode::class, $children[0]);

		$versionId = $children[0]->getName();
		/** @var MetaFileVersionNode $metaNodeOfFile */
		$metaNodeOfFile = \OC::$server->getRootFolder()->get("meta/{$info->getId()}/v/$versionId");
		$this->assertInstanceOf(MetaFileVersionNode::class, $metaNodeOfFile);
		$this->assertEquals($versionId, $metaNodeOfFile->getName());
		$this->assertEquals(4, $metaNodeOfFile->getSize());
		$this->assertEquals([], $metaNodeOfFile->getHeaders());
		$this->assertEquals($file, $metaNodeOfFile->getContentDispositionFileName());
		$this->assertEquals('text/plain', $metaNodeOfFile->getMimetype());
		$this->assertInternalType('string', $metaNodeOfFile->getEtag());
		$this->assertGreaterThan(0, \strlen($metaNodeOfFile->getEtag()));
		$this->assertInstanceOf(IMountPoint::class, $metaNodeOfFile->getMountPoint());
		$thumbnail = $metaNodeOfFile->getThumbnail([]);
		$this->assertInstanceOf(IImage::class, $thumbnail);

		/** @var MetaFileVersionNode $metaNodeOfFile */
		$this->assertEquals('1234', $metaNodeOfFile->getContent());

		// restore a version using copy
		/** @var File $target */
		$target = \OC::$server->getRootFolder()->get($fileName);
		$this->assertEquals('1234567890', $target->getContent());
		$metaNodeOfFile->copy($fileName);
		$this->assertEquals('1234', $target->getContent());
	}

	public function testMetaRootGetById() {
		$info = $this->createFile();

		$metaRoot = \OC::$server->getRootFolder();
		$info2 = $metaRoot->getById($info->getId());

		$this->assertEquals($info->getId(), $info2[0]->getId());
		$this->assertEquals($info->getPath(), $info2[0]->getPath());
	}

	/**
	 * @expectedException OCP\Files\NotFoundException
	 */
	public function testMetaRootGetNotFound() {
		$info = $this->createFile();

		$metaRoot = \OC::$server->getRootFolder();
		// get non-existing
		$metaRoot->get($info->getId() + 100);
	}
}
