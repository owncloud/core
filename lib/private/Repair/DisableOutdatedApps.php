<?php
/**
 * @copyright Copyright (c) 2026, ownCloud GmbH
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

namespace OC\Repair;

use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;

/**
 * Disable apps that must not run (see AppManager::$outdated_apps), resetting any
 * stored enabled state left over from a previous version.
 */
class DisableOutdatedApps implements IRepairStep {
	/** @var \OC\App\AppManager */
	private $appManager;

	/**
	 * @param \OC\App\AppManager $appManager
	 */
	public function __construct($appManager) {
		$this->appManager = $appManager;
	}

	public function getName() {
		return 'Disable apps that must not run';
	}

	/**
	 * @param IOutput $out
	 */
	public function run(IOutput $out) {
		foreach ($this->appManager->disableOutdatedApps() as $appId) {
			$out->info("App $appId disabled");
		}
	}
}
