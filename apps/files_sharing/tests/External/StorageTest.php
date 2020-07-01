<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

namespace OCA\Files_Sharing\Tests\External;

use OCA\Files_Sharing\External\Manager;
use OCA\Files_Sharing\External\Storage;
use OCP\ICertificateManager;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;

/**
 * Class StorageTest
 *
 * @group DB
 *
 * @package OCA\Files_Sharing\Tests\External
 */
class StorageTest extends TestCase {
	/** @var Manager | MockObject */
	private $manager;

	/** @var ICertificateManager|MockObject  */
	protected $certManager;

	/** @var Storage  */
	protected $storage;

	public function endpointDataProvider() {
		return [
			['localhost', false],
			['localhost/', false],
			['localhost/url', false],
			['http://localhost', true],
			['http://localhost/', true],
			['http://localhost/url', true],
			['https://localhost', true],
			['https://localhost/', true],
			['https://localhost/url', true],
		];
	}

	/**
	 * @dataProvider endpointDataProvider
	 * @param string $endpoint
	 * @param bool $isOcm
	 */
	public function testIsOcmEndpoint($endpoint, $isOcm) {
		$this->storage = $this->createMock(Storage::class);
		$isOcmEndpoint = $this->invokePrivate($this->storage, 'isOcmWebDavEndpoint', [$endpoint]);
		$this->assertEquals($isOcm, $isOcmEndpoint);
	}

	public function ocmUrlDataProvider() {
		return [
			['http://localhost', false, 'localhost', ''],
			['http://localhost/', false, 'localhost', '/'],
			['http://localhost/url', false, 'localhost', '/url'],
			['https://localhost', true, 'localhost', ''],
			['https://localhost/', true, 'localhost', '/'],
			['https://localhost/url', true, 'localhost', '/url'],
		];
	}

	/**
	 * @dataProvider ocmUrlDataProvider
	 * @param string $endpoint
	 * @param bool $secure
	 * @param string $host
	 * @param string $root
	 */
	public function testParseOcmUrl($endpoint, $secure, $host, $root) {
		$this->storage = $this->createMock(Storage::class);
		$ocmParams = $this->invokePrivate($this->storage, 'parseOcmUrl', [$endpoint]);
		$this->assertEquals($secure, $ocmParams['secure']);
		$this->assertEquals($host, $ocmParams['host']);
		$this->assertEquals($root, $ocmParams['root']);
	}
}
