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

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;

/**
 * Helper for HTTP requests
 */
class HttpRequestHelper {
	/**
	 *
	 * @param string $url
	 * @param string $method
	 * @param string $user
	 * @param string $password
	 * @param array $headers ['X-MyHeader' => 'value']
	 * @param mixed $body
	 * @param array $config
	 * @param CookieJar $cookies
	 * @param boolean $stream
	 *
	 * @throws BadResponseException
	 * @return ResponseInterface
	 */
	public static function sendRequest(
		$url,
		$method = 'GET',
		$user = null,
		$password = null,
		$headers = null,
		$body = null,
		$config = null,
		$cookies = null,
		$stream = false
	) {
		$client = new Client();
		$options = [];
		if ($user !== null) {
			$options['auth'] = [$user, $password];
		}
		if ($body !== null) {
			if (\is_array($body)) {
				// the array of 'form_params' get converted into a body by the
				// client, which uses http_build_query to do it.
				$options['form_params'] = $body;
			} else {
				// just use the oridnary body provided as-is.
				// e.g. the caller might have already built a JSON-encided string
				$options['body'] = $body;
			}
		}
		if ($config !== null) {
			$options['config'] = $config;
		}
		if ($cookies !== null) {
			$options['cookies'] = $cookies;
		}
		$options['stream'] = $stream;
		$options['verify'] = false;

		if ($headers === null) {
			$headers = [];
		}

		$request = new Request(
			$method,
			$url,
			$headers
		);

		try {
			$response = $client->send($request, $options);
		} catch (BadResponseException $ex) {
			$response = $ex->getResponse();
			
			//if the response was null for some reason do not return it but re-throw
			if ($response === null) {
				throw $ex;
			}
		}
		return $response;
	}

	/**
	 * same as HttpRequestHelper::sendRequest() but with "GET" as method
	 *
	 * @see HttpRequestHelper::sendRequest()
	 *
	 * @param string $url
	 * @param string $user
	 * @param string $password
	 * @param array $headers ['X-MyHeader' => 'value']
	 * @param mixed $body
	 * @param array $config
	 * @param CookieJar $cookies
	 * @param boolean $stream
	 *
	 * @throws BadResponseException
	 * @return ResponseInterface
	 */
	public static function get(
		$url,
		$user = null,
		$password = null,
		$headers = null,
		$body = null,
		$config = null,
		$cookies = null,
		$stream = false
	) {
		return self::sendRequest(
			$url, 'GET', $user, $password, $headers, $body, $config, $cookies, $stream
		);
	}

	/**
	 * same as HttpRequestHelper::sendRequest() but with "POST" as method
	 *
	 * @see HttpRequestHelper::sendRequest()
	 *
	 * @param string $url
	 * @param string $user
	 * @param string $password
	 * @param array $headers ['X-MyHeader' => 'value']
	 * @param mixed $body
	 * @param array $config
	 * @param CookieJar $cookies
	 * @param boolean $stream
	 *
	 * @throws BadResponseException
	 * @return ResponseInterface
	 */
	public static function post(
		$url,
		$user = null,
		$password = null,
		$headers = null,
		$body = null,
		$config = null,
		$cookies = null,
		$stream = false
	) {
		return self::sendRequest(
			$url, 'POST', $user, $password, $headers, $body, $config, $cookies, $stream
		);
	}

	/**
	 * same as HttpRequestHelper::sendRequest() but with "PUT" as method
	 *
	 * @see HttpRequestHelper::sendRequest()
	 *
	 * @param string $url
	 * @param string $user
	 * @param string $password
	 * @param array $headers ['X-MyHeader' => 'value']
	 * @param mixed $body
	 * @param array $config
	 * @param CookieJar $cookies
	 * @param boolean $stream
	 *
	 * @throws BadResponseException
	 * @return ResponseInterface
	 */
	public static function put(
		$url,
		$user = null,
		$password = null,
		$headers = null,
		$body = null,
		$config = null,
		$cookies = null,
		$stream = false
	) {
		return self::sendRequest(
			$url, 'PUT', $user, $password, $headers, $body, $config, $cookies, $stream
		);
	}

	/**
	 * same as HttpRequestHelper::sendRequest() but with "DELETE" as method
	 *
	 * @see HttpRequestHelper::sendRequest()
	 *
	 * @param string $url
	 * @param string $user
	 * @param string $password
	 * @param array $headers ['X-MyHeader' => 'value']
	 * @param mixed $body
	 * @param array $config
	 * @param CookieJar $cookies
	 * @param boolean $stream
	 *
	 * @throws BadResponseException
	 * @return ResponseInterface
	 */
	public static function delete(
		$url,
		$user = null,
		$password = null,
		$headers = null,
		$body = null,
		$config = null,
		$cookies = null,
		$stream = false
	) {
		return self::sendRequest(
			$url, 'DELETE', $user, $password, $headers, $body, $config, $cookies, $stream
		);
	}
}
