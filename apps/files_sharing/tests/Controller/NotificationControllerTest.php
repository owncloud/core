<?php
/**
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\Files_Sharings\Tests\Controller;

use OC\Share\MailNotifications;
use OCA\Files_Sharing\Controller\NotificationController;
use OCP\Files\IRootFolder;
use OCP\IGroupManager;
use OCP\IL10N;
use OCP\IRequest;
use OCP\IUser;
use OCP\IUserManager;
use OCP\IUserSession;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;

class NotificationControllerTest extends TestCase {
	/** @var IRequest | MockObject */
	private $request;
	/** @var MailNotifications | MockObject */
	private $mailNotifications;
	/** @var IUserSession | MockObject */
	private $userSession;
	/** @var IUserManager | MockObject */
	private $userManager;
	/** @var IGroupManager | MockObject */
	private $groupManager;
	/** @var IRootFolder | MockObject */
	private $rootFolder;
	/** @var IL10N | MockObject */
	private $l;
	/** @var NotificationController $notificationController */
	private $notificationController;

	protected function setUp(): void {
		parent::setUp();
		$this->request = $this->createMock(IRequest::class);
		$this->mailNotifications = $this->createMock(MailNotifications::class);
		$this->userSession = $this->createMock(IUserSession::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->groupManager = $this->createMock(IGroupManager::class);
		$this->rootFolder = $this->createMock(IRootFolder::class);
		$this->l = $this->createMock(IL10N::class);

		$this->notificationController = new NotificationController(
			'files_sharing',
			$this->request,
			$this->mailNotifications,
			$this->userSession,
			$this->userManager,
			$this->groupManager,
			$this->rootFolder,
			$this->l
		);
	}

	public function dataNotifyPublicLinkByEmail() {
		$mockUser = $this->createMock(IUser::class);
		return [
			[$mockUser, [], 100],
			[null, [], 400],
			[$mockUser, ['failed@user'], 400]
		];
	}

	/**
	 * @dataProvider dataNotifyPublicLinkByEmail
	 * @param IUser $sender
	 * @param string[] $failedRecipients
	 * @param int $statusCode
	 */
	public function testNotifyPublicLinkRecipientsByEmail($sender, $failedRecipients, $statusCode) {
		$this->mailNotifications->method('sendLinkShareMail')->willReturn($failedRecipients);
		$this->userSession->method('getUser')->willReturn($sender);
		$this->assertEquals($statusCode,
			$this->notificationController->notifyPublicLinkRecipientsByEmail(
				'localhost/token',
				['failed@user'],
				''
			)->getStatusCode()
		);
	}
}
