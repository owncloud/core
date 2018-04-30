<?php

namespace Test\Files\Storage\Wrapper;

use OC\Files\Storage\Temporary;
use OC\Files\Storage\Wrapper\ReadOnlyJail;
use OCP\Constants;
use PHPUnit\Framework\TestCase;

class ReadOnlyJailTest extends TestCase {

	/** @var  ReadOnlyJail */
	private $sut;
	/** @var  Temporary */
	private $sourceStorage;

	public function setUp() {
		parent::setUp();

		$this->sourceStorage = new Temporary([]);
		$this->sut = new ReadOnlyJail(
			[
				'storage' => $this->sourceStorage,
				'path' => 'files',
				'mask' => Constants::PERMISSION_READ
			]
		);
	}

	public function testMkdirCanOnlyCreateFilesDirectoryInsideRoot() {
		$this->assertTrue($this->sut->mkdir('files'));
		$this->assertFalse($this->sut->mkdir('files_other'));
	}

	public function testOnlyPartFilesAreDeletable() {
		$this->assertTrue($this->sut->isDeletable('foo.part'));
		$this->assertFalse($this->sut->isDeletable('cant_delete_me.txt'));
	}
}
