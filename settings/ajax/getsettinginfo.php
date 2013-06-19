<?php

/**
 * ownCloud - Core
 *
 * @author Morris Jobke
 * @copyright 2013 Morris Jobke morris.jobke@gmail.com
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

OC_JSON::checkSubAdminUser();

$userUid = OC_User::getUser();
$isAdmin = OC_User::isAdminUser($userUid);

if($isAdmin) {
	$groups = OC_Group::getGroups();
} else {
	$groups = OC_SubAdmin::getSubAdminsGroups($userUid);
}

$result = array(
	'groups' => array()
);

// convert them to the needed format
foreach( $groups as $gid ) {
	$result['groups'][] = array( 'name' => $gid );
}

OCP\JSON::success(array('data' => $result));