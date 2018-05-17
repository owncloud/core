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

namespace OCA\DAV\SystemTag;

use OCP\Files\IRootFolder;
use OCP\IGroupManager;
use OCP\IUserSession;
use OCP\SystemTag\ISystemTagManager;
use OCP\SystemTag\ISystemTagObjectMapper;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\Exception\MethodNotAllowed;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\ICollection;

/**
 * Collection containing object ids by object type
 */
class SystemTagsObjectTypeCollection implements ICollection {

	/**
	 * @var string
	 */
	private $objectType;

	/**
	 * @var ISystemTagManager
	 */
	private $tagManager;

	/**
	 * @var ISystemTagObjectMapper
	 */
	private $tagMapper;

	/**
	 * @var IGroupManager
	 */
	private $groupManager;

	/**
	 * @var IUserSession
	 */
	private $userSession;

	/**
	 * @var IRootFolder
	 **/
	protected $fileRoot;

	/**
	 * Constructor
	 *
	 * @param string $objectType object type
	 * @param ISystemTagManager $tagManager
	 * @param ISystemTagObjectMapper $tagMapper
	 * @param IUserSession $userSession
	 * @param IGroupManager $groupManager
	 * @param IRootFolder $fileRoot
	 */
	public function __construct(
		$objectType,
		ISystemTagManager $tagManager,
		ISystemTagObjectMapper $tagMapper,
		IUserSession $userSession,
		IGroupManager $groupManager,
		IRootFolder $fileRoot
	) {
		$this->tagManager = $tagManager;
		$this->tagMapper = $tagMapper;
		$this->objectType = $objectType;
		$this->userSession = $userSession;
		$this->groupManager = $groupManager;
		$this->fileRoot = $fileRoot;
	}

	/**
	 * @param string $name
	 * @param resource|string $data Initial payload
	 * @throws Forbidden
	 */
	public function createFile($name, $data = null) {
		throw new Forbidden('Permission denied to create nodes');
	}

	/**
	 * @param string $name
	 */
	public function createDirectory($name) {
		throw new Forbidden('Permission denied to create collections');
	}

	/**
	 * @param string $objectId
	 */
	public function getChild($objectId) {
		// make sure the object exists and is reachable
		if (!$this->childExists($objectId)) {
			throw new NotFound('Entity does not exist or is not available');
		}
		return new SystemTagsObjectMappingCollection(
			$objectId,
			$this->objectType,
			$this->userSession->getUser(),
			$this->tagManager,
			$this->tagMapper
		);
	}

	public function getChildren() {
		// do not list object ids
		throw new MethodNotAllowed();
	}

	/**
	 * @param string $name
	 */
	public function childExists($name) {
		// TODO: make this more abstract
		if ($this->objectType === 'files') {
			// make sure the object is reachable for the current user
			$userId = $this->userSession->getUser()->getUID();
			$nodes = $this->fileRoot->getUserFolder($userId)->getById(\intval($name));
			return !empty($nodes);
		}
		return true;
	}

	public function delete() {
		throw new Forbidden('Permission denied to delete this collection');
	}

	public function getName() {
		return $this->objectType;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		throw new Forbidden('Permission denied to rename this collection');
	}

	/**
	 * Returns the last modification time, as a unix timestamp
	 *
	 * @return int
	 */
	public function getLastModified() {
		return null;
	}
}
