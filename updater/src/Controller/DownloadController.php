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

namespace Owncloud\Updater\Controller;

use Owncloud\Updater\Utils\Fetcher;
use Owncloud\Updater\Utils\Registry;
use Owncloud\Updater\Utils\FilesystemHelper;

/**
 * Class DownloadController
 *
 * @package Owncloud\Updater\Controller
 */
class DownloadController {
	/**
	 * @var Fetcher
	 */
	protected $fetcher;

	/**
	 * @var Registry
	 */
	protected $registry;

	/**
	 * @var FilesystemHelper
	 */
	protected $fsHelper;

	/**
	 * DownloadController constructor.
	 *
	 * @param Fetcher $fetcher
	 * @param Registry $registry
	 * @param FilesystemHelper $fsHelper
	 */
	public function __construct(Fetcher $fetcher, Registry $registry, FilesystemHelper $fsHelper) {
		$this->fetcher = $fetcher;
		$this->registry = $registry;
		$this->fsHelper = $fsHelper;
	}

	/**
	 * @return array
	 */
	public function checkFeed() {
		$response = $this->getDefaultResponse();
		try {
			$feed = $this->fetcher->getFeed();
			$response['success'] = true;
			$response['data']['feed'] = $feed;
		} catch (\Exception $e) {
			$response['exception'] = $e;
		}

		return $response;
	}

	/**
	 * @param null $progressCallback
	 * @return array
	 */
	public function downloadOwncloud($progressCallback = null) {
		$response = $this->getDefaultResponse();
		if ($progressCallback === null) {
			$progressCallback = function () {
			};
		}
		try {
			$feed = $this->getFeed();
			$path = $this->fetcher->getBaseDownloadPath($feed);
			// Fixme: Daily channel has no checksum
			$isDailyChannel = $this->fetcher->getUpdateChannel() == 'daily';
			if (!$isDailyChannel) {
				$md5 = $this->fetcher->getMd5($feed);
			} else {
				// We can't check md5 so we don't trust the cache
				$this->fsHelper->removeIfExists($path);
			}
			/* @phan-suppress-next-line PhanPossiblyUndeclaredVariable */
			if ($isDailyChannel || !$this->checkIntegrity($path, $md5)) {
				$this->fetcher->getOwncloud($feed, $progressCallback);
			}

			/* @phan-suppress-next-line PhanPossiblyUndeclaredVariable */
			if ($isDailyChannel || $this->checkIntegrity($path, $md5)) {
				$response['success'] = true;
				$response['data']['path'] = $path;
			} else {
				$response['exception'] = new \Exception('Deleted ' . $feed->getDownloadedFileName() . ' due to wrong checksum');
			}
		} catch (\Exception $e) {
			if (isset($path)) {
				$this->fsHelper->removeIfExists($path);
			}
			$response['exception'] = $e;
		}
		return $response;
	}

	/**
	 * Check if package is not corrupted on download
	 * @param string $path
	 * @param string $md5
	 * @return boolean
	 */
	protected function checkIntegrity($path, $md5) {
		$fileExists = $this->fsHelper->fileExists($path);
		$checksumMatch = $fileExists && $md5 === $this->fsHelper->md5File($path);
		if (!$checksumMatch) {
			$this->fsHelper->removeIfExists($path);
		}
		return $checksumMatch;
	}

	/**
	 * Get a Feed instance
	 * @param bool $useCache
	 * @return \Owncloud\Updater\Utils\Feed
	 */
	protected function getFeed($useCache = true) {
		if ($useCache && $this->registry->get('feed') !== null) {
			return $this->registry->get('feed');
		}
		return $this->fetcher->getFeed();
	}

	/**
	 * Init response array
	 * @return array
	 */
	protected function getDefaultResponse() {
		return [
			'success' => false,
			'exception' => '',
			'details' => '',
			'data' => []
		];
	}
}
