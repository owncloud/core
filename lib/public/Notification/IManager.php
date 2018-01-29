<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
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

namespace OCP\Notification;

/**
 * Interface IManager
 *
 * @package OCP\Notification
 * @since 9.0.0
 */
interface IManager extends IApp, INotifier {
	/**
	 * @param \Closure $service The service must implement IApp, otherwise a
	 *                          \InvalidArgumentException is thrown later
	 * @return null
	 * @since 9.0.0
	 */
	public function registerApp(\Closure $service);

	/**
	 * @param \Closure $service The service must implement INotifier, otherwise a
	 *                          \InvalidArgumentException is thrown later
	 * @param \Closure $info    An array with the keys 'id' and 'name' containing
	 *                          the app id and the app name
	 * @return null
	 * @since 9.0.0
	 */
	public function registerNotifier(\Closure $service, \Closure $info);

	/**
	 * @return array App ID => App Name
	 * @since 9.0.0
	 */
	public function listNotifiers();

	/**
	 * @return INotification
	 * @since 9.0.0
	 */
	public function createNotification();

	/**
	 * @return bool
	 * @since 9.0.0
	 */
	public function hasNotifiers();

	/**
	 * @param INotification $notification the notification to be serialized
	 * @param bool $forceIncomplete whether this method should serialize a INotification instance with
	 * incomplete data or throw an exception if the notification isn't complete
	 * @return string the serialized notification
	 * @throws \OCP\Notification\Exceptions\IncompleteSerializationException if the notification
	 * doesn't * have all the required fields for the notification AND the $forceIncomplete flag
	 * isn't true. This exception musn't be thrown if the $forceIncomplete flag is true.
	 * @since 10.0.7
	 */
	public function serializeNotification(INotification $notification, $forceIncomplete = false);

	/**
	 * @param string $serialNotification the serialized notification coming from the
	 * serializeNotification() method
	 * @param bool $forceIncomplete whether this method should return a INotification instance with
	 * incomplete data or throw an exception if the notification data isn't complete
	 * @return INotification an INotification object from the serialized data
	 * @throws \OCP\Notification\Exceptions\CannotDeserializeException if the data can't be
	 * deserialized (format not supported, errors during deserialization, etc)
	 * @throws \OCP\Notification\Exceptions\IncompleteDeserializationException if the data doesn't
	 * have all the required fields for the notification AND the $forceIncomplete flag isn't true.
	 * This exception musn't be thrown if the $forceIncomplete flag is true.
	 * @since 10.0.7
	 */
	public function deserializeNotification($serialNotification, $forceIncomplete = false);
}
