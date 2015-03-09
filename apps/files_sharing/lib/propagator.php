<?php
/**
 * Copyright (c) 2014 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Files_Sharing;

use OC\Files\Cache\ChangePropagator;
use OC\Files\Filesystem;
use OC\Files\View;
use OC\Share\Share;

class Propagator {
	/**
	 * @var string
	 */
	protected $userId;

	/**
	 * @var \OC\Files\Cache\ChangePropagator
	 */
	protected $changePropagator;

	/**
	 * @var \OCP\IConfig
	 */
	protected $config;

	/**
	 * @param string $userId current user, must match the propagator's
	 * user
	 * @param \OC\Files\Cache\ChangePropagator $changePropagator change propagator
	 * initialized with a view for $user
	 * @param \OCP\IConfig $config
	 */
	public function __construct($userId, $changePropagator, $config) {
		$this->userId = $userId;
		$this->changePropagator = $changePropagator;
		$this->config = $config;
	}

	/**
	 * Propagate the etag changes for all shares marked as dirty and mark the shares as clean
	 *
	 * @param array $shares the shares for the users
	 * @param int $time
	 */
	public function propagateDirtyMountPoints(array $shares, $time = null) {
		if ($time === null) {
			$time = time();
		}
		$dirtyShares = $this->getDirtyShares($shares);
		foreach ($dirtyShares as $share) {
			$this->changePropagator->addChange($share['file_target']);
		}
		$this->config->setUserValue($this->userId, 'files_sharing', 'last_propagate', $time);
		if (count($dirtyShares)) {
			$this->changePropagator->propagateChanges($time);
		}
	}

	/**
	 * Get all shares we need to update the etag for
	 *
	 * @param array $shares the shares for the users
	 * @return string[]
	 */
	protected function getDirtyShares($shares) {
		$dirty = [];
		$userTime = $this->config->getUserValue($this->userId, 'files_sharing', 'last_propagate', 0);
		foreach ($shares as $share) {
			$updateTime = $this->config->getAppValue('files_sharing', $share['id'], 0);
			if ($updateTime >= $userTime) {
				$dirty[] = $share;
			}
		}
		return $dirty;
	}

	/**
	 * @param array $share
	 * @param int $time
	 */
	public function markDirty($share, $time = null) {
		if ($time === null) {
			$time = time();
		}
		$this->config->setAppValue('files_sharing', $share['id'], $time);
	}

	public static function writeHook($params) {
		$path = $params['path'];
		$fullPath = Filesystem::getView()->getAbsolutePath($path);
		$mount = Filesystem::getView()->getMount($path);
		if ($mount instanceof SharedMount) {
			self::propagateForOwner($mount->getShare(), $mount->getInternalPath($fullPath), $mount->getOwnerPropagator());
		}
	}

	/**
	 * @param array $share
	 * @param string $internalPath
	 * @param \OC\Files\Cache\ChangePropagator $propagator
	 */
	private static function propagateForOwner($share, $internalPath, ChangePropagator $propagator) {
		// note that we have already set up the filesystem for the owner when mounting the share
		$view = new View('/' . $share['uid_owner'] . '/files');

		$shareRootPath = $view->getPath($share['item_source']);
		if ($shareRootPath) {
			$path = $shareRootPath . '/' . $internalPath;
			$propagator->addChange($path);
			$propagator->propagateChanges();
		}
	}

	/**
	 * Listen on the propagator for updates made to shares owned by a user
	 *
	 * @param \OC\Files\Cache\ChangePropagator $propagator
	 * @param string $owner
	 */
	public function attachToPropagator(ChangePropagator $propagator, $owner) {
		$shares = Share::getAllSharesForOwner($owner);
		$propagator->listen('\OC\Files', 'propagate', function ($path, $entry) use ($shares) {
			foreach ($shares as $share) {
				if ((int)$share['file_source'] === $entry['fileid']) {
					// make sure we also get child entries from group shares
//					$sharesForFile = Share::
					$this->markDirty($share, time());
				}
			}
		});
	}
}
