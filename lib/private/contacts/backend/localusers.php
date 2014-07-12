<?php
/**
 * ownCloud - ownCloud users backend for Contacts
 *
 * @author Tobia De Koninck
 * @copyright 2014 Tobia De Koninck (tobia@ledfan.be)
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

namespace OC\Contacts\Backend;

use	OC\Contacts\LocalUsersAddressbookProvider;

/**
 * Contact backend for storing all the ownCloud users in this installation.
 * Every user has *1* personal addressbook. The id of this addresbook is the
 * userid of the owner.
 */
class LocalUsers {

	public $name = 'localusers';

	/**
	 * The table that holds the contacts.
	 * @var string
	 */
	private $cardsTableName = '*PREFIX*ocu_cards';

	/**
	 * The table that holds the properties of the contacts.
	 * This is used to provice a search function.
	 * @var string
	 */
	private $indexTableName = '*PREFIX*ocu_cards_properties';

	/**
	 * All possible properties which can be stored in the $indexTableName.
	 * @var string
	 */
	private $indexProperties = array(
		'BDAY', 'UID', 'N', 'FN', 'TITLE', 'ROLE', 'NOTE', 'NICKNAME',
		'ORG', 'CATEGORIES', 'EMAIL', 'TEL', 'IMPP', 'ADR', 'URL', 'GEO'
	);

	/**
	 * language object
	 * @var OC_L10N
	 */
	public static $l10n;

	/**
	 * Defaults object
	 * @var OC_Defaults
	 */
	public static $defaults;

	public function __construct($userid) {
		self::$l10n = \OCP\Util::getL10N('contacts');
		self::$defaults = new \OCP\Defaults();
		$this->userid = $userid ? $userid : \OCP\User::getUser();
		$this->cache = \OC::$server->getCache();
		$this->tagManager = \OC::$server->getTagManager()->load('contact');

	}

	/**
	 * {@inheritdoc}
	 */
	public function getAddressBooksForUser(array $options = array()) {
		return array($this->getAddressBook('localusers'));
	}

	/**
	 * {@inheritdoc}
	 * Only 1 addressbook for every user
	 */
	public function getAddressBook($addressBookId, array $options = array()) {

//		$this->tagManager->add('LocalUsers');

		return array(
			'id' => $addressBookId,
			'displayname' => (string)self::$l10n->t('On this %s', array(self::$defaults->getName())),
			'description' => (string)self::$l10n->t('On this %s', array(self::$defaults->getName())),
			'lastmodified' => $this->lastModifiedAddressBook($addressBookId),
			'permissions' => \OCP\PERMISSION_READ,
			'backend' => $this->name
		);
	}

	/**
	 * {@inheritdoc}
	 * There are as many contacts in this addressbook as in this ownCloud installation
	 */
	public function getContacts($addressBookId, array $options = array()) {
		$users = \OCP\User::getUsers();
		$contacts = array();
		foreach($users as $userid){
			$contacts[] = $this->getContact($addressBookId, $userid);
		}
		return $contacts;
	}

	/**
	 * {@inheritdoc}
	 * If your username is "admin" and you want to retrieve your own contact
	 * the params would be: $addressbookid = 'admin'; $id = 'admin';
	 * If your username is 'foo' and you want to retrieve the contact with
	 * ownCloud username 'bar' the params would be: $addressbookid = 'foo'; $id = 'bar';
	 */
	public function getContact($addressBookId, $id, array $options = array()) {
		$contact = array();
		$contact['permissions'] = \OCP\PERMISSION_READ;
		$contact['id'] = $id;
		$contact['addressbookid'] = $addressBookId;
		$contact['displayname'] = \OCP\User::getDisplayname($userid);
		$contact['carddata'] = $this->carddata($id)->serialize();
		$contact['lastmodified'] = time();
		return $contact;
	}

	/**
	 * This is a hack so backends can have different search functions.
	 * @return \OC\Contacts\LocalUsersAddressbookProvider
	 */
	public function getSearchProvider($addressBook) {
		return new LocalUsersAddressbookProvider($addressBook);
	}

	public function lastModifiedAddressBook($addressBookId) {
		return time();
	}

	private function carddata($id){
		$vcard = \Sabre\VObject\Component::create('VCARD');
		$vcard->FN = \OCP\User::getDisplayName($user);
		$now = new \DateTime('now');
		$vcard->REV = $now->format(\DateTime::W3C);

		$appinfo = \OCP\App::getAppInfo('contacts');
		$appversion = \OCP\App::getAppVersion('contacts');
		$prodid = '-//ownCloud//NONSGML ' . $appinfo['name'] . ' ' . $appversion.'//EN';
		$vcard->PRODID = $prodid;
		$vcard->add('IMPP', 'x-owncloud-handle:' . $id, array("X-SERVICE-TYPE" => array("owncloud-handle")));

//		AVATAR
//		$photo = TemporaryPhoto::create(
//			$this->cache,
//			TemporaryPhoto::PHOTO_USER,
//			$id // ownCloud user ID
//		);
//		$photo->getKey(); // cache contact photo
//		$vcard->add('PHOTO', strval($photo->getImage()), array('ENCODING' => 'b','TYPE' => $photo->getMimeType()));
//		 END AVATAR
//
//		 LOCALUSERS GROUP
//		if(!isset($vcard->CATEGORIES)) {
//			$vcard->add('CATEGORIES');
//		}
//		$vcard->CATEGORIES->addGroup('LocalUsers');
//		$this->tagManager->tagAs($user, 'LocalUsers');
		// END LOCLAUSERS GROUP

		return $vcard;

	}

	/**
	 * ###########
	 * Everything below is copied from abstractbackend
	 * ###########
	 */

	public function isActive($addressBookId = null) {
		return true; // TODO add check if localUsers is active
	}

	/**
	 * @brief Check if backend implements action for contacts
	 * @param $actions bitwise-or'ed actions
	 * @returns boolean
	 *
	 * Returns the supported actions as int to be
	 * compared with \OCP\PERMISSION_CREATE etc.
	 */
	public function hasContactMethodFor($permission) {

		return (bool)($this->getContactPermissions() & $permission);

	}

	/**
	 * @brief Get all possible permissions for contacts based on what the backend implements.
	 * @returns bitwise-or'ed actions
	 *
	 * Returns the supported actions as an int to be
	 * compared with \OCP\PERMISSION_CREATE etc.
	 */
	protected function getContactPermissions() {
		$permissions = 0;

		foreach ($this->possibleContactPermissions as $permission => $methodName) {
			if(method_exists($this, $methodName)) {
				$permissions |= $permission;
			}

		}

//\OCP\Util::writeLog('contacts', __METHOD__.', permissions' . $permissions, \OCP\Util::DEBUG);
		return $permissions;
	}

	protected $possibleContactPermissions = array(
		\OCP\PERMISSION_CREATE => 'createContact',
		\OCP\PERMISSION_READ	=> 'getContact',
		\OCP\PERMISSION_UPDATE	=> 'updateContact',
		\OCP\PERMISSION_DELETE => 'deleteContact',
	);

	protected $possibleAddressBookPermissions = array(
		\OCP\PERMISSION_CREATE => 'createAddressBook',
		\OCP\PERMISSION_READ	=> 'getAddressBook',
		\OCP\PERMISSION_UPDATE	=> 'updateAddressBook',
		\OCP\PERMISSION_DELETE => 'deleteAddressBook',
	);



}
