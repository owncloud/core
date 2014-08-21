<?php

/**
 * ownCloud - user_ldap
 *
 * @author Arthur Schiwon
 * @copyright 2014 Arthur Schiwon <blizzz@owncloud.com>
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

// Check user and app status
\OCP\JSON::checkAdminUser();
\OCP\JSON::checkAppEnabled('user_ldap');
\OCP\JSON::callCheck();

use \OCA\user_ldap\lib\Access;
use \OCA\user_ldap\lib\LDAP;
use \OCA\UserLdap\GarbageCollector;
use \OCA\user_ldap\lib\Connection;

$db = \OC::$server->getDatabaseConnection();
// $db = \OC_DB::getConnection();
$pref = new \OC\Preferences(\OC_DB::getConnection());
$ldap = new LDAP();
$dummyConnection = new Connection($ldap, '', null);
$userManager = new OCA\user_ldap\lib\user\Manager(
	\OC::$server->getConfig(),
	new \OCA\user_ldap\lib\FilesystemHelper(),
	new \OCA\user_ldap\lib\LogWrapper(),
	\OC::$server->getAvatarManager(),
	new \OCP\Image()
);
$access = new Access($dummyConnection, $ldap, $userManager);
$gc = new GarbageCollector($pref, $db, $access);

if(!isset($_POST['action'])) {
	\OCP\JSON::error();
	exit;
}
$action = $_POST['action'];
$data = array();

if(isset($_POST['offset'])) {
	$offset = intval($_POST['offset']);
} else {
	$offset = 0;
}

switch ($action) {
	case 'get':
		$users = $gc->getDeletedUsers($offset);
		$data['count'] = count($users);
		if(count($users) === 0) {
			$data['users'] = array();
			\OCP\JSON::success(array('data' => $data));
			exit;
		} else {
			$data['users'] = array();
			foreach($users as $user) {
				$data['users'][] = $user->export();
			}
		}

		\OCP\JSON::success(array('data' => $data));
		break;

}
