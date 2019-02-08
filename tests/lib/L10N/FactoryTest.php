<?php
/**
 * Copyright (c) 2016 Joas Schilling <nickvergessen@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\L10N;

use OC\L10N\Factory;
use OCP\Theme\IThemeService;
use Test\TestCase;

/**
 * Class FactoryTest
 *
 * @package Test\L10N
 * @group DB
 */
class FactoryTest extends TestCase {

	/** @var \OCP\IConfig|\PHPUnit_Framework_MockObject_MockObject */
	protected $config;

	/** @var \OCP\IRequest|\PHPUnit_Framework_MockObject_MockObject */
	protected $request;

	/** @var \OCP\IUserSession|\PHPUnit_Framework_MockObject_MockObject */
	protected $userSession;

	/** @var IThemeService|\PHPUnit_Framework_MockObject_MockObject */
	protected $themeService;

	/** @var string */
	protected $serverRoot;

	public function setUp() {
		parent::setUp();

		/** @var \OCP\IConfig $request */
		$this->config = $this->getMockBuilder('OCP\IConfig')
			->disableOriginalConstructor()
			->getMock();

		/** @var \OCP\IRequest $request */
		$this->request = $this->getMockBuilder('OCP\IRequest')
			->disableOriginalConstructor()
			->getMock();

		/** @var IThemeService $themeService */
		$this->themeService = $this->getMockBuilder(IThemeService::class)
			->disableOriginalConstructor()
			->getMock();

		$this->userSession = $this->createMock('\OCP\IUserSession');

		$this->serverRoot = \OC::$SERVERROOT;
	}

	/**
	 * @param array $methods
	 * @return Factory|\PHPUnit_Framework_MockObject_MockObject
	 */
	protected function getFactory(array $methods = []) {
		if (!empty($methods)) {
			return $this->getMockBuilder('OC\L10N\Factory')
				->setConstructorArgs([
					$this->config,
					$this->request,
					$this->themeService,
					$this->userSession,
					$this->serverRoot,
				])
				->setMethods($methods)
				->getMock();
		} else {
			return new Factory($this->config, $this->request, $this->themeService, $this->userSession, $this->serverRoot);
		}
	}

	public function dataFindAvailableLanguages() {
		return [
			[null],
			['files'],
		];
	}

	public function testFindLanguageWithExistingRequestLanguageAndNoApp() {
		$factory = $this->getFactory(['languageExists']);
		$this->invokePrivate($factory, 'requestLanguage', ['de']);
		$factory->expects($this->once())
			->method('languageExists')
			->with(null, 'de')
			->willReturn(true);

		$this->assertSame('de', $factory->findLanguage());
	}

	public function testFindLanguageWithExistingRequestLanguageAndApp() {
		$factory = $this->getFactory(['languageExists']);
		$this->invokePrivate($factory, 'requestLanguage', ['de']);
		$factory->expects($this->once())
				->method('languageExists')
				->with('MyApp', 'de')
				->willReturn(true);

		$this->assertSame('de', $factory->findLanguage('MyApp'));
	}

	public function testFindLanguageWithNotExistingRequestLanguageAndExistingStoredUserLanguage() {
		$factory = $this->getFactory(['languageExists']);
		$this->invokePrivate($factory, 'requestLanguage', ['de']);
		$factory->expects($this->at(0))
				->method('languageExists')
				->with('MyApp', 'de')
				->willReturn(false);
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('installed', false)
			->willReturn(true);
		$user = $this->createMock('\OCP\IUser');
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
		$factory->expects($this->at(1))
				->method('languageExists')
				->with('MyApp', 'jp')
				->willReturn(true);

		$this->assertSame('jp', $factory->findLanguage('MyApp'));
	}

	public function testFindLanguageWithNotExistingRequestLanguageAndNotExistingStoredUserLanguage() {
		$factory = $this->getFactory(['languageExists']);
		$this->invokePrivate($factory, 'requestLanguage', ['de']);
		$factory->expects($this->at(0))
				->method('languageExists')
				->with('MyApp', 'de')
				->willReturn(false);
		$this->config
				->expects($this->at(0))
				->method('getSystemValue')
				->with('installed', false)
				->willReturn(true);
		$user = $this->createMock('\OCP\IUser');
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
		$factory->expects($this->at(1))
				->method('languageExists')
				->with('MyApp', 'jp')
				->willReturn(false);
		$this->config
				->expects($this->at(2))
				->method('getSystemValue')
				->with('default_language', false)
				->willReturn('es');
		$factory->expects($this->at(2))
				->method('languageExists')
				->with('MyApp', 'es')
				->willReturn(true);

		$this->assertSame('es', $factory->findLanguage('MyApp'));
	}

	public function testFindLanguageWithNotExistingRequestLanguageAndNotExistingStoredUserLanguageAndNotExistingDefault() {
		$factory = $this->getFactory(['languageExists']);
		$this->invokePrivate($factory, 'requestLanguage', ['de']);
		$factory->expects($this->at(0))
				->method('languageExists')
				->with('MyApp', 'de')
				->willReturn(false);
		$this->config
				->expects($this->at(0))
				->method('getSystemValue')
				->with('installed', false)
				->willReturn(true);
		$user = $this->createMock('\OCP\IUser');
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
		$factory->expects($this->at(1))
				->method('languageExists')
				->with('MyApp', 'jp')
				->willReturn(false);
		$this->config
				->expects($this->at(2))
				->method('getSystemValue')
				->with('default_language', false)
				->willReturn('es');
		$factory->expects($this->at(2))
				->method('languageExists')
				->with('MyApp', 'es')
				->willReturn(false);
		$this->config
			->expects($this->never())
			->method('setUserValue');

		$this->assertSame('en', $factory->findLanguage('MyApp'));
	}

	public function testFindLanguageWithNotExistingRequestLanguageAndNotExistingStoredUserLanguageAndNotExistingDefaultAndNoAppInScope() {
		$factory = $this->getFactory(['languageExists']);
		$this->invokePrivate($factory, 'requestLanguage', ['de']);
		$factory->expects($this->at(0))
				->method('languageExists')
				->with('MyApp', 'de')
				->willReturn(false);
		$this->config
				->expects($this->at(0))
				->method('getSystemValue')
				->with('installed', false)
				->willReturn(true);
		$user = $this->createMock('\OCP\IUser');
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
		$factory->expects($this->at(1))
				->method('languageExists')
				->with('MyApp', 'jp')
				->willReturn(false);
		$this->config
				->expects($this->at(2))
				->method('getSystemValue')
				->with('default_language', false)
				->willReturn('es');
		$factory->expects($this->at(2))
				->method('languageExists')
				->with('MyApp', 'es')
				->willReturn(false);
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
	public function testFindAvailableLanguages($app) {
		$factory = $this->getFactory(['findL10nDir']);
		$factory->expects($this->once())
			->method('findL10nDir')
			->with($app)
			->willReturn(\OC::$SERVERROOT . '/tests/data/l10n/');

		$this->assertEquals(['cs', 'de', 'en', 'ru'], $factory->findAvailableLanguages($app), '', 0.0, 10, true);
	}

	public function dataLanguageExists() {
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

	public function testFindAvailableLanguagesWithThemes() {
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

		$this->assertEquals(['en', 'zz'], $factory->findAvailableLanguages($app), '', 0.0, 10, true);
	}

	public function testFindAvailableLanguagesWithAppThemes() {
		$app = 'files';
		$factory = $this->getFactory(['getActiveAppThemeDirectory']);

		$this->config
			->expects($this->any())
			->method('getSystemValue')
			->with('theme')
			->willReturn('');

		$factory->expects($this->any())
			->method('getActiveAppThemeDirectory')
			->with()
			->willReturn($this->serverRoot . '/tests/data/apptheme');

		$availableLanguages = $factory->findAvailableLanguages($app);
		$this->assertContains('en', $availableLanguages);
		$this->assertContains('zz', $availableLanguages);
	}

	public function testAppThemeTranslation() {
		$app = 'files';
		$lang = 'zz';
		$factory = $this->getFactory(['getActiveAppThemeDirectory']);

		$this->config
			->expects($this->any())
			->method('getSystemValue')
			->with('theme')
			->willReturn('');

		$factory->expects($this->any())
			->method('getActiveAppThemeDirectory')
			->with()
			->willReturn($this->serverRoot . '/tests/data/apptheme');

		$themeTranslations = $factory->getL10nFilesForApp($app, $lang);
		$this->assertCount(1, $themeTranslations);
		$this->assertContains('zz.json', $themeTranslations[0]);
	}

	/**
	 * @dataProvider dataLanguageExists
	 *
	 * @param string|null $app
	 * @param string $lang
	 * @param string[] $availableLanguages
	 * @param string $expected
	 */
	public function testLanguageExists($app, $lang, array $availableLanguages, $expected) {
		$factory = $this->getFactory(['findAvailableLanguages']);
		$factory->expects(($lang === 'en') ? $this->never() : $this->once())
			->method('findAvailableLanguages')
			->with($app)
			->willReturn($availableLanguages);

		$this->assertSame($expected, $factory->languageExists($app, $lang));
	}

	public function dataSetLanguageFromRequest() {
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
	public function testSetLanguageFromRequest($app, $header, $requestLanguage, array $availableLanguages, $expected, $expectedLang) {
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
			$this->invokePrivate($factory, 'requestLanguage', [$requestLanguage]);
		}
		$this->assertSame($expected, $factory->setLanguageFromRequest($app), 'Asserting returned language');
		$this->assertSame($expectedLang, $this->invokePrivate($factory, 'requestLanguage'), 'Asserting stored language');
	}

	public function dataGetL10nFilesForApp() {
		return [
			[null, 'de', [\OC::$SERVERROOT . '/core/l10n/de.json']],
			['core', 'ru', [\OC::$SERVERROOT . '/core/l10n/ru.json']],
			['lib', 'ru', [\OC::$SERVERROOT . '/lib/l10n/ru.json']],
			['settings', 'de', [\OC::$SERVERROOT . '/settings/l10n/de.json']],
			['files', 'de', [\OC::$SERVERROOT . '/apps/files/l10n/de.json']],
			['files', '_lang_never_exists_', []],
			['_app_never_exists_', 'de', [\OC::$SERVERROOT . '/core/l10n/de.json']],
		];
	}

	/**
	 * @dataProvider dataGetL10nFilesForApp
	 *
	 * @param string|null $app
	 * @param string $expected
	 */
	public function testGetL10nFilesForApp($app, $lang, $expected) {
		$factory = $this->getFactory();
		$this->assertSame($expected, $this->invokePrivate($factory, 'getL10nFilesForApp', [$app, $lang]));
	}

	public function dataFindL10NDir() {
		return [
			[null, \OC::$SERVERROOT . '/core/l10n/'],
			['core', \OC::$SERVERROOT . '/core/l10n/'],
			['lib', \OC::$SERVERROOT . '/lib/l10n/'],
			['settings', \OC::$SERVERROOT . '/settings/l10n/'],
			['files', \OC::$SERVERROOT . '/apps/files/l10n/'],
			['_app_never_exists_', \OC::$SERVERROOT . '/core/l10n/'],
		];
	}

	/**
	 * @dataProvider dataFindL10NDir
	 *
	 * @param string|null $app
	 * @param string $expected
	 */
	public function testFindL10NDir($app, $expected) {
		$factory = $this->getFactory();
		$this->assertSame($expected, $this->invokePrivate($factory, 'findL10nDir', [$app]));
	}
}
