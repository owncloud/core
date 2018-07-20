<?php
/**
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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

// no php execution timeout for webdav
\set_time_limit(0);
\ignore_user_abort(true);

// Turn off output buffering to prevent memory problems
\OC_Util::obEnd();

$serverFactory = new \OCA\DAV\Connector\Sabre\ServerFactory(
	\OC::$server->getConfig(),
	\OC::$server->getLogger(),
	\OC::$server->getDatabaseConnection(),
	\OC::$server->getUserSession(),
	\OC::$server->getMountManager(),
	\OC::$server->getTagManager(),
	\OC::$server->getRequest()
);

// Backends
$authBackend = new \OCA\DAV\Connector\Sabre\Auth(
	\OC::$server->getSession(),
	\OC::$server->getUserSession(),
	\OC::$server->getRequest(),
	\OC::$server->getTwoFactorAuthManager(),
	\OC::$server->getAccountModuleManager(),
	'principals/'
);
$requestUri = \OC::$server->getRequest()->getRequestUri();

$server = $serverFactory->createServer($baseuri, $requestUri, $authBackend, function () {
	// use the view for the logged in user
	return \OC\Files\Filesystem::getView();
});

// allow setup of additional auth backends
$event = new \OCP\SabrePluginEvent($server);
\OC::$server->getEventDispatcher()->dispatch('OCA\DAV\Connector\Sabre::authInit', $event);

// And off we go!
$server->exec();
