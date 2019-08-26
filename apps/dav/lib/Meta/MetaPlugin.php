<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\DAV\Meta;

use OCP\Files\IRootFolder;
use OCP\IUserSession;
use Sabre\DAV\INode;
use Sabre\DAV\PropFind;
use Sabre\DAV\ServerPlugin;

class MetaPlugin extends ServerPlugin {

	// namespace
	const NS_OWNCLOUD = 'http://owncloud.org/ns';
	const PATH_FOR_FILEID_PROPERTYNAME = '{http://owncloud.org/ns}meta-path-for-user';

	/**
	 * Reference to main server object
	 *
	 * @var \Sabre\DAV\Server
	 */
	private $server;
	/**
	 * @var IUserSession
	 */
	private $userSession;
	/**
	 * @var IRootFolder
	 */
	private $rootFolder;

	public function __construct(IUserSession $userSession,
								IRootFolder $rootFolder
	) {
		$this->userSession = $userSession;
		$this->rootFolder = $rootFolder;
	}

	/**
	 * This initializes the plugin.
	 *
	 * This function is called by \Sabre\DAV\Server, after
	 * addPlugin is called.
	 *
	 * This method should set up the required event subscriptions.
	 *
	 * @param \Sabre\DAV\Server $server
	 * @return void
	 */
	public function initialize(\Sabre\DAV\Server $server) {
		$server->xml->namespaceMap[self::NS_OWNCLOUD] = 'oc';
		$server->protectedProperties[] = self::PATH_FOR_FILEID_PROPERTYNAME;

		$this->server = $server;
		$this->server->on('propFind', [$this, 'handleGetProperties']);
	}

	/**
	 * Adds all ownCloud-specific properties
	 *
	 * @param PropFind $propFind
	 * @param \Sabre\DAV\INode $node
	 * @return void
	 */
	public function handleGetProperties(PropFind $propFind, INode $node) {
		if ($node instanceof MetaFolder) {
			$propFind->handle(self::PATH_FOR_FILEID_PROPERTYNAME, function () use ($node) {
				$fileId = $node->getName();

				$uid = $this->userSession->getUser()->getUID();
				$baseFolder = $this->rootFolder->get($uid . '/files/');
				'@phan-var \OC\Files\Node\Folder $baseFolder';
				$files = $baseFolder->getById($fileId);
				if (!$files) {
					return null;
				}
				$file = \current($files);
				return $baseFolder->getRelativePath($file->getPath());
			});
		}
	}
}
