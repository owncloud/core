<?php

namespace Test\Theme;

use OC\Theme\Theme;
use OC\Theme\ThemeService;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;

class ThemeServiceTest extends \PHPUnit\Framework\TestCase {

	/**
	 * @var vfsStreamDirectory
	 */
	private $root;

	protected function setUp() {
		$this->root = vfsStream::setup();
		parent::setUp();
	}

	public function testCreatesThemeByGivenName()
	{
		$themeService = new ThemeService('theme-name');
		$theme = $themeService->getTheme();
		$this->assertEquals('theme-name', $theme->getName());
		$this->assertEquals('themes/theme-name/', $theme->getDirectory());
	}

	public function testCreatesEmptyThemeIfDefaultDoesNotExist()
	{
		$structure = [];
		$this->root = vfsStream::setup('root', null, $structure);

		$themeService = new ThemeService('', $this->root->url() . '/themes/default');
		$theme = $themeService->getTheme();

		$this->assertEquals('', $theme->getName());
		$this->assertEquals('', $theme->getDirectory());
	}

	public function testCreatesDefaultThemeIfItExists()
	{
		$structure = [
			'themes' => [
				'default' => []
			]
		];

		$this->root = vfsStream::setup('root', null, $structure);

		$themeService = new ThemeService('', $this->root->url() . '/themes/default');
		$theme = $themeService->getTheme();

		$this->assertEquals('default', $theme->getName());
		$this->assertEquals('themes/default/', $theme->getDirectory());
	}

}
