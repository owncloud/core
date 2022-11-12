<?php
/**
 * @author Jan Ackermann <jackermann@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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
use OCA\Files_Sharing\SharingAllowlist;
use OCP\IGroupManager;
use OCP\IUser;

class SharingAllowlistTest extends \Test\TestCase {
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;

	/** @var IGroupManager | \PHPUnit\Framework\MockObject\MockObject */
	private $groupManager;

	/** @var SharingAllowlist | \PHPUnit\Framework\MockObject\MockObject */
	private $sharingAllowlist;

	public function setUp(): void {
		$this->config = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()
			->getMock();

		$this->groupManager = $this->getMockBuilder(IGroupManager::class)
			->disableOriginalConstructor()
			->getMock();

		$this->sharingAllowlist= new SharingAllowlist($this->config, $this->groupManager);
	}

	/**
	 * @dataProvider isPublicShareSharersGroupsAllowlistEnabledDataProvider
	 */
	public function testIsPublicShareSharersGroupsAllowlistEnabled($config, $result) {
		$this->config->method('getAppValue')
			->will($this->returnValueMap($config));

		$this->assertEquals($this->sharingAllowlist->isPublicShareSharersGroupsAllowlistEnabled(), $result);
	}

	public function isPublicShareSharersGroupsAllowlistEnabledDataProvider() {
		return [
			[[['files_sharing', 'public_share_sharers_groups_allowlist_enabled', 'no', 'yes']], true ],
			[[['files_sharing', 'public_share_sharers_groups_allowlist_enabled', 'no', 'no']], false ],
		];
	}

	/**
	 * @dataProvider isGroupInPublicShareSharersAllowlistDataProvider
	 */
	public function testIsGroupInPublicShareSharersAllowlist($config, $groupId, $result) {
		$this->config->method('getAppValue')
			->will($this->returnValueMap($config));

		$group = $this->createMock(IGroup::class);
		$group->method('getGID')
			->willReturn($groupId);

		$this->assertEquals($this->sharingAllowlist->isGroupInPublicShareSharersAllowlist($group), $result);
	}

	public function isGroupInPublicShareSharersAllowlistDataProvider() {
		return [
			[[['files_sharing', 'public_share_sharers_groups_allowlist', '[]', '[]']], 'admin', false ],
			[[['files_sharing', 'public_share_sharers_groups_allowlist', '[]', '["group1","group2"]']], 'admin', false ],
			[[['files_sharing', 'public_share_sharers_groups_allowlist', '[]', '["group1","group2","admin"]']], 'admin', true ],
			[[['files_sharing', 'public_share_sharers_groups_allowlist', '[]', '["admin"]']], 'admin', true ],
		];
	}

	/**
	 * @dataProvider isUserInPublicShareSharersGroupsAllowlistDataProvider
	 */
	public function testIsUserInPublicShareSharersGroupsAllowlist($config, $userGroupIds, $result) {
		$this->config->method('getAppValue')
			->will($this->returnValueMap($config));

		$user = $this->createMock(IUser::class);
		$groups = [];

		foreach ($userGroupIds as $userGroupId) {
			$group = $this->createMock(IGroup::class);
			$group->method('getGID')
				->willReturn($userGroupId);
			$groups[] = $group;
		}

		$this->groupManager->expects($this->any())->method('getUserGroups')
			->willReturn($groups);

		$this->assertEquals($this->sharingAllowlist->isUserInPublicShareSharersGroupsAllowlist($user), $result);
	}

	public function isUserInPublicShareSharersGroupsAllowlistDataProvider() {
		return [
			[[['files_sharing', 'public_share_sharers_groups_allowlist', '[]', '[]']], [], true ],
			[[['files_sharing', 'public_share_sharers_groups_allowlist', '[]', '[]']], ['admin'], true ],
			[[['files_sharing', 'public_share_sharers_groups_allowlist', '[]', '["group1","group2"]']], [], false ],
			[[['files_sharing', 'public_share_sharers_groups_allowlist', '[]', '["group1","group2"]']], ['admin'], false ],
			[[['files_sharing', 'public_share_sharers_groups_allowlist', '[]', '["group1","group2", "admin"]']], ['admin'], true ],
			[[['files_sharing', 'public_share_sharers_groups_allowlist', '[]', '["group1","group2", "admin"]']], ['group1','group2', 'admin'], true ],
			[[['files_sharing', 'public_share_sharers_groups_allowlist', '[]', '["group1","group2", "admin"]']], ['group1','group2', 'group3', 'admin'], true ],
		];
	}

	/**
	 * @dataProvider getPublicShareSharersGroupsAllowlistDataProvider
	 */
	public function testGetPublicShareSharersGroupsAllowlist($config, $result) {
		$this->config->method('getAppValue')
			->will($this->returnValueMap($config));

		$this->assertEquals($this->sharingAllowlist->getPublicShareSharersGroupsAllowlist(), $result);
	}

	public function getPublicShareSharersGroupsAllowlistDataProvider() {
		return [
			[[['files_sharing', 'public_share_sharers_groups_allowlist', '[]', '']], []],
			[[['files_sharing', 'public_share_sharers_groups_allowlist', '[]', '["invalid JSON missing right square bracket"']], []],
			[[['files_sharing', 'public_share_sharers_groups_allowlist', '[]', '[]']], [] ],
			[[['files_sharing', 'public_share_sharers_groups_allowlist', '[]', '["group1", "group2"]']], ['group1', 'group2']],
		];
	}

	/**
	 * @dataProvider setPublicShareSharersGroupsAllowlistEnabledDataProvider
	 */
	public function testSetPublicShareSharersGroupsAllowlistEnabled($config, $result) {
		$this->config->method('setAppValue')
			->will($this->returnValueMap($config));

		$this->config->method('getAppValue')
			->will($this->returnValueMap($config));

		$this->sharingAllowlist->setPublicShareSharersGroupsAllowlistEnabled($result);
		$this->assertEquals($this->sharingAllowlist->isPublicShareSharersGroupsAllowlistEnabled(), $result);
	}

	public function setPublicShareSharersGroupsAllowlistEnabledDataProvider() {
		return [
			[[['files_sharing', 'public_share_sharers_groups_allowlist_enabled', 'no', 'yes']], true ],
			[[['files_sharing', 'public_share_sharers_groups_allowlist_enabled', 'no', 'no']], false ],
		];
	}

	public function testSetPublicShareSharersGroupsAllowlist() {
		$this->config->method('setAppValue')
			->will($this->returnValueMap([['files_sharing', 'public_share_sharers_groups_allowlist', '["group1", "group2"]']]));

		$this->config->method('getAppValue')
			->will($this->returnValueMap([['files_sharing', 'public_share_sharers_groups_allowlist', '[]', '["group1", "group2"]']]));

		$this->sharingAllowlist->setPublicShareSharersGroupsAllowlist(["group1", "group2"]);
		$this->assertEquals(["group1", "group2"], $this->sharingAllowlist->getPublicShareSharersGroupsAllowlist());
	}
}
