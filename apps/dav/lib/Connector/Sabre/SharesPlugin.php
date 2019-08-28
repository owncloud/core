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
use Sabre\DAV\INode;
use Sabre\DAV\Xml\Property\Href;
use OCA\DAV\Connector\Sabre\ShareTypeList;
use OCA\DAV\Connector\Sabre\ShareTypeListParent;
use OCA\DAV\Connector\Sabre\ShareTypeListParentList;

/**
 * Sabre Plugin to provide share-related properties
 */
class SharesPlugin extends \Sabre\DAV\ServerPlugin {
	const NS_OWNCLOUD = 'http://owncloud.org/ns';
	const SHARETYPES_PROPERTYNAME = '{http://owncloud.org/ns}share-types';
	const SHARETYPESPARENTS_PROPERTYNAME = '{http://owncloud.org/ns}share-types-parents';

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

	/** @var string */
	private $fsRelativePathFromTreeRoot;

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

	/** @var array */
	private $cachedParents = [];

	/**
	 * @param \Sabre\DAV\Tree $tree tree
	 * @param IUserSession $userSession user session
	 * @param \OCP\Files\Folder $userFolder user home folder
	 * @param \OCP\Share\IManager $shareManager share manager
	 */
	public function __construct(
		\Sabre\DAV\Tree $tree,
		$fsRelativePathFromTreeRoot,
		IUserSession $userSession,
		\OCP\Share\IManager $shareManager
	) {
		$this->tree = $tree;
		$this->fsRelativePathFromTreeRoot = $fsRelativePathFromTreeRoot;
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
		$server->xml->elementMap[self::SHARETYPESPARENTS_PROPERTYNAME] = 'OCA\\DAV\Connector\\Sabre\\ShareTypeListParentList';
		$server->protectedProperties[] = self::SHARETYPES_PROPERTYNAME;
		$server->protectedProperties[] = self::SHARETYPESPARENTS_PROPERTYNAME;

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
	 * Get the parent nodes for this specific nodes
	 * The list of INode will start from the root folder and traverse the node's
	 * parents until we reach the target node. The target node will also be included
	 * in the list.
	 * Note that this function uses internal caching optimized to reduce the number
	 * of hits to the "getNodeForPath" function:
	  * - The caching will be done by path in order to check in the cache for
	  * parent folders easily (we can't know anything using the just id)
	 */
	private function getParentNodesForNode(\OCA\DAV\Connector\Sabre\Node $node) {
		$nodePath = $node->getPath();
		$path = \trim($nodePath, '/');

		if (isset($this->cachedParents[$path])) {
			return $this->cachedParents[$path];
		}

		$pathParts = \explode('/', $path);
		$pathPartsCount = \count($pathParts);
		$composedPath = '';  // in order to build the path starting from the root
		$accumulatedNodes = [];  // to store the nodes we're traversing

		for ($i = 0; $i < $pathPartsCount - 1; $i++) {
			$composedPath .= $pathParts[$i];
			if (isset($this->cachedParents[$composedPath])) {
				// this path is already cached -> prepare for the next iteration and skip this one
				$accumulatedNodes = $this->cachedParents[$composedPath];
				$composedPath .= '/';
				continue;
			}

			$composedNodePath = "{$this->fsRelativePathFromTreeRoot}/$composedPath";
			$targetNode = $this->tree->getNodeForPath($composedNodePath);

			$accumulatedNodes[] = $targetNode;  // add the node to the parent list
			$this->cachedParents[\trim($targetNode->getPath(), '/')] = $accumulatedNodes;  // store the node with the parents
			$composedPath .= '/';
		}

		$accumulatedNodes[] = $node;
		$this->cachedParents[\trim($node->getPath(), '/')] = $accumulatedNodes;

		return $accumulatedNodes;
	}

	/**
	 * Adds shares to propfind response
	 *
	 * @param PropFind $propFind propfind object
	 * @param \Sabre\DAV\INode $sabreNode sabre node
	 */
	public function handleGetProperties(
		PropFind $propFind,
		INode $sabreNode
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

		if ($propFind->getStatus(self::SHARETYPESPARENTS_PROPERTYNAME) !== null) {
			$parentNodeIdsArray = [];
			$parentNodes = $this->getParentNodesForNode($sabreNode);
			foreach ($parentNodes as $parentNode) {
				$parentNodeId = $parentNode->getId();
				$parentNodeIdsArray[] = $parentNodeId;
				$initShareTypes[$parentNodeId] = [];

				$parentShares = $this->getSharesForNodeIds($parentNodeIdsArray);
				foreach ($this->convertToHashMap($parentShares, $initShareTypes) as $parentNodeId => $data) {
					$this->cachedShareTypes[$parentNodeId] = $data;
				}
			}
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

		$propFind->handle(self::SHARETYPESPARENTS_PROPERTYNAME, function () use ($sabreNode) {
			$parentNodes = $this->getParentNodesForNode($sabreNode);
			$shareTypeListParentList = [];
			$baseFSPath = \rtrim($this->server->getBaseUri() . $this->fsRelativePathFromTreeRoot, '/');
			foreach ($parentNodes as $parentNode) {
				if ($parentNode === $sabreNode) {
					// the node will be returned as the last element of the parent list, so skip it.
					continue;
				}

				if (isset($this->cachedShareTypes[$parentNode->getId()])) {
					// Share types in cache for this node
					$shareTypesHash = $this->cachedShareTypes[$parentNode->getId()];
				} else {
					// Share types for this node not in cache, obtain if any
					$nodeId = $parentNode->getId();
					$returnedShares = $this->getSharesForNodeIds([$nodeId]);

					// Initialize share types for this node and obtain share types hash if any
					$initShareTypes[$nodeId] = [];
					$shareTypesHash = $this->convertToHashMap($returnedShares, $initShareTypes)[$nodeId];
				}
				$shareTypes = \array_keys($shareTypesHash);

				$shareTypeList = new ShareTypeList($shareTypes);
				$shareTypeListParentList[] = new ShareTypeListParent(new Href($baseFSPath . $parentNode->getPath()), $shareTypeList);
			}
			return new ShareTypeListParentList($shareTypeListParentList);
		});
	}
}
