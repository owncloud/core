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

namespace OCA\DAV\Files;

use Doctrine\DBAL\Connection;
use OCA\DAV\Connector\Sabre\Node;
use OCP\IDBConnection;
use OCP\IUser;
use Sabre\DAV\PropertyStorage\Backend\BackendInterface;
use Sabre\DAV\PropFind;
use Sabre\DAV\PropPatch;
use Sabre\DAV\Tree;

class CustomPropertiesBackend implements BackendInterface {

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
	 * Properties cache
	 *
	 * @var array
	 */
	private $cache = [];

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

		$requestedProps = $propFind->get404Properties();

		// these might appear
		$requestedProps = array_diff(
			$requestedProps,
			$this->ignoredProperties
		);

		if (empty($requestedProps)) {
			return;
		}

		$fileId = $this->getFileIdByPath($path);
		$props = $this->getProperties($fileId, $requestedProps);
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
		$propPatch->handleRemaining(function($changedProps) use ($path) {
			$fileId = $this->getFileIdByPath($path);
			return $this->updateProperties($fileId, $changedProps);
		});
	}

	/**
	 * This method is called after a node is deleted.
	 *
	 * @param string $path path of node for which to delete properties
	 */
	public function delete($path) {
		$fileId = $this->getFileIdByPath($path);
		$statement = $this->connection->prepare(
			'DELETE FROM `*PREFIX*properties` WHERE `file_id` = ?'
		);
		$statement->execute([$fileId]);
		$statement->closeCursor();

		unset($this->cache[$fileId]);
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
		// Do nothing
	}

	/**
	 * Returns a list of properties for this nodes.;
	 * @param int $fileId
	 * @param array $requestedProperties requested properties or empty array for "all"
	 * @return array
	 * @note The properties list is a list of propertynames the client
	 * requested, encoded as xmlnamespace#tagName, for example:
	 * http://www.example.org/namespace#author If the array is empty, all
	 * properties should be returned
	 */
	private function getProperties($fileId, array $requestedProperties) {
		if (isset($this->cache[$fileId])) {
			return $this->cache[$fileId];
		}

		// TODO: chunking if more than 1000 properties
		$sql = 'SELECT * FROM `*PREFIX*properties` WHERE `file_id` = ?';

		$whereValues = [$fileId];
		$whereTypes = [null];

		if (!empty($requestedProperties)) {
			// request only a subset
			$sql .= ' AND `propertyname` in (?)';
			$whereValues[] = $requestedProperties;
			$whereTypes[] = Connection::PARAM_STR_ARRAY;
		}

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

		$this->cache[$fileId] = $props;
		return $props;
	}

	/**
	 * Update properties
	 *
	 * @param int $fileId node for which to update properties
	 * @param array $properties array of properties to update
	 *
	 * @return bool
	 */
	private function updateProperties($fileId, $properties) {

		$deleteStatement = 'DELETE FROM `*PREFIX*properties`' .
			' WHERE `file_id` = ? AND `propertyname` = ?';

		$insertStatement = 'INSERT INTO `*PREFIX*properties`' .
			' (`file_id`,`propertyname`,`propertyvalue`) VALUES(?,?,?)';

		$updateStatement = 'UPDATE `*PREFIX*properties` SET `propertyvalue` = ?' .
			' WHERE `file_id` = ? AND `propertyname` = ?';

		// TODO: use "insert or update" strategy ?
		$existing = $this->getProperties($fileId, []);
		$this->connection->beginTransaction();
		foreach ($properties as $propertyName => $propertyValue) {
			// If it was null, we need to delete the property
			if (is_null($propertyValue)) {
				if (array_key_exists($propertyName, $existing)) {
					$this->connection->executeUpdate($deleteStatement,
						[
							$fileId,
							$propertyName
						]
					);
				}
			} else {
				if (!array_key_exists($propertyName, $existing)) {
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
		unset($this->cache[$fileId]);

		return true;
	}

	/**
	 * @param string $filePath
	 * @return int
	 */
	private function getFileIdByPath($filePath){
		if (!$this->tree->nodeExists($filePath)) {
			return;
		}
		$node = $this->tree->getNodeForPath($filePath);
		if ($node instanceof Node) {
			$fileId = $node->getFileId();
			if (!is_null($fileId)) {
				return $fileId;
			}
		}
	}

}
