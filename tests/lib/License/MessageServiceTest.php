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

use OCP\L10N\IFactory;
use OCP\IL10n;
use OC\License\ILicense;
use OC\License\MessageService;
use OCP\License\ILicenseManager;
use Test\TestCase;

class MessageServiceTest extends TestCase {
	/** @var IFactory */
	private $l10Factory;
	/** @var MessageService */
	private $messageService;

	protected function setUp(): void {
		parent::setUp();
		$this->l10Factory = $this->createMock(IFactory::class);

		$this->messageService = new MessageService($this->l10Factory);
	}

	public function getMessageForLicenseProvider() {
		$missingLicenseInfo = [
			'licenseState' => ILicenseManager::LICENSE_STATE_MISSING,
		];

		$invalidLicenseInfo = [
			'licenseState' => ILicenseManager::LICENSE_STATE_INVALID,
		];

		$expiredDemoLicenseInfo = [
			'licenseState' => ILicenseManager::LICENSE_STATE_EXPIRED,
			'licenseType' => ILicense::LICENSE_TYPE_DEMO,
		];

		$expiredLicenseInfo = [
			'licenseState' => ILicenseManager::LICENSE_STATE_EXPIRED,
			'licenseType' => ILicense::LICENSE_TYPE_NORMAL,
		];

		$demoLicenseInfo = [
			'licenseState' => ILicenseManager::LICENSE_STATE_VALID,
			'licenseType' => ILicense::LICENSE_TYPE_DEMO,
			'daysLeft' => 30,
		];

		$licenseInfo = [
			'licenseState' => ILicenseManager::LICENSE_STATE_VALID,
			'licenseType' => ILicense::LICENSE_TYPE_NORMAL,
			'daysLeft' => 30,
		];

		$demoLicenseAboutToExpireInfo = [
			'licenseState' => ILicenseManager::LICENSE_STATE_ABOUT_TO_EXPIRE,
			'licenseType' => ILicense::LICENSE_TYPE_DEMO,
			'daysLeft' => 15,
		];

		$demoLicenseExpiresTodayInfo = [
			'licenseState' => ILicenseManager::LICENSE_STATE_ABOUT_TO_EXPIRE,
			'licenseType' => ILicense::LICENSE_TYPE_DEMO,
			'daysLeft' => 1,
		];

		$licenseAboutToExpireInfo = [
			'licenseState' => ILicenseManager::LICENSE_STATE_ABOUT_TO_EXPIRE,
			'licenseType' => ILicense::LICENSE_TYPE_NORMAL,
			'daysLeft' => 15,
		];

		return [
			[
				$missingLicenseInfo,
				[
					'raw_message' => [
						'No license key available.',
					],
					'translated_message' => [
						'No License Key Available.',
					],
					'contains_html' => [],
				],
			],
			[
				$invalidLicenseInfo,
				[
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
			],
			[
				$expiredDemoLicenseInfo,
				[
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
			],
			[
				$expiredLicenseInfo,
				[
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
			],
			[
				$demoLicenseInfo,
				[
					'raw_message' => [
						'Evaluation - expires in 30 days.',
					],
					'translated_message' => [
						'Evaluation - Expires In 30 Days.',
					],
					'contains_html' => [],
				],
			],
			[
				$licenseInfo,
				[
					'raw_message' => [
						"The registered enterprise license key expires in 30 days",
					],
					'translated_message' => [
						'The Registered Enterprise License Key Expires In 30 Days',
					],
					'contains_html' => [],
				],
			],
			[
				$demoLicenseAboutToExpireInfo,  // no difference with the "normal" demo license message
				[
					'raw_message' => [
						'Evaluation - expires in 15 days.',
					],
					'translated_message' => [
						'Evaluation - Expires In 15 Days.',
					],
					'contains_html' => [],
				]
			],
			[
				$demoLicenseExpiresTodayInfo,
				[
					'raw_message' => [
						'Evaluation - expires today.',
					],
					'translated_message' => [
						'Evaluation - Expires Today.',
					],
					'contains_html' => [],
				]
			],
			[
				$licenseAboutToExpireInfo,
				[
					'raw_message' => [
						"Your Enterprise license key is about to expire (days remaining: 15).",
						'Please contact your administrator or sales@owncloud.com for a new license key.',
					],
					'translated_message' => [
						'Your Enterprise License Key Is About To Expire (days Remaining: 15).',  // ucwords('(dd') doesn't change the string
						'Please Contact Your Administrator Or <a href="mailto:sales@owncloud.com?subject=Renew+ownCloud+License">sales@owncloud.com</a> For A New License Key.',
					],
					'contains_html' => [1],
				],
			],
		];
	}

	/**
	 * @dataProvider getMessageForLicenseProvider
	 */
	public function testGetMessageForLicense($licenseInfo, $expectedResult) {
		$l10n = $this->createMock(IL10n::class);
		$l10n->method('t')
			->will($this->returnCallback(function ($text, $params) {
				// change the text to camel case so the translated text is more predictable
				return \vsprintf(\ucwords($text), $params);
			}));

		$this->l10Factory->method('get')
			->willReturn($l10n);

		$this->assertEquals($expectedResult, $this->messageService->getMessageForLicense($licenseInfo));
	}
}
