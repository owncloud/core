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
namespace OCA\Files_Sharing\Tests;

use OCP\IConfig;
use OCP\IGroup;
use OCP\GroupInterface;
use OCA\Files_Sharing\SharingBlacklist;

class SharingBlacklistTest extends \Test\TestCase {
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;

	/** @var SharingBlacklist | \PHPUnit\Framework\MockObject\MockObject */
	private $sharingBlacklist;

	public function setUp(): void {
		$this->config = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()
			->getMock();

		$this->sharingBlacklist = new SharingBlacklist($this->config);
	}

	public function setGetBlacklistedReceiverGroupsProvider() {
		return [
			[[]],
			[["group1"]],
			[["group1", "group2", "group3"]],
		];
	}

	/**
	 * @dataProvider setGetBlacklistedReceiverGroupsProvider
	 */
	public function testSetGetBlacklistedReceiverGroups($ids) {
		$keyValues = [];
		$this->config->method('setAppValue')
			->will($this->returnCallback(function ($app, $key, $value) use (&$keyValues) {
				$keyValues[$key] = $value;
			}));

		$this->config->method('getAppValue')
			->will($this->returnCallback(function ($app, $key, $default) use (&$keyValues) {
				return (isset($keyValues[$key])) ? $keyValues[$key] : $default;
			}));

		$this->sharingBlacklist->setBlacklistedReceiverGroups($ids);
		$this->assertEquals($ids, $this->sharingBlacklist->getBlacklistedReceiverGroups());
	}

	private function getGroupMock($id, $displayname) {
		$groupMock = $this->getMockBuilder(IGroup::class)
			->disableOriginalConstructor()
			->getMock();

		$groupBackendMock = $this->getMockBuilder(GroupInterface::class)
			->disableOriginalConstructor()
			->getMock();

		$groupMock->method('getBackend')->willReturn($groupBackendMock);
		$groupMock->method('getGID')->willReturn($id);
		$groupMock->method('getDisplayName')->willReturn($displayname);
		return $groupMock;
	}

	public function isGroupBlacklistedProvider() {
		$groupMock1 = $this->getGroupMock('Mygroup', 'my group');
		return [
			[$groupMock1, '["Mygroup"]'],
			[$groupMock1, '["Mygroup", "my_other_group"]'],
			[$groupMock1, '["one group", "Mygroup"]'],
		];
	}

	/**
	 * @dataProvider isGroupBlacklistedProvider
	 */
	public function testIsGroupBlacklisted($group, $configValue) {
		$this->config->method('getAppValue')->willReturn($configValue);

		$this->assertTrue($this->sharingBlacklist->isGroupBlacklisted($group));
	}

	public function isGroupBlacklistedNotBlacklistedProvider() {
		$groupMock1 = $this->getGroupMock('Mygroup', 'my group');
		return [
			[$groupMock1, '[]'],
			[$groupMock1, '["my group"]'],
			[$groupMock1, '["Mygroup2", "my group"]'],
		];
	}

	/**
	 * @dataProvider isGroupBlacklistedNotBlacklistedProvider
	 */
	public function testIsGroupBlacklistedNotBlacklisted($group, $configValue) {
		$this->config->method('getAppValue')->willReturn($configValue);

		$this->assertFalse($this->sharingBlacklist->isGroupBlacklisted($group));
	}
}
