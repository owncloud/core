<?php
/**
 * ownCloud
 *
 * @author Saugat Pachhai <saugat@jankaritech.com>
 * @copyright Copyright (c) 2018 Saugat Pachhai saugat@jankaritech.com
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

use TestHelpers\DeleteHelper;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;

/**
 * Unit tests for TestHelpers\DeleteHelper;
 */
class DeleteHelperTest extends PHPUnit\Framework\TestCase {
	private $container = [];

	/**
	 * Setup http client, mock requests, and attach history
	 *
	 * @return void
	 */
	public function setUp() {
		$mock = new MockHandler(
			[ new Response(204, [])]
		);
		$handler = HandlerStack::create($mock);
		$history = Middleware::history($this->container);
		$handler->push($history);

		$this->client = new Client(['handler' => $handler]);
	}

	/**
	 * Test DeleteHelper creates url with older version of DAV
	 *
	 * @return void
	 */
	public function testDeleteHelperWithOlderDavVersion() {
		$response = DeleteHelper::delete(
			'http://localhost',
			'user',
			'password',
			'secret/file.txt',
			[],
			1,
			null,
			$this->client
		);

		/**
		 * @var Request $lastRequest
		 */
		$lastRequest = $this->container[0]['request'];
		$this->assertEquals(
			'http://localhost/remote.php/webdav/secret/file.txt',
			$lastRequest->getUri()
		);
		$this->assertEquals('DELETE', $lastRequest->getMethod());
		$this->assertEquals('', $lastRequest->getBody()->getContents());

		$this->assertEquals(
			['Basic ' . \base64_encode('user:password')],
			$lastRequest->getHeaders()["Authorization"]
		);
	}

	/**
	 * Test DeleteHelper creates url with newer version of DAV
	 *
	 * @return void
	 */
	public function testDeleteHelperWithNewerDavVersion() {
		$response = DeleteHelper::delete(
			'http://localhost',
			'user',
			'password',
			'secret/file.txt',
			[],
			2,
			null,
			$this->client
		);

		/**
		 * @var Request $lastRequest
		 */
		$lastRequest = $this->container[0]['request'];
		$this->assertEquals(
			'http://localhost/remote.php/dav/files/user/secret/file.txt',
			$lastRequest->getUri()
		);
		$this->assertEquals('DELETE', $lastRequest->getMethod());
		$this->assertEquals('', $lastRequest->getBody()->getContents());

		$this->assertEquals(
			['Basic ' . \base64_encode('user:password')],
			$lastRequest->getHeaders()["Authorization"]
		);
	}

	/**
	 * Test DeleteHelper sends correct headers
	 *
	 * @return void
	 */
	public function testDeleteHelperSendsWithGivenHeaders() {
		$headers = ["Cache-Control" => "no-cache"];
		$response = DeleteHelper::delete(
			'http://localhost',
			'user',
			'password',
			'secret/file.txt',
			$headers,
			1,
			null,
			$this->client
		);

		/**
		 * @var Request $lastRequest
		 */
		$lastRequest = $this->container[0]['request'];

		$this->assertArrayHasKey("Cache-Control", $lastRequest->getHeaders());
		// Guzzle adds it to the array
		$this->assertEquals(["no-cache"], $lastRequest->getHeaders()["Cache-Control"]);
	}
}
