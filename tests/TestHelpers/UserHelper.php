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

use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

/**
 * Helper to administrate users (and groups) through the provisioning API
 *
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class UserHelper {
	/**
	 *
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $key
	 * @param string $value
	 * @param string $adminUser
	 * @param string $adminPassword
	 * @param string $xRequestId
	 * @param int $ocsApiVersion
	 *
	 * @return ResponseInterface
	 */
	public static function editUser(
		$baseUrl,
		$user,
		$key,
		$value,
		$adminUser,
		$adminPassword,
		$xRequestId  = '',
		$ocsApiVersion = 2
	) {
		return OcsApiHelper::sendRequest(
			$baseUrl,
			$adminUser,
			$adminPassword,
			"PUT",
			"/cloud/users/" . $user,
			$xRequestId,
			["key" => $key, "value" => $value],
			$ocsApiVersion
		);
	}

	/**
	 * Send batch requests to edit the user.
	 * This will send multiple requests in parallel to the server which will be faster in comparison to waiting for each request to complete.
	 *
	 * @param string $baseUrl
	 * @param array $editData ['user' => '', 'key' => '', 'value' => '']
	 * @param string $adminUser
	 * @param string $adminPassword
	 * @param string $xRequestId
	 * @param int $ocsApiVersion
	 *
	 * @return array
	 */
	public static function editUserBatch(
		$baseUrl,
		$editData,
		$adminUser,
		$adminPassword,
		$xRequestId = '',
		$ocsApiVersion = 2
	) {
		$requests = [];
		$client = HttpRequestHelper::createClient(
			$adminUser,
			$adminPassword
		);

		foreach ($editData as $data) {
			$path = "/cloud/users/" . $data['user'];
			$body = ["key" => $data['key'], 'value' => $data["value"]];
			// Create the OCS API requests and push them to an array.
			\array_push(
				$requests,
				OcsApiHelper::createOcsRequest(
					$baseUrl,
					'PUT',
					$path,
					$xRequestId,
					$body
				)
			);
		}
		// Send the array of requests at once in parallel.
		$results =  HttpRequestHelper::sendBatchRequest($requests, $client);

		foreach ($results as $e) {
			if ($e instanceof ClientException) {
				$httpStatusCode = $e->getResponse()->getStatusCode();
				$reasonPhrase = $e->getResponse()->getReasonPhrase();
				throw new \Exception(
					"Unexpected failure when editing a user: HTTP status $httpStatusCode HTTP reason $reasonPhrase"
				);
			}
		}
		return $results;
	}

	/**
	 *
	 * @param string $baseUrl
	 * @param string $userName
	 * @param string $adminUser
	 * @param string $adminPassword
	 * @param string $xRequestId
	 * @param int $ocsApiVersion
	 *
	 * @return ResponseInterface
	 */
	public static function getUser(
		$baseUrl,
		$userName,
		$adminUser,
		$adminPassword,
		$xRequestId = '',
		$ocsApiVersion = 2
	) {
		return OcsApiHelper::sendRequest(
			$baseUrl,
			$adminUser,
			$adminPassword,
			"GET",
			"/cloud/users/" . $userName,
			$xRequestId,
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
	 * @param string $xRequestId
	 * @param int $ocsApiVersion
	 *
	 * @return ResponseInterface
	 */
	public static function deleteUser(
		$baseUrl,
		$userName,
		$adminUser,
		$adminPassword,
		$xRequestId = '',
		$ocsApiVersion = 2
	) {
		return OcsApiHelper::sendRequest(
			$baseUrl,
			$adminUser,
			$adminPassword,
			"DELETE",
			"/cloud/users/" . $userName,
			$xRequestId,
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
	 * @param string $xRequestId
	 *
	 * @return ResponseInterface
	 */
	public static function createGroup(
		$baseUrl,
		$group,
		$adminUser,
		$adminPassword,
		$xRequestId = ''
	) {
		return OcsApiHelper::sendRequest(
			$baseUrl,
			$adminUser,
			$adminPassword,
			"POST",
			"/cloud/groups",
			$xRequestId,
			['groupid' => $group]
		);
	}

	/**
	 *
	 * @param string $baseUrl
	 * @param string $group
	 * @param string $adminUser
	 * @param string $adminPassword
	 * @param string $xRequestId
	 * @param int $ocsApiVersion
	 *
	 * @return ResponseInterface
	 */
	public static function deleteGroup(
		$baseUrl,
		$group,
		$adminUser,
		$adminPassword,
		$xRequestId = '',
		$ocsApiVersion = 2
	) {
		$group = \rawurlencode($group);
		return OcsApiHelper::sendRequest(
			$baseUrl,
			$adminUser,
			$adminPassword,
			"DELETE",
			"/cloud/groups/" . $group,
			$xRequestId,
			[],
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
	 * @param string $xRequestId
	 * @param integer $ocsApiVersion (1|2)
	 *
	 * @return ResponseInterface
	 */
	public static function addUserToGroup(
		$baseUrl,
		$user,
		$group,
		$adminUser,
		$adminPassword,
		$xRequestId = '',
		$ocsApiVersion = 2
	) {
		return OcsApiHelper::sendRequest(
			$baseUrl,
			$adminUser,
			$adminPassword,
			"POST",
			"/cloud/users/" . $user . "/groups",
			$xRequestId,
			['groupid' => $group],
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
	 * @param string $xRequestId
	 * @param integer $ocsApiVersion (1|2)
	 *
	 * @return ResponseInterface
	 */
	public static function removeUserFromGroup(
		$baseUrl,
		$user,
		$group,
		$adminUser,
		$adminPassword,
		$xRequestId,
		$ocsApiVersion = 2
	) {
		return OcsApiHelper::sendRequest(
			$baseUrl,
			$adminUser,
			$adminPassword,
			"DELETE",
			"/cloud/users/" . $user . "/groups",
			$xRequestId,
			['groupid' => $group],
			$ocsApiVersion
		);
	}

	/**
	 *
	 * @param string $baseUrl
	 * @param string $adminUser
	 * @param string $adminPassword
	 * @param string $xRequestId
	 * @param string $search
	 *
	 * @return ResponseInterface
	 */
	public static function getGroups(
		$baseUrl,
		$adminUser,
		$adminPassword,
		$xRequestId = '',
		$search =""
	) {
		return OcsApiHelper::sendRequest(
			$baseUrl,
			$adminUser,
			$adminPassword,
			"GET",
			"/cloud/groups?search=" . $search,
			$xRequestId
		);
	}

	/**
	 *
	 * @param string $baseUrl
	 * @param string $adminUser
	 * @param string $adminPassword
	 * @param string $xRequestId
	 * @param string $search
	 *
	 * @return string[]
	 */
	public static function getGroupsAsArray(
		$baseUrl,
		$adminUser,
		$adminPassword,
		$xRequestId = '',
		$search =""
	) {
		$result = self::getGroups(
			$baseUrl,
			$adminUser,
			$adminPassword,
			$xRequestId,
			$search
		);
		$groups = HttpRequestHelper::getResponseXml($result, __METHOD__)->xpath(".//groups")[0];
		$return = [];
		foreach ($groups as $group) {
			$return[] = $group->__toString();
		}
		return $return;
	}
}
