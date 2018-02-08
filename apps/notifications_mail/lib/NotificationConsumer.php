<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
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

namespace OCA\notifications_mail;

use OCP\Notification\IApp;
use OCP\Notification\INotification;
use OCP\IUserManager;
use OCP\ILogger;
use OCP\IURLGenerator;
use OCA\notifications_mail\NotificationSender;

class NotificationConsumer implements IApp {
	/** @var NotificationSender */
	private $sender;

	/** @var IUserManager */
	private $userManager;

	/** @var ILogger */
	private $logger;

	/** @var IURLGenerator */
	private $urlGenerator;

	private $appName = 'notifications_mail';

	public function __construct(NotificationSender $sender, IUserManager $userManager, ILogger $logger, IURLGenerator $urlGenerator) {
		$this->sender = $sender;
		$this->userManager = $userManager;
		$this->logger = $logger;
		$this->urlGenerator = $urlGenerator;
	}

	public function notify(INotification $notification) {
		$nObjectType = $notification->getObjectType();
		$nObjectId = $notification->getObjectId();

		if (empty($notification->getActions())) {
			$this->logger->debug("notification $nObjectType#$nObjectId ignored due to missing actions",
				['app' => $this->appName]);
			return;
		}

		$targetUser = $notification->getUser();
		$userObject = $this->userManager->get($targetUser);

		if ($userObject === null) {
			$this->logger->warning("notification $nObjectType#$nObjectId can't be sent to $targetUser: the user is missing",
				['app' => $this->appName]);
			return;
		}

		$targetEmail = $userObject->getEMailAddress();
		if ($targetEmail === null) {
			$this->logger->warning("notification $nObjectType#$nObjectId can't be sent to $targetUser: email for the user isn't set",
				['app' => $this->appName]);
			return;
		}

		$splittedEmails = $this->sender->validateEmails([$targetEmail]);
		if (!empty($splittedEmails['valid'])) {
			$this->sender->sendNotification($notification, $this->urlGenerator->getAbsoluteURL(''), $splittedEmails['valid']);
		}

		if (!empty($splittedEmails['invalid'])) {
			$this->logger->warning("notification $nObjectType#$nObjectId can't be sent to $targetUser: email \"$targetEmail\" isn't valid");
		}
	}

	/**
	 * Don't do anything since we're not storing the notifications
	 */
	public function markProcessed(INotification $notification) {}

	public function getCount(INotification $notification) {
		return 0;
	}
}
