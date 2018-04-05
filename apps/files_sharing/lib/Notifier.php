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

	/**
	 * @param \OCP\L10N\IFactory $factory
	 */
	public function __construct(\OCP\L10N\IFactory $factory, INotificationManager $notificationManager, IShareManager $shareManager, IGroupManager $groupManager) {
		$this->factory = $factory;
		$this->notificationManager = $notificationManager;
		$this->shareManager = $shareManager;
		$this->groupManager = $groupManager;
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

		// TODO: discard if share does not exist any more
		// TODO: discard if target user is not in target group any more

		switch ($notification->getSubject()) {
			case 'local_share':
			case 'local_share_accepted':
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
			$notification->setParsedSubject(
				(string) $l->t('User %1$s shared "%3$s" with you (on behalf of %2$s)', $params)
			);
		} else {
			$notification->setParsedSubject(
				(string)$l->t('User %1$s shared "%3$s" with you', $params)
			);
		}

		foreach ($notification->getActions() as $action) {
			switch ($action->getLabel()) {
				case 'accept':
					$action->setParsedLabel(
						(string) $l->t('Accept')
					)
					->setPrimary(true);
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
}
