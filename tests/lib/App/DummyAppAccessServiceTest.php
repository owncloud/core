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

namespace Test\App;

use OC\App\DummyAppAccessService;
use OCP\IGroup;
use OCP\IUser;
use Test\TestCase;

class DummyAppAccessServiceTest extends TestCase {
	/** @var DummyAppAccessService */
	private $dummyAppAccessService;

	protected function setUp() {
		parent::setUp();
		$this->dummyAppAccessService = new DummyAppAccessService();
	}

	public function testSetWhitelistedAppsForGroup() {
		$groupObject = $this->createMock(IGroup::class);
		$this->assertFalse($this->dummyAppAccessService->setWhitelistedAppsForGroup($groupObject));
	}

	public function testSetWhitelistedAppsForUser() {
		$user = $this->createMock(IUser::class);
		$this->assertFalse($this->dummyAppAccessService->setWhitelistedAppsForUser($user, []));
	}

	public function testGetComputedWhitelistedAppsForUser() {
		$user = $this->createMock(IUser::class);
		$this->assertFalse($this->dummyAppAccessService->getComputedWhitelistedAppsForUser($user));
	}

	public function testGetWhitelistedAppsForUser() {
		$user = $this->createMock(IUser::class);
		$this->assertFalse($this->dummyAppAccessService->getWhitelistedAppsForUser($user));
	}

	public function testGetWhitelistedAppsForGroup() {
		$groupObject = $this->createMock(IGroup::class);
		$this->assertFalse($this->dummyAppAccessService->getWhitelistedAppsForGroup($groupObject));
	}

	public function testDeleteAppsAccessForUser() {
		$user = $this->createMock(IUser::class);
		$this->assertFalse($this->dummyAppAccessService->wipeWhitelistedAppsForUser($user));
	}

	public function testDeleteAppsAccessForGroup() {
		$groupObject = $this->createMock(IGroup::class);
		$this->assertFalse($this->dummyAppAccessService->wipeWhitelistedAppsForGroup($groupObject));
	}
}
