<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace OCA\SystemTags\Tests;

use OCA\SystemTags\Activity\Listener;
use OCP\Activity\IEvent;
use OCP\Activity\IManager;
use OCP\App\IAppManager;
use OCP\Files\Config\IMountProviderCollection;
use OCP\Files\IRootFolder;
use OCP\IGroup;
use OCP\IGroupManager;
use OCP\IUser;
use OCP\IUserSession;
use OCP\SystemTag\ISystemTag;
use OCP\SystemTag\ISystemTagManager;
use OCP\SystemTag\ManagerEvent;
use OCP\SystemTag\MapperEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;
use Test\TestCase;

class ListenerTest extends TestCase {
	/** @var  IGroupManager | \PHPUnit_Framework_MockObject_MockObject*/
	private $groupManager;
	/** @var  IManager| \PHPUnit_Framework_MockObject_MockObject */
	private $activityManager;
	/** @var  IUserSession | \PHPUnit_Framework_MockObject_MockObject */
	private $userSession;
	/** @var  ISystemTagManager | \PHPUnit_Framework_MockObject_MockObject */
	private $systemTagManager;
	/** @var  IAppManager | \PHPUnit_Framework_MockObject_MockObject */
	private $appManager;
	/** @var  IMountProviderCollection | \PHPUnit_Framework_MockObject_MockObject */
	private $mountProviderCollection;
	/** @var  IRootFolder | \PHPUnit_Framework_MockObject_MockObject */
	private $rootFolder;
	/** @var  EventDispatcher */
	private $eventDispatcher;
	/** @var  Listener */
	private $listener;

	protected function setUp() {
		parent::setUp();

		$this->groupManager = $this->createMock(IGroupManager::class);
		$this->activityManager = $this->createMock(IManager::class);
		$this->userSession = $this->createMock(IUserSession::class);
		$this->systemTagManager = $this->createMock(ISystemTagManager::class);
		$this->appManager = $this->createMock(IAppManager::class);
		$this->mountProviderCollection = $this->createMock(IMountProviderCollection::class);
		$this->rootFolder = $this->createMock(IRootFolder::class);
		$this->eventDispatcher = new EventDispatcher();

		$this->listener = new Listener($this->groupManager, $this->activityManager,
			$this->userSession, $this->systemTagManager, $this->appManager,
			$this->mountProviderCollection, $this->rootFolder, $this->eventDispatcher);
	}

	public function testCreateEvent() {
		$systemTag = $this->createMock(ISystemTag::class);
		$systemTag->expects($this->any())
			->method('getName')
			->willReturn('footag');
		$managerEvent = new ManagerEvent('OCP\SystemTag\ISystemTagManager::createTag', $systemTag);

		$iUser = $this->createMock(IUser::class);
		$iUser->expects($this->any())
			->method('getUID')
			->willReturn('foo');
		$this->userSession->expects($this->once())
			->method('getUser')
			->willReturn($iUser);

		$iEvent = $this->createMock(IEvent::class);
		$iEvent->expects($this->once())
			->method('setApp')
			->willReturn($iEvent);
		$iEvent->expects($this->once())
			->method('setType')
			->willReturn($iEvent);
		$iEvent->expects($this->once())
			->method('setAuthor')
			->willReturn($iEvent);
		$this->activityManager->expects($this->once())
			->method('generateEvent')
			->willReturn($iEvent);

		$iGroup = $this->createMock(IGroup::class);
		$iGroup->expects($this->once())
			->method('getUsers')
			->willReturn([$iUser]);
		$this->groupManager->expects($this->once())
			->method('get')
			->willReturn($iGroup);

		$calledCreateEvent = [];
		$this->eventDispatcher->addListener('tag.created',
			function (GenericEvent $event) use (&$calledCreateEvent) {
				$calledCreateEvent[] = 'tag.created';
				$calledCreateEvent[] = $event;
			});

		$this->listener->event($managerEvent);

		$this->assertEquals('tag.created', $calledCreateEvent[0]);
		$this->assertInstanceOf(GenericEvent::class, $calledCreateEvent[1]);
		$this->assertArrayHasKey('action', $calledCreateEvent[1]);
		$this->assertEquals('create', $calledCreateEvent[1]->getArgument('action'));
		$this->assertArrayHasKey('user', $calledCreateEvent[1]);
		$this->assertSame($iUser, $calledCreateEvent[1]->getArgument('user'));
		$this->assertArrayHasKey('tag', $calledCreateEvent[1]);
		$this->assertInstanceOf(ISystemTag::class, $calledCreateEvent[1]->getArgument('tag'));
		$this->assertEquals('footag', $calledCreateEvent[1]->getArgument('tag')->getName());
	}

	public function testUpdateEvent() {
		$systemTag = $this->createMock(ISystemTag::class);
		$systemTag->expects($this->any())
			->method('getName')
			->willReturn('newfootag');
		$beforeSystemTag = $this->createMock(ISystemTag::class);
		$beforeSystemTag->expects($this->any())
			->method('getName')
			->willReturn('footag');
		$managerEvent = new ManagerEvent('OCP\SystemTag\ISystemTagManager::updateTag', $systemTag, $beforeSystemTag);

		$iUser = $this->createMock(IUser::class);
		$iUser->expects($this->any())
			->method('getUID')
			->willReturn('foo');
		$this->userSession->expects($this->once())
			->method('getUser')
			->willReturn($iUser);

		$iEvent = $this->createMock(IEvent::class);
		$iEvent->expects($this->once())
			->method('setApp')
			->willReturn($iEvent);
		$iEvent->expects($this->once())
			->method('setType')
			->willReturn($iEvent);
		$iEvent->expects($this->once())
			->method('setAuthor')
			->willReturn($iEvent);
		$this->activityManager->expects($this->once())
			->method('generateEvent')
			->willReturn($iEvent);

		$iGroup = $this->createMock(IGroup::class);
		$iGroup->expects($this->once())
			->method('getUsers')
			->willReturn([$iUser]);
		$this->groupManager->expects($this->once())
			->method('get')
			->willReturn($iGroup);

		$calledCreateEvent = [];
		$this->eventDispatcher->addListener('tag.updated',
			function (GenericEvent $event) use (&$calledCreateEvent) {
				$calledCreateEvent[] = 'tag.updated';
				$calledCreateEvent[] = $event;
			});

		$this->listener->event($managerEvent);

		$this->assertEquals('tag.updated', $calledCreateEvent[0]);
		$this->assertInstanceOf(GenericEvent::class, $calledCreateEvent[1]);
		$this->assertArrayHasKey('action', $calledCreateEvent[1]);
		$this->assertEquals('update', $calledCreateEvent[1]->getArgument('action'));
		$this->assertArrayHasKey('user', $calledCreateEvent[1]);
		$this->assertSame($iUser, $calledCreateEvent[1]->getArgument('user'));
		$this->assertArrayHasKey('tag', $calledCreateEvent[1]);
		$this->assertInstanceOf(ISystemTag::class, $calledCreateEvent[1]->getArgument('tag'));
		$this->assertEquals('newfootag', $calledCreateEvent[1]->getArgument('tag')->getName());
		$this->assertArrayHasKey('oldTag', $calledCreateEvent[1]);
		$this->assertInstanceOf(ISystemTag::class, $calledCreateEvent[1]->getArgument('oldTag'));
		$this->assertEquals('footag', $calledCreateEvent[1]->getArgument('oldTag')->getName());
	}

	public function testDeleteEvent() {
		$systemTag = $this->createMock(ISystemTag::class);
		$systemTag->expects($this->any())
			->method('getName')
			->willReturn('footag');
		$managerEvent = new ManagerEvent('OCP\SystemTag\ISystemTagManager::deleteTag', $systemTag);

		$iUser = $this->createMock(IUser::class);
		$iUser->expects($this->any())
			->method('getUID')
			->willReturn('foo');
		$this->userSession->expects($this->once())
			->method('getUser')
			->willReturn($iUser);

		$iEvent = $this->createMock(IEvent::class);
		$iEvent->expects($this->once())
			->method('setApp')
			->willReturn($iEvent);
		$iEvent->expects($this->once())
			->method('setType')
			->willReturn($iEvent);
		$iEvent->expects($this->once())
			->method('setAuthor')
			->willReturn($iEvent);
		$this->activityManager->expects($this->once())
			->method('generateEvent')
			->willReturn($iEvent);

		$iGroup = $this->createMock(IGroup::class);
		$iGroup->expects($this->once())
			->method('getUsers')
			->willReturn([$iUser]);
		$this->groupManager->expects($this->once())
			->method('get')
			->willReturn($iGroup);

		$calledCreateEvent = [];
		$this->eventDispatcher->addListener('tag.deleted',
			function (GenericEvent $event) use (&$calledCreateEvent) {
				$calledCreateEvent[] = 'tag.deleted';
				$calledCreateEvent[] = $event;
			});

		$this->listener->event($managerEvent);

		$this->assertEquals('tag.deleted', $calledCreateEvent[0]);
		$this->assertInstanceOf(GenericEvent::class, $calledCreateEvent[1]);
		$this->assertArrayHasKey('action', $calledCreateEvent[1]);
		$this->assertEquals('delete', $calledCreateEvent[1]->getArgument('action'));
		$this->assertArrayHasKey('user', $calledCreateEvent[1]);
		$this->assertSame($iUser, $calledCreateEvent[1]->getArgument('user'));
		$this->assertArrayHasKey('tag', $calledCreateEvent[1]);
		$this->assertInstanceOf(ISystemTag::class, $calledCreateEvent[1]->getArgument('tag'));
		$this->assertEquals('footag', $calledCreateEvent[1]->getArgument('tag')->getName());
	}

	public function testMapperEventForNull() {
		$mapperEVent = new MapperEvent('test', 'files', '1', []);
		$this->assertNull($this->listener->mapperEvent($mapperEVent));

		$this->appManager->expects($this->once())
			->method('isInstalled')
			->willReturn(true);
		$mapperEVent = new MapperEvent(MapperEvent::EVENT_ASSIGN, 'files', '1', ['foo']);
		$this->assertNull($this->listener->mapperEvent($mapperEVent));
	}

	public function providesSystemTagData() {
		return [
			['foo', 'notVisible'],
			['bar', 'notAssignable'],
			['foobar', 'ok']
		];
	}

	/**
	 * @dataProvider providesSystemTagData
	 * @param $name
	 * @param $type
	 */
	public function testPrepareTagAsParameter($name, $type) {
		$systemTag = $this->createMock(ISystemTag::class);
		$systemTag->expects($this->any())
			->method('getName')
			->willReturn($name);

		if ($type === 'notVisible') {
			$systemTag->expects($this->once())
				->method('isUserVisible')
				->willReturn(false);
		} elseif ($type === 'notAssignable') {
			$systemTag->expects($this->once())
				->method('isUserVisible')
				->willReturn(true);
			$systemTag->expects($this->once())
				->method('isUserAssignable')
				->willReturn(false);
		} else {
			$systemTag->expects($this->once())
				->method('isUserVisible')
				->willReturn(true);
			$systemTag->expects($this->once())
				->method('isUserAssignable')
				->willReturn(true);
		}

		$result = $this->invokePrivate($this->listener, 'prepareTagAsParameter', [$systemTag]);

		if ($type === 'notVisible') {
			$this->assertEquals('{{{' . $name . '|||invisible}}}', $result);
		} elseif ($type === 'notAssignable') {
			$this->assertEquals('{{{' . $name . '|||not-assignable}}}', $result);
		} elseif ($type === 'ok') {
			$this->assertEquals('{{{' . $name . '|||assignable}}}', $result);
		}
	}
}
