<?php
/**
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

use OCA\Files\ActivityHelper;
use OCP\ITagManager;
use OCP\ITags;
use Test\Traits\UserTrait;

/**
 * Class ActivityHelperTest
 *
 * @group DB
 */
class ActivityHelperTest extends \Test\TestCase {
	use UserTrait;

	/**
	 * @var ITagManager
	 */
	private $tagManager;

	/**
	 * @var ITags
	 */
	private $tags;

	/**
	 * @var ActivityHelper
	 */
	private $helper;

	/**
	 * @var string
	 */
	private $user;

	protected function setUp(): void {
		parent::setUp();

		$this->tags = $this->createMock(ITags::class);

		$this->user = $this->getUniqueID('files_activityhelpertest_user_');

		// because \OC::$server->getUserFolder()
		$this->createUser($this->user);
		$this->loginAsUser($this->user);

		$this->tagManager = $this->createMock(ITagManager::class);
		$this->tagManager->expects($this->once())
			->method('load')
			->with('files', [], false, $this->user)
			->willReturn($this->tags);

		$this->helper = new ActivityHelper($this->tagManager);
	}

	/**
	 * @expectedException \RuntimeException
	 * @expectedExceptionMessage No favorites
	 */
	public function testGetFavoriteFilePathsNoFavorites() {
		$this->tags->method('getFavorites')->willReturn([]);
		$this->helper->getFavoriteFilePaths($this->user);
	}

	/**
	 * @expectedException \RuntimeException
	 * @expectedExceptionMessage Too many favorites
	 */
	public function testGetFavoriteFilePathsTooManyFavorites() {
		$tooManyFavorites = [];
		for ($i = 0; $i < ActivityHelper::FAVORITE_LIMIT + 1; $i++) {
			$tooManyFavorites[] = [];
		}

		$this->tags->method('getFavorites')->willReturn($tooManyFavorites);

		$this->helper->getFavoriteFilePaths($this->user);
	}

	public function testGetFavoriteFilePaths() {
		$userFolder = \OC::$server->getUserFolder();
		$fav1 = $userFolder->newFolder('fav1');
		$fav2 = $userFolder->newFile('fav2.txt');
		$userFolder->newFolder('nonfav1');
		$userFolder->newFolder('nonfav2');

		$favorites = [
			$fav1->getId(),
			$fav2->getId(),
			$fav2->getId() + 999, // non-existing
		];

		$this->tags->method('getFavorites')->willReturn($favorites);

		$result = $this->helper->getFavoriteFilePaths($this->user);

		$this->assertEquals(['/fav1', '/fav2.txt'], $result['items']);
		$this->assertEquals(['/fav1'], $result['folders']);
	}

	/**
	 * @expectedException \RuntimeException
	 * @expectedExceptionMessage No favorites
	 */
	public function testGetFavoriteFilePathsMissingFolder() {
		$userFolder = \OC::$server->getUserFolder();
		$aFolder = $userFolder->newFolder('x');

		$favorites = [
			// non-existing
			$aFolder->getId() + 999,
		];

		$this->tags->method('getFavorites')->willReturn($favorites);

		$result = $this->helper->getFavoriteFilePaths($this->user);
	}
}
