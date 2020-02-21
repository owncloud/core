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
use OCP\License\ILicenseManager;
use Test\TestCase;

class LicenseManagerTest extends TestCase {
	/** @var LicenseFetcher */
	private $licenseFetcher;
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
		$this->appManager = $this->createMock(IAppManager::class);
		$this->config = $this->createMock(IConfig::class);
		$this->timeFactory = $this->createMock(ITimeFactory::class);
		$this->logger = $this->createMock(ILogger::class);

		$this->licenseManager = new LicenseManager(
			$this->licenseFetcher,
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
		return [
			[null, 1581945782, null, true],
			[1581945782, 1581945782, null, true],  // no license set
			[1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), null, false],
			[null, 1581945782, $ocLicenseValid, true],
			[1581945782, 1581945782, $ocLicenseValid, true],
			[1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseValid, true],
			[null, 1581945782, $ocLicenseInvalid, true],
			[1581945782, 1581945782, $ocLicenseInvalid, true],
			[1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalid, false],
			[null, 1581945782, $ocLicenseExpired, true],
			[1581945782, 1581945782, $ocLicenseExpired, true],
			[1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseExpired, false],
			[null, 1581945782, $ocLicenseInvalidExpired, true],
			[1581945782, 1581945782, $ocLicenseInvalidExpired, true],
			[1581945782, 1581945782 + (LicenseManager::GRACE_PERIOD * 2), $ocLicenseInvalidExpired, false],
		];
	}

	/**
	 * @dataProvider checkLicenseForProvider
	 */
	public function testCheckLicenseFor($gracePeriodStart, $currentTime, $ocLicense, $expectedResult) {
		$this->timeFactory->method('getTime')->willReturn($currentTime);

		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'grace_period', null, $gracePeriodStart],
			]));

		$this->licenseFetcher->method('getOwncloudLicense')->willReturn($ocLicense);

		if ($expectedResult === false) {
			// ensure the app will be disabled
			$this->appManager->expects($this->once())
				->method('disableApp')
				->with('dummyApp');
		}

		$this->assertSame($expectedResult, $this->licenseManager->checkLicenseFor('dummyApp'));
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
