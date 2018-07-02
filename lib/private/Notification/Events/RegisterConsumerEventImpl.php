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
use OCP\Notification\Events\RegisterConsumerEvent;
use OCP\Notification\IApp;
use OC\Notification\Manager;

/**
 * Abstract class representing a "register app" event. The event should be thrown when the
 * notification manager needs to retrieve the notification apps.
 * Use the "registerNotificationConsumer" function in the event to register the notification
 * consumer.
 * Note that each notification manager is expected to thrown custom implementations of this event
 * while hiding the implementation details.
 */
class RegisterConsumerEventImpl extends RegisterConsumerEvent {
	/** @var Manager */
	private $manager;

	public function __construct(Manager $manager) {
		$this->manager = $manager;
	}

	/**
	 * Register the notification consumer in the notification manager
	 * @param IApp $app the notification consumer to be registered
	 */
	public function registerNotificationConsumer(IApp $app) {
		$this->manager->registerBuiltApp($app);
	}
}
