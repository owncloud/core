<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace Tests\Settings\Controller;

use OC\Settings\Application;
use OC\Settings\Controller\LegalSettingsController;
use OCP\IConfig;

/**
 * @package Tests\Settings\Controller
 */
class LegalSettingsControllerTest extends \Test\TestCase {
	/**
	 * @var \OCP\AppFramework\IAppContainer
	 */
	private $container;

	/**
	 * @var LegalSettingsController
	 */
	private $legalSettingsController;

	protected function setUp() {
		$app = new Application();
		$this->container = $app->getContainer();
		$this->container['Config'] = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()->getMock();
		$this->container['AppName'] = 'settings';
		$this->legalSettingsController = $this->container['LegalSettingsController'];
	}

	/**
	 * @dataProvider linkData
	 */
	public function testSetImprintUrl($link) {
		$this->container['Config']
			->expects($this->once())
			->method('setAppValue')
			->with('core', 'legal.imprint_url', $link);

		$response = $this->legalSettingsController->setImprintUrl($link);
		$this->assertArrayHasKey('status', $response);
	}

	/**
	 * @dataProvider linkData
	 */
	public function testSetPrivacyPolicyUrl($link) {
		$this->container['Config']
			->expects($this->once())
			->method('setAppValue')
			->with('core', 'legal.privacy_policy_url', $link);

		$response = $this->legalSettingsController->setPrivacyPolicyUrl($link);
		$this->assertArrayHasKey('status', $response);
	}

	public function linkData() {
		return [
			['https://some.url'],
		];
	}
}
