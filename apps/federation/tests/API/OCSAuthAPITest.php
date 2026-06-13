<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@users.noreply.github.com>
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

namespace OCA\Federation\Tests\API;

use OC\BackgroundJob\JobList;
use OCA\Federation\Controller\OCSAuthAPIController;
use OCA\Federation\DbHandler;
use OCA\Federation\TrustedServers;
use OCP\AppFramework\Http;
use OCP\ILogger;
use OCP\IRequest;
use OCP\Security\ISecureRandom;
use Test\TestCase;

class OCSAuthAPITest extends TestCase {
	/** @var \PHPUnit\Framework\MockObject\MockObject | IRequest */
	private $request;

	/** @var \PHPUnit\Framework\MockObject\MockObject | ISecureRandom  */
	private $secureRandom;

	/** @var \PHPUnit\Framework\MockObject\MockObject | JobList */
	private $jobList;

	/** @var \PHPUnit\Framework\MockObject\MockObject | TrustedServers */
	private $trustedServers;

	/** @var \PHPUnit\Framework\MockObject\MockObject | DbHandler */
	private $dbHandler;

	/** @var \PHPUnit\Framework\MockObject\MockObject | ILogger */
	private $logger;

	/** @var  OCSAuthAPIController */
	private $ocsAuthApi;

	public function setUp(): void {
		parent::setUp();

		$this->request = $this->createMock(IRequest::class);
		$this->secureRandom = $this->createMock(ISecureRandom::class);
		$this->trustedServers = $this->getMockBuilder(TrustedServers::class)
			->disableOriginalConstructor()->getMock();
		$this->dbHandler = $this->getMockBuilder(DbHandler::class)
			->disableOriginalConstructor()->getMock();
		$this->jobList = $this->getMockBuilder(JobList::class)
			->disableOriginalConstructor()->getMock();
		$this->logger = $this->getMockBuilder(ILogger::class)
			->disableOriginalConstructor()->getMock();

		$this->ocsAuthApi = new OCSAuthAPIController(
			'federation',
			$this->request,
			$this->secureRandom,
			$this->jobList,
			$this->trustedServers,
			$this->dbHandler,
			$this->logger
		);
	}

	/**
	 * @dataProvider dataTestRequestSharedSecret
	 *
	 * @param string $token
	 * @param string $localToken
	 * @param bool $isTrustedServer
	 * @param int $expected
	 */
	public function testRequestSharedSecret($token, $localToken, $isTrustedServer, $expected) {
		$url = 'url';

		$this->trustedServers
			->expects($this->once())
			->method('isTrustedServer')->with($url)->willReturn($isTrustedServer);
		$this->dbHandler->expects($this->any())
			->method('getToken')->with($url)->willReturn($localToken);

		if ($expected === Http::STATUS_OK) {
			$this->jobList->expects($this->once())->method('add')
				->with('OCA\Federation\BackgroundJob\GetSharedSecret', ['url' => $url, 'token' => $token]);
			$this->jobList->expects($this->once())->method('remove')
				->with('OCA\Federation\BackgroundJob\RequestSharedSecret', ['url' => $url, 'token' => $localToken]);
		} else {
			$this->jobList->expects($this->never())->method('add');
			$this->jobList->expects($this->never())->method('remove');
		}

		$result = $this->ocsAuthApi->requestSharedSecret($url, $token);
		$this->assertSame($expected, $result['statuscode']);
	}

	public function dataTestRequestSharedSecret() {
		// Token pairs are chosen so that hash('sha256', $token) vs hash('sha256', $localToken)
		// ordering matches the expected response.  Using raw strcmp() on the tokens
		// would give different results for the first two cases, which is exactly the
		// behaviour that the oracle-prevention fix changes.
		//
		// Case 1: hash(token) > hash(localToken) => remote wins, we schedule GetSharedSecret => 200
		//   token=0eihx/zCxwyV  localToken=hgSXvmcFnOp+
		//   strcmp(token, localToken) < 0  (old code would return 403, NEW code returns 200)
		//
		// Case 2: hash(token) < hash(localToken) => we win, remote backs off => 403
		//   token=Dvu0e+f+cC5F  localToken=FBv96rzfQZB0
		//   strcmp(token, localToken) < 0  (both old and new code agree here)
		//
		// Case 3: server not trusted => always 403 regardless of tokens
		return [
			['0eihx/zCxwyV', 'hgSXvmcFnOp+', true, Http::STATUS_OK],
			['Dvu0e+f+cC5F', 'FBv96rzfQZB0', false, Http::STATUS_FORBIDDEN],
			['Dvu0e+f+cC5F', 'FBv96rzfQZB0', true, Http::STATUS_FORBIDDEN],
		];
	}

	/**
	 * Regression test: the old strcmp()-based comparison leaked ordering information
	 * about the stored localToken to unauthenticated callers (binary search oracle).
	 *
	 * This test uses a concrete token pair where strcmp(localToken, token) > 0
	 * (old code would return 403) but strcmp(hash(localToken), hash(token)) <= 0
	 * (new code returns 200), demonstrating that the fix changes the behaviour
	 * for cases that would have been exploitable as an oracle while still
	 * producing the correct deterministic tiebreak result.
	 *
	 * Without the fix this test would return STATUS_FORBIDDEN for a case where
	 * the hash-based comparison says the remote server's token wins.
	 */
	public function testRequestSharedSecretNoOracleLeakage() {
		// strcmp('DD7EOAhPjsziDBGa', '/Ewru/vr674cUicB') = 21  (localToken > token, old code: 403)
		// strcmp(hash256('DD7EOAhPjsziDBGa'), hash256('/Ewru/vr674cUicB')) = -48 (new code: 200)
		$url        = 'https://remote.example.com';
		$localToken = 'DD7EOAhPjsziDBGa';
		$token      = '/Ewru/vr674cUicB';

		$this->trustedServers
			->expects($this->once())
			->method('isTrustedServer')->with($url)->willReturn(true);
		$this->dbHandler
			->expects($this->any())
			->method('getToken')->with($url)->willReturn($localToken);

		// With the fix the hash of $token > hash of $localToken, so the remote server
		// wins the tiebreak and we must schedule GetSharedSecret (=> 200).
		$this->jobList->expects($this->once())->method('add')
			->with('OCA\Federation\BackgroundJob\GetSharedSecret', ['url' => $url, 'token' => $token]);
		$this->jobList->expects($this->once())->method('remove')
			->with('OCA\Federation\BackgroundJob\RequestSharedSecret', ['url' => $url, 'token' => $localToken]);

		$result = $this->ocsAuthApi->requestSharedSecret($url, $token);
		$this->assertSame(Http::STATUS_OK, $result['statuscode']);
	}

	/**
	 * @dataProvider dataTestGetSharedSecret
	 *
	 * @param bool $isTrustedServer
	 * @param bool $isValidToken
	 * @param int $expected
	 */
	public function testGetSharedSecret($isTrustedServer, $isValidToken, $expected) {
		$url = 'url';
		$token = 'token';

		/** @var OCSAuthAPIController | \PHPUnit\Framework\MockObject\MockObject $ocsAuthApi */
		$ocsAuthApi = $this->getMockBuilder(OCSAuthAPIController::class)
			->setConstructorArgs(
				[
					'federation',
					$this->request,
					$this->secureRandom,
					$this->jobList,
					$this->trustedServers,
					$this->dbHandler,
					$this->logger
				]
			)->setMethods(['isValidToken'])->getMock();

		$this->trustedServers
			->expects($this->any())
			->method('isTrustedServer')->with($url)->willReturn($isTrustedServer);
		$ocsAuthApi->expects($this->any())
			->method('isValidToken')->with($url, $token)->willReturn($isValidToken);

		if ($expected === Http::STATUS_OK) {
			$this->secureRandom->expects($this->once())->method('generate')->with(32)
				->willReturn('secret');
			$this->trustedServers->expects($this->once())
				->method('addSharedSecret')->willReturn($url, 'secret');
			$this->dbHandler->expects($this->once())
				->method('addToken')->with($url, '');
		} else {
			$this->secureRandom->expects($this->never())->method('getMediumStrengthGenerator');
			$this->secureRandom->expects($this->never())->method('generate');
			$this->trustedServers->expects($this->never())->method('addSharedSecret');
			$this->dbHandler->expects($this->never())->method('addToken');
		}

		$result = $ocsAuthApi->getSharedSecret($url, $token);

		$this->assertSame($expected, $result['statuscode']);

		if ($expected === Http::STATUS_OK) {
			$data =  $result['data'];
			$this->assertSame('secret', $data['sharedSecret']);
		}
	}

	public function dataTestGetSharedSecret() {
		return [
			[true, true, Http::STATUS_OK],
			[false, true, Http::STATUS_FORBIDDEN],
			[true, false, Http::STATUS_FORBIDDEN],
			[false, false, Http::STATUS_FORBIDDEN],
		];
	}

	/**
	 * @dataProvider dataTestIsTokenValid
	 */
	public function testIsTokenValid($storedToken, $requestToken): void {
		$url = 'url';

		/** @var OCSAuthAPIController | \PHPUnit\Framework\MockObject\MockObject $ocsAuthApi */
		$ocsAuthApi = $this->getMockBuilder(OCSAuthAPIController::class)
			->setConstructorArgs(
				[
					'federation',
					$this->request,
					$this->secureRandom,
					$this->jobList,
					$this->trustedServers,
					$this->dbHandler,
					$this->logger
				]
			)->getMock();

		$this->dbHandler
			->method('getToken')->willReturn($storedToken);

		$result = $ocsAuthApi->isValidToken($url, $requestToken);
		$this->assertFalse($result);
	}

	public function dataTestIsTokenValid(): \Generator {
		yield 'no match' => ['xxx', 'yyy'];
		yield 'empty token stored' => ['', 'yyy'];
		yield 'null token stored' => [null, 'yyy'];
		yield 'empty token requested' => ['xxx', ''];
		yield 'null token requested' => ['xxx', null];
	}

}
