<?php
/**
 * @author Tom Needham
 * @copyright Copyright (c) 2016 Tom Needham tom@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Tests\Settings\Panels\Admin;

use OC\Settings\Panels\Admin\Mail;
use OC\Settings\Panels\Helper;
use OCP\IConfig;
use OCP\IUser;
use OCP\IUserSession;

/**
 * @package Tests\Settings\Panels\Admin
 */
class MailTest extends \Test\TestCase {
	private \OC\Settings\Panels\Admin\Mail $panel;
	/** @var IConfig */
	private \PHPUnit\Framework\MockObject\MockObject $config;
	/** @var Helper */
	private \PHPUnit\Framework\MockObject\MockObject $helper;
	/** @var IUserSession */
	private \PHPUnit\Framework\MockObject\MockObject $userSession;
	/** @var IUser */
	private \PHPUnit\Framework\MockObject\MockObject $user;

	public function setUp(): void {
		parent::setUp();
		$this->config = $this->getMockBuilder(IConfig::class)->getMock();
		$this->helper = $this->getMockBuilder(Helper::class)->getMock();
		$this->userSession = $this->getMockBuilder(IUserSession::class)->getMock();
		$this->user = $this->getMockBuilder(IUser::class)->getMock();
		$this->panel = new Mail($this->config, $this->helper, $this->userSession);
	}

	public function testGetSection() {
		$this->assertEquals('general', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertIsInt($this->panel->getPriority());
		$this->assertGreaterThan(-100, $this->panel->getPriority());
		$this->assertLessThan(100, $this->panel->getPriority());
	}

	public function testGetPanel() {
		$this->userSession->expects($this->once())->method('getUser')->willReturn($this->user);
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertStringContainsString(
			'<form id="mail_general_settings_form"',
			$templateHtml
		);
	}
}
