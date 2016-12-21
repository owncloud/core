<?php
/**
 * @author Tom Needham
 * @copyright 2016 Tom Needham tom@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Tests\Settings\Panels\Profile;

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
        $this->config = $this->getMockBuilder()->getMock();
        $this->helper = $this->getMockBuilder()->getMock();
        $this->groupManager = $this->getMockBuilder()->getMock();
        $this->lfactory = $this->getMockBuilder()->getMock();
        $this->userSession = $this->getMockBuilder()->getMock();
		$this->panel = new Profile(
            $this->config,
            $this->groupManager,
            $this->userSession,
            $this->helper,
            $this->userSession);
	}

	public function testGetSection() {
		$this->assertEquals('general', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertTrue(is_integer($this->panel->getPriority()));
		$this->assertTrue($this->panel->getPriority() > 90);
	}

	public function testGetPanel() {
        $this->lfactory->expects('getLanguage')->willReturn('en');
        $this->config->expects('getUserValue')->with()->willReturn('');
        $this->lfactory->expects('findAvailableLanguages')->willReturn([]);
        $this->lfactory->expects('get')->with('settings', )->willReturn('en');


		$templateHtml = $this->panel->getPanel()->render();
        $this->assertContains('form 2', $templateHtml);
	}

}
