<?php
/**
* ownCloud
*
* @author Thomas Tanghus
* @copyright Copyright (c) 2012-13 Thomas Tanghus (thomas@tanghus.net)
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either
* version 3 of the License, or any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*
* You should have received a copy of the GNU Affero General Public
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
*
*/

namespace Test;
use OC\Tagging\TagMapper;
use OC\TagManager;
use Test\Traits\UserTrait;

/**
 * Class TagsTest
 *
 * @group DB
 */
class TagsTest extends TestCase {
	use UserTrait;

	protected $objectType;
	/** @var \OCP\IUser */
	protected $user;
	/** @var \OCP\IUserSession */
	protected $userSession;
	protected $backupGlobals = false;
	/** @var TagMapper */
	protected $tagMapper;
	/** @var \OCP\ITagManager */
	protected $tagMgr;

	protected function setUp() {
		parent::setUp();

		$userId = $this->getUniqueID('user_');
		$this->user = $this->createUser($userId, 'pass');
		\OC_User::setUserId($userId);
		$this->userSession = $this->createMock('\OCP\IUserSession');
		$this->userSession
			->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$this->objectType = $this->getUniqueID('type_');
		$this->tagMapper = new TagMapper(\OC::$server->getDatabaseConnection());
		$this->tagMgr = new TagManager($this->tagMapper, $this->userSession);
	}

	protected function tearDown() {
		$conn = \OC::$server->getDatabaseConnection();
		$conn->executeQuery('DELETE FROM `*PREFIX*vcategory_to_object`');
		$conn->executeQuery('DELETE FROM `*PREFIX*vcategory`');

		parent::tearDown();
	}

	public function testTagManagerWithoutUserReturnsNull() {
		$this->userSession = $this->createMock('\OCP\IUserSession');
		$this->userSession
			->expects($this->any())
			->method('getUser')
			->will($this->returnValue(null));
		$this->tagMgr = new TagManager($this->tagMapper, $this->userSession);
		$this->assertNull($this->tagMgr->load($this->objectType));
	}

	public function testInstantiateWithDefaults() {
		$defaultTags = ['Friends', 'Family', 'Work', 'Other'];

		$tagger = $this->tagMgr->load($this->objectType, $defaultTags);

		$this->assertCount(4, $tagger->getTags());
	}

	public function testAddTags() {
		$tags = ['Friends', 'Family', 'Work', 'Other'];

		$tagger = $this->tagMgr->load($this->objectType);

		foreach ($tags as $tag) {
			$result = $tagger->add($tag);
			$this->assertGreaterThan(0, $result, 'add() returned an ID <= 0');
			$this->assertTrue((bool)$result);
		}

		$this->assertFalse($tagger->add('Family'));
		$this->assertFalse($tagger->add('fAMILY'));

		$this->assertCount(4, $tagger->getTags(), 'Wrong number of added tags');
	}

	public function testAddMultiple() {
		$tags = ['Friends', 'Family', 'Work', 'Other'];

		$tagger = $this->tagMgr->load($this->objectType);

		foreach ($tags as $tag) {
			$this->assertFalse($tagger->hasTag($tag));
		}

		$result = $tagger->addMultiple($tags);
		$this->assertTrue((bool)$result);

		foreach ($tags as $tag) {
			$this->assertTrue($tagger->hasTag($tag));
		}

		$tagMaps = $tagger->getTags();
		$this->assertCount(4, $tagMaps, 'Not all tags added');
		foreach ($tagMaps as $tagMap) {
			$this->assertNull($tagMap['id']);
		}

		// As addMultiple has been called without $sync=true, the tags aren't
		// saved to the database, so they're gone when we reload $tagger:

		$tagger = $this->tagMgr->load($this->objectType);
		$this->assertCount(0, $tagger->getTags());

		// Now, we call addMultiple() with $sync=true so the tags will be
		// be saved to the database.
		$result = $tagger->addMultiple($tags, true);
		$this->assertTrue((bool)$result);

		$tagMaps = $tagger->getTags();
		foreach ($tagMaps as $tagMap) {
			$this->assertNotNull($tagMap['id']);
		}

		// Reload the tagger.
		$tagger = $this->tagMgr->load($this->objectType);

		foreach ($tags as $tag) {
			$this->assertTrue($tagger->hasTag($tag));
		}

		$this->assertCount(4, $tagger->getTags(), 'Not all previously saved tags found');
	}

	public function testIsEmpty() {
		$tagger = $this->tagMgr->load($this->objectType);

		$this->assertCount(0, $tagger->getTags());
		$this->assertTrue($tagger->isEmpty());

		$result = $tagger->add('Tag');
		$this->assertGreaterThan(0, $result, 'add() returned an ID <= 0');
		$this->assertNotFalse($result, 'add() returned false');
		$this->assertFalse($tagger->isEmpty());
	}

	public function testGetTagsForObjects() {
		$defaultTags = ['Friends', 'Family', 'Work', 'Other'];
		$tagger = $this->tagMgr->load($this->objectType, $defaultTags);

		$tagger->tagAs(1, 'Friends');
		$tagger->tagAs(1, 'Other');
		$tagger->tagAs(2, 'Family');

		$tags = $tagger->getTagsForObjects([1]);
		$this->assertCount(1, $tags);
		$tags = \current($tags);
		\sort($tags);
		$this->assertSame(['Friends', 'Other'], $tags);

		$tags = $tagger->getTagsForObjects([1, 2]);
		$this->assertCount(2, $tags);
		$tags1 = $tags[1];
		\sort($tags1);
		$this->assertSame(['Friends', 'Other'], $tags1);
		$this->assertSame(['Family'], $tags[2]);
		$this->assertEquals(
			[],
			$tagger->getTagsForObjects([4])
		);
		$this->assertEquals(
			[],
			$tagger->getTagsForObjects([4, 5])
		);
	}

	public function testGetTagsForObjectsMassiveResults() {
		$defaultTags = ['tag1'];
		$tagger = $this->tagMgr->load($this->objectType, $defaultTags);
		$tagData = $tagger->getTags();
		$tagId = $tagData[0]['id'];
		$tagType = $tagData[0]['type'];

		$conn = \OC::$server->getDatabaseConnection();
		$statement = $conn->prepare(
				'INSERT INTO `*PREFIX*vcategory_to_object` ' .
				'(`objid`, `categoryid`, `type`) VALUES ' .
				'(?, ?, ?)'
		);

		// insert lots of entries
		$idsArray = [];
		for ($i = 1; $i <= 1500; $i++) {
			$statement->execute([$i, $tagId, $tagType]);
			$idsArray[] = $i;
		}

		$tags = $tagger->getTagsForObjects($idsArray);
		$this->assertCount(1500, $tags);
	}

	public function testDeleteTags() {
		$defaultTags = ['Friends', 'Family', 'Work', 'Other'];
		$tagger = $this->tagMgr->load($this->objectType, $defaultTags);

		$this->assertCount(4, $tagger->getTags());

		$tagger->delete('family');
		$this->assertCount(3, $tagger->getTags());

		$tagger->delete(['Friends', 'Work', 'Other']);
		$this->assertCount(0, $tagger->getTags());
	}

	public function testRenameTag() {
		$defaultTags = ['Friends', 'Family', 'Wrok', 'Other'];
		$tagger = $this->tagMgr->load($this->objectType, $defaultTags);

		$this->assertTrue($tagger->rename('Wrok', 'Work'));
		$this->assertTrue($tagger->hasTag('Work'));
		$this->assertFalse($tagger->hasTag('Wrok'));
		$this->assertFalse($tagger->rename('Wrok', 'Work')); // Rename non-existant tag.
		$this->assertFalse($tagger->rename('Work', 'Family')); // Collide with existing tag.
	}

	public function testTagAs() {
		$objids = [1, 2, 3, 4, 5, 6, 7, 8, 9];

		$tagger = $this->tagMgr->load($this->objectType);

		foreach ($objids as $id) {
			$this->assertTrue($tagger->tagAs($id, 'Family'));
		}

		$this->assertCount(1, $tagger->getTags());
		$this->assertCount(9, $tagger->getIdsForTag('Family'));
	}

	/**
	* @depends testTagAs
	*/
	public function testUnTag() {
		$objIds = [1, 2, 3, 4, 5, 6, 7, 8, 9];

		// Is this "legal"?
		$this->testTagAs();
		$tagger = $this->tagMgr->load($this->objectType);

		foreach ($objIds as $id) {
			$this->assertContains($id, $tagger->getIdsForTag('Family'));
			$tagger->unTag($id, 'Family');
			$this->assertNotContains($id, $tagger->getIdsForTag('Family'));
		}

		$this->assertCount(1, $tagger->getTags());
		$this->assertCount(0, $tagger->getIdsForTag('Family'));
	}

	public function testFavorite() {
		$tagger = $this->tagMgr->load($this->objectType);
		$this->assertTrue($tagger->addToFavorites(1));
		$this->assertEquals([1], $tagger->getFavorites());
		$this->assertTrue($tagger->removeFromFavorites(1));
		$this->assertEquals([], $tagger->getFavorites());
	}
}
