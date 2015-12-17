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

class Expire implements ICommand {
	use FileAccess;

	/**
	 * @var string
	 */
	private $user;

	/**
	 * @var string
	 */
	private $path;

	/**
	 * @param string $user
	 * @param string $path root path of the external share
	 */
	function __construct($user, $path) {
		$this->user = $user;
		$this->path = $path;
	}

	public function handle() {
		$userManager = \OC::$server->getUserManager();
		$application = new Application();
		if (!$userManager->userExists($this->user)) {
			return;
		}
		$user = $userManager->get($this->user);

		$userFolder = $this->getUserFolder($user);
		$node = $userFolder->get($this->path);
		/** @var Manager $externalManager */
		$externalManager = $application->getContainer()->query('ExternalManager');
		$info = $externalManager->getOutgoingShare($node->getId());
		if (!$info) {
			return;
		}

		$remote = $this->getRemote($info['share_with']);
		$externalManager->notifyUpdate($remote, $info['token'], $info['id'], '', $node->getEtag());
	}

	private function getRemote($shareWith) {
		list(, $remote) = explode('@', $shareWith);
		return $remote;
	}

}
