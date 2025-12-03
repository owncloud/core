<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

namespace Owncloud\Updater\Utils;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Fetcher
 *
 * @package Owncloud\Updater\Utils
 */
class Fetcher {
	public const DEFAULT_BASE_URL = 'https://updates.owncloud.com/server/';

	/**
	 * @var Locator $locator
	 */
	protected $locator;

	/**
	 * @var ConfigReader $configReader
	 */
	protected $configReader;

	/**
	 * @var Client $httpClient
	 */
	protected $httpClient;
	protected $requiredFeedEntries = [
		'version',
		'versionstring',
		'url'
	];

	/**
	 * Constructor
	 *
	 * @param Client $httpClient
	 * @param Locator $locator
	 * @param ConfigReader $configReader
	 */
	public function __construct(Client $httpClient, Locator $locator, ConfigReader $configReader) {
		$this->httpClient = $httpClient;
		$this->locator = $locator;
		$this->configReader = $configReader;
	}

	/**
	 * Download new ownCloud package
	 * @param Feed $feed
	 * @param Callable $onProgress
	 * @throws \Exception
	 * @throws \UnexpectedValueException
	 */
	public function getOwncloud(Feed $feed, callable $onProgress) {
		if ($feed->isValid()) {
			$downloadPath = $this->getBaseDownloadPath($feed);
			if (!\is_writable(\dirname($downloadPath))) {
				throw new \Exception(\dirname($downloadPath) . ' is not writable.');
			}
			$url = $feed->getUrl();
			$response = $this->httpClient->request(
				'GET',
				$url,
				[
						RequestOptions::PROGRESS => $onProgress,
						RequestOptions::SINK => $downloadPath,
						RequestOptions::TIMEOUT => 600
					]
			);
			$this->validateResponse($response, $url);
		}
	}

	/**
	 * Produce a local path to save the package to
	 * @param Feed $feed
	 * @return string
	 */
	public function getBaseDownloadPath(Feed $feed) {
		$basePath = $this->locator->getDownloadBaseDir();
		return $basePath . '/' . $feed->getDownloadedFileName();
	}

	/**
	 * Get md5 sum for the package
	 * @param Feed $feed
	 * @return string
	 */
	public function getMd5(Feed $feed) {
		$fullChecksum = $this->download($feed->getChecksumUrl());
		// we got smth like "5776cbd0a95637ade4b2c0d8694d8fca  -"
		//strip trailing space & dash
		return \substr($fullChecksum, 0, 32);
	}

	/**
	 * Read update feed for new releases
	 * @return Feed
	 */
	public function getFeed() {
		$url = $this->getFeedUrl();
		$xml = $this->download($url);
		$tmp = [];
		if ($xml) {
			$loadEntities = \libxml_disable_entity_loader(true);
			$data = @\simplexml_load_string($xml);
			\libxml_disable_entity_loader($loadEntities);
			if ($data !== false) {
				$tmp['version'] = (string) $data->version;
				$tmp['versionstring'] = (string) $data->versionstring;
				$tmp['url'] = (string) $data->url;
				$tmp['web'] = (string) $data->web;
			}
		}

		return new Feed($tmp);
	}

	/**
	 * @return mixed|string
	 */
	public function getUpdateChannel() {
		$channel = $this->configReader->getByPath('apps.core.OC_Channel');
		if ($channel === null) {
			return $this->locator->getChannelFromVersionsFile();
		}

		return $channel;
	}

	/**
	 * Produce complete feed URL
	 * @return string
	 */
	protected function getFeedUrl() {
		$currentVersion = $this->configReader->getByPath('system.version');
		$version = \explode('.', $currentVersion);
		$version['installed'] = $this->configReader->getByPath('apps.core.installedat');
		$version['updated'] = $this->configReader->getByPath('apps.core.lastupdatedat');
		$version['updatechannel'] = $this->getUpdateChannel();
		$version['edition'] = $this->configReader->getEdition();
		$version['build'] = $this->locator->getBuild();

		// Read updater server URL from config
		$updaterServerUrl = $this->configReader->get(['system', 'updater.server.url']);
		if ((bool) $updaterServerUrl === false) {
			$updaterServerUrl = self::DEFAULT_BASE_URL;
		}

		$url = $updaterServerUrl . '?version=' . \implode('x', $version);
		return $url;
	}

	/**
	 * Get URL content
	 * @param string $url
	 * @return string
	 * @throws \UnexpectedValueException
	 */
	protected function download($url) {
		$response = $this->httpClient->request('GET', $url, [RequestOptions::TIMEOUT => 600]);
		$this->validateResponse($response, $url);
		return $response->getBody()->getContents();
	}

	/**
	 * Check if request was successful
	 * @param ResponseInterface $response
	 * @param string $url
	 * @throws \UnexpectedValueException
	 */
	protected function validateResponse(ResponseInterface $response, $url) {
		$statusCode = $response->getStatusCode();
		if ($statusCode !== 200) {
			throw new \UnexpectedValueException(
				"Failed to download $url. Server responded with $statusCode instead of 200."
			);
		}
	}
}
