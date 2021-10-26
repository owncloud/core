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

use Psr\Http\Message\ResponseInterface;

/**
 * Helper for deleting files
 *
 * @author Phil Davis <phil@jankaritech.com>
 *
 */
class DeleteHelper {
	/**
	 *
	 * @param string|null $baseUrl URL of owncloud
	 *                             e.g. http://localhost:8080
	 *                        	   should include the subfolder
	 *                       	   if owncloud runs in a subfolder
	 *                       	   e.g. http://localhost:8080/owncloud-core
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $fileName
	 * @param string|null $xRequestId
	 * @param array|null $headers
	 * @param int|null $davPathVersionToUse (1|2)
	 * @param string|null $sourceIpAddress
	 * @param Client|null $client
	 *
	 * @return ResponseInterface
	 */
	public static function delete(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $fileName,
		?string $xRequestId = '',
		?array $headers = [],
		?int $davPathVersionToUse = 1,
		?string $sourceIpAddress = null,
		?Client $client = null
	):ResponseInterface {
		return WebDavHelper::makeDavRequest(
			$baseUrl,
			$user,
			$password,
			"DELETE",
			$fileName,
			$headers,
			$xRequestId,
			null,
			$davPathVersionToUse,
			"files",
			$sourceIpAddress,
			"basic",
			false,
			0,
			$client
		);
	}
}
