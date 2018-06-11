<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
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
namespace OCA\Files_Sharing\Tests\Panels\Admin;

use OCP\IGroupManager;
use OCP\GroupInterface;
use OCA\Files_Sharing\SharingBlacklist;
use OCA\Files_Sharing\Panels\Admin\SettingsPanel;

class SettingsPanelTest extends \Test\TestCase {
	/** @var IGroupManager | \PHPUnit_Framework_MockObject_MockObject */
	private $groupManager;

	/** @var SharingBlacklist | \PHPUnit_Framework_MockObject_MockObject */
	private $sharingBlacklist;

	/** @var SettingsPanel | \PHPUnit_Framework_MockObject_MockObject */
	private $settingsPanel;

	protected function setUp() {
		$this->groupManager = $this->getMockBuilder(IGroupManager::class)
			->disableOriginalConstructor()
			->getMock();

		$this->sharingBlacklist = $this->getMockBuilder(SharingBlacklist::class)
			->disableOriginalConstructor()
			->getMock();

		$this->settingsPanel = new SettingsPanel($this->groupManager, $this->sharingBlacklist);
	}

	public function testGetSectionID() {
		$this->assertEquals('sharing', $this->settingsPanel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertEquals(0, $this->settingsPanel->getPriority());
	}

	public function testGetPanel() {
		$mockBackend1 = $this->getMockBuilder(GroupInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$mockBackend2 = $this->getMockBuilder(GroupInterface::class)
			->disableOriginalConstructor()
			->getMock();

		$this->groupManager->method('getBackends')->willReturn([$mockBackend1, $mockBackend2]);

		$this->sharingBlacklist->method('getBlacklistedGroupDisplaynames')->willReturn('');

		$page = $this->settingsPanel->getPanel()->fetchPage();
		$doc = new \DOMDocument();
		$doc->loadHTML($page);
		$xpath = new \DOMXPath($doc);
		$backendNodes = $xpath->query('//div[@id="files_sharing"]//ul[@class="groupBackends"]/li/text()');

		$validClassNames = [\get_class($mockBackend1), \get_class($mockBackend2)];
		\sort($validClassNames);

		$writtenNames = [];
		foreach ($backendNodes as $backendNode) {
			$writtenNames[] = $backendNode->wholeText;
		}
		\sort($writtenNames);

		$this->assertEquals($validClassNames, $writtenNames);

		$textareaText = $xpath->query('//div[@id="files_sharing"]//textarea[@name="blacklisted_group_displaynames"]');
		$this->assertEquals(1, $textareaText->length);  // only 1 element should be found
		$this->assertFalse($textareaText->item(0)->hasChildNodes());
	}

	public function testGetPanelWithBlacklist() {
		$mockBackend1 = $this->getMockBuilder(GroupInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$mockBackend2 = $this->getMockBuilder(GroupInterface::class)
			->disableOriginalConstructor()
			->getMock();

		$this->groupManager->method('getBackends')->willReturn([$mockBackend1, $mockBackend2]);

		$this->sharingBlacklist->method('getBlacklistedGroupDisplaynames')->willReturn("backend1::displayname1\nbackend2::displayname2");

		$page = $this->settingsPanel->getPanel()->fetchPage();
		$doc = new \DOMDocument();
		$doc->loadHTML($page);
		$xpath = new \DOMXPath($doc);
		$backendNodes = $xpath->query('//div[@id="files_sharing"]//ul[@class="groupBackends"]/li/text()');

		$validClassNames = [\get_class($mockBackend1), \get_class($mockBackend2)];
		\sort($validClassNames);

		$writtenNames = [];
		foreach ($backendNodes as $backendNode) {
			$writtenNames[] = $backendNode->wholeText;
		}
		\sort($writtenNames);

		$this->assertEquals($validClassNames, $writtenNames);

		$textareaText = $xpath->query('//div[@id="files_sharing"]//textarea[@name="blacklisted_group_displaynames"]/text()');
		$this->assertEquals(1, $textareaText->length);  // only 1 element should be found
		$this->assertEquals("backend1::displayname1\nbackend2::displayname2", $textareaText->item(0)->wholeText);
	}
}