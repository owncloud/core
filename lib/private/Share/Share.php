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
 * Apps must create a backend class that implements OCP\Share_Backend and register it with this class.
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
	 * Get the items of item type shared with the current user
	 * @param string $itemType
	 * @param int $format (optional) Format type must be defined by the backend
	 * @param mixed $parameters (optional)
	 * @param int $limit Number of items to return (optional) Returns all by default
	 * @param boolean $includeCollections (optional)
	 * @return mixed Return depends on format
	 */
	public static function getItemsSharedWith($itemType, $format = self::FORMAT_NONE,
											  $parameters = null, $limit = -1, $includeCollections = false) {
		return self::getItems($itemType, null, self::$shareTypeUserAndGroups, \OC_User::getUser(), null, $format,
			$parameters, $limit, $includeCollections);
	}

	/**
	 * Get the items of item type shared with a user
	 * @param string $itemType
	 * @param string $user id for which user we want the shares
	 * @param int $format (optional) Format type must be defined by the backend
	 * @param mixed $parameters (optional)
	 * @param int $limit Number of items to return (optional) Returns all by default
	 * @param boolean $includeCollections (optional)
	 * @return mixed Return depends on format
	 */
	public static function getItemsSharedWithUser($itemType, $user, $format = self::FORMAT_NONE,
												  $parameters = null, $limit = -1, $includeCollections = false) {
		return self::getItems($itemType, null, self::$shareTypeUserAndGroups, $user, null, $format,
			$parameters, $limit, $includeCollections);
	}

	/**
	 * Get the item of item type shared with the current user
	 * @param string $itemType
	 * @param string $itemTarget
	 * @param int $format (optional) Format type must be defined by the backend
	 * @param mixed $parameters (optional)
	 * @param boolean $includeCollections (optional)
	 * @return mixed Return depends on format
	 */
	public static function getItemSharedWith($itemType, $itemTarget, $format = self::FORMAT_NONE,
											 $parameters = null, $includeCollections = false) {
		return self::getItems($itemType, $itemTarget, self::$shareTypeUserAndGroups, \OC_User::getUser(), null, $format,
			$parameters, 1, $includeCollections);
	}

	/**
	 * Get the item of item type shared with a given user by source
	 * @param string $itemType
	 * @param string $itemSource
	 * @param string $user User to whom the item was shared
	 * @param string $owner Owner of the share
	 * @param int $shareType only look for a specific share type
	 * @return array Return list of items with item_target, permissions and expiration
	 */
	public static function getItemSharedWithUser($itemType, $itemSource, $user, $owner = null, $shareType = null) {
		if ($itemType === 'file' || $itemType === 'folder') {
			throw new \InvalidArgumentException('Item type "' . $itemType . '" not supported by old share API any more');
		}
		$shares = [];

		$where = 'WHERE';
		$column = 'item_source';

		$select = self::createSelectStatement(self::FORMAT_NONE);

		$where .= ' `' . $column . '` = ? AND `item_type` = ? ';
		$arguments = [$itemSource, $itemType];
		// for link shares $user === null
		if ($user !== null) {
			$where .= ' AND `share_with` = ? ';
			$arguments[] = $user;
		}

		if ($shareType !== null) {
			$where .= ' AND `share_type` = ? ';
			$arguments[] = $shareType;
		}

		if ($owner !== null) {
			$where .= ' AND `uid_owner` = ? ';
			$arguments[] = $owner;
		}

		$query = \OC_DB::prepare('SELECT ' . $select . ' FROM `*PREFIX*share` ' . $where);

		$result = \OC_DB::executeAudited($query, $arguments);

		while ($row = $result->fetchRow()) {
			$shares[] = $row;
		}

		//if didn't found a result than let's look for a group share.
		if (empty($shares) && $user !== null) {
			$groups = self::getGroupsForUser($user);

			if (!empty($groups)) {
				$where = ' WHERE `' . $column . '` = ? AND `item_type` = ? AND `share_with` in (?)';
				$arguments = [$itemSource, $itemType, $groups];
				$types = [null, null, IQueryBuilder::PARAM_STR_ARRAY];

				if ($owner !== null) {
					$where .= ' AND `uid_owner` = ?';
					$arguments[] = $owner;
					$types[] = null;
				}

				// TODO: inject connection, hopefully one day in the future when this
				// class isn't static anymore...
				$conn = \OC::$server->getDatabaseConnection();
				$result = $conn->executeQuery(
					'SELECT ' . $select . ' FROM `*PREFIX*share` ' . $where,
					$arguments,
					$types
				);

				while ($row = $result->fetch()) {
					$shares[] = $row;
				}
			}
		}

		return $shares;
	}

	/**
	 * Get the item of item type shared by a link
	 * @param string $itemType
	 * @param string $itemSource
	 * @param string $uidOwner Owner of link
	 * @return array
	 */
	public static function getItemSharedWithByLink($itemType, $itemSource, $uidOwner) {
		return self::getItems($itemType, $itemSource, self::SHARE_TYPE_LINK, null, $uidOwner, self::FORMAT_NONE,
			null, 1);
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
	 * Get the shared item of item type owned by the current user
	 * @param string $itemType
	 * @param string $itemSource
	 * @param int $format (optional) Format type must be defined by the backend
	 * @param mixed $parameters
	 * @param boolean $includeCollections
	 * @return mixed Return depends on format
	 */
	public static function getItemShared($itemType, $itemSource, $format = self::FORMAT_NONE,
										 $parameters = null, $includeCollections = false) {
		return self::getItems($itemType, $itemSource, null, null, \OC_User::getUser(), $format,
			$parameters, -1, $includeCollections);
	}

	/**
	 * Get all users an item is shared with
	 * @param string $itemType
	 * @param string $itemSource
	 * @param string $uidOwner
	 * @param boolean $includeCollections
	 * @param boolean $checkExpireDate
	 * @return array Return array of users
	 */
	public static function getUsersItemShared($itemType, $itemSource, $uidOwner, $includeCollections = false, $checkExpireDate = true) {
		$users = [];
		$items = self::getItems($itemType, $itemSource, null, null, $uidOwner, self::FORMAT_NONE, null, -1, $includeCollections, false, $checkExpireDate);
		if ($items) {
			foreach ($items as $item) {
				if ((int)$item['share_type'] === self::SHARE_TYPE_USER) {
					$users[] = $item['share_with'];
				} elseif ((int)$item['share_type'] === self::SHARE_TYPE_GROUP) {
					$users = \array_merge($users, self::usersInGroup($item['share_with']));
				}
			}
		}
		return $users;
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
	 * Set the permissions of an item for a specific user or group
	 * @param string $itemType
	 * @param string $itemSource
	 * @param int $shareType SHARE_TYPE_USER, SHARE_TYPE_GROUP, or SHARE_TYPE_LINK
	 * @param string $shareWith User or group the item is being shared with
	 * @param int $permissions CRUDS permissions
	 * @return boolean true on success or false on failure
	 * @throws \Exception when trying to grant more permissions then the user has himself
	 */
	public static function setPermissions($itemType, $itemSource, $shareType, $shareWith, $permissions) {
		$l = \OC::$server->getL10N('lib');
		$connection = \OC::$server->getDatabaseConnection();

		$intArrayToLiteralArray = function ($intArray, $eb) {
			return \array_map(function ($int) use ($eb) {
				return $eb->literal((int)$int, 'integer');
			}, $intArray);
		};
		$sanitizeItem = function ($item) {
			$item['id'] = (int)$item['id'];
			$item['premissions'] = (int)$item['permissions'];
			return $item;
		};

		if ($rootItem = self::getItems($itemType, $itemSource, $shareType, $shareWith,
			\OC_User::getUser(), self::FORMAT_NONE, null, 1, false)) {
			// Check if this item is a reshare and verify that the permissions
			// granted don't exceed the parent shared item
			if (isset($rootItem['parent'])) {
				$qb = $connection->getQueryBuilder();
				$qb->select('permissions')
					->from('share')
					->where($qb->expr()->eq('id', $qb->createParameter('id')))
					->setParameter(':id', $rootItem['parent']);
				$dbresult = $qb->execute();

				$result = $dbresult->fetch();
				$dbresult->closeCursor();
				if (~(int)$result['permissions'] & $permissions) {
					$message = 'Setting permissions for %s failed,'
						.' because the permissions exceed permissions granted to %s';
					$message_t = $l->t('Setting permissions for %s failed, because the permissions exceed permissions granted to %s', [$itemSource, \OC_User::getUser()]);
					\OCP\Util::writeLog('OCP\Share', \sprintf($message, $itemSource, \OC_User::getUser()), \OCP\Util::DEBUG);
					throw new \Exception($message_t);
				}
			}
			$qb = $connection->getQueryBuilder();
			$qb->update('share')
				->set('permissions', $qb->createParameter('permissions'))
				->where($qb->expr()->eq('id', $qb->createParameter('id')))
				->setParameter(':id', $rootItem['id'])
				->setParameter(':permissions', $permissions);
			$qb->execute();

			// Share id's to update with the new permissions
			$ids = [];
			$items = [];

			// Check if permissions were removed
			if ((int)$rootItem['permissions'] & ~$permissions) {
				// If share permission is removed all reshares must be deleted
				if (($rootItem['permissions'] & \OCP\Constants::PERMISSION_SHARE) && (~$permissions & \OCP\Constants::PERMISSION_SHARE)) {
					// delete all shares, keep parent and group children
					Helper::delete($rootItem['id'], true, null, null, true);
				}

				// Remove permission from all children
				$parents = [$rootItem['id']];
				while (!empty($parents)) {
					$parents = $intArrayToLiteralArray($parents, $qb->expr());
					$qb = $connection->getQueryBuilder();
					$qb->select('id', 'permissions', 'item_type')
						->from('share')
						->where($qb->expr()->in('parent', $parents));
					$result = $qb->execute();
					// Reset parents array, only go through loop again if
					// items are found that need permissions removed
					$parents = [];
					while ($item = $result->fetch()) {
						$item = $sanitizeItem($item);

						$items[] = $item;
						// Check if permissions need to be removed
						if ($item['permissions'] & ~$permissions) {
							// Add to list of items that need permissions removed
							$ids[] = $item['id'];
							$parents[] = $item['id'];
						}
					}
					$result->closeCursor();
				}

				// Remove the permissions for all reshares of this item
				if (!empty($ids)) {
					$ids = "'".\implode("','", $ids)."'";
					// TODO this should be done with Doctrine platform objects
					if (\OC::$server->getConfig()->getSystemValue("dbtype") === 'oci') {
						$andOp = 'BITAND(`permissions`, ?)';
					} else {
						$andOp = '`permissions` & ?';
					}
					$query = \OC_DB::prepare('UPDATE `*PREFIX*share` SET `permissions` = '.$andOp
						.' WHERE `id` IN ('.$ids.')');
					$query->execute([$permissions]);
				}
			}

			/*
			 * Permissions were added
			 * Update all USERGROUP shares. (So group shares where the user moved their mountpoint).
			 */
			if ($permissions & ~(int)$rootItem['permissions']) {
				$qb = $connection->getQueryBuilder();
				$qb->select('id', 'permissions', 'item_type')
					->from('share')
					->where($qb->expr()->eq('parent', $qb->createParameter('parent')))
					->andWhere($qb->expr()->eq('share_type', $qb->createParameter('share_type')))
					->andWhere($qb->expr()->neq('permissions', $qb->createParameter('shareDeleted')))
					->setParameter(':parent', (int)$rootItem['id'])
					->setParameter(':share_type', 2)
					->setParameter(':shareDeleted', 0);
				$result = $qb->execute();

				$ids = [];
				while ($item = $result->fetch()) {
					$item = $sanitizeItem($item);
					$items[] = $item;
					$ids[] = $item['id'];
				}
				$result->closeCursor();

				// Add permssions for all USERGROUP shares of this item
				if (!empty($ids)) {
					$ids = $intArrayToLiteralArray($ids, $qb->expr());

					$qb = $connection->getQueryBuilder();
					$qb->update('share')
						->set('permissions', $qb->createParameter('permissions'))
						->where($qb->expr()->in('id', $ids))
						->setParameter(':permissions', $permissions);
					$qb->execute();
				}
			}

			foreach ($items as $item) {
				\OC_Hook::emit('OCP\Share', 'post_update_permissions', ['share' => $item]);
			}

			return true;
		}
		$message = 'Setting permissions for %s failed, because the item was not found';
		$message_t = $l->t('Setting permissions for %s failed, because the item was not found', [$itemSource]);

		\OCP\Util::writeLog('OCP\Share', \sprintf($message, $itemSource), \OCP\Util::DEBUG);
		throw new \Exception($message_t);
	}

	/**
	 * validate expiration date if it meets all constraints
	 *
	 * @param string $expireDate well formatted date string, e.g. "DD-MM-YYYY"
	 * @param string $shareTime timestamp when the file was shared
	 * @param string $itemType
	 * @param string $itemSource
	 * @return \DateTime validated date
	 * @throws \Exception when the expire date is in the past or further in the future then the enforced date
	 */
	private static function validateExpireDate($expireDate, $shareTime, $itemType, $itemSource) {
		$l = \OC::$server->getL10N('lib');
		$date = new \DateTime($expireDate);
		$today = new \DateTime('now');

		// if the user doesn't provide a share time we need to get it from the database
		// fall-back mode to keep API stable, because the $shareTime parameter was added later
		$defaultExpireDateEnforced = \OCP\Util::isDefaultExpireDateEnforced();
		if ($defaultExpireDateEnforced && $shareTime === null) {
			$items = self::getItemShared($itemType, $itemSource);
			$firstItem = \reset($items);
			$shareTime = (int)$firstItem['stime'];
		}

		if ($defaultExpireDateEnforced) {
			// initialize max date with share time
			$maxDate = new \DateTime();
			$maxDate->setTimestamp($shareTime);
			$maxDays = \OC::$server->getConfig()->getAppValue('core', 'shareapi_expire_after_n_days', '7');
			$maxDate->add(new \DateInterval('P' . $maxDays . 'D'));
			if ($date > $maxDate) {
				$warning = 'Cannot set expiration date. Shares cannot expire later than ' . $maxDays . ' after they have been shared';
				$warning_t = $l->t('Cannot set expiration date. Shares cannot expire later than %s after they have been shared', [$maxDays]);
				\OCP\Util::writeLog('OCP\Share', $warning, \OCP\Util::WARN);
				throw new \Exception($warning_t);
			}
		}

		if ($date < $today) {
			$message = 'Cannot set expiration date. Expiration date is in the past';
			$message_t = $l->t('Cannot set expiration date. Expiration date is in the past');
			\OCP\Util::writeLog('OCP\Share', $message, \OCP\Util::WARN);
			throw new \Exception($message_t);
		}

		return $date;
	}

	/**
	 * Set expiration date for a share
	 * @param string $itemType
	 * @param string $itemSource
	 * @param string $date expiration date
	 * @param int $shareTime timestamp from when the file was shared
	 * @return boolean
	 * @throws \Exception when the expire date is not set, in the past or further in the future then the enforced date
	 */
	public static function setExpirationDate($itemType, $itemSource, $date, $shareTime = null) {
		$user = \OC_User::getUser();
		$l = \OC::$server->getL10N('lib');

		if ($date == '') {
			if (\OCP\Util::isDefaultExpireDateEnforced()) {
				$warning = 'Cannot clear expiration date. Shares are required to have an expiration date.';
				$warning_t = $l->t('Cannot clear expiration date. Shares are required to have an expiration date.');
				\OCP\Util::writeLog('OCP\Share', $warning, \OCP\Util::WARN);
				throw new \Exception($warning_t);
			} else {
				$date = null;
			}
		} else {
			$date = self::validateExpireDate($date, $shareTime, $itemType, $itemSource);
		}
		$query = \OC_DB::prepare('UPDATE `*PREFIX*share` SET `expiration` = ? WHERE `item_type` = ? AND `item_source` = ?  AND `uid_owner` = ? AND `share_type` = ?');
		$query->bindValue(1, $date, 'datetime');
		$query->bindValue(2, $itemType);
		$query->bindValue(3, $itemSource);
		$query->bindValue(4, $user);
		$query->bindValue(5, \OCP\Share::SHARE_TYPE_LINK);

		$query->execute();

		\OC_Hook::emit('OCP\Share', 'post_set_expiration_date', [
			'itemType' => $itemType,
			'itemSource' => $itemSource,
			'date' => $date,
			'uidOwner' => $user
		]);

		return true;
	}

	/**
	 * Retrieve the owner of a connection
	 *
	 * @param IDBConnection $connection
	 * @param int $shareId
	 * @throws \Exception
	 * @return string uid of share owner
	 */
	private static function getShareOwner(IDBConnection $connection, $shareId) {
		$qb = $connection->getQueryBuilder();

		$qb->select('uid_owner')
			->from('share')
			->where($qb->expr()->eq('id', $qb->createParameter('shareId')))
			->setParameter(':shareId', $shareId);
		$result = $qb->execute();
		$result = $result->fetch();

		if (empty($result)) {
			throw new \Exception('Share not found');
		}

		return $result['uid_owner'];
	}

	/**
	 * Set password for a public link share
	 *
	 * @param IUserSession $userSession
	 * @param IDBConnection $connection
	 * @param IConfig $config
	 * @param int $shareId
	 * @param string $password
	 * @throws \Exception
	 * @return boolean
	 */
	public static function setPassword(IUserSession $userSession,
									   IDBConnection $connection,
									   IConfig $config,
									   $shareId, $password) {
		$user = $userSession->getUser();
		if ($user === null) {
			throw new \Exception("User not logged in");
		}

		$uid = self::getShareOwner($connection, $shareId);

		if ($uid !== $user->getUID()) {
			throw new \Exception('Cannot update share of a different user');
		}

		if ($password === '') {
			$password = null;
		}

		//If passwords are enforced the password can't be null
		if (self::enforcePassword($config) && $password === null) {
			throw new \Exception('Cannot remove password');
		}

		self::verifyPassword($password);

		$qb = $connection->getQueryBuilder();
		$qb->update('share')
			->set('share_with', $qb->createParameter('pass'))
			->where($qb->expr()->eq('id', $qb->createParameter('shareId')))
			->setParameter(':pass', $password === null ? null : \OC::$server->getHasher()->hash($password))
			->setParameter(':shareId', $shareId);

		$qb->execute();

		return true;
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
	 * Get the backend class for the specified item type
	 * @param string $itemType
	 * @throws \Exception
	 * @return \OCP\Share_Backend
	 */
	public static function getBackend($itemType) {
		$l = \OC::$server->getL10N('lib');
		if (isset(self::$backends[$itemType])) {
			return self::$backends[$itemType];
		} elseif (isset(self::$backendTypes[$itemType]['class'])) {
			$class = self::$backendTypes[$itemType]['class'];
			if (\class_exists($class)) {
				self::$backends[$itemType] = new $class;
				if (!(self::$backends[$itemType] instanceof \OCP\Share_Backend)) {
					$message = 'Sharing backend %s must implement the interface OCP\Share_Backend';
					$message_t = $l->t('Sharing backend %s must implement the interface OCP\Share_Backend', [$class]);
					\OCP\Util::writeLog('OCP\Share', \sprintf($message, $class), \OCP\Util::ERROR);
					throw new \Exception($message_t);
				}
				return self::$backends[$itemType];
			} else {
				$message = 'Sharing backend %s not found';
				$message_t = $l->t('Sharing backend %s not found', [$class]);
				\OCP\Util::writeLog('OCP\Share', \sprintf($message, $class), \OCP\Util::ERROR);
				throw new \Exception($message_t);
			}
		}
		$message = 'Sharing backend for %s not found';
		$message_t = $l->t('Sharing backend for %s not found', [$itemType]);
		\OCP\Util::writeLog('OCP\Share', \sprintf($message, $itemType), \OCP\Util::ERROR);
		throw new \Exception($message_t);
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
		foreach (self::$backendTypes as $type => $backend) {
			if (\in_array($backend['collectionOf'], $collectionTypes)) {
				$collectionTypes[] = $type;
			}
		}
		// TODO Add option for collections to be collection of themselves...
		if (isset(self::$backendTypes[$itemType]) && (!self::getBackend($itemType) instanceof \OCP\Share_Backend_Collection)) {
			unset($collectionTypes[0]);
		}
		// Return array if collections were found or the item type is a
		// collection itself - collections can be inside collections
		if (\count($collectionTypes) > 0) {
			return $collectionTypes;
		}
		return false;
	}

	/**
	 * Get the owners of items shared with a user.
	 *
	 * @param string $user The user the items are shared with.
	 * @param string $type The type of the items shared with the user.
	 * @param boolean $includeCollections Include collection item types (optional)
	 * @param boolean $includeOwner include owner in the list of users the item is shared with (optional)
	 * @return array
	 */
	public static function getSharedItemsOwners($user, $type, $includeCollections = false, $includeOwner = false) {
		// First, we find out if $type is part of a collection (and if that collection is part of
		// another one and so on).
		$collectionTypes = [];
		if (!$includeCollections || !$collectionTypes = self::getCollectionItemTypes($type)) {
			$collectionTypes[] = $type;
		}

		// Of these collection types, along with our original $type, we make a
		// list of the ones for which a sharing backend has been registered.
		// FIXME: Ideally, we wouldn't need to nest getItemsSharedWith in this loop but just call it
		// with its $includeCollections parameter set to true. Unfortunately, this fails currently.
		$allMaybeSharedItems = [];
		foreach ($collectionTypes as $collectionType) {
			if (isset(self::$backends[$collectionType])) {
				$allMaybeSharedItems[$collectionType] = self::getItemsSharedWithUser(
					$collectionType,
					$user,
					self::FORMAT_NONE
				);
			}
		}

		$owners = [];
		if ($includeOwner) {
			$owners[] = $user;
		}

		// We take a look at all shared items of the given $type (or of the collections it is part of)
		// and find out their owners. Then, we gather the tags for the original $type from all owners,
		// and return them as elements of a list that look like "Tag (owner)".
		foreach ($allMaybeSharedItems as $collectionType => $maybeSharedItems) {
			foreach ($maybeSharedItems as $sharedItem) {
				if (isset($sharedItem['id'])) { //workaround for https://github.com/owncloud/core/issues/2814
					$owners[] = $sharedItem['uid_owner'];
				}
			}
		}

		return $owners;
	}

	/**
	 * Get shared items from the database
	 * @param string $itemType
	 * @param string $item Item source or target (optional)
	 * @param int $shareType SHARE_TYPE_USER, SHARE_TYPE_GROUP, SHARE_TYPE_LINK, $shareTypeUserAndGroups, or $shareTypeGroupUserUnique
	 * @param string $shareWith User or group the item is being shared with
	 * @param string $uidOwner User that is the owner of shared items (optional)
	 * @param int $format Format to convert items to with formatItems() (optional)
	 * @param mixed $parameters to pass to formatItems() (optional)
	 * @param int $limit Number of items to return, -1 to return all matches (optional)
	 * @param boolean $includeCollections Include collection item types (optional)
	 * @param boolean $itemShareWithBySource (optional)
	 * @param boolean $checkExpireDate
	 * @return array
	 *
	 * See public functions getItem(s)... for parameter usage
	 *
	 */
	public static function getItems($itemType, $item = null, $shareType = null, $shareWith = null,
									$uidOwner = null, $format = self::FORMAT_NONE, $parameters = null, $limit = -1,
									$includeCollections = false, $itemShareWithBySource = false, $checkExpireDate  = true) {
		if (!self::isEnabled()) {
			return [];
		}
		if ($itemType === 'file' || $itemType === 'folder') {
			throw new \InvalidArgumentException('Item type "' . $itemType . '" not supported by old share API any more');
		}
		$backend = self::getBackend($itemType);
		$collectionTypes = false;
		// Get filesystem root to add it to the file target and remove from the
		// file source, match file_source with the file cache
		$root = '';
		$collectionTypes = self::getCollectionItemTypes($itemType);
		if ($includeCollections && !isset($item) && $collectionTypes) {
			// If includeCollections is true, find collections of this item type, e.g. a music album contains songs
			if (!in_array($itemType, $collectionTypes)) {
				$itemTypes = array_merge([$itemType], $collectionTypes);
			} else {
				$itemTypes = $collectionTypes;
			}
			$placeholders = join(',', array_fill(0, count($itemTypes), '?'));
			$where = ' WHERE `item_type` IN ('.$placeholders.'))';
			$queryArgs = $itemTypes;
		} else {
			$where = ' WHERE `item_type` = ?';
			$queryArgs = [$itemType];
		}
		if (\OC::$server->getAppConfig()->getValue('core', 'shareapi_allow_links', 'yes') !== 'yes') {
			$where .= ' AND `share_type` != ?';
			$queryArgs[] = self::SHARE_TYPE_LINK;
		}
		if (isset($shareType)) {
			// Include all user and group items
			if ($shareType == self::$shareTypeUserAndGroups && isset($shareWith)) {
				$where .= ' AND ((`share_type` in (?, ?) AND `share_with` = ?) ';
				$queryArgs[] = self::SHARE_TYPE_USER;
				$queryArgs[] = self::$shareTypeGroupUserUnique;
				$queryArgs[] = $shareWith;
				$groups = self::getGroupsForUser($shareWith);
				if (!empty($groups)) {
					$placeholders = \join(',', \array_fill(0, \count($groups), '?'));
					$where .= ' OR (`share_type` = ? AND `share_with` IN ('.$placeholders.')) ';
					$queryArgs[] = self::SHARE_TYPE_GROUP;
					$queryArgs = \array_merge($queryArgs, $groups);
				}
				$where .= ')';
				// Don't include own group shares
				$where .= ' AND `uid_owner` != ?';
				$queryArgs[] = $shareWith;
			} else {
				$where .= ' AND `share_type` = ?';
				$queryArgs[] = $shareType;
				if (isset($shareWith)) {
					$where .= ' AND `share_with` = ?';
					$queryArgs[] = $shareWith;
				}
			}
		}
		if (isset($uidOwner)) {
			$where .= ' AND `uid_owner` = ?';
			$queryArgs[] = $uidOwner;
			if (!isset($shareType)) {
				// Prevent unique user targets for group shares from being selected
				$where .= ' AND `share_type` != ?';
				$queryArgs[] = self::$shareTypeGroupUserUnique;
			}
			$column = 'item_source';
		} else {
			$column = 'item_target';
		}
		if (isset($item)) {
			$collectionTypes = self::getCollectionItemTypes($itemType);
			if ($includeCollections && $collectionTypes) {
				$where .= ' AND (';
			} else {
				$where .= ' AND';
			}
			// If looking for own shared items, check item_source else check item_target
			if (isset($uidOwner) || $itemShareWithBySource) {
				// If item type is a file, file source needs to be checked in case the item was converted
				$where .= ' `item_source` = ?';
				$column = 'item_source';
			} else {
				$where .= ' `item_target` = ?';
			}
			$queryArgs[] = $item;
			if ($includeCollections && $collectionTypes) {
				$placeholders = join(',', array_fill(0, count($collectionTypes), '?'));
				$where .= ' OR `item_type` IN ('.$placeholders.'))';
				$queryArgs = \array_merge($queryArgs, $collectionTypes);
			}
		}

		if ($shareType == self::$shareTypeUserAndGroups && $limit === 1) {
			// Make sure the unique user target is returned if it exists,
			// unique targets should follow the group share in the database
			// If the limit is not 1, the filtering can be done later
			$where .= ' ORDER BY `*PREFIX*share`.`id` DESC';
		} else {
			$where .= ' ORDER BY `*PREFIX*share`.`id` ASC';
		}

		if ($limit != -1 && !$includeCollections) {
			// The limit must be at least 3, because filtering needs to be done
			if ($limit < 3) {
				$queryLimit = 3;
			} else {
				$queryLimit = $limit;
			}
		} else {
			$queryLimit = null;
		}
		$select = self::createSelectStatement($format, $uidOwner);
		$root = strlen($root);
		$query = \OC_DB::prepare('SELECT '.$select.' FROM `*PREFIX*share` '.$where, $queryLimit);
		$result = $query->execute($queryArgs);
		if ($result === false) {
			\OCP\Util::writeLog('OCP\Share',
				\OC_DB::getErrorMessage() . ', select=' . $select . ' where=',
				\OCP\Util::ERROR);
		}
		$items = [];
		$targets = [];
		$switchedItems = [];
		$mounts = [];
		while ($row = $result->fetchRow()) {
			self::transformDBResults($row);
			// Filter out duplicate group shares for users with unique targets
			if ($row['share_type'] == self::$shareTypeGroupUserUnique && isset($items[$row['parent']])) {
				$row['share_type'] = self::SHARE_TYPE_GROUP;
				$row['unique_name'] = true; // remember that we use a unique name for this user
				$row['share_with'] = $items[$row['parent']]['share_with'];
				// if the group share was unshared from the user we keep the permission, otherwise
				// we take the permission from the parent because this is always the up-to-date
				// permission for the group share
				if ($row['permissions'] > 0) {
					$row['permissions'] = $items[$row['parent']]['permissions'];
				}
				// Remove the parent group share
				unset($items[$row['parent']]);
				if ($row['permissions'] == 0) {
					continue;
				}
			} elseif (!isset($uidOwner)) {
				// Check if the same target already exists
				if (isset($targets[$row['id']])) {
					// Check if the same owner shared with the user twice
					// through a group and user share - this is allowed
					$id = $targets[$row['id']];
					if (isset($items[$id]) && $row['uid_owner'] == $items[$id]['uid_owner']) {
						// Switch to group share type to ensure resharing conditions aren't bypassed
						if ($items[$id]['share_type'] != self::SHARE_TYPE_GROUP) {
							$items[$id]['share_type'] = self::SHARE_TYPE_GROUP;
							$items[$id]['share_with'] = $row['share_with'];
						}
						// Switch ids if sharing permission is granted on only
						// one share to ensure correct parent is used if resharing
						if (~(int)$items[$id]['permissions'] & \OCP\Constants::PERMISSION_SHARE
							&& (int)$row['permissions'] & \OCP\Constants::PERMISSION_SHARE) {
							$items[$row['id']] = $items[$id];
							$switchedItems[$id] = $row['id'];
							unset($items[$id]);
							$id = $row['id'];
						}
						$items[$id]['permissions'] |= (int)$row['permissions'];
					}
					continue;
				} elseif (!empty($row['parent'])) {
					$targets[$row['parent']] = $row['id'];
				}
			}
			// Remove root from file source paths if retrieving own shared items
			if (isset($uidOwner, $row['path'])) {
				if (isset($row['parent'])) {
					$query = \OC_DB::prepare('SELECT `file_target` FROM `*PREFIX*share` WHERE `id` = ?');
					$parentResult = $query->execute([$row['parent']]);
					if ($result === false) {
						\OCP\Util::writeLog('OCP\Share', 'Can\'t select parent: ' .
							\OC_DB::getErrorMessage() . ', select=' . $select . ' where=' . $where,
							\OCP\Util::ERROR);
					} else {
						$parentRow = $parentResult->fetchRow();
						$tmpPath = $parentRow['file_target'];
						// find the right position where the row path continues from the target path
						$pos = \strrpos($row['path'], $parentRow['file_target']);
						$subPath = \substr($row['path'], $pos);
						$splitPath = \explode('/', $subPath);
						foreach (\array_slice($splitPath, 2) as $pathPart) {
							$tmpPath = $tmpPath . '/' . $pathPart;
						}
						$row['path'] = $tmpPath;
					}
				} else {
					if (!isset($mounts[$row['storage']])) {
						$mountPoints = \OC\Files\Filesystem::getMountByNumericId($row['storage']);
						if (\is_array($mountPoints) && !empty($mountPoints)) {
							$mounts[$row['storage']] = \current($mountPoints);
						}
					}
					if (!empty($mounts[$row['storage']])) {
						$path = $mounts[$row['storage']]->getMountPoint().$row['path'];
						$relPath = \substr($path, $root); // path relative to data/user
						$row['path'] = \rtrim($relPath, '/');
					}
				}
			}

			if ($checkExpireDate) {
				if (self::expireItem($row)) {
					continue;
				}
			}
			// Check if resharing is allowed, if not remove share permission
			if (isset($row['permissions']) && (!self::isResharingAllowed() | \OCP\Util::isSharingDisabledForUser())) {
				$row['permissions'] &= ~\OCP\Constants::PERMISSION_SHARE;
			}
			// Add display names to result
			$row['share_with_displayname'] = $row['share_with'];
			if (isset($row['share_with']) && $row['share_with'] != '' &&
				$row['share_type'] === self::SHARE_TYPE_USER) {
				$row['share_with_displayname'] = \OCP\User::getDisplayName($row['share_with']);
			} elseif (isset($row['share_with']) && $row['share_with'] != '' &&
				$row['share_type'] === self::SHARE_TYPE_REMOTE) {
				$addressBookEntries = \OC::$server->getContactsManager()->search($row['share_with'], ['CLOUD']);
				foreach ($addressBookEntries as $entry) {
					foreach ($entry['CLOUD'] as $cloudID) {
						if ($cloudID === $row['share_with']) {
							$row['share_with_displayname'] = $entry['FN'];
						}
					}
				}
			}
			if (isset($row['uid_owner']) && $row['uid_owner'] != '') {
				$row['displayname_owner'] = \OCP\User::getDisplayName($row['uid_owner']);
			}

			if ($row['permissions'] > 0) {
				$items[$row['id']] = $row;
			}
		}

		// group items if we are looking for items shared with the current user
		if (isset($shareWith) && $shareWith === \OCP\User::getUser()) {
			$items = self::groupItems($items, $itemType);
		}

		if (!empty($items)) {
			$collectionItems = [];
			foreach ($items as &$row) {
				// Return only the item instead of a 2-dimensional array
				if ($limit == 1 && $row[$column] == $item && ($row['item_type'] == $itemType)) {
					if ($format == self::FORMAT_NONE) {
						return $row;
					} else {
						break;
					}
				}
				// Check if this is a collection of the requested item type
				if ($includeCollections && $collectionTypes && in_array($row['item_type'], $collectionTypes)) {
					if (($collectionBackend = self::getBackend($row['item_type']))
						&& $collectionBackend instanceof \OCP\Share_Backend_Collection) {
						// Collections can be inside collections, check if the item is a collection
						if (isset($item) && $row['item_type'] == $itemType && $row[$column] == $item) {
							$collectionItems[] = $row;
						} else {
							$collection = [];
							$collection['item_type'] = $row['item_type'];
							$row['collection'] = $collection;
							// Fetch all of the children sources
							$children = $collectionBackend->getChildren($row[$column]);
							foreach ($children as $child) {
								$childItem = $row;
								$childItem['item_type'] = $itemType;
								$childItem['item_source'] = $child['source'];
								$childItem['item_target'] = $child['target'];
								if (isset($item)) {
									if ($childItem[$column] == $item) {
										// Return only the item instead of a 2-dimensional array
										if ($limit == 1) {
											if ($format == self::FORMAT_NONE) {
												return $childItem;
											} else {
												// Unset the items array and break out of both loops
												$items = [];
												$items[] = $childItem;
												break 2;
											}
										} else {
											$collectionItems[] = $childItem;
										}
									}
								} else {
									$collectionItems[] = $childItem;
								}
							}
						}
					}
					// Remove collection item
					$toRemove = $row['id'];
					if (\array_key_exists($toRemove, $switchedItems)) {
						$toRemove = $switchedItems[$toRemove];
					}
					unset($items[$toRemove]);
				} elseif ($includeCollections && $collectionTypes && \in_array($row['item_type'], $collectionTypes)) {
					// FIXME: Thats a dirty hack to improve file sharing performance,
					// see github issue #10588 for more details
					// Need to find a solution which works for all back-ends
					$collectionBackend = self::getBackend($row['item_type']);
					$sharedParents = $collectionBackend->getParents($row['item_source']);
					foreach ($sharedParents as $parent) {
						$collectionItems[] = $parent;
					}
				}
			}
			if (!empty($collectionItems)) {
				$collectionItems = \array_unique($collectionItems, SORT_REGULAR);
				$items = \array_merge($items, $collectionItems);
			}

			// filter out invalid items, these can appear when subshare entries exist
			// for a group in which the requested user isn't a member any more
			$items = \array_filter($items, function ($item) {
				return $item['share_type'] !== self::$shareTypeGroupUserUnique;
			});

			return self::formatResult($items, $column, $backend, $format, $parameters);
		}

		return [];
	}

	/**
	 * group items with link to the same source
	 *
	 * @param array $items
	 * @param string $itemType
	 * @return array of grouped items
	 */
	protected static function groupItems($items, $itemType) {
		if ($itemType === 'file' || $itemType === 'folder') {
			throw new \InvalidArgumentException('Item type "' . $itemType . '" not supported by old share API any more');
		}
		$fileSharing = false;

		$result = [];

		foreach ($items as $item) {
			$grouped = false;
			foreach ($result as $key => $r) {
				// for file/folder shares we need to compare file_source, otherwise we compare item_source
				// only group shares if they already point to the same target, otherwise the file where shared
				// before grouping of shares was added. In this case we don't group them toi avoid confusions
				if (($fileSharing && $item['file_source'] === $r['file_source'] && $item['file_target'] === $r['file_target']) ||
					(!$fileSharing && $item['item_source'] === $r['item_source'] && $item['item_target'] === $r['item_target'])) {
					// add the first item to the list of grouped shares
					if (!isset($result[$key]['grouped'])) {
						$result[$key]['grouped'][] = $result[$key];
					}
					$result[$key]['permissions'] = (int) $item['permissions'] | (int) $r['permissions'];
					$result[$key]['grouped'][] = $item;
					$grouped = true;
					break;
				}
			}

			if (!$grouped) {
				$result[] = $item;
			}
		}

		return $result;
	}

	/**
	 * Delete all shares with type SHARE_TYPE_LINK
	 */
	public static function removeAllLinkShares() {
		// Delete any link shares
		$query = \OC_DB::prepare('SELECT `id` FROM `*PREFIX*share` WHERE `share_type` = ?');
		$result = $query->execute([self::SHARE_TYPE_LINK]);
		while ($item = $result->fetchRow()) {
			Helper::delete($item['id']);
		}
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
			return $backend->formatItems($items, $format, $parameters);
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
