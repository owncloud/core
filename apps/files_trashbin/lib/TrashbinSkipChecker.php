<?php
/**
 * @author Jan Ackermann <jackermann@owncloud.com>
 * @author Jannik Stehle <jstehle@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

namespace OCA\Files_Trashbin;

use OC\Files\View;
use OCP\IConfig;
use OCP\ILogger;
use OCP\Util;

/**
 * Class TrashbinSkipChecker
 *
 * TrashbinSkipChecker won't be initialized trough dependency injection
 *
 * @package OCA\Files_Trashbin
 */
class TrashbinSkipChecker {

	/**
	 * @var ILogger
	 */
	private $logger;

	/**
	 * @var  IConfig
	 */
	private $config;

	/**
	 * @param ILogger $logger
	 * @param IConfig $config
	 */
	public function __construct(
		ILogger $logger,
		IConfig $config
	) {
		$this->logger = $logger;
		$this->config = $config;
	}

	/**
	 * Check if a given path needs to be skipped by the trashbin
	 *
	 * @param View $view resource view
	 * @param string $relativePath relative path to the file or folder
	 * @return bool
	 */
	public function shouldSkipPath(View $view, string $relativePath): bool {
		$isFolder = $view->getMimeType($relativePath) === 'httpd/unix-directory';
		$relativePath = \ltrim($relativePath, '/');

		if ($this->checkDirectoryName($relativePath, $isFolder) === true) {
			return true;
		}

		if (!$isFolder && $this->checkFileExtension($relativePath) === true) {
			return true;
		}

		if ($this->checkFileSize($view, $relativePath) === true) {
			return true;
		}

		return false;
	}

	protected function checkDirectoryName(string $relativePath, bool $isFolder): bool {
		$directoriesToSkip = $this->config->getSystemValue('trashbin_skip_directories', []);

		if ($isFolder) {
			// add trailing slash to ensure correct behavior with folders.
			// otherwise a config like "tes" would apply to a folder "test".
			$relativePath = \rtrim($relativePath, '/');
			$relativePath .= '/';
		}

		foreach ($directoriesToSkip as $skipItem) {
			$skipItem = \trim($skipItem);
			$skipItem .= '/';

			if (\substr($relativePath, 0, \strlen($skipItem)) === $skipItem) {
				$this->logger->info("Path $relativePath skipped the trashbin and has been deleted immediately due to the trashbin_skip_directories config $skipItem");
				return true;
			}
		}

		return false;
	}

	protected function checkFileExtension(string $relativePath): bool {
		$fileExtensionsToSkip = $this->config->getSystemValue('trashbin_skip_extensions', []);

		foreach ($fileExtensionsToSkip as $skipItem) {
			$skipItem = '.'.\strtolower(\trim($skipItem));

			if (\strtolower(\substr($relativePath, -\strlen($skipItem))) === $skipItem) {
				$this->logger->info("Path $relativePath skipped the trashbin and has been deleted immediately due to the trashbin_skip_extensions config $skipItem");
				return true;
			}
		}

		return false;
	}

	protected function checkFileSize(View $view, string $relativePath): bool {
		$skipSizeThreshold = $this->config->getSystemValue('trashbin_skip_size_threshold', false);

		if ($skipSizeThreshold === false) {
			return false;
		}

		$computerSkipSizeThreshold = Util::computerFileSize($skipSizeThreshold);

		if ($computerSkipSizeThreshold === false || $computerSkipSizeThreshold < 0) {
			$this->logger->warning("Config trashbin_skip_size_threshold value $skipSizeThreshold is invalid");
			return false;
		}

		if ($view->filesize($relativePath) >= $computerSkipSizeThreshold) {
			$this->logger->info("Path $relativePath skipped the trashbin and has been deleted immediately due to the trashbin_skip_size_threshold config $skipSizeThreshold");
			return true;
		}

		return false;
	}
}
