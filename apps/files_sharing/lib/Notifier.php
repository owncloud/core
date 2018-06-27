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

namespace OCA\Files_sharing;

use OCP\Notification\INotification;
use OCP\Notification\INotifier;
use OCP\Notification\IManager as INotificationManager;
use OCP\Share\IManager as IShareManager;
use OCP\Share\Exceptions\ShareNotFound;
use OCP\IGroupManager;
use OCP\IUserManager;
use OCP\IConfig;
use OC\L10N\L10N;

class Notifier implements INotifier {
	/** @var \OCP\L10N\IFactory */
	protected $factory;

	/** @var IShareManager */
	protected $shareManager;

	/** @var INotificationManager */
	protected $notificationManager;

	/** @var IGroupManager */
	protected $groupManager;

	/** @var IUserManager */
	protected $userManager;

	/** @var IConfig */
	protected $config;

	/**
	 * @param \OCP\L10N\IFactory $factory
	 */
	public function __construct(
		\OCP\L10N\IFactory $factory,
		INotificationManager $notificationManager,
		IShareManager $shareManager,
		IGroupManager $groupManager,
		IUserManager $userManager,
		IConfig $config
	) {
		$this->factory = $factory;
		$this->notificationManager = $notificationManager;
		$this->shareManager = $shareManager;
		$this->groupManager = $groupManager;
		$this->userManager = $userManager;
		$this->config = $config;
	}

	/**
	 * @param INotification $notification
	 * @param string $languageCode The code of the language that should be used to prepare the notification
	 * @return INotification
	 */
	public function prepare(INotification $notification, $languageCode) {
		if ($notification->getApp() !== 'files_sharing') {
			throw new \InvalidArgumentException();
		}

		// Read the language from the notification
		$l = $this->factory->get('files_sharing', $languageCode);

		switch ($notification->getObjectType()) {
			case 'local_share':
				$shareId = $notification->getObjectId();
				$userId = $notification->getUser();
				try {
					$share = $this->shareManager->getShareById($shareId, $userId);
					if ($share->getShareType() === \OCP\Share::SHARE_TYPE_GROUP && !$this->groupManager->isInGroup($userId, $share->getSharedWith())) {
						$this->notificationManager->markProcessed($notification);
						throw new \InvalidArgumentException();
					}
				} catch (ShareNotFound $ex) {
					// mark the notification as processed
					$this->notificationManager->markProcessed($notification);
					throw new \InvalidArgumentException();
				}
				return $this->format($notification, $l);

			default:
				throw new \InvalidArgumentException();
		}
	}

	private function format(INotification $notification, L10N $l) {
		$params = $notification->getSubjectParameters();
		if ($params[0] !== $params[1] && $params[1] !== null) {
			$params[0] = $this->getUserString($params[0]);
			$params[1] = $this->getUserString($params[1]);
			$notification->setParsedSubject(
				(string) $l->t('"%1$s" shared "%3$s" with you (on behalf of "%2$s")', $params)
			);
		} else {
			$params[0] = $this->getUserString($params[0]);
			$notification->setParsedSubject(
				(string) $l->t('"%1$s" shared "%3$s" with you', $params)
			);
		}

		$messageParams = $notification->getMessageParameters();
		if ($messageParams[0] !== $messageParams[1] && $messageParams[1] !== null) {
			$messageParams[0] = $this->getUserString($messageParams[0]);
			$messageParams[1] = $this->getUserString($messageParams[1]);
			$notification->setParsedMessage(
				(string) $l->t('"%1$s" invited you to view "%3$s" (on behalf of "%2$s")', $messageParams)
			);
		} else {
			$messageParams[0] = $this->getUserString($messageParams[0]);
			$notification->setParsedMessage(
				(string) $l->t('"%1$s" invited you to view "%3$s"', $messageParams)
			);
		}

		foreach ($notification->getActions() as $action) {
			switch ($action->getLabel()) {
				case 'accept':
					$action->setParsedLabel(
						(string) $l->t('Accept')
					);
					break;

				case 'decline':
					$action->setParsedLabel(
						(string) $l->t('Decline')
					);
					break;
			}

			$notification->addParsedAction($action);
		}

		return $notification;
	}

	/**
	 * Get the user string that will be shown
	 * @param string $uid the uid of the user
	 * @return string
	 */
	private function getUserString($uid) {
		$userObject = $this->userManager->get($uid);
		if ($userObject === null) {
			return $uid;
		}

		$displayname = $userObject->getDisplayName();

		$additionalInfoField = $this->config->getAppValue('core', 'user_additional_info_field', '');
		if ($additionalInfoField === 'email') {
			$email = $userObject->getEMailAddress();
			return "$displayname ($email)";
		} elseif ($additionalInfoField === 'id') {
			return "$displayname ($uid)";
		} else {
			return $displayname;
		}
	}
}
