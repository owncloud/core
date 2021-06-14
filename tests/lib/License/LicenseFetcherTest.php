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

use OC\License\BasicLicense;
use OCP\IConfig;
use OCP\AppFramework\Utility\ITimeFactory;
use OC\License\ILicense;
use OC\License\LicenseFetcher;
use Test\TestCase;

class LicenseFetcherTest extends TestCase {
	/** @var IConfig */
	private $config;
	/** @var ITimeFactory */
	private $timeFactory;
	/** @var LicenseFetcher */
	private $licenseFetcher;

	protected function setUp(): void {
		$this->config = $this->createMock(IConfig::class);
		$this->timeFactory = $this->createMock(ITimeFactory::class);

		$this->licenseFetcher = new LicenseFetcher($this->config, $this->timeFactory);
	}

	public function testGetOwncloudLicense(): void {
		// licenseFetcher creates a BasicLicense, so we need an acceptable license
		$this->config->expects(self::once())
			->method('getAppValue')
			->with('enterprise_key', 'license-key', null)
			->willReturn(null);

		$this->config->expects(self::exactly(2))
			->method('getSystemValue')
			->willReturnCallback(static function ($key) {
				if ($key === 'license-key') {
					return 'dummy_license-20020103-6026e293d642dfa0-739b6db3';
				}
				if ($key === 'license-class') {
					return BasicLicense::class;
				}
				throw new \Exception('Invalid argument');
			});

		// can't assert anything more for now
		$fetchedLicense = $this->licenseFetcher->getOwncloudLicense();
		self::assertInstanceOf(ILicense::class, $fetchedLicense);
		self::assertSame('dummy_license-20020103-6026e293d642dfa0-739b6db3', $fetchedLicense->getLicenseString());
	}

	public function testGetOwncloudLicenseFromDB(): void {
		$this->timeFactory->method('getTime')
			->willReturn(1010000000);

		$this->config->expects(self::once())
			->method('getAppValue')
			->with('enterprise_key', 'license-key', null)
			->willReturn('dummy_license-20020103-6026e293d642dfa0-739b6db3');

		// licenseFetcher creates a BasicLicense, so we need an acceptable license
		$this->config->expects(self::once())
			->method('getSystemValue')
			->willReturn(BasicLicense::class);

		// can't assert anything more for now
		$fetchedLicense = $this->licenseFetcher->getOwncloudLicense();
		self::assertInstanceOf(ILicense::class, $fetchedLicense);
		self::assertSame('dummy_license-20020103-6026e293d642dfa0-739b6db3', $fetchedLicense->getLicenseString());
	}

	public function testGetOwncloudLicenseDBExpired(): void {
		$this->timeFactory->method('getTime')
			->willReturn(1010000000);

		$this->config->expects(self::once())
			->method('getAppValue')
			->with('enterprise_key', 'license-key', null)
			->willReturn('dummy_license-20000103-1ae6b1f3d642dfa0-48e01c22');

		$this->config->expects(self::exactly(2))
			->method('getSystemValue')
			->willReturnCallback(static function ($key) {
				if ($key === 'license-key') {
					return 'dummy_license-20020103-6026e293d642dfa0-739b6db3';
				}
				if ($key === 'license-class') {
					return BasicLicense::class;
				}
				throw new \Exception('Invalid argument');
			});

		// can't assert anything more for now
		$fetchedLicense = $this->licenseFetcher->getOwncloudLicense();
		self::assertInstanceOf(ILicense::class, $fetchedLicense);
		self::assertSame('dummy_license-20020103-6026e293d642dfa0-739b6db3', $fetchedLicense->getLicenseString());
	}

	public function testGetOwncloudLicenseDBInvalid(): void {
		$this->timeFactory->method('getTime')
			->willReturn(1010000000);

		$this->config->expects(self::once())
			->method('getAppValue')
			->with('enterprise_key', 'license-key', null)
			->willReturn('dummy_inv-20020103-6026e293d642bfa0-739b6aaa');

		$this->config->expects(self::exactly(2))
			->method('getSystemValue')
			->willReturnCallback(static function ($key) {
				if ($key === 'license-key') {
					return 'dummy_license-20020103-6026e293d642dfa0-739b6db3';
				}
				if ($key === 'license-class') {
					return BasicLicense::class;
				}
				throw new \Exception('Invalid argument');
			});

		// can't assert anything more for now
		$fetchedLicense = $this->licenseFetcher->getOwncloudLicense();
		self::assertInstanceOf(ILicense::class, $fetchedLicense);
		self::assertSame('dummy_license-20020103-6026e293d642dfa0-739b6db3', $fetchedLicense->getLicenseString());
	}

	public function testGetOwncloudLicenseDBInvalidConfigMissing(): void {
		$this->timeFactory->method('getTime')
			->willReturn(1010000000);

		$this->config->expects(self::exactly(2))
			->method('getSystemValue')
			->willReturnCallback(static function ($key) {
				if ($key === 'license-key') {
					return 'dummy_inv-20020103-6026e293d642bfa0-739b6aaa';
				}
				if ($key === 'license-class') {
					return BasicLicense::class;
				}
				throw new \Exception('Invalid argument');
			});

		// can't assert anything more for now
		$fetchedLicense = $this->licenseFetcher->getOwncloudLicense();
		self::assertInstanceOf(ILicense::class, $fetchedLicense);
		self::assertSame('dummy_inv-20020103-6026e293d642bfa0-739b6aaa', $fetchedLicense->getLicenseString());
	}

	public function testGetOwncloudLicenseMissing(): void {
		$this->config->expects(self::exactly(2))
			->method('getSystemValue')
			->willReturnCallback(static function ($key) {
				if ($key === 'license-key') {
					return null;
				}
				if ($key === 'license-class') {
					return BasicLicense::class;
				}
				throw new \Exception('Invalid argument');
			});

		$this->config->expects(self::once())
			->method('getAppValue')
			->with('enterprise_key', 'license-key', null)
			->willReturn(null);

		self::assertNull($this->licenseFetcher->getOwncloudLicense());
	}

	public function testSetOwncloudLicense(): void {
		$dummyLicense = 'dummy_license_string';

		$this->config->expects(self::once())
			->method('setAppValue');

		$this->licenseFetcher->setOwncloudLicense($dummyLicense);
	}

	public function testRemoveOwncloudLicense(): void {
		$this->config->expects($this->once())
			->method('deleteAppValue')->with('enterprise_key', 'license-key');

		$this->config->expects($this->once())
			->method('deleteSystemValue')->with('license-key');

		$this->assertNull($this->licenseFetcher->removeOwncloudLicense());
	}
}
