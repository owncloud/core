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
use OCP\AppFramework\Utility\ITimeFactory;
use Test\TestCase;

class MessageServiceTest extends TestCase {
	/** @var IFactory */
	private $l10Factory;
	/** @var ITimeFactory */
	private $timeFactory;
	/** @var MessageService */
	private $messageService;

	protected function setUp(): void {
		parent::setUp();
		$this->l10Factory = $this->createMock(IFactory::class);
		$this->timeFactory = $this->createMock(ITimeFactory::class);

		$this->messageService = new MessageService($this->l10Factory, $this->timeFactory);
	}

	public function getMessageForLicenseProvider() {
		$invalidLicense = $this->createMock(ILicense::class);
		$invalidLicense->method('isValid')->willReturn(false);

		$expiredDemoLicense = $this->createMock(ILicense::class);
		$expiredDemoLicense->method('isValid')->willReturn(true);
		$expiredDemoLicense->method('getExpirationTime')->willReturn(100);
		$expiredDemoLicense->method('getType')->willReturn(ILicense::LICENSE_TYPE_DEMO);

		$expiredLicense = $this->createMock(ILicense::class);
		$expiredLicense->method('isValid')->willReturn(true);
		$expiredLicense->method('getExpirationTime')->willReturn(100);
		$expiredLicense->method('getType')->willReturn(ILicense::LICENSE_TYPE_NORMAL);

		$demoLicense = $this->createMock(ILicense::class);
		$demoLicense->method('isValid')->willReturn(true);
		$demoLicense->method('getExpirationTime')->willReturn(1000000 + (86400 * 15));
		$demoLicense->method('getType')->willReturn(ILicense::LICENSE_TYPE_DEMO);

		$license = $this->createMock(ILicense::class);
		$license->method('isValid')->willReturn(true);
		$license->method('getExpirationTime')->willReturn(1000000 + (86400 * 15));
		$license->method('getType')->willReturn(ILicense::LICENSE_TYPE_NORMAL);

		return [
			[
				null,
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
			],
			[
				$invalidLicense,
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
			],
			[
				$expiredDemoLicense,
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
			],
			[
				$expiredLicense,
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
			],
			[
				$demoLicense,
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
			],
			[
				$license,
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
			],
		];
	}

	/**
	 * @dataProvider getMessageForLicenseProvider
	 */
	public function testGetMessageForLicense($license, $expectedResult) {
		$l10n = $this->createMock(IL10n::class);
		$l10n->method('t')
			->will($this->returnCallback(function ($text, $params) {
				// change the text to camel case so the translated text is more predictable
				return \vsprintf(\ucwords($text), $params);
			}));

		$this->l10Factory->method('get')
			->willReturn($l10n);

		$this->timeFactory->method('getTime')->willReturn(1000000);

		$this->assertEquals($expectedResult, $this->messageService->getMessageForLicense($license));
	}
}
