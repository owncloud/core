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

namespace OCA\notifications_mail;

use OCP\AppFramework\App;
use OCP\IContainer;
use OCP\Notification\Events\AbstractRegisterConsumerEvent;
use OCA\notifications_mail\NotificationSender;
use OCA\notifications_mail\NotificationConsumer;
use OCA\notifications_mail\Controller\NotificationOptionsController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class Application extends App {
	public function __construct(array $urlParams = []) {
		parent::__construct('notifications_mail', $urlParams);

		$container = $this->getContainer();

		$container->registerService(NotificationSender::class, function (IContainer $c) {
			$server = $c->getServer();
			return new NotificationSender(
				$server->getNotificationManager(),
				$server->getMailer(),
				$server->getConfig(),
				$server->getL10NFactory()
			);
		});

		$container->registerService(NotificationConsumer::class, function (IContainer $c) {
			$server = $c->getServer();
			return new NotificationConsumer(
				$c->query(NotificationSender::class),
				$server->getUserManager(),
				$server->getLogger(),
				$server->getURLGenerator()
			);
		});

		$container->registerService(NotificationOptionsController::class, function (IContainer $c) {
			$server = $c->getServer();
			return new NotificationOptionsController(
				$server->getUserSession(),
				$server->getConfig(),
				$server->getL10N('notifications_mail')
			);
		});

		$dispatcher = $container->getServer()->getEventDispatcher();
		$dispatcher->addListener(AbstractRegisterConsumerEvent::NAME, function(AbstractRegisterConsumerEvent $event) use ($container) {
			$event->registerNotificationConsumer($container->query(NotificationConsumer::class));
		});
	}
}
