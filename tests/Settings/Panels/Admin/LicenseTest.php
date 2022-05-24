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

namespace Tests\Settings\Panels\Admin;

use OC\Settings\Panels\Admin\License;
use OC\License\ILicense;
use OCP\License\ILicenseManager;

/**
 * @package Tests\Settings\Panels\Admin
 */
class LicenseTest extends \Test\TestCase {
	/** @var License */
	private $panel;
	/** @var ILicenseManager */
	private $licenseManager;

	protected function setUp(): void {
		parent::setUp();
		$this->licenseManager = $this->createMock(ILicenseManager::class);

		$this->panel = new License($this->licenseManager);
	}

	public function testGetSection() {
		$this->assertSame('general', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertSame(20, $this->panel->getPriority());
	}

	public function getPanelProvider() {
		return [
			[
				[
					'license_state' => ILicenseManager::LICENSE_STATE_MISSING,
					'type' => -1,
					'raw_message' => [
						'No license key available.',
					],
					'translated_message' => [
						'No License Key Available.',
					],
					'contains_html' => [],
				],
				'',
				'No License Key Available.',
			],
			[
				[
					'license_state' => ILicenseManager::LICENSE_STATE_INVALID,
					'type' => 0,
					'raw_message' => [
						'Invalid license key!',
						'Please contact your administrator or sales@owncloud.com for a new license key.',
					],
					'translated_message' => [
						'Invalid License Key!',
						'Please Contact Your Administrator Or <a href="mailto:sales@owncloud.com?subject=Renew+ownCloud+License">sales@owncloud.com</a> For A New License Key.',
					],
					'contains_html' => [1],
				],
				'class="warning"',
				'Invalid License Key!',  // should also contain the "please contact you admin" sentence
			],
			[
				[
					'license_state' => ILicenseManager::LICENSE_STATE_EXPIRED,
					'type' => 1,
					'raw_message' => [
						'Your Enterprise license key has expired.',
						'Enterprise features have been disabled.',
						'Please contact your administrator or sales@owncloud.com for a new license key.',
					],
					'translated_message' => [
						'Your Enterprise License Key Has Expired.',
						'Enterprise Features Have Been Disabled.',
						'Please Contact Your Administrator Or <a href="mailto:sales@owncloud.com?subject=Renew+ownCloud+License">sales@owncloud.com</a> For A New License Key.',
					],
					'contains_html' => [2],
				],
				'class="warning"',
				'Your Enterprise License Key Has Expired.'
			],
			[
				[
					'license_state' => ILicenseManager::LICENSE_STATE_EXPIRED,
					'type' => 0,
					'raw_message' => [
						'Your Enterprise license key has expired.',
						'Please contact your administrator or sales@owncloud.com for a new license key.',
					],
					'translated_message' => [
						'Your Enterprise License Key Has Expired.',
						'Please Contact Your Administrator Or <a href="mailto:sales@owncloud.com?subject=Renew+ownCloud+License">sales@owncloud.com</a> For A New License Key.',
					],
					'contains_html' => [1],
				],
				'class="warning"',
				'Your Enterprise License Key Has Expired.',
			],
			[
				[
					'license_state' => ILicenseManager::LICENSE_STATE_VALID,
					'type' => 1,
					'raw_message' => [
						'Evaluation - expires in 15 days.',
					],
					'translated_message' => [
						'Evaluation - Expires In 15 Days.',
					],
					'contains_html' => [],
				],
				'',
				'Evaluation - Expires In 15 Days.',
			],
			[
				[
					'license_state' => ILicenseManager::LICENSE_STATE_VALID,
					'type' => 0,
					'raw_message' => [
						"The registered enterprise license key expires in 15 days.",
					],
					'translated_message' => [
						'The Registered Enterprise License Key Expires In 15 Days.',
					],
					'contains_html' => [],
				],
				'',
				'The Registered Enterprise License Key Expires In 15 Days.',
			],
			[
				[
					'license_state' => ILicenseManager::LICENSE_STATE_ABOUT_TO_EXPIRE,
					'type' => 0,
					'raw_message' => [
						"Your Enterprise license key is about to expire (days remaining: 15).",
						'Please contact your administrator or sales@owncloud.com for a new license key.',
					],
					'translated_message' => [
						'Your Enterprise License Key Is About To Expire (Days Remaining: 15).',
						'Please Contact Your Administrator Or <a href="mailto:sales@owncloud.com?subject=Renew+ownCloud+License">sales@owncloud.com</a> For A New License Key.',
					],
					'contains_html' => [1],
				],
				'',
				'Your Enterprise License Key Is About To Expire (Days Remaining: 15).',
			],
		];
	}

	/**
	 * @dataProvider getPanelProvider
	 */
	public function testGetPanel($messageOutput, $expectedDivClass, $expectedMessage) {
		$license = $this->createMock(ILicense::class);
		$this->licenseManager->method('getLicenseMessageFor')->willReturn($messageOutput);

		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertStringContainsString('<input id="license_input_button" type="button"', $templateHtml);
		$this->assertStringContainsString("<div id=\"license_message_div\" $expectedDivClass>", $templateHtml);
		$this->assertStringContainsString("<p>$expectedMessage</p>", $templateHtml);
	}
}
