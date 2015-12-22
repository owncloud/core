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

namespace OCA\Files_Sharing\Command;

use OC\Command\FileAccess;
use OCA\Files_Sharing\AppInfo\Application;
use OCA\Files_Sharing\External\Manager;
use OCP\Command\ICommand;
use OCP\Files\Node;

class NotifyExternalShare implements ICommand {
	use FileAccess;

	/**
	 * @var string
	 */
	private $user;

	/**
	 * @var int
	 */
	private $fileId;

	/**
	 * @param string $user
	 * @param int $fileId file id of the root of the external share
	 */
	function __construct($user, $fileId) {
		$this->user = $user;
		$this->fileId = $fileId;
	}

	public function handle() {
		$userManager = \OC::$server->getUserManager();
		$application = new Application();
		if (!$userManager->userExists($this->user)) {
			return;
		}
		$user = $userManager->get($this->user);

		$userFolder = $this->getUserFolder($user);
		$nodes = $userFolder->getById($this->fileId);
		if (count($nodes) === 0) {
			return;
		}
		$node = $nodes[0];
		/** @var Manager $externalManager */
		$externalManager = $application->getContainer()->query('ExternalManager');
		$sharesInfo = $externalManager->getOutgoingShares($this->fileId, $this->user);
		if (count($sharesInfo) === 0) {
			return;
		}

		foreach ($sharesInfo as $info) {
			$remote = $this->getRemote($info['share_with']);
			$externalManager->notifyUpdate($remote, $info['token'], $info['id'], '', $node->getEtag());
		}
	}

	private function getRemote($shareWith) {
		list(, $remote) = explode('@', $shareWith);
		return $remote;
	}

}
