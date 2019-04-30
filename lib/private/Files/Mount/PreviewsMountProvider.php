<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OC\Files\Mount;

use OCP\Files\Config\IMountProvider;
use OCP\Files\Storage\IStorageFactory;
use OCP\IConfig;
use OCP\IUser;

/**
 * Mount provider for custom preview storages
 */
class PreviewsMountProvider implements IMountProvider {
	/**
	 * @var IConfig
	 */
	private $config;

	/**
	 * PreviewsMountProvider constructor.
	 *
	 * @param IConfig $config
	 */
	public function __construct(IConfig $config) {
		$this->config = $config;
	}

	/**
	 * Get the previews mount for a user
	 *
	 * @param IUser $user
	 * @param IStorageFactory $loader
	 * @return \OCP\Files\Mount\IMountPoint[]
	 */
	public function getMountsForUser(IUser $user, IStorageFactory $loader) {
		$previewsPath = $this->config->getSystemValue('previews_path', '');
		if ($previewsPath !== '') {
			$previewsDir = \rtrim($previewsPath, '/') . '/' . $user->getUID();
			if (!\file_exists($previewsDir)) {
				\mkdir($previewsDir, 0770, true);
			}

			return [
				new MountPoint('\OC\Files\Storage\Local', '/' . $user->getUID() . '/thumbnails', ['datadir' => $previewsDir], $loader)
			];
		} else {
			return [];
		}
	}
}
