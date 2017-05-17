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

namespace OCA\DAV\CalDAV;

use Sabre\DAV;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Sabre\HTTP\URLUtil;

class Plugin extends \Sabre\CalDAV\Plugin {

	function initialize(DAV\Server $server) {
		parent::initialize($server);
		$server->on('beforeMethod', [$this, 'beforeMethod'], 10);
	}

	/**
	 * @inheritdoc
	 */
	function getCalendarHomeForPrincipal($principalUrl) {

		if (strrpos($principalUrl, 'principals/users', -strlen($principalUrl)) !== false) {
			list(, $principalId) = URLUtil::splitPath($principalUrl);
			return self::CALENDAR_ROOT .'/' . $principalId;
		}

		return;
	}

	/**
	 * @inheritdoc
	 */
	function beforeMethod(RequestInterface $request, ResponseInterface $response) {
		/** @var \Sabre\DAV\Auth\Plugin $auth */
		$auth = $this->server->getPlugin('auth');
		$currentPrincipal = $auth->getCurrentPrincipal();
		return;
	}
}
