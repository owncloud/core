<?php
/**
 * Copyright (c) 2017 Viktar Dubiniuk <dubiniuk@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Template;

use OC\Template\Base;
use OCP\Theme\ITheme;

class BaseTest extends \Test\TestCase {

	/** @var ITheme|\PHPUnit_Framework_MockObject_MockObject */
	protected $theme;

	/** @var string */
	protected $serverRoot;

	protected function setUp() {
		parent::setUp();
		$this->serverRoot = \OC::$SERVERROOT;
		$this->theme = $this->getMockBuilder(ITheme::class)
			->disableOriginalConstructor()
			->getMock();
	}

	public function testTemplateIsLocatedWhenThemeIsActive() {
		$base = $this->getMockBuilder(Base::class)
			->disableOriginalConstructor()
			->getMock();

		$this->theme->expects($this->any())
			->method('getDirectory')
			->willReturn('theme-test');

		$this->theme->expects($this->any())
			->method('getBaseDirectory')
			->willReturn($this->serverRoot);

		$app = 'anyapp';

		$directories = self::invokePrivate(
			$base,
			'getAppTemplateDirs',
			[$this->theme, $app, $this->serverRoot . '/apps3/anyapp']
		);
		$this->assertEquals(
			[
				$this->serverRoot . '/' . $this->theme->getDirectory() . '/apps/' . $app . '/templates/',
				$this->serverRoot . '/apps3/anyapp/templates/'
			],
			$directories
		);
	}

	public function testTemplateIsLocatedWhenThemeIsNotActive() {
		$base = $this->getMockBuilder(Base::class)
			->disableOriginalConstructor()
			->getMock();

		$this->theme->expects($this->any())
			->method('getDirectory')
			->willReturn('');

		$app = 'anyapp';

		$directories = self::invokePrivate(
			$base,
			'getAppTemplateDirs',
			[$this->theme, $app, $this->serverRoot . '/apps3/anyapp']
		);
		$this->assertEquals(
			[
				$this->serverRoot . '/apps3/anyapp/templates/'
			],
			$directories
		);
	}
}
