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
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use SimpleXMLElement;
use Sabre\Xml\LibXMLException;
use Sabre\Xml\Reader;
use GuzzleHttp\Pool;

/**
 * Helper for HTTP requests
 */
class HttpRequestHelper
{
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
	 * @param bool $stream Set to true to stream a response rather
	 *                     than download it all up-front.
	 * @param int $timeout
	 * @param Client|null $client
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
		$stream = false,
		$timeout = 0,
		$client =  null
	) {
		if ($client === null) {
			$client = self::createClient(
				$user,
				$password,
				$config,
				$cookies,
				$stream,
				$timeout
			);
		}
		/**
		 * @var RequestInterface $request
		 */
		$request = self::createRequest(
			$url,
			$method,
			$headers,
			$body
		);

		if ((\getenv('DEBUG_ACCEPTANCE_REQUESTS') !== false) || (\getenv('DEBUG_ACCEPTANCE_API_CALLS') !== false)) {
			$debugRequests = true;
		} else {
			$debugRequests = false;
		}

		if ((\getenv('DEBUG_ACCEPTANCE_RESPONSES') !== false) || (\getenv('DEBUG_ACCEPTANCE_API_CALLS') !== false)) {
			$debugResponses = true;
		} else {
			$debugResponses = false;
		}

		if ($debugRequests) {
			self::debugRequest($request, $user, $password);
		}

		try {
			$response = $client->send($request);
		} catch (GuzzleException $ex) {
			$response = $ex->getResponse();

			//if the response was null for some reason do not return it but re-throw
			if ($response === null) {
				throw $ex;
			}
		}

		if ($debugResponses) {
			self::debugResponse($response);
		}

		return $response;
	}

	/**
	 * Print details about the request.
	 *
	 * @param RequestInterface $request
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 */
	private static function debugRequest($request, $user, $password) {
		print("### AUTH: $user:$password\n");
		print("### REQUEST: " . $request->getMethod() . " " . $request->getUri() . "\n");
		self::printHeaders($request->getHeaders());
		self::printBody($request->getBody());
		print("\n### END REQUEST\n");
	}

	/**
	 * Print details about the response.
	 *
	 * @param ResponseInterface $response
	 *
	 * @return void
	 */
	private static function debugResponse($response) {
		print("### RESPONSE\n");
		print("Status: " . $response->getStatusCode() . "\n");
		self::printHeaders($response->getHeaders());
		self::printBody($response->getBody());
		print("\n### END RESPONSE\n");
	}

	/**
	 * Print details about the headers.
	 *
	 * @param array $headers
	 *
	 * @return void
	 */
	private static function printHeaders($headers) {
		if ($headers) {
			print("Headers:\n");
			foreach ($headers as $header => $value) {
				if (\is_array($value)) {
					print($header . ": " . \implode(', ', $value) . "\n");
				} else {
					print($header . ": " . $value . "\n");
				}
			}
		} else {
			print("Headers: none\n");
		}
	}

	/**
	 * Print details about the body.
	 *
	 * @param StreamInterface $body
	 *
	 * @return void
	 */
	private static function printBody($body) {
		print("Body:\n");
		\var_dump($body->getContents());
		// Rewind the stream so that later code can read from the start.
		$body->rewind();
	}

	/**
	 * Send the requests to the server in parallel.
	 * This function takes an array of requests and an optional client.
	 * It will send all the requests to the server using the Pool object in guzzle.
	 *
	 * @param array $requests
	 * @param Client $client
	 *
	 * @return array
	 */
	public static function sendBatchRequest(
		$requests,
		$client
	) {
		$results = Pool::batch($client, $requests);
		return $results;
	}

	/**
	 * Create a Guzzle Client
	 * This creates a client object that can be used later to send a request object(s)
	 *
	 * @param string $user
	 * @param string $password
	 * @param array $config
	 * @param CookieJar $cookies
	 * @param bool $stream Set to true to stream a response rather
	 *                     than download it all up-front.
	 * @param int $timeout
	 *
	 * @return Client
	 */
	public static function createClient(
		$user = null,
		$password = null,
		$config = null,
		$cookies = null,
		$stream = false,
		$timeout = 0
	) {
		$options = [];
		if ($user !== null) {
			$options['auth'] = [$user, $password];
		}
		if ($config !== null) {
			$options['config'] = $config;
		}
		if ($cookies !== null) {
			$options['cookies'] = $cookies;
		}
		$options['stream'] = $stream;
		$options['verify'] = false;
		$options['timeout'] = $timeout;
		$client = new Client($options);
		return $client;
	}

	/**
	 * Create an http request based on given parameters.
	 * This creates a RequestInterface object that can be used with a client to send a request.
	 * This enables us to create multiple requests in advance so that we can send them to the server at once in parallel.
	 *
	 * @param string $url
	 * @param string $method
	 * @param array $headers ['X-MyHeader' => 'value']
	 * @param string|array $body either the actual string to send in the body,
	 *                           or an array of key-value pairs to be converted
	 *                           into a body with http_build_query.
	 *
	 * @return RequestInterface
	 */
	public static function createRequest(
		$url,
		$method = 'GET',
		$headers = null,
		$body = null
	) {
		if ($headers === null) {
			$headers = [];
		}
		if (\is_array($body)) {
			// when creating the client, it is possible to set 'form_params' and
			// the Client constructor sorts out doing this http_build_query stuff.
			// But 'new Request' does not have the flexibility to do that.
			// So we need to do it here.
			$body = \http_build_query($body, '', '&');
			$headers['Content-Type'] = 'application/x-www-form-urlencoded';
		}
		$request = new Request(
			$method, $url, $headers, $body
		);
		return $request;
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

	/**
	 * Parses the response as XML and returns a SimpleXMLElement with these
	 * registered namespaces:
	 *  | prefix | namespace                                 |
	 *  | d      | DAV:                                      |
	 *  | oc     | http://owncloud.org/ns                    |
	 *  | ocs    | http://open-collaboration-services.org/ns |
	 *
	 * @param ResponseInterface $response
	 * @param string $exceptionText text to put at the front of exception messages
	 *
	 * @return SimpleXMLElement
	 * @throws \Exception
	 */
	public static function getResponseXml($response, $exceptionText = '') {
		// rewind just to make sure we can re-parse it in case it was parsed already...
		$response->getBody()->rewind();
		$contents = $response->getBody()->getContents();
		try {
			$responseXmlObject = new SimpleXMLElement($contents);
			$responseXmlObject->registerXPathNamespace(
				'ocs', 'http://open-collaboration-services.org/ns'
			);
			$responseXmlObject->registerXPathNamespace(
				'oc', 'http://owncloud.org/ns'
			);
			$responseXmlObject->registerXPathNamespace(
				'd', 'DAV:'
			);
			return $responseXmlObject;
		} catch (\Exception $e) {
			if ($exceptionText !== '') {
				$exceptionText = $exceptionText . ' ';
			}
			if ($contents === '') {
				throw new \Exception($exceptionText . "Received empty response where XML was expected");
			}
			$message = $exceptionText . "Exception parsing response body: \"" . $contents . "\"";
			throw new \Exception($message, 0, $e);
		}
	}

	/**
	 * parses the body content of $response and returns an array representing the XML
	 * This function returns an array with the following three elements:
	 *    * name - The root element name.
	 *    * value - The value for the root element.
	 *    * attributes - An array of attributes.
	 *
	 * @param ResponseInterface $response
	 *
	 * @return array
	 */
	public static function parseResponseAsXml($response) {
		$body = $response->getBody()->getContents();
		$parsedResponse = [];
		if ($body && \substr($body, 0, 1) === '<') {
			try {
				$reader = new Reader();
				$reader->xml($body);
				$parsedResponse = $reader->parse();
			} catch (LibXMLException $e) {
				// Sometimes the body can be a real page of HTML and text.
				// So it may not be a complete ordinary piece of XML.
				// The XML parse might fail with an exception message like:
				// Opening and ending tag mismatch: link line 31 and head.
			}
		}
		return $parsedResponse;
	}
}
