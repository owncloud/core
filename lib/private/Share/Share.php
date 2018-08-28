<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Bernhard Reiter <ockham@raz.or.at>
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Daniel Hansson <enoch85@gmail.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Michael Kuhn <suraia@ikkoku.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Sebastian Döll <sebastian.doell@libasys.de>
 * @author Stefan Weil <sw@weilnetz.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Torben Dannhauer <torben@dannhauer.de>
 * @author Vincent Petry <pvince81@owncloud.com>
 * @author Volkan Gezer <volkangezer@gmail.com>
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

namespace OC\Share;

use OC\Files\Filesystem;
use OC\Group\Group;
use OCA\FederatedFileSharing\DiscoveryManager;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IUser;
use OCP\IUserSession;
use OCP\IDBConnection;
use OCP\IConfig;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * This class provides the ability for apps to share their content between users.
 *
 * It provides the following hooks:
 *  - post_shared
 */
class Share extends Constants {

	/** CRUDS permissions (Create, Read, Update, Delete, Share) using a bitmask
	 * Construct permissions for share() and setPermissions with Or (|) e.g.
	 * Give user read and update permissions: PERMISSION_READ | PERMISSION_UPDATE
	 *
	 * Check if permission is granted with And (&) e.g. Check if delete is
	 * granted: if ($permissions & PERMISSION_DELETE)
	 *
	 * Remove permissions with And (&) and Not (~) e.g. Remove the update
	 * permission: $permissions &= ~PERMISSION_UPDATE
	 *
	 * Apps are required to handle permissions on their own, this class only
	 * stores and manages the permissions of shares
	 * @see lib/public/constants.php
	 */

	/**
	 * Check if the Share API is enabled
	 * @return boolean true if enabled or false
	 *
	 * The Share API is enabled by default if not configured
	 */
	public static function isEnabled() {
		if (\OC::$server->getAppConfig()->getValue('core', 'shareapi_enabled', 'yes') == 'yes') {
			return true;
		}
		return false;
	}

	/**
	 * Find which users can access a shared item
	 * @param string $path to the file
	 * @param string $ownerUser owner of the file
	 * @param boolean $includeOwner include owner to the list of users with access to the file
	 * @param boolean $returnUserPaths Return an array with the user => path map
	 * @param boolean $recursive take all parent folders into account (default true)
	 * @return array
	 * @note $path needs to be relative to user data dir, e.g. 'file.txt'
	 *       not '/admin/data/file.txt'
	 */
	public static function getUsersSharingFile($path, $ownerUser, $includeOwner = false, $returnUserPaths = false, $recursive = true) {
		// FIXME: make ths use IShareProvider::getSharesByPath and extract users
		$userManager = \OC::$server->getUserManager();
		$userObject = $userManager->get($ownerUser);

		if ($userObject === null) {
			$msg = "Backends provided no user object for $ownerUser";
			\OC::$server->getLogger()->error($msg, ['app' => __CLASS__]);
			throw new \OC\User\NoUserException($msg);
		}

		$ownerUser = $userObject->getUID();

		Filesystem::initMountPoints($ownerUser);
		$shares = $sharePaths = $fileTargets = [];
		$publicShare = false;
		$remoteShare = false;
		$source = -1;
		$cache = $mountPath = false;

		$view = new \OC\Files\View('/' . $ownerUser . '/files');
		$meta = $view->getFileInfo($path);
		if ($meta) {
			$path = \substr($meta->getPath(), \strlen('/' . $ownerUser . '/files'));
		} else {
			// if the file doesn't exists yet we start with the parent folder
			$meta = $view->getFileInfo(\dirname($path));
		}

		if ($meta !== false) {
			$source = $meta['fileid'];
			$cache = new \OC\Files\Cache\Cache($meta['storage']);

			$mountPath = $meta->getMountPoint()->getMountPoint();
			if ($mountPath !== false) {
				$mountPath = \substr($mountPath, \strlen('/' . $ownerUser . '/files'));
			}
		}

		$paths = [];
		while ($source !== -1) {
			// Fetch all shares with another user
			if (!$returnUserPaths) {
				$query = \OC_DB::prepare(
					'SELECT `share_with`, `file_source`, `file_target`
					FROM
					`*PREFIX*share`
					WHERE
					`item_source` = ? AND `share_type` = ? AND `item_type` IN (\'file\', \'folder\')'
				);
				$result = $query->execute([$source, self::SHARE_TYPE_USER]);
			} else {
				$query = \OC_DB::prepare(
					'SELECT `share_with`, `file_source`, `file_target`
				FROM
				`*PREFIX*share`
				WHERE
				`item_source` = ? AND `share_type` IN (?, ?) AND `item_type` IN (\'file\', \'folder\')'
				);
				$result = $query->execute([$source, self::SHARE_TYPE_USER, self::$shareTypeGroupUserUnique]);
			}

			if (\OCP\DB::isError($result)) {
				\OCP\Util::writeLog('OCP\Share', \OC_DB::getErrorMessage(), \OCP\Util::ERROR);
			} else {
				while ($row = $result->fetchRow()) {
					$shares[] = $row['share_with'];
					if ($returnUserPaths) {
						$fileTargets[(int) $row['file_source']][$row['share_with']] = $row;
					}
				}
			}

			// We also need to take group shares into account
			$query = \OC_DB::prepare(
				'SELECT `share_with`, `file_source`, `file_target`
				FROM
				`*PREFIX*share`
				WHERE
				`item_source` = ? AND `share_type` = ? AND `item_type` IN (\'file\', \'folder\')'
			);

			$result = $query->execute([$source, self::SHARE_TYPE_GROUP]);

			if (\OCP\DB::isError($result)) {
				\OCP\Util::writeLog('OCP\Share', \OC_DB::getErrorMessage(), \OCP\Util::ERROR);
			} else {
				while ($row = $result->fetchRow()) {
					$usersInGroup = self::usersInGroup($row['share_with']);
					$shares = \array_merge($shares, $usersInGroup);
					if ($returnUserPaths) {
						foreach ($usersInGroup as $user) {
							if (!isset($fileTargets[(int) $row['file_source']][$user])) {
								// When the user already has an entry for this file source
								// the file is either shared directly with him as well, or
								// he has an exception entry (because of naming conflict).
								$fileTargets[(int) $row['file_source']][$user] = $row;
							}
						}
					}
				}
			}

			//check for public link shares
			if (!$publicShare) {
				$query = \OC_DB::prepare('
					SELECT `share_with`
					FROM `*PREFIX*share`
					WHERE `item_source` = ? AND `share_type` = ? AND `item_type` IN (\'file\', \'folder\')', 1
				);

				$result = $query->execute([$source, self::SHARE_TYPE_LINK]);

				if (\OCP\DB::isError($result)) {
					\OCP\Util::writeLog('OCP\Share', \OC_DB::getErrorMessage(), \OCP\Util::ERROR);
				} else {
					if ($result->fetchRow()) {
						$publicShare = true;
					}
				}
			}

			//check for remote share
			if (!$remoteShare) {
				$query = \OC_DB::prepare('
					SELECT `share_with`
					FROM `*PREFIX*share`
					WHERE `item_source` = ? AND `share_type` = ? AND `item_type` IN (\'file\', \'folder\')', 1
				);

				$result = $query->execute([$source, self::SHARE_TYPE_REMOTE]);

				if (\OCP\DB::isError($result)) {
					\OCP\Util::writeLog('OCP\Share', \OC_DB::getErrorMessage(), \OCP\Util::ERROR);
				} else {
					if ($result->fetchRow()) {
						$remoteShare = true;
					}
				}
			}

			// let's get the parent for the next round
			$meta = $cache->get((int)$source);
			if ($recursive === true && $meta !== false) {
				$paths[$source] = $meta['path'];
				$source = (int)$meta['parent'];
			} else {
				$source = -1;
			}
		}

		// Include owner in list of users, if requested
		if ($includeOwner) {
			$shares[] = $ownerUser;
		}

		if ($returnUserPaths) {
			$fileTargetIDs = \array_keys($fileTargets);
			$fileTargetIDs = \array_unique($fileTargetIDs);

			if (!empty($fileTargetIDs)) {
				$query = \OC_DB::prepare(
					'SELECT `fileid`, `path`
					FROM `*PREFIX*filecache`
					WHERE `fileid` IN (' . \implode(',', $fileTargetIDs) . ')'
				);
				$result = $query->execute();

				if (\OCP\DB::isError($result)) {
					\OCP\Util::writeLog('OCP\Share', \OC_DB::getErrorMessage(), \OCP\Util::ERROR);
				} else {
					while ($row = $result->fetchRow()) {
						foreach ($fileTargets[$row['fileid']] as $uid => $shareData) {
							if ($mountPath !== false) {
								$sharedPath = $shareData['file_target'];
								$sharedPath .= \substr($path, \strlen($mountPath) + \strlen($paths[$row['fileid']]));
								$sharePaths[$uid] = $sharedPath;
							} else {
								$sharedPath = $shareData['file_target'];
								$sharedPath .= \substr($path, \strlen($row['path']) -5);
								$sharePaths[$uid] = $sharedPath;
							}
						}
					}
				}
			}

			if ($includeOwner) {
				$sharePaths[$ownerUser] = $path;
			} else {
				unset($sharePaths[$ownerUser]);
			}

			return $sharePaths;
		}

		return ['users' => \array_unique($shares), 'public' => $publicShare, 'remote' => $remoteShare];
	}

	/**
	 * Based on the given token the share information will be returned - password protected shares will be verified
	 * @param string $token
	 * @param bool $checkPasswordProtection
	 * @return array|boolean false will be returned in case the token is unknown or unauthorized
	 */
	public static function getShareByToken($token, $checkPasswordProtection = true) {
		$query = \OC_DB::prepare('SELECT * FROM `*PREFIX*share` WHERE `token` = ?', 1);
		$result = $query->execute([$token]);
		if ($result === false) {
			\OCP\Util::writeLog('OCP\Share', \OC_DB::getErrorMessage() . ', token=' . $token, \OCP\Util::ERROR);
		}
		$row = $result->fetchRow();
		if ($row === false) {
			return false;
		}
		if (\is_array($row) and self::expireItem($row)) {
			return false;
		}

		// password protected shares need to be authenticated
		if ($checkPasswordProtection && !\OCP\Share::checkPasswordProtectedShare($row)) {
			return false;
		}

		return $row;
	}

	/**
	 * resolves reshares down to the last real share
	 * @param array $linkItem
	 * @return array item owner
	 */
	public static function resolveReShare($linkItem) {
		if (isset($linkItem['parent'])) {
			$parent = $linkItem['parent'];
			while (isset($parent)) {
				$query = \OC_DB::prepare('SELECT * FROM `*PREFIX*share` WHERE `id` = ?', 1);
				$item = $query->execute([$parent])->fetchRow();
				if (isset($item['parent'])) {
					$parent = $item['parent'];
				} else {
					return $item;
				}
			}
		}
		return $linkItem;
	}

	/**
	 * sent status if users got informed by mail about share
	 * @param string $itemType
	 * @param string $itemSource
	 * @param int $shareType SHARE_TYPE_USER, SHARE_TYPE_GROUP, or SHARE_TYPE_LINK
	 * @param string $recipient with whom was the file shared
	 * @param boolean $status
	 */
	public static function setSendMailStatus($itemType, $itemSource, $shareType, $recipient, $status) {
		$status = $status ? 1 : 0;

		$query = \OC_DB::prepare(
			'UPDATE `*PREFIX*share`
					SET `mail_send` = ?
					WHERE `item_type` = ? AND `item_source` = ? AND `share_type` = ? AND `share_with` = ?');

		$result = $query->execute([$status, $itemType, $itemSource, $shareType, $recipient]);

		if ($result === false) {
			\OCP\Util::writeLog('OCP\Share', 'Couldn\'t set send mail status', \OCP\Util::ERROR);
		}
	}

	/**
	 * Checks whether a share has expired, calls unshareItem() if yes.
	 * @param array $item Share data (usually database row)
	 * @return boolean True if item was expired, false otherwise.
	 */
	protected static function expireItem(array $item) {
		$result = false;

		// only use default expiration date for link shares
		if ((int) $item['share_type'] === self::SHARE_TYPE_LINK) {

			// calculate expiration date
			if (!empty($item['expiration'])) {
				$userDefinedExpire = new \DateTime($item['expiration']);
				$expires = $userDefinedExpire->getTimestamp();
			} else {
				$expires = null;
			}

			// get default expiration settings
			$defaultSettings = Helper::getDefaultExpireSetting();
			$expires = Helper::calculateExpireDate($defaultSettings, $item['stime'], $expires);

			if (\is_int($expires)) {
				$now = \time();
				if ($now > $expires) {
					self::unshareItem($item);
					$result = true;
				}
			}
		}
		return $result;
	}

	/**
	 * Unshares a share given a share data array
	 * @param array $item Share data (usually database row)
	 * @param int $newParent parent ID
	 * @return null
	 */
	protected static function unshareItem(array $item, $newParent = null) {
		$shareType = (int)$item['share_type'];
		$shareWith = null;
		if ($shareType !== \OCP\Share::SHARE_TYPE_LINK) {
			$shareWith = $item['share_with'];
		}

		// Pass all the vars we have for now, they may be useful
		$hookParams = [
			'id'            => $item['id'],
			'itemType'      => $item['item_type'],
			'itemSource'    => $item['item_source'],
			'shareType'     => $shareType,
			'shareWith'     => $shareWith,
			'itemParent'    => $item['parent'],
			'uidOwner'      => $item['uid_owner'],
		];

		\OC_Hook::emit('OCP\Share', 'pre_unshare', $hookParams);
		$deletedShares = Helper::delete($item['id'], false, null, $newParent);
		$deletedShares[] = $hookParams;
		$hookParams['deletedShares'] = $deletedShares;
		\OC_Hook::emit('OCP\Share', 'post_unshare', $hookParams);
		if ((int)$item['share_type'] === \OCP\Share::SHARE_TYPE_REMOTE && \OC::$server->getUserSession()->getUser()) {
			list(, $remote) = Helper::splitUserRemote($item['share_with']);
			self::sendRemoteUnshare($remote, $item['id'], $item['token']);
		}
	}

	/**
	 * Check if resharing is allowed
	 * @return boolean true if allowed or false
	 *
	 * Resharing is allowed by default if not configured
	 */
	public static function isResharingAllowed() {
		if (!isset(self::$isResharingAllowed)) {
			if (\OC::$server->getAppConfig()->getValue('core', 'shareapi_allow_resharing', 'yes') == 'yes') {
				self::$isResharingAllowed = true;
			} else {
				self::$isResharingAllowed = false;
			}
		}
		return self::$isResharingAllowed;
	}

	/**
	 * Get a list of collection item types for the specified item type
	 * @param string $itemType
	 * @return array
	 */
	private static function getCollectionItemTypes($itemType) {
		$collectionTypes = [$itemType];
		// Return array if collections were found or the item type is a
		// collection itself - collections can be inside collections
		if (\count($collectionTypes) > 0) {
			return $collectionTypes;
		}
		return false;
	}

	/**
	 * In case a password protected link is not yet authenticated this function will return false
	 *
	 * @param array $linkItem
	 * @return boolean
	 */
	public static function checkPasswordProtectedShare(array $linkItem) {
		if (!isset($linkItem['share_with'])) {
			return true;
		}
		if (!isset($linkItem['share_type'])) {
			return true;
		}
		if (!isset($linkItem['id'])) {
			return true;
		}

		if ($linkItem['share_type'] != \OCP\Share::SHARE_TYPE_LINK) {
			return true;
		}

		if (\OC::$server->getSession()->exists('public_link_authenticated')
			&& \OC::$server->getSession()->get('public_link_authenticated') === (string)$linkItem['id']) {
			return true;
		}

		return false;
	}

	/**
	 * construct select statement
	 * @param int $format
	 * @param string $uidOwner
	 * @return string select statement
	 */
	private static function createSelectStatement($format, $uidOwner = null) {
		$select = '*';
		if ($format == self::FORMAT_STATUSES) {
			$select = '`id`, `parent`, `share_type`, `share_with`, `uid_owner`, `item_source`, `stime`, `*PREFIX*share`.`permissions`';
		} else {
			if (isset($uidOwner)) {
				$select = '`id`, `item_type`, `item_source`, `parent`, `share_type`, `share_with`, `*PREFIX*share`.`permissions`,'
					. ' `stime`, `file_source`, `expiration`, `token`, `mail_send`, `uid_owner`';
			}
		}
		return $select;
	}

	/**
	 * transform db results
	 * @param array $row result
	 */
	private static function transformDBResults(&$row) {
		if (isset($row['id'])) {
			$row['id'] = (int) $row['id'];
		}
		if (isset($row['share_type'])) {
			$row['share_type'] = (int) $row['share_type'];
		}
		if (isset($row['parent'])) {
			$row['parent'] = (int) $row['parent'];
		}
		if (isset($row['file_parent'])) {
			$row['file_parent'] = (int) $row['file_parent'];
		}
		if (isset($row['file_source'])) {
			$row['file_source'] = (int) $row['file_source'];
		}
		if (isset($row['permissions'])) {
			$row['permissions'] = (int) $row['permissions'];
		}
		if (isset($row['storage'])) {
			$row['storage'] = (int) $row['storage'];
		}
		if (isset($row['stime'])) {
			$row['stime'] = (int) $row['stime'];
		}
		if (isset($row['expiration']) && $row['share_type'] !== self::SHARE_TYPE_LINK) {
			// discard expiration date for non-link shares, which might have been
			// set by ancient bugs
			$row['expiration'] = null;
		}
	}

	/**
	 * format result
	 * @param array $items result
	 * @param string $column is it a file share or a general share ('file_target' or 'item_target')
	 * @param \OCP\Share_Backend $backend sharing backend
	 * @param int $format
	 * @param array $parameters additional format parameters
	 * @return array format result
	 */
	private static function formatResult($items, $column, $backend, $format = self::FORMAT_NONE, $parameters = null) {
		if ($format === self::FORMAT_NONE) {
			return $items;
		} elseif ($format === self::FORMAT_STATUSES) {
			$statuses = [];
			foreach ($items as $item) {
				if ($item['share_type'] === self::SHARE_TYPE_LINK) {
					if ($item['uid_initiator'] !== \OC::$server->getUserSession()->getUser()->getUID()) {
						continue;
					}
					$statuses[$item[$column]]['link'] = true;
				} elseif (!isset($statuses[$item[$column]])) {
					$statuses[$item[$column]]['link'] = false;
				}
				if (!empty($item['file_target'])) {
					$statuses[$item[$column]]['path'] = $item['path'];
				}
			}
			return $statuses;
		} else {
			return null;
		}
	}

	/**
	 * remove protocol from URL
	 *
	 * @param string $url
	 * @return string
	 */
	public static function removeProtocolFromUrl($url) {
		if (\strpos($url, 'https://') === 0) {
			return \substr($url, \strlen('https://'));
		} elseif (\strpos($url, 'http://') === 0) {
			return \substr($url, \strlen('http://'));
		}

		return $url;
	}

	/**
	 * try http post first with https and then with http as a fallback
	 *
	 * @param string $remoteDomain
	 * @param string $urlSuffix
	 * @param array $fields post parameters
	 * @return array
	 */
	private static function tryHttpPostToShareEndpoint($remoteDomain, $urlSuffix, array $fields) {
		$allowHttpFallback = \OC::$server->getConfig()->getSystemValue('sharing.federation.allowHttpFallback', false) === true;
		// Always try https first
		$protocol = 'https://';
		$discoveryManager = new DiscoveryManager(
			\OC::$server->getMemCacheFactory(),
			\OC::$server->getHTTPClientService()
		);

		$endpoint = $discoveryManager->getShareEndpoint($protocol . $remoteDomain);
		// Try HTTPS
		$result = \OC::$server->getHTTPHelper()->post(
			$protocol . $remoteDomain . $endpoint . $urlSuffix . '?format=' . self::RESPONSE_FORMAT,
			$fields);

		if ($result['success'] === true) {
			// Return if https worked
			return $result;
		} elseif ($result['success'] === false && $allowHttpFallback) {
			// If https failed and we can try http - try that
			$protocol = 'http://';
			$result = \OC::$server->getHTTPHelper()->post(
			$protocol . $remoteDomain . $endpoint . $urlSuffix . '?format=' . self::RESPONSE_FORMAT,
			$fields);
			return $result;
		} else {
			// Else we just return the failure
			return $result;
		}
	}

	/**
	 * send server-to-server share to remote server
	 *
	 * @param string $token
	 * @param string $shareWith
	 * @param string $name
	 * @param int $remote_id
	 * @param string $owner
	 * @return bool
	 */
	private static function sendRemoteShare($token, $shareWith, $name, $remote_id, $owner) {
		list($user, $remote) = Helper::splitUserRemote($shareWith);

		if ($user && $remote) {
			$url = $remote;

			$local = \OC::$server->getURLGenerator()->getAbsoluteURL('/');

			$fields = [
				'shareWith' => $user,
				'token' => $token,
				'name' => $name,
				'remoteId' => $remote_id,
				'owner' => $owner,
				'remote' => $local,
			];

			$url = self::removeProtocolFromUrl($url);
			$result = self::tryHttpPostToShareEndpoint($url, '', $fields);
			$status = \json_decode($result['result'], true);

			if ($result['success'] && ($status['ocs']['meta']['statuscode'] === 100 || $status['ocs']['meta']['statuscode'] === 200)) {
				\OC_Hook::emit('OCP\Share', 'federated_share_added', ['server' => $remote]);
				return true;
			}
		}

		return false;
	}

	/**
	 * send server-to-server unshare to remote server
	 *
	 * @param string $remote url
	 * @param int $id share id
	 * @param string $token
	 * @return bool
	 */
	private static function sendRemoteUnshare($remote, $id, $token) {
		$url = \rtrim($remote, '/');
		$fields = ['token' => $token, 'format' => 'json'];
		$url = self::removeProtocolFromUrl($url);
		$result = self::tryHttpPostToShareEndpoint($url, '/'.$id.'/unshare', $fields);
		$status = \json_decode($result['result'], true);

		return ($result['success'] && ($status['ocs']['meta']['statuscode'] === 100 || $status['ocs']['meta']['statuscode'] === 200));
	}

	/**
	 * @param IConfig $config
	 * @return bool
	 */
	public static function enforcePassword(IConfig $config) {
		$enforcePassword = $config->getAppValue('core', 'shareapi_enforce_links_password', 'no');
		return ($enforcePassword === "yes") ? true : false;
	}

	/**
	 * Get all share entries, including non-unique group items
	 *
	 * @param string $owner
	 * @return array
	 */
	public static function getAllSharesForOwner($owner) {
		$query = 'SELECT * FROM `*PREFIX*share` WHERE `uid_owner` = ?';
		$result = \OC::$server->getDatabaseConnection()->executeQuery($query, [$owner]);
		return $result->fetchAll();
	}

	/**
	 * Get all share entries, including non-unique group items for a file
	 *
	 * @param int $id
	 * @return array
	 */
	public static function getAllSharesForFileId($id) {
		$query = 'SELECT * FROM `*PREFIX*share` WHERE `file_source` = ?';
		$result = \OC::$server->getDatabaseConnection()->executeQuery($query, [$id]);
		return $result->fetchAll();
	}

	/**
	 * @param string $password
	 * @throws \Exception
	 */
	private static function verifyPassword($password) {
		$accepted = true;
		$message = '';
		\OCP\Util::emitHook('\OC\Share', 'verifyPassword', [
			'password' => $password,
			'accepted' => &$accepted,
			'message' => &$message
		]);

		if (!$accepted) {
			throw new \Exception($message);
		}

		\OC::$server->getEventDispatcher()->dispatch(
			'OCP\Share::validatePassword',
			new GenericEvent(null, ['password' => $password])
		);
	}

	/**
	 * @param $user
	 * @return Group[]
	 */
	private static function getGroupsForUser($user) {
		$groups = \OC::$server->getGroupManager()->getUserIdGroups($user, 'sharing');
		return \array_values(\array_map(function (Group $g) {
			return $g->getGID();
		}, $groups));
	}

	/**
	 * @param $group
	 * @return mixed
	 */
	private static function usersInGroup($group) {
		$g = \OC::$server->getGroupManager()->get($group);
		if ($g === null) {
			return [];
		}
		return \array_values(\array_map(function (IUser $u) {
			return $u->getUID();
		}, $g->getUsers()));
	}
}
