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

use TestHelpers\WebDavHelper;
use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Subscriber\History;

/**
 * Test for WebDavHelper
 */
class WebDavHelperTest extends PHPUnit\Framework\TestCase {
	/**
	 * Setup mock response, client and listen for all requests
	 * through history.
	 *
	 * @return void
	 */
	public function setUp(): void {
		// mocks is not used, but is required. Else it will try to
		// contact original server and will fail our tests.
		$mock = new Mock(
			[new Response(200, []),]
		);

		$this->client = new Client();
		$this->history = new History();

		$this->client->getEmitter()->attach($mock);
		$this->client->getEmitter()->attach($this->history);
	}

	/**
	 * Test that the url is sanitized correctly when makeDavRequest is called
	 * for newer Dav path
	 *
	 * @return void
	 */
	public function testUrlIsSanitizedByMakeDavRequestForNewerDav() {
		$response = WebDavHelper::makeDavRequest(
			'http://own.cloud///core',
			'user1',
			'pass',
			'GET',
			'folder///file.txt',
			[],
			null,
			null,
			1,
			"files",
			null,
			"basic",
			false,
			0,
			$this->client
		);

		$lastRequest = $this->history->getLastRequest();

		$this->assertEquals(
			'http://own.cloud/core/remote.php/webdav/folder/file.txt',
			$lastRequest->getUrl()
		);
		$this->assertEquals('GET', $lastRequest->getMethod());
		$this->assertEquals(
			['Basic ' . \base64_encode('user1:pass')],
			$lastRequest->getHeaders()["Authorization"]
		);
	}

	/**
	 * Test that the url is sanitized correctly when makeDavRequest is called
	 * for older Dav path
	 *
	 * @return void
	 */
	public function testUrlIsSanitizedByMakeDavRequestForOlderDavPath() {
		$response = WebDavHelper::makeDavRequest(
			'http://own.cloud///core',
			'user1',
			'pass',
			'GET',
			'folder///file.txt/',
			[],
			null,
			null,
			2,
			"files",
			null,
			"basic",
			false,
			0,
			$this->client
		);

		$lastRequest = $this->history->getLastRequest();

		$this->assertEquals(
			'http://own.cloud/core/remote.php/dav/files/user1/folder/file.txt',
			$lastRequest->getUrl()
		);
		$this->assertEquals('GET', $lastRequest->getMethod());
	}

	/**
	 * Test that makeDavRequest replaces hashes and asterisks on url.
	 * Guzzle doesn't do that, we replace manually there.
	 *
	 * @return void
	 */
	public function testMakeDavRequestReplacesAsteriskAndHashesOnUrls() {
		$response = WebDavHelper::makeDavRequest(
			'http://own.cloud///core',
			'user1',
			'pass',
			'GET',
			'folder/file?q=hello#newfile',
			["Destination" => 'http://own.cloud/core?q="my files"#L133'],
			null,
			null,
			2,
			"files",
			null,
			"basic",
			false,
			0,
			$this->client
		);

		$lastRequest = $this->history->getLastRequest();

		$this->assertEquals(
			'http://own.cloud/core/remote.php/dav/files/user1/folder/file%3Fq=hello%23newfile',
			$lastRequest->getUrl()
		);

		// not just the link, but `Destination` header should have also been replaced
		$this->assertEquals(
			['http://own.cloud/core%3Fq="my files"%23L133'],
			$lastRequest->getHeaders()["Destination"]
		);
	}

	/**
	 * Test that makeDavRequest sets Authorization header with correct
	 * bearer password when authType is set to "bearer"
	 *
	 * @return void
	 */
	public function testMakeDavRequestOnBearerAuthorization() {
		$response = WebDavHelper::makeDavRequest(
			'http://own.cloud/core',
			'user1',
			'pass',
			'GET',
			'folder',
			[],
			null,
			null,
			2,
			"files",
			null,
			"bearer",
			false,
			0,
			$this->client
		);

		$lastRequest = $this->history->getLastRequest();

		// no way to know that $user and $password is set to null, except confirming that
		// the Authorization is `Bearer`. If it would have gotten username and password,
		// it would have been `Basic`.
		$this->assertEquals(['Bearer pass'], $lastRequest->getHeaders()["Authorization"]);
	}

	/**
	 * Test that sanitizeUrl does not add trailing slash by default
	 * i.e. default is false
	 *
	 * @dataProvider withoutTrailingSlashUrlsProvider
	 *
	 * @param string $unsanitizedUrl
	 * @param string $expectedUrl
	 *
	 * @return void
	 */
	public function testSantizationOnDefault($unsanitizedUrl, $expectedUrl) {
		$sanitizedUrl = WebDavHelper::sanitizeUrl($unsanitizedUrl);
		$this->assertEquals($expectedUrl, $sanitizedUrl);
	}

	/**
	 * Test that sanitizeUrl does not add trailing slash when set to false.
	 *
	 * @dataProvider withoutTrailingSlashUrlsProvider
	 *
	 * @param string $unsanitizedUrl
	 * @param string $expectedUrl
	 *
	 * @return void
	 */
	public function testSanitizationWhenTrailingSlashIsSetToFalse($unsanitizedUrl, $expectedUrl) {
		$sanitizedUrl = WebDavHelper::sanitizeUrl($unsanitizedUrl, false);
		$this->assertEquals($expectedUrl, $sanitizedUrl);
	}

	/**
	 * Test that sanitizeUrl adds a trailing slash when set to true.
	 *
	 * @dataProvider withTrailingSlashUrlsProvider
	 *
	 * @param string $unsanitizedUrl
	 * @param string $expectedUrl
	 *
	 * @return void
	 */
	public function testSanitizationWhenTrailingSlashIsSetToTrue($unsanitizedUrl, $expectedUrl) {
		$sanitizedUrl = WebDavHelper::sanitizeUrl($unsanitizedUrl, true);
		$this->assertEquals($expectedUrl, $sanitizedUrl);
	}

	/**
	 * Test getDavPath returns correct url when for older dav path
	 *
	 * @return void
	 */
	public function testGetDavPathForOlderDavVersion() {
		$davPath = WebDavHelper::getDavPath('user1', 1);
		$this->assertEquals($davPath, 'remote.php/webdav/');

		// we don't need `user` to generate url for older dav path
		$davPath = WebDavHelper::getDavPath(null, 1);
		$this->assertEquals($davPath, 'remote.php/webdav/');

		// version 1 should be default
		$davPath = WebDavHelper::getDavPath(null);
		$this->assertEquals($davPath, 'remote.php/webdav/');
	}

	/**
	 * Test getDavPath returns correct url for newer dav path
	 *
	 * @return void
	 */
	public function testGetDavPathForNewerDavPath() {
		// `type` should be `files` by default.
		// check that both returns same thing.
		$davPath = WebDavHelper::getDavPath('user1', 2);
		$this->assertEquals($davPath, 'remote.php/dav/files/user1/');

		$davPath = WebDavHelper::getDavPath('user1', 2, 'files');
		$this->assertEquals($davPath, 'remote.php/dav/files/user1/');
	}

	/**
	 * Test getDavPath returns correct url when $types is set to others
	 * except for `files`
	 *
	 * @return void
	 */
	public function testGetDavPathForNewerDavPathButNotForFiles() {
		$davPath = WebDavHelper::getDavPath('user1', 2, null);
		$this->assertEquals($davPath, 'remote.php/dav');

		$davPath = WebDavHelper::getDavPath('user1', 2, 'not_files');
		$this->assertEquals($davPath, 'remote.php/dav');
	}

	/**
	 * Test getDavPath should throw exception with correct message on
	 * invalid DAV version
	 *
	 * @return void
	 */
	public function testGetDavPathForInvalidVersionsShouldThrowException() {
		$this->expectException(InvalidArgumentException::class);
		$this->expectExceptionMessage("DAV path version 3 is unknown");

		$davPath = WebDavHelper::getDavPath(null, 3);
	}

	/**
	 * Provide data with array of unsanitized and sanitized urls without trailing
	 * slash
	 *
	 * @return array
	 */
	public function withoutTrailingSlashUrlsProvider() {
		return [
			['http://own.cloud/', 'http://own.cloud'],
			['http://own.cloud//index.php', 'http://own.cloud/index.php'],
			['http://own.cloud//index.php//url', 'http://own.cloud/index.php/url'],
			['http://own.cloud/login//login//', 'http://own.cloud/login/login'],
			['http://own.cloud/login///login//', 'http://own.cloud/login/login'],

			// get query should not have been sanitized
			[
				'http://own.cloud/login?redirect=//two.cloud//files',
				'http://own.cloud/login?redirect=/two.cloud/files'
			]
		];
	}

	/**
	 * Provide data with array of unsanitized and sanitized urls with trailing
	 * slash
	 *
	 * @return void
	 */
	public function withTrailingSlashUrlsProvider() {
		return [
			['http://own.cloud/', 'http://own.cloud/'],
			['http://own.cloud', 'http://own.cloud/'],
			['http://own.cloud//index.php', 'http://own.cloud/index.php/'],
			['http://own.cloud//index.php//url/', 'http://own.cloud/index.php/url/'],
			['http://own.cloud/login//login//', 'http://own.cloud/login/login/'],
			['http://own.cloud/login///login//', 'http://own.cloud/login/login/'],

			// get query should not have been sanitized
			[
				'http://own.cloud/login?redirect=//two.cloud//files',
				'http://own.cloud/login?redirect=/two.cloud/files/'
			]
		];
	}
}
