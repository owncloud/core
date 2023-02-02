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

use OCP\ILogger;
use OCP\IConfig;
use OCP\IL10N;
use OCP\IUser;
use OCP\Authentication\LoginPolicies\ILoginPolicy;
use OC\Authentication\LoginPolicies\LoginPolicyManager;
use OC\User\LoginException;
use Test\TestCase;

class LoginPolicyManagerTest extends TestCase {
	/** @var IConfig */
	private $config;
	/** @var ILogger */
	private $logger;
	/** @var IL10N */
	private $l10n;
	/** @var LoginPolicyManager */
	private $loginPolicyManager;

	protected function setUp(): void {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->l10n = $this->createMock(IL10N::class);

		$this->loginPolicyManager = new LoginPolicyManager($this->config, $this->logger, $this->l10n);
	}

	public function testRegisterPolicy() {
		$policy = $this->createMock(ILoginPolicy::class);
		$this->assertNull($this->loginPolicyManager->registerPolicy($policy));
	}

	public function testCheckUserLogin() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('myuserid');

		$policy = $this->createMock(ILoginPolicy::class);
		$policy->expects($this->once())
			->method('checkPolicy')
			->willReturn(true);

		$this->loginPolicyManager->registerPolicy($policy);

		$this->config->method('getSystemValue')
			->with('loginPolicy.order', [])
			->willReturn([\get_class($policy)]);

		$this->assertNull($this->loginPolicyManager->checkUserLogin('mycustomLogin', $user));
	}

	public function testCheckUserLoginNoActivePolicy() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('myuserid');

		$policy = $this->createMock(ILoginPolicy::class);
		$policy->expects($this->never())
			->method('checkPolicy')
			->willReturn(true);

		$this->loginPolicyManager->registerPolicy($policy);

		$this->config->method('getSystemValue')
			->with('loginPolicy.order', [])
			->willReturn([]);

		$this->assertNull($this->loginPolicyManager->checkUserLogin('mycustomLogin', $user));
	}

	public function testCheckUserLoginMultiplePolicies() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('myuserid');

		// policies will require different class names
		$policy1 = $this->getMockBuilder(ILoginPolicy::class)
			->setMockClassName('ILoginPolicy_Policy1')
			->getMock();
		$policy1->expects($this->once())
			->method('checkPolicy')
			->willReturn(true);

		$policy2 = $this->getMockBuilder(ILoginPolicy::class)
			->setMockClassName('ILoginPolicy_Policy2')
			->getMock();
		$policy2->expects($this->once())
			->method('checkPolicy')
			->willReturn(true);

		$this->loginPolicyManager->registerPolicy($policy1);
		$this->loginPolicyManager->registerPolicy($policy2);

		$this->config->method('getSystemValue')
			->with('loginPolicy.order', [])
			->willReturn([\get_class($policy1), \get_class($policy2)]);

		$this->assertNull($this->loginPolicyManager->checkUserLogin('mycustomLogin', $user));
	}

	public function testCheckUserLoginMultiplePoliciesFirstFail() {
		$this->expectException(LoginException::class);

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('myuserid');

		// policies will require different class names
		$policy1 = $this->getMockBuilder(ILoginPolicy::class)
			->setMockClassName('ILoginPolicy_Policy1')
			->getMock();
		$policy1->expects($this->once())
			->method('checkPolicy')
			->willReturn(false);

		$policy2 = $this->getMockBuilder(ILoginPolicy::class)
			->setMockClassName('ILoginPolicy_Policy2')
			->getMock();
		$policy2->expects($this->never())  // first policy fails, this won't be checked
			->method('checkPolicy')
			->willReturn(true);

		$this->loginPolicyManager->registerPolicy($policy1);
		$this->loginPolicyManager->registerPolicy($policy2);

		$this->config->method('getSystemValue')
			->with('loginPolicy.order', [])
			->willReturn([\get_class($policy1), \get_class($policy2)]);

		$this->loginPolicyManager->checkUserLogin('mycustomLogin', $user);
	}

	public function testCheckUserLoginMultiplePoliciesFirstThrowException() {
		$this->expectException(LoginException::class);

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('myuserid');

		// policies will require different class names
		$policy1 = $this->getMockBuilder(ILoginPolicy::class)
			->setMockClassName('ILoginPolicy_Policy1')
			->getMock();
		$policy1->expects($this->once())
			->method('checkPolicy')
			->will($this->throwException(new LoginException('Policy1 failed')));

		$policy2 = $this->getMockBuilder(ILoginPolicy::class)
			->setMockClassName('ILoginPolicy_Policy2')
			->getMock();
		$policy2->expects($this->never())  // first policy fails, this won't be checked
			->method('checkPolicy')
			->willReturn(true);

		$this->loginPolicyManager->registerPolicy($policy1);
		$this->loginPolicyManager->registerPolicy($policy2);

		$this->config->method('getSystemValue')
			->with('loginPolicy.order', [])
			->willReturn([\get_class($policy1), \get_class($policy2)]);

		$this->loginPolicyManager->checkUserLogin('mycustomLogin', $user);
	}

	public function testCheckUserLoginMultiplePoliciesSecondFail() {
		$this->expectException(LoginException::class);

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('myuserid');

		// policies will require different class names
		$policy1 = $this->getMockBuilder(ILoginPolicy::class)
			->setMockClassName('ILoginPolicy_Policy1')
			->getMock();
		$policy1->expects($this->once())
			->method('checkPolicy')
			->willReturn(true);

		$policy2 = $this->getMockBuilder(ILoginPolicy::class)
			->setMockClassName('ILoginPolicy_Policy2')
			->getMock();
		$policy2->expects($this->once())
			->method('checkPolicy')
			->willReturn(false);

		$this->loginPolicyManager->registerPolicy($policy1);
		$this->loginPolicyManager->registerPolicy($policy2);

		$this->config->method('getSystemValue')
			->with('loginPolicy.order', [])
			->willReturn([\get_class($policy1), \get_class($policy2)]);

		$this->loginPolicyManager->checkUserLogin('mycustomLogin', $user);
	}

	public function testCheckUserLoginMultiplePoliciesSecondThrowException() {
		$this->expectException(LoginException::class);

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('myuserid');

		// policies will require different class names
		$policy1 = $this->getMockBuilder(ILoginPolicy::class)
			->setMockClassName('ILoginPolicy_Policy1')
			->getMock();
		$policy1->expects($this->once())
			->method('checkPolicy')
			->willReturn(true);

		$policy2 = $this->getMockBuilder(ILoginPolicy::class)
			->setMockClassName('ILoginPolicy_Policy2')
			->getMock();
		$policy2->expects($this->once())
			->method('checkPolicy')
			->will($this->throwException(new LoginException('Policy1 failed')));

		$this->loginPolicyManager->registerPolicy($policy1);
		$this->loginPolicyManager->registerPolicy($policy2);

		$this->config->method('getSystemValue')
			->with('loginPolicy.order', [])
			->willReturn([\get_class($policy1), \get_class($policy2)]);

		$this->loginPolicyManager->checkUserLogin('mycustomLogin', $user);
	}

	public function testCheckUserLoginMultiplePoliciesFirstInactive() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('myuserid');

		// policies will require different class names
		$policy1 = $this->getMockBuilder(ILoginPolicy::class)
			->setMockClassName('ILoginPolicy_Policy1')
			->getMock();
		$policy1->expects($this->once())
			->method('checkPolicy')
			->willReturn(true);

		$policy2 = $this->getMockBuilder(ILoginPolicy::class)
			->setMockClassName('ILoginPolicy_Policy2')
			->getMock();
		$policy2->expects($this->never())  // inactive policy won't be called
			->method('checkPolicy')
			->will($this->throwException(new LoginException('Policy1 failed')));

		$this->loginPolicyManager->registerPolicy($policy1);
		$this->loginPolicyManager->registerPolicy($policy2);

		$this->config->method('getSystemValue')
			->with('loginPolicy.order', [])
			->willReturn([\get_class($policy1)]);

		$this->assertNull($this->loginPolicyManager->checkUserLogin('mycustomLogin', $user));
	}
}
