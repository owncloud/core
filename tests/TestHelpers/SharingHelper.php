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

use Exception;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use SimpleXMLElement;

/**
 * manage Shares via OCS API
 *
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class SharingHelper {
	public const PERMISSION_TYPES = [
			'read' => 1,
			'update' => 2,
			'create' => 4,
			'delete' => 8,
			'share' => 16,
	];

	public const SHARE_TYPES = [
			'user' => 0,
			'group' => 1,
			'public_link' => 3,
			'federated' => 6,
	];

	public const SHARE_STATES = [
			'accepted' => 0,
			'pending' => 1,
			'rejected' => 2,
			'declined' => 2, // declined is a synonym for rejected
	];

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
	 * @param string $xRequestId
	 * @param string|null $shareWith The user or group id with which the file should
	 *                               be shared.
	 * @param boolean|null $publicUpload Whether to allow public upload to a public
	 *                              	 shared folder.
	 * @param string|null $sharePassword The password to protect the public link
	 *                                   share with.
	 * @param string|int|string[]|int[]|null $permissions The permissions to set on the share.
	 *                                					  1 = read; 2 = update; 4 = create;
	 *                               					  8 = delete; 16 = share
	 *                            					      (default: 31, for public shares: 1)
	 *                               					  Pass either the (total) number or array of numbers,
	 *                               					  or any of the above keywords or array of keywords.
	 * @param string|null $linkName A (human-readable) name for the share,
	 *                              which can be up to 64 characters in length.
	 * @param string|null $expireDate An expire date for public link shares.
	 *                                This argument expects a date string
	 *                                in the format 'YYYY-MM-DD'.
	 * @param int $ocsApiVersion
	 * @param int $sharingApiVersion
	 * @param string $sharingApp
	 *
	 * @return ResponseInterface
	 * @throws InvalidArgumentException
	 */
	public static function createShare(
		string $baseUrl,
		string $user,
		string $password,
		string  $path,
		$shareType,
		string $xRequestId = '',
		?string $shareWith = null,
		?bool	$publicUpload = false,
		string $sharePassword = null,
		$permissions = null,
		?string  $linkName = null,
		?string $expireDate = null,
		int $ocsApiVersion = 1,
		int $sharingApiVersion = 1,
		string $sharingApp = 'files_sharing'
	): ResponseInterface {
		$fd = [];
		foreach ([$path, $baseUrl, $user, $password] as $variableToCheck) {
			if (!\is_string($variableToCheck)) {
				throw new InvalidArgumentException(
					"mandatory argument missing or wrong type ($variableToCheck => "
					. \gettype($variableToCheck) . ")"
				);
			}
		}

		if ($permissions !== null) {
			$fd['permissions'] = self::getPermissionSum($permissions);
		}

		if (!\in_array($ocsApiVersion, [1, 2], true)) {
			throw new InvalidArgumentException(
				"invalid ocsApiVersion ($ocsApiVersion)"
			);
		}
		if (!\in_array($sharingApiVersion, [1, 2], true)) {
			throw new InvalidArgumentException(
				"invalid sharingApiVersion ($sharingApiVersion)"
			);
		}

		$fullUrl = $baseUrl;
		if (\substr($fullUrl, -1) !== '/') {
			$fullUrl .= '/';
		}
		$fullUrl .= "ocs/v{$ocsApiVersion}.php/apps/{$sharingApp}/api/v{$sharingApiVersion}/shares";

		$fd['path'] = $path;
		$fd['shareType'] = self::getShareType($shareType);

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
			$fd['expireDate'] = $expireDate;
		}
		$headers = ['OCS-APIREQUEST' => 'true'];

		return HttpRequestHelper::post(
			$fullUrl,
			$xRequestId,
			$user,
			$password,
			$headers,
			$fd
		);
	}

	/**
	 * calculates the permission sum (int) from given permissions
	 * permissions can be passed in as int, string or array of int or string
	 * 'read' => 1
	 * 'update' => 2
	 * 'create' => 4
	 * 'delete' => 8
	 * 'share' => 16
	 *
	 * @param string[]|string|int|int[] $permissions
	 *
	 * @return int
	 * @throws InvalidArgumentException
	 *
	 */
	public static function getPermissionSum($permissions):int {
		if (\is_numeric($permissions)) {
			// Allow any permission number so that test scenarios can
			// specifically test invalid permission values
			return (int) $permissions;
		}
		if (!\is_array($permissions)) {
			$permissions = [$permissions];
		}
		$permissionSum = 0;
		foreach ($permissions as $permission) {
			if (\array_key_exists($permission, self::PERMISSION_TYPES)) {
				$permissionSum += self::PERMISSION_TYPES[$permission];
			} elseif (\in_array($permission, self::PERMISSION_TYPES, true)) {
				$permissionSum += (int) $permission;
			} else {
				throw new InvalidArgumentException(
					"invalid permission type ($permission)"
				);
			}
		}
		if ($permissionSum < 1 || $permissionSum > 31) {
			throw new InvalidArgumentException(
				"invalid permission total ($permissionSum)"
			);
		}
		return $permissionSum;
	}

	/**
	 * returns the share type number corresponding to the share type keyword
	 *
	 * @param string|int $shareType a keyword from SHARE_TYPES or a share type number
	 *
	 * @return int
	 * @throws InvalidArgumentException
	 *
	 */
	public static function getShareType($shareType):int {
		if (\array_key_exists($shareType, self::SHARE_TYPES)) {
			return self::SHARE_TYPES[$shareType];
		} else {
			if (\ctype_digit($shareType)) {
				$shareType = (int) $shareType;
			}
			$key = \array_search($shareType, self::SHARE_TYPES, true);
			if ($key !== false) {
				return self::SHARE_TYPES[$key];
			}
			throw new InvalidArgumentException(
				"invalid share type ($shareType)"
			);
		}
	}

	/**
	 *
	 * @param SimpleXMLElement $responseXmlObject
	 * @param string $errorMessage
	 *
	 * @return string
	 * @throws Exception
	 *
	 */
	public static function getLastShareIdFromResponse(
		SimpleXMLElement $responseXmlObject,
		string $errorMessage = "cannot find share id in response"
	):string {
		$xmlPart = $responseXmlObject->xpath("//data/element[last()]/id");

		if (!\is_array($xmlPart) || (\count($xmlPart) === 0)) {
			throw new Exception($errorMessage);
		}
		return $xmlPart[0]->__toString();
	}
}
