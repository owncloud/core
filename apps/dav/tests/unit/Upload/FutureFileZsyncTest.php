<?php
/*
 * Copyright (C) by Ahmed Ammar <ahmed.a.ammar@gmail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
 * Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
 * OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 */
namespace OCA\DAV\Tests\unit\Upload;

class FutureFileTestZsync extends \Test\TestCase {

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

	public function testGetSize() {
		$f = $this->mockFutureFile();
		$this->assertEquals(0, $f->getSize());
	}

	public function testGet() {
		$f = $this->mockFutureFile();
		$stream = $f->get();
		$this->assertTrue(is_resource($stream));
	}

	public function testGetZsync() {
		$file = $this->createMock('Sabre\DAV\IFile');
		$f = $this->mockFutureFile();
		$f->setBackingFile($file);
		$f->setFileLength(1231);
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

		$f = new \OCA\DAV\Upload\FutureFileZsync($d, 'foo.txt');
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
			->setMethods(['getETag', 'getLastModified', 'getChildren', 'childExists'])
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

		$d->expects($this->any())
			->method('childExists')
			->willReturn(true);

		return new \OCA\DAV\Upload\FutureFileZsync($d, 'foo.txt');
	}
}

