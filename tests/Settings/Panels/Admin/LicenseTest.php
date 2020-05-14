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
use OC\License\LicenseFetcher;
use OC\License\MessageService;

/**
 * @package Tests\Settings\Panels\Admin
 */
class LicenseTest extends \Test\TestCase {
	/** @var License */
	private $panel;
	/** @var LicenseFetcher */
	private $licenseFetcher;
	/** @var MessageService */
	private $messageService;

	protected function setUp(): void {
		parent::setUp();
		$this->licenseFetcher = $this->createMock(LicenseFetcher::class);
		$this->messageService = $this->createMock(MessageService::class);

		$this->panel = new License($this->licenseFetcher, $this->messageService);
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
					'code' => MessageService::MESSAGE_LICENSE_MISSING,
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
					'code' => MessageService::MESSAGE_LICENSE_INVALID,
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
					'code' => MessageService::MESSAGE_LICENSE_EXPIRED_DEMO,
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
					'code' => MessageService::MESSAGE_LICENSE_EXPIRED_NORMAL,
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
					'code' => MessageService::MESSAGE_LICENSE_OK_DEMO,
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
					'code' => MessageService::MESSAGE_LICENSE_OK_NORMAL,
					'raw_message' => [
						"The registered enterprise license key expires in 15 days",
					],
					'translated_message' => [
						'The Registered Enterprise License Key Expires In 15 Days',
					],
					'contains_html' => [],
				],
				'',
				'The Registered Enterprise License Key Expires In 15 Days',
			],
		];
	}

	/**
	 * @dataProvider getPanelProvider
	 */
	public function testGetPanel($messageOutput, $expectedDivClass, $expectedMessage) {
		$license = $this->createMock(ILicense::class);
		$this->licenseFetcher->method('getOwncloudLicense')->willReturn($license);

		$this->messageService->method('getMessageForLicense')->willReturn($messageOutput);

		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertStringContainsString('<input id="license_input_button" type="button"', $templateHtml);
		$this->assertStringContainsString("<div id=\"license_message_div\" $expectedDivClass>", $templateHtml);
		$this->assertStringContainsString("<p>$expectedMessage</p>", $templateHtml);
	}
}
