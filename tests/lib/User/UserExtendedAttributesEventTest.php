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

namespace Test\User;

use OCP\IUser;
use OCP\User\UserExtendedAttributesEvent;
use Test\TestCase;

class UserExtendedAttributesEventTest extends TestCase {
	/** @var IUser | \PHPUnit\Framework\MockObject\MockObject */
	private $user;

	/** @var UserExtendedAttributesEvent | \PHPUnit\Framework\MockObject\MockObject */
	private $userExtendedAttributesEvent;

	public function setUp(): void {
		parent::setUp();

		$this->user = $this->createMock(IUser::class);
		$this->userExtendedAttributesEvent = new UserExtendedAttributesEvent($this->user);
	}

	/**
	 * This test is to get the user whose extended attributes are to be fetched
	 */
	public function testGetUser() {
		$this->assertSame($this->userExtendedAttributesEvent->getUser(), $this->user);
	}

	public function testSetAttributesDuplicateKey() {
		$this->userExtendedAttributesEvent->setAttributes('one', [1,2,3]);
		$this->assertFalse($this->userExtendedAttributesEvent->setAttributes('one', [4, 5, 6]));
	}

	public function testSetGetAttributes() {
		$this->userExtendedAttributesEvent->setAttributes('one', [1,2]);
		$this->assertEquals($this->userExtendedAttributesEvent->getAttributes(), ['one' => [1, 2]]);

		$this->userExtendedAttributesEvent->setAttributes('two', 'another test');
		$this->assertEquals($this->userExtendedAttributesEvent->getAttributes(), ['one' => [1, 2], 'two' => 'another test']);
	}
}
