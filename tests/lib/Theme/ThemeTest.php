<?php

namespace Test\Theme;

use OC\Theme\Theme;

class ThemeTest extends \PHPUnit\Framework\TestCase {

	/**
	 * @var Theme
	 */
	private $sut;

	protected function setUp(): void {
		$this->sut = new Theme();
		parent::setUp();
	}

	public function testConstructorSetsNameDirectoryAndWebPath() {
		$this->assertEmpty($this->sut->getName());
		$this->assertEmpty($this->sut->getDirectory());
		$this->assertEmpty($this->sut->getWebPath());
		$this->sut = new Theme('name', 'directory/directory', 'directory/web-directory');
		$this->assertEquals('name', $this->sut->getName());
		$this->assertEquals('directory/directory', $this->sut->getDirectory());
		$this->assertEquals('directory/web-directory', $this->sut->getWebPath());
	}

	public function testDirectoryCanBeSet() {
		$this->assertEmpty($this->sut->getDirectory());
		$this->sut->setDirectory('test/directory');
		$this->assertEquals('test/directory', $this->sut->getDirectory());
	}

	public function testNameCanBeSet() {
		$this->assertEmpty($this->sut->getName());
		$this->sut->setName('some-name');
		$this->assertEquals('some-name', $this->sut->getName());
	}

	public function testWebPathCanBeSet() {
		$this->assertEmpty($this->sut->getWebPath());
		$this->sut->setWebPath('test/web-directory');
		$this->assertEquals('test/web-directory', $this->sut->getWebPath());
	}
}
