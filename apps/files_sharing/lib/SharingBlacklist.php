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

namespace OCA\Files_Sharing;

use OCP\IConfig;
use OCP\IGroup;

/**
 * Class to handle a blacklist for sharing. The main functionality is to check if a particular group
 * has been blacklisted for sharing, which means that no one should be able to share with that group.
 *
 * Note that this class will only handle the configuration and perform the checks against the configuration.
 * This class won't prevent the sharing action by itself.
 */
class SharingBlacklist {
	/** @var IConfig */
	private $config;

	private $blacklistCache = null;

	public function __construct(IConfig $config) {
		$this->config = $config;
	}

	/**
	 * Check if the target group is blacklisted
	 * @param IGroup $group the group to check
	 * @return bool true if the group is blacklisted, false otherwise
	 */
	public function isGroupBlacklisted(IGroup $group) {
		$this->initCache();
		return (isset($this->blacklistCache['receivers']['ids'][$group->getGID()]));
	}

	/**
	 * Clear the internal cache of this class. Use this function if any of the keys used by this class are changed
	 * outside of this class, such as a direct change of the 'blacklisted_group_displaynames' in the appconfig table
	 * Note that this is an object-based cache. It won't persist for multiple HTTP requests
	 */
	public function clearCache() {
		$this->blacklistCache = null;
	}

	/**
	 * Set the list of groups to be blacklisted by id.
	 * @param string[] $ids a list with the ids of the groups to be blacklisted
	 */
	public function setBlacklistedReceiverGroups(array $ids) {
		$this->config->setAppValue('files_sharing', 'blacklisted_receiver_groups', \json_encode($ids));
		$this->blacklistCache = null;  // clear the cache
	}

	/**
	 * Get the list of blacklisted group ids
	 * Note that this might contain wrong information
	 * @return string[] the list of group ids
	 */
	public function getBlacklistedReceiverGroups() {
		return \array_keys($this->fetchBlacklistedReceiverGroupIds());
	}

	private function initCache() {
		if ($this->blacklistCache === null) {
			$this->blacklistCache = [
				'receivers' => [
					'ids' => $this->fetchBlacklistedReceiverGroupIds(),
				],
			];
		}
	}

	/**
	 * @return bool[] an array with group ids as the keys, the values do not matter
	 *                If the blacklisted receiver groups cannot be parsed as valid JSON,
	 *                then an empty list is returned.
	 *                Any parsed group ids that are not string, int or float are dropped from the list.
	 */
	private function fetchBlacklistedReceiverGroupIds() {
		$configuredBlacklist = $this->config->getAppValue('files_sharing', 'blacklisted_receiver_groups', '[]');
		$decodedGroups = \json_decode($configuredBlacklist, true);

		if (!\is_array($decodedGroups)) {
			$decodedGroups = [];
		}

		$groupSet = [];
		foreach ($decodedGroups as $group) {
			if (\is_string($group) || \is_int($group) || \is_float($group)) {
				$groupSet[(string) $group] = true;
			}
		}

		return $groupSet;
	}
}
