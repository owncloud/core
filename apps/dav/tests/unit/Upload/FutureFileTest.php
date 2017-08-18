<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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
namespace OCA\DAV\Tests\unit\Upload;

class FutureFileTest extends \Test\TestCase {

	public function testGetContentType() {
		$f = $this->mockFutureFile();
		$this->assertEquals('application/octet-stream', $f->getContentType());
	}

	public function testGetETag() {
		$f = $this->mockFutureFile();
		$this->assertEquals('1234567890', $f->getETag());
	}

	public function testGetName() {
		$f = $this->mockFutureFile();
		$this->assertEquals('foo.txt', $f->getName());
	}

	public function testGetLastModified() {
		$f = $this->mockFutureFile();
		$this->assertEquals(12121212, $f->getLastModified());
	}

	/**
	 * data provider for testGetSize
	 * [[array of chunksizes], [chunk names to ignore], expected size]
	 * 
	 * @return array[][]|number[][]|number[][][]
	 */ 
	public function dataGetSize() {
		return [
			[[1, 2, 3], [ ], 6],
			[[100, 200, 300], [ ], 600],
			[[1, 2, 0, 4], [ ], 7],
			[[10, 20, 30, 40], [2], 70],
			[[10, 20, 30, 40], [0, 3], 50],
			[[10, 20, 30, 40], [0, 2, 3], 20],
			[[10, 20, 30, 40, 50], [0, 4], 90],
		];
	} 

	/**
	 * @dataProvider dataGetSize
	 * @param array $chunkSizes
	 * @param array $ignoreChunks
	 * @param int $expected
	 * @return void
	 */
	public function testGetSize(
		array $chunkSizes, array $ignoreChunks, $expected
	) {
		$f = $this->mockFutureFile();
		foreach ($chunkSizes as $name => $size) {
			$node = $this->getMockBuilder('\Sabre\DAV\INode')
				->disableOriginalConstructor()
				->setMethods(
					['delete', 'getSize', 'getName', 'setName', 'getLastModified']
				)
				->getMock();

			$node->expects($this->any())
				->method('getSize')
				->willReturn($size);

			$node->expects($this->any())
				->method('getName')
				->willReturn($name);

			$nodes[] = $node;
		}

		$d = $this->getMockBuilder('OCA\DAV\Connector\Sabre\Directory')
			->disableOriginalConstructor()
			->setMethods(['getChildren'])
			->getMock();

		$d->expects($this->any())
			->method('getChildren')
			->willReturn($nodes);

		$f = new \OCA\DAV\Upload\FutureFile($d, 'foo.txt');
		$this->assertEquals($expected, $f->getSize($ignoreChunks));
	}

	public function testGet() {
		$f = $this->mockFutureFile();
		$stream = $f->get();
		$this->assertTrue(is_resource($stream));
	}

	public function testDelete() {
		$d = $this->getMockBuilder('OCA\DAV\Connector\Sabre\Directory')
			->disableOriginalConstructor()
			->setMethods(['delete'])
			->getMock();

		$d->expects($this->once())
			->method('delete');

		$f = new \OCA\DAV\Upload\FutureFile($d, 'foo.txt');
		$f->delete();
	}

	/**
	 * @expectedException Sabre\DAV\Exception\Forbidden
	 */
	public function testPut() {
		$f = $this->mockFutureFile();
		$f->put('');
	}

	/**
	 * @expectedException Sabre\DAV\Exception\Forbidden
	 */
	public function testSetName() {
		$f = $this->mockFutureFile();
		$f->setName('');
	}

	/**
	 * @return \OCA\DAV\Upload\FutureFile
	 */
	private function mockFutureFile() {
		$d = $this->getMockBuilder('OCA\DAV\Connector\Sabre\Directory')
			->disableOriginalConstructor()
			->setMethods(['getETag', 'getLastModified', 'getChildren'])
			->getMock();

		$d->expects($this->any())
			->method('getETag')
			->willReturn('1234567890');

		$d->expects($this->any())
			->method('getLastModified')
			->willReturn(12121212);

		$d->expects($this->any())
			->method('getChildren')
			->willReturn([]);

		return new \OCA\DAV\Upload\FutureFile($d, 'foo.txt');
	}
}

