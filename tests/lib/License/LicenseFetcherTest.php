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
use OCP\AppFramework\Utility\ITimeFactory;
use OC\License\ILicense;
use OC\License\LicenseFetcher;
use Test\TestCase;

class LicenseFetcherTest extends TestCase {
	/** @var IConfig */
	private $config;
	/** @var ITimeFactory */
	private $timeFactory;
	/** @var LicenseFetched */
	private $licenseFetcher;

	protected function setUp(): void {
		$this->config = $this->createMock(IConfig::class);
		$this->timeFactory = $this->createMock(ITimeFactory::class);

		$this->licenseFetcher = new LicenseFetcher($this->config, $this->timeFactory);
	}

	public function testGetOwncloudLicense() {
		// licenseFetcher creates a BasicLicense, so we need an acceptable license
		$this->config->expects($this->once())
			->method('getAppValue')
			->with('enterprise_key', 'license-key', null)
			->willReturn(null);

		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('license-key', null)
			->willReturn('dummy_license-20020103-6026e293d642dfa0-739b6db3');

		// can't assert anything more for now
		$fetchedLicense = $this->licenseFetcher->getOwncloudLicense();
		$this->assertInstanceOf(ILicense::class, $fetchedLicense);
		$this->assertSame('dummy_license-20020103-6026e293d642dfa0-739b6db3', $fetchedLicense->getLicenseString());
	}

	public function testGetOwncloudLicenseFromDB() {
		$this->timeFactory->method('getTime')
			->willReturn(1010000000);

		$this->config->expects($this->once())
			->method('getAppValue')
			->with('enterprise_key', 'license-key', null)
			->willReturn('dummy_license-20020103-6026e293d642dfa0-739b6db3');

		// licenseFetcher creates a BasicLicense, so we need an acceptable license
		$this->config->expects($this->never())
			->method('getSystemValue');

		// can't assert anything more for now
		$fetchedLicense = $this->licenseFetcher->getOwncloudLicense();
		$this->assertInstanceOf(ILicense::class, $fetchedLicense);
		$this->assertSame('dummy_license-20020103-6026e293d642dfa0-739b6db3', $fetchedLicense->getLicenseString());
	}

	public function testGetOwncloudLicenseDBExpired() {
		$this->timeFactory->method('getTime')
			->willReturn(1010000000);

		$this->config->expects($this->once())
			->method('getAppValue')
			->with('enterprise_key', 'license-key', null)
			->willReturn('dummy_license-20000103-1ae6b1f3d642dfa0-48e01c22');

		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('license-key', null)
			->willReturn('dummy_license-20020103-6026e293d642dfa0-739b6db3');

		// can't assert anything more for now
		$fetchedLicense = $this->licenseFetcher->getOwncloudLicense();
		$this->assertInstanceOf(ILicense::class, $fetchedLicense);
		$this->assertSame('dummy_license-20020103-6026e293d642dfa0-739b6db3', $fetchedLicense->getLicenseString());
	}

	public function testGetOwncloudLicenseDBInvalid() {
		$this->timeFactory->method('getTime')
			->willReturn(1010000000);

		$this->config->expects($this->once())
			->method('getAppValue')
			->with('enterprise_key', 'license-key', null)
			->willReturn('dummy_inv-20020103-6026e293d642bfa0-739b6aaa');

		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('license-key', null)
			->willReturn('dummy_license-20020103-6026e293d642dfa0-739b6db3');

		// can't assert anything more for now
		$fetchedLicense = $this->licenseFetcher->getOwncloudLicense();
		$this->assertInstanceOf(ILicense::class, $fetchedLicense);
		$this->assertSame('dummy_license-20020103-6026e293d642dfa0-739b6db3', $fetchedLicense->getLicenseString());
	}

	public function testGetOwncloudLicenseDBInvalidConfigMissing() {
		$this->timeFactory->method('getTime')
			->willReturn(1010000000);

		$this->config->expects($this->once())
			->method('getAppValue')
			->with('enterprise_key', 'license-key', null)
			->willReturn('dummy_inv-20020103-6026e293d642bfa0-739b6aaa');

		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('license-key', null)
			->willReturn(null);

		// can't assert anything more for now
		$fetchedLicense = $this->licenseFetcher->getOwncloudLicense();
		$this->assertInstanceOf(ILicense::class, $fetchedLicense);
		$this->assertSame('dummy_inv-20020103-6026e293d642bfa0-739b6aaa', $fetchedLicense->getLicenseString());
	}

	public function testGetOwncloudLicenseMissing() {
		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('license-key', null)
			->willReturn(null);

		$this->config->expects($this->once())
			->method('getAppValue')
			->with('enterprise_key', 'license-key', null)
			->willReturn(null);

		$this->assertNull($this->licenseFetcher->getOwncloudLicense());
	}

	public function testSetOwncloudLicense() {
		$dummyLicense = 'dummy_license_string';

		$this->config->expects($this->once())
			->method('setAppValue');

		$this->assertNull($this->licenseFetcher->setOwncloudLicense($dummyLicense));
	}
}
