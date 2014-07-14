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

namespace OC\Contacts;

use OC\Contacts\Backend\LocalUsers;

class LocalUsersAddressbookProvider implements \OCP\IAddressBook {

	/**
	 * @var LocalUsers
	 */
	private $backend;

	/**
	 * Constructor
	 * @param AddressBook $addressBook
	 */
	public function __construct(AddressBook $addressBook) {
		$this->addressBook = $addressBook;
	}

	/**
	 * @param $pattern
	 * @param $searchProperties
	 * @param $options
	 * @return array|false
	 */
	public function search($pattern, $searchProperties, $options) {
		var_dump($pattern);
		if($pattern == '') {
			// Fetch all contacts
			$localusers = $this->addressBook->getBackend();
			$contacts = $localusers->getContacts('localusers');
		} else {
			if($searchProperties === 'FN'){
				searchDisplayName
			}
		}

		var_export($contacts);

		die();
		return $contacts;
	}

	public function getKey() {
		return "localusers:localusers";
	}

	/**
	 * In comparison to getKey() this function returns a human readable (maybe translated) name
	 * @return mixed
	 */
	public function getDisplayName() {
	}

	public function createOrUpdate($properties) {
	}

	/**
	 * @return mixed
	 */
	public function getPermissions() {
	}

	/**
	 * @param object $id the unique identifier to a contact
	 * @return bool successful or not
	 */
	public function delete($id){
	}

	private function getProperty(&$results, $row) {
		if(!$row['name'] || !$row['value']) {
			return false;
		}

		$value = null;

		switch($row['name']) {
			case 'PHOTO':
				$value = 'VALUE=uri:' . \OCP\Util::linkToAbsolute('contacts', 'photo.php') . '?id=' . $row['contactid'];
				break;
			case 'N':
			case 'ORG':
			case 'ADR':
			case 'GEO':
			case 'CATEGORIES':
				$property = \Sabre\VObject\Property::create($row['name'], $row['value']);
				$value = $property->getParts();
				break;
			default:
				$value = $value = strtr($row['value'], array('\,' => ',', '\;' => ';'));
				break;
		}

		if (in_array($row['name'], array('EMAIL', 'TEL', 'IMPP', 'ADR', 'URL'))) {
			if (!isset($results[$row['contactid']])) {
				$results[$row['contactid']] = array('id' => $row['contactid'], $row['name'] => array($value));
			} elseif (!isset($results[$row['contactid']][$row['name']])) {
				$results[$row['contactid']][$row['name']] = array($value);
			} else {
				$results[$row['contactid']][$row['name']][] = $value;
			}
		} else {
			if (!isset($results[$row['contactid']])) {
				$results[$row['contactid']] = array('id' => $row['contactid'], $row['name'] => $value);
			} elseif(!isset($results[$row['contactid']][$row['name']])) {
				$results[$row['contactid']][$row['name']] = $value;
			}
		}
	}

}
