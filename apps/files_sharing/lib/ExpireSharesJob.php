<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

namespace OCA\Files_Sharing;

use OC\BackgroundJob\TimedJob;

/**
 * Delete all shares that are expired
 */
class ExpireSharesJob extends TimedJob {

	/**
	 * sets the correct interval for this timed job
	 */
	public function __construct() {
		// Run once a day
		$this->setInterval(24 * 60 * 60);
	}

	/**
	 * Makes the background job do its work
	 *
	 * @param array $argument unused argument
	 */
	public function run($argument) {
		$logger = \OC::$server->getLogger();
		$shareManager = \OC::$server->getShareManager();
		$expiredShares = $shareManager->deleteExpiredShares();
		$logger->debug("$expiredShares share(s) deleted", ['app' => 'ExpireSharesJob']);
	}

}
