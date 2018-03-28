<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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

require __DIR__ . '/../../../../lib/composer/autoload.php';

use GuzzleHttp\Client;

/**
 * Checksum functions
 */
trait Checksums {

	/**
	 * @When user :user uploads file :source to :destination with checksum :checksum using the API
	 * @Given user :user has uploaded file :source to :destination with checksum :checksum
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 * @param string $checksum
	 *
	 * @return void
	 */
	public function userUploadsFileToWithChecksumUsingTheAPI(
		$user, $source, $destination, $checksum
	) {
		$file = \GuzzleHttp\Stream\Stream::factory(fopen($source, 'r'));
		$this->response = $this->makeDavRequest(
			$user,
			'PUT',
			$destination,
			['OC-Checksum' => $checksum],
			$file,
			"files"
		);
	}

	/**
	 * @Then the webdav response should have a status code :statusCode
	 *
	 * @param int $statusCode
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theWebdavResponseShouldHaveAStatusCode($statusCode) {
		if ((int)$statusCode !== $this->response->getStatusCode()) {
			throw new \Exception(
				"Expected $statusCode, got " . $this->response->getStatusCode()
			);
		}
	}

	/**
	 * @When user :user requests the checksum of :path via propfind
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function userRequestsTheChecksumOfViaPropfind($user, $path) {
		$client = new Client();
		$request = $client->createRequest(
			'PROPFIND',
			$this->baseUrlWithSlash() . $this->getDavFilesPath($user) . $path,
			[
				'body' => '<?xml version="1.0"?>
<d:propfind  xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns">
  <d:prop>
    <oc:checksums />
  </d:prop>
</d:propfind>',
				'auth' => $this->getAuthOptionForUser($user)
			]
		);
		$this->response = $client->send($request);
	}

	/**
	 * @Then the webdav checksum should match :checksum
	 *
	 * @param string $checksum
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theWebdavChecksumShouldMatch($checksum) {
		$service = new Sabre\Xml\Service();
		$parsed = $service->parse($this->response->getBody()->getContents());

		/*
		 * Fetch the checksum array
		 * Maybe we want to do this a bit cleaner ;)
		 */
		$checksums = $parsed[0]['value'][1]['value'][0]['value'][0];

		if ($checksums['value'][0]['value'] !== $checksum) {
			throw new \Exception(
				"Expected $checksum, got " . $checksums['value'][0]['value']
			);
		}
	}

	/**
	 * @Then the header checksum should match :checksum
	 *
	 * @param string $checksum
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theHeaderChecksumShouldMatch($checksum) {
		if ($this->response->getHeader('OC-Checksum') !== $checksum) {
			throw new \Exception(
				"Expected $checksum, got " . $this->response->getHeader('OC-Checksum')
			);
		}
	}

	/**
	 * @Then the webdav checksum should be empty
	 *
	 * @return void
	 */
	public function theWebdavChecksumShouldBeEmpty() {
		$service = new Sabre\Xml\Service();
		$parsed = $service->parse($this->response->getBody()->getContents());

		/*
		 * Fetch the checksum array
		 * Maybe we want to do this a bit cleaner ;)
		 */
		$status = $parsed[0]['value'][1]['value'][1]['value'];

		if ($status !== 'HTTP/1.1 404 Not Found') {
			throw new \Exception(
				"Expected 'HTTP/1.1 404 Not Found', got " . $status
			);
		}
	}

	/**
	 * @Then the OC-Checksum header should not be there
	 *
	 * @return void
	 */
	public function theOcChecksumHeaderShouldNotBeThere() {
		if ($this->response->hasHeader('OC-Checksum')) {
			throw new \Exception(
				"Expected no checksum header but got " . $this->response->getHeader('OC-Checksum')
			);
		}
	}

	/**
	 * @When user :user uploads chunk file :num of :total with :data to :destination with checksum :checksum using the API
	 * @Given user :user has uploaded chunk file :num of :total with :data to :destination with checksum :checksum
	 *
	 * @param string $user
	 * @param int $num
	 * @param int $total
	 * @param string $data
	 * @param string $destination
	 * @param string $checksum
	 *
	 * @return void
	 */
	public function userUploadsChunkFileOfWithToWithChecksum(
		$user, $num, $total, $data, $destination, $checksum
	) {
		try {
			$num -= 1;
			$data = \GuzzleHttp\Stream\Stream::factory($data);
			$file = $destination . '-chunking-42-' . $total . '-' . $num;
			$this->response = $this->makeDavRequest(
				$user,
				'PUT',
				$file,
				['OC-Checksum' => $checksum, 'OC-Chunked' => '1'],
				$data,
				"files"
			);
		} catch (\GuzzleHttp\Exception\RequestException $ex) {
			$this->response = $ex->getResponse();
		}
	}
}
