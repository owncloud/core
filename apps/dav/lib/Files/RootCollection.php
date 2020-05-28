<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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
namespace OCA\DAV\Files;

use OCA\DAV\Connector\Sabre\Directory;
use Sabre\DAV\INode;
use Sabre\DAV\SimpleCollection;
use Sabre\DAVACL\AbstractPrincipalCollection;

class RootCollection extends AbstractPrincipalCollection {
	/** @var INode[] [uid => INode]*/
	private $cachedPrincipalRootNodes = [];

	/**
	 * This method returns a node for a principal.
	 *
	 * The passed array contains principal information, and is guaranteed to
	 * at least contain a uri item. Other properties may or may not be
	 * supplied by the authentication backend.
	 *
	 * @param array $principalInfo
	 * @return INode
	 */
	public function getChildForPrincipal(array $principalInfo) {
		list(, $name) = \Sabre\Uri\split($principalInfo['uri']);
		$user = \OC::$server->getUserSession()->getUser();

		$uid = '';
		if ($user !== null) {
			$uid = $user->getUID();
		}

		if (isset($this->cachedPrincipalRootNodes[$uid])) {
			// $user = null will be automatically converted to an empty string
			// when it's stored as an array key. There won't be a valid user with
			// an empty string as uid
			return $this->cachedPrincipalRootNodes[$uid];
		}

		if ($uid === '' || $name !== $uid) {
			// a user is only allowed to see their own home contents, so in case another collection
			// is accessed, we return a simple empty collection for now
			// in the future this could be considered to be used for accessing shared files
			$this->cachedPrincipalRootNodes[$uid] = new SimpleCollection($name);
			return $this->cachedPrincipalRootNodes[$uid];
		}
		$home = new FilesHome($principalInfo);
		$view = \OC\Files\Filesystem::getView();
		if ($view) {
			$rootInfo = $view->getFileInfo('');
			$rootNode = new Directory($view, $rootInfo, $home);
			$home->init($rootNode, $view, \OC::$server->getMountManager());
		}
		$this->cachedPrincipalRootNodes[$uid] = $home;

		return $this->cachedPrincipalRootNodes[$uid];
	}

	public function getName() {
		return 'files';
	}
}
