<?php

/**
 * @author Jannik Stehle <jstehle@owncloud.com>
 * @author Jan Ackermann <jackermann@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

use OC\User\RemoteUser;
use OCP\IUser;
use Test\TestCase;

/**
 *
 * @package Test\User
 */
class RemoteUserTest extends TestCase {
	/** @var RemoteUser */
	private $remoteUser;

	protected function setUp(): void {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('testUser');

		$this->remoteUser = new RemoteUser($user->getUID());
	}

	public function testCanChangeMailAddress() {
		$this->assertFalse($this->remoteUser->canChangeMailAddress());
	}
}
