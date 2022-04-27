<?php
/**
 * @author Juan Pablo Villafáñez Ramos <jvillafanez@owncloud.com>
 *
 * @copyright Copyright (c) 2022, ownCloud GmbH
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

namespace OCA\Files_External\Tests;

use OCP\Security\ICredentialsManager;
use OCP\IConfig;
use OCA\Files_External\Lib\RSAStore;
use phpseclib3\Crypt\RSA;

class RSAStoreTest extends \Test\TestCase {
	/** @var ICredentialsManager */
	private $credentialsManager;
	/** @var IConfig */
	private $config;
	/** @var RSAStore */
	private $rsaStore;

	protected function setUp(): void {
		$this->credentialsManager = $this->createMock(ICredentialsManager::class);
		$this->config = $this->createMock(IConfig::class);
		$this->rsaStore = new RSAStore($this->credentialsManager, $this->config);
	}

	protected function tearDown(): void {
		RSAStore::setGlobalInstance(null);  // reset global instance
	}

	public function testGlobalInstanceNotMocked() {
		$this->assertNotSame($this->rsaStore, RSAStore::getGlobalInstance());
	}

	public function testGlobalInstance() {
		RSAStore::setGlobalInstance($this->rsaStore);
		$this->assertSame($this->rsaStore, RSAStore::getGlobalInstance());
	}

	public function testStoreAndRetrieve() {
		$credentialsHolder = [];

		$userId = '';
		$this->config->method('getSystemValue')
		->will($this->returnValueMap([
			'secret', '', 'itsASecret',
		]));

		$this->credentialsManager->expects($this->once())
			->method('store')
			->with($userId, $this->anything(), $this->anything())
			->will($this->returnCallback(function ($uid, $key, $value) use (&$credentialsHolder) {
				if (!isset($credentialsHolder[$uid])) {
					$credentialsHolder[$uid] = [];
				}
				$credentialsHolder[$uid][$key] = $value;
			}));

		$this->credentialsManager->expects($this->once())
			->method('retrieve')
			->with($userId, $this->anything())
			->will($this->returnCallback(function ($uid, $key) use (&$credentialsHolder) {
				return $credentialsHolder[$uid][$key];
			}));
		$privKey = RSA::createKey();

		$token = $this->rsaStore->storeData($privKey, $userId);
		$this->assertEquals($privKey->toString('PKCS1'), $this->rsaStore->retrieveData($token)->toString('PKCS1'));
	}
}
