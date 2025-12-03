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

namespace Owncloud\Updater\Utils;

use Owncloud\Updater\Console\Application;

/**
 * Class Checkpoint
 *
 * @package Owncloud\Updater\Utils
 */
class Checkpoint {
	public const CORE_DIR = 'core';
	public const APP_DIR = 'apps';

	/**
	 * @var Locator $locator
	 */
	protected $locator;

	/**
	 * @var Filesystemhelper $fsHelper
	 */
	protected $fsHelper;

	/**
	 *
	 * @param Locator $locator
	 * @param FilesystemHelper $fsHelper
	 */
	public function __construct(Locator $locator, FilesystemHelper $fsHelper) {
		$this->locator = $locator;
		$this->fsHelper = $fsHelper;
	}

	/**
	 * Creates a checkpoint
	 * @return string
	 * @throws \Exception if base checkpoint directory is not writable
	 */
	public function create() {
		$checkpointId = $this->createCheckpointId();
		$checkpointPath = $this->getCheckpointPath($checkpointId);
		try {
			if (!$this->fsHelper->isWritable($this->locator->getCheckpointDir())) {
				throw new \Exception($this->locator->getCheckpointDir() . ' is not writable.');
			}
			$this->fsHelper->mkdir($checkpointPath);

			$checkpointCorePath = $checkpointPath . '/' . self::CORE_DIR;
			$this->fsHelper->mkdir($checkpointCorePath);
			$core = $this->locator->getRootDirItems();
			foreach ($core as $coreItem) {
				$cpItemPath = $checkpointCorePath . '/' . \basename($coreItem);
				$this->fsHelper->copyr($coreItem, $cpItemPath, true);
			}
			//copy config.php
			$configDirSrc = $this->locator->getOwnCloudRootPath() . '/config';
			$configDirDst = $checkpointCorePath . '/config';
			$this->fsHelper->copyr($configDirSrc, $configDirDst, true);

			$checkpointAppPath = $checkpointPath . '/' . self::APP_DIR;
			$this->fsHelper->mkdir($checkpointAppPath);
			$appManager = Application::$container['utils.appmanager'];
			$apps = $appManager->getAllApps();
			foreach ($apps as $appId) {
				$appPath = $appManager->getAppPath($appId);
				if ($appPath) {
					$this->fsHelper->copyr($appPath, $checkpointAppPath . '/' . $appId, true);
				}
			}
		} catch (\Exception $e) {
			$application = Application::$container['application'];
			$application->getLogger()->error($e->getMessage());
			$this->fsHelper->removeIfExists($checkpointPath);
			throw $e;
		}
		return $checkpointId;
	}

	/**
	 * Restore a checkpoint by id
	 * @param string $checkpointId id of checkpoint
	 * @throws \UnexpectedValueException if there is no checkpoint with this id
	 */
	public function restore($checkpointId) {
		$this->assertCheckpointExists($checkpointId);
		$checkpointDir = $this->locator->getCheckpointDir() . '/' . $checkpointId;
		$ocRoot = $this->locator->getOwnCloudRootPath();
		$this->fsHelper->copyr($checkpointDir . '/' . self::CORE_DIR, $ocRoot, false);
		$this->fsHelper->copyr($checkpointDir . '/' . self::APP_DIR, $ocRoot . '/' . self::APP_DIR, false);
	}

	/**
	 * Remove a checkpoint by id
	 * @param string $checkpointId id of checkpoint
	 * @throws \UnexpectedValueException if there is no checkpoint with this id
	 */
	public function remove($checkpointId) {
		$this->assertCheckpointExists($checkpointId);
		$checkpointPath = $this->getCheckpointPath($checkpointId);
		$this->fsHelper->removeIfExists($checkpointPath);
	}

	/**
	 * Return all checkpoints as an array of items [ 'title', 'date' ]
	 * @return array
	 */
	public function getAll() {
		$checkpoints = [];
		foreach ($this->getAllCheckpointIds() as $dir) {
			$checkpoints[] = [
				'title' => $dir,
				'date' => \date(
					"F d Y H:i",
					$this->fsHelper->filemtime(
						$this->locator->getCheckpointDir() . '/' . $dir
					)
				)
			];
		}
		return $checkpoints;
	}

	/**
	 * Check if there is a checkpoint with a given id
	 * @param string $checkpointId id of checkpoint
	 * @return bool
	 */
	public function checkpointExists($checkpointId) {
		return \in_array($checkpointId, $this->getAllCheckpointIds());
	}

	/**
	 * Get the most recent checkpoint Id
	 * @return string|bool
	 */
	public function getLastCheckpointId() {
		$allCheckpointIds = $this->getAllCheckpointIds();
		return \count($allCheckpointIds) > 0 ? \end($allCheckpointIds) : false;
	}

	/**
	 * Return array of all checkpoint ids
	 * @return array
	 */
	public function getAllCheckpointIds() {
		$checkpointDir = $this->locator->getCheckpointDir();
		$content = $this->fsHelper->isDir($checkpointDir) ? $this->fsHelper->scandir($checkpointDir) : [];
		$checkpoints = \array_filter(
			$content,
			function ($dir) {
				$checkpointPath = $this->getCheckpointPath($dir);
				return !\in_array($dir, ['.', '..']) && $this->fsHelper->isDir($checkpointPath);
			}
		);
		return $checkpoints;
	}

	/**
	 * Create an unique checkpoint id
	 * @return string
	 */
	protected function createCheckpointId() {
		$versionString = \implode('.', $this->locator->getInstalledVersion());
		return \uniqid($versionString . '-');
	}

	/**
	 * Get an absolute path to the checkpoint directory by checkpoint Id
	 * @param string $checkpointId id of checkpoint
	 * @return string
	 */
	public function getCheckpointPath($checkpointId) {
		return $this->locator->getCheckpointDir() . '/' . $checkpointId;
	}

	/**
	 * Produce an error on non-existing checkpoints
	 * @param string $checkpointId id of checkpoint
	 * @throws \UnexpectedValueException if there is no checkpoint with this id
	 */
	private function assertCheckpointExists($checkpointId) {
		if (!$this->checkpointExists($checkpointId) || $checkpointId === '') {
			$message = \sprintf('Checkpoint %s does not exist.', $checkpointId);
			throw new \UnexpectedValueException($message);
		}
	}
}
