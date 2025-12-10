<?php
/**
 * Copyright (c) 2016 Joas Schilling <nickvergessen@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\L10N;

use OC;
use OC\L10N\Factory;
use OCP\App\IAppManager;
use OCP\IConfig;
use OCP\IRequest;
use OCP\IUserSession;
use OCP\Theme\IThemeService;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;
use OCP\IUser;

/**
 * Class FactoryTest
 *
 * @package Test\L10N
 * @group DB
 */
class FactoryTest extends TestCase {
	/** @var IConfig|MockObject */
	protected $config;

	/** @var IRequest|MockObject */
	protected $request;

	/** @var IUserSession|MockObject */
	protected $userSession;

	/** @var IThemeService|MockObject */
	protected $themeService;

	/** @var string */
	protected $serverRoot;

	public function setUp(): void {
		parent::setUp();

		/** @var IConfig $request */
		$this->config = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()
			->getMock();

		/** @var IRequest $request */
		$this->request = $this->getMockBuilder(IRequest::class)
			->disableOriginalConstructor()
			->getMock();

		/** @var IThemeService $themeService */
		$this->themeService = $this->getMockBuilder(IThemeService::class)
			->disableOriginalConstructor()
			->getMock();

		$this->userSession = $this->createMock(IUserSession::class);

		$this->serverRoot = OC::$SERVERROOT;
	}

	protected function tearDown(): void {
		$this->restoreService('AppManager');
		parent::tearDown();
	}

	/**
	 * @param array $methods
	 * @return Factory|MockObject
	 */
	protected function getFactory(array $methods = []) {
		if (!empty($methods)) {
			return $this->getMockBuilder(Factory::class)
				->setConstructorArgs([
					$this->config,
					$this->request,
					$this->themeService,
					$this->userSession,
					$this->serverRoot,
				])
				->setMethods($methods)
				->getMock();
		}

		return new Factory($this->config, $this->request, $this->themeService, $this->userSession, $this->serverRoot);
	}

	public function dataFindAvailableLanguages(): array {
		return [
			[null],
			['files'],
		];
	}

	public function testFindLanguageWithExistingRequestLanguageAndNoApp(): void {
		$factory = $this->getFactory(['languageExists']);
		self::invokePrivate($factory, 'requestLanguage', ['de']);
		$factory->expects($this->once())
			->method('languageExists')
			->with(null, 'de')
			->willReturn(true);

		$this->assertSame('de', $factory->findLanguage());
	}

	public function testFindLanguageWithExistingRequestLanguageAndApp(): void {
		$factory = $this->getFactory(['languageExists']);
		self::invokePrivate($factory, 'requestLanguage', ['de']);
		$factory->expects($this->once())
				->method('languageExists')
				->with('MyApp', 'de')
				->willReturn(true);

		$this->assertSame('de', $factory->findLanguage('MyApp'));
	}

	public function testFindLanguageWithNotExistingRequestLanguageAndExistingStoredUserLanguage(): void {
		$factory = $this->getFactory(['languageExists']);
		self::invokePrivate($factory, 'requestLanguage', ['de']);
		$factory
			->expects($this->exactly(2))
			->method('languageExists')
			->withConsecutive(
				['MyApp', 'de'],
				['MyApp', 'jp'],
			)
			->willReturnOnConsecutiveCalls(false, true);
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('installed', false)
			->willReturn(true);
		$user = $this->createMock(IUser::class);
		$user->expects($this->once())
			->method('getUID')
			->willReturn('MyUserUid');
		$this->userSession
			->expects($this->exactly(2))
			->method('getUser')
			->willReturn($user);
		$this->config
				->expects($this->once())
				->method('getUserValue')
				->with('MyUserUid', 'core', 'lang', null)
				->willReturn('jp');

		$this->assertSame('jp', $factory->findLanguage('MyApp'));
	}

	public function testFindLanguageWithNotExistingRequestLanguageAndNotExistingStoredUserLanguage(): void {
		$factory = $this->getFactory(['languageExists']);
		self::invokePrivate($factory, 'requestLanguage', ['de']);
		$factory
			->expects($this->exactly(3))
			->method('languageExists')
			->withConsecutive(
				['MyApp', 'de'],
				['MyApp', 'jp'],
				['MyApp', 'es'],
			)
			->willReturnOnConsecutiveCalls(false, false, true);
		$this->config
			->expects($this->exactly(2))
			->method('getSystemValue')
			->withConsecutive(
				['installed', false],
				['default_language', false],
			)
			->willReturnOnConsecutiveCalls(true, 'es');
		$user = $this->createMock(IUser::class);
		$user->expects($this->once())
				->method('getUID')
				->willReturn('MyUserUid');
		$this->userSession
				->expects($this->exactly(2))
				->method('getUser')
				->willReturn($user);
		$this->config
				->expects($this->once())
				->method('getUserValue')
				->with('MyUserUid', 'core', 'lang', null)
				->willReturn('jp');

		$this->assertSame('es', $factory->findLanguage('MyApp'));
	}

	public function testFindLanguageWithNotExistingRequestLanguageAndNotExistingStoredUserLanguageAndNotExistingDefault(): void {
		$factory = $this->getFactory(['languageExists']);
		self::invokePrivate($factory, 'requestLanguage', ['de']);
		$factory
			->expects($this->exactly(3))
			->method('languageExists')
			->withConsecutive(
				['MyApp', 'de'],
				['MyApp', 'jp'],
				['MyApp', 'es'],
			)
			->willReturnOnConsecutiveCalls(false, false, false);
		$this->config
			->expects($this->exactly(2))
			->method('getSystemValue')
			->withConsecutive(
				['installed', false],
				['default_language', false],
			)
			->willReturnOnConsecutiveCalls(true, 'es');
		$user = $this->createMock(IUser::class);
		$user->expects($this->once())
				->method('getUID')
				->willReturn('MyUserUid');
		$this->userSession
				->expects($this->exactly(2))
				->method('getUser')
				->willReturn($user);
		$this->config
				->expects($this->once())
				->method('getUserValue')
				->with('MyUserUid', 'core', 'lang', null)
				->willReturn('jp');
		$this->config
			->expects($this->never())
			->method('setUserValue');

		$this->assertSame('en', $factory->findLanguage('MyApp'));
	}

	public function testFindLanguageWithNotExistingRequestLanguageAndNotExistingStoredUserLanguageAndNotExistingDefaultAndNoAppInScope(): void {
		$factory = $this->getFactory(['languageExists']);
		self::invokePrivate($factory, 'requestLanguage', ['de']);
		$factory
			->expects($this->exactly(3))
			->method('languageExists')
			->withConsecutive(
				['MyApp', 'de'],
				['MyApp', 'jp'],
				['MyApp', 'es'],
			)
			->willReturnOnConsecutiveCalls(false, false, false);
		$this->config
			->expects($this->exactly(2))
			->method('getSystemValue')
			->withConsecutive(
				['installed', false],
				['default_language', false],
			)
			->willReturnOnConsecutiveCalls(true, 'es');
		$user = $this->createMock(IUser::class);
		$user->expects($this->once())
				->method('getUID')
				->willReturn('MyUserUid');
		$this->userSession
				->expects($this->exactly(2))
				->method('getUser')
				->willReturn($user);
		$this->config
				->expects($this->once())
				->method('getUserValue')
				->with('MyUserUid', 'core', 'lang', null)
				->willReturn('jp');
		$this->config
				->expects($this->never())
				->method('setUserValue')
				->with('MyUserUid', 'core', 'lang', 'en');

		$this->assertSame('en', $factory->findLanguage('MyApp'));
	}

	/**
	 * @dataProvider dataFindAvailableLanguages
	 *
	 * @param string|null $app
	 */
	public function testFindAvailableLanguages($app): void {
		$factory = $this->getFactory(['findL10nDir']);
		$factory->expects($this->once())
			->method('findL10nDir')
			->with($app)
			->willReturn(OC::$SERVERROOT . '/tests/data/l10n/');

		$this->assertEqualsCanonicalizing(
			['cs', 'de', 'en', 'ru'],
			$factory->findAvailableLanguages($app)
		);
	}

	public function dataLanguageExists(): array {
		return [
			[null, 'en', [], true],
			[null, 'de', [], false],
			[null, 'de', ['ru'], false],
			[null, 'de', ['ru', 'de'], true],
			['files', 'en', [], true],
			['files', 'de', [], false],
			['files', 'de', ['ru'], false],
			['files', 'de', ['de', 'ru'], true],
		];
	}

	public function testFindAvailableLanguagesWithThemes(): void {
		$this->serverRoot .= '/tests/data';
		$app = 'files';

		$factory = $this->getFactory(['findL10nDir']);
		$factory->expects($this->once())
			->method('findL10nDir')
			->with($app)
			->willReturn($this->serverRoot . '/apps/files/l10n/');
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('theme')
			->willReturn('abc');

		$availableLanguages = $factory->findAvailableLanguages($app);
		$this->assertContains('en', $availableLanguages);
		$this->assertContains('zz', $availableLanguages);
	}

	public function testFindAvailableLanguagesWithAppThemes(): void {
		$app = 'files';
		$factory = $this->getFactory(['getActiveAppThemeDirectory']);

		$this->config
			->method('getSystemValue')
			->with('theme')
			->willReturn('');

		$factory
			->method('getActiveAppThemeDirectory')
			->with()
			->willReturn($this->serverRoot . '/tests/data/apptheme');

		$availableLanguages = $factory->findAvailableLanguages($app);
		$this->assertContains('en', $availableLanguages);
		$this->assertContains('zz', $availableLanguages);
	}

	public function testAppThemeTranslation(): void {
		$app = 'files';
		$lang = 'zz';
		$factory = $this->getFactory(['getActiveAppThemeDirectory']);

		$this->config
			->method('getSystemValue')
			->with('theme')
			->willReturn('');

		$factory
			->method('getActiveAppThemeDirectory')
			->with()
			->willReturn($this->serverRoot . '/tests/data/apptheme');

		$themeTranslations = $factory->getL10nFilesForApp($app, $lang);
		$this->assertCount(1, $themeTranslations);
		$this->assertStringContainsString('zz.json', $themeTranslations[0]);
	}

	public function testAppThemeTranslationDifferentRoot(): void {
		$app = 'files';
		$lang = 'zz';
		$factory = $this->getFactory(['getActiveAppThemeDirectory']);

		$factory
			->method('getActiveAppThemeDirectory')
			->with()
			->willReturn($this->serverRoot . '/tests/data/apptheme');

		# the app folder is located somewhere different - must have no impact on getL10nFilesForApp
		$appManager = $this->createMock(IAppManager::class);
		$appManager->method('getAppPath')->willReturn("/some/where/apps/$app");
		self::overwriteService('AppManager', $appManager);

		$themeTranslations = $factory->getL10nFilesForApp($app, $lang);
		$this->assertCount(1, $themeTranslations);
		$this->assertStringContainsString('zz.json', $themeTranslations[0]);
	}

	/**
	 * @dataProvider dataLanguageExists
	 *
	 * @param string|null $app
	 * @param string $lang
	 * @param string[] $availableLanguages
	 * @param string $expected
	 */
	public function testLanguageExists($app, $lang, array $availableLanguages, $expected): void {
		$factory = $this->getFactory(['findAvailableLanguages']);
		$factory->expects(($lang === 'en') ? $this->never() : $this->once())
			->method('findAvailableLanguages')
			->with($app)
			->willReturn($availableLanguages);

		$this->assertSame($expected, $factory->languageExists($app, $lang));
	}

	public function dataSetLanguageFromRequest(): array {
		return [
			// Language is available
			[null, 'de', null, ['de'], 'de', 'de'],
			[null, 'de,en', null, ['de'], 'de', 'de'],
			[null, 'de-DE,en-US;q=0.8,en;q=0.6', null, ['de'], 'de', 'de'],
			// Language is not available
			[null, 'de', null, ['ru'], 'en', 'en'],
			[null, 'de,en', null, ['ru', 'en'], 'en', 'en'],
			[null, 'de-DE,en-US;q=0.8,en;q=0.6', null, ['ru', 'en'], 'en', 'en'],
			// Language is available, but request language is set
			[null, 'de', 'ru', ['de'], 'de', 'ru'],
			[null, 'de,en', 'ru', ['de'], 'de', 'ru'],
			[null, 'de-DE,en-US;q=0.8,en;q=0.6', 'ru', ['de'], 'de', 'ru'],

			// Request lang should not be set for apps: Language is available
			['files_pdfviewer', 'de', null, ['de'], 'de', ''],
			['files_pdfviewer', 'de,en', null, ['de'], 'de', ''],
			['files_pdfviewer', 'de-DE,en-US;q=0.8,en;q=0.6', null, ['de'], 'de', ''],
			// Request lang should not be set for apps: Language is not available
			['files_pdfviewer', 'de', null, ['ru'], 'en', ''],
			['files_pdfviewer', 'de,en', null, ['ru', 'en'], 'en', ''],
			['files_pdfviewer', 'de-DE,en-US;q=0.8,en;q=0.6', null, ['ru', 'en'], 'en', ''],
		];
	}

	/**
	 * @dataProvider dataSetLanguageFromRequest
	 *
	 * @param string|null $app
	 * @param string $header
	 * @param string|null $requestLanguage
	 * @param string[] $availableLanguages
	 * @param string $expected
	 * @param string $expectedLang
	 */
	public function testSetLanguageFromRequest($app, $header, $requestLanguage, array $availableLanguages, $expected, $expectedLang): void {
		$factory = $this->getFactory(['findAvailableLanguages']);
		$factory->expects($this->once())
			->method('findAvailableLanguages')
			->with($app)
			->willReturn($availableLanguages);

		$this->request->expects($this->once())
			->method('getHeader')
			->with('ACCEPT_LANGUAGE')
			->willReturn($header);

		if ($requestLanguage !== null) {
			self::invokePrivate($factory, 'requestLanguage', [$requestLanguage]);
		}
		$this->assertSame($expected, $factory->setLanguageFromRequest($app), 'Asserting returned language');
		$this->assertSame($expectedLang, self::invokePrivate($factory, 'requestLanguage'), 'Asserting stored language');
	}

	public function dataGetL10nFilesForApp(): array {
		return [
			[null, 'de', [OC::$SERVERROOT . '/core/l10n/de.json']],
			['core', 'ru', [OC::$SERVERROOT . '/core/l10n/ru.json']],
			['lib', 'ru', [OC::$SERVERROOT . '/lib/l10n/ru.json']],
			['settings', 'de', [OC::$SERVERROOT . '/settings/l10n/de.json']],
			['files', 'de', [OC::$SERVERROOT . '/apps/files/l10n/de.json']],
			['files', '_lang_never_exists_', []],
			['_app_never_exists_', 'de', [OC::$SERVERROOT . '/core/l10n/de.json']],
		];
	}

	/**
	 * @dataProvider dataGetL10nFilesForApp
	 *
	 * @param string|null $app
	 * @param string $expected
	 */
	public function testGetL10nFilesForApp($app, $lang, $expected): void {
		$factory = $this->getFactory();
		$this->assertSame($expected, self::invokePrivate($factory, 'getL10nFilesForApp', [$app, $lang]));
	}

	public function dataFindL10NDir(): array {
		return [
			[null, OC::$SERVERROOT . '/core/l10n/'],
			['core', OC::$SERVERROOT . '/core/l10n/'],
			['lib', OC::$SERVERROOT . '/lib/l10n/'],
			['settings', OC::$SERVERROOT . '/settings/l10n/'],
			['files', OC::$SERVERROOT . '/apps/files/l10n/'],
			['_app_never_exists_', OC::$SERVERROOT . '/core/l10n/'],
		];
	}

	/**
	 * @dataProvider dataFindL10NDir
	 *
	 * @param string|null $app
	 * @param string $expected
	 */
	public function testFindL10NDir($app, $expected): void {
		$factory = $this->getFactory();
		$this->assertSame($expected, self::invokePrivate($factory, 'findL10nDir', [$app]));
	}
}
