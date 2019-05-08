<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgeargroup.com>
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

namespace OC\Migrations;

use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;
use OCP\IConfig;
use OC\User\AccountMapper;
use OC\User\SyncService;

/**
 * Set a sync limit based on the current number of users
 */
class Version20190503101238 implements ISimpleMigration {
	/** @var AccountMapper */
	private $accountMapper;
	/** @var SyncService */
	private $syncService;
	/** @var IConfig */
	private $config;

	public function __construct(AccountMapper $accountMapper, SyncService $syncService, IConfig $config) {
		$this->accountMapper = $accountMapper;
		$this->syncService = $syncService;
		$this->config = $config;
	}

	/**
	 * @param IOutput $out
	 */
	public function run(IOutput $out) {
		$userCountPerBackend = $this->accountMapper->getUserCountPerBackend(false);
		foreach ($userCountPerBackend as $backendName => $userCount) {
			$limitInfo = $this->syncService->getUserLimitInfo($backendName);
			if ($limitInfo !== false && $userCount > ($limitInfo['hard'] - 10)) {
				// ensure that up to 10 new users can be added before hitting the limit
				$this->config->setAppValue('core', "user_sync_hard_limit_$backendName", $userCount + 10);
			}
		}
	}
}
