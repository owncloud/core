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
namespace OCA\DAV\Connector\Sabre;

use OCP\IUserSession;
use OCP\Share\IShare;
use Sabre\DAV\PropFind;

/**
 * Sabre Plugin to provide share-related properties
 */
class SharesPlugin extends \Sabre\DAV\ServerPlugin {
	const NS_OWNCLOUD = 'http://owncloud.org/ns';
	const SHARETYPES_PROPERTYNAME = '{http://owncloud.org/ns}share-types';

	/**
	 * Reference to main server object
	 *
	 * @var \Sabre\DAV\Server
	 */
	private $server;

	/**
	 * @var \OCP\Share\IManager
	 */
	private $shareManager;

	/**
	 * @var \Sabre\DAV\Tree
	 */
	private $tree;

	/**
	 * @var string
	 */
	private $userId;

	/**
	 * @var \OCP\Files\Folder
	 */
	private $userFolder;

	/**
	 * @var IShare[]
	 */
	private $cachedShareTypes;

	/**
	 * @param \Sabre\DAV\Tree $tree tree
	 * @param IUserSession $userSession user session
	 * @param \OCP\Files\Folder $userFolder user home folder
	 * @param \OCP\Share\IManager $shareManager share manager
	 */
	public function __construct(
		\Sabre\DAV\Tree $tree,
		IUserSession $userSession,
		\OCP\Share\IManager $shareManager
	) {
		$this->tree = $tree;
		$this->shareManager = $shareManager;
		$this->userId = $userSession->getUser()->getUID();
		$this->cachedShareTypes = [];
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
	 */
	public function initialize(\Sabre\DAV\Server $server) {
		$server->xml->namespacesMap[self::NS_OWNCLOUD] = 'oc';
		$server->xml->elementMap[self::SHARETYPES_PROPERTYNAME] = 'OCA\\DAV\\Connector\\Sabre\\ShareTypeList';
		$server->protectedProperties[] = self::SHARETYPES_PROPERTYNAME;

		$this->server = $server;
		$this->server->on('propFind', [$this, 'handleGetProperties']);
	}

	/**
	 * Converts IShare[] to int[][] hash map
	 *
	 * @param  IShare[] $allShares - array containing shares
	 * @param  int[][] $initShareTypes - array containing hash map nodeIds->shareTypes $initShareTypes[$currentNodeID][$currentShareType]
	 *
	 * @return int[][] hashmap of share types
	 */
	private function convertToHashMap($allShares, $initShareTypes) {
		// Use some already preinitialized hash map which may contain some values e.g. empty arrays
		$shareTypes = $initShareTypes;
		
		foreach ($allShares as $share) {
			$currentNodeID = $share->getNodeId();
			$currentShareType = $share->getShareType();
			$shareTypes[$currentNodeID][$currentShareType] = true;
		}
		
		return $shareTypes;
	}
	
	/**
	 * Get all shares for specific nodeIDs
	 *
	 * @param int[] $nodeIDs - array of folder/file nodeIDs
	 *
	 * @return IShare[] array containing shares
	 */
	private function getSharesForNodeIds($nodeIDs) {
		$requestedShareTypes = [
			\OCP\Share::SHARE_TYPE_USER,
			\OCP\Share::SHARE_TYPE_GROUP,
			\OCP\Share::SHARE_TYPE_LINK,
			\OCP\Share::SHARE_TYPE_REMOTE
		];

		// Query DB for share types for specified node IDs
		$allShares = $this->shareManager->getAllSharesBy(
			$this->userId,
			$requestedShareTypes,
			$nodeIDs
		);
		
		return $allShares;
	}

	/**
	 * Adds shares to propfind response
	 *
	 * @param PropFind $propFind propfind object
	 * @param \Sabre\DAV\INode $sabreNode sabre node
	 */
	public function handleGetProperties(
		PropFind $propFind,
		\Sabre\DAV\INode $sabreNode
	) {
		if (!($sabreNode instanceof \OCA\DAV\Connector\Sabre\Node)) {
			return;
		}

		// need prefetch ?
		if ($sabreNode instanceof \OCA\DAV\Connector\Sabre\Directory
			&& $propFind->getDepth() !== 0
			&& $propFind->getStatus(self::SHARETYPES_PROPERTYNAME) !== null
		) {
			$children = $sabreNode->getChildren();

			// Get ID of parent folder
			$folderNodeID = $sabreNode->getId();
			$nodeIdsArray = [$folderNodeID];

			// Initialize share types array for this node in case there would be no shares for this node
			$initShareTypes[$folderNodeID] = [];
			
			// Get IDs for all children of the parent folder
			foreach ($children as $childNode) {
				// Ensure that they are of File or Folder type
				if (!($childNode instanceof \OCA\DAV\Connector\Sabre\Directory) &&
					!($childNode instanceof \OCA\DAV\Connector\Sabre\File)) {
					return;
				}

				// Put node ID into an array and initialize cache for it
				$nodeId = $childNode->getId();
				\array_push($nodeIdsArray, $nodeId);
				
				// Initialize share types array for this node in case there would be no shares for this node
				$initShareTypes[$nodeId] = [];
			}

			// Get all shares for specified nodes obtaining them from DB
			$returnedShares = $this->getSharesForNodeIds($nodeIdsArray);
			
			// Convert to hash map and cache so that $propFind->handle() can use it
			$this->cachedShareTypes = $this->convertToHashMap($returnedShares, $initShareTypes);
		}

		$propFind->handle(self::SHARETYPES_PROPERTYNAME, function () use ($sabreNode) {
			if (isset($this->cachedShareTypes[$sabreNode->getId()])) {
				// Share types in cache for this node
				$shareTypesHash = $this->cachedShareTypes[$sabreNode->getId()];
			} else {
				// Share types for this node not in cache, obtain if any
				$nodeId = $sabreNode->getId();
				$returnedShares = $this->getSharesForNodeIds([$nodeId]);

				// Initialize share types for this node and obtain share types hash if any
				$initShareTypes[$nodeId] = [];
				$shareTypesHash = $this->convertToHashMap($returnedShares, $initShareTypes)[$nodeId];
			}
			$shareTypes = \array_keys($shareTypesHash);

			return new ShareTypeList($shareTypes);
		});
	}
}
