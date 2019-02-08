<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

namespace OC\User\Sync;

use OC\User\AccountMapper;
use OCP\UserInterface;
use Test\TestCase;

/**
 * Class SeenUsersIteratorTest
 *
 * @package OC\User\Sync
 *
 * @see http://php.net/manual/en/class.iterator.php for the order of calls on an iterator
 */
class SeenUsersIteratorTest extends TestCase {

	/**
	 * @var AccountMapper|\PHPUnit_Framework_MockObject_MockObject
	 */
	private $mapper;
	/**
	 * @var \Iterator
	 */
	private $iterator;

	const TEST_BACKEND = 'TestBackend';

	public function setUp() {
		parent::setUp();

		$this->mapper = $this->createMock(AccountMapper::class);

		$this->iterator = new SeenUsersIterator($this->mapper, self::TEST_BACKEND);
	}

	/**
	 * Iterators are initialized by a call to rewind
	 */
	public function testRewind() {
		$this->mapper->expects($this->once())
			->method('findUserIds')
			->with(
				$this->equalTo(self::TEST_BACKEND),	// only from this backend
				$this->equalTo(true),					// only logged in users
				$this->equalTo(UsersIterator::LIMIT),	// limit 500
				$this->equalTo(0)						// at the beginning
			)
			->willReturn(['user0']);
		$this->iterator->rewind();
		$this->assertTrue($this->iterator->valid());
		$this->assertEquals('user0', $this->iterator->current());
		$this->assertEquals(0, $this->iterator->key());
	}

	/**
	 * test three pages of results
	 */
	public function testNext() {

		// create pages for 1001 users (0..1000)
		$page1 = [];
		for ($i=0; $i<500; $i++) {
			$page1[] = "user$i";
		}
		$page2 = [];
		for ($i=500; $i<1000; $i++) {
			$page2[] = "user$i";
		}
		$page3 = ['user1000'];

		$this->mapper->expects($this->exactly(3))
			->method('findUserIds')
			->withConsecutive(
				[
					$this->equalTo(self::TEST_BACKEND),	// only from this backend
					$this->equalTo(true),					// only logged in users
					$this->equalTo(UsersIterator::LIMIT),	// limit 500
					$this->equalTo(0)						// at the beginning
				], [
				$this->equalTo(self::TEST_BACKEND),	// only from this backend
				$this->equalTo(true),					// only logged in users
				$this->equalTo(UsersIterator::LIMIT),	// limit 500
				$this->equalTo(500)					// second page
			], [
					$this->equalTo(self::TEST_BACKEND),	// only from this backend
					$this->equalTo(true),					// only logged in users
					$this->equalTo(UsersIterator::LIMIT),	// limit 500
					$this->equalTo(1000)					// last page
				]
			)
			->willReturnOnConsecutiveCalls($page1, $page2, $page3);

		// loop over iterator manually to check key() and valid()

		$this->iterator->rewind();
		$this->assertTrue($this->iterator->valid());
		$this->assertEquals('user0', $this->iterator->current());
		$this->assertEquals(0, $this->iterator->key());
		for ($i=1; $i<=1000; $i++) {
			$this->iterator->next();
			$this->assertTrue($this->iterator->valid());
			$this->assertEquals("user$i", $this->iterator->current());
			$this->assertEquals($i, $this->iterator->key());
		}
		$this->iterator->next();
		$this->assertFalse($this->iterator->valid());
	}
}
