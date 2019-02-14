<?php

namespace Test\Theme;

use OC\Theme\ThemeService;
use OC\Helper\EnvironmentHelper;
use OCP\App\IAppManager;

class ThemeServiceTest extends \PHPUnit\Framework\TestCase {
	/**
	 * @var IAppManager | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $appManager;

	/**
	 * @var EnvironmentHelper |  \PHPUnit\Framework\MockObject\MockObject
	 */
	private $environmentHelper;

	protected function setUp(): void {
		parent::setUp();
		$this->appManager = $this->getMockBuilder(IAppManager::class)
			->getMock();
		$this->environmentHelper = $this->getMockBuilder(EnvironmentHelper::class)
			->getMock();
	}

	public function testCreatesThemeByGivenName() {
		$themeService = new ThemeService(
			'theme-name',
			$this->appManager,
			$this->environmentHelper
		);
		$theme = $themeService->getTheme();
		$this->assertEquals('theme-name', $theme->getName());
		$this->assertEquals('themes/theme-name', $theme->getDirectory());
	}

	public function testCreatesEmptyThemeIfDefaultDoesNotExist() {
		$themeService = $this->getMockBuilder(ThemeService::class)
			->disableOriginalConstructor()
			->setMethods(['defaultThemeExists'])
			->getMock();

		$themeService->expects($this->any())
			->method('defaultThemeExists')
			->willReturn(false);

		$themeService->__construct(
			'',
			$this->appManager,
			$this->environmentHelper
		);
		$theme = $themeService->getTheme();

		$this->assertEquals('', $theme->getName());
		$this->assertEquals('', $theme->getDirectory());
	}

	public function testCreatesDefaultThemeIfItExists() {
		$themeService = $this->getMockBuilder(ThemeService::class)
			->disableOriginalConstructor()
			->setMethods(['defaultThemeExists'])
			->getMock();

		$themeService->expects($this->any())
			->method('defaultThemeExists')
			->willReturn(true);

		$themeService->__construct(
			'',
			$this->appManager,
			$this->environmentHelper
		);
		$theme = $themeService->getTheme();

		$this->assertEquals('default', $theme->getName());
		$this->assertEquals('themes/default', $theme->getDirectory());
	}

	public function testSetAppThemeSetsName() {
		$appThemeName = 'some-app-theme';
		$this->appManager->expects($this->once())
			->method('getAppPath')
			->willReturn("/srv/www/apps/$appThemeName");
		$this->environmentHelper->expects($this->any())
			->method('getServerRoot')
			->willReturn("/srv/www");

		$themeService = new ThemeService(
			'',
			$this->appManager,
			$this->environmentHelper
		);
		$this->assertEmpty($themeService->getTheme()->getName());
		$themeService->setAppTheme($appThemeName);
		$this->assertEquals($appThemeName, $themeService->getTheme()->getName());
	}

	public function testThemeDirAboveOcRoot() {
		$appThemeName = 'some-app-theme';
		$this->appManager->expects($this->once())
			->method('getAppPath')
			->willReturn("/srv/www/apps/$appThemeName");

		$this->environmentHelper->expects($this->any())
			->method('getServerRoot')
			->willReturn("/srv/www/owncloud");
		$this->environmentHelper->expects($this->once())
			->method('getAppsRoots')
			->willReturn(
				[
					[
						'path' => "/srv/www/apps",
						'url' => '../apps',
						'writable' => true,
					]
				]
			);

		$themeService = new ThemeService(
			'',
			$this->appManager,
			$this->environmentHelper
		);
		$this->assertEmpty($themeService->getTheme()->getName());
		$themeService->setAppTheme($appThemeName);
		$this->assertEquals($appThemeName, $themeService->getTheme()->getName());
	}
}
