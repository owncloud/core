<?php
/**
 * @author Juan Pablo Villafañez <jvillafanez@solidgeargroup.com>
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

namespace Test\User;

use OC\User\SyncLimiter;
use OC\User\AccountMapper;
use OCP\IConfig;
use Test\TestCase;

class SyncLimiterTest extends TestCase {
	/** @var AccountMapper | \PHPUnit\Framework\MockObject\MockObject */
	private $mapper;
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;
	/** @var SyncLimiter | \PHPUnit\Framework\MockObject\MockObject */
	private $syncLimiter;

	protected function setUp() {
		parent::setUp();

		$this->mapper = $this->createMock(AccountMapper::class);
		$this->config = $this->createMock(IConfig::class);

		$this->syncLimiter = new SyncLimiter($this->mapper, $this->config);
	}

	public function testGetLimitInfoCommunity() {
		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['enterprise_key', 'enabled', 'no', 'no'],
				['core', 'user_sync_hard_limit_OCA\User_LDAP\User_Proxy', 100, '100'],
			]));

		$expectedInfo = [
			'OCA\User_LDAP\User_Proxy' => [
				'soft' => 50,
				'hard' => 100,
			],
		];
		$this->assertEquals($expectedInfo, $this->syncLimiter->getLimitInfo());
	}

	public function testGetLimitInfoCommunityCustom() {
		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['enterprise_key', 'enabled', 'no', 'no'],
				['core', 'user_sync_hard_limit_OCA\User_LDAP\User_Proxy', 100, '150'],
			]));

		$expectedInfo = [
			'OCA\User_LDAP\User_Proxy' => [
				'soft' => 50,
				'hard' => 150,
			],
		];
		$this->assertEquals($expectedInfo, $this->syncLimiter->getLimitInfo());
	}

	public function testGetLimitInfoEnterprise() {
		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['enterprise_key', 'enabled', 'no', 'yes'],
				['core', 'user_sync_hard_limit_OCA\User_LDAP\User_Proxy', 100, '100'],
			]));

		$expectedInfo = [
			'OCA\User_LDAP\User_Proxy' => false,
		];
		$this->assertEquals($expectedInfo, $this->syncLimiter->getLimitInfo());
	}

	public function testLimitEnabledUsersCommunity() {
		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['enterprise_key', 'enabled', 'no', 'no'],
				['core', 'user_sync_hard_limit_OCA\User_LDAP\User_Proxy', 100, '100'],
			]));

		$this->mapper->expects($this->once())
			->method('ensureMaximumEnabledUsersForBackend')
			->withConsecutive(
				['OCA\User_LDAP\User_Proxy', 100]
			)
			->willReturn(50);

		$expectedInfo = [
			'OCA\User_LDAP\User_Proxy' => [
				'switchTo' => 'disabled',
				'changes' => 50,
			],
		];
		$this->assertEquals($expectedInfo, $this->syncLimiter->limitEnabledUsers());
	}

	public function testLimitEnabledUsersCommunityCustom() {
		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['enterprise_key', 'enabled', 'no', 'no'],
				['core', 'user_sync_hard_limit_OCA\User_LDAP\User_Proxy', 100, '200'],
			]));

		$this->mapper->expects($this->once())
			->method('ensureMaximumEnabledUsersForBackend')
			->withConsecutive(
				['OCA\User_LDAP\User_Proxy', 200]
			)
			->willReturn(45);

		$expectedInfo = [
			'OCA\User_LDAP\User_Proxy' => [
				'switchTo' => 'disabled',
				'changes' => 45,
			],
		];
		$this->assertEquals($expectedInfo, $this->syncLimiter->limitEnabledUsers());
	}

	public function testLimitEnabledUsersEnterprise() {
		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['enterprise_key', 'enabled', 'no', 'yes'],
				['core', 'user_sync_hard_limit_OCA\User_LDAP\User_Proxy', 100, '100'],
			]));

		$this->mapper->expects($this->once())
			->method('enableAutoDisabledUsers')
			->withConsecutive(
				['OCA\User_LDAP\User_Proxy']
			)
			->willReturn(133);

		$expectedInfo = [
			'OCA\User_LDAP\User_Proxy' => [
				'switchTo' => 'enabled',
				'changes' => 133,
			],
		];
		$this->assertEquals($expectedInfo, $this->syncLimiter->limitEnabledUsers());
	}
}
