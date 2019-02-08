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

namespace OCA\FederatedFileSharing\Ocm\Notification;

/**
 * Class Notification
 *
 * @package OCA\FederatedFileSharing\Ocm
 */
class FileNotification extends Notification {
	const NOTIFICATION_TYPE_SHARE_ACCEPTED = 'SHARE_ACCEPTED';
	const NOTIFICATION_TYPE_SHARE_DECLINED = 'SHARE_DECLINED';
	const NOTIFICATION_TYPE_SHARE_UNSHARED = 'SHARE_UNSHARED';
	const NOTIFICATION_TYPE_REQUEST_RESHARE = 'REQUEST_RESHARE';
	const NOTIFICATION_TYPE_RESHARE_UNDO = 'RESHARE_UNDO';
	const NOTIFICATION_TYPE_RESHARE_CHANGE_PERMISSION = 'RESHARE_CHANGE_PERMISSION';

	const RESOURCE_TYPE_FILE = 'file';

	/**
	 * @return string
	 */
	public function getResourceType() {
		return self::RESOURCE_TYPE_FILE;
	}

	/**
	 * @return string
	 */
	public function getNotificationType() {
		return $this->notificationType;
	}

	/**
	 * @param string $notificationType
	 *
	 * @return void
	 */
	public function setNotificationType($notificationType) {
		$this->notificationType = $notificationType;
	}

	/**
	 * Get all available notification types
	 *
	 * @return string[]
	 */
	public function getNotificationTypes() {
		return [
			self::NOTIFICATION_TYPE_SHARE_ACCEPTED,
			self::NOTIFICATION_TYPE_SHARE_DECLINED,
			self::NOTIFICATION_TYPE_SHARE_UNSHARED,
			self::NOTIFICATION_TYPE_REQUEST_RESHARE,
			self::NOTIFICATION_TYPE_RESHARE_UNDO,
			self::NOTIFICATION_TYPE_RESHARE_CHANGE_PERMISSION
		];
	}
}
