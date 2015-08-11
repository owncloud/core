<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace OCA\Files_Trashbin\BackgroundJob;

use OCP\IDBConnection;
use OCA\Files_Trashbin\Trashbin;
use OCA\Files_Trashbin\Expiration;

class ExpireTrash extends \OC\BackgroundJob\TimedJob {

	const ITEMS_PER_SESSION = 1000;

	/**
	 * @var Expiration
	 */
	private $expiration;

	/**
	 * @var IDBConnection
	 */
	private $dbConnection;

	public function __construct(IDBConnection $dbConnection, Expiration $expiration) {
		// Run once per 30 minutes
		$this->setInterval(60 * 30);
		$this->dbConnection = $dbConnection;
		$this->expiration = $expiration;
	}

	protected function run($argument) {
		$maxAge = $this->expiration->getMaxAgeAsTimestamp();
		if (!$maxAge) {
			return;
		}

		$stmt = $this->dbConnection->prepare(
				'SELECT `id`, `timestamp`, `user` FROM `*PREFIX*files_trash` WHERE `timestamp`<=? ORDER BY `user`',
				self::ITEMS_PER_SESSION
		);

		if (!$stmt->execute([$maxAge])) {
			return;
		}

		$files = $stmt->fetchAll();
		
		foreach ($files as $file) {
			if (!$this->setupFS($file['user'])) {
				continue;
			}
			Trashbin::delete($file['id'], $file['user'], $file['timestamp']);
		}
		
		\OC_Util::tearDownFS();
	}

	/**
	 * Act on behalf on trash item owner
	 * @param string $user
	 * @return boolean
	 */
	private function setupFS($user){
		$userManager = \OC::$server->getUserManager();
		if (!$userManager->userExists($user)) {
			return false;
		}

		\OC_Util::tearDownFS();
		\OC_Util::setupFS($user);

		return true;
	}
}
