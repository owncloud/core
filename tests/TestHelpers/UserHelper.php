<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace TestHelpers;

use GuzzleHttp\Message\ResponseInterface;

/**
 * Helper to administrate users (and groups) through the provisioning API
 *
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class UserHelper {
	
	/**
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param string $adminUser
	 * @param string $adminPassword
	 * @param string $displayName
	 * @param string $email
	 *
	 * @return ResponseInterface[]
	 *          we need multiple requests to set $displayName and $email
	 *          this array will contain the responses from all requests
	 */
	public static function createUser(
		$baseUrl, $user, $password, $adminUser, $adminPassword,
		$displayName = null, $email = null
	) {
		$body = [
			'userid' => $user,
			'password' => $password
		];
		$return = [];
		$return[] = OcsApiHelper::sendRequest(
			$baseUrl, $adminUser, $adminPassword, "POST", "/cloud/users", $body
		);
		//if we couldn't successfully create the user, no need to keep on going
		if ($return[0]->getStatusCode() !== 200) {
			return $return;
		}
		if ($displayName !== null) {
			$editResponse = self::editUser(
				$baseUrl, $user, "display", $displayName, $adminUser, $adminPassword
			);
			$return[] = $editResponse;
			if ($editResponse->getStatusCode() !== 200) {
				return $return;
			}
		}
		if ($email !== null) {
			$return[] = self::editUser(
				$baseUrl, $user, "email", $email, $adminUser, $adminPassword
			);
		}
		return $return;
	}

	/**
	 *
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $key
	 * @param string $value
	 * @param string $adminUser
	 * @param string $adminPassword
	 * @param int $ocsApiVersion
	 *
	 * @return ResponseInterface
	 */
	public static function editUser(
		$baseUrl, $user, $key, $value, $adminUser, $adminPassword, $ocsApiVersion = 2
	) {
		return OcsApiHelper::sendRequest(
			$baseUrl,
			$adminUser,
			$adminPassword,
			"PUT",
			"/cloud/users/" . $user,
			["key" => $key, "value" => $value],
			$ocsApiVersion
		);
	}

	/**
	 *
	 * @param string $baseUrl
	 * @param string $userName
	 * @param string $adminUser
	 * @param string $adminPassword
	 * @param int $ocsApiVersion
	 *
	 * @return ResponseInterface
	 */
	public static function getUser(
		$baseUrl, $userName, $adminUser, $adminPassword, $ocsApiVersion = 2
	) {
		return OcsApiHelper::sendRequest(
			$baseUrl,
			$adminUser,
			$adminPassword,
			"GET",
			"/cloud/users/" . $userName,
			[],
			$ocsApiVersion
		);
	}

	/**
	 *
	 * @param string $baseUrl
	 * @param string $userName
	 * @param string $adminUser
	 * @param string $adminPassword
	 * @param int $ocsApiVersion
	 *
	 * @return ResponseInterface
	 */
	public static function deleteUser(
		$baseUrl, $userName, $adminUser, $adminPassword, $ocsApiVersion = 2
	) {
		return OcsApiHelper::sendRequest(
			$baseUrl,
			$adminUser,
			$adminPassword,
			"DELETE",
			"/cloud/users/" . $userName,
			[],
			$ocsApiVersion
		);
	}

	/**
	 *
	 * @param string $baseUrl
	 * @param string $group
	 * @param string $adminUser
	 * @param string $adminPassword
	 *
	 * @return ResponseInterface
	 */
	public static function createGroup(
		$baseUrl, $group, $adminUser, $adminPassword
	) {
		return OcsApiHelper::sendRequest(
			$baseUrl, $adminUser, $adminPassword,
			"POST", "/cloud/groups", ['groupid' => $group]
		);
	}

	/**
	 *
	 * @param string $baseUrl
	 * @param string $group
	 * @param string $adminUser
	 * @param string $adminPassword
	 * @param int $ocsApiVersion
	 *
	 * @return ResponseInterface
	 */
	public static function deleteGroup(
		$baseUrl, $group, $adminUser, $adminPassword, $ocsApiVersion = 2
	) {
		$group = \strtr($group, ['%' => '%25', '/' => '%2F']);
		$group = \rawurlencode($group);
		return OcsApiHelper::sendRequest(
			$baseUrl, $adminUser, $adminPassword,
			"DELETE", "/cloud/groups/" . $group, [], $ocsApiVersion
		);
	}

	/**
	 *
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $group
	 * @param string $adminUser
	 * @param string $adminPassword
	 * @param integer $ocsApiVersion (1|2)
	 *
	 * @return ResponseInterface
	 */
	public static function addUserToGroup(
		$baseUrl, $user, $group, $adminUser, $adminPassword, $ocsApiVersion = 2
	) {
		return OcsApiHelper::sendRequest(
			$baseUrl, $adminUser, $adminPassword, "POST",
			"/cloud/users/" . $user . "/groups", ['groupid' => $group],
			$ocsApiVersion
		);
	}

	/**
	 *
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $group
	 * @param string $adminUser
	 * @param string $adminPassword
	 * @param integer $ocsApiVersion (1|2)
	 *
	 * @return ResponseInterface
	 */
	public static function removeUserFromGroup(
		$baseUrl, $user, $group, $adminUser, $adminPassword, $ocsApiVersion = 2
	) {
		return OcsApiHelper::sendRequest(
			$baseUrl, $adminUser, $adminPassword, "DELETE",
			"/cloud/users/" . $user . "/groups", ['groupid' => $group],
			$ocsApiVersion
		);
	}

	/**
	 *
	 * @param string $baseUrl
	 * @param string $adminUser
	 * @param string $adminPassword
	 * @param string $search
	 *
	 * @return ResponseInterface
	 */
	public static function getGroups(
		$baseUrl, $adminUser, $adminPassword, $search =""
	) {
		return OcsApiHelper::sendRequest(
			$baseUrl, $adminUser, $adminPassword, "GET",
			"/cloud/groups?search=" . $search
		);
	}

	/**
	 *
	 * @param string $baseUrl
	 * @param string $adminUser
	 * @param string $adminPassword
	 * @param string $search
	 *
	 * @return string[]
	 */
	public static function getGroupsAsArray(
		$baseUrl, $adminUser, $adminPassword, $search =""
	) {
		$result = self::getGroups($baseUrl, $adminUser, $adminPassword, $search);
		$groups = HttpRequestHelper::getResponseXml($result)->xpath(".//groups")[0];
		$return = [];
		foreach ($groups as $group) {
			$return[] = $group->__toString();
		}
		return $return;
	}
}
