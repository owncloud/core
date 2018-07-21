<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\Testing;

use OCP\AppFramework\App;
use OCP\App\ManagerEvent;

class Application extends App {
	public function __construct(array $urlParams = []) {
		$appName = 'testing';
		parent::__construct($appName, $urlParams);

		$c = $this->getContainer();
		$config = $c->getServer()->getConfig();
		if ($config->getAppValue($appName, 'enable_alt_user_backend', 'no') === 'yes') {
			$userManager = $c->getServer()->getUserManager();

			// replace all user backends with this one
			$userManager->clearBackends();
			$userManager->registerBackend($c->query(AlternativeHomeUserBackend::class));

			$userManager->listen('\OC\User', 'postCreateUser', function ($user, $password) use ($c) {
				$q = $c->getServer()->getDatabaseConnection()->getQueryBuilder();
				$q->update('*PREFIX*accounts')
					->set('backend', $q->expr()->literal(AlternativeHomeUserBackend::class))
					->where($q->expr()->eq('user_id', $q->createNamedParameter($user->getUID())))
					->execute();
			});

			// first call must adjust all existing backends
			if ($config->getAppValue($appName, 'updated_all', 'no') === 'no') {
				$q = $c->getServer()->getDatabaseConnection()->getQueryBuilder();
				$q->update('*PREFIX*accounts')
					->set('backend', $q->expr()->literal(AlternativeHomeUserBackend::class))
					->where($q->expr()->eq('backend', $q->createNamedParameter(\OC\User\Database::class)))
					->execute();

				// set this value to only do it once, the value is cleared when disabling the app
				$config->setAppValue($appName, 'updated_all', 'yes');
			};
		}

		$eventDispatcher = $c->getServer()->getEventDispatcher();
		$eventDispatcher->addListener(
			ManagerEvent::EVENT_APP_DISABLE,
			function ($event) use ($appName, $config) {
				// clear the "already updated" flag when disabling this app
				if ($event->getAppID() === $appName) {
					$config->deleteAppValue($appName, 'updated_all');
				}
			}
		);
	}
}
