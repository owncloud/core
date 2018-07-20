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

use OCP\IDBConnection;
use OCP\IUser;
use Sabre\Dav\Exception\Forbidden;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\Exception\ServiceUnavailable;
use Sabre\DAV\INode;
use Sabre\DAV\PropertyStorage\Backend\BackendInterface;
use Sabre\DAV\PropFind;
use Sabre\DAV\PropPatch;
use Sabre\DAV\Tree;

abstract class AbstractCustomPropertiesBackend implements BackendInterface {

	/**
	 * Ignored properties
	 *
	 * @var array
	 */
	protected $ignoredProperties = [
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
	protected $tree;

	/**
	 * @var IDBConnection
	 */
	protected $connection;

	/**
	 * @var string
	 */
	protected $user;

	/**
	 * Property cache for the filesystem items
	 * @var array
	 */
	protected $cache;

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
	abstract protected function getProperties($path, INode $node, array $requestedProperties);

	/**
	 * Update properties
	 *
	 * @param string $path
	 * @param INode $node node for which to update properties
	 * @param array $changedProperties array of properties to update
	 * @return bool
	 */
	abstract protected function updateProperties($path, INode $node, $changedProperties);

	/**
	 * Bulk load properties for children
	 *
	 * @param INode $node
	 * @param array $requestedProperties requested properties
	 *
	 * @return void
	 */
	abstract protected function loadChildrenProperties(INode $node, $requestedProperties);

	/**
	 * This method is called after a node is deleted.
	 *
	 * @param string $path path of node for which to delete properties
	 */
	abstract public function delete($path);

	/**
	 * @param string|int $key
	 * @return array|null
	 */
	protected function offsetGet($key) {
		if (!isset($this->cache[$key])) {
			return null;
		}
		return $this->cache[$key];
	}

	/**
	 * @param string|int $key
	 * @param array $value
	 */
	protected function offsetSet($key, $value) {
		$this->cache[$key] = $value;
	}

	/**
	 * @param string|int $key
	 */
	protected function offsetUnset($key) {
		unset($this->cache[$key]);
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
		if ($node === null) {
			return;
		}

		$requestedProps = $propFind->get404Properties();

		// these might appear
		$requestedProps = \array_diff(
			$requestedProps,
			$this->ignoredProperties
		);

		if (empty($requestedProps)) {
			return;
		}

		if ($propFind->getDepth() !== 0) {
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
		if ($node === null) {
			return;
		}

		$propPatch->handleRemaining(function ($changedProps) use ($path, $node) {
			return $this->updateProperties($path, $node, $changedProps);
		});
	}

	/**
	 * @param string $sql
	 * @param array $whereValues
	 * @param array $whereTypes
	 * @return array
	 */
	protected function fetchProperties($sql, $whereValues, $whereTypes) {
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
	 * @param string $path
	 * @return INode|null
	 */
	protected function getNodeForPath($path) {
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
				'Could not get node for path: "{path}" : {message}',
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
