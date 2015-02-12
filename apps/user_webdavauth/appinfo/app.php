<?php
/**
 * @author Felix Moeller <mail@felixmoeller.de>
 * @author Frank Karlitschek <frank@owncloud.org>
 * @author j-ed <juergen@eisfair.org>
 * @author Lukas Reschke <lukas@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace OCA\user_webdavauth\AppInfo;

use OCA\user_webdavauth\USER_WEBDAVAUTH;
use OCP\Util;


$userBackend  = new USER_WEBDAVAUTH(
	\OC::$server->getConfig(),
	\OC::$server->getDb(),
	\OC::$server->getHTTPHelper(),
	\OC::$server->getLogger(),
	\OC::$server->getUserManager(),
	\OC::$SERVERROOT
);
\OC_User::useBackend($userBackend);

Util::addTranslations('user_webdavauth');
\OC_APP::registerAdmin('user_webdavauth', 'settings');
