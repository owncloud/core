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

namespace OCA\DAV\CalDAV;

use Sabre\DAV;
use Sabre\DAV\Xml\Property\ShareAccess;
use Sabre\HTTP\URLUtil;

class Plugin extends \Sabre\CalDAV\Plugin {
	public function initialize(DAV\Server $server) {
		parent::initialize($server);
	}

	public function propFind(DAV\PropFind $propFind, DAV\INode $node) {
		parent::propFind($propFind, $node);

		if ($node instanceof Calendar && $node->getName() === BirthdayService::BIRTHDAY_CALENDAR_URI) {
			$propFind->handle('{DAV:}share-access', function () use ($node) {
				return new ShareAccess(DAV\Sharing\Plugin::ACCESS_NOACCESS);
			});
		}
	}

	/**
	 * @inheritdoc
	 */
	public function getCalendarHomeForPrincipal($principalUrl) {
		if (\strrpos($principalUrl, 'principals/users', -\strlen($principalUrl)) !== false) {
			list(, $principalId) = URLUtil::splitPath($principalUrl);
			return self::CALENDAR_ROOT .'/' . $principalId;
		}

		return;
	}
}
