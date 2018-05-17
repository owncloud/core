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

namespace OCA\Files_Sharing\Tests;

use OCA\Files_Sharing\Hooks;
use Symfony\Component\EventDispatcher\GenericEvent;
use OCP\Share\IShare;
use OCP\IURLGenerator;
use OCP\Files\IRootFolder;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Test\TestCase;
use OCA\Files_Sharing\Service\NotificationPublisher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * @group DB
 */
class HooksTest extends TestCase {

	/**
	 * @var EventDispatcherInterface | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $eventDispatcher;

	/**
	 * @var IURLGenerator | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $urlGenerator;

	/**
	 * @var IRootFolder | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $rootFolder;

	/**
	 * @var \OCP\Share\IManager | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $shareManager;

	/**
	 * @var NotificationPublisher | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $notificationPublisher;

	/**
	 * @var Hooks
	 */
	private $hooks;

	public function setUp() {
		$this->eventDispatcher = new EventDispatcher();
		$this->urlGenerator = $this->createMock(IURLGenerator::class);
		$this->rootFolder = $this->createMock(IRootFolder::class);
		$this->shareManager = $this->createMock(\OCP\Share\IManager::class);
		$this->notificationPublisher = $this->createMock(NotificationPublisher::class);

		$this->hooks = new Hooks(
			$this->rootFolder,
			$this->urlGenerator,
			$this->eventDispatcher,
			$this->shareManager,
			$this->notificationPublisher
		);
		$this->hooks->registerListeners();
	}

	public function testPrivateLink() {
		$this->urlGenerator
			->expects($this->once())
			->method('linkToRoute')
			->with('files.view.index', ['view' => 'sharingin', 'scrollto' => '123'])
			->will($this->returnValue('/owncloud/index.php/apps/files/?view=sharingin&scrollto=123'));

		$share = $this->createMock(IShare::class);
		$share->expects($this->once())
			->method('getNodeId')
			->willReturn(123);

		$otherShare = $this->createMock(IShare::class);
		$otherShare->expects($this->once())
			->method('getNodeId')
			->willReturn(999);

		$this->shareManager->expects($this->exactly(2))
			->method('getSharedWith')
			->withConsecutive(
				['currentuser', \OCP\Share::SHARE_TYPE_USER],
				['currentuser', \OCP\Share::SHARE_TYPE_GROUP]
			)
			->will($this->onConsecutiveCalls(
				[$otherShare],
				[$share]
			));

		$event = new GenericEvent(null, [
			'fileid' => 123,
			'uid' => 'currentuser',
			'resolvedWebLink' => null,
			'resolvedDavLink' => null,
		]);
		$this->eventDispatcher->dispatch('files.resolvePrivateLink', $event);

		$this->assertEquals('/owncloud/index.php/apps/files/?view=sharingin&scrollto=123', $event->getArgument('resolvedWebLink'));
		$this->assertNull($event->getArgument('resolvedDavLink'));
	}

	public function testPrivateLinkNoMatch() {
		$this->urlGenerator
			->expects($this->never())
			->method('linkToRoute');

		$this->shareManager->expects($this->exactly(2))
			->method('getSharedWith')
			->willReturn([]);

		$event = new GenericEvent(null, [
			'fileid' => 123,
			'uid' => 'currentuser',
			'resolvedWebLink' => null,
			'resolvedDavLink' => null,
		]);
		$this->eventDispatcher->dispatch('files.resolvePrivateLink', $event);

		$this->assertNull($event->getArgument('resolvedWebLink'));
		$this->assertNull($event->getArgument('resolvedDavLink'));
	}

	public function testPublishShareNotification() {
		$share = $this->createMock(IShare::class);

		$this->notificationPublisher->expects($this->once())
			->method('sendNotification')
			->with($share);

		$event = new GenericEvent(null, [
			'share' => ['id' => '123'],
			'shareObject' => $share,
		]);
		$this->eventDispatcher->dispatch('share.afterCreate', $event);
	}

	public function testDiscardShareNotification() {
		$share = $this->createMock(IShare::class);

		$this->notificationPublisher->expects($this->once())
			->method('discardNotification')
			->with($share);

		$event = new GenericEvent(null, [
			'share' => ['id' => '123'],
			'shareObject' => $share,
		]);
		$this->eventDispatcher->dispatch('share.afterDelete', $event);
	}
}
