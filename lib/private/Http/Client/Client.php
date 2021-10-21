<?php
/**
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Robin Appelman <icewind@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OC\Http\Client;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;
use OCP\Http\Client\IClient;
use OCP\ICertificateManager;
use OCP\IConfig;

/**
 * Class Client
 *
 * @package OC\Http
 */
class Client implements IClient {
	/** @var GuzzleClient */
	private $client;
	/** @var IConfig */
	private $config;
	/** @var ICertificateManager */
	private $certificateManager;
	/** @var array */
	private $defaultOptions;

	/**
	 * @param IConfig $config
	 * @param ICertificateManager $certificateManager
	 * @param GuzzleClient $client
	 */
	public function __construct(
		IConfig $config,
		ICertificateManager $certificateManager,
		GuzzleClient $client
	) {
		$this->config = $config;
		$this->client = $client;
		$this->certificateManager = $certificateManager;
	}

	/**
	 * Build options for a request
	 *
	 * @param array $options
	 * @return array
	 */
	private function buildRequestOptions(array $options): array {
		if (!$this->defaultOptions) {
			$this->setDefaultOptions();
		}

		$isStream = isset($options['stream']) && $options['stream'];
		if ($isStream) {
			$proxyHost = $this->config->getSystemValue('proxy', null);

			if ($proxyHost !== null && !isset($options[RequestOptions::PROXY])) {
				$options[RequestOptions::PROXY] = 'tcp://' . $proxyHost;
			}

			if ($proxyHost !== null && !isset($options['config']['stream_context']['http']['request_fulluri'])) {
				$options['config']['stream_context']['http']['request_fulluri'] = true;
			}

			$proxyUserPwd = $this->config->getSystemValue('proxyuserpwd', null);
			if ($proxyUserPwd !== null && !isset($options[RequestOptions::HEADERS]['Proxy-Authorization'])) {
				$auth = \base64_encode(\urldecode($proxyUserPwd));
				$options[RequestOptions::HEADERS]['Proxy-Authorization'] = "Basic $auth";
			}
		}

		return \array_merge($this->defaultOptions, $options);
	}

	/**
	 * Get the default config for requests.
	 */
	private function setDefaultOptions() {
		$options = [];
		// Either use user bundle or the system bundle if nothing is specified
		if ($this->certificateManager->listCertificates() !== []) {
			$options[RequestOptions::VERIFY] = $this->certificateManager->getAbsoluteBundlePath();
		} else {
			// If the instance is not yet setup we need to use the static path as
			// $this->certificateManager->getAbsoluteBundlePath() tries to instantiate
			// a view
			if ($this->config->getSystemValue('installed', false) && !\OCP\Util::needUpgrade()) {
				$options[RequestOptions::VERIFY] = $this->certificateManager->getAbsoluteBundlePath(null);
			} else {
				$options[RequestOptions::VERIFY] = \OC::$SERVERROOT . '/resources/config/ca-bundle.crt';
			}
		}

		$options[RequestOptions::HEADERS]['User-Agent'] = 'ownCloud Server Crawler';
		if ($this->getProxyUri() !== '') {
			$options[RequestOptions::PROXY] = $this->getProxyUri();
		}

		$this->defaultOptions = $options;
	}

	/**
	 * Get the proxy URI
	 *
	 * @return string
	 */
	private function getProxyUri() {
		$proxyHost = $this->config->getSystemValue('proxy', null);
		$proxyUserPwd = $this->config->getSystemValue('proxyuserpwd', null);
		$proxyUri = '';

		if ($proxyUserPwd !== null) {
			$proxyUri .= $proxyUserPwd . '@';
		}
		if ($proxyHost !== null) {
			$proxyUri .= $proxyHost;
		}

		return $proxyUri;
	}

	/**
	 * Sends a GET request
	 *
	 * @param string $uri
	 * @param array $options Array such as
	 *              'query' => [
	 *                  'field' => 'abc',
	 *                  'other_field' => '123',
	 *                  'file_name' => fopen('/path/to/file', 'r'),
	 *              ],
	 *              'headers' => [
	 *                  'foo' => 'bar',
	 *              ],
	 *              'cookies' => ['
	 *                  'foo' => 'bar',
	 *              ],
	 *              'allow_redirects' => [
	 *                   'max'       => 10,  // allow at most 10 redirects.
	 *                   'strict'    => true,     // use "strict" RFC compliant redirects.
	 *                   'referer'   => true,     // add a Referer header
	 *                   'protocols' => ['https'] // only allow https URLs
	 *              ],
	 *              'sink' => '/path/to/file', // save to a file or a stream
	 *              'verify' => true, // bool or string to CA file
	 *              'debug' => true,
	 *              'timeout' => 5,
	 * @return Response
	 * @throws \Exception If the request could not get completed
	 */
	public function get($uri, array $options = []) {
		$isStream = isset($options['stream']) && $options['stream'];
		$response = $this->client->get($uri, $this->buildRequestOptions($options));
		return new Response($response, $isStream);
	}

	/**
	 * Sends a HEAD request
	 *
	 * @param string $uri
	 * @param array $options Array such as
	 *              'headers' => [
	 *                  'foo' => 'bar',
	 *              ],
	 *              'cookies' => ['
	 *                  'foo' => 'bar',
	 *              ],
	 *              'allow_redirects' => [
	 *                   'max'       => 10,  // allow at most 10 redirects.
	 *                   'strict'    => true,     // use "strict" RFC compliant redirects.
	 *                   'referer'   => true,     // add a Referer header
	 *                   'protocols' => ['https'] // only allow https URLs
	 *              ],
	 *              'sink' => '/path/to/file', // save to a file or a stream
	 *              'verify' => true, // bool or string to CA file
	 *              'debug' => true,
	 *              'timeout' => 5,
	 * @return Response
	 * @throws \Exception If the request could not get completed
	 */
	public function head($uri, $options = []) {
		$response = $this->client->head($uri, $this->buildRequestOptions($options));
		return new Response($response);
	}

	/**
	 * Sends a POST request
	 *
	 * @param string $uri
	 * @param array $options Array such as
	 *              'body' => [
	 *                  'field' => 'abc',
	 *                  'other_field' => '123',
	 *                  'file_name' => fopen('/path/to/file', 'r'),
	 *              ],
	 *              'headers' => [
	 *                  'foo' => 'bar',
	 *              ],
	 *              'cookies' => ['
	 *                  'foo' => 'bar',
	 *              ],
	 *              'allow_redirects' => [
	 *                   'max'       => 10,  // allow at most 10 redirects.
	 *                   'strict'    => true,     // use "strict" RFC compliant redirects.
	 *                   'referer'   => true,     // add a Referer header
	 *                   'protocols' => ['https'] // only allow https URLs
	 *              ],
	 *              'sink' => '/path/to/file', // save to a file or a stream
	 *              'verify' => true, // bool or string to CA file
	 *              'debug' => true,
	 *              'timeout' => 5,
	 * @return Response
	 * @throws \Exception If the request could not get completed
	 */
	public function post($uri, array $options = []) {
		$response = $this->client->post($uri, $this->buildRequestOptions($options));
		return new Response($response);
	}

	/**
	 * Sends a PUT request
	 *
	 * @param string $uri
	 * @param array $options Array such as
	 *              'body' => [
	 *                  'field' => 'abc',
	 *                  'other_field' => '123',
	 *                  'file_name' => fopen('/path/to/file', 'r'),
	 *              ],
	 *              'headers' => [
	 *                  'foo' => 'bar',
	 *              ],
	 *              'cookies' => ['
	 *                  'foo' => 'bar',
	 *              ],
	 *              'allow_redirects' => [
	 *                   'max'       => 10,  // allow at most 10 redirects.
	 *                   'strict'    => true,     // use "strict" RFC compliant redirects.
	 *                   'referer'   => true,     // add a Referer header
	 *                   'protocols' => ['https'] // only allow https URLs
	 *              ],
	 *              'sink' => '/path/to/file', // save to a file or a stream
	 *              'verify' => true, // bool or string to CA file
	 *              'debug' => true,
	 *              'timeout' => 5,
	 * @return Response
	 * @throws \Exception If the request could not get completed
	 */
	public function put($uri, array $options = []) {
		$response = $this->client->put($uri, $this->buildRequestOptions($options));
		return new Response($response);
	}

	/**
	 * Sends a DELETE request
	 *
	 * @param string $uri
	 * @param array $options Array such as
	 *              'body' => [
	 *                  'field' => 'abc',
	 *                  'other_field' => '123',
	 *                  'file_name' => fopen('/path/to/file', 'r'),
	 *              ],
	 *              'headers' => [
	 *                  'foo' => 'bar',
	 *              ],
	 *              'cookies' => ['
	 *                  'foo' => 'bar',
	 *              ],
	 *              'allow_redirects' => [
	 *                   'max'       => 10,  // allow at most 10 redirects.
	 *                   'strict'    => true,     // use "strict" RFC compliant redirects.
	 *                   'referer'   => true,     // add a Referer header
	 *                   'protocols' => ['https'] // only allow https URLs
	 *              ],
	 *              'sink' => '/path/to/file', // save to a file or a stream
	 *              'verify' => true, // bool or string to CA file
	 *              'debug' => true,
	 *              'timeout' => 5,
	 * @return Response
	 * @throws \Exception If the request could not get completed
	 */
	public function delete($uri, array $options = []) {
		$response = $this->client->delete($uri, $this->buildRequestOptions($options));
		return new Response($response);
	}

	/**
	 * Sends a options request
	 *
	 * @param string $uri
	 * @param array $options Array such as
	 *              'body' => [
	 *                  'field' => 'abc',
	 *                  'other_field' => '123',
	 *                  'file_name' => fopen('/path/to/file', 'r'),
	 *              ],
	 *              'headers' => [
	 *                  'foo' => 'bar',
	 *              ],
	 *              'cookies' => ['
	 *                  'foo' => 'bar',
	 *              ],
	 *              'allow_redirects' => [
	 *                   'max'       => 10,  // allow at most 10 redirects.
	 *                   'strict'    => true,     // use "strict" RFC compliant redirects.
	 *                   'referer'   => true,     // add a Referer header
	 *                   'protocols' => ['https'] // only allow https URLs
	 *              ],
	 *              'sink' => '/path/to/file', // save to a file or a stream
	 *              'verify' => true, // bool or string to CA file
	 *              'debug' => true,
	 *              'timeout' => 5,
	 * @return Response
	 * @throws \Exception If the request could not get completed
	 */
	public function options($uri, array $options = []) {
		$response = $this->client->request('options', $uri, $this->buildRequestOptions($options));
		return new Response($response);
	}
}
