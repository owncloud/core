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
namespace OC\Core\Notification;

use OCP\Notification\INotification;
use OCP\Notification\INotifier;
use OC\L10N\L10N;
use OCP\L10N\IFactory;

class Notifier implements INotifier {
	/** @var IFactory */
	protected $factory;

	public function __construct(IFactory $factory) {
		$this->factory = $factory;
	}

	public function prepare(INotification $notification, $languageCode) {
		if ($notification->getApp() !== 'core') {
			throw new \InvalidArgumentException();
		}

		$l = $this->factory->get('core', $languageCode);

		switch ($notification->getObjectType()) {
			case 'user_sync_soft_limit':
				return $this->formatUserSyncSoftLimit($notification, $l);
			case 'user_sync_hard_limit':
				return $this->formatUserSyncHardLimit($notification, $l);
			default:
				throw new \InvalidArgumentException();
		}
	}

	private function formatUserSyncSoftLimit(INotification $notification, L10N $l) {
		$notification->setParsedSubject((string) $l->t('Soft limit for users reached'));

		$messageParams = $notification->getMessageParameters();
		$notification->setParsedMessage((string) $l->t('You can have up to %2$s enabled users for %3$s. Buy an enterprise license to remove the limit', $messageParams));

		return $notification;
	}

	private function formatUserSyncHardLimit(INotification $notification, L10N $l) {
		$notification->setParsedSubject((string) $l->t('Hard limit for users reached'));

		$messageParams = $notification->getMessageParameters();
		$notification->setParsedMessage((string) $l->t('You have over %2$s users for %3$s. Several users have been disabled. Buy an enterprise license to remove the limit', $messageParams));

		return $notification;
	}
}
