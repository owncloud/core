<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

namespace OCA\DAV\CardDAV;

use OCA\DAV\CardDAV\Xml\Groups;
use Sabre\CardDAV\IAddressBook;
use Sabre\DAV\Exception\UnsupportedMediaType;
use Sabre\DAV\ICollection;
use Sabre\DAV\INode;
use Sabre\DAV\PropFind;
use Sabre\DAV\Server;
use Sabre\DAV\StringUtil;
use Sabre\DAV\UUIDUtil;
use Sabre\HTTP\URLUtil;
use Sabre\VObject\Node;
use Sabre\VObject\ParseException;
use Sabre\VObject\Reader;

class Plugin extends \Sabre\CardDAV\Plugin {

	function initialize(Server $server) {
		$server->on('propFind', [$this, 'propFind']);
		$server->on('beforeCreateFile', [$this, 'beforeCreateFile']);

		parent::initialize($server);
	}


	/**
	 * This method is triggered before a new file is created.
	 *
	 * This plugin uses this method to ensure that Card nodes receive valid
	 * vcard data.
	 *
	 * @param string $path
	 * @param resource $data
	 * @param ICollection $parentNode
	 * @param bool $modified Should be set to true, if this event handler
	 *                       changed &$data.
	 * @return void
	 */
	function beforeCreateFile($path, &$data, ICollection $parentNode, &$modified) {
		if (!$parentNode instanceof IAddressBook)
			return;

		$this->validateVCard($data, $modified);


	}

	/**
	 * Checks if the submitted iCalendar data is in fact, valid.
	 *
	 * An exception is thrown if it's not.
	 *
	 * @param resource|string $data
	 * @param bool $modified Should be set to true, if this event handler
	 *                       changed &$data.
	 * @return void
	 */
	protected function validateVCard(&$data, &$modified) {

		// If it's a stream, we convert it to a string first.
		if (is_resource($data)) {
			$data = stream_get_contents($data);
		}

		$before = md5($data);

		// Converting the data to unicode, if needed.
		$data = StringUtil::ensureUTF8($data);

		if (md5($data) !== $before) {
			$modified = true;
		}

		try {

			// If the data starts with a [, we can reasonably assume we're dealing
			// with a jCal object.
			if (substr($data, 0, 1) === '[') {
				$vobj = Reader::readJson($data);

				// Converting $data back to iCalendar, as that's what we
				// technically support everywhere.
				$data = $vobj->serialize();
				$modified = true;
			} else {
				$vobj = Reader::read($data);
			}

		} catch (ParseException $e) {

			throw new UnsupportedMediaType('This resource only supports valid vCard or jCard data. Parse error: ' . $e->getMessage());

		}

		if ($vobj->name !== 'VCARD') {
			throw new UnsupportedMediaType('This collection can only support vcard objects.');
		}

		$options = Node::PROFILE_CARDDAV;
		$prefer = $this->server->getHTTPPrefer();
		if ($prefer['handling'] !== 'strict') {
			$options |= Node::REPAIR;
		}
		$messages = $vobj->validate($options);
		$highestLevel = 0;
		$warningMessage = null;
		// $messages contains a list of problems with the vcard, along with
		// their severity.
		foreach ($messages as $message) {
			if ($message['level'] > $highestLevel) {
				// Recording the highest reported error level.
				$highestLevel = $message['level'];
				$warningMessage = $message['message'];
			}
			switch ($message['level']) {
				case 1 :
					// Level 1 means that there was a problem, but it was repaired.
					$modified = true;
					break;
				case 2 :
					// Level 2 means a warning, but not critical
					break;
				case 3 :
					// Level 3 means a critical error
					throw new UnsupportedMediaType('Validation error in vCard: ' . $message['message']);
			}
		}
		if ($warningMessage) {
			$this->server->httpResponse->setHeader(
				'X-Sabre-Ew-Gross',
				'vCard validation warning: ' . $warningMessage
			);
			// Re-serializing object.
			$data = $vobj->serialize();
			if (!$modified && strcmp($data, $before) !== 0) {
				// This ensures that the system does not send an ETag back.
				$modified = true;
			}
		}
	}


	/**
	 * Returns the addressbook home for a given principal
	 *
	 * @param string $principal
	 * @return string
	 */
	protected function getAddressbookHomeForPrincipal($principal) {

		if (strrpos($principal, 'principals/users', -strlen($principal)) !== false) {
			list(, $principalId) = URLUtil::splitPath($principal);
			return self::ADDRESSBOOK_ROOT . '/users/' . $principalId;
		}
		if (strrpos($principal, 'principals/groups', -strlen($principal)) !== false) {
			list(, $principalId) = URLUtil::splitPath($principal);
			return self::ADDRESSBOOK_ROOT . '/groups/' . $principalId;
		}
		if (strrpos($principal, 'principals/system', -strlen($principal)) !== false) {
			list(, $principalId) = URLUtil::splitPath($principal);
			return self::ADDRESSBOOK_ROOT . '/system/' . $principalId;
		}

		throw new \LogicException('This is not supposed to happen');
	}

	/**
	 * Adds all CardDAV-specific properties
	 *
	 * @param PropFind $propFind
	 * @param INode $node
	 * @return void
	 */
	function propFind(PropFind $propFind, INode $node) {

		$ns = '{http://owncloud.org/ns}';

		if ($node instanceof AddressBook) {

			$propFind->handle($ns . 'groups', function () use ($node) {
				return new Groups($node->getContactsGroups());
			});
		}
	}
}
