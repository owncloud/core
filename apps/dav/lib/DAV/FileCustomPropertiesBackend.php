<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\DAV\DAV;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Platforms\OraclePlatform;
use Doctrine\DBAL\Platforms\SqlitePlatform;
use OCA\DAV\Connector\Sabre\Directory;
use OCA\DAV\Connector\Sabre\Node;
use OC\Cache\CappedMemoryCache;
use Sabre\DAV\INode;

/**
 * Class FileCustomPropertiesBackend
 *
 * Provides ability to store/retrieve custom file properties via DAV
 * into oc_properties DB table using fileId as a reference to the file
 *
 * @package OCA\DAV\DAV
 */
class FileCustomPropertiesBackend extends AbstractCustomPropertiesBackend {
	const SELECT_BY_ID_STMT = 'SELECT * FROM `*PREFIX*properties` WHERE `fileid` = ?';
	const INSERT_BY_ID_STMT = 'INSERT INTO `*PREFIX*properties`'
	. ' (`fileid`,`propertyname`,`propertyvalue`) VALUES(?,?,?)';
	const UPDATE_BY_ID_AND_NAME_STMT = 'UPDATE `*PREFIX*properties`'
	. ' SET `propertyvalue` = ? WHERE `fileid` = ? AND `propertyname` = ?';
	const DELETE_BY_ID_STMT = 'DELETE FROM `*PREFIX*properties` WHERE `fileid` = ?';
	const DELETE_BY_ID_AND_NAME_STMT = 'DELETE FROM `*PREFIX*properties`'
	. ' WHERE `fileid` = ? AND `propertyname` = ?';

	/**
	 * @var CappedMemoryCache
	 */
	protected $deletedItemsCache;

	/**
	 * @var string the source path of a move action.
	 * This is set during a move so the delete action can know if a move has been called before
	 * in order to not fetch the source node again (which would cause an error)
	 */
	private $moveSource = null;

	/**
	 * Store fileId before deletion
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function beforeDelete($path) {
		try {
			$node = $this->getNodeForPath($path);
			if ($node !== null && $node->getId()) {
				if ($this->deletedItemsCache === null) {
					$this->deletedItemsCache = new CappedMemoryCache();
				}
				$this->deletedItemsCache->set($path, $node->getId());
			}
		} catch (\Exception $e) {
			// do nothing, delete will throw the same exception anyway
		}
	}

	/**
	 * This method is called after a node is deleted.
	 *
	 * @param string $path path of node for which to delete properties
	 *
	 * @return void
	 */
	public function delete($path) {
		$moveSource = $this->moveSource;
		$this->moveSource = null;

		if ($moveSource === $path) {
			// trying to delete a file that has been moved -> ignoring because
			// the file exists in another path
			return;
		}

		if ($this->deletedItemsCache === null) {
			return;
		}

		$fileId = $this->deletedItemsCache->get($path);
		if ($fileId !== null) {
			$statement = $this->connection->prepare(self::DELETE_BY_ID_STMT);
			$statement->execute([$fileId]);
			$this->offsetUnset($fileId);
			$statement->closeCursor();
		}
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
		// Part of interface. We don't care about move because it doesn't affect fileId
		$this->moveSource = $source;
	}

	/**
	 * @inheritdoc
	 */
	protected function getProperties($path, INode $node, array $requestedProperties) {
		$fileId = $node->getId();
		if ($this->offsetGet($fileId) === null) {
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
			$this->offsetSet($fileId, $props);
		}
		return $this->offsetGet($fileId);
	}

	/**
	 * @inheritdoc
	 */
	protected function updateProperties($path, INode $node, $changedProperties) {
		$existingProperties = $this->getProperties($path, $node, []);
		$fileId = $node->getId();
		$deleteStatement = self::DELETE_BY_ID_AND_NAME_STMT;
		$insertStatement = self::INSERT_BY_ID_STMT;
		$updateStatement = self::UPDATE_BY_ID_AND_NAME_STMT;

		// TODO: use "insert or update" strategy ?
		$this->connection->beginTransaction();
		foreach ($changedProperties as $propertyName => $propertyValue) {
			$propertyExists = \array_key_exists($propertyName, $existingProperties);
			// If it was null, we need to delete the property
			if ($propertyValue === null) {
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
		$this->offsetUnset($fileId);

		return true;
	}

	/**
	 * Bulk load properties for directory children
	 *
	 * @param INode $node
	 * @param array $requestedProperties requested properties
	 *
	 * @return void
	 */
	protected function loadChildrenProperties(INode $node, $requestedProperties) {
		// note: pre-fetching only supported for depth <= 1
		if (!($node instanceof Directory)) {
			return;
		}

		$fileId = $node->getId();
		if ($this->offsetGet($fileId) !== null) {
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
				$this->offsetSet($childId, []);
			}
		}

		// TODO: use query builder
		$sql = 'SELECT * FROM `*PREFIX*properties` WHERE `fileid` IN (?)';
		$sql .= ' AND `propertyname` in (?) ORDER BY `propertyname`';

		$fileIdChunks = $this->getChunks($childrenIds, \count($requestedProperties));
		$props = [];
		foreach ($fileIdChunks as $chunk) {
			$result = $this->connection->executeQuery(
				$sql,
				[$chunk, $requestedProperties],
				[Connection::PARAM_STR_ARRAY, Connection::PARAM_STR_ARRAY]
			);
			while ($row = $result->fetch()) {
				$props[$row['propertyname']] = $row['propertyvalue'];
				$this->offsetSet($row['fileid'], $props);
			}
			$result->closeCursor();
		}
	}

	/**
	 * @param string $path
	 * @return INode|null
	 */
	protected function getNodeForPath($path) {
		$node = parent::getNodeForPath($path);
		if (!$node instanceof Node) {
			return null;
		}
		return $node;
	}

	/**
	 * Chunk items from a single dimension array into a bidimensional array
	 * that has a limit of items for the second dimension
	 * This limit equals to 999 by default
	 * and is decreased by $otherPlaceholdersCount
	 *
	 * @param int[] $toSlice
	 * @param int $otherPlaceholdersCount
	 * @return array
	 */
	private function getChunks($toSlice, $otherPlaceholdersCount = 0) {
		$databasePlatform = $this->connection->getDatabasePlatform();
		if ($databasePlatform instanceof OraclePlatform || $databasePlatform instanceof SqlitePlatform) {
			$slicer = 999 - $otherPlaceholdersCount;
			$slices = \array_chunk($toSlice, $slicer);
		} else {
			$slices = \count($toSlice) ? [ 0 => $toSlice] : [];
		}
		return $slices;
	}
}
