<?php
/**
 * @author Lukas Reschke
 * @copyright Copyright (c) 2014 Lukas Reschke lukas@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Tests\Settings\Controller;

use OC\Settings\Application;
use OCP\AppFramework\IAppContainer;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;
use OC\User\User;
use OCP\IConfig;
use OCP\IL10N;
use OC\User\Session;
use OC\Mail\Mailer;

/**
 * @package Tests\Settings\Controller
 */
class MailSettingsControllerTest extends TestCase {
	private IAppContainer $container;

	protected function setUp(): void {
		parent::setUp();

		$app = new Application();
		$this->container = $app->getContainer();
		$this->container['Config'] = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()->getMock();
		$this->container['L10N'] = $this->getMockBuilder(IL10N::class)
			->disableOriginalConstructor()->getMock();
		$this->container['AppName'] = 'settings';
		$this->container['UserSession'] = $this->getMockBuilder(Session::class)
			->disableOriginalConstructor()->getMock();
		$this->container['Mailer'] = $this->getMockBuilder(Mailer::class)
			->setMethods(['send', 'validateMailAddress'])
			->disableOriginalConstructor()->getMock();
		$this->container['Defaults'] = $this->getMockBuilder(\OC_Defaults::class)
			->disableOriginalConstructor()->getMock();
		$this->container['DefaultMailAddress'] = 'no-reply@owncloud.com';
	}

	public function testSetInvalidMail(): void {
		$this->container['L10N']
			->expects($this->exactly(2))
			->method('t')
			->willReturn('Invalid email address');

		$this->container['Mailer']
			->expects($this->exactly(2))
			->method('validateMailAddress')
			->with('@@owncloud.com')
			->willReturn(false);

		// With authentication
		$response = $this->container['MailSettingsController']->setMailSettings(
			'owncloud.com',
			'@',
			'smtp',
			'ssl',
			'mx.owncloud.com',
			'NTLM',
			1,
			'25'
		);
		$expectedResponse = ['data' => ['message' =>'Invalid email address'], 'status' => 'error'];
		$this->assertSame($expectedResponse, $response);

		// Without authentication (testing the deletion of the stored password)
		$response = $this->container['MailSettingsController']->setMailSettings(
			'owncloud.com',
			'@',
			'smtp',
			'ssl',
			'mx.owncloud.com',
			'NTLM',
			0,
			'25'
		);

		$this->assertSame($expectedResponse, $response);
	}

	public function testSetMailSettings(): void {
		$this->container['L10N']
			->expects($this->exactly(2))
			->method('t')
			->willReturn('Saved');

		$this->container['Mailer']
			->expects($this->exactly(2))
			->method('validateMailAddress')
			->with('demo@owncloud.com')
			->willReturn(true);

		/** @var MockObject $config */
		$config = $this->container['Config'];
		$config->expects($this->exactly(2))
			->method('setSystemValues')
			->withConsecutive(
				[[
					'mail_domain' => 'owncloud.com',
					'mail_from_address' => 'demo',
					'mail_smtpmode' => 'smtp',
					'mail_smtpsecure' => 'ssl',
					'mail_smtphost' => 'mx.owncloud.com',
					'mail_smtpauth' => 1,
					'mail_smtpport' => '25',
				]],
				[[
					'mail_domain' => 'owncloud.com',
					'mail_from_address' => 'demo',
					'mail_smtpmode' => 'smtp',
					'mail_smtpsecure' => 'ssl',
					'mail_smtphost' => 'mx.owncloud.com',
					'mail_smtpauth' => null,
					'mail_smtpport' => '587',
					'mail_smtpname' => null,
					'mail_smtppassword' => null
				]]
			);

		// With authentication
		$response = $this->container['MailSettingsController']->setMailSettings(
			'owncloud.com',
			'demo',
			'smtp',
			'ssl',
			'mx.owncloud.com',
			1,
			'25'
		);
		$expectedResponse = ['data' => ['message' =>'Saved'], 'status' => 'success'];
		$this->assertSame($expectedResponse, $response);

		// Without authentication (testing the deletion of the stored password)
		$response = $this->container['MailSettingsController']->setMailSettings(
			'owncloud.com',
			'demo',
			'smtp',
			'ssl',
			'mx.owncloud.com',
			0,
			'587'
		);
		$this->assertSame($expectedResponse, $response);
	}

	public function testStoreCredentials(): void {
		$this->container['L10N']
			->expects($this->once())
			->method('t')
			->willReturn('Saved');

		$this->container['Config']
			->expects($this->once())
			->method('setSystemValues')
			->with([
				'mail_smtpname' => 'UsernameToStore',
				'mail_smtppassword' => 'PasswordToStore',
			]);

		$response = $this->container['MailSettingsController']->storeCredentials('UsernameToStore', 'PasswordToStore');
		$expectedResponse = ['data' => ['message' =>'Saved'], 'status' => 'success'];

		$this->assertSame($expectedResponse, $response);
	}

	public function testSendTestMail(): void {
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()
			->getMock();
		$user
			->method('getUID')
			->willReturn('Werner');
		$user
			->method('getDisplayName')
			->willReturn('Werner Brösel');

		$this->container['L10N']
			->method('t')
			->willReturnMap(
				[
					['You need to set your user email before being able to send test emails.', [],
						'You need to set your user email before being able to send test emails.'],
					['A problem occurred while sending the e-mail. Please revisit your settings.', [],
						'A problem occurred while sending the e-mail. Please revisit your settings.'],
					['Email sent', [], 'Email sent'],
					['test email settings', [], 'test email settings'],
					['If you received this email, the settings seem to be correct.', [],
						'If you received this email, the settings seem to be correct.']
				]
			);
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);

		// Ensure that it fails when no mail address has been specified
		$response = $this->container['MailSettingsController']->sendTestMail();
		$expectedResponse = ['data' => ['message' =>'You need to set your user email before being able to send test emails.'], 'status' => 'error'];
		$this->assertSame($expectedResponse, $response);

		$user
			->method('getEMailAddress')
			->willReturn('mail@example.invalid');
		$response = $this->container['MailSettingsController']->sendTestMail();
		$expectedResponse = ['data' => ['message' =>'Email sent'], 'status' => 'success'];
		$this->assertSame($expectedResponse, $response);
	}
}
