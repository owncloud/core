<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\FederatedFileSharing\Tests;

use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\FederatedFileSharing\FedShareManager;
use OCA\Files_Sharing\Activity;
use OCP\Activity\IEvent;
use OCP\Activity\IManager;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\Share\IShare;

/**
 * Class FedShareManagerTest
 *
 * @package OCA\FederatedFileSharing\Tests
 * @group DB
 */
class FedShareManagerTest extends TestCase {
	private $federatedShareProvider;

	/** @var IUserManager | \PHPUnit_Framework_MockObject_MockObject */
	private $userManager;

	/** @var IManager | \PHPUnit_Framework_MockObject_MockObject */
	private $activityManager;

	/** @var ILogger | \PHPUnit_Framework_MockObject_MockObject */
	private $logger;

	/** @var FedShareManager | \PHPUnit_Framework_MockObject_MockObject */
	private $fedShareManager;

	protected function setUp() {
		parent::setUp();

		$this->federatedShareProvider = $this->getMockBuilder(
			FederatedShareProvider::class
		)->disableOriginalConstructor()->getMock();
		$this->userManager = $this->getMockBuilder(IUserManager::class)
			->getMock();
		$this->activityManager = $this->getMockBuilder(IManager::class)
			->getMock();
		$this->logger = $this->getMockBuilder(ILogger::class)
			->getMock();

		$this->fedShareManager = $this->getMockBuilder(FedShareManager::class)
			->setConstructorArgs(
				[
					$this->federatedShareProvider,
					$this->userManager,
					$this->activityManager,
					$this->logger
				]
			)
			->setMethods(['getFile'])
			->getMock();
	}

	public function testAcceptShare() {
		$this->fedShareManager->expects($this->once())
			->method('getFile')
			->willReturn(['/file','http://file']);

		$node = $this->getMockBuilder(\OCP\Files\File::class)
			->disableOriginalConstructor()->getMock();
		$node->expects($this->once())
			->method('getId')
			->willReturn(42);

		$share = $this->getMockBuilder(IShare::class)->getMock();
		$share->expects($this->once())
			->method('getNode')
			->willReturn($node);

		$event = $this->getMockBuilder(IEvent::class)->getMock();
		$event->expects($this->any())
			->method($this->anything())
			->willReturnSelf();
		$event->expects($this->at(3))
			->method($this->anything())
			->with(Activity::SUBJECT_REMOTE_SHARE_ACCEPTED)
			->willReturnSelf();

		$this->activityManager->expects($this->once())
			->method('generateEvent')
			->willReturn($event);

		$this->fedShareManager->acceptShare($share);
	}

	public function testDeclineShare() {
		$this->fedShareManager->expects($this->once())
			->method('getFile')
			->willReturn(['/file','http://file']);

		$node = $this->getMockBuilder(\OCP\Files\File::class)
			->disableOriginalConstructor()->getMock();
		$node->expects($this->once())
			->method('getId')
			->willReturn(42);

		$share = $this->getMockBuilder(IShare::class)->getMock();
		$share->expects($this->once())
			->method('getNode')
			->willReturn($node);

		$event = $this->getMockBuilder(IEvent::class)->getMock();
		$event->expects($this->any())
			->method($this->anything())
			->willReturnSelf();
		$event->expects($this->at(3))
			->method($this->anything())
			->with(Activity::SUBJECT_REMOTE_SHARE_DECLINED)
			->willReturnSelf();

		$this->activityManager->expects($this->once())
			->method('generateEvent')
			->willReturn($event);

		$this->fedShareManager->declineShare($share);
	}
}
