<?php
/**
 * ownCloud
 *
 * @author Phil Davis <info@jankaritech.com>
 * @copyright 2017 Phil Davis info@jankaritech.com
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
namespace TestHelpers;

use GuzzleHttp\Stream\Stream;

/**
 * Helper for Downloads
 *
 * @author Phil Davis <info@jankaritech.com>
 *
 */
class DownloadHelper {
	/**
	 * 
	 * @param string $baseUrl             URL of owncloud
	 * e.g. http://localhost:8080
	 * should include the subfolder if owncloud runs in a subfolder
	 * e.g. http://localhost:8080/owncloud-core
	 * @param string $user
	 * @param string $password
	 * @param string $fileName
	 * @param array  $headers
	 * @param int    $davPathVersionToUse (1|2)
	 * @param string $sourceIpAddress
	 * @return \GuzzleHttp\Message\FutureResponse|\GuzzleHttp\Message\ResponseInterface|NULL
	 */
	public static function download(
		$baseUrl,
		$user,
		$password,
		$fileName,
		$headers = array(),
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
