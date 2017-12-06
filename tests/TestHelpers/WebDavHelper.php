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

use Exception;
use GuzzleHttp\Client as GClient;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use Psr\Http\Message\StreamInterface;
use Sabre\DAV\Client as SClient;

/**
 * Helper to make WebDav Requests
 * 
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class WebDavHelper {
	/**
	 * returns the id of a file
	 * 
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param string $path
	 * @throws Exception
	 * @return int
	 */
	public static function getFileIdForPath(
		$baseUrl,
		$user,
		$password,
		$path
	) {
		$body =
			'<?xml version="1.0"?>
<d:propfind  xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns">
  <d:prop>
    <oc:fileid />
  </d:prop>
</d:propfind>';
		$response = self::makeDavRequest(
			$baseUrl, $user, $password, "PROPFIND", $path, null, $body
		);
		preg_match(
			'/\<oc:fileid\>(\d+)\<\/oc:fileid\>/',
			$response->getBody()->getContents(),
			$matches
		);

		if (!isset($matches[1])) {
			throw new Exception("could not find fileId of $path");
		}

		return $matches[1];
	}

	/**
	 * 
	 * @param string $baseUrl
	 * URL of owncloud e.g. http://localhost:8080
	 * should include the subfolder if owncloud runs in a subfolder
	 * e.g. http://localhost:8080/owncloud-core
	 * @param string $user
	 * @param string $password
	 * @param string $method PUT, GET, DELETE, etc.
	 * @param string $path
	 * @param array $headers
	 * @param string|null|resource|StreamInterface $body
	 * @param string $requestBody
	 * @param int $davPathVersionToUse (1|2)
	 * @param string $type of request
	 * @param string $sourceIpAddress to initiate the request from
	 * @return PromiseInterface|NULL
	 * @throws \GuzzleHttp\Exception\BadResponseException
	 */
	public static function makeDavRequest(
		$baseUrl,
		$user,
		$password,
		$method,
		$path,
		$headers,
		$body = null,
		$requestBody = null,
		$davPathVersionToUse = 1,
		$type = "files",
		$sourceIpAddress = null
	) {
		$baseUrl = self::sanitizeUrl($baseUrl, true);
		$davPath = self::getDavPath($user, $davPathVersionToUse, $type);
		//replace # and ? in the path, Guzzle will not encode them
		$urlSpecialChar = [['#', '?'],['%23', '%3F']];
		$path = str_replace($urlSpecialChar[0], $urlSpecialChar[1], $path);
		$fullUrl = self::sanitizeUrl($baseUrl . $davPath . $path);
		$client = new GClient();
		
		$options = [];
		if (!is_null($requestBody)) {
			$options['body'] = $requestBody;
		}
		$options['auth'] = [$user, $password];
		
		if (!is_null($sourceIpAddress)) {
			$options['config']
				= [ 'curl' => [ CURLOPT_INTERFACE => $sourceIpAddress ]];
		}

		if (is_null($headers)) {
			$headers = [];
		} else {
			foreach ($headers as $key => $value) {
				//? and # need to be encoded in the Destination URL
				if ($key === "Destination") {
					$headers[$key] = str_replace($urlSpecialChar[0], $urlSpecialChar[1], $value);
				}
			}
		}

		$request = new Request($method, $fullUrl, $headers, $body);
	
		return $client->send($request, $options);
	}

	/**
	 * get the dav path
	 * 
	 * @param string $user
	 * @param int $davPathVersionToUse (1|2)
	 * @param string $type
	 * @throws InvalidArgumentException
	 * @return string
	 */
	public static function getDavPath(
		$user, $davPathVersionToUse = 1, $type = "files"
	) {
		if ($davPathVersionToUse === 1) {
			return "remote.php/webdav/";
		} elseif ($davPathVersionToUse === 2) {
			if ($type === "files") {
				return "remote.php/dav" . '/files/' . $user . "/";
			} else {
				return "remote.php/dav";
			}
		} else {
			throw new InvalidArgumentException(
				"DAV path version $davPathVersionToUse is unknown"
			);
		}
	}

	/**
	 * returns a Sabre client
	 * 
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @return \Sabre\DAV\Client
	 */
	public static function getSabreClient($baseUrl, $user, $password) {
		$settings = [
				'baseUri' => $baseUrl,
				'userName' => $user,
				'password' => $password,
				'authType' => SClient::AUTH_BASIC
		];
		
		return new SClient($settings);
	}

	/**
	 * make sure there are no double slash in the URL
	 * 
	 * @param string $url
	 * @param bool $trailingSlash forces a trailing slash
	 * @return string
	 */
	public static function sanitizeUrl($url, $trailingSlash = false) {
		if ($trailingSlash === true) {
			$url = $url . "/";
		} else {
			$url = rtrim($url, "/");
		}
		$url = preg_replace("/([^:]\/)\/+/", '$1', $url);
		return $url;
	}
}