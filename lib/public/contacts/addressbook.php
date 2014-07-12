<?php
/**
 * ownCloud - Addressbook
 *
 * @author Thomas Tanghus
 * @copyright 2013-2014 Thomas Tanghus (thomas@tanghus.net)
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCP\Contacts;

use OCP\AppFramework\Http;

/**
 * This class manages our addressbooks.
 */

class Addressbook extends AbstractPIMCollection {

	/**
	 * @brief language object
	 *
	 * @var OC_L10N
	 */
	public static $l10n;

	protected $_count;

	/**
	 * @var Backend\AbstractBackend
	 */
	protected $backend;

	/**
	 * An array containing the mandatory:
	 * 	'displayname'
	 * 	'discription'
	 * 	'permissions'
	 *
	 * And the optional:
	 * 	'Etag'
	 * 	'lastModified'
	 *
	 * @var array
	 */
	protected $addressBookInfo;

	/**
	 * @param AbstractBackend $backend The storage backend
	 * @param array $addressBookInfo
	 * @throws \Exception
	 */
	public function __construct(Backend\AbstractBackend $backend, array $addressBookInfo) {
		self::$l10n = \OCP\Util::getL10N('contacts');
		$this->backend = $backend;
		$this->addressBookInfo = $addressBookInfo;

		if (is_null($this->getId())) {
			$id = $this->backend->createAddressBook($addressBookInfo);
			if ($id === false) {
				throw new \Exception('Error creating address book.', Http::STATUS_INTERNAL_SERVER_ERROR);
			}

			$this->addressBookInfo = $this->backend->getAddressBook($id);
		}

		//\OCP\Util::writeLog('contacts', __METHOD__.' backend: ' . print_r($this->backend, true), \OCP\Util::DEBUG);
	}

	/**
	 * @return AbstractBackend
	 */
	public function getBackend() {
		return $this->backend;
	}

	/**
	 * @return string|null
	 */
	public function getId() {
		return isset($this->addressBookInfo['id'])
			? $this->addressBookInfo['id']
			: null;
	}

	/**
	 * @return array
	 */
	public function getMetaData() {
		$metadata = $this->addressBookInfo;
		$metadata['lastmodified'] = $this->lastModified();
		$metadata['active'] = $this->isActive();
		$metadata['backend'] = $this->getBackend()->name;
		$metadata['owner'] = $this->getOwner();
		return $metadata;
	}

	/**
	 * @return string
	 */
	public function getDisplayName() {
		return $this->addressBookInfo['displayname'];
	}

	/**
	 * @return string
	 */
	public function getURI() {
		return $this->addressBookInfo['uri'];
	}

	/**
	 * @return string
	 */
	public function getOwner() {
		return isset($this->addressBookInfo['owner'])
			? $this->addressBookInfo['owner']
			: \OCP\User::getUser();
	}

	/**
	 * Returns the lowest permission of what the backend allows and what it supports.
	 * @return int
	 */
	public function getPermissions() {
		return $this->addressBookInfo['permissions'];
	}

	/**
	 * @brief Query whether an address book is active
	 * @return boolean
	 */
	public function isActive() {
		return $this->backend->isActive($this->getId());
	}

	/**
	 * @brief Activate an address book
	 * @param bool active
	 * @return void
	 */
	public function setActive($active) {
		$this->backend->setActive($active, $this->getId());
	}

	/**
	 * Returns a specific child node, referenced by its id
	 *
	 * @param string $id
	 * @return Contact|null
	 * @throws \Exception On not found
	 */
	public function getChild($id) {
		//\OCP\Util::writeLog('contacts', __METHOD__.' id: '.$id, \OCP\Util::DEBUG);
		if (!$this->hasPermission(\OCP\PERMISSION_READ)) {
			throw new \Exception(
				self::$l10n->t('You do not have permissions to see this contact'),
				Http::STATUS_FORBIDDEN
			);
		}

		if (!isset($this->objects[(string)$id])) {
			$contact = $this->backend->getContact($this->getId(), $id);
			if ($contact) {
				$this->objects[(string)$id] = new Contact($this, $this->backend, $contact);
			} else {
				throw new \Exception(
					self::$l10n->t('Contact not found'),
					Http::STATUS_NOT_FOUND
				);
			}
		}

		// When requesting a single contact we preparse it
		if (isset($this->objects[(string)$id])) {
			$this->objects[(string)$id]->retrieve();
			return $this->objects[(string)$id];
		}
	}

	/**
	 * Checks if a child-node with the specified id exists
	 *
	 * @param string $id
	 * @return bool
	 */
	public function childExists($id) {
		if(isset($this->objects[$id])) {
			return true;
		}
		return ($this->getChild($id) !== null);
	}

	/**
	 * Returns an array with all the child nodes
	 *
	 * @param int $limit
	 * @param int $offset
	 * @param bool $omitdata
	 * @return Contact[]
	 */
	public function getChildren($limit = null, $offset = null, $omitdata = false) {
		if (!$this->hasPermission(\OCP\PERMISSION_READ)) {
			throw new \Exception(
				self::$l10n->t('You do not have permissions to see these contacts'),
				Http::STATUS_FORBIDDEN
			);
		}

		$contacts = array();

		$options = array('limit' => $limit, 'offset' => $offset, 'omitdata' => $omitdata);
		foreach ($this->backend->getContacts($this->getId(), $options) as $contact) {
			//\OCP\Util::writeLog('contacts', __METHOD__.' id: '.$contact['id'], \OCP\Util::DEBUG);
			if (!isset($this->objects[$contact['id']])) {
				$this->objects[$contact['id']] = new Contact($this, $this->backend, $contact);
			}

			$contacts[] = $this->objects[$contact['id']];
		}

		//\OCP\Util::writeLog('contacts', __METHOD__.' children: '.count($contacts), \OCP\Util::DEBUG);
		return $contacts;
	}

	/**
	 * Add a contact to the address book
	 * This takes an array or a VCard|Contact and return
	 * the ID or false.
	 *
	 * @param array|VObject\VCard $data
	 * @return int|bool
	 * @throws \Exception on missing permissions
	 */
	public function addChild($data = null) {
		if (!$this->hasPermission(\OCP\PERMISSION_CREATE)) {
			throw new \Exception(
				self::$l10n->t('You do not have permissions add contacts to the address book'),
				Http::STATUS_FORBIDDEN
			);
		}

		if (!$this->getBackend()->hasContactMethodFor(\OCP\PERMISSION_CREATE)) {
			throw new \Exception(
				self::$l10n->t('The backend for this address book does not support adding contacts'),
				Http::STATUS_NOT_IMPLEMENTED
			);
		}

		$contact = new Contact($this, $this->backend, $data);

		if (is_null($data)) {
			// A new Contact, don't try to load from backend
			$contact->setRetrieved(true);
		}

		if ($contact->save() === false) {
			return false;
		}

		$id = $contact->getId();

		// If this method is called directly the index isn't set.
		if (!isset($this->objects[$id])) {
			$this->objects[$id] = $contact;
		}

		/* If count() hasn't been called yet don't _count hasn't been initialized
		 * so incrementing it would give a misleading value.
		 */
		if (isset($this->_count)) {
			$this->_count += 1;
		}

		//\OCP\Util::writeLog('contacts', __METHOD__.' id: ' . $id, \OCP\Util::DEBUG);
		return $id;
	}

	/**
	 * Delete a contact from the address book
	 *
	 * @param string $id
	 * @param array $options
	 * @return bool
	 * @throws \Exception on missing permissions
	 */
	public function deleteChild($id, $options = array()) {
		if (!$this->hasPermission(\OCP\PERMISSION_DELETE)) {
			throw new \Exception(
				self::$l10n->t('You do not have permissions to delete this contact'),
				Http::STATUS_FORBIDDEN
			);
		}

		if (!$this->getBackend()->hasContactMethodFor(\OCP\PERMISSION_DELETE)) {
			throw new \Exception(
				self::$l10n->t('The backend for this address book does not support deleting contacts'),
				Http::STATUS_NOT_IMPLEMENTED
			);
		}

		if ($this->backend->deleteContact($this->getId(), $id, $options)) {
			if (isset($this->objects[$id])) {
				unset($this->objects[$id]);
			}

			/* If count() hasn't been called yet don't _count hasn't been initialized
			* so decrementing it would give a misleading value.
			*/
			if (isset($this->_count)) {
				$this->_count -= 1;
			}

			return true;
		}

		return false;
	}

	/**
	 * Delete a list of contacts from the address book
	 *
	 * @param array $ids
	 * @return array containing the status
	 * @throws \Exception on missing permissions
	 */
	public function deleteChildren($ids) {
		if (!$this->hasPermission(\OCP\PERMISSION_DELETE)) {
			throw new \Exception(
				self::$l10n->t('You do not have permissions to delete this contact'),
				Http::STATUS_FORBIDDEN
			);
		}

		if (!$this->getBackend()->hasContactMethodFor(\OCP\PERMISSION_DELETE)) {
			throw new \Exception(
				self::$l10n->t('The backend for this address book does not support deleting contacts'),
				Http::STATUS_NOT_IMPLEMENTED
			);
		}

		$response = array();

		\OCP\Util::emitHook('OCA\Contacts', 'pre_deleteContact',
			array('id' => $ids)
		);

		foreach ($ids as $id) {
			try {
				if (!$this->deleteChild($id, array('isBatch' => true))) {
					\OCP\Util::writeLog(
						'contacts', __METHOD__.' Error deleting contact: '
						. $this->getBackend()->name . '::'
						. $this->getId() . '::' . $id,
						\OCP\Util::ERROR
					);
					$response[] = array(
						'id' => (string)$id,
						'status' => 'error',
						'message' => self::$l10n->t('Unknown error')
					);
				} else {
					$response[] = array(
						'id' => (string)$id,
						'status' => 'success'
					);
				}
			} catch(\Exception $e) {
				$response[] = array(
					'id' => (string)$id,
					'status' => 'error',
					'message' => $e->getMessage()
				);
			}
		}
		return $response;
	}

	/**
	 * @internal implements Countable
	 * @return int|null
	 */
	public function count() {
		if (!isset($this->_count)) {
			$this->_count = $this->backend->numContacts($this->getId());
		}

		return $this->_count;
	}

	/**
	 * Update and save the address book data to backend
	 * NOTE: @see IPIMObject::update for consistency considerations.
	 *
	 * @param array $data
	 * @return bool
	 */
	public function update(array $data) {
		if (!$this->hasPermission(\OCP\PERMISSION_UPDATE)) {
			throw new \Exception(
				self::$l10n->t('Access denied'),
				STATUS_FORBIDDEN
			);
		}

		if (!$this->getBackend()->hasContactMethodFor(\OCP\PERMISSION_UPDATE)) {
			throw new \Exception(
				self::$l10n->t('The backend for this address book does not support updating'),
				Http::STATUS_NOT_IMPLEMENTED
			);
		}

		if (count($data) === 0) {
			return false;
		}

		foreach ($data as $key => $value) {
			switch ($key) {
				case 'displayname':
					$this->addressBookInfo['displayname'] = $value;
					break;
				case 'description':
					$this->addressBookInfo['description'] = $value;
					break;
			}
		}

		return $this->backend->updateAddressBook($this->getId(), $data);
	}

	/**
	 * Delete the address book from backend
	 *
	 * @return bool
	 */
	public function delete() {
		if (!$this->hasPermission(\OCP\PERMISSION_DELETE)) {
			throw new Exception(
				self::$l10n->t('You don\'t have permissions to delete the address book.'),
				Http::STATUS_FORBIDDEN
			);
		}

		return $this->backend->deleteAddressBook($this->getId());
	}

	/**
	 * @brief Get the last modification time for the object.
	 *
	 * Must return a UNIX time stamp or null if the backend
	 * doesn't support it.
	 *
	 * @return int | null
	 */
	public function lastModified() {
		return $this->backend->lastModifiedAddressBook($this->getId());
	}

	/**
	 * Get an array of birthday events for contacts in this address book.
	 *
	 * @return \Sabre\VObject\Component\VEvent[]
	 */
	public function getBirthdayEvents() {

		$events = array();

		foreach ($this->getChildren() as $contact) {
			if ($event = $contact->getBirthdayEvent()) {
				$events[] = $event;
			}
		}

		return $events;
	}

	/**
	 * Returns the searchProvider for a specific backend.
	 *
	 * @return \OCP\IAddressBook
	 */
	public function getSearchProvider() {
		return $this->backend->getSearchProvider($this);
	}
}
