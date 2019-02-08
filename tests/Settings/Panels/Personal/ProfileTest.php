<?php
/**
* @author Tom Needham
* @copyright Copyright (c) 2016 Tom Needham tom@owncloud.com
*
* This file is licensed under the Affero General Public License version 3 or
* later.
* See the COPYING-README file.
*/

namespace Tests\Settings\Panels\Personal;

use OC\Helper\LocaleHelper;
use OC\Settings\Panels\Personal\Profile;
use OCP\IConfig;
use OCP\IGroupManager;
use OCP\IUser;
use OCP\IUserSession;
use OCP\L10N\IFactory;

/**
* @package Tests\Settings\Panels\Personal
*/
class ProfileTest extends \Test\TestCase {

	/** @var Profile */
	private $panel;
	/** @var IConfig */
	private $config;
	/** @var IGroupManager */
	private $groupManager;
	/** @var IFactory */
	private $lfactory;
	/** @var IUserSession */
	private $userSession;

	public function setUp() {
		parent::setUp();
		$this->config = $this->getMockBuilder(IConfig::class)->getMock();
		$this->groupManager = $this->getMockBuilder(IGroupManager::class)->getMock();
		$this->lfactory = $this->createMock(IFactory::class);
		$this->userSession = $this->getMockBuilder(IUserSession::class)->getMock();
		$this->panel = new Profile(
			$this->config,
			$this->groupManager,
			$this->userSession,
			$this->lfactory,
			new LocaleHelper()
		);
	}

	public function testGetSection() {
		$this->assertEquals('general', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertInternalType('int', $this->panel->getPriority());
		$this->assertGreaterThan(90, $this->panel->getPriority());
	}

	public function testGetPanel() {
		$user = $this->createMock(IUser::class);
		$user->expects($this->once())->method('getEMailAddress')->will($this->returnValue('test@example.com'));
		$this->userSession->expects($this->exactly(7))->method('getUser')->will($this->returnValue($user));
		$this->groupManager->expects($this->once())->method('getUserGroupIds')->will($this->returnValue(['group1', 'group2']));
		$this->lfactory->expects($this->once())->method('findLanguage')->will($this->returnValue('en'));
		$this->config->expects($this->once())->method('getUserValue')->will($this->returnValue(''));
		$this->lfactory->expects($this->once())->method('findAvailableLanguages')->will($this->returnValue([]));
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('test@example.com', $templateHtml);
		$this->assertContains('<div id="groups" class="section">', $templateHtml);
		$this->assertContains('group2', $templateHtml);
		$this->assertContains('<select id="languageinput" name="lang"', $templateHtml);
	}
}
