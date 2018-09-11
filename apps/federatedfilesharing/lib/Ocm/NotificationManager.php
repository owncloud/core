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

namespace OCA\FederatedFileSharing\Ocm;

use OCA\FederatedFileSharing\Ocm\Notification\FileNotification;
use OCP\Constants;

/**
 * Class NotificationManager
 *
 * @package OCA\FederatedFileSharing\Ocm
 */
class NotificationManager {
	/**
	 * @param string $type
	 *
	 * @return FileNotification
	 */
	public function getFileNotification($type) {
		$notification = new FileNotification();
		$notification->setNotificationType($type);
		return $notification;
	}

	/**
	 * @param string $remoteId
	 * @param string $token
	 * @param string $action
	 * @param array $data
	 *
	 * @return FileNotification
	 */
	public function convertToOcmFileNotification($remoteId, $token, $action, $data = []) {
		$notification = new FileNotification();
		$map = [
			'accept' => FileNotification::NOTIFICATION_TYPE_SHARE_ACCEPTED,
			'decline' => FileNotification::NOTIFICATION_TYPE_SHARE_DECLINED,
			'unshare' => FileNotification::NOTIFICATION_TYPE_SHARE_UNSHARED,
			'revoke' => FileNotification::NOTIFICATION_TYPE_RESHARE_UNDO,
			'permissions' => FileNotification::NOTIFICATION_TYPE_RESHARE_CHANGE_PERMISSION,
			'reshare' => FileNotification::NOTIFICATION_TYPE_REQUEST_RESHARE
		];
		$notification->setNotificationType($map[$action]);
		$notification->setProviderId($remoteId);
		$notification->addNotificationData('sharedSecret', $token);

		if ($action === 'permissions') {
			$ocmPermissions = $this->toOcmPermissions($data['permissions']);
			$notification->addNotificationData('permission', $ocmPermissions);
		}

		if ($action === 'reshare') {
			$ocmPermissions = $this->toOcmPermissions($data['permissions']);
			$notification->addNotificationData('permission', $ocmPermissions);
			$notification->addNotificationData('senderId', $data['senderId']);
			$notification->addNotificationData('shareWith', $data['shareWith']);
		}

		return $notification;
	}

	/**
	 * Maps numeric permissions to an array of string permissions
	 *
	 * @param int $permissions
	 * @return array
	 */
	protected function toOcmPermissions($permissions) {
		$permissions = (int) $permissions;
		$ocmPermissions = [];
		if ($permissions & Constants::PERMISSION_READ) {
			$ocmPermissions[] = 'read';
		}
		if (($permissions & Constants::PERMISSION_CREATE)
			|| ($permissions & Constants::PERMISSION_UPDATE)
		) {
			$ocmPermissions[] = 'write';
		}
		if ($permissions & Constants::PERMISSION_SHARE) {
			$ocmPermissions[] = 'share';
		}
		return $ocmPermissions;
	}
}
