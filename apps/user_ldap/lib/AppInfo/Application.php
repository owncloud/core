<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\User_LDAP\AppInfo;

use OCA\User_LDAP\Group_Proxy;
use OCA\User_LDAP\Helper;
use OCA\User_LDAP\LDAP;
use OCA\User_LDAP\User_Proxy;

class Application extends \OCP\AppFramework\App {
	/**
	 * @param array $urlParams
	 */
	public function __construct($urlParams = []) {
		parent::__construct('user_ldap', $urlParams);
		$this->registerService();
	}

	private function registerService() {
		$container = $this->getContainer();
		$container->registerService(
			User_Proxy::class,
			function ($c) {
				$helper = $c->query(Helper::class);
				return new User_Proxy(
					$helper->getServerConfigurationPrefixes(true),
					new LDAP(),
					$c->getServer()->getConfig()
				);
			}
		);
		$container->registerService(
			Group_Proxy::class,
			function ($c) {
				$helper = $c->query(Helper::class);
				return new Group_Proxy(
					$helper->getServerConfigurationPrefixes(true),
					new LDAP()
				);
			}
		);
	}

	public function checkCompatibility() {
		$server = $this->getContainer()->getServer();
		if ($server->getAppManager()->isEnabledForUser('user_webdavauth')) {
			$server->getLogger()->warning(
				'user_ldap and user_webdavauth are incompatible. You may experience unexpected behaviour',
				['app' => 'user_ldap']
			);
		}
	}

	public function registerBackends() {
		$helper = new Helper();
		$configPrefixes = $helper->getServerConfigurationPrefixes(true);
		if (\count($configPrefixes) > 0) {
			$server = $this->getContainer()->getServer();
			$ldapWrapper = new LDAP();
			$ocConfig = $server->getConfig();
			$userBackend  = new User_Proxy($configPrefixes, $ldapWrapper, $ocConfig);
			$groupBackend  = new Group_Proxy($configPrefixes, $ldapWrapper);
			// register user backend
			\OC_User::useBackend($userBackend);
			$server->getGroupManager()->addBackend($groupBackend);
		}
	}

	public function registerHooks() {
		\OCP\Util::connectHook(
			'\OCA\Files_Sharing\API\Server2Server',
			'preLoginNameUsedAsUserName',
			$this->getContainer()->query(Helper::class),
			'loginName2UserName'
		);
	}
}
