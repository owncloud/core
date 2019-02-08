<?php
/**
 * Copyright (c) 2017 Viktar Dubiniuk <dubiniuk@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Repair;

use OC\Repair\DisableExtraThemes;
use OCP\App\IAppManager;
use OCP\IAppConfig;
use OCP\IConfig;
use OCP\Migration\IOutput;
use Test\TestCase;

/**
 * Tests for leaving only one theme active
 */
class DisableExtraThemesTest extends TestCase {

	/** @var IAppManager|\PHPUnit_Framework_MockObject_MockObject */
	protected $appManager;

	/** @var IConfig|\PHPUnit_Framework_MockObject_MockObject */
	protected $config;

	/** @var IAppConfig|\PHPUnit_Framework_MockObject_MockObject */
	protected $appConfig;

	/** @var IOutput|\PHPUnit_Framework_MockObject_MockObject */
	protected $output;

	protected function setUp() {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);
		$this->appManager = $this->createMock(IAppManager::class);
		$this->appConfig = $this->createMock(IAppConfig::class);
		$this->output = $this->createMock(IOutput::class);
	}

	public function testExtraThemeAppsDisabled() {
		$this->appManager->expects($this->any())
			->method('getInstalledApps')
			->willReturn(['theme-one', 'customapp', 'someotherapp', 'theme-two', 'theme-three']);

		$this->appConfig->expects($this->any())
			->method('getValues')
			->willReturn([
				'theme-one' => 'theme',
				'theme-two' => 'theme',
				'customapp' => 'filesystem',
				'theme-three'  => 'theme'
			]);

		$this->appManager->expects($this->exactly(2))
			->method('disableApp')
			->withConsecutive(['theme-one'], ['theme-two']);

		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('theme', '')
			->willReturn('veryoldtheme');

		$this->config->expects($this->once())
			->method('setSystemValue')
			->with('theme', '');

		$repairStep = new DisableExtraThemes($this->appManager, $this->config, $this->appConfig);
		$repairStep->run($this->output);
	}

	public function testSingleThemeAppStillEnabled() {
		$this->appManager->expects($this->any())
			->method('getInstalledApps')
			->willReturn(['one', 'customapp', 'someotherapp', 'two', 'theme-three']);

		$this->appConfig->expects($this->any())
			->method('getValues')
			->willReturn([
				'one' => 'filesystem',
				'two' => 'filesystem',
				'customapp' => 'filesystem',
				'theme-three'  => 'theme'
			]);

		$this->appManager->expects($this->never())
			->method('disableApp');

		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('theme', '')
			->willReturn('');

		$this->config->expects($this->never())
			->method('setSystemValue')
			->with('theme', '');

		$repairStep = new DisableExtraThemes($this->appManager, $this->config, $this->appConfig);
		$repairStep->run($this->output);
	}

	public function testSingleThemeAppDisablesLegacyTheme() {
		$this->appManager->expects($this->any())
			->method('getInstalledApps')
			->willReturn(['one', 'customapp', 'someotherapp', 'two', 'theme-three']);

		$this->appConfig->expects($this->any())
			->method('getValues')
			->willReturn([
				'one' => 'filesystem',
				'two' => 'filesystem',
				'customapp' => 'filesystem',
				'theme-three'  => 'theme'
			]);

		$this->appManager->expects($this->never())
			->method('disableApp');

		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('theme', '')
			->willReturn('veryoldtheme');

		$this->config->expects($this->once())
			->method('setSystemValue')
			->with('theme', '');

		$repairStep = new DisableExtraThemes($this->appManager, $this->config, $this->appConfig);
		$repairStep->run($this->output);
	}

	public function testNoThemeAppsKeepsLegacyTheme() {
		$this->appManager->expects($this->any())
			->method('getInstalledApps')
			->willReturn(['one', 'customapp', 'someotherapp', 'two', 'three']);

		$this->appConfig->expects($this->any())
			->method('getValues')
			->willReturn([
				'one' => 'filesystem',
				'two' => 'filesystem',
				'customapp' => 'filesystem',
				'three'  => 'authentication'
			]);

		$this->appManager->expects($this->never())
			->method('disableApp');

		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('theme', '')
			->willReturn('veryoldtheme');

		$this->config->expects($this->never())
			->method('setSystemValue')
			->with('theme', '');

		$repairStep = new DisableExtraThemes($this->appManager, $this->config, $this->appConfig);
		$repairStep->run($this->output);
	}
}
