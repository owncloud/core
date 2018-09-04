<?php
/**
 * @author Thomas Citharel <tcit@tcit.fr>
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
namespace OCA\DAV;

use OCA\DAV\CalDAV\CalDavBackend;
use OCA\DAV\CalDAV\CalendarRoot;
use OCA\DAV\CalDAV\PublicCalendarRoot;
use OCA\DAV\CardDAV\AddressBookRoot;
use OCA\DAV\CardDAV\CardDavBackend;
use OCA\DAV\Connector\Sabre\Principal;
use OCA\DAV\DAV\GroupPrincipalBackend;
use OCA\DAV\DAV\SystemPrincipalBackend;
use Sabre\CalDAV\Principal\Collection;
use Sabre\DAV\SimpleCollection;

class RootCollection extends SimpleCollection {
	public function __construct() {
		$config = \OC::$server->getConfig();
		$random = \OC::$server->getSecureRandom();
		$db = \OC::$server->getDatabaseConnection();
		$dispatcher = \OC::$server->getEventDispatcher();
		$userPrincipalBackend = new Principal(
			\OC::$server->getUserManager(),
			\OC::$server->getGroupManager()
		);
		$groupPrincipalBackend = new GroupPrincipalBackend(
			\OC::$server->getGroupManager()
		);
		// as soon as debug mode is enabled we allow listing of principals
		$disableListing = !$config->getSystemValue('debug', false);

		// setup the first level of the dav tree
		$userPrincipals = new Collection($userPrincipalBackend, 'principals/users');
		$userPrincipals->disableListing = $disableListing;
		$groupPrincipals = new Collection($groupPrincipalBackend, 'principals/groups');
		$groupPrincipals->disableListing = $disableListing;
		$systemPrincipals = new Collection(new SystemPrincipalBackend(), 'principals/system');
		$systemPrincipals->disableListing = $disableListing;
		$filesCollection = new Files\RootCollection($userPrincipalBackend, 'principals/users');
		$filesCollection->disableListing = $disableListing;
		$caldavBackend = new CalDavBackend($db, $userPrincipalBackend, $groupPrincipalBackend, $random);
		$calendarRoot = new CalendarRoot($userPrincipalBackend, $caldavBackend, 'principals/users');
		$calendarRoot->disableListing = $disableListing;
		$publicCalendarRoot = new PublicCalendarRoot($caldavBackend);
		$publicCalendarRoot->disableListing = $disableListing;

		$systemTagCollection = new SystemTag\SystemTagsByIdCollection(
			\OC::$server->getSystemTagManager(),
			\OC::$server->getUserSession(),
			\OC::$server->getGroupManager()
		);
		$systemTagRelationsCollection = new SystemTag\SystemTagsRelationsCollection(
			\OC::$server->getSystemTagManager(),
			\OC::$server->getSystemTagObjectMapper(),
			\OC::$server->getUserSession(),
			\OC::$server->getGroupManager(),
			\OC::$server->getRootFolder()
		);

		$usersCardDavBackend = new CardDavBackend($db, $userPrincipalBackend, $groupPrincipalBackend, $dispatcher);
		$usersAddressBookRoot = new AddressBookRoot($userPrincipalBackend, $usersCardDavBackend, 'principals/users');
		$usersAddressBookRoot->disableListing = $disableListing;

		$systemCardDavBackend = new CardDavBackend($db, $userPrincipalBackend, $groupPrincipalBackend, $dispatcher);
		$systemAddressBookRoot = new AddressBookRoot(new SystemPrincipalBackend(), $systemCardDavBackend, 'principals/system');
		$systemAddressBookRoot->disableListing = $disableListing;

		$uploadCollection = new Upload\RootCollection($userPrincipalBackend, 'principals/users');
		$uploadCollection->disableListing = $disableListing;

		$avatarCollection = new Avatars\RootCollection($userPrincipalBackend, 'principals/users');
		$avatarCollection->disableListing = $disableListing;

		$queueCollection = new JobStatus\RootCollection($userPrincipalBackend, 'principals/users');
		$queueCollection->disableListing = $disableListing;

		$children = [
				new SimpleCollection('principals', [
						$userPrincipals,
						$groupPrincipals,
						$systemPrincipals]),
				$filesCollection,
				$calendarRoot,
				$publicCalendarRoot,
				new SimpleCollection('addressbooks', [
						$usersAddressBookRoot,
						$systemAddressBookRoot]),
				$systemTagCollection,
				$systemTagRelationsCollection,
				$uploadCollection,
				$avatarCollection,
				new \OCA\DAV\Meta\RootCollection(\OC::$server->getRootFolder()),
				$queueCollection
		];

		parent::__construct('root', $children);
	}
}
