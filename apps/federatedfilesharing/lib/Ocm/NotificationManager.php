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

/**
 * Class NotificationManager
 *
 * @package OCA\FederatedFileSharing\Ocm
 */
class NotificationManager {
	/**
	 * @var Permissions
	 */
	protected $permissions;

	/**
	 * NotificationManager constructor.
	 *
	 * @param Permissions $permissions
	 */
	public function __construct(Permissions $permissions) {
		$this->permissions = $permissions;
	}

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
		$messages = [
			'accept' => "Recipient accepted the share",
			'decline' => "Recipient declined the share or unshared it from themself",
			'unshare' => "File was unshared",
			'revoke' => "Tell the owner (or the sender of a reshare) that the reshare was unshared",
			'permissions' => "Tell the owner (or the sender of the reshare) that the permissions changed",
			'reshare' => "Recipient of a share ask the owner to reshare the file with another user"
		];

		$notification->setNotificationType($map[$action]);
		$notification->setProviderId($remoteId);
		$notification->addNotificationData('sharedSecret', $token);
		$notification->addNotificationData('message', $messages[$action]);

		if ($action === 'permissions') {
			$ocmPermissions = $this->permissions->toOcmPermissions($data['permissions']);
			$notification->addNotificationData('permission', $ocmPermissions);
		}

		if ($action === 'reshare') {
			$notification->addNotificationData('senderId', $data['senderId']);
			$notification->addNotificationData('shareWith', $data['shareWith']);
		}

		return $notification;
	}
}
