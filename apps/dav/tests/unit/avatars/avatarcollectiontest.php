<?php

namespace OCA\DAV\Tests\Unit\Avatars;

use OCP\Files\NotFoundException;
use OCP\IAvatarManager;
use OCA\DAV\Avatars\AvatarCollection;

class AvatarCollectionTest extends  \Test\TestCase {

	/** @var IAvatarManager | \PHPUnit_Framework_MockObject_MockObject */
	private $manager;

	/** @var AvatarCollection */
	private $collection;

	public function setUp() {
		parent::setUp();

		$this->manager = $this->getMock('\OCP\IAvatarManager');
		$this->collection = new AvatarCollection(['uri' => 'principals/users/user'], $this->manager);
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testCreateFile() {
		$this->collection->createFile('foo');
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testCreateDirectory() {
		$this->collection->createDirectory('foo');
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\NotFound
	 */
	public function testGetChildInvalid() {
		$this->collection->getChild('foo');
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\NotFound
	 */
	public function testGetChildNoAvatar() {
		$avatar = $this->getMock('\OCP\IAvatar');

		$this->manager
			->method('getAvatar')
			->with('user')
			->willReturn($avatar);

		$avatar->method('getFile')
			->with(123)
			->will($this->throwException(new NotFoundException()));

		$this->collection->getChild('123');
	}

	public function testGetChildAvatar() {
		$avatar = $this->getMock('\OCP\IAvatar');
		$file = $this->getMock('\OCP\Files\File');

		$this->manager
			->method('getAvatar')
			->with('user')
			->willReturn($avatar);

		$avatar->method('getFile')
			->with(123)
			->willReturn($file);

		$this->collection->getChild('123');
	}

	public function dataGetChild() {
		return [
			['foo', true],
			['123', true],
			['456', false],
		];
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testGetChildren() {
		$this->collection->getChildren();
	}

	/**
	 * @dataProvider dataChildExists
	 * @param string $size
	 * @param bool $expected
	 */
	public function testChildExists($size, $expected) {
		$this->assertEquals($expected, $this->collection->childExists($size));
	}

	public function dataChildExists() {
		return [
			['foo', false],
			['123', true],
			['0x123', false],
			['0', false],
			['-1', false],
			['one', false],
		];
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testDelete() {
		$this->collection->delete();
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testSetName() {
		$this->collection->setName('bar');
	}

}
