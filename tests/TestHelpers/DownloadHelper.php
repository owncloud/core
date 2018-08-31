<?php
/**
 * ownCloud
 *
 * @author Phil Davis <phil@jankaritech.com>
 * @copyright Copyright (c) 2017 Phil Davis phil@jankaritech.com
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
 * Helper for Downloads
 *
 * @author Phil Davis <phil@jankaritech.com>
 *
 */
class DownloadHelper {
	/**
	 *
	 * @param string $baseUrl URL of owncloud
	 *                        e.g. http://localhost:8080
	 *                        should include the subfolder
	 *                        if owncloud runs in a subfolder
	 *                        e.g. http://localhost:8080/owncloud-core
	 * @param string $user
	 * @param string $password
	 * @param string $fileName
	 * @param array  $headers
	 * @param int    $davPathVersionToUse (1|2)
	 * @param string $sourceIpAddress
	 *
	 * @return ResponseInterface
	 */
	public static function download(
		$baseUrl,
		$user,
		$password,
		$fileName,
		$headers = [],
		$davPathVersionToUse = 1,
		$sourceIpAddress = null
	) {
		return WebDavHelper::makeDavRequest(
			$baseUrl,
			$user,
			$password,
			"GET",
			$fileName,
			$headers,
			null,
			null,
			$davPathVersionToUse,
			"files",
			$sourceIpAddress
		);
	}
}
