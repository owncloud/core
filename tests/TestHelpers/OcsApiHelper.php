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

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Helper to make requests to the OCS API
 *
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class OcsApiHelper {
	/**
	 * @param string|null $baseUrl
	 * @param string|null $user if set to null no authentication header will be sent
	 * @param string|null $password
	 * @param string|null $method HTTP Method
	 * @param string|null $path
	 * @param string|null $xRequestId
	 * @param mixed $body array of key, value pairs e.g ['value' => 'yes']
	 * @param int|null $ocsApiVersion (1|2) default 2
	 * @param array|null $headers
	 *
	 * @return ResponseInterface
	 * @throws GuzzleException
	 */
	public static function sendRequest(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $method,
		?string $path,
		?string $xRequestId = '',
		$body = [],
		?int $ocsApiVersion = 2,
		?array $headers = []
	):ResponseInterface {
		$fullUrl = $baseUrl;
		if (\substr($fullUrl, -1) !== '/') {
			$fullUrl .= '/';
		}
		$fullUrl .= "ocs/v{$ocsApiVersion}.php" . $path;
		$headers['OCS-APIREQUEST'] = true;

		return HttpRequestHelper::sendRequest($fullUrl, $xRequestId, $method, $user, $password, $headers, $body);
	}

	/**
	 *
	 * @param string|null $baseUrl
	 * @param string|null $method HTTP Method
	 * @param string|null $path
	 * @param string|null $xRequestId
	 * @param mixed $body array of key, value pairs e.g ['value' => 'yes']
	 * @param int|null $ocsApiVersion (1|2) default 2
	 * @param array|null $headers
	 *
	 * @return RequestInterface
	 */
	public static function createOcsRequest(
		?string $baseUrl,
		?string $method,
		?string $path,
		?string $xRequestId = '',
		$body = [],
		?int $ocsApiVersion = 2,
		?array $headers = []
	):RequestInterface {
		$fullUrl = $baseUrl;
		if (\substr($fullUrl, -1) !== '/') {
			$fullUrl .= '/';
		}
		$fullUrl .= "ocs/v{$ocsApiVersion}.php" . $path;
		return HttpRequestHelper::createRequest(
			$fullUrl,
			$xRequestId,
			$method,
			$headers,
			$body
		);
	}
}
