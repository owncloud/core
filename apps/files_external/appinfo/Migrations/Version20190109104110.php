<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Philipp Schaffrath <pschaffrath@owncloud.com>
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

namespace OCA\Files_External\Migrations;

use OC\Files\External\Service\GlobalStoragesService;
use OC\Files\External\Service\LegacyStoragesService;
use OCP\Migration\IOutput;
use OCP\Migration\ISimpleMigration;

/**
 * migrate mount.json mounts into the database
 */
class Version20190109104110 implements ISimpleMigration {

	/**
	 * @param IOutput $out
	 */
	public function run(IOutput $out) {

		/** @var GlobalStoragesService $globalStoragesService */
		$globalStoragesService = \OC::$server->query('GlobalStoragesService');
		$legacyStoragesService = new LegacyStoragesService(\OC::$server->getStoragesBackendService());

		$legacyStorages = $legacyStoragesService->getAllStorages();

		foreach ($legacyStorages as $legacyStorage) {
			try {
				$mountOptions = $legacyStorage->getMountOptions();
				if (!empty($mountOptions) && !isset($mountOptions['read_only'])) {
					// existing mounts must have read_only disabled by default to avoid surprises
					$mountOptions['read_only'] = false;
					$legacyStorage->setMountOptions($mountOptions);
				}
				$globalStoragesService->addStorage($legacyStorage);
			} catch (\Exception $exception) {
				$out->warning(
					'There has been an error migrating an external storage from mount.json to the database. The affected mount point is "' .
					$legacyStorage->getMountPoint() . '" and is of type "' . $legacyStorage->getBackend()->getIdentifier() . '"'
				);
			}
		}
	}
}
