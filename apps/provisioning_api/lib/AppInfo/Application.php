<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

namespace OCA\Provisioning_API\AppInfo;

use OC\AppFramework\Utility\SimpleContainer;
use OCA\Provisioning_API\Middleware\ProvisioningMiddleware;
use OCP\AppFramework\App;

class Application extends App {
	public function __construct(array $urlParams = []) {
		parent::__construct('provisioning_api', $urlParams);

		$container = $this->getContainer();
		$server = $container->getServer();

		$container->registerService(
			ProvisioningMiddleware::class,
			function (SimpleContainer $c) use ($server) {
				return new ProvisioningMiddleware(
					$c->query('AppName'),
					$server->getRequest(),
					$server->getUserSession(),
					$server->getGroupManager(),
					$c['ControllerMethodReflector']
				);
			}
		);

		// Execute middlewares
		$container->registerMiddleware(ProvisioningMiddleware::class);
	}
}
