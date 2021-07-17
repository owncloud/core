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

namespace OCA\Files_Sharing;

use OCP\IConfig;
use OCP\IGroup;
use OCP\IUser;
use OCP\IGroupManager;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Class to handle an allowlist for sharing. The main functionality is to check if a particular group
 * is in the allowlist for public sharing, which means that only users in a group in the allowlist should be able to create public shares.
 *
 * Note that this class will only handle the configuration and perform the checks against the configuration.
 * This class won't prevent the sharing action by itself.
 */
class SharingAllowlist {
	/** @var IConfig */
	private $config;

	/** @var IGroupManager */
	private $groupManager;

	public function __construct(IConfig $config, IGroupManager $groupManager) {
		$this->config = $config;
		$this->groupManager = $groupManager;
	}

	/**
	 * Check if the allowlist is enabled
	 * @return bool true if allowlist is enabled, false otherwise
	 */
	public function isPublicShareSharersGroupsAllowlistEnabled() {
		$configRecord = $this->config->getAppValue('files_sharing', 'public_share_sharers_groups_allowlist_enabled', 'no');
		return $configRecord === 'yes';
	}

	/**
	 * Check if the target group is in allowlist
	 * @param IGroup $group the group to check
	 * @return bool true if the group is in allowlist, false otherwise
	 */
	public function isGroupInPublicShareSharersAllowlist(IGroup $group) {
		return \in_array($group->getGID(), $this->fetchPublicShareSharersGroupsAllowlist());
	}

	/**
	 * Set the list of groups to be in allowlist by id.
	 * @param string[] $ids a list with the ids of the groups in allowlist
	 */
	public function setPublicShareSharersGroupsAllowlist(array $ids) {
		$this->config->setAppValue('files_sharing', 'public_share_sharers_groups_allowlist', \json_encode($ids));
	}

	/**
	 * Set allowlist enabled.
	 * @param bool $enabled the value if enabled or not
	 */
	public function setPublicShareSharersGroupsAllowlistEnabled(bool $enabled) {
		$this->config->setAppValue('files_sharing', 'public_share_sharers_groups_allowlist_enabled', $enabled ? 'yes' : 'no');
	}

	/**
	 * Get the list of group ids in allowlist
	 * Note that this might contain group ids that have since been deleted
	 * @return string[] the list of group ids
	 */
	public function getPublicShareSharersGroupsAllowlist() {
		return  $this->fetchPublicShareSharersGroupsAllowlist();
	}

	/**
	 * Check if a given user is assigned to any group in allowlist
	 * @param IUser $user the user to check
	 * @return bool true if the user is assigned to any group in allowlist, false otherwise
	 */
	public function isUserInPublicShareSharersGroupsAllowlist(IUser $user) {
		// Evaluate to true, if the admin enables the settings but don't set any groups.
		if (empty($this->fetchPublicShareSharersGroupsAllowlist())) {
			return true;
		}

		$userGroups = $this->groupManager->getUserGroups($user);

		foreach ($userGroups as $userGroup) {
			if ($this->isGroupInPublicShareSharersAllowlist($userGroup)) {
				return true;
			}
		}

		return false;
	}

	/**
	 * @return bool[] an array with group ids
	 *                If the allowlist groups cannot be parsed as valid JSON,
	 *                then an empty list is returned.
	 */
	private function fetchPublicShareSharersGroupsAllowlist() {
		$configuredAllowlist = $this->config->getAppValue('files_sharing', 'public_share_sharers_groups_allowlist', '[]');
		$parsedValues = json_decode($configuredAllowlist, true);
		return $parsedValues === null ? [] : $parsedValues;
	}
}
