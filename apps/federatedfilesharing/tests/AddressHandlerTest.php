<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\FederatedFileSharing\Tests;

use OCA\FederatedFileSharing\AddressHandler;
use OCP\IL10N;
use OCP\IURLGenerator;

class AddressHandlerTest extends \Test\TestCase {

	/** @var  AddressHandler */
	private $addressHandler;

	/** @var  IURLGenerator | \PHPUnit\Framework\MockObject\MockObject */
	private $urlGenerator;

	/** @var  IL10N | \PHPUnit\Framework\MockObject\MockObject */
	private $il10n;

	public function setUp(): void {
		parent::setUp();

		$this->urlGenerator = $this->createMock('OCP\IURLGenerator');
		$this->il10n = $this->createMock('OCP\IL10N');

		$this->addressHandler = new AddressHandler($this->urlGenerator, $this->il10n);
	}

	public function dataTestSplitUserRemote() {
		$userPrefix = ['user@name', 'username'];
		$protocols = ['', 'http://', 'https://'];
		$remotes = [
			'localhost',
			'local.host',
			'dev.local.host',
			'dev.local.host/path',
			'dev.local.host/at@inpath',
			'127.0.0.1',
			'::1',
			'::192.0.2.128',
			'::192.0.2.128/at@inpath',
		];

		$testCases = [];
		foreach ($userPrefix as $user) {
			foreach ($remotes as $remote) {
				foreach ($protocols as $protocol) {
					$baseUrl = $user . '@' . $protocol . $remote;

					$testCases[] = [$baseUrl, $user, $protocol . $remote];
					$testCases[] = [$baseUrl . '/', $user, $protocol . $remote];
					$testCases[] = [$baseUrl . '/index.php', $user, $protocol . $remote];
					$testCases[] = [$baseUrl . '/index.php/s/token', $user, $protocol . $remote];
				}
			}
		}
		return $testCases;
	}

	/**
	 * @dataProvider dataTestSplitUserRemote
	 *
	 * @param string $remote
	 * @param string $expectedUser
	 * @param string $expectedUrl
	 */
	public function testSplitUserRemote($remote, $expectedUser, $expectedUrl) {
		list($remoteUser, $remoteUrl) = $this->addressHandler->splitUserRemote($remote);
		$this->assertSame($expectedUser, $remoteUser);
		$this->assertSame($expectedUrl, $remoteUrl);
	}

	public function dataTestSplitUserRemoteError() {
		return [
			// Invalid path
			['user@'],

			// Invalid user
			['@server'],
			['us/er@server'],
			['us:er@server'],

			// Invalid splitting
			['user'],
			[''],
			['us/erserver'],
			['us:erserver'],
		];
	}

	/**
	 * @dataProvider dataTestSplitUserRemoteError
	 *
	 * @param string $id
	 * @expectedException \OC\HintException
	 */
	public function testSplitUserRemoteError($id) {
		$this->addressHandler->splitUserRemote($id);
	}

	/**
	 * @dataProvider dataTestRemoveProtocolFromUrl
	 *
	 * @param string $url
	 * @param string $expectedResult
	 */
	public function testRemoveProtocolFromUrl($url, $expectedResult) {
		$result = $this->addressHandler->removeProtocolFromUrl($url);
		$this->assertSame($expectedResult, $result);
	}

	public function dataTestRemoveProtocolFromUrl() {
		return [
			['http://owncloud.org', 'owncloud.org'],
			['https://owncloud.org', 'owncloud.org'],
			['owncloud.org', 'owncloud.org'],
		];
	}

	/**
	 * @dataProvider dataTestFixRemoteUrl
	 *
	 * @param string $url
	 * @param string $expected
	 */
	public function testFixRemoteUrl($url, $expected) {
		$this->assertSame($expected,
			$this->invokePrivate($this->addressHandler, 'fixRemoteURL', [$url])
		);
	}

	public function dataTestFixRemoteUrl() {
		return [
			['http://localhost', 'http://localhost'],
			['http://localhost/', 'http://localhost'],
			['http://localhost/index.php', 'http://localhost'],
			['http://localhost/index.php/s/AShareToken', 'http://localhost'],
		];
	}
}
