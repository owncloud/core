<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\Upload;

use OC\Files\Mount\MountPoint;
use OC\Files\Storage\Local;
use OCP\Files\Config\IMountProvider;
use OCP\Files\Storage\IStorageFactory;
use OCP\IConfig;
use OCP\IUser;

/**
 * Class ChunkLocationProvider
 *
 * This class provides a mount point for the uploads folder.
 * Each user will will have it's own folder within where chunks of the
 * file chunking are being stored.
 *
 * To enable this class see config/config.sample.php
 *
 * @package OCA\DAV\Upload
 */
class ChunkLocationProvider implements IMountProvider {

	/** @var IConfig */
	private $config;

	/**
	 * ChunkLocationProvider constructor.
	 *
	 * @param IConfig $config
	 */
	public function __construct(IConfig $config) {
		$this->config = $config;
	}

	/**
	 * Get the cache mount for a user
	 *
	 * @param IUser $user
	 * @param IStorageFactory $loader
	 * @return \OCP\Files\Mount\IMountPoint[]
	 */
	public function getMountsForUser(IUser $user, IStorageFactory $loader) {
		$chunkBaseDir = $this->config->getSystemValue('dav.chunk_base_dir', '');
		if ($chunkBaseDir === '') {
			return [];
		}
		$cacheDir = \rtrim($chunkBaseDir, '/') . '/' . $user->getUID();
		if (!\file_exists($cacheDir)) {
			\mkdir($cacheDir, 0770, true);
		}

		return [
			new MountPoint(Local::class, '/' . $user->getUID() . '/uploads', ['datadir' => $cacheDir, $loader])
		];
	}
}
