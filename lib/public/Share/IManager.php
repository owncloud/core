<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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

namespace OCP\Share;

use OCP\Files\Node;

use OCP\Files\NotFoundException;
use OCP\Share\Exceptions\ShareNotFound;
use OCP\Share\Exceptions\TransferSharesException;

/**
 * Interface IManager
 *
 * @package OCP\Share
 * @since 9.0.0
 */
interface IManager {

	/**
	 * Create a Share
	 *
	 * @param IShare $share
	 * @return IShare The share object
	 * @since 9.0.0
	 */
	public function createShare(IShare $share);

	/**
	 * Update a share.
	 * The target of the share can't be changed this way: use moveShare
	 * The share can't be removed this way (permission 0): use deleteShare
	 *
	 * @param IShare $share
	 * @return IShare The share object
	 * @since 9.0.0
	 */
	public function updateShare(IShare $share);

	/**
	 * Delete a share
	 *
	 * @param IShare $share
	 * @throws ShareNotFound
	 * @since 9.0.0
	 */
	public function deleteShare(IShare $share);

	/**
	 * Unshare a file as the recipient.
	 * This can be different from a regular delete for example when one of
	 * the users in a groups deletes that share. But the provider should
	 * handle this.
	 *
	 * @param IShare $share
	 * @param string $recipientId
	 * @since 9.0.0
	 */
	public function deleteFromSelf(IShare $share, $recipientId);

	/**
	 * Move the share as a recipient of the share.
	 * This is updating the share target. So where the recipient has the share mounted.
	 *
	 * @param IShare $share
	 * @param string $recipientId
	 * @return IShare
	 * @throws \InvalidArgumentException If $share is a link share or the $recipient does not match
	 * @since 9.0.0
	 * @deprecated 10.0.9 use updateShareForRecipient() instead
	 */
	public function moveShare(IShare $share, $recipientId);

	/**
	 * Get all shares shared by (initiated) by the provided user for specific node IDs.
	 *
	 * @param string $userId
	 * @param int[] $shareTypes - ref \OC\Share\Constants[]
	 * @param int[] $nodeIDs
	 * @param bool $reshares
	 * @return IShare[]
	 * @since 10.0.0
	 */
	public function getAllSharesBy($userId, $shareTypes, $nodeIDs, $reshares = false);
	
	/**
	 * Get shares shared by (initiated) by the provided user.
	 *
	 * @param string $userId
	 * @param int $shareType
	 * @param Node|null $path
	 * @param bool $reshares
	 * @param int $limit The maximum number of returned results, -1 for all results
	 * @param int $offset
	 * @return IShare[]
	 * @since 9.0.0
	 */
	public function getSharesBy($userId, $shareType, $path = null, $reshares = false, $limit = 50, $offset = 0);

	/**
	 * Transfer shares from oldOwner to newOwner. Both old and new owners are uid
	 *
	 * @param IShare $share
	 * @param string $oldOwner - is the previous owner of the share, the uid string
	 * @param string $newOwner - is the new owner of the share, the uid string
	 * @param string $finalTarget - is the target folder where share has to be moved
	 * @param null|bool $isChild - determine if the share is a child or not
	 *
	 * finalTarget is of the form "user1/files/transferred from admin on 20180509"
	 *
	 * TransferShareException would be thrown when:
	 *  - oldOwner, newOwner does not exist.
	 *  - oldOwner and newOwner are same
	 * NotFoundException would be thrown when finalTarget does not exist in the file
	 * system
	 *
	 * @throws TransferSharesException
	 * @throws NotFoundException
	 * @since 10.0.9
	 */
	public function transferShare(IShare $share, $oldOwner, $newOwner, $finalTarget, $isChild = null);

	/**
	 * Get shares shared with $userId for specified share types.
	 * Filter by $node if provided
	 *
	 * @param string $userId
	 * @param int[] $shareTypes - ref \OC\Share\Constants[]
	 * @param Node|null $node
	 * @return IShare[]
	 * @since 10.0.0
	 */
	public function getAllSharedWith($userId, $shareTypes, $node = null);
	
	/**
	 * Get shares shared with $user.
	 * Filter by $node if provided
	 *
	 * @param string $userId
	 * @param int $shareType
	 * @param Node|null $node
	 * @param int $limit The maximum number of shares returned, -1 for all
	 * @param int $offset
	 * @return IShare[]
	 * @since 9.0.0
	 */
	public function getSharedWith($userId, $shareType, $node = null, $limit = 50, $offset = 0);

	/**
	 * Retrieve a share by the share id.
	 * If the recipient is set make sure to retrieve the file for that user.
	 * This makes sure that if a user has moved/deleted a group share this
	 * is reflected.
	 *
	 * @param string $id
	 * @param string|null $recipient userID of the recipient
	 * @return IShare
	 * @throws ShareNotFound
	 * @since 9.0.0
	 */
	public function getShareById($id, $recipient = null);

	/**
	 * Get the share by token possible with password
	 *
	 * @param string $token
	 * @return IShare
	 * @throws ShareNotFound
	 * @since 9.0.0
	 */
	public function getShareByToken($token);

	/**
	 * Verify the password of a public share
	 *
	 * @param IShare $share
	 * @param string $password
	 * @return bool
	 * @since 9.0.0
	 */
	public function checkPassword(IShare $share, $password);

	/**
	 * The user with UID is deleted.
	 * All share providers have to cleanup the shares with this user as well
	 * as shares owned by this user.
	 * Shares only initiated by this user are fine.
	 *
	 * @param string $uid
	 * @since 9.1.0
	 */
	public function userDeleted($uid);

	/**
	 * The group with $gid is deleted
	 * We need to clear up all shares to this group
	 *
	 * @param string $gid
	 * @since 9.1.0
	 */
	public function groupDeleted($gid);

	/**
	 * The user $uid is deleted from the group $gid
	 * All user specific group shares have to be removed
	 *
	 * @param string $uid
	 * @param string $gid
	 * @since 9.1.0
	 */
	public function userDeletedFromGroup($uid, $gid);

	/**
	 * Instantiates a new share object. This is to be passed to
	 * createShare.
	 *
	 * @return IShare
	 * @since 9.0.0
	 */
	public function newShare();

	/**
	 * Is the share API enabled
	 *
	 * @return bool
	 * @since 9.0.0
	 */
	public function shareApiEnabled();

	/**
	 * Is public link sharing enabled
	 *
	 * @return bool
	 * @since 9.0.0
	 */
	public function shareApiAllowLinks();

	/**
	 * Is password on public link requires
	 * NOTE: This method is deprecated and will fallback to the "shareApiLinkEnforcePasswordReadOnly"
	 *
	 * @return bool
	 * @since 9.0.0
	 * @see IManager::shareApiLinkEnforcePasswordReadOnly()
	 * @deprecated
	 */
	public function shareApiLinkEnforcePassword();

	/**
	 * Is password enforced for read-only shares?
	 *
	 * @return bool true if password is enforced, false otherwise
	 * @since 10.0.8
	 */
	public function shareApiLinkEnforcePasswordReadOnly();

	/**
	 * Is password enforced for read & write shares?
	 *
	 * @return bool true if password is enforced, false otherwise
	 * @since 10.0.8
	 */
	public function shareApiLinkEnforcePasswordReadWrite();

	/**
	 * Is password enforced for write-only shares?
	 *
	 * @return bool true if password is enforced, false otherwise
	 * @since 10.0.8
	 */
	public function shareApiLinkEnforcePasswordWriteOnly();

	/**
	 * Is default expire date enabled
	 *
	 * @return bool
	 * @since 9.0.0
	 */
	public function shareApiLinkDefaultExpireDate();

	/**
	 * Is default expire date enforced
	 *`
	 * @return bool
	 * @since 9.0.0
	 */
	public function shareApiLinkDefaultExpireDateEnforced();

	/**
	 * Number of default expire days
	 *
	 * @return int
	 * @since 9.0.0
	 */
	public function shareApiLinkDefaultExpireDays();

	/**
	 * Allow public upload on link shares
	 *
	 * @return bool
	 * @since 9.0.0
	 */
	public function shareApiLinkAllowPublicUpload();

	/**
	 * check if user can only share with group members
	 * @return bool
	 * @since 9.0.0
	 */
	public function shareWithGroupMembersOnly();

	/**
	 * Check if users can share with groups
	 * @return bool
	 * @since 9.0.1
	 */
	public function allowGroupSharing();

	/**
	 * Check if sharing is disabled for the given user
	 *
	 * @param string $userId
	 * @return bool
	 * @since 9.0.0
	 */
	public function sharingDisabledForUser($userId);

	/**
	 * Check if outgoing server2server shares are allowed
	 * @return bool
	 * @since 9.0.0
	 */
	public function outgoingServer2ServerSharesAllowed();

	/**
	 * Updates the share entry of the given recipient
	 *
	 * @param IShare $share
	 * @param string $recipientId
	 * @throws \InvalidArgumentException If $share is a link share or the $recipient does not match
	 * @since 10.0.9
	 */
	public function updateShareForRecipient(IShare $share, $recipientId);
}
