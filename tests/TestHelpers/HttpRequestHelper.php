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

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
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
class HttpRequestHelper {
	public const HTTP_TOO_EARLY = 425;

	/**
	 * @var string
	 */
	private static $oCSelectorCookie = null;

	/**
	 * @return string
	 */
	public static function getOCSelectorCookie(): string {
		return self::$oCSelectorCookie;
	}

	/**
	 * @param string $oCSelectorCookie	"owncloud-selector=oc10;path=/;"
	 *
	 * @return void
	 */
	public static function setOCSelectorCookie(string $oCSelectorCookie): void {
		self::$oCSelectorCookie = $oCSelectorCookie;
	}

	/**
	 * Some systems-under-test do async post-processing of operations like upload,
	 * move etc. If a client does a request on the resource before the post-processing
	 * is finished, then the server should return HTTP_TOO_EARLY "425". Clients are
	 * expected to retry the request "some time later" (tm).
	 *
	 * On such systems, when HTTP_TOO_EARLY status is received, the test code will
	 * retry the request at 1-second intervals until either some other HTTP status
	 * is received or the retry-limit is reached.
	 *
	 * @return int
	 */
	public static function numRetriesOnHttpTooEarly():int {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			// Currently reva and oCIS may return HTTP_TOO_EARLY
			// So try up to 10 times before giving up.
			return 10;
		}
		return 0;
	}

	/**
	 *
	 * @param string|null $url
	 * @param string|null $xRequestId
	 * @param string|null $method
	 * @param string|null $user
	 * @param string|null $password
	 * @param array|null $headers ['X-MyHeader' => 'value']
	 * @param mixed $body
	 * @param array|null $config
	 * @param CookieJar|null $cookies
	 * @param bool $stream Set to true to stream a response rather
	 *                     than download it all up-front.
	 * @param int|null $timeout
	 * @param Client|null $client
	 *
	 * @return ResponseInterface
	 * @throws GuzzleException
	 */
	public static function sendRequest(
		?string $url,
		?string $xRequestId,
		?string $method = 'GET',
		?string $user = null,
		?string $password = null,
		?array $headers = null,
		$body = null,
		?array $config = null,
		?CookieJar $cookies = null,
		bool $stream = false,
		?int $timeout = 0,
		?Client $client =  null
	):ResponseInterface {
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
			$xRequestId,
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

		$sendRetryLimit = self::numRetriesOnHttpTooEarly();
		$sendCount = 0;
		$sendExceptionHappened = false;

		do {
			// The exceptions that might happen here include:
			// ConnectException - in that case there is no response. Don't catch the exception.
			// RequestException - if there is something in the response then pass it back.
			//                    otherwise re-throw the exception.
			// GuzzleException - something else unexpected happened. Don't catch the exception.
			try {
				$response = $client->send($request);
			} catch (RequestException $ex) {
				$sendExceptionHappened = true;
				$response = $ex->getResponse();

				//if the response was null for some reason do not return it but re-throw
				if ($response === null) {
					throw $ex;
				}
			}

			if ($debugResponses) {
				self::debugResponse($response);
			}
			$sendCount = $sendCount + 1;
			$loopAgain = !$sendExceptionHappened && ($response->getStatusCode() === self::HTTP_TOO_EARLY) && ($sendCount <= $sendRetryLimit);
			if ($loopAgain) {
				// we need to repeat the send request, because we got HTTP_TOO_EARLY
				// wait 1 second before sending again, to give the server some time
				// to finish whatever post-processing it might be doing.
				\sleep(1);
			}
		} while ($loopAgain);

		return $response;
	}

	/**
	 * Print details about the request.
	 *
	 * @param RequestInterface|null $request
	 * @param string|null $user
	 * @param string|null $password
	 *
	 * @return void
	 */
	private static function debugRequest(?RequestInterface $request, ?string $user, ?string $password):void {
		print("### AUTH: $user:$password\n");
		print("### REQUEST: " . $request->getMethod() . " " . $request->getUri() . "\n");
		self::printHeaders($request->getHeaders());
		self::printBody($request->getBody());
		print("\n### END REQUEST\n");
	}

	/**
	 * Print details about the response.
	 *
	 * @param ResponseInterface|null $response
	 *
	 * @return void
	 */
	private static function debugResponse(?ResponseInterface $response):void {
		print("### RESPONSE\n");
		print("Status: " . $response->getStatusCode() . "\n");
		self::printHeaders($response->getHeaders());
		self::printBody($response->getBody());
		print("\n### END RESPONSE\n");
	}

	/**
	 * Print details about the headers.
	 *
	 * @param array|null $headers
	 *
	 * @return void
	 */
	private static function printHeaders(?array $headers):void {
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
	 * @param StreamInterface|null $body
	 *
	 * @return void
	 */
	private static function printBody(?StreamInterface $body):void {
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
	 * @param array|null $requests
	 * @param Client|null $client
	 *
	 * @return array
	 */
	public static function sendBatchRequest(
		?array $requests,
		?Client $client
	):array {
		$results = Pool::batch($client, $requests);
		return $results;
	}

	/**
	 * Create a Guzzle Client
	 * This creates a client object that can be used later to send a request object(s)
	 *
	 * @param string|null $user
	 * @param string|null $password
	 * @param array|null $config
	 * @param CookieJar|null $cookies
	 * @param bool $stream Set to true to stream a response rather
	 *                     than download it all up-front.
	 * @param int|null $timeout
	 *
	 * @return Client
	 */
	public static function createClient(
		?string $user = null,
		?string $password = null,
		?array $config = null,
		?CookieJar $cookies = null,
		?bool $stream = false,
		?int $timeout = 0
	):Client {
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
	 * @param string|null $url
	 * @param string|null $xRequestId
	 * @param string|null $method
	 * @param array|null $headers ['X-MyHeader' => 'value']
	 * @param string|array $body either the actual string to send in the body,
	 *                           or an array of key-value pairs to be converted
	 *                           into a body with http_build_query.
	 *
	 * @return RequestInterface
	 */
	public static function createRequest(
		?string $url,
		?string $xRequestId = '',
		?string $method = 'GET',
		?array $headers = null,
		$body = null
	):RequestInterface {
		if ($headers === null) {
			$headers = [];
		}
		if ($xRequestId !== '') {
			$headers['X-Request-ID'] = $xRequestId;
		}
		if (\is_array($body)) {
			// when creating the client, it is possible to set 'form_params' and
			// the Client constructor sorts out doing this http_build_query stuff.
			// But 'new Request' does not have the flexibility to do that.
			// So we need to do it here.
			$body = \http_build_query($body, '', '&');
			$headers['Content-Type'] = 'application/x-www-form-urlencoded';
		}

		if (OcisHelper::isTestingParallelDeployment()) {
			// oCIS cannot handle '/apps/testing' endpoints
			// so those requests must be redirected to oC10 server
			// change server to oC10 if the request url has `/apps/testing`
			if (strpos($url, "/apps/testing") !== false) {
				$oCISServerUrl = \getenv('TEST_SERVER_URL');
				$oC10ServerUrl = \getenv('TEST_OC10_URL');
				$url = str_replace($oCISServerUrl, $oC10ServerUrl, $url);
			} else {
				// set 'owncloud-server' selector cookie for oCIS requests
				$headers['Cookie'] = self::getOCSelectorCookie();
			}
		}

		$request = new Request(
			$method,
			$url,
			$headers,
			$body
		);
		return $request;
	}

	/**
	 * same as HttpRequestHelper::sendRequest() but with "GET" as method
	 *
	 * @param string|null $url
	 * @param string|null $xRequestId
	 * @param string|null $user
	 * @param string|null $password
	 * @param array|null $headers ['X-MyHeader' => 'value']
	 * @param mixed $body
	 * @param array|null $config
	 * @param CookieJar|null $cookies
	 * @param boolean $stream
	 *
	 * @return ResponseInterface
	 * @throws GuzzleException
	 * @see HttpRequestHelper::sendRequest()
	 */
	public static function get(
		?string $url,
		?string $xRequestId,
		?string $user = null,
		?string $password = null,
		?array $headers = null,
		$body = null,
		?array $config = null,
		?CookieJar $cookies = null,
		?bool $stream = false
	):ResponseInterface {
		return self::sendRequest(
			$url,
			$xRequestId,
			'GET',
			$user,
			$password,
			$headers,
			$body,
			$config,
			$cookies,
			$stream
		);
	}

	/**
	 * same as HttpRequestHelper::sendRequest() but with "POST" as method
	 *
	 * @param string|null $url
	 * @param string|null $xRequestId
	 * @param string|null $user
	 * @param string|null $password
	 * @param array|null $headers ['X-MyHeader' => 'value']
	 * @param mixed $body
	 * @param array|null $config
	 * @param CookieJar|null $cookies
	 * @param boolean $stream
	 *
	 * @return ResponseInterface
	 * @throws GuzzleException
	 * @see HttpRequestHelper::sendRequest()
	 */
	public static function post(
		?string $url,
		?string $xRequestId,
		?string $user = null,
		?string $password = null,
		?array $headers = null,
		$body = null,
		?array $config = null,
		?CookieJar $cookies = null,
		?bool $stream = false
	):ResponseInterface {
		return self::sendRequest(
			$url,
			$xRequestId,
			'POST',
			$user,
			$password,
			$headers,
			$body,
			$config,
			$cookies,
			$stream
		);
	}

	/**
	 * same as HttpRequestHelper::sendRequest() but with "PUT" as method
	 *
	 * @param string|null $url
	 * @param string|null $xRequestId
	 * @param string|null $user
	 * @param string|null $password
	 * @param array|null $headers ['X-MyHeader' => 'value']
	 * @param mixed $body
	 * @param array|null $config
	 * @param CookieJar|null $cookies
	 * @param boolean $stream
	 *
	 * @return ResponseInterface
	 * @throws GuzzleException
	 * @see HttpRequestHelper::sendRequest()
	 */
	public static function put(
		?string $url,
		?string $xRequestId,
		?string $user = null,
		?string $password = null,
		?array $headers = null,
		$body = null,
		?array $config = null,
		?CookieJar $cookies = null,
		?bool $stream = false
	):ResponseInterface {
		return self::sendRequest(
			$url,
			$xRequestId,
			'PUT',
			$user,
			$password,
			$headers,
			$body,
			$config,
			$cookies,
			$stream
		);
	}

	/**
	 * same as HttpRequestHelper::sendRequest() but with "DELETE" as method
	 *
	 * @param string|null $url
	 * @param string|null $xRequestId
	 * @param string|null $user
	 * @param string|null $password
	 * @param array|null $headers ['X-MyHeader' => 'value']
	 * @param mixed $body
	 * @param array|null $config
	 * @param CookieJar|null $cookies
	 * @param boolean $stream
	 *
	 * @return ResponseInterface
	 * @throws GuzzleException
	 * @see HttpRequestHelper::sendRequest()
	 *
	 */
	public static function delete(
		?string $url,
		?string $xRequestId,
		?string $user = null,
		?string $password = null,
		?array $headers = null,
		$body = null,
		?array $config = null,
		?CookieJar $cookies = null,
		?bool $stream = false
	):ResponseInterface {
		return self::sendRequest(
			$url,
			$xRequestId,
			'DELETE',
			$user,
			$password,
			$headers,
			$body,
			$config,
			$cookies,
			$stream
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
	 * @param string|null $exceptionText text to put at the front of exception messages
	 *
	 * @return SimpleXMLElement
	 * @throws Exception
	 */
	public static function getResponseXml(ResponseInterface $response, ?string $exceptionText = ''):SimpleXMLElement {
		// rewind just to make sure we can re-parse it in case it was parsed already...
		$response->getBody()->rewind();
		$contents = $response->getBody()->getContents();
		try {
			$responseXmlObject = new SimpleXMLElement($contents);
			$responseXmlObject->registerXPathNamespace(
				'ocs',
				'http://open-collaboration-services.org/ns'
			);
			$responseXmlObject->registerXPathNamespace(
				'oc',
				'http://owncloud.org/ns'
			);
			$responseXmlObject->registerXPathNamespace(
				'd',
				'DAV:'
			);
			return $responseXmlObject;
		} catch (Exception $e) {
			if ($exceptionText !== '') {
				$exceptionText = $exceptionText . ' ';
			}
			if ($contents === '') {
				throw new Exception($exceptionText . "Received empty response where XML was expected");
			}
			$message = $exceptionText . "Exception parsing response body: \"" . $contents . "\"";
			throw new Exception($message, 0, $e);
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
	public static function parseResponseAsXml(ResponseInterface $response):array {
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
