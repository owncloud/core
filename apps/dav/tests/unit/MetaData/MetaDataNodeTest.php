<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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


namespace OCA\DAV\Tests\Unit\MetaData;



use OC\Files\Meta\MetaVersionCollection;
use OC\Files\View;
use OCA\DAV\MetaData\MetaDataNode;
use OCP\Files\Node;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class MetaDataNodeTest
 *
 * @group  DB
 * @package OCA\DAV\Tests\Unit\MetaData
 */
class MetaDataNodeTest extends TestCase {

	use UserTrait;

	protected function tearDown() {
		self::logout();
		return parent::tearDown();
	}

	public function testMetaDataNodeTest() {
		//\OCA\Files_Versions\Hooks::connectHooks();

		//Create User
		$userId = 'meta-data-user';
		$user = $this->createUser($userId);
		$this->loginAsUser($userId);


		//Create a file
		$fileName = "$userId/files/" . $this->getUniqueID('file') . '.txt';
		$view = new View();
		$view->file_put_contents($fileName,'1234');
		$info = $view->getFileInfo($fileName);

		//get version folder
		$metaVersionCollection = new MetaVersionCollection($info->getId());
		$metaDataNode = new MetaDataNode($metaVersionCollection);

		//get meta folder
		$metaFolder = $metaDataNode->getMetaNodeFolder();
		$this->assertInstanceOf(Node::class, $metaFolder);

		//get meta/$fileid folder
		$metaFileIdNode = $metaDataNode->getFileIdFolder();
		$this->assertInstanceOf(Node::class, $metaFileIdNode);

		//get meta/$fileid/v folder
		$metaVersionNode = $metaDataNode->getMetaVersionFolder();
		$this->assertInstanceOf(Node::class, $metaVersionNode);

	}
}
