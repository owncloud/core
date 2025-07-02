<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Michael Jobst <mjobst+github@tecratech.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Tom Needham <tom@owncloud.com>
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

namespace OCA\UpdateNotification\Tests\Controller;

use OCA\UpdateNotification\Controller\AdminController;
use OCA\UpdateNotification\UpdateChecker;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\BackgroundJob\IJobList;
use OCP\IConfig;
use OCP\IDateTimeFormatter;
use OCP\IL10N;
use OCP\IRequest;
use OCP\Security\ISecureRandom;
use Test\TestCase;

class AdminControllerTest extends TestCase {
	/** @var IRequest */
	private $request;
	/** @var IJobList */
	private $jobList;
	/** @var ISecureRandom */
	private $secureRandom;
	/** @var IConfig */
	private $config;
	/** @var AdminController */
	private $adminController;
	/** @var ITimeFactory */
	private $timeFactory;
	/** @var IL10N */
	private $l10n;
	/** @var UpdateChecker */
	private $updateChecker;
	/** @var IDateTimeFormatter */
	private $dateTimeFormatter;

	public function setUp(): void {
		parent::setUp();

		$this->request = $this->createMock('\\OCP\\IRequest');
		$this->jobList = $this->createMock('\\OCP\\BackgroundJob\\IJobList');
		$this->secureRandom = $this->createMock('\\OCP\\Security\\ISecureRandom');
		$this->config = $this->createMock('\\OCP\\IConfig');
		$this->timeFactory = $this->createMock('\\OCP\\AppFramework\\Utility\\ITimeFactory');
		$this->l10n = $this->createMock('\\OCP\\IL10N');
		$this->updateChecker = $this->getMockBuilder('\\OCA\\UpdateNotification\\UpdateChecker')
			->disableOriginalConstructor()->getMock();
		$this->dateTimeFormatter = $this->createMock('\\OCP\\IDateTimeFormatter');

		$this->adminController = new AdminController(
			'updatenotification',
			$this->request,
			$this->jobList,
			$this->secureRandom,
			$this->config,
			$this->timeFactory,
			$this->l10n,
			$this->updateChecker,
			$this->dateTimeFormatter
		);
	}

	public function testDisplayPanelWithUpdate() {
		$channels = [
			'daily',
			'beta',
			'stable',
			'production',
		];
		$currentChannel = \OCP\Util::getChannel();

		// Remove the currently used channel from the channels list
		if (($key = \array_search($currentChannel, $channels)) !== false) {
			unset($channels[$key]);
		}

		$this->config
			->expects($this->exactly(2))
			->method('getAppValue')
			->willReturnMap([
				['core', 'lastupdatedat', '', '12345'],
				['updatenotification', 'notify_groups', '["admin"]', '["admin"]'],
			]);
		$this->dateTimeFormatter
			->expects($this->once())
			->method('formatDateTime')
			->with('12345')
			->willReturn('LastCheckedReturnValue');
		$this->updateChecker
			->expects($this->once())
			->method('getUpdateState')
			->willReturn(['updateVersion' => 'ownCloud 10.7.0']);

		$params = [
			'isNewVersionAvailable' => true,
			'lastChecked' => 'LastCheckedReturnValue',
			'currentChannel' => \OCP\Util::getChannel(),
			'channels' => $channels,
			'newVersionString' => 'ownCloud 10.7.0',
			'notify_groups' => 'admin'
		];

		$expected = new TemplateResponse('updatenotification', 'admin', $params, '');
		$this->assertEquals($expected, $this->adminController->displayPanel());
	}

	public function testDisplayPanelWithoutUpdate() {
		$channels = [
			'daily',
			'beta',
			'stable',
			'production',
		];
		$currentChannel = \OCP\Util::getChannel();

		// Remove the currently used channel from the channels list
		if (($key = \array_search($currentChannel, $channels)) !== false) {
			unset($channels[$key]);
		}

		$this->config
			->expects($this->exactly(2))
			->method('getAppValue')
			->willReturnMap([
				['core', 'lastupdatedat', '', '12345'],
				['updatenotification', 'notify_groups', '["admin"]', '["admin"]'],
			]);
		$this->dateTimeFormatter
			->expects($this->once())
			->method('formatDateTime')
			->with('12345')
			->willReturn('LastCheckedReturnValue');
		$this->updateChecker
			->expects($this->once())
			->method('getUpdateState')
			->willReturn([]);

		$params = [
			'isNewVersionAvailable' => false,
			'lastChecked' => 'LastCheckedReturnValue',
			'currentChannel' => \OCP\Util::getChannel(),
			'channels' => $channels,
			'newVersionString' => '',
			'notify_groups' => 'admin',
		];

		$expected = new TemplateResponse('updatenotification', 'admin', $params, '');
		$this->assertEquals($expected, $this->adminController->displayPanel());
	}

	public function testGetPriority() {
		$this->assertIsInt($this->adminController->getPriority());
	}

	public function testGetSectionID() {
		$this->assertEquals('general', $this->adminController->getSectionID());
	}
}
