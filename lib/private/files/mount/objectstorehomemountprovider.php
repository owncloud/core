<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OC\Files\Mount;

use OCP\Files\Config\IMountProvider;
use OCP\Files\Storage\IStorageFactory;
use OCP\IConfig;
use OCP\IUser;

class ObjectStoreHomeMountProvider implements IMountProvider {
	/**
	 * @var IConfig
	 */
	private $config;

	/**
	 * ObjectStoreHomeMountProvider constructor.
	 *
	 * @param IConfig $config
	 */
	public function __construct(IConfig $config) {
		$this->config = $config;
	}

	/**
	 * Get the home mount for a user
	 *
	 * @param IUser $user
	 * @param IStorageFactory $loader
	 * @return \OCP\Files\Mount\IMountPoint[]
	 * @throws \Exception
	 */
	public function getMountsForUser(IUser $user, IStorageFactory $loader) {
		$homeStorage = $this->config->getSystemValue('objectstore');
		if (!is_array($homeStorage)) {
			return []; // HomeMountProvider will provide the regular home storage
		}
		// sanity checks
		if (empty($homeStorage['class'])) {
			throw new \Exception('No class given for objectstore');
		}
		if (!isset($homeStorage['arguments'])) {
			$homeStorage['arguments'] = [];
		}

		$objectStore = new $homeStorage['class']($homeStorage['arguments']);

		return [
			new MountPoint('\OC\Files\ObjectStore\HomeObjectStoreStorage', '/' . $user->getUID(), [
				'objectstore' => $objectStore,
				'user' => $user
			], $loader)
		];
	}
}
