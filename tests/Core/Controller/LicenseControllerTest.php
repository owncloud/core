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

namespace Tests\Core\Controller;

use OCP\IRequest;
use OCP\License\ILicenseManager;
use OC\Core\Controller\LicenseController;
use Test\TestCase;

class LicenseControllerTest extends TestCase {
	/** @var IRequest */
	private $request;
	/** @var ILicenseManager */
	private $licenseManager;
	/** @var LicenseController */
	private $licenseController;

	protected function setUp(): void {
		parent::setUp();
		$this->request = $this->createMock(IRequest::class);
		$this->licenseManager = $this->createMock(ILicenseManager::class);

		$this->licenseController = new LicenseController('core', $this->request, $this->licenseManager);
	}

	public function testGetGracePeriod() {
		$this->licenseManager->method('getGracePeriod')
			->willReturn([
				'start' => 100200300,
				'end' => 100300500,
			]);

		$expected = [
			'start' => 100200300,
			'end' => 100300500,
		];
		$this->assertSame($expected, $this->licenseController->getGracePeriod()->getData());
	}

	public function getGracePeriodWithAppsProvider() {
		return [
			[[], 0],
			[['appid1'], 1],
			[['appid1', 'appid2'], 2],
			[['appid1', 'appid2', 'appid3'], 3],
		];
	}

	/**
	 * @dataProvider getGracePeriodWithAppsProvider
	 */
	public function testGetGracePeriodWithApps($appList, $expectedCount) {
		$this->licenseManager->method('getGracePeriod')
			->willReturn([
				'apps' => $appList,
				'start' => 100200300,
				'end' => 100300500,
			]);

		$expected = [
			'apps' => $expectedCount,
			'start' => 100200300,
			'end' => 100300500,
		];
		$this->assertSame($expected, $this->licenseController->getGracePeriod()->getData());
	}

	public function testSetNewLicense() {
		$dummyLicense = 'oc_3344_cba1223_fdac1223';
		$this->licenseManager->expects($this->once())
			->method('setLicenseString')
			->with($dummyLicense);

		$this->assertSame([], $this->licenseController->setNewLicense($dummyLicense)->getData());
	}
}
