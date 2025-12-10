<?php
/**
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace Test\License;

use OCP\IConfig;
use OCP\ILogger;
use OCP\App\IAppManager;
use OCP\AppFramework\Utility\ITimeFactory;
use OC\License\ILicense;
use OC\License\LicenseFetcher;
use OC\License\LicenseManager;
use OC\License\MessageService;
use OCP\License\ILicenseManager;
use Test\TestCase;

class LicenseManagerTest extends TestCase {
	/** @var LicenseFetcher */
	private $licenseFetcher;
	/**@var MessageService */
	private $messageService;
	/** @var IConfig */
	private $config;
	/** @var IAppManager */
	private $appManager;
	/** @var ITimeFactory */
	private $timeFactory;
	/** @var LicenseManager */
	private $licenseManager;
	/** @var ILogger */
	private $logger;

	protected function setUp(): void {
		$this->licenseFetcher = $this->createMock(LicenseFetcher::class);
		$this->messageService = $this->createMock(MessageService::class);
		$this->appManager = $this->createMock(IAppManager::class);
		$this->config = $this->createMock(IConfig::class);
		$this->timeFactory = $this->createMock(ITimeFactory::class);
		$this->logger = $this->createMock(ILogger::class);

		$this->licenseManager = new LicenseManager(
			$this->licenseFetcher,
			$this->messageService,
			$this->appManager,
			$this->config,
			$this->timeFactory,
			$this->logger
		);
	}

	public function getGracePeriodProviderWrong() {
		return [
			[null, 1581945782, false],  // no grace period started
			[null, 1581945782, true],
			[1581945782 - (LicenseManager::GRACE_PERIOD * 2), 1581945782, false],  // grace period expired
			[1581945782 - (LicenseManager::GRACE_PERIOD * 2), 1581945782, true],
		];
	}

	/**
	 * @dataProvider getGracePeriodProviderWrong
	 */
	public function testGetGracePeriodWrong($gracePeriodStart, $currentTime, $getExtras) {
		$this->timeFactory->method('getTime')
			->willReturn($currentTime);

		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'grace_period', null, $gracePeriodStart]
			]));

		$this->assertNull($this->licenseManager->getGracePeriod($getExtras));
	}

	public function getGracePeriodProvider() {
		$ocLicenseValid = $this->createMock(ILicense::class);
		$ocLicenseValid->method('isValid')->willReturn(true);
		$ocLicenseValid->method('getExpirationTime')->willReturn(PHP_INT_MAX);
		$ocLicenseValid->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseInvalid = $this->createMock(ILicense::class);
		$ocLicenseInvalid->method('isValid')->willReturn(false);
		$ocLicenseInvalid->method('getExpirationTime')->willReturn(PHP_INT_MAX);
		$ocLicenseInvalid->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseExpired = $this->createMock(ILicense::class);
		$ocLicenseExpired->method('isValid')->willReturn(true);
		$ocLicenseExpired->method('getExpirationTime')->willReturn(PHP_INT_MIN);
		$ocLicenseExpired->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseInvalidExpired = $this->createMock(ILicense::class);
		$ocLicenseInvalidExpired->method('isValid')->willReturn(false);
		$ocLicenseInvalidExpired->method('getExpirationTime')->willReturn(PHP_INT_MIN);
		$ocLicenseInvalidExpired->method('getLicenseString')->willReturn('dummy-license-string');
		return [
			[1581945782, 1581945782, null],  // no license set
			[1581945782, 1581945782 + LicenseManager::GRACE_PERIOD, null],
			[1581945782, 1581945782, $ocLicenseValid],
			[1581945782, 1581945782 + LicenseManager::GRACE_PERIOD, $ocLicenseValid],
			[1581945782, 1581945782, $ocLicenseInvalid],
			[1581945782, 1581945782 + LicenseManager::GRACE_PERIOD, $ocLicenseInvalid],
			[1581945782, 1581945782, $ocLicenseExpired],
			[1581945782, 1581945782 + LicenseManager::GRACE_PERIOD, $ocLicenseExpired],
			[1581945782, 1581945782, $ocLicenseInvalidExpired],
			[1581945782, 1581945782 + LicenseManager::GRACE_PERIOD, $ocLicenseInvalidExpired],
		];
	}

	/**
	 * @dataProvider getGracePeriodProvider
	 */
	public function testGetGracePeriodWithoutExtras($gracePeriodStart, $currentTime, $ocLicense) {
		$this->timeFactory->method('getTime')
			->willReturn($currentTime);

		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'grace_period', null, $gracePeriodStart]
			]));

		$expected = [
			'start' => $gracePeriodStart,
			'end' => $gracePeriodStart + LicenseManager::GRACE_PERIOD,
		];
		$this->assertSame($expected, $this->licenseManager->getGracePeriod(false));
	}

	/**
	 * @dataProvider getGracePeriodProvider
	 */
	public function testGetGracePeriodWithExtras($gracePeriodStart, $currentTime, $ocLicense) {
		$this->timeFactory->method('getTime')
			->willReturn($currentTime);

		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'grace_period', null, $gracePeriodStart],
				['appid1', 'enabled', 'no', 'yes'],
				['appid2', 'enabled', 'no', 'yes'],
				['appid3', 'enabled', 'no', 'no'],
				// appid4 'enabled' info missing
				['appid5', 'enabled', 'no', 'yes'],
				['core-license-complains', 'appid1', null, 'dummy-license-string'], // from the ocLicense
				['core-license-complains', 'appid2', null, 'sdfiuywermvsdf23'], // different than ocLicense
				['core-license-complains', 'appid3', null, 'dummy-license-string'],
				['core-license-complains', 'appid4', null, 'dummy-license-string'],
				['core-license-complains', 'appid5', null, 'dummy-license-string'],
			]));
		$this->config->method('getAppKeys')
			->with('core-license-complains')
			->willReturn(['appid1', 'appid2', 'appid3', 'appid4', 'appid5']);

		$this->config->method('getSystemValue')
			->will($this->returnValueMap([
				['grace_period.demo_key.link', 'https://owncloud.com/try-enterprise/', 'proto://link'],
			]));

		$this->appManager->method('getAppPath')
			->will($this->returnValueMap([
				['appid1', 'randomPath1'],
				['appid2', 'randomPath2'],
				['appid3', 'randomPath3'],
				['appid4', 'randomPath4'],
				['appid5', false],  // appid4 enabled but code missing
			]));

		$this->licenseFetcher->method('getOwncloudLicense')
			->willReturn($ocLicense);

		if ($ocLicense && $ocLicense->isValid() && $ocLicense->getExpirationTime() >= $currentTime) {
			$this->config->expects($this->exactly(4))
				->method('deleteAppValue');
			// complain appid2 removed because the new license is valid; the complain was about a different license
			// complain appid3 and 4 removed because they're disabled (assume disabled for 4 because info is missing)
			// complain appid5 removed because the app is uninstalled / missing
			$apps = ['appid1'];
		} else {
			$this->config->expects($this->exactly(3))
				->method('deleteAppValue');
			// complain appid2 WON'T be removed because the new license is invalid
			$apps = ['appid1', 'appid2'];
		}

		$expected = [
			'apps' => $apps,
			'demoKeyLink' => 'proto://link',
			'start' => $gracePeriodStart,
			'end' => $gracePeriodStart + LicenseManager::GRACE_PERIOD,
		];
		$this->assertSame($expected, $this->licenseManager->getGracePeriod(true));
	}

	public function testSetLicenseString() {
		$dummyLicense = 'dummy-license-string';

		$this->licenseFetcher->expects($this->once())
			->method('setOwncloudLicense')
			->with($dummyLicense);

		$this->config->expects($this->once())
			->method('deleteAppValues')
			->with('core-license-complains');

		$this->assertNull($this->licenseManager->setLicenseString($dummyLicense));
	}

	public function testRemoveLicenseString() {
		$this->licenseFetcher->expects($this->once())
			->method('removeOwncloudLicense');

		$this->config->expects($this->once())
			->method('deleteAppValues')
			->with('core-license-complains');

		$this->assertNull($this->licenseManager->removeLicenseString());
	}

	public function testSetLicenseStringWithNull() {
		$this->licenseFetcher->expects($this->never())
			->method('setOwncloudLicense');

		$this->config->expects($this->once())
			->method('deleteAppValues')
			->with('core-license-complains');

		$this->assertNull($this->licenseManager->setLicenseString(null));
	}

	public function getLicenseStateForProvider() {
		$ocLicenseValid = $this->createMock(ILicense::class);
		$ocLicenseValid->method('isValid')->willReturn(true);
		$ocLicenseValid->method('getExpirationTime')->willReturn(PHP_INT_MAX);
		$ocLicenseValid->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseAboutExpire = $this->createMock(ILicense::class);
		$ocLicenseAboutExpire->method('isValid')->willReturn(true);
		$ocLicenseAboutExpire->method('getExpirationTime')->willReturn(100300500 + 3600);
		$ocLicenseAboutExpire->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseInvalid = $this->createMock(ILicense::class);
		$ocLicenseInvalid->method('isValid')->willReturn(false);
		$ocLicenseInvalid->method('getExpirationTime')->willReturn(PHP_INT_MAX);
		$ocLicenseInvalid->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseExpired = $this->createMock(ILicense::class);
		$ocLicenseExpired->method('isValid')->willReturn(true);
		$ocLicenseExpired->method('getExpirationTime')->willReturn(PHP_INT_MIN);
		$ocLicenseExpired->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseInvalidExpired = $this->createMock(ILicense::class);
		$ocLicenseInvalidExpired->method('isValid')->willReturn(false);
		$ocLicenseInvalidExpired->method('getExpirationTime')->willReturn(PHP_INT_MIN);
		$ocLicenseInvalidExpired->method('getLicenseString')->willReturn('dummy-license-string');
		return [
			[null, ILicenseManager::LICENSE_STATE_MISSING],  // no license set
			[$ocLicenseValid, ILicenseManager::LICENSE_STATE_VALID],
			[$ocLicenseAboutExpire, ILicenseManager::LICENSE_STATE_ABOUT_TO_EXPIRE],
			[$ocLicenseInvalid, ILicenseManager::LICENSE_STATE_INVALID],
			[$ocLicenseExpired, ILicenseManager::LICENSE_STATE_EXPIRED],
			[$ocLicenseInvalidExpired, ILicenseManager::LICENSE_STATE_INVALID],
		];
	}

	/**
	 * @dataProvider getLicenseStateForProvider
	 */
	public function testGetLicenseStateFor($ocLicense, $expectedState) {
		$this->timeFactory->method('getTime')->willReturn(100300500);
		$this->licenseFetcher->method('getOwncloudLicense')->willReturn($ocLicense);

		$this->assertSame($expectedState, $this->licenseManager->getLicenseStateFor('dummyApp'));
	}

	public function getLicenseMessageForProvider() {
		$ocLicenseValid = $this->createMock(ILicense::class);
		$ocLicenseValid->method('isValid')->willReturn(true);
		$ocLicenseValid->method('getExpirationTime')->willReturn(PHP_INT_MAX);
		$ocLicenseValid->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseAboutExpire = $this->createMock(ILicense::class);
		$ocLicenseAboutExpire->method('isValid')->willReturn(true);
		$ocLicenseAboutExpire->method('getExpirationTime')->willReturn(100300500 + 3600);
		$ocLicenseAboutExpire->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseInvalid = $this->createMock(ILicense::class);
		$ocLicenseInvalid->method('isValid')->willReturn(false);
		$ocLicenseInvalid->method('getExpirationTime')->willReturn(PHP_INT_MAX);
		$ocLicenseInvalid->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseExpired = $this->createMock(ILicense::class);
		$ocLicenseExpired->method('isValid')->willReturn(true);
		$ocLicenseExpired->method('getExpirationTime')->willReturn(PHP_INT_MIN);
		$ocLicenseExpired->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseInvalidExpired = $this->createMock(ILicense::class);
		$ocLicenseInvalidExpired->method('isValid')->willReturn(false);
		$ocLicenseInvalidExpired->method('getExpirationTime')->willReturn(PHP_INT_MIN);
		$ocLicenseInvalidExpired->method('getLicenseString')->willReturn('dummy-license-string');

		$expectedMessageInfo = [
			'raw_message' => ['raw message'],
			'translated_message' => ['translated message'],
			'contains_html' => [],
		];
		return [
			[null, ILicenseManager::LICENSE_STATE_MISSING, $expectedMessageInfo],  // no license set
			[$ocLicenseValid, ILicenseManager::LICENSE_STATE_VALID, $expectedMessageInfo],
			[$ocLicenseAboutExpire, ILicenseManager::LICENSE_STATE_ABOUT_TO_EXPIRE, $expectedMessageInfo],
			[$ocLicenseInvalid, ILicenseManager::LICENSE_STATE_INVALID, $expectedMessageInfo],
			[$ocLicenseExpired, ILicenseManager::LICENSE_STATE_EXPIRED, $expectedMessageInfo],
			[$ocLicenseInvalidExpired, ILicenseManager::LICENSE_STATE_INVALID, $expectedMessageInfo],
		];
	}

	/**
	 * @dataProvider getLicenseMessageForProvider
	 */
	public function testGetLicenseMessageFor($license, $expectedLicenseState, $expectedMessageInfo) {
		$this->timeFactory->method('getTime')->willReturn(100300500);
		$this->licenseFetcher->method('getOwncloudLicense')->willReturn($license);
		$this->messageService->method('getMessageForLicense')->willReturn($expectedMessageInfo);

		$type = (isset($license)) ? $license->getType() : -1;
		$expectedData = [
			'license_state' => $expectedLicenseState,
			'type' => $type,
		];
		$expectedData = \array_merge($expectedData, $expectedMessageInfo);

		$this->assertEquals($expectedData, $this->licenseManager->getLicenseMessageFor('dummyApp'));
	}

	public function checkLicenseForProvider() {
		$ocLicenseValid = $this->createMock(ILicense::class);
		$ocLicenseValid->method('isValid')->willReturn(true);
		$ocLicenseValid->method('getExpirationTime')->willReturn(PHP_INT_MAX);
		$ocLicenseValid->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseInvalid = $this->createMock(ILicense::class);
		$ocLicenseInvalid->method('isValid')->willReturn(false);
		$ocLicenseInvalid->method('getExpirationTime')->willReturn(PHP_INT_MAX);
		$ocLicenseInvalid->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseExpired = $this->createMock(ILicense::class);
		$ocLicenseExpired->method('isValid')->willReturn(true);
		$ocLicenseExpired->method('getExpirationTime')->willReturn(PHP_INT_MIN);
		$ocLicenseExpired->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseInvalidExpired = $this->createMock(ILicense::class);
		$ocLicenseInvalidExpired->method('isValid')->willReturn(false);
		$ocLicenseInvalidExpired->method('getExpirationTime')->willReturn(PHP_INT_MIN);
		$ocLicenseInvalidExpired->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseAboutExpire = $this->createMock(ILicense::class);
		$ocLicenseAboutExpire->method('isValid')->willReturn(true);
		$ocLicenseAboutExpire->method('getExpirationTime')->willReturn(1581945782 + 60);
		$ocLicenseAboutExpire->method('getLicenseString')->willReturn('dummy-license-string');

		$options0 = [];
		$options1 = ['startGracePeriod' => false];
		$options2 = ['startGracePeriod' => true];
		$options3 = ['disableApp' => false];
		$options4 = ['disableApp' => true];
		$options5 = ['startGracePeriod' => false, 'disableApp' => false];
		$options6 = ['startGracePeriod' => false, 'disableApp' => true];
		$options7 = ['startGracePeriod' => true, 'disableApp' => false];
		$options8 = ['startGracePeriod' => true, 'disableApp' => true];
		return [
			/*0*/ [null, 1581945782, null, $options0, true],
			/*1*/ [1581945782, 1581945782, null, $options0, true],  // no license set
			/*2*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), null, $options0, false],
			/*3*/ [null, 1581945782, $ocLicenseValid, $options0, true],
			/*4*/ [1581945782, 1581945782, $ocLicenseValid, $options0, true],
			/*5*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseValid, $options0, true],
			/*6*/ [null, 1581945782, $ocLicenseInvalid, $options0, true],
			/*7*/ [1581945782, 1581945782, $ocLicenseInvalid, $options0, true],
			/*8*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalid, $options0, false],
			/*9*/ [null, 1581945782, $ocLicenseExpired, $options0, true],
			/*10*/ [1581945782, 1581945782, $ocLicenseExpired, $options0, true],
			/*11*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseExpired, $options0, false],
			/*12*/ [null, 1581945782, $ocLicenseInvalidExpired, $options0, true],
			/*13*/ [1581945782, 1581945782, $ocLicenseInvalidExpired, $options0, true],
			/*14*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalidExpired, $options0, false],
			/*15*/ [null, 1581945782, $ocLicenseAboutExpire, $options0, true],
			/*16*/ [1581945782, 1581945782, $ocLicenseAboutExpire, $options0, true],
			/*17*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseAboutExpire, $options0, false],

			/*18*/ [null, 1581945782, null, $options1, false],
			/*19*/ [1581945782, 1581945782, null, $options1, true],  // no license set
			/*20*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), null, $options1, false],
			/*21*/ [null, 1581945782, $ocLicenseValid, $options1, true],
			/*22*/ [1581945782, 1581945782, $ocLicenseValid, $options1, true],
			/*23*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseValid, $options1, true],
			/*24*/ [null, 1581945782, $ocLicenseInvalid, $options1, false],
			/*25*/ [1581945782, 1581945782, $ocLicenseInvalid, $options1, true],
			/*26*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalid, $options1, false],
			/*27*/ [null, 1581945782, $ocLicenseExpired, $options1, false],
			/*28*/ [1581945782, 1581945782, $ocLicenseExpired, $options1, true],
			/*29*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseExpired, $options1, false],
			/*30*/ [null, 1581945782, $ocLicenseInvalidExpired, $options1, false],
			/*31*/ [1581945782, 1581945782, $ocLicenseInvalidExpired, $options1, true],
			/*32*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalidExpired, $options1, false],
			/*33*/ [null, 1581945782, $ocLicenseAboutExpire, $options1, true],
			/*34*/ [1581945782, 1581945782, $ocLicenseAboutExpire, $options1, true],
			/*35*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseAboutExpire, $options1, false],

			/*36*/ [null, 1581945782, null, $options2, true],
			/*37*/ [1581945782, 1581945782, null, $options2, true],  // no license set
			/*38*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), null, $options2, false],
			/*39*/ [null, 1581945782, $ocLicenseValid, $options2, true],
			/*40*/ [1581945782, 1581945782, $ocLicenseValid, $options2, true],
			/*41*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseValid, $options2, true],
			/*42*/ [null, 1581945782, $ocLicenseInvalid, $options2, true],
			/*43*/ [1581945782, 1581945782, $ocLicenseInvalid, $options2, true],
			/*44*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalid, $options2, false],
			/*45*/ [null, 1581945782, $ocLicenseExpired, $options2, true],
			/*46*/ [1581945782, 1581945782, $ocLicenseExpired, $options2, true],
			/*47*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseExpired, $options2, false],
			/*48*/ [null, 1581945782, $ocLicenseInvalidExpired, $options2, true],
			/*49*/ [1581945782, 1581945782, $ocLicenseInvalidExpired, $options2, true],
			/*50*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalidExpired, $options2, false],
			/*51*/ [null, 1581945782, $ocLicenseAboutExpire, $options2, true],
			/*52*/ [1581945782, 1581945782, $ocLicenseAboutExpire, $options2, true],
			/*53*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseAboutExpire, $options2, false],

			/*54*/ [null, 1581945782, null, $options3, true],
			/*55*/ [1581945782, 1581945782, null, $options3, true],  // no license set
			/*56*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), null, $options3, false],
			/*57*/ [null, 1581945782, $ocLicenseValid, $options3, true],
			/*58*/ [1581945782, 1581945782, $ocLicenseValid, $options3, true],
			/*59*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseValid, $options3, true],
			/*60*/ [null, 1581945782, $ocLicenseInvalid, $options3, true],
			/*61*/ [1581945782, 1581945782, $ocLicenseInvalid, $options3, true],
			/*62*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalid, $options3, false],
			/*63*/ [null, 1581945782, $ocLicenseExpired, $options3, true],
			/*64*/ [1581945782, 1581945782, $ocLicenseExpired, $options3, true],
			/*65*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseExpired, $options3, false],
			/*66*/ [null, 1581945782, $ocLicenseInvalidExpired, $options3, true],
			/*67*/ [1581945782, 1581945782, $ocLicenseInvalidExpired, $options3, true],
			/*68*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalidExpired, $options3, false],
			/*69*/ [null, 1581945782, $ocLicenseAboutExpire, $options3, true],
			/*70*/ [1581945782, 1581945782, $ocLicenseAboutExpire, $options3, true],
			/*71*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseAboutExpire, $options3, false],

			/*72*/ [null, 1581945782, null, $options4, true],
			/*73*/ [1581945782, 1581945782, null, $options4, true],  // no license set
			/*74*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), null, $options4, false],
			/*75*/ [null, 1581945782, $ocLicenseValid, $options4, true],
			/*76*/ [1581945782, 1581945782, $ocLicenseValid, $options4, true],
			/*77*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseValid, $options4, true],
			/*78*/ [null, 1581945782, $ocLicenseInvalid, $options4, true],
			/*79*/ [1581945782, 1581945782, $ocLicenseInvalid, $options4, true],
			/*80*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalid, $options4, false],
			/*81*/ [null, 1581945782, $ocLicenseExpired, $options4, true],
			/*82*/ [1581945782, 1581945782, $ocLicenseExpired, $options4, true],
			/*83*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseExpired, $options4, false],
			/*84*/ [null, 1581945782, $ocLicenseInvalidExpired, $options4, true],
			/*85*/ [1581945782, 1581945782, $ocLicenseInvalidExpired, $options4, true],
			/*86*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalidExpired, $options4, false],
			/*87*/ [null, 1581945782, $ocLicenseAboutExpire, $options4, true],
			/*88*/ [1581945782, 1581945782, $ocLicenseAboutExpire, $options4, true],
			/*89*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseAboutExpire, $options4, false],

			/*90*/ [null, 1581945782, null, $options5, false],
			/*91*/ [1581945782, 1581945782, null, $options5, true],  // no license set
			/*92*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), null, $options5, false],
			/*93*/ [null, 1581945782, $ocLicenseValid, $options5, true],
			/*94*/ [1581945782, 1581945782, $ocLicenseValid, $options5, true],
			/*95*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseValid, $options5, true],
			/*96*/ [null, 1581945782, $ocLicenseInvalid, $options5, false],
			/*97*/ [1581945782, 1581945782, $ocLicenseInvalid, $options5, true],
			/*98*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalid, $options5, false],
			/*99*/ [null, 1581945782, $ocLicenseExpired, $options5, false],
			/*100*/ [1581945782, 1581945782, $ocLicenseExpired, $options5, true],
			/*101*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseExpired, $options5, false],
			/*102*/ [null, 1581945782, $ocLicenseInvalidExpired, $options5, false],
			/*103*/ [1581945782, 1581945782, $ocLicenseInvalidExpired, $options5, true],
			/*104*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalidExpired, $options5, false],
			/*105*/ [null, 1581945782, $ocLicenseAboutExpire, $options5, true],
			/*106*/ [1581945782, 1581945782, $ocLicenseAboutExpire, $options5, true],
			/*107*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseAboutExpire, $options5, false],

			/*108*/ [null, 1581945782, null, $options6, false],
			/*109*/ [1581945782, 1581945782, null, $options6, true],  // no license set
			/*110*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), null, $options6, false],
			/*111*/ [null, 1581945782, $ocLicenseValid, $options6, true],
			/*112*/ [1581945782, 1581945782, $ocLicenseValid, $options6, true],
			/*113*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseValid, $options6, true],
			/*114*/ [null, 1581945782, $ocLicenseInvalid, $options6, false],
			/*115*/ [1581945782, 1581945782, $ocLicenseInvalid, $options6, true],
			/*116*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalid, $options6, false],
			/*117*/ [null, 1581945782, $ocLicenseExpired, $options6, false],
			/*118*/ [1581945782, 1581945782, $ocLicenseExpired, $options6, true],
			/*119*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseExpired, $options6, false],
			/*120*/ [null, 1581945782, $ocLicenseInvalidExpired, $options6, false],
			/*121*/ [1581945782, 1581945782, $ocLicenseInvalidExpired, $options6, true],
			/*122*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalidExpired, $options6, false],
			/*123*/ [null, 1581945782, $ocLicenseAboutExpire, $options6, true],
			/*124*/ [1581945782, 1581945782, $ocLicenseAboutExpire, $options6, true],
			/*125*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseAboutExpire, $options6, false],

			/*126*/ [null, 1581945782, null, $options7, true],
			/*127*/ [1581945782, 1581945782, null, $options7, true],  // no license set
			/*128*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), null, $options7, false],
			/*129*/ [null, 1581945782, $ocLicenseValid, $options7, true],
			/*130*/ [1581945782, 1581945782, $ocLicenseValid, $options7, true],
			/*131*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseValid, $options7, true],
			/*132*/ [null, 1581945782, $ocLicenseInvalid, $options7, true],
			/*133*/ [1581945782, 1581945782, $ocLicenseInvalid, $options7, true],
			/*134*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalid, $options7, false],
			/*135*/ [null, 1581945782, $ocLicenseExpired, $options7, true],
			/*136*/ [1581945782, 1581945782, $ocLicenseExpired, $options7, true],
			/*137*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseExpired, $options7, false],
			/*138*/ [null, 1581945782, $ocLicenseInvalidExpired, $options7, true],
			/*139*/ [1581945782, 1581945782, $ocLicenseInvalidExpired, $options7, true],
			/*140*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalidExpired, $options7, false],
			/*141*/ [null, 1581945782, $ocLicenseAboutExpire, $options7, true],
			/*142*/ [1581945782, 1581945782, $ocLicenseAboutExpire, $options7, true],
			/*143*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseAboutExpire, $options7, false],

			/*144*/ [null, 1581945782, null, $options8, true],
			/*145*/ [1581945782, 1581945782, null, $options8, true],  // no license set
			/*146*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), null, $options8, false],
			/*147*/ [null, 1581945782, $ocLicenseValid, $options8, true],
			/*148*/ [1581945782, 1581945782, $ocLicenseValid, $options8, true],
			/*149*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseValid, $options8, true],
			/*150*/ [null, 1581945782, $ocLicenseInvalid, $options8, true],
			/*151*/ [1581945782, 1581945782, $ocLicenseInvalid, $options8, true],
			/*152*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalid, $options8, false],
			/*153*/ [null, 1581945782, $ocLicenseExpired, $options8, true],
			/*154*/ [1581945782, 1581945782, $ocLicenseExpired, $options8, true],
			/*155*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseExpired, $options8, false],
			/*156*/ [null, 1581945782, $ocLicenseInvalidExpired, $options8, true],
			/*157*/ [1581945782, 1581945782, $ocLicenseInvalidExpired, $options8, true],
			/*158*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalidExpired, $options8, false],
			/*159*/ [null, 1581945782, $ocLicenseAboutExpire, $options8, true],
			/*160*/ [1581945782, 1581945782, $ocLicenseAboutExpire, $options8, true],
			/*161*/ [1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseAboutExpire, $options8, false],
		];
	}

	/**
	 * @dataProvider checkLicenseForProvider
	 */
	public function testCheckLicenseFor($gracePeriodStart, $currentTime, $ocLicense, $options, $expectedResult) {
		$this->timeFactory->method('getTime')->willReturn($currentTime);

		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'grace_period', null, $gracePeriodStart],
			]));

		$this->licenseFetcher->method('getOwncloudLicense')->willReturn($ocLicense);

		if ($expectedResult === false && (!isset($options['disableApp']) || $options['disableApp'] === true)) {
			// ensure the app will be disabled
			$this->appManager->expects($this->once())
				->method('disableApp')
				->with('dummyApp');
		} else {
			$this->appManager->expects($this->never())
				->method('disableApp')
				->with('dummyApp');
		}

		$this->assertSame($expectedResult, $this->licenseManager->checkLicenseFor('dummyApp', $options));
	}

	public function checkLicenseForInvalidProvider() {
		$ocLicenseInvalid = $this->createMock(ILicense::class);
		$ocLicenseInvalid->method('isValid')->willReturn(false);
		$ocLicenseInvalid->method('getExpirationTime')->willReturn(PHP_INT_MAX);
		$ocLicenseInvalid->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseExpired = $this->createMock(ILicense::class);
		$ocLicenseExpired->method('isValid')->willReturn(true);
		$ocLicenseExpired->method('getExpirationTime')->willReturn(PHP_INT_MIN);
		$ocLicenseExpired->method('getLicenseString')->willReturn('dummy-license-string');

		$ocLicenseInvalidExpired = $this->createMock(ILicense::class);
		$ocLicenseInvalidExpired->method('isValid')->willReturn(false);
		$ocLicenseInvalidExpired->method('getExpirationTime')->willReturn(PHP_INT_MIN);
		$ocLicenseInvalidExpired->method('getLicenseString')->willReturn('dummy-license-string');
		return [
			[null],  // no license set
			[$ocLicenseInvalid],
			[$ocLicenseExpired],
			[$ocLicenseInvalidExpired],
		];
	}

	/**
	 * Ensure we set a the grace period and register a complain for the app due to invalid license
	 * @dataProvider checkLicenseForInvalidProvider
	 */
	public function testCheckLicenseForWithoutGracePeriodStartedInvalidLicense($ocLicense) {
		$this->timeFactory->method('getTime')->willReturn(100300500);

		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'grace_period', null, null],
			]));

		$this->licenseFetcher->method('getOwncloudLicense')->willReturn($ocLicense);

		$this->appManager->expects($this->never())
			->method('disableApp')
			->with('dummyApp');

		$expectedString = 'dummy-license-string';
		if ($ocLicense === null) {
			$expectedString = '';
		}

		$this->config->expects($this->exactly(2))
			->method('setAppValue')
			->withConsecutive(
				['core', 'grace_period', 100300500],
				['core-license-complains', 'dummyApp', $expectedString]
			);

		$this->assertTrue($this->licenseManager->checkLicenseFor('dummyApp'));
	}

	/**
	 * @dataProvider checkLicenseForInvalidProvider
	 */
	public function testCheckLicenseForWithGracePeriodExpiredInvalidLicense($ocLicense) {
		$this->timeFactory->method('getTime')->willReturn(100300500);

		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'grace_period', null, -100300500],
			]));

		$this->licenseFetcher->method('getOwncloudLicense')->willReturn($ocLicense);

		$this->appManager->expects($this->once())
			->method('disableApp')
			->with('dummyApp');

		$this->config->expects($this->never())
			->method('setAppValue');

		$this->assertFalse($this->licenseManager->checkLicenseFor('dummyApp'));
	}
}
