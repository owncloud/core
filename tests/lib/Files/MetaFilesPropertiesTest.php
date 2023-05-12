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

namespace lib\Files;

use OC\Files\Meta\MetaFileIdNode;
use OC\Files\Meta\MetaFileVersionNode;
use OC\Files\Meta\MetaVersionCollection;
use OC\Files\View;
use OCA\Files_Versions\Hooks;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class MetaFilesPropertiesTest
 *
 * @package Test\Files
 * @group DB
 */
class MetaFilesPropertiesTest extends TestCase {
	use UserTrait;

	/**
	 * @var string
	 */
	private $userId;

	protected function setUp(): void {
		parent::setUp();

		# enable versions
		$this->versionsWasEnabled = \OC::$server->getAppManager()->isEnabledForUser('files_versions');
		if (!$this->versionsWasEnabled) {
			\OC::$server->getAppManager()->enableApp('files_versions');
		}

		// workaround: re-setup versions hooks
		Hooks::connectHooks();

		$this->userId = self::getUniqueID('meta-data-user-');
		$this->createUser($this->userId);
		self::loginAsUser($this->userId);
	}

	protected function tearDown(): void {
		self::logout();
		parent::tearDown();

		if (!$this->versionsWasEnabled) {
			\OC::$server->getAppManager()->disableApp('files_versions');
		}
	}

	public function testMetaProperties(): void {
		// create file
		$file = self::getUniqueID('file') . '.txt';
		$fileName = "{$this->userId}/files/$file";
		$view = new View();
		$view->file_put_contents($fileName, '1234');
		$info = $view->getFileInfo($fileName);

		// work on node api
		/** @var MetaFileIdNode $metaNodeOfFile */
		$metaNodeOfFile = \OC::$server->getRootFolder()->get("meta/{$info->getId()}");
		/** @var MetaVersionCollection $metaNodeOfFileVersionCollection */
		$metaNodeOfFileVersionCollection = \OC::$server->getRootFolder()->get("meta/{$info->getId()}/v");
		$metaNodeOfFileVersionCollection->setProperty('foo', 'bar');
		self::assertEquals('bar', $metaNodeOfFileVersionCollection->getProperty('foo'));

		// write again to get another version
		$view->file_put_contents($fileName, '1234567890');
		$children = $metaNodeOfFileVersionCollection->getDirectoryListing();
		$this->assertCount(1, $children);
		$this->assertInstanceOf(MetaFileVersionNode::class, $children[0]);

		$versionId = $children[0]->getName();
		/** @var MetaFileVersionNode $metaNodeOfFile */
		$metaNodeOfFile = \OC::$server->getRootFolder()->get("meta/{$info->getId()}/v/$versionId");
		$this->assertInstanceOf(MetaFileVersionNode::class, $metaNodeOfFile);
		self::assertEquals('bar', $metaNodeOfFile->getProperty('foo'));

		# set property on a version
		$metaNodeOfFile->setProperty('lorem', 'ipsum');
		self::assertEquals('ipsum', $metaNodeOfFile->getProperty('lorem'));
	}
}
