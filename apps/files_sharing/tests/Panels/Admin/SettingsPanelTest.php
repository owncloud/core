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

use OCP\GroupInterface;
use OCA\Files_Sharing\SharingBlacklist;
use OCA\Files_Sharing\Panels\Admin\SettingsPanel;

class SettingsPanelTest extends \Test\TestCase {
	/** @var SharingBlacklist | \PHPUnit\Framework\MockObject\MockObject */
	private $sharingBlacklist;

	/** @var SettingsPanel | \PHPUnit\Framework\MockObject\MockObject */
	private $settingsPanel;

	protected function setUp(): void {
		$this->sharingBlacklist = $this->getMockBuilder(SharingBlacklist::class)
			->disableOriginalConstructor()
			->getMock();

		$this->settingsPanel = new SettingsPanel($this->sharingBlacklist);
	}

	public function testGetSectionID() {
		$this->assertEquals('sharing', $this->settingsPanel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertEquals(95, $this->settingsPanel->getPriority());
	}

	public function testGetPanel() {
		$this->sharingBlacklist->method('getBlacklistedReceiverGroups')->willReturn([]);

		$page = $this->settingsPanel->getPanel()->fetchPage();
		$doc = new \DOMDocument();
		$doc->loadHTML($page);
		$xpath = new \DOMXPath($doc);

		$inputNodes = $xpath->query('//input[@name="blacklisted_receiver_groups"]');
		$this->assertEquals(1, $inputNodes->length);  // only 1 element should be found
		$inputNode = $inputNodes->item(0);
		$this->assertSame('', $inputNode->attributes->getNamedItem('value')->value);
	}

	public function getPanelWithBlacklistProvider() {
		return [
			[['group1']],
			[['group1', 'group2']],
			[['group1', 'group2', 'group3']],
			[['1234mkdds_lklk', '12345678-1234-1234-123456789abcdf']],
		];
	}

	/**
	 * @dataProvider getPanelWithBlacklistProvider
	 */
	public function testGetPanelWithBlacklist($ids) {
		$this->sharingBlacklist->method('getBlacklistedReceiverGroups')->willReturn($ids);

		$page = $this->settingsPanel->getPanel()->fetchPage();
		$doc = new \DOMDocument();
		$doc->loadHTML($page);
		$xpath = new \DOMXPath($doc);

		$inputNodes = $xpath->query('//input[@name="blacklisted_receiver_groups"]');
		$this->assertEquals(1, $inputNodes->length);  // only 1 element should be found
		$inputNode = $inputNodes->item(0);
		$this->assertSame(\implode("|", $ids), $inputNode->attributes->getNamedItem('value')->value);
	}
}
