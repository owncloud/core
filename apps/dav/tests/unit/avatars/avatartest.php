<?php

namespace OCA\DAV\Tests\Unit\Avatars;

use OCA\DAV\Avatars\Avatar;
use OCP\Files\File;

class AvatarTest extends \Test\TestCase {

	/** @var File | \PHPUnit_Framework_MockObject_MockObject */
	private $file;

	/** @var Avatar */
	private $avatar;

	protected function setUp() {
		parent::setUp();

		$this->file = $this->getMock('\OCP\Files\File');

		$this->avatar = new Avatar($this->file);
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testDelete() {
		$this->avatar->delete();
	}

	public function testGetName() {
		$this->file->expects($this->once())
			->method('getName')
			->willReturn('name');

		$this->assertEquals('name', $this->avatar->getName());
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testSetName() {
		$this->avatar->setName('foo');
	}

	public function testGetLastModified() {
		$this->file->expects($this->once())
			->method('getMTime')
			->willReturn(42);

		$this->assertEquals(42, $this->avatar->getLastModified());
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testPut() {
		$this->avatar->put('new data');
	}

	public function testGet() {
		$this->file->expects($this->once())
			->method('getContent')
			->willReturn('my avatar');

		$this->assertEquals('my avatar', $this->avatar->get());
	}

	public function testGetETag() {
		$this->file->expects($this->once())
			->method('getEtag')
			->willReturn('1337');

		$this->assertEquals('1337', $this->avatar->getETag());
	}

	public function testGetContentType() {
		$this->file->expects($this->once())
			->method('getMimeType')
			->willReturn('mime mime mime');

		$this->assertEquals('mime mime mime', $this->avatar->getContentType());
	}

	public function testGetSize() {
		$this->file->expects($this->once())
			->method('getSize')
			->willReturn(123456);

		$this->assertEquals(123456, $this->avatar->getSize());
	}

}
