<?php

/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgeargroup.com>
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

namespace Test\User;

use OC\User\DeletedUser;
use OC\User\Manager;
use OCP\IConfig;
use OCP\IURLGenerator;
use Test\TestCase;

/**
 *
 * @package Test\User
 */
class DeletedUserTest extends TestCase {
	/** @var Manager */
	private \PHPUnit\Framework\MockObject\MockObject $manager;
	/** @var IConfig */
	private \PHPUnit\Framework\MockObject\MockObject $config;
	/** @var IURLGenerator */
	private \PHPUnit\Framework\MockObject\MockObject $urlGenerator;
	private \OC\User\DeletedUser $deletedUser;

	protected function setUp(): void {
		$this->manager = $this->createMock(Manager::class);
		$this->config = $this->createMock(IConfig::class);
		$this->urlGenerator = $this->createMock(IURLGenerator::class);

		$this->deletedUser = new DeletedUser($this->manager, $this->config, $this->urlGenerator, 'theTestUser');
	}

	public function testGetAccountId() {
		$this->assertSame('theTestUser', $this->deletedUser->getAccountId());
	}

	public function testGetUID() {
		$this->assertSame('theTestUser', $this->deletedUser->getUID());
	}

	public function testGetUserName() {
		$this->config->method('getUserValue')
			->with('theTestUser', 'core', 'username', 'theTestUser')
			->willReturn('theUserName');

		$this->assertSame('theUserName', $this->deletedUser->getUserName());
	}

	public function testSetUserName() {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Not Implemented');

		$this->deletedUser->setUserName('newUsername');
	}

	public function testGetDisplayName() {
		$this->assertSame('theTestUser', $this->deletedUser->getDisplayName());
	}

	public function testSetDisplayName() {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Not Implemented');

		$this->deletedUser->setDisplayName('newDisplayname');
	}

	public function testGetLastLogin() {
		$this->assertSame(0, $this->deletedUser->getLastLogin());
	}

	public function testUpdateLastLoginTimestamp() {
		$this->assertTrue($this->deletedUser->updateLastLoginTimestamp());
	}

	// TODO: "delete" method can't be unittested

	public function passwordProvider() {
		return [
			['password', null],
			['password', 'recovery'],
		];
	}

	/**
	 * @dataProvider passwordProvider
	 */
	public function testSetPassword($password, $recovery) {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Not Implemented');

		$this->deletedUser->setPassword($password, $recovery);
	}

	public function testGetHome() {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Not Implemented');

		$this->deletedUser->getHome();
	}

	public function testGetBackendClassName() {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Not Implemented');

		$this->deletedUser->getBackendClassName();
	}

	public function testCanChangeAvatar() {
		$this->assertFalse($this->deletedUser->canChangeAvatar());
	}

	public function testCanChangePassword() {
		$this->assertFalse($this->deletedUser->canChangePassword());
	}

	public function testCanChangeDisplayName() {
		$this->assertFalse($this->deletedUser->canChangeDisplayName());
	}

	public function testCanChangeMailAddress() {
		$this->assertFalse($this->deletedUser->canChangeMailAddress());
	}

	public function testIsEnabled() {
		$this->assertFalse($this->deletedUser->isEnabled());
	}

	public function setEnabledProvider() {
		return [
			[true],
			[false],
		];
	}

	/**
	 * @dataProvider setEnabledProvider
	 */
	public function testSetEnabled($state) {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Not Implemented');

		$this->deletedUser->setEnabled($state);
	}

	public function testGetEMailAddress() {
		$this->assertNull($this->deletedUser->getEMailAddress());
	}

	public function testGetAvatarImage() {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Not Implemented');

		$this->deletedUser->getAvatarImage(50);
	}

	public function testGetCloudId() {
		$this->urlGenerator->method('getAbsoluteURL')
			->willReturn('https://demo.memo:9999/owncloud');

		$this->assertSame('theTestUser@demo.memo:9999/owncloud', $this->deletedUser->getCloudId());
	}

	public function testSetEMailAddress() {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Not Implemented');

		$this->deletedUser->setEMailAddress('dummy@example.com');
	}

	public function testGetQuota() {
		$this->assertSame('default', $this->deletedUser->getQuota());
	}

	public function setQuotaProvider() {
		return [
			['default'],
			['none'],
			['500'],
			['500MB'],
		];
	}

	/**
	 * @dataProvider setQuotaProvider
	 */
	public function testSetQuota($quota) {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Not Implemented');

		$this->deletedUser->setQuota($quota);
	}

	public function testSetSearchTerms() {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Not Implemented');

		$this->deletedUser->setSearchTerms([]);
	}

	public function testGetSearchTerms() {
		$this->assertSame([], $this->deletedUser->getSearchTerms());
	}
}
