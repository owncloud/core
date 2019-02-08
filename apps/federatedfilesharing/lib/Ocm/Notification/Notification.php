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
 * Class AbstractNotification
 *
 * @package OCA\FederatedFileSharing\Ocm\Notification
 */
abstract class Notification {

	/**
	 * @var string Specifies to which shared resource the notification belong to
	 */
	protected $providerId;

	/**
	 * @var string Resource-specific type of the notification.
	 */
	protected $notificationType;

	/**
	 * @var string[] Payload of the notification
	 */
	protected $notificationData = [];

	/**
	 * Get all available notification types for this resource type
	 *
	 * @return string[]
	 */
	abstract public function getNotificationTypes();

	/**
	 * @return string
	 */
	abstract public function getResourceType();

	/**
	 * @return string
	 */
	public function getProviderId() {
		return $this->providerId;
	}

	/**
	 * @param string $providerId
	 *
	 * @return void
	 */
	public function setProviderId($providerId) {
		$this->providerId = $providerId;
	}

	/**
	 * Check if notification is supported
	 *
	 * @param string $type
	 *
	 * @return bool
	 */
	public function isValidNotificationType($type) {
		return \in_array($type, $this->getNotificationTypes());
	}

	/**
	 * @param string $field
	 * @param mixed $value
	 *
	 * @return void
	 */
	public function addNotificationData($field, $value) {
		$this->notificationData[$field] = $value;
	}

	/**
	 * Prepare notification
	 *
	 * @return array
	 */
	public function toArray() {
		return [
			'notificationType' => $this->notificationType,
			'resourceType' => $this->getResourceType(),
			'providerId' => $this->providerId,
			'notification' => $this->notificationData
		];
	}
}
