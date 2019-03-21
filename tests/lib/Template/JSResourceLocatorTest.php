<?php
/**
 * Copyright (c) 2018 Viktar Dubiniuk <dubiniuk@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Template;

use OC\App\AppManager;
use OC\Template\JSResourceLocator;
use OC\Theme\Theme;
use OCP\ILogger;
use Test\TestCase;

class JSResourceLocatorTest extends TestCase {
	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $logger;
	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $appManager;
	protected $serverRoot = '/var/www/owncloud';
	protected $appRoot = '/var/www/apps';
	protected $themeAppDir = 'theme-best';

	protected function setUp() {
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

		return $this->getMockBuilder(JSResourceLocator::class)
			->setConstructorArgs([$themeInstance, $this->appManager, $this->logger, $core_map, $appsRoots])
			->setMethods(['appendOnceIfExist'])
			->getMock();
	}

	public function testFindCoreScript() {
		/** @var \OC\Template\JSResourceLocator $locator */
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
				['/var/www/apps', 'theme-best/apps/core/js/script.js', ''],
				['/var/www/apps', 'theme-best/core/js/script.js', ''],
				['/var/www/owncloud', 'core/js/script.js', ''],
				['/var/www/apps', 'theme-best/core/core/js/script.js', ''],
				['/var/www/owncloud', 'core/core/js/script.js', '']
			);

		$locator->find(['core/js/script']);
	}

	public function testFindAppScript() {
		/** @var \OC\Template\JSResourceLocator $locator */
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
				['/var/www/apps', 'theme-best/apps/randomapp/js/script.js', ''],
				['/var/www/apps', 'theme-best/randomapp/js/script.js', ''],
				['/var/www/owncloud', 'randomapp/js/script.js', ''],
				['/var/www/apps', 'theme-best/core/randomapp/js/script.js', ''],
				['/var/www/owncloud', 'core/randomapp/js/script.js', ''],
				['/var/www/apps/randomapp', 'js/script.js', '']
			);

		$locator->find(['randomapp/js/script']);
	}

	public function testFindL10nScript() {
		/** @var \OC\Template\JSResourceLocator $locator */
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
				['/var/www/owncloud', 'core/randomapp/l10n/en_GB.js', ''],
				['/var/www/apps', 'theme-best/core/randomapp/l10n/en_GB.js', ''],
				['/var/www/owncloud', 'randomapp/l10n/en_GB.js', ''],
				['/var/www/apps', 'theme-best/randomapp/l10n/en_GB.js', ''],
				['/var/www/apps', 'theme-best/apps/randomapp/l10n/en_GB.js', ''],
				['/var/www/apps/randomapp', 'l10n/en_GB.js', '']
			);

		$locator->find(['randomapp/l10n/en_GB']);
	}
}
