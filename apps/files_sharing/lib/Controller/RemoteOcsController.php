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


use OC\Files\Filesystem;
use OCA\Files_Sharing\External\Manager;
use OCP\AppFramework\OCSController;
use OCP\IRequest;

class RemoteOcsController extends OCSController {
	public function __construct(
		$appName,
		IRequest $request
	) {
		parent::__construct($appName, $request);
		$this->request = $request;
	}

	public function getOpenShares() {
		$externalManager = new Manager(
			\OC::$server->getDatabaseConnection(),
			Filesystem::getMountManager(),
			Filesystem::getLoader(),
			\OC::$server->getNotificationManager(),
			\OC::$server->getEventDispatcher(),
			\OC_User::getUser()
		);

		return new \OC_OCS_Result($externalManager->getOpenShares());
	}

	public function acceptShare($id) {
		$externalManager = new Manager(
			\OC::$server->getDatabaseConnection(),
			Filesystem::getMountManager(),
			Filesystem::getLoader(),
			\OC::$server->getNotificationManager(),
			\OC::$server->getEventDispatcher(),
			\OC_User::getUser()
		);

		if ($externalManager->acceptShare((int) $id)) {
			return new \OC_OCS_Result();
		}

		// Make sure the user has no notification for something that does not exist anymore.
		$externalManager->processNotification((int) $id);

		return new \OC_OCS_Result(null, 404, "wrong share ID, share doesn't exist.");
	}

	public function declineShare($id) {
		$externalManager = new Manager(
			\OC::$server->getDatabaseConnection(),
			Filesystem::getMountManager(),
			Filesystem::getLoader(),
			\OC::$server->getNotificationManager(),
			\OC::$server->getEventDispatcher(),
			\OC_User::getUser()
		);

		if ($externalManager->declineShare((int) $id)) {
			return new \OC_OCS_Result();
		}

		// Make sure the user has no notification for something that does not exist anymore.
		$externalManager->processNotification((int) $id);

		return new \OC_OCS_Result(null, 404, "wrong share ID, share doesn't exist.");
	}

	public function getShares() {
		$externalManager = new Manager(
			\OC::$server->getDatabaseConnection(),
			Filesystem::getMountManager(),
			Filesystem::getLoader(),
			\OC::$server->getNotificationManager(),
			\OC::$server->getEventDispatcher(),
			\OC_User::getUser()
		);

		$shares = $externalManager->getAcceptedShares();

		$shares = \array_map([$this, 'extendShareInfo'], $shares);

		return new \OC_OCS_Result($shares);
	}

	public function getShare($id) {
		$externalManager = new Manager(
			\OC::$server->getDatabaseConnection(),
			Filesystem::getMountManager(),
			Filesystem::getLoader(),
			\OC::$server->getNotificationManager(),
			\OC::$server->getEventDispatcher(),
			\OC_User::getUser()
		);

		$shareInfo = $externalManager->getShare($id);

		if ($shareInfo === false) {
			return new \OC_OCS_Result(null, 404, 'share does not exist');
		} else {
			$shareInfo = $this->extendShareInfo($shareInfo);
			return new \OC_OCS_Result($shareInfo);
		}
	}

	public function unshare($id) {
		$externalManager = new Manager(
			\OC::$server->getDatabaseConnection(),
			Filesystem::getMountManager(),
			Filesystem::getLoader(),
			\OC::$server->getNotificationManager(),
			\OC::$server->getEventDispatcher(),
			\OC_User::getUser()
		);

		$shareInfo = $externalManager->getShare($id);

		if ($shareInfo === false) {
			return new \OC_OCS_Result(null, 404, 'Share does not exist');
		}

		$mountPoint = '/' . \OC_User::getUser() . '/files' . $shareInfo['mountpoint'];

		if ($externalManager->removeShare($mountPoint) === true) {
			return new \OC_OCS_Result(null);
		} else {
			return new \OC_OCS_Result(null, 403, 'Could not unshare');
		}
	}

	/**
	 * @param array $share Share with info from the share_external table
	 * @return array enriched share info with data from the filecache
	 */
	private function extendShareInfo($share) {
		$view = new \OC\Files\View('/' . \OC_User::getUser() . '/files/');
		$info = $view->getFileInfo($share['mountpoint']);

		$share['mimetype'] = $info->getMimetype();
		$share['mtime'] = $info->getMtime();
		$share['permissions'] = $info->getPermissions();
		$share['type'] = $info->getType();
		$share['file_id'] = $info->getId();

		return $share;
	}
}
