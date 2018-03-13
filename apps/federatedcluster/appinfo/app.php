<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH.
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

$userBackend  = new OCA\FederatedCluster\Backend();
OC_User::useBackend($userBackend);

$handler = new OCA\FederatedCluster\SharingHandler();
\OCP\Util::connectHook('OCP\Share', 'pre_shared', $handler, 'assureUniqueToken');

\OCP\Util::connectHook('OCP\Share', 'shareByTokenNotFound', $handler, 'getShareByToken');

//tie requests to this instance
$cookiename = \OC::$server->getConfig()->getSystemValue('cluster.cookie');
$node = \OC::$server->getConfig()->getSystemValue('node.name');
if (!isset($_COOKIE[$cookiename]) || $_COOKIE[$cookiename] !== $node) {
	setcookie($cookiename, $node, 0, '/', null, true, true);
}