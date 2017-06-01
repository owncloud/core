<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright 2017 Artur Neumann artur@jankaritech.com
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

use GuzzleHttp\Client as GClient;
use GuzzleHttp\Psr7\Request;

/**
 * manage Shares via OCS API
 *
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class SharingHelper {
	/**
	 *
	 * @param string $baseUrl baseURL of the ownCloud installation without /ocs.
	 * @param string $user user that creates the share.
	 * @param string $password password of the user that creates the share.
	 * @param string $path The path to the file or folder which should be shared.
	 * @param int $shareType The type of the share. This can be one of:
	 *                       0 = user, 1 = group, 3 = public link,
	 *                       6 = federated cloud share.
	 * @param string $shareWith The user or group id with which the file should
	 *                          be shared.
	 * @param boolean $publicUpload Whether to allow public upload to a public
	 *                              shared folder.
	 * @param string $sharePassword The password to protect the public link
	 *                              share with.
	 * @param int $permissions The permissions to set on the share.
	 *                         1 = read; 2 = update; 4 = create; 8 = delete;
	 *                         16 = share; 31 = all
	 *                         (default: 31, for public shares: 1)
	 * @param string $linkName A (human-readable) name for the share,
	 *                         which can be up to 64 characters in length.
	 * @param string $expireDate **NOT IMPLEMENTED**
	 *                           An expire date for public link shares.
	 *                           This argument expects a date string
	 *                           in the format 'YYYY-MM-DD'.
	 * @param int $apiVersion
	 * @param int $sharingApiVersion
	 * @return \GuzzleHttp\Message\FutureResponse|\GuzzleHttp\Message\ResponseInterface|NULL
	 */
	public static function createShare(
		$baseUrl,
		$user,
		$password,
		$path,
		$shareType,
		$shareWith = null,
		$publicUpload = false,
		$sharePassword = null,
		$permissions = null,
		$linkName = null,
		$expireDate = null,
		$apiVersion = 1,
		$sharingApiVersion = 1
	) {

		$fd = [];
		$options = [];
		foreach ([$path, $baseUrl, $user, $password] as $variableToCheck) {
			if (!is_string($variableToCheck)) {
				throw new \InvalidArgumentException(
					"mandatory argument missing or wrong type ($variableToCheck => "
					. gettype($variableToCheck) . ")"
				);
			}
		}
		if (!in_array($shareType, [0, 1, 3, 6], true)) {
			throw new \InvalidArgumentException("invalid share type");
		}
		if (!is_null($permissions)) {
			$permissions = (int) $permissions;
			if ($permissions < 1 || $permissions > 31) {
				throw new \InvalidArgumentException(
					"invalid permissions ($permissions)"
				);
			}
			$fd['permissions'] = $permissions;
		}
		if (!in_array($apiVersion, [1, 2], true)
			|| !in_array($sharingApiVersion, [1,2], true)
		) {
			throw new \InvalidArgumentException(
				"invalid apiVersion/sharingApiVersion"
			);
		}

		$fullUrl = $baseUrl .
			"/ocs/v{$apiVersion}.php/apps/files_sharing/api/v{$sharingApiVersion}/shares";
		$client = new GClient();
		$options['auth'] = [$user, $password];
		$fd['path'] = $path;
		$fd['shareType'] = $shareType;

		if (!is_null($shareWith)) {
			$fd['shareWith'] = $shareWith;
		}
		if (!is_null($publicUpload)) {
			$fd['publicUpload'] = (bool) $publicUpload;
		}
		if (!is_null($sharePassword)) {
			$fd['password'] = $sharePassword;
		}
		if (!is_null($linkName)) {
			$fd['name'] = $linkName;
		}

		$options['form_params'] = $fd;

		return $client->send(new Request("POST", $fullUrl), $options);
	}
}
