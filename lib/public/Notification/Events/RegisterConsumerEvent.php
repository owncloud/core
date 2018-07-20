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

namespace OCP\Notification\Events;

use Symfony\Component\EventDispatcher\Event;
use OCP\Notification\IApp;

/**
 * Abstract class representing a "register app" event. The event should be thrown when the
 * notification manager needs to retrieve the notification apps.
 * Use the "registerNotificationConsumer" function in the event to register the app.
 * Note that each notification manager is expected to thrown custom implementations of this event
 * while hiding the implementation details.
 *
 * The agreement here is that the notification manager will use its own implementation of this event
 * (implementing the "registerNotificationConsumer" method), and throw that event as a
 * "notification.register.consumer" event (use the constant of this class).
 * Notification consumers will listen to this public event name and use the event method to register.
 * Note that the event type the consumers must expect is this abstract class and not the specific
 * event implementation.
 *
 * @since 10.0.8
 */
abstract class RegisterConsumerEvent extends Event {
	/**
	 * Implementations should use this name
	 */
	const NAME = 'notification.register.consumer';

	/**
	 * Empty implementation in order to prevent stopping the propagation of this event
	 *
	 * @since 10.0.8
	 */
	public function stopPropagation() {
	}

	/**
	 * Register the app in the notification manager. Implementations must take care of injecting
	 * the specific notification manager implementation.
	 * @param IApp $app the notification app to be registered
	 *
	 * @since 10.0.8
	 */
	abstract public function registerNotificationConsumer(IApp $app);
}
