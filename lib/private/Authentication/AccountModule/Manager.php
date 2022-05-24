<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

namespace OC\Authentication\AccountModule;

use OCP\App\IServiceLoader;
use OCP\Authentication\Exceptions\AccountCheckException;
use OCP\Authentication\IAccountModule;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IUser;

class Manager {

	/** @var IConfig */
	private $config;

	/** @var ILogger */
	private $logger;

	/** @var IServiceLoader */
	private $loader;

	/**
	 * @param IConfig $config
	 * @param ILogger $logger
	 * @param IServiceLoader $loader
	 */
	public function __construct(IConfig $config, ILogger $logger, IServiceLoader $loader) {
		$this->config = $config;
		$this->logger = $logger;
		$this->loader = $loader;
	}

	/**
	 * Get the list of account modules for the given user
	 * Limited to auth-modules that are enabled for this user
	 *
	 * @param IUser $user
	 * @return IAccountModule[]
	 */
	public function getAccountModules(IUser $user) {
		$loaded = $this->loader->load(['account-modules'], $user);

		// load order from appconfig
		$rawOrder = $this->config->getAppValue('core', 'account-module-order', '[]');
		$order = \json_decode($rawOrder);
		if (!\is_array($order)) {
			$order = [];
		}

		// get map of loaded module classes
		$modules = [];
		foreach ($loaded as $module) {
			$modules[\get_class($module)] = $module;
		}

		// replace class name with instance
		foreach ($order as $i => $className) {
			if (isset($modules[$className])) {
				unset($modules[$className]);
				$order[$i] = $modules[$className];
			} else {
				unset($order[$i]);
			}
		}
		// add unordered modules
		foreach ($modules as $className => $instance) {
			$order[] = $instance;
		}

		return $order;
	}

	/**
	 * @param IUser $user
	 * @throws AccountCheckException
	 */
	public function check(IUser $user) {
		foreach ($this->getAccountModules($user) as $accountModule) {
			try {
				$accountModule->check($user);
			} catch (AccountCheckException $ex) {
				$this->logger->debug('IAccountModule check failed: {message}, {code}', [
					'app'=>__METHOD__,
					'message' => $ex->getMessage(),
					'code' => $ex->getCode()
				]);
				throw $ex;
			}
		}
	}
}
