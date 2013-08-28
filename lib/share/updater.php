<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2013 Michael Gapczynski mtgap@owncloud.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OC\Share;

use OC\Log;
use DateTime;
use Exception;

/**
 * Update old shares to Share API 2.0.0
 */
class Updater {

	private $shareManager;
	private $logger;
	private $shareTypeGroupUserUnique = 2;
	private $updatedShares;

	/**
	 * The constructor
	 * @param \OC\Share\ShareManager $shareManager
	 * @param \OC\Log $logger
	 */
	public function __construct(ShareManager $shareManager, Log $logger) {
		$this->shareManager = $shareManager;
		$this->logger = $logger;
	}

	/**
	 * Update all shares
	 */
	public function updateAll() {
		$version = \OC_Appconfig::getValue('core', 'shareAPIVersion', '1.0.0');
		if ($version === '1.0.0') {
			$this->logger->notice('Started update of shares to Share API 2');
			$sql = 'SELECT `id`, `parent`, `share_type`, `share_with`, `uid_owner`, `item_type`, '.
				'`item_source`, `file_source`, `permissions`, `stime`, `expiration`, `token` '.
				'FROM `*PREFIX*share`';
			$result = \OC_DB::executeAudited($sql);
			while ($row = $result->fetchRow()) {
				$this->updateShare($row);
			}
			$this->logger->notice('Finished update of shares to Share API 2');
			\OC_Appconfig::setValue('core', 'shareAPIVersion', '2.0.0');
		}
	}

	/**
	 * Update the share specified by the $row
	 * @param array $row
	 * @return \OC\Share\Share | false
	 */
	protected function updateShare($row) {
		$id = $row['id'];
		if (!isset($this->updatedShares[$id])) {
			$share = $this->getShareFromRow($row);
			if ($share) {
				// Ensure all parent shares are already updated
				$latestParentTime = false;
				$parentRows = $this->searchForParents($row);
				foreach ($parentRows as $parentRow) {
					$parent = $this->updateShare($parentRow);
					if ($parent) {
						// Find the latest parent expiration time
						$time = $parent->getExpirationTime();
						if (!isset($time)) {
							$latestParentTime = null;
						} else if ($latestParentTime === false
							|| (isset($latestParentTime) && $time > $latestParentTime)
						) {
							$latestParentTime = $time;
						}
					}
				}
				if ($latestParentTime !== false) {
					$time = $share->getExpirationTime();
					// Truncate expiration time as necessary
					if (!isset($time) || $latestParentTime < $time) {
						$share->setExpirationTime($latestParentTime);
					}
				}
				try {
					$token = $share->getToken();
					$password = $share->getPassword();
					$share = $this->shareManager->share($share);
					$this->updatedShares[$id] = $share;
					if (isset($token)) {
						// Reuse old token and password
						$sql = 'UPDATE `*PREFIX*shares_links` SET `token` = ?, `password` = ? '.
							'WHERE `id` = ?';
						\OC_DB::executeAudited($sql, array($token, $password, $share->getId()));
					}
				} catch (Exception $exception) {
					$this->logger->error('Unable to update share with id: '.$id.' '.
						'because of an exception: '.$exception->getMessage(),
						array('app' => 'core')
					);
					$this->updatedShares[$id] = false;
				}
			} else {
				$this->updatedShares[$id] = false;
			}
		}
		return $this->updatedShares[$id];
	}

	/**
	 * Translate an old database row to a share
	 * @param array $row
	 * @return \OC\Share\Share | null
	 */
	protected function getShareFromRow($row) {
		$id = $row['id'];
		unset($row['id']);
		unset($row['parent']);
		settype($row['share_type'], 'int');
		// The group user unique target shares can be ignored because the unique targets
		// are handled by the group share type
		if ($row['share_type'] !== $this->shareTypeGroupUserUnique) {
			if ($row['share_type'] === \OCP\Share::SHARE_TYPE_USER) {
				$row['share_type_id'] = 'user';
			} else if ($row['share_type'] === \OCP\Share::SHARE_TYPE_GROUP) {
				$row['share_type_id'] = 'group';
			} else if ($row['share_type'] === \OCP\Share::SHARE_TYPE_LINK) {
				$row['share_type_id'] = 'link';
				if (isset($row['share_with'])) {
					$row['password'] = $row['share_with'];
					unset($row['share_with']);
				}
			} else {
				$this->logger->error('Unable to update share with id: '.$id.' '.
					'because the share type is unknown', array('app' => 'core')
				);
				return null;
			}
			unset($row['share_type']);
			$row['share_owner'] = $row['uid_owner'];
			unset($row['uid_owner']);
			if (isset($row['file_source'])) {
				$row['item_source'] = $row['file_source'];
			}
			unset($row['file_source']);
			settype($row['permissions'], 'int');
			if ($row['item_type'] === 'file') {
				// Remove Create permission from files
				$row['permissions'] &= ~4;
			}
			$row['share_time'] = $row['stime'];
			unset($row['stime']);
			settype($row['share_time'], 'int');
			if (isset($row['expiration'])) {
				$date = new DateTime($row['expiration']);
				$row['expiration_time'] = $date->getTimeStamp();
			}
			unset($row['expiration']);
			return Share::fromRow($row);
		}
		return null;
	}

	/**
	 * Search for parent shares of a share
	 * @param array $row
	 * @return array
	 */
	protected function searchForParents($row) {
		$parentRows = array();
		if (isset($row['parent'])) {
			$sql = 'SELECT `id`, `parent`, `share_type`, `share_with`, `uid_owner`, `item_type`, '.
				'`item_source`, `file_source`, `permissions`, `stime`, `expiration`, `token` '.
				'FROM `*PREFIX*share` WHERE `id` = ?';
			$parentRow = \OC_DB::executeAudited($sql, array($row['parent']), 1)->fetchRow();
			if ($parentRow) {
				$parentRows[] = $parentRow;
				// Look for shares similar to parent
				$sql = 'SELECT `id`, `parent`, `share_type`, `share_with`, `uid_owner`, '.
					'`item_type`, `item_source`, `file_source`, `permissions`, `stime`, '.
					'`expiration`, `token` FROM `*PREFIX*share`';
				$params = array();
				if ($parentRow['item_type'] === 'file') {
					$sql .= ' WHERE `item_type` IN (?, ?)';
					$params[] = 'file';
					$params[] = 'folder';
				} else {
					$sql .= ' WHERE `item_type` = ?';
					$params[] = $parentRow['item_type'];
				}
				// A trick for reshared files inside shared folders is that the item_source
				// is always the file id of the shared folder, thanks to bad programming
				$sql .= ' AND `item_source` = ?';
				$params[] = $parentRow['item_source'];
				$sql .= ' AND `share_type` IN (?, ?)';
				$params[] = \OCP\Share::SHARE_TYPE_USER;
				$params[] = \OCP\Share::SHARE_TYPE_GROUP;
				$user = $row['uid_owner'];
				$userAndGroups = array_merge(array($user), \OC_Group::getUserGroups($user));
				$placeholders = join(',', array_fill(0, count($userAndGroups), '?'));
				$sql .= ' AND `share_with` IN ('.$placeholders.')';
				$params = array_merge($params, $userAndGroups);
				$sql .= ' AND `id` != ?';
				$params[] = $row['parent'];
				$result = \OC_DB::executeAudited($sql, $params);
				while ($row = $result->fetchRow()) {
					$parentRows[] = $row;
				}
			}
		}
		return $parentRows;
	}

}