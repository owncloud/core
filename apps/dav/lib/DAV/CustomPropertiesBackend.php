<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace OCA\DAV\DAV;

use Doctrine\DBAL\Connection;
use OCA\DAV\Connector\Sabre\Directory;
use OCA\DAV\Connector\Sabre\Node;
use OCP\IDBConnection;
use OCP\IUser;
use Sabre\DAV\INode;
use Sabre\DAV\PropertyStorage\Backend\BackendInterface;
use Sabre\DAV\PropFind;
use Sabre\DAV\PropPatch;
use Sabre\DAV\Tree;
use Sabre\Dav\Exception\Forbidden;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\Exception\ServiceUnavailable;

class CustomPropertiesBackend implements BackendInterface {

	const SELECT_BY_ID_STMT = 'SELECT * FROM `*PREFIX*properties` WHERE `fileid` = ?';
	const INSERT_BY_ID_STMT = 'INSERT INTO `*PREFIX*properties`'
			. ' (`fileid`,`propertyname`,`propertyvalue`) VALUES(?,?,?)';
	const UPDATE_BY_ID_AND_NAME_STMT = 'UPDATE `*PREFIX*properties`'
			. ' SET `propertyvalue` = ? WHERE `fileid` = ? AND `propertyname` = ?';
	const DELETE_BY_ID_STMT = 'DELETE FROM `*PREFIX*properties` WHERE `fileid` = ?';
	const DELETE_BY_ID_AND_NAME_STMT = 'DELETE FROM `*PREFIX*properties`'
			. ' WHERE `fileid` = ? AND `propertyname` = ?';

	const SELECT_BY_PATH_STMT = 'SELECT * FROM `*PREFIX*dav_properties` WHERE `propertypath` = ?';
	const INSERT_BY_PATH_STMT = 'INSERT INTO `*PREFIX*dav_properties`'
			. ' (`propertypath`, `propertyname`, `propertyvalue`) VALUES(?,?,?)';
	const UPDATE_BY_PATH_STMT = 'UPDATE `*PREFIX*dav_properties`'
			. ' SET `propertypath` = ? WHERE `propertypath` = ?';
	const UPDATE_BY_PATH_AND_NAME_STMT = 'UPDATE `*PREFIX*dav_properties` '
			. 'SET `propertyvalue` = ? WHERE `propertypath` = ? AND `propertyname` = ?';
	const DELETE_BY_PATH_STMT = 'DELETE FROM `*PREFIX*dav_properties` WHERE `propertypath` = ?';
	const DELETE_BY_PATH_AND_NAME_STMT = 'DELETE FROM `*PREFIX*dav_properties`'
			. ' WHERE `propertypath` = ? AND `propertyname` = ?';

	/**
	 * Ignored properties
	 *
	 * @var array
	 */
	private $ignoredProperties = [
		'{DAV:}getcontentlength',
		'{DAV:}getcontenttype',
		'{DAV:}getetag',
		'{DAV:}quota-used-bytes',
		'{DAV:}quota-available-bytes',
		'{http://owncloud.org/ns}permissions',
		'{http://owncloud.org/ns}downloadURL',
		'{http://owncloud.org/ns}dDC',
		'{http://owncloud.org/ns}size',
	];

	/**
	 * @var Tree
	 */
	private $tree;

	/**
	 * @var IDBConnection
	 */
	private $connection;

	/**
	 * @var string
	 */
	private $user;

	/**
	 * Property cache for the filesystem items
	 *
	 * @var array
	 */
	private $cacheByFileId = [];

	/**
	 * Property cache for the non-filesystem items
	 *
	 * @var array
	 */
	private $cacheByPath = [];

	/**
	 * @param Tree $tree node tree
	 * @param IDBConnection $connection database connection
	 * @param IUser $user owner of the tree and properties
	 */
	public function __construct(
		Tree $tree,
		IDBConnection $connection,
		IUser $user) {
		$this->tree = $tree;
		$this->connection = $connection;
		$this->user = $user->getUID();
	}

	/**
	 * Fetches properties for a path.
	 *
	 * @param string $path
	 * @param PropFind $propFind
	 * @return void
	 */
	public function propFind($path, PropFind $propFind) {
		$node = $this->getNodeForPath($path);
		if (is_null($node)) {
			return;
		}

		$requestedProps = $propFind->get404Properties();

		// these might appear
		$requestedProps = array_diff(
			$requestedProps,
			$this->ignoredProperties
		);

		if (empty($requestedProps)) {
			return;
		}

		if ($node instanceof Directory
			&& $propFind->getDepth() !== 0
		) {
			// note: pre-fetching only supported for depth <= 1
			$this->loadChildrenProperties($node, $requestedProps);
		}

		$props = $this->getProperties($path, $node, $requestedProps);
		foreach ($props as $propName => $propValue) {
			$propFind->set($propName, $propValue);
		}
	}

	/**
	 * Updates properties for a path
	 *
	 * @param string $path
	 * @param PropPatch $propPatch
	 *
	 * @return void
	 */
	public function propPatch($path, PropPatch $propPatch) {
		$node = $this->getNodeForPath($path);
		if (is_null($node)) {
			return;
		}

		$propPatch->handleRemaining(function($changedProps) use ($path, $node) {
			return $this->updateProperties($path, $node, $changedProps);
		});
	}

	/**
	 * This method is called after a node is deleted.
	 *
	 * @param string $path path of node for which to delete properties
	 */
	public function delete($path) {
		$node = $this->getNodeForPath($path);
		if (is_null($node)) {
			return;
		}

		if ($node instanceof Node) {
			$fileId = $node->getId();
			$statement = $this->connection->prepare(self::DELETE_BY_ID_STMT);
			$statement->execute([$fileId]);
			unset($this->cacheByFileId[$fileId]);
		} else {
			$statement = $this->connection->prepare(self::DELETE_BY_PATH_STMT);
			$statement->execute([$path]);
			unset($this->cacheByPath[$path]);
		}

		$statement->closeCursor();
	}

	/**
	 * This method is called after a successful MOVE
	 *
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 */
	public function move($source, $destination) {
		$node = $this->getNodeForPath($source);
		if (is_null($node)) {
			return;
		}

		if ($node instanceof Node) {
			// Do nothing
		} else {
			$statement = $this->connection->prepare(self::UPDATE_BY_PATH_STMT);
			$statement->execute([$destination, $source]);
			$statement->closeCursor();
		}
	}

	/**
	 * Returns a list of properties for these nodes
	 *
	 * @param string $path path
	 * @param INode $node
	 * @param array $requestedProperties requested properties or empty array for "all"
	 * @return array
	 * @note The properties list is a list of propertynames the client
	 * requested, encoded as xmlnamespace#tagName, for example:
	 * http://www.example.org/namespace#author If the array is empty, all
	 * properties should be returned
	 */
	private function getProperties($path, INode $node, array $requestedProperties) {
		if ($node instanceof Node) {
			$fileId = $node->getId();
			return $this->getPropertiesById($fileId, $requestedProperties);
		} else {
			return $this->getPropertiesByPath($path, $requestedProperties);
		}
	}

	/**
	 * Returns a list of properties for nodes;
	 * @param int $fileId
	 * @param array $requestedProperties requested properties or empty array for "all"
	 * @return array
	 * @note The properties list is a list of propertynames the client
	 * requested, encoded as xmlnamespace#tagName, for example:
	 * http://www.example.org/namespace#author If the array is empty, all
	 * properties should be returned
	 */
	private function getPropertiesById($fileId, array $requestedProperties) {
		if (!isset($this->cacheByFileId[$fileId])) {
			// TODO: chunking if more than 1000 properties
			$sql = self::SELECT_BY_ID_STMT;
			$whereValues = [$fileId];
			$whereTypes = [null];

			if (!empty($requestedProperties)) {
				// request only a subset
				$sql .= ' AND `propertyname` in (?)';
				$whereValues[] = $requestedProperties;
				$whereTypes[] = Connection::PARAM_STR_ARRAY;
			}

			$props = $this->fetchProperties($sql, $whereValues, $whereTypes);
			$this->cacheByFileId[$fileId] = $props;
		}
		return $this->cacheByFileId[$fileId];
	}

	/**
	 * Returns a list of properties for nodes
	 * @param string $path
	 * @param array $requestedProperties requested properties or empty array for "all"
	 * @return array
	 * @note The properties list is a list of propertynames the client
	 * requested, encoded as xmlnamespace#tagName, for example:
	 * http://www.example.org/namespace#author If the array is empty, all
	 * properties should be returned
	 */
	private function getPropertiesByPath($path, array $requestedProperties) {
		if (!isset($this->cacheByPath[$path])) {
			// TODO: chunking if more than 1000 properties
			$sql = self::SELECT_BY_PATH_STMT;

			$whereValues = [$path];
			$whereTypes = [null];

			if (!empty($requestedProperties)) {
				// request only a subset
				$sql .= ' AND `propertyname` in (?)';
				$whereValues[] = $requestedProperties;
				$whereTypes[] = Connection::PARAM_STR_ARRAY;
			}

			$props = $this->fetchProperties($sql, $whereValues, $whereTypes);
			$this->cacheByPath[$path] = $props;
		}
		return $this->cacheByPath[$path];
	}

	/**
	 * @param string $sql
	 * @param array $whereValues
	 * @param array $whereTypes
	 * @return array
	 */
	private function fetchProperties($sql, $whereValues, $whereTypes) {
		$result = $this->connection->executeQuery(
			$sql,
			$whereValues,
			$whereTypes
		);

		$props = [];
		while ($row = $result->fetch()) {
			$props[$row['propertyname']] = $row['propertyvalue'];
		}

		$result->closeCursor();
		return $props;
	}

	/**
	 * Update properties
	 *
	 * @param string $path
	 * @param INode $node node for which to update properties
	 * @param array $changedProperties array of properties to update
	 * @return bool
	 */
	private function updateProperties($path, INode $node, $changedProperties) {
		$existingProperties = $this->getProperties($path, $node, []);
		if ($node instanceof Node) {
			$fileId = $node->getId();
			return $this->updatePropertiesByFileId($fileId, $changedProperties, $existingProperties);
		} else {
			return $this->updatePropertiesByPath($path, $changedProperties, $existingProperties);
		}
	}

	/**
	 * @param int $fileId
	 * @param array $changedProperties
	 * @param array $existingProperties
	 * @return bool
	 */
	private function updatePropertiesByFileId($fileId, $changedProperties, $existingProperties) {
		$deleteStatement = self::DELETE_BY_ID_AND_NAME_STMT;
		$insertStatement = self::INSERT_BY_ID_STMT;
		$updateStatement = self::UPDATE_BY_ID_AND_NAME_STMT;

		// TODO: use "insert or update" strategy ?
		$this->connection->beginTransaction();
		foreach ($changedProperties as $propertyName => $propertyValue) {
			$propertyExists = array_key_exists($propertyName, $existingProperties);
			// If it was null, we need to delete the property
			if (is_null($propertyValue)) {
				if ($propertyExists) {
					$this->connection->executeUpdate($deleteStatement,
						[
							$fileId,
							$propertyName
						]
					);
				}
			} else {
				if (!$propertyExists) {
					$this->connection->executeUpdate($insertStatement,
						[
							$fileId,
							$propertyName,
							$propertyValue
						]
					);
				} else {
					$this->connection->executeUpdate($updateStatement,
						[
							$propertyValue,
							$fileId,
							$propertyName
						]
					);
				}
			}
		}

		$this->connection->commit();
		unset($this->cacheByFileId[$fileId]);

		return true;
	}

	/**
	 * @param string $path
	 * @param array $changedProperties
	 * @param array $existingProperties
	 * @return bool
	 */
	private function updatePropertiesByPath($path, $changedProperties, $existingProperties) {
		$deleteStatement = self::DELETE_BY_PATH_AND_NAME_STMT;
		$insertStatement = self::INSERT_BY_PATH_STMT;
		$updateStatement = self::UPDATE_BY_PATH_AND_NAME_STMT;

		// TODO: use "insert or update" strategy ?
		$this->connection->beginTransaction();
		foreach ($changedProperties as $propertyName => $propertyValue) {
			$propertyExists = array_key_exists($propertyName, $existingProperties);
			// If it was null, we need to delete the property
			if (is_null($propertyValue)) {
				if ($propertyExists) {
					$this->connection->executeUpdate($deleteStatement,
						[
							$path,
							$propertyName
						]
					);
				}
			} else {
				if (!$propertyExists) {
					$this->connection->executeUpdate($insertStatement,
						[
							$path,
							$propertyName,
							$propertyValue
						]
					);
				} else {
					$this->connection->executeUpdate($updateStatement,
						[
							$propertyValue,
							$path,
							$propertyName
						]
					);
				}
			}
		}

		$this->connection->commit();
		unset($this->cacheByPath[$path]);

		return true;
	}

	/**
	 * Bulk load properties for directory children
	 *
	 * @param Directory $node
	 * @param array $requestedProperties requested properties
	 *
	 * @return void
	 */
	private function loadChildrenProperties(Directory $node, $requestedProperties) {
		$fileId = $node->getId();

		if (isset($this->cacheByFileId[$fileId])) {
			// we already loaded them at some point
			return;
		}

		$childNodes = $node->getChildren();
		$childrenIds = [];
		// pre-fill cache
		foreach ($childNodes as $childNode) {
			$childId = $childNode->getId();
			if ($childId) {
				$childrenIds[] = $childId;
				$this->cacheByFileId[$childId] = [];
			}
		}

		$sql = 'SELECT * FROM `*PREFIX*properties` WHERE `fileid` IN (?)';
		$sql .= ' AND `propertyname` in (?) ORDER BY `propertyname`';

		$result = $this->connection->executeQuery(
			$sql,
			[$childrenIds, $requestedProperties],
			[Connection::PARAM_STR_ARRAY, Connection::PARAM_STR_ARRAY]
		);

		$props = [];
		while ($row = $result->fetch()) {
			$props[$row['propertyname']] = $row['propertyvalue'];
			$this->cacheByFileId[$row['fileid']] = $props;
		}

		$result->closeCursor();
	}

	/**
	 * @param string $path
	 * @return INode|null
	 */
	private function getNodeForPath($path){
		try {
			$node = $this->tree->getNodeForPath($path);
			return $node;
		} catch (ServiceUnavailable $e) {
			// might happen for unavailable mount points, skip
		} catch (Forbidden $e) {
			// might happen for excluded mount points, skip
		} catch (NotFound $e) {
			// in some rare (buggy) cases the node might not be found,
			// we catch the exception to prevent breaking the whole list with a 404
			// (soft fail)
			\OC::$server->getLogger()->warning(
				'Could not get node for path: "{path}" : {$message}',
				[
					'app' => 'dav',
					'path' => $path,
					'message' => $e->getMessage(),
				]
			);
		}
		return null;
	}

}
