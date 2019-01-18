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
	 * @param string|int $shareType The type of the share. This can be one of:
	 *                              0 = user, 1 = group, 3 = public (link),
	 *                              6 = federated (cloud share).
	 *                              Pass either the number or the keyword.
	 * @param string|null $shareWith The user or group id with which the file should
	 *                               be shared.
	 * @param boolean $publicUpload Whether to allow public upload to a public
	 *                              shared folder.
	 * @param string|null $sharePassword The password to protect the public link
	 *                                   share with.
	 * @param string|int|string[]|int[]|null $permissions The permissions to set on the share.
	 *                                                    1 = read; 2 = update; 4 = create;
	 *                                                    8 = delete; 16 = share; 31 = all
	 *                                                    15 = change
	 *                                                    (default: 31, for public shares: 1)
	 *                                                    Pass either the (total) number,
	 *                                                    or the keyword,
	 *                                                    or an array of keywords or numbers.
	 * @param string|null $linkName A (human-readable) name for the share,
	 *                              which can be up to 64 characters in length.
	 * @param string|null $expireDate **NOT IMPLEMENTED**
	 *                                An expire date for public link shares.
	 *                                This argument expects a date string
	 *                                in the format 'YYYY-MM-DD'.
	 * @param int $ocsApiVersion
	 * @param int $sharingApiVersion
	 *
	 * @throws \InvalidArgumentException
	 * @return ResponseInterface
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
		$ocsApiVersion = 1,
		$sharingApiVersion = 1
	) {
		$fd = [];
		foreach ([$path, $baseUrl, $user, $password] as $variableToCheck) {
			if (!\is_string($variableToCheck)) {
				throw new \InvalidArgumentException(
					"mandatory argument missing or wrong type ($variableToCheck => "
					. \gettype($variableToCheck) . ")"
				);
			}
		}

		$validShareTypes
			= ['user' => 0, 'group' => 1, 'public' => 3, 'federated' => 6];
		if (isset($validShareTypes[$shareType])) {
			$shareType = $validShareTypes[$shareType];
		}
		if (!\in_array($shareType, $validShareTypes, true)) {
			throw new \InvalidArgumentException("invalid share type");
		}
		if ($permissions !== null) {
			$fd['permissions'] = self::getPermissionSum($permissions);
		}

		if (!\in_array($ocsApiVersion, [1, 2], true)) {
			throw new \InvalidArgumentException(
				"invalid ocsApiVersion ($ocsApiVersion)"
			);
		}
		if (!\in_array($sharingApiVersion, [1, 2], true)) {
			throw new \InvalidArgumentException(
				"invalid sharingApiVersion ($sharingApiVersion)"
			);
		}

		$fullUrl = $baseUrl;
		if (\substr($fullUrl, -1) !== '/') {
			$fullUrl .= '/';
		}
		$fullUrl .= "ocs/v{$ocsApiVersion}.php/apps/files_sharing/api/v{$sharingApiVersion}/shares";
		$fd['path'] = $path;
		$fd['shareType'] = $shareType;

		if ($shareWith !== null) {
			$fd['shareWith'] = $shareWith;
		}
		if ($publicUpload !== null) {
			$fd['publicUpload'] = (bool) $publicUpload;
		}
		if ($sharePassword !== null) {
			$fd['password'] = $sharePassword;
		}
		if ($linkName !== null) {
			$fd['name'] = $linkName;
		}
		if ($expireDate !== null) {
			$fd['expireDate'] = \date('Y-m-d', \strtotime($expireDate));
		}

		return HttpRequestHelper::post($fullUrl, $user, $password, null, $fd);
	}
	
	/**
	 * calculates the permission sum (int) from given permissions
	 * permissions can be passed in as int, string or array of int or string
	 * 'read' => 1
	 * 'update' => 2
	 * 'create' => 4
	 * 'delete' => 8
	 * 'change' => 15
	 * 'share' => 16
	 * 'all' => 31
	 *
	 * @param string[]|string|int|int[] $permissions
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return int
	 */
	public static function getPermissionSum($permissions) {
		if (\is_numeric($permissions)) {
			$permissionSum = (int) $permissions;
		} else {
			if (!\is_array($permissions)) {
				$permissions = [$permissions];
			}
			$validPermissionTypes
				= [
					'read' => 1,
					'update' => 2,
					'create' => 4,
					'delete' => 8,
					'change' => 15,
					'share' => 16,
					'all' => 31
				];
			$permissionSum = 0;
			foreach ($permissions as $permission) {
				if (isset($validPermissionTypes[$permission])) {
					$permissionSum += $validPermissionTypes[$permission];
				} elseif (\in_array($permission, $validPermissionTypes)) {
					$permissionSum += (int) $permission;
				} else {
					throw new \InvalidArgumentException(
						"invalid permission type ($permission)"
					);
				}
			}
		}
		if ($permissionSum < 1 || $permissionSum > 31) {
			throw new \InvalidArgumentException(
				"invalid permission total ($permissionSum)"
			);
		}
		return $permissionSum;
	}
}
