<?php declare(strict_types=1);
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

use Psr\Http\Message\ResponseInterface;

/**
 * Helper for move and copy files
 *
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class MoveCopyHelper {
	/**
	 *
	 * @param string|null $baseUrl URL of owncloud
	 *                        	   e.g. http://localhost:8080
	 *                             should include the subfolder
	 *                             if owncloud runs in a subfolder
	 *                             e.g. http://localhost:8080/owncloud-core
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $fromFileName
	 * @param string|null $toFileName
	 * @param string|null $xRequestId
	 * @param array|null $headers
	 * @param int|null $davPathVersionToUse (1|2)
	 * @param string|null $sourceIpAddress
	 *
	 * @return ResponseInterface
	 */
	public static function copy(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $fromFileName,
		?string $toFileName,
		?string $xRequestId = '',
		?array $headers = [],
		?int $davPathVersionToUse = 1,
		?string $sourceIpAddress = null
	):ResponseInterface {
		return self::copyOrMove(
			$baseUrl,
			"copy",
			$user,
			$password,
			$fromFileName,
			$toFileName,
			$xRequestId,
			$headers,
			$davPathVersionToUse,
			$sourceIpAddress
		);
	}

	/**
	 *
	 * @param string|null $baseUrl URL of owncloud
	 *                             e.g. http://localhost:8080
	 *                             should include the subfolder
	 *                             if owncloud runs in a subfolder
	 *                             e.g. http://localhost:8080/owncloud-core
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $fromFileName
	 * @param string|null $toFileName
	 * @param string|null $xRequestId
	 * @param array|null $headers
	 * @param int|null $davPathVersionToUse (1|2)
	 * @param string|null $sourceIpAddress
	 *
	 * @return ResponseInterface
	 */
	public static function move(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $fromFileName,
		?string $toFileName,
		?string $xRequestId = '',
		?array$headers = [],
		?int $davPathVersionToUse = 1,
		?string $sourceIpAddress = null
	):ResponseInterface {
		return self::copyOrMove(
			$baseUrl,
			"move",
			$user,
			$password,
			$fromFileName,
			$toFileName,
			$xRequestId,
			$headers,
			$davPathVersionToUse,
			$sourceIpAddress
		);
	}

	/**
	 *
	 * @param string|null $baseUrl URL of owncloud
	 *                             e.g. http://localhost:8080
	 *                             should include the subfolder
	 *                             if owncloud runs in a subfolder
	 *                             e.g. http://localhost:8080/owncloud-core
	 * @param string|null $method copy|move
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $fromFileName
	 * @param string|null $toFileName
	 * @param string|null $xRequestId
	 * @param array|null $headers
	 * @param int|null $davPathVersionToUse (1|2)
	 * @param string|null $sourceIpAddress
	 *
	 * @return ResponseInterface
	 */
	private static function copyOrMove(
		?string $baseUrl,
		?string $method,
		?string $user,
		?string $password,
		?string $fromFileName,
		?string $toFileName,
		?string $xRequestId = '',
		?array $headers = [],
		?int $davPathVersionToUse = 1,
		?string $sourceIpAddress = null
	):ResponseInterface {
		$method = \strtoupper($method);
		if ($method !== "COPY" && $method !== "MOVE") {
			throw new \InvalidArgumentException(
				'$method has to be "copy" or "move"'
			);
		}
		$spaceId = null;
		// get space id if testing with spaces dav
		if ($davPathVersionToUse === WebDavHelper::DAV_VERSION_SPACES) {
			$spaceId = WebDavHelper::getPersonalSpaceIdForUser($baseUrl, $user, $password, $xRequestId);
		}
		$baseUrl = WebDavHelper::sanitizeUrl($baseUrl, true);
		$davPath = WebDavHelper::getDavPath($user, $davPathVersionToUse, "files", $spaceId);
		$fullDestUrl = WebDavHelper::sanitizeUrl(
			$baseUrl . $davPath . $toFileName
		);

		$headers["Destination"] = $fullDestUrl;
		return WebDavHelper::makeDavRequest(
			$baseUrl,
			$user,
			$password,
			$method,
			$fromFileName,
			$headers,
			$xRequestId,
			null,
			$davPathVersionToUse,
			"files",
			$sourceIpAddress
		);
	}
}
