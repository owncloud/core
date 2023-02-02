<?php
/**
 * @copyright Copyright (c) 2023, ownCloud GmbH
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

namespace Test\Authentication\LoginPolicies;

use OCP\IGroupManager;
use OCP\IConfig;
use OCP\IL10N;
use OCP\IUser;
use OC\Authentication\LoginPolicies\GroupLoginPolicy;
use OC\User\LoginException;
use Test\TestCase;

class GroupLoginPolicyTest extends TestCase {
	/** @var IGroupManager */
	private $groupManager;
	/** @var IConfig */
	private $config;
	/** @var IL10N */
	private $l10n;
	/** @var GroupLoginPolicy */
	private $groupLoginPolicy;

	protected function setUp(): void {
		parent::setUp();

		$this->groupManager = $this->createMock(IGroupManager::class);
		$this->config = $this->createMock(IConfig::class);
		$this->l10n = $this->createMock(IL10N::class);

		$this->groupLoginPolicy = new GroupLoginPolicy($this->groupManager, $this->config, $this->l10n);
	}

	public function testCheckPolicyWrongConfig() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('myuserid');

		$this->assertTrue($this->groupLoginPolicy->checkPolicy('customLogin', $user));
	}

	public function testCheckPolicyNoConfig() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('myuserid');

		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('loginPolicy.groupLoginPolicy.forbidMap', [])
			->willReturn([]);

		$this->assertTrue($this->groupLoginPolicy->checkPolicy('customLogin', $user));
	}

	public function testCheckPolicyNoMatchingConfig() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('myuserid');

		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('loginPolicy.groupLoginPolicy.forbidMap', [])
			->willReturn([
				'anotherLogin' => [
					'reject' => ['g1'],
				],
			]);

		$this->assertTrue($this->groupLoginPolicy->checkPolicy('customLogin', $user));
	}

	public function testCheckPolicyInRejectGroup() {
		$this->expectException(LoginException::class);

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('myuserid');

		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('loginPolicy.groupLoginPolicy.forbidMap', [])
			->willReturn([
				'customLogin' => [
					'reject' => ['g1', 'g2'],
				],
			]);

		$this->groupManager->method('isInGroup')
			->will($this->returnCallback(function ($userid, $groupid) {
				return $userid === 'myuserid' && $groupid === 'g2';
			}));

		$this->groupLoginPolicy->checkPolicy('customLogin', $user);
	}

	public function testCheckPolicyNotInRejectGroup() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('myuserid');

		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('loginPolicy.groupLoginPolicy.forbidMap', [])
			->willReturn([
				'customLogin' => [
					'reject' => ['g1', 'g2'],
				],
			]);

		$this->groupManager->method('isInGroup')->willReturn(false);

		$this->assertTrue($this->groupLoginPolicy->checkPolicy('customLogin', $user));
	}

	public function testCheckPolicyInAllowOnlyGroup() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('myuserid');

		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('loginPolicy.groupLoginPolicy.forbidMap', [])
			->willReturn([
				'customLogin' => [
					'allowOnly' => ['g1', 'g2'],
				],
			]);

		$this->groupManager->method('isInGroup')
			->will($this->returnCallback(function ($userid, $groupid) {
				return $userid === 'myuserid' && $groupid === 'g2';
			}));

		$this->assertTrue($this->groupLoginPolicy->checkPolicy('customLogin', $user));
	}

	public function testCheckPolicyNotInAllowOnlyGroup() {
		$this->expectException(LoginException::class);

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('myuserid');

		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('loginPolicy.groupLoginPolicy.forbidMap', [])
			->willReturn([
				'customLogin' => [
					'allowOnly' => ['g1', 'g2'],
				],
			]);

		$this->groupManager->method('isInGroup')->willReturn(false);

		$this->groupLoginPolicy->checkPolicy('customLogin', $user);
	}

	public function testCheckPolicyInRejectAndAllowOnlyGroup() {
		$this->expectException(LoginException::class);

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('myuserid');

		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('loginPolicy.groupLoginPolicy.forbidMap', [])
			->willReturn([
				'customLogin' => [
					'reject' => ['g3'],
					'allowOnly' => ['g1', 'g2'],
				],
			]);

		$this->groupManager->method('isInGroup')
			->will($this->returnCallback(function ($userid, $groupid) {
				return $userid === 'myuserid' && ($groupid === 'g2' || $groupid === 'g3');
			}));

		$this->groupLoginPolicy->checkPolicy('customLogin', $user);
	}
}
