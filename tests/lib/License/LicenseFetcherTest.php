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
use OC\License\ILicense;
use OC\License\LicenseFetcher;
use Test\TestCase;

class LicenseFetcherTest extends TestCase {
	/** @var IConfig */
	private $config;
	/** @var LicenseFetched */
	private $licenseFetcher;

	protected function setUp(): void {
		$this->config = $this->createMock(IConfig::class);

		$this->licenseFetcher = new LicenseFetcher($this->config);
	}

	public function testGetOwncloudLicense() {
		// licenseFetcher creates a BasicLicense, so we need an acceptable license
		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('license-key', null)
			->willReturn('dummy_license-20202020-abd564-ffa4352');

		// can't assert anything more for now
		$this->assertInstanceOf(ILicense::class, $this->licenseFetcher->getOwncloudLicense());
	}

	public function testGetOwncloudLicenseMissing() {
		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('license-key', null)
			->willReturn(null);

		$this->assertNull($this->licenseFetcher->getOwncloudLicense());
	}

	public function testSetOwncloudLicense() {
		$dummyLicense = 'dummy_license_string';
		$this->config->expects($this->once())
			->method('setSystemValue')
			->with('license-key', $dummyLicense);

		$this->assertNull($this->licenseFetcher->setOwncloudLicense($dummyLicense));
	}
}
