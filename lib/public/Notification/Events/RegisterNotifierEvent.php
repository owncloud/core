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
use OCP\Notification\INotifier;

/**
 * Abstract class representing a "register notifier" event. The event should be thrown when the
 * notification manager needs to retrieve the notification notifiers.
 * Use the "registerNotifier" function in the event to register the notifier.
 * Note that each notification manager is expected to thrown custom implementations of this event
 * while hiding the implementation details.
 *
 * The agreement here is that the notification manager will use its own implementation of this event
 * (implementing the "registerNotifier" method), and throw that event as a
 * "notification.register.notifier" event (use the constant of this class).
 * Notification consumers will listen to this public event name and use the event method to register.
 * Note that the event type the consumers must expect is this abstract class and not the specific
 * event implementation.
 *
 * IMPORTANT NOTE: this event might be triggered several times so plan accordingly. Either
 * register always the same instance (per request) or make sure the behaviour won't change if
 * several instances are used.

 * @since 10.0.8
 */
abstract class RegisterNotifierEvent extends Event {
	/**
	 * Implementations should use this name
	 */
	const NAME = 'notification.register.notifier';

	/**
	 * Empty implementation in order to prevent stopping the propagation of this event
	 *
	 * @since 10.0.8
	 */
	public function stopPropagation() {
	}

	/**
	 * Register the notifier in the notification manager. Implementations must take care of injecting
	 * the specific notification manager implementation.
	 * @param INotifier $notifier the notification app to be registered
	 * @param string $id the id of the app that register the notifier. This must be unique and can't
	 * be duplicated
	 * @param string $name the app name
	 * @throws \OCP\Notification\Exceptions\NotifierIdInUseException if the id is already in use by
	 * other apps. Note that although this event might be thrown several times, the app has to use the
	 * same id, and this exception won't be thrown in this particular scenario.
	 *
	 * @since 10.0.8
	 */
	abstract public function registerNotifier(INotifier $notifier, $id, $name);
}
