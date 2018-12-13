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

namespace OCA\Comments\Tests\unit;

use OCA\Comments\Activity\Listener;
use OCP\Comments\CommentsEntityEvent;
use Test\Traits\UserTrait;
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
use OCA\Comments\Activity\Extension;
use OCP\Comments\IComment;
use OCP\Comments\CommentsEvent;

/**
 * Tests for the activity listener
 *
 * @group DB
 */
class ActivityListenerTest extends \Test\TestCase {
	use UserTrait;

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

		$this->activityManager = $this->createMock(IManager::class);
		$this->userSession = $this->createMock(IUserSession::class);
		$appManager = $this->createMock(IAppManager::class);
		$appManager->method('isInstalled')->with('activity')->willReturn(true);

		$this->userMountCache = $this->createMock(IUserMountCache::class);

		$mountProviderCollection = $this->createMock(IMountProviderCollection::class);
		$mountProviderCollection->method('getMountCache')->willReturn($this->userMountCache);

		$this->rootFolder = $this->createMock(IRootFolder::class);

		// needed for the one unmockable static method "Share::getUsersSharingFile"...
		$this->createUser('user1');
		$this->createUser('actor1');

		$this->listener = new Listener(
			$this->activityManager,
			$this->userSession,
			$appManager,
			$mountProviderCollection,
			$this->rootFolder
		);
	}

	public function testActivityOnFilesComment() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('user1');

		$actor = $this->createMock(IUser::class);
		$actor->method('getUID')->willReturn('actor1');

		$this->userSession->method('getUser')->willReturn($actor);

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

		$activityEvent = $this->createMock(IEvent::class);
		$activityEvent->expects($this->once())->method('setApp')->with('comments')->willReturn($activityEvent);
		$activityEvent->expects($this->once())->method('setType')->with('comments')->willReturn($activityEvent);
		$activityEvent->expects($this->once())->method('setAuthor')->with('actor1')->willReturn($activityEvent);
		$activityEvent->expects($this->once())->method('setObject')->with('files', 123)->willReturn($activityEvent);
		$activityEvent->expects($this->once())->method('setMessage')->with(Extension::ADD_COMMENT_MESSAGE, [111])->willReturn($activityEvent);

		$this->activityManager->method('generateEvent')
			->willReturn($activityEvent);
		$this->activityManager->expects($this->once())
			->method('publish')
			->with($activityEvent);

		$comment = $this->createMock(IComment::class);
		$comment->method('getObjectType')->willReturn('files');
		$comment->method('getObjectId')->willReturn(123);
		$comment->method('getId')->willReturn(111);

		$commentsEvent = new CommentsEvent(CommentsEvent::EVENT_ADD, $comment);
		$this->listener->commentEvent($commentsEvent);
	}
}
