<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

namespace OCA\Files_Sharing\Controller;

use OC\Files\View;
use OC\OCS\Result;
use OCA\Files_Sharing\External\Manager;
use OCP\AppFramework\OCSController;
use OCP\IRequest;
use OCP\Share;
use OCP\Files\StorageNotAvailableException;
use OCP\Files\StorageInvalidException;

class RemoteOcsController extends OCSController {
	/** @var IRequest */
	protected $request;

	/** @var Manager */
	protected $externalManager;

	/** @var string */
	protected $uid;

	/**
	 * RemoteOcsController constructor.
	 *
	 * @param string $appName
	 * @param IRequest $request
	 * @param Manager $externalManager
	 * @param string $uid
	 */
	public function __construct(
		$appName,
		IRequest $request,
		Manager $externalManager,
		$uid
	) {
		parent::__construct($appName, $request);
		$this->request = $request;
		$this->externalManager = $externalManager;
		$this->uid = $uid;
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 *
	 * @return Result
	 */
	public function getOpenShares() {
		return new Result(
			$this->externalManager->getOpenShares()
		);
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 * @param int $id
	 *
	 * @return Result
	 */
	public function acceptShare($id) {
		if ($this->externalManager->acceptShare((int) $id)) {
			$share = $this->externalManager->getShare($id);
			// Frontend part expects a list of accepted shares having state and mountpoint at least
			return new Result(
				[
					[
						'state' => Share::STATE_ACCEPTED,
						'file_target' => $share['mountpoint']
					]
				]
			);
		}

		// Make sure the user has no notification for something that does not exist anymore.
		$this->externalManager->processNotification((int) $id);

		return new Result(null, 404, "wrong share ID, share doesn't exist.");
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 * @param int $id
	 *
	 * @return Result
	 */
	public function declineShare($id) {
		if ($this->externalManager->declineShare((int) $id)) {
			return new Result();
		}

		// Make sure the user has no notification for something that does not exist anymore.
		$this->externalManager->processNotification((int) $id);

		return new Result(null, 404, "wrong share ID, share doesn't exist.");
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 *
	 * @param bool $includingPending
	 * @return Result
	 */
	public function getShares($includingPending = false) {
		$shares = [];
		foreach ($this->externalManager->getAcceptedShares() as $shareInfo) {
			try {
				$shares[] = $this->extendShareInfo($shareInfo);
			} catch (StorageNotAvailableException $e) {
				//TODO: Log the exception here? There are several logs already below the stack
			} catch (StorageInvalidException $e) {
				//TODO: Log the exception here? There are several logs already below the stack
			}
		}

		if ($includingPending === true) {
			/**
			 * pending shares have mountpoint looking like
			 * {{TemporaryMountPointName#/filename.ext}}
			 * so we need to cut it off
			 */
			$openShares = \array_map(
				function ($share) {
					$share['mountpoint'] = \substr(
						$share['mountpoint'],
						\strlen('{{TemporaryMountPointName#')
					);

					$share['mountpoint'] = \rtrim($share['mountpoint'], '}');
					return $share;
				},
				$this->externalManager->getOpenShares()
			);
			$shares = \array_merge($shares, $openShares);
		}

		return new Result($shares);
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 *
	 * @return Result
	 */
	public function getAllShares() {
		return $this->getShares(true);
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 * @param int $id
	 *
	 * @return Result
	 */
	public function getShare($id) {
		$shareInfo = $this->externalManager->getShare($id);

		if ($shareInfo === false) {
			return new Result(null, 404, 'share does not exist');
		} else {
			$shareInfo = $this->extendShareInfo($shareInfo);
			return new Result($shareInfo);
		}
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 * @param int $id
	 *
	 * @return Result
	 */
	public function unshare($id) {
		$shareInfo = $this->externalManager->getShare($id);

		if ($shareInfo === false) {
			return new Result(null, 404, 'Share does not exist');
		}

		$mountPoint = "/{$this->uid}/files{$shareInfo['mountpoint']}";

		if ($this->externalManager->removeShare($mountPoint) === true) {
			return new Result(null);
		} else {
			return new Result(null, 403, 'Could not unshare');
		}
	}

	/**
	 * @param array $share Share with info from the share_external table
	 * @return array enriched share info with data from the filecache
	 * @throws \Exception
	 */
	private function extendShareInfo($share) {
		$info = $this->getFileInfo($share['mountpoint']);
		if ($info !== false) {
			$share['mimetype'] = $info->getMimetype();
			$share['mtime'] = $info->getMtime();
			$share['permissions'] = $info->getPermissions();
			$share['type'] = $info->getType();
			$share['file_id'] = $info->getId();
		}
		return $share;
	}

	/**
	 * @param string $mountpoint
	 * @return false|\OC\Files\FileInfo
	 * @throws \Exception
	 */
	protected function getFileInfo($mountpoint) {
		$view = new View('/' . $this->uid . '/files/');
		return $view->getFileInfo($mountpoint);
	}
}
