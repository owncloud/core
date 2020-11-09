<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OC\Files\Config;

use OC\Files\Filesystem;
use OC\Files\Mount\MountPoint;
use OC\Files\View;
use OC\Hooks\Emitter;
use OC\Hooks\EmitterTrait;
use OCP\Files\Config\IHomeMountProvider;
use OCP\Files\Config\IMountProviderCollection;
use OCP\Files\Config\IMountProvider;
use OCP\Files\Config\IUserMountCache;
use OCP\Files\Mount\IMountPoint;
use OCP\Files\Storage\IStorageFactory;
use OCP\IUser;

class MountProviderCollection implements IMountProviderCollection, Emitter {
	use EmitterTrait;

	const DEFAULT_MOVE_ATTEMPTS_PER_MOUNTPOINT = 10;

	/**
	 * @var \OCP\Files\Config\IHomeMountProvider[]
	 */
	private $homeProviders = [];

	/**
	 * @var \OCP\Files\Config\IMountProvider[]
	 */
	private $providers = [];

	/**
	 * @var \OCP\Files\Storage\IStorageFactory
	 */
	private $loader;

	/**
	 * @var \OCP\Files\Config\IUserMountCache
	 */
	private $mountCache;

	/**
	 * @param \OCP\Files\Storage\IStorageFactory $loader
	 * @param IUserMountCache $mountCache
	 */
	public function __construct(IStorageFactory $loader, IUserMountCache $mountCache) {
		$this->loader = $loader;
		$this->mountCache = $mountCache;
	}

	/**
	 * Get all configured mount points for the user
	 *
	 * @param \OCP\IUser $user
	 * @return \OCP\Files\Mount\IMountPoint[]
	 */
	public function getMountsForUser(IUser $user) {
		$loader = $this->loader;
		$mounts = \array_map(function (IMountProvider $provider) use ($user, $loader) {
			return $provider->getMountsForUser($user, $loader);
		}, $this->providers);
		$mounts = \array_filter($mounts, function ($result) {
			return \is_array($result);
		});

		$mergedMounts = [];
		$takenMountpoints = [];
		$maxMoveAttempts = $this->getMaxMoveAttempts();
		foreach ($mounts as $providerMounts) {
			foreach ($providerMounts as $mount) {
				$mountpoint = $mount->getMountPoint();
				if (\in_array($mountpoint, $takenMountpoints)) {
					for ($i = 0; $i < $maxMoveAttempts; $i++) {
						$newMountpoint = $this->generateUniqueTarget(
							$mountpoint,
							new View('/' . $user->getUID() . '/files'),
							$takenMountpoints
						);
						/* @phan-suppress-next-line PhanUndeclaredMethod */
						if ($mount->moveMount($newMountpoint) === true) {
							$fsMountManager = Filesystem::getMountManager();
							if ($fsMountManager->findIn($mountpoint)) {
								$fsMountManager->moveMount($mountpoint, $newMountpoint);
							}
							break;
						}
						$takenMountpoints[] = $newMountpoint;
					}
					$takenMountpoints[] = $mount->getMountPoint(); // mount might not have been moved
				} else {
					$takenMountpoints[] = $mountpoint;
				}
				$mergedMounts[] = $mount;
			}
		}

		return $mergedMounts;
	}

	/**
	 * Get the configured home mount for this user
	 *
	 * @param \OCP\IUser $user
	 * @return \OCP\Files\Mount\IMountPoint
	 * @since 9.1.0
	 */
	public function getHomeMountForUser(IUser $user) {
		/** @var \OCP\Files\Config\IHomeMountProvider[] $providers */
		$providers = \array_reverse($this->homeProviders); // call the latest registered provider first to give apps an opportunity to overwrite builtin
		foreach ($providers as $homeProvider) {
			if ($mount = $homeProvider->getHomeMountForUser($user, $this->loader)) {
				$mount->setMountPoint('/' . $user->getUID()); //make sure the mountpoint is what we expect
				return $mount;
			}
		}
		throw new \Exception('No home storage configured for user ' . $user);
	}

	/**
	 * Add a provider for mount points
	 *
	 * @param \OCP\Files\Config\IMountProvider $provider
	 */
	public function registerProvider(IMountProvider $provider) {
		$this->providers[] = $provider;
		$this->emit('\OC\Files\Config', 'registerMountProvider', [$provider]);
	}

	/**
	 * Add a provider for home mount points
	 *
	 * @param \OCP\Files\Config\IHomeMountProvider $provider
	 * @since 9.1.0
	 */
	public function registerHomeProvider(IHomeMountProvider $provider) {
		$this->homeProviders[] = $provider;
		$this->emit('\OC\Files\Config', 'registerHomeMountProvider', [$provider]);
	}

	/**
	 * Cache mounts for user
	 *
	 * @param IUser $user
	 * @param IMountPoint[] $mountPoints
	 */
	public function registerMounts(IUser $user, array $mountPoints) {
		$this->mountCache->registerMounts($user, $mountPoints);
	}

	/**
	 * Get the mount cache which can be used to search for mounts without setting up the filesystem
	 *
	 * @return IUserMountCache
	 */
	public function getMountCache() {
		return $this->mountCache;
	}

	/**
	 * @param string $path
	 * @param View $view
	 * @param MountPoint[] $mountpoints
	 * @return mixed
	 */
	private function generateUniqueTarget($path, $view, array $mountpoints) {
		$pathinfo = \pathinfo($path);
		$ext = (isset($pathinfo['extension'])) ? '.' . $pathinfo['extension'] : '';
		$name = $pathinfo['filename'];
		$dir = $pathinfo['dirname'];

		$i = 2;
		while (\in_array($path, $mountpoints) || $view->file_exists($path)) {
			$path = Filesystem::normalizePath($dir . '/' . $name . ' ('.$i.')' . $ext);
			$i++;
		}

		return $path;
	}

	protected function getMaxMoveAttempts() {
		return \OC::$server->getConfig()
			->getSystemValue('filesystem.max_mountpoint_move_attempts', self::DEFAULT_MOVE_ATTEMPTS_PER_MOUNTPOINT);
	}
}
