<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\Encryption\Tests\Crypto;

use OCA\Encryption\Crypto\CryptHSM;
use OCA\Encryption\Exceptions\MultiKeyDecryptException;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\Http\Client\IClientService;
use GuzzleHttp\Client;
use OCP\Http\Client\IResponse;
use OCP\IConfig;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IUserSession;
use Test\TestCase;

class CryptHSMTest extends TestCase {
	/** @var IClientService | \PHPUnit\Framework\MockObject\MockObject */
	private $clientService;
	/** @var IRequest | \PHPUnit\Framework\MockObject\MockObject */
	private $request;
	/** @var ITimeFactory | \PHPUnit\Framework\MockObject\MockObject */
	private $timeFactory;
	/** @var ILogger | \PHPUnit\Framework\MockObject\MockObject */
	private $logger;
	/** @var IUserSession | \PHPUnit\Framework\MockObject\MockObject */
	private $userSession;
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;
	/** @var IL10N | \PHPUnit\Framework\MockObject\MockObject */
	private $l10n;
	/** @var CryptHSM */
	private $cryptHSM;
	public function setUp() {
		parent::setUp();
		$this->logger = $this->createMock(ILogger::class);
		$this->userSession = $this->createMock(IUserSession::class);
		$this->config = $this->createMock(IConfig::class);
		$this->l10n = $this->createMock(IL10N::class);
		$this->clientService = $this->createMock(IClientService::class);
		$this->request = $this->createMock(IRequest::class);
		$this->timeFactory = $this->createMock(ITimeFactory::class);
		$this->cryptHSM = new CryptHSM($this->logger, $this->userSession, $this->config,
			$this->l10n, $this->clientService, $this->request, $this->timeFactory);
	}

	public function testCreateKeyPair() {
		$expectedResult = [
			'publicKey' => "-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAxZlOnmM/+WJGyJ7hUaG1
TycA8rOPtt1QDmmW7ML+MOWkKZ6TP9F8Q7buhlyt9O1uR1fy4czoM0uICU5LWQDh
OgNgPwbfvXXuVgNbWtMZsYwaDbobyRbslemEM/hEOl/h1fNKlbv0TLc2+P8ycO9T
ZeTcFCKCrYyNFmdekqufbHf2xMFWekarz8ikAfPwnsIX727TRMCDqUCVfVjBK6do
dZo0ZQeZvutaQdCxYhg8muiQsd6puqv8p1Gp3BOZN5leyN+tAPjIwvyCC5RSc5IU
kgVNdpawkWgQue4WcCmSt/4JGyQuLWcmq4lhEhJBNuFpIAnqlgAjEvwuPRaQLOmc
lQIDAQAB
-----END PUBLIC KEY-----",

			"privateKeyId" => "50b959c0-1d6b-11e9-b127-18dbf216a375"
		];
		$iResponse = $this->createMock(IResponse::class);
		$iResponse->method('getBody')
			->willReturn(\json_encode($expectedResult));

		$client = $this->createMock(Client::class);
		$client->method('post')
			->willReturn($iResponse);

		$this->clientService->method('newClient')
			->willReturn($client);

		$result = $this->cryptHSM->createKeyPair('oc-auth-foo');
		$expectedResult['privateKey'] = $expectedResult['privateKeyId'];
		unset($expectedResult['privateKeyId']);
		$this->assertEquals($expectedResult, $result);
	}

	public function testIsValidPrivateKey() {
		$this->assertTrue($this->invokePrivate($this->cryptHSM, 'isValidPrivateKey', ['foo']));
	}

	public function providesMultiKeyDecrypt() {
		return [
			[false, 'foo', 'abcd'],
			['encKey', 'foo', 'abcd'],
		];
	}
	/**
	 * @dataProvider providesMultiKeyDecrypt
	 * @expectedException OCA\Encryption\Exceptions\MultiKeyDecryptException
	 */
	public function testMultiKeyDecryptExceptions($encKeyFile, $shareKey, $privateKey) {
		if (!$encKeyFile) {
			$this->cryptHSM->multiKeyDecrypt($encKeyFile, $shareKey, $privateKey);
		}

		$expectedResult = [
			"error"
		];

		$iResponse = $this->createMock(IResponse::class);
		if ($encKeyFile === 'encKey') {
			$iResponse->method('getBody')
				->willThrowException(new MultiKeyDecryptException());
		} else {
			$iResponse->method('getBody')
				->willReturn($expectedResult);
		}

		$client = $this->createMock(Client::class);
		$client->method('post')
			->willReturn($iResponse);

		$this->clientService->method('newClient')
			->willReturn($client);

		$this->cryptHSM->multiKeyDecrypt($encKeyFile, $shareKey, $privateKey);
	}

	public function testMultiKeyDecrypt() {
		$cryptHSM = $this->getMockBuilder(CryptHSM::class)
			->setConstructorArgs([$this->logger, $this->userSession, $this->config,
				$this->l10n, $this->clientService, $this->request, $this->timeFactory])
			->setMethods(['symmetricDecryptFileContent'])
			->getMock();

		$iResponse = $this->createMock(IResponse::class);
		$iResponse->method('getBody')
			->willReturn(\json_encode(['foo' => 'bar']));

		$client = $this->createMock(Client::class);
		$client->method('post')
			->willReturn($iResponse);

		$this->clientService->method('newClient')
			->willReturn($client);
		$cryptHSM->method('symmetricDecryptFileContent')
			->willReturn('key');
		$result = $cryptHSM->multiKeyDecrypt('encKeyFile', 'foo', 'abcd');
		$this->assertEquals('key', $result);
	}

	/**
	 * @expectedException OCA\Encryption\Exceptions\MultiKeyEncryptException
	 * @expectedExceptionMessage Could not create sealed content
	 */
	public function testMultiKeyEncryptException() {
		$cryptHSM = $this->getMockBuilder(CryptHSM::class)
			->setConstructorArgs([$this->logger, $this->userSession, $this->config,
				$this->l10n, $this->clientService, $this->request, $this->timeFactory])
			->setMethods(['symmetricEncryptFileContent'])
			->getMock();

		$cryptHSM->method('symmetricEncryptFileContent')
			->willReturn(false);
		$cryptHSM->multiKeyEncrypt('foo bar', ["AAABBBCCC", "AABBCC"]);
	}

	public function testMultiKeyEncrypt() {
		$cryptHSM = $this->getMockBuilder(CryptHSM::class)
			->setConstructorArgs([$this->logger, $this->userSession, $this->config,
				$this->l10n, $this->clientService, $this->request, $this->timeFactory])
			->setMethods(['symmetricEncryptFileContent'])
			->getMock();

		$cryptHSM->method('symmetricEncryptFileContent')
			->willReturn("sealed");
		$result = $cryptHSM->multiKeyEncrypt('foo bar', ["foo" => "-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAmHzD76i8DA25nC+Qsswi
OM0lW+gViiQD4tEm7suxBc2BGibtdlrsprVIId92hSjQKx4x8+XVWU6k89T5vy8Y
txpXN759OWdGkDi8uvZuYclMjW9Rao+oqSvbXH37R7oSY287I+6uOHclGhniQN3q
RyoXBkbhDk0/FTI/i549q/gGk1UZYv449KLrDOqmtohRcIyAYVnvvWtD1kIzourq
hMtEIrPqwoBqTaUA9kOIXw1jMovao2TN52j48KgOg9KjqtdwUwD9e6n7hJd/subF
6woc8L7zjJFOHH5gacUC7vtiMpBpnSyLQpjFLepYYwftjsRmg4xLdh+Zvgw3xqi4
lwIDAQAB
-----END PUBLIC KEY-----"]);
		$this->assertArrayHasKey('keys', $result);
		$this->assertArrayHasKey('data', $result);
		$this->assertEquals('sealed', $result['data']);
	}
}
