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

namespace OC\Notification\Events;

use Symfony\Component\EventDispatcher\Event;
use OCP\Notification\Events\RegisterNotifierEvent;
use OCP\Notification\INotifier;
use OC\Notification\Manager;

/**
 * Abstract class representing a "register notifier" event. The event should be thrown when the
 * notification manager needs to retrieve the apps that will send notifications.
 * Use the "registerNotifier" function in the event to register the notifier.
 * Note that each notification manager is expected to thrown custom implementations of this event
 * while hiding the implementation details.
 *
 * IMPORTANT NOTE: this event might be triggered several times, so plan accordingly. Either
 * register always the same instance (per request) or make sure the behaviour won't change if
 * several instances are used.
 */
class RegisterNotifierEventImpl extends RegisterNotifierEvent {
	/** @var Manager */
	private $manager;

	public function __construct(Manager $manager) {
		$this->manager = $manager;
	}

	/**
	 * Register the notifier in the notification manager
	 * @param INotifier $notifier the notifier to be registered
	 * @param string $id the id of the app that register the notifier. This must be unique and can't
	 * be duplicated
	 * @param string $name the app name
	 * @throws \OCP\Notification\Exceptions\NotifierIdInUseException if the id is already in use by
	 * other apps. Note that although this RegisterNotifierEvent might be thrown several times,
	 * the app has to use the same id, and this exception won't be thrown in this particular scenario.
	 */
	public function registerNotifier(INotifier $notifier, $id, $name) {
		$this->manager->registerBuiltNotifier($notifier, $id, $name);
	}
}
