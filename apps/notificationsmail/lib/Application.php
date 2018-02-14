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

namespace OCA\NotificationsMail;

use OCP\AppFramework\App;
use OCP\IContainer;
use OCP\Notification\Events\AbstractRegisterConsumerEvent;
use OCA\NotificationsMail\NotificationSender;
use OCA\NotificationsMail\NotificationConsumer;
use OCA\NotificationsMail\Controller\NotificationOptionsController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class Application extends App {
	public function __construct(array $urlParams = []) {
		parent::__construct('notificationsmail', $urlParams);

		$container = $this->getContainer();

		$dispatcher = $container->getServer()->getEventDispatcher();
		$dispatcher->addListener(AbstractRegisterConsumerEvent::NAME, function(AbstractRegisterConsumerEvent $event) use ($container) {
			$event->registerNotificationConsumer($container->query(NotificationConsumer::class));
		});
	}
}
