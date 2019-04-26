<?php
/**
 * @author Juan Pablo Villafañez <jvillafanez@solidgeargroup.com>
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
namespace OC\User;

use OCP\IAppConfig;
use OCP\IConfig;

/**
 * @package OC\User
 */
class SyncLimiter {
	/** @var AccountMapper */
	private $mapper;
	/** @var IConfig */
	private $config;

	/**
	 * @param AccountMapper $mapper
	 * @param IConfig $config
	 */
	public function __construct(AccountMapper $mapper, IConfig $config) {
		$this->mapper = $mapper;
		$this->config = $config;
	}

	private function getDefaultLimits() {
		return [
			'OCA\User_LDAP\User_Proxy' => [
				'soft' => 50,
				'hard' => 100,
			],
		];
	}

	/**
	 * Get the limit information. This function will return
	 * a map with the backend's name and the limits for it ['soft' => X, 'hard' => Y]
	 * with the respective limits.
	 * Note that negative limits might be returned, but those should be ignored.
	 * This function guarantees that the hard limit will be greater than or equal to
	 * the soft limit.
	 * @param string $backendName the name of the backend to get the limits for
	 * @return array [backendName => ['soft' => X, 'hard' => Y]]
	 */
	public function getLimitInfo() {
		$limits = $this->getDefaultLimits();

		foreach ($limits as $backendName => $limitData) {
			// soft limit isn't configurable
			$defaultHardLimit = $limitData['hard'];
			$hardLimit = (int) $this->config->getAppValue('core', "user_sync_hard_limit_$backendName", $defaultHardLimit);
			$limits[$backendName]['hard'] = \max($limitData['soft'], $hardLimit);
		}
		return $limits;
	}

	/**
	 * Apply the configured limits to the backends.
	 *
	 * If the enterprise_key app is enabled, all the automatically disabled users
	 * in the known limited backends will be enabled.
	 * If the enterprise_key app is disabled, the function will automatically disable
	 * users in order to ensure the configured limits.
	 *
	 * For each known backend that needs to be limited (only some backends are known,
	 * not all), this function will return the changed made, and the number of changes:
	 * [
	 *   'backend1' => [
	 *     'switchTo' => 'enabled',
	 *     'changes' => 100
	 *   ],
	 *   'backend2' => [
	 *     'switchTo' => 'enabled',
	 *     'changes' => 1
	 *   ],
	 *   'backend2' => [
	 *     'switchTo' => 'disabled',
	 *     'changes' => 0
	 *   ],
	 * ]
	 * @return array an array with the information explained above.
	 */
	public function limitEnabledUsers() {
		$limitInfo = $this->getLimitInfo();
		$enterpriseActive = $this->config->getAppValue('enterprise_key', 'enabled', 'no') === 'yes';

		$resultInfo = [];
		foreach ($limitInfo as $backendName => $limitData) {
			if ($enterpriseActive) {
				$userNumber = $this->mapper->enableAutoDisabledUsers($backendName);
				$resultInfo[$backendName] = [
					'switchTo' => 'enabled',
					'changes' => $userNumber,
				];
			} else {
				$autoDisabledUsers = $this->mapper->ensureMaximumEnabledUsersForBackend($backendName, $limitData['hard']);
				$resultInfo[$backendName] = [
					'switchTo' => 'disabled',
					'changes' => $autoDisabledUsers,
				];
			}
		}
		return $resultInfo;
	}
}
