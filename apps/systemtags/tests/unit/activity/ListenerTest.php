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

namespace OCA\SystemTags\Tests\unit;

use Test\Traits\UserTrait;
use OCA\SystemTags\Activity\Listener;
use OCA\SystemTags\Activity\Extension;
use OCP\IUserSession;
use OCP\Activity\IManager;
use OCP\App\IAppManager;
use OCP\Files\Config\IMountProviderCollection;
use OCP\Files\IRootFolder;
use OCP\Files\Config\IUserMountCache;
use OCP\Files\Config\ICachedMountInfo;
use OCP\IUser;
use OCP\Files\Folder;
use OCP\Activity\IEvent;
use OCP\SystemTag\MapperEvent;
use OCP\IGroupManager;
use OCP\SystemTag\ISystemTagManager;
use OCP\SystemTag\ISystemTag;
use OC\SystemTag\SystemTag;

/**
 * Tests for the activity listener
 *
 * @group DB
 */
class ActivityListenerTest extends \Test\TestCase {
	use UserTrait;

	/**
	 * @var IGroupManager
	 */
	private $groupManager;

	/**
	 * @var ISystemTagManager
	 */
	private $tagManager;

	/**
	 * @var Listener
	 */
	private $listener;

	/**
	 * @var IUserMountCache
	 */
	private $userMountCache;

	/**
	 * @var IRootFolder
	 */
	private $rootFolder;

	/**
	 * @var IUserSession
	 */
	private $userSession;

	/**
	 * @var IManager
	 */
	private $activityManager;

	protected function setUp() {
		parent::setUp();

		$this->groupManager = $this->createMock(IGroupManager::class);

		$this->tagManager = $this->createMock(ISystemTagManager::class);
		$this->activityManager = $this->createMock(IManager::class);
		$this->userSession = $this->createMock(IUserSession::class);

		$appManager = $this->createMock(IAppManager::class);
		$appManager->method('isInstalled')->with('activity')->willReturn(true);

		$this->userMountCache = $this->createMock(IUserMountCache::class);

		$mountProviderCollection = $this->createMock(IMountProviderCollection::class);
		$mountProviderCollection->method('getMountCache')->willReturn($this->userMountCache);

		$this->rootFolder = $this->createMock(IRootFolder::class);

		$this->listener = $this->getMockBuilder(Listener::class)
			->setConstructorArgs([
				$this->groupManager,
				$this->activityManager,
				$this->userSession,
				$this->tagManager,
				$appManager,
				$mountProviderCollection,
				$this->rootFolder
			])
			->setMethods(['getUsersSharingFile'])
			->getMock();
	}

	public function providesEventTypes() {
		return [
			[MapperEvent::EVENT_ASSIGN, Extension::ASSIGN_TAG],
			[MapperEvent::EVENT_UNASSIGN, Extension::UNASSIGN_TAG],
		];
	}

	/**
	 * @dataProvider providesEventTypes
	 */
	public function testActivityOnMapperEvent($eventType, $extensionEvent) {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('user1');

		$actor = $this->createMock(IUser::class);
		$actor->method('getUID')->willReturn('actor1');

		$this->userSession->method('getUser')->willReturn($actor);

		$tag1 = $this->createMock(ISystemTag::class);
		$tag1->method('isUserVisible')->willReturn(true);
		$tag1->method('isUserAssignable')->willReturn(true);
		$tag1->method('isUserEditable')->willReturn(true);
		$tag1->method('getName')->willReturn('tag1');

		$tag2 = $this->createMock(ISystemTag::class);
		$tag2->method('isUserVisible')->willReturn(true);
		$tag2->method('isUserAssignable')->willReturn(false);
		$tag2->method('isUserEditable')->willReturn(false);
		$tag2->method('getName')->willReturn('tag2');

		$invisibleTag = $this->createMock(ISystemTag::class);
		$invisibleTag->method('isUserVisible')->willReturn(false);

		$this->groupManager->method('isAdmin')->willReturn(false);

		$this->tagManager->method('getTagsByIds')
			->with([111, 222, 333])
			->willReturn([$tag1, $tag2, $invisibleTag]);

		$cachedMountInfo = $this->createMock(ICachedMountInfo::class);
		$cachedMountInfo->method('getUser')->willReturn($user);

		$node = $this->createMock(Folder::class);
		$node->method('getPath')->willReturn('/user1/files/folder');

		$ownerFolder = $this->createMock(Folder::class);
		$ownerFolder->method('getById')
			->with(123, true)
			->willReturn([$node]);

		$this->rootFolder->method('getUserFolder')
			->with('user1')
			->willReturn($ownerFolder);

		$this->userMountCache->method('getMountsForFileId')
			->with(123)
			->willReturn([$cachedMountInfo]);

		$this->listener->method('getUsersSharingFile')->willReturn(['user1' => '/folder']);

		$activityEvent = $this->createMock(IEvent::class);
		$activityEvent->expects($this->once())->method('setApp')->with('systemtags')->willReturn($activityEvent);
		$activityEvent->expects($this->once())->method('setType')->with('systemtags')->willReturn($activityEvent);
		$activityEvent->expects($this->once())->method('setAuthor')->with('actor1')->willReturn($activityEvent);
		$activityEvent->expects($this->once())->method('setObject')->with('files', 123)->willReturn($activityEvent);
		$activityEvent->expects($this->exactly(2))->method('setSubject')
			->withConsecutive(
				[$extensionEvent, ['actor1', '/folder', '{{{tag1|||assignable}}}']],
				[$extensionEvent, ['actor1', '/folder', '{{{tag2|||not-assignable}}}']]
			)
			->willReturn($activityEvent);

		$this->activityManager->method('generateEvent')
			->willReturn($activityEvent);
		$this->activityManager->expects($this->exactly(2))
			->method('publish')
			->with($activityEvent);

		$event = new MapperEvent($eventType, 'files', 123, [111, 222, 333]);
		$this->listener->mapperEvent($event);
	}

	public function prepareTagAsParameterProvider() {
		return [
			[new SystemTag('1', 'visibleTag', true, true, true), "{{{visibleTag|||assignable}}}"],
			[new SystemTag('2', 'invisibleTag', false, false, false), "{{{invisibleTag|||invisible}}}"],
			[new SystemTag('3', 'restrictTag', true, false, false), "{{{restrictTag|||not-assignable}}}"],
			[new SystemTag('3', 'staticTag', true, true, false), "{{{staticTag|||not-editable}}}"],
		];
	}

	/**
	 * @dataProvider prepareTagAsParameterProvider
	 */
	public function testPrepareTagAsParameter(SystemTag $tag, $expectedResult) {
		$result = $this->invokePrivate($this->listener, 'prepareTagAsParameter', [$tag]);
		$this->assertEquals($expectedResult, $result);
	}
}
