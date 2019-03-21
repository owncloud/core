<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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
namespace OCA\Files\Tests\Service;

use OCA\Files\Service\TagService;
use OCP\Files\IRootFolder;
use OCP\IUserSession;
use Test\Traits\UserTrait;

/**
 * Class TagServiceTest
 *
 * @group DB
 *
 * @package OCA\Files
 */
class TagServiceTest extends \Test\TestCase {
	use UserTrait;

	/**
	 * @var string
	 */
	private $user;

	/**
	 * @var IRootFolder
	 */
	private $root;

	/**
	 * @var \OCA\Files\Service\TagService
	 */
	private $tagService;

	/**
	 * @var \OCP\ITagManager
	 */
	private $tagManager;

	protected function setUp() {
		parent::setUp();
		$this->user = $this->getUniqueID('user');
		$user = $this->createUser($this->user, 'test');
		\OC_User::setUserId($this->user);
		\OC_Util::setupFS($this->user);
		/** @var IUserSession | \PHPUnit\Framework\MockObject\MockObject $userSession */
		$userSession = $this->createMock('\OCP\IUserSession');
		$userSession->expects($this->any())
			->method('getUser')
			->withAnyParameters()
			->will($this->returnValue($user));

		$this->root = \OC::$server->getLazyRootFolder();

		$this->tagManager = \OC::$server->getTagManager();
		$this->tagService = new TagService(
			$userSession,
			$this->tagManager,
			$this->root
		);
	}

	protected function tearDown() {
		\OC_User::setUserId('');
		parent::tearDown();
	}

	public function testUpdateFileTags() {
		$tag1 = 'tag1';
		$tag2 = 'tag2';

		$subdir = $this->root->getUserFolder($this->user)->newFolder('subdir');
		$testFile = $subdir->newFile('test.txt');
		$testFile->putContent('test contents');

		$fileId = $testFile->getId();

		// set tags
		$this->tagService->updateFileTags('subdir/test.txt', [$tag1, $tag2]);
		$tags = $this->tagManager->load('files');

		$this->assertEquals([$fileId], $tags->getIdsForTag($tag1));
		$this->assertEquals([$fileId], $tags->getIdsForTag($tag2));

		// remove tag
		$this->tagService->updateFileTags('subdir/test.txt', [$tag2]);
		$this->assertEquals([], $tags->getIdsForTag($tag1));
		$this->assertEquals([$fileId], $tags->getIdsForTag($tag2));

		// clear tags
		$this->tagService->updateFileTags('subdir/test.txt', []);
		$this->assertEquals([], $tags->getIdsForTag($tag1));
		$this->assertEquals([], $tags->getIdsForTag($tag2));

		// non-existing file
		$caught = false;
		try {
			$this->tagService->updateFileTags('subdir/unexist.txt', [$tag1]);
		} catch (\OCP\Files\NotFoundException $e) {
			$caught = true;
		}
		$this->assertTrue($caught);

		$subdir->delete();
	}
}
