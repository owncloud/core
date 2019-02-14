<?php
/**
 * Copyright (c) 2018 Viktar Dubiniuk <dubiniuk@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Template;

use OC\App\AppManager;
use OC\Template\CSSResourceLocator;
use OC\Theme\Theme;
use OCP\ILogger;
use Test\TestCase;

class CSSResourceLocatorTest extends TestCase {
	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $logger;
	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $appManager;
	protected $serverRoot = '/var/www/owncloud';
	protected $appRoot = '/var/www/apps';
	protected $themeAppDir = 'theme-best';

	protected function setUp(): void {
		parent::setUp();
		$this->logger = $this->createMock(ILogger::class);
	}

	/**
	 * @param string $theme
	 * @param array $core_map
	 * @param array $appsRoots
	 * @return \PHPUnit\Framework\MockObject\MockObject
	 */
	public function getResourceLocator($theme, $core_map, $appsRoots) {
		$themeInstance = $this->createMock(Theme::class);
		$themeInstance->method('getName')->willReturn($theme);
		$themeInstance->method('getBaseDirectory')->willReturn($this->appRoot);
		$themeInstance->method('getDirectory')->willReturn($this->themeAppDir);

		$this->appManager = $this->getMockBuilder(AppManager::class)
			->disableOriginalConstructor()
			->getMock();

		return $this->getMockBuilder(CSSResourceLocator::class)
			->setConstructorArgs([$themeInstance, $this->appManager, $this->logger, $core_map, $appsRoots])
			->setMethods(['appendOnceIfExist'])
			->getMock();
	}

	public function testFindCoreStyle() {
		/** @var \OC\Template\CSSResourceLocator $locator */
		$locator = $this->getResourceLocator(
			'theme',
			[$this->serverRoot => 'map'],
			['foo' => 'bar']
		);
		$this->appManager->expects($this->any())
			->method('getAppPath')
			->with('core')
			->willReturn(false);

		$locator->expects($this->exactly(5))
			->method('appendOnceIfExist')
			->withConsecutive(
				['/var/www/owncloud', 'core/css/style.css', ''],
				['/var/www/owncloud', 'core/core/css/style.css', ''],
				['/var/www/apps', 'theme-best/apps/core/css/style.css', ''],
				['/var/www/apps', 'theme-best/core/css/style.css', ''],
				['/var/www/apps', 'theme-best/core/core/css/style.css', '']

			);

		$locator->find(['core/css/style']);
	}

	public function testFindAppStyle() {
		/** @var \OC\Template\CSSResourceLocator $locator */
		$locator = $this->getResourceLocator(
			'theme',
			[$this->serverRoot => 'map'],
			['foo' => 'bar']
		);
		$this->appManager->expects($this->any())
			->method('getAppPath')
			->with('randomapp')
			->willReturn('/var/www/apps/randomapp');

		$locator->expects($this->exactly(6))
			->method('appendOnceIfExist')
			->withConsecutive(
				['/var/www/owncloud', 'randomapp/css/style.css', ''],
				['/var/www/owncloud', 'core/randomapp/css/style.css', ''],
				['/var/www/apps/randomapp', 'css/style.css', ''],
				['/var/www/apps', 'theme-best/apps/randomapp/css/style.css', ''],
				['/var/www/apps', 'theme-best/randomapp/css/style.css', ''],
				['/var/www/apps', 'theme-best/core/randomapp/css/style.css', '']
			);

		$locator->find(['randomapp/css/style']);
	}
}
