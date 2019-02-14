<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\Tests\Unit\TrashBin;

use OCA\DAV\TrashBin\TrashBinHome;
use OCA\DAV\TrashBin\TrashBinManager;
use Sabre\DAV\Exception\NotFound;
use Test\TestCase;

class TrashBinHomeTest extends TestCase {
	/**
	 * @var TrashBinHome
	 */
	private $trashBinHome;
	/**
	 * @var TrashBinManager | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $trashBinManager;

	protected function setUp(): void {
		parent::setUp();
		$this->trashBinManager = $this->createMock(TrashBinManager::class);
		$this->trashBinHome = new TrashBinHome([
			'uri' => 'principals/alice'
		], $this->trashBinManager);
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 * @expectedExceptionMessage Permission denied to rename this folder
	 */
	public function testSetName() {
		$this->trashBinHome->setName('');
	}

	public function testGetName() {
		self::assertEquals('alice', $this->trashBinHome->getName());
	}

	public function testGetLastModified() {
		self::assertNull($this->trashBinHome->getLastModified());
	}

	public function testGetChildren() {
		$this->trashBinManager->method('getChildren')
			->with('alice')->willReturn([
				'dummy string'
			]);
		$children = $this->trashBinHome->getChildren();
		self::assertEquals(['dummy string'], $children);
	}

	public function testGetChild() {
		$this->trashBinManager->method('getChild')
			->with('alice', '777')->willReturn('dummy string');
		$child = $this->trashBinHome->getChild(777);
		self::assertEquals('dummy string', $child);
	}

	public function testChildExists() {
		$this->trashBinManager->method('getChild')
			->with('alice', '777')->willReturn('dummy string');
		$exists = $this->trashBinHome->childExists(777);
		self::assertTrue($exists);
	}

	public function testChildDoesNotExists() {
		$this->trashBinManager->method('getChild')
			->with('alice', '777')->willThrowException(new NotFound());
		$exists = $this->trashBinHome->childExists(777);
		self::assertFalse($exists);
	}

	public function testDelete() {
		$this->trashBinManager
			->expects($this->once())
			->method('deleteAll')
			->willReturn(true);
		$this->trashBinHome->delete();
	}
}
