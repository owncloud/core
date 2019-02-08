<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
use Sabre\DAV\INode;

/**
 * Class MiscCustomPropertiesBackend
 *
 * Provides ability to store/retrieve custom properties
 * for card/calendar/whatever (excluding files)
 * via DAV server into oc_dav_properties DB table using propertypath as a reference to the item
 *
 * @package OCA\DAV\DAV
 */
class MiscCustomPropertiesBackend extends AbstractCustomPropertiesBackend {
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
	 * This method is called after a node is deleted.
	 *
	 * @param string $path path of node for which to delete properties
	 */
	public function delete($path) {
		$node = $this->getNodeForPath($path);
		if ($node === null) {
			return;
		}

		$statement = $this->connection->prepare(self::DELETE_BY_PATH_STMT);
		$statement->execute([$path]);
		$statement->closeCursor();
		$this->offsetUnset($path);
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
		if ($node === null) {
			return;
		}

		$statement = $this->connection->prepare(self::UPDATE_BY_PATH_STMT);
		$statement->execute([$destination, $source]);
		$statement->closeCursor();
	}

	/**
	 * @inheritdoc
	 */
	protected function getProperties($path, INode $node, array $requestedProperties) {
		if ($this->offsetGet($path) === null) {
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
			$this->offsetSet($path, $props);
		}
		return $this->offsetGet($path);
	}

	/**
	 * @inheritdoc
	 */
	protected function updateProperties($path, INode $node, $changedProperties) {
		$existingProperties = $this->getProperties($path, $node, []);
		$deleteStatement = self::DELETE_BY_PATH_AND_NAME_STMT;
		$insertStatement = self::INSERT_BY_PATH_STMT;
		$updateStatement = self::UPDATE_BY_PATH_AND_NAME_STMT;

		// TODO: use "insert or update" strategy ?
		$this->connection->beginTransaction();
		foreach ($changedProperties as $propertyName => $propertyValue) {
			$propertyExists = \array_key_exists($propertyName, $existingProperties);
			// If it was null, we need to delete the property
			if ($propertyValue === null) {
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
		$this->offsetUnset($path);

		return true;
	}

	/**
	 * Bulk load properties for children
	 *
	 * @param INode $node
	 * @param array $requestedProperties requested properties
	 *
	 * @return void
	 */
	protected function loadChildrenProperties(INode $node, $requestedProperties) {
		// Not supported
	}
}
