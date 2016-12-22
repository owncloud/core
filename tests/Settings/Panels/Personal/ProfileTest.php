<?php
/**
 * @author Tom Needham
 * @copyright 2016 Tom Needham tom@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Tests\Settings\Panels\Personal;

use OC\Settings\Panels\Personal\Profile;

/**
 * @package Tests\Settings\Panels\Personal
 */
class ProfileTest extends \Test\TestCase {

	/** @var \OC\Settings\Panels\Personal\Profile */
	private $panel;

	private $config;

    private $helper;

    private $groupManager;

    private $lfactory;

    private $userSession;

	public function setUp() {
		parent::setUp();
        $this->config = $this->getMockBuilder('\OCP\IConfig')->getMock();
        $this->helper = $this->getMockBuilder('\OC\Settings\Panels\Helper')->getMock();
        $this->groupManager = $this->getMockBuilder('\OCP\IGroupManager')->getMock();
        $this->lfactory = $this->getMockBuilder('\OCP\IL10N\IFactory')->getMock();
        $this->userSession = $this->getMockBuilder('\OCP\IUserSession')->getMock();
		$this->panel = new Profile(
            $this->config,
            $this->groupManager,
            $this->userSession,
            $this->helper,
            $this->lfactory);
	}

	public function testGetSection() {
		$this->assertEquals('general', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertTrue(is_integer($this->panel->getPriority()));
		$this->assertTrue($this->panel->getPriority() > 90);
	}

	public function testGetPanel() {
        $this->lfactory->expects($this->once())->method('getLanguage')->will($this->returnValue('en'));
        $this->config->expects($this->once())->method('getUserValue')->will($this->returnValue(''));
        $this->lfactory->expects($this->once())->method('findAvailableLanguages')->will($this->returnValue([]));
        $this->lfactory->expects($this->once())->method('get')->with('settings')->will($this->returnValue('en'));
		$templateHtml = $this->panel->getPanel()->fetchPage();
        $this->assertContains('form 2', $templateHtml);
	}

}
