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
	 * @param string $baseUrl URL of owncloud
	 *                        e.g. http://localhost:8080
	 *                        should include the subfolder
	 *                        if owncloud runs in a subfolder
	 *                        e.g. http://localhost:8080/owncloud-core
	 * @param string $user
	 * @param string $password
	 * @param string $fromFileName
	 * @param string $toFileName
	 * @param array  $headers
	 * @param int    $davPathVersionToUse (1|2)
	 * @param string $sourceIpAddress
	 *
	 * @return ResponseInterface
	 */
	public static function copy(
		$baseUrl,
		$user,
		$password,
		$fromFileName,
		$toFileName,
		$headers = [],
		$davPathVersionToUse = 1,
		$sourceIpAddress = null
	) {
		return self::copyOrMove(
			$baseUrl, "copy", $user, $password, $fromFileName, $toFileName,
			$headers, $davPathVersionToUse, $sourceIpAddress
		);
	}

	/**
	 *
	 * @param string $baseUrl URL of owncloud
	 *                        e.g. http://localhost:8080
	 *                        should include the subfolder
	 *                        if owncloud runs in a subfolder
	 *                        e.g. http://localhost:8080/owncloud-core
	 * @param string $user
	 * @param string $password
	 * @param string $fromFileName
	 * @param string $toFileName
	 * @param array  $headers
	 * @param int    $davPathVersionToUse (1|2)
	 * @param string $sourceIpAddress
	 *
	 * @return ResponseInterface
	 */
	public static function move(
		$baseUrl,
		$user,
		$password,
		$fromFileName,
		$toFileName,
		$headers = [],
		$davPathVersionToUse = 1,
		$sourceIpAddress = null
	) {
		return self::copyOrMove(
			$baseUrl, "move", $user, $password, $fromFileName, $toFileName,
			$headers, $davPathVersionToUse, $sourceIpAddress
		);
	}

	/**
	 *
	 * @param string $baseUrl URL of owncloud
	 *                        e.g. http://localhost:8080
	 *                        should include the subfolder
	 *                        if owncloud runs in a subfolder
	 *                        e.g. http://localhost:8080/owncloud-core
	 * @param string $method copy|move
	 * @param string $user
	 * @param string $password
	 * @param string $fromFileName
	 * @param string $toFileName
	 * @param array  $headers
	 * @param int    $davPathVersionToUse (1|2)
	 * @param string $sourceIpAddress
	 *
	 * @return ResponseInterface
	 */
	private static function copyOrMove(
		$baseUrl,
		$method,
		$user,
		$password,
		$fromFileName,
		$toFileName,
		$headers = [],
		$davPathVersionToUse = 1,
		$sourceIpAddress = null
	) {
		$method = \strtoupper($method);
		if ($method !== "COPY" && $method !== "MOVE") {
			throw new \InvalidArgumentException(
				'$method has to be "copy" or "move"'
			);
		}
		$baseUrl = WebDavHelper::sanitizeUrl($baseUrl, true);
		$davPath = WebDavHelper::getDavPath($user, $davPathVersionToUse);
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
			null,
			null,
			$davPathVersionToUse,
			"files",
			$sourceIpAddress
		);
	}
}
