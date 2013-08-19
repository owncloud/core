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
		$this->logger->notice('Started update of shares to Share API 2');
		$sql = 'SELECT `id`, `share_type`, `share_with`, `uid_owner` AS `share_owner`, '.
			'`item_type`, `item_source`, `file_source`, `permissions`, `stime` AS `share_time`, '.
			'`expiration` AS `expiration_time`, `token` FROM `*PREFIX*share`';
		$result = \OC_DB::executeAudited($sql);
		while ($row = $result->fetchRow()) {
			$this->updateShare($row);
		}
		$this->logger->notice('Finished update of shares to Share API 2');
	}

	/**
	 * Update the share specified by the $row
	 * @param array $row
	 */
	protected function updateShare($row) {
		$id = $row['id'];
		$token = null;
		$password = null;
		unset($row['id']);
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
				$token = $row['token'];
				if (isset($row['share_with'])) {
					$password = $row['share_with'];
					unset($row['share_with']);
				}
			} else {
				$this->logger->error('Unable to update share with id: '.$id.' '.
					'because the share type is unknown', array('app' => 'core')
				);
				return;
			}
			unset($row['share_type']);
			if (isset($row['file_source'])) {
				$row['item_source'] = $row['file_source'];
			}
			unset($row['file_source']);
			settype($row['permissions'], 'int');
			settype($row['share_time'], 'int');
			if (isset($row['expiration_time'])) {
				$date = new DateTime($row['expiration_time']);
				$row['expiration_time'] = $date->getTimeStamp();
			}
			try {
				$share = Share::fromRow($row);
				$this->shareManager->share($share);
				if (isset($token)) {
					// Reuse old token and password
					$sql = 'UPDATE `*PREFIX*shares_links` SET `token` = ?, `password` = ? '.
						'WHERE `id` = ?';
					\OC_DB::executeAudited($sql, array($token, $password, $id));
				}
			} catch (Exception $exception) {
				$this->logger->error('Unable to update share with id: '.$id.' '.
					'because of an exception: '.$exception->getMessage(), array('app' => 'core')
				);
			}
		}
	}

}