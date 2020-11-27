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

use OCP\Share\Exceptions\ShareNotFound;
use OCP\Files\Node;

/**
 * Interface IShareProvider
 *
 * @package OCP\Share
 * @since 9.0.0
 */
interface IShareProvider {
	/**
	 * The capabilities below refer mainly to storing capabilities allowed
	 * by the implementing share provider. Validation or enforcement rules
	 * (for passwords for example) aren't expected to be handled as capabilities
	 * here because those rules will be checked at API level, not here.
	 * If a share provider doesn't support any of these capabilities, it should
	 * either store the value as null or don't store it, and return a null value
	 * as value when the share is gotten.
	 */
	/**
	 * Store when the share expires. An expired share needs to be automatically
	 * deleted. If a share won't expire, a "null" value will be used
	 */
	const CAPABILITY_STORE_EXPIRATION = 'shareExpiration';
	/**
	 * Store the (hashed) password to protect the share. A value of null means
	 * that the share isn't protected by a password.
	 */
	const CAPABILITY_STORE_PASSWORD = 'passwordProtected';

	/**
	 * Return the identifier of this provider.
	 *
	 * @return string Containing only [a-zA-Z0-9]
	 * @since 9.0.0
	 */
	public function identifier();

	/**
	 * Create a share
	 *
	 * @param \OCP\Share\IShare $share
	 * @return \OCP\Share\IShare The share object
	 * @since 9.0.0
	 */
	public function create(\OCP\Share\IShare $share);

	/**
	 * Update a share
	 *
	 * @param \OCP\Share\IShare $share
	 * @return \OCP\Share\IShare The share object
	 * @since 9.0.0
	 */
	public function update(\OCP\Share\IShare $share);

	/**
	 * Delete a share
	 *
	 * @param \OCP\Share\IShare $share
	 * @since 9.0.0
	 */
	public function delete(\OCP\Share\IShare $share);

	/**
	 * Unshare a file from self as recipient.
	 * This may require special handling. If a user unshares a group
	 * share from their self then the original group share should still exist.
	 *
	 * @param \OCP\Share\IShare $share
	 * @param string $recipient UserId of the recipient
	 * @since 9.0.0
	 */
	public function deleteFromSelf(\OCP\Share\IShare $share, $recipient);

	/**
	 * Move a share as a recipient.
	 * This is updating the share target. Thus the mount point of the recipient.
	 * This may require special handling. If a user moves a group share
	 * the target should only be changed for them.
	 *
	 * @param \OCP\Share\IShare $share
	 * @param string $recipient userId of recipient
	 * @return \OCP\Share\IShare
	 * @since 9.0.0
	 * @deprecated 10.0.9 use updateForRecipient() instead
	 */
	public function move(\OCP\Share\IShare $share, $recipient);

	/**
	 * Get all shares by the given user
	 *
	 * @param string $userId
	 * @param int $shareType
	 * @param Node|null $node
	 * @param bool $reshares Also get the shares where $user is the owner instead of just the shares where $user is the initiator
	 * @param int $limit The maximum number of shares to be returned, -1 for all shares
	 * @param int $offset
	 * @return \OCP\Share\IShare[]
	 * @since 9.0.0
	 */
	public function getSharesBy($userId, $shareType, $node, $reshares, $limit, $offset);

	/**
	 * Get all shares by the given user for specified shareTypes array (ref. \OC\Share\Constants)
	 *
	 * @param string $userId
	 * @param int[] $shareTypes
	 * @param Node[] $nodeIDs
	 * @param bool $reshares - Also get the shares where $user is the owner instead of just the shares where $user is the initiator
	 * @return \OCP\Share\IShare[]
	 * @since 10.0.0
	 */
	public function getAllSharesBy($userId, $shareTypes, $nodeIDs, $reshares);

	/**
	 * Get share by id
	 *
	 * @param string $id
	 * @param string|null $recipientId
	 * @return \OCP\Share\IShare
	 * @throws ShareNotFound
	 * @throws ProviderException
	 * @since 9.0.0
	 */
	public function getShareById($id, $recipientId = null);

	/**
	 * Get shares for a given path
	 *
	 * @param Node $path
	 * @return \OCP\Share\IShare[]
	 * @since 9.0.0
	 */
	public function getSharesByPath(Node $path);

	/**
	 * Get shared with the given user for shares of all supported share types for this share provider,
	 * with file_source predicate specified ($node is Node) or
	 * without ($node is null and scan over file_source is performed).
	 *
	 * @param string $userId get shares where this user is the recipient
	 * @param Node|null $node
	 * @return \OCP\Share\IShare[]
	 * @since 10.0.0
	 */
	public function getAllSharedWith($userId, $node);

	/**
	 * Get shared with the given user specifying share type predicate for this specific share provider
	 *
	 * @param string $userId get shares where this user is the recipient
	 * @param int $shareType
	 * @param Node|null $node
	 * @param int $limit The max number of entries returned, -1 for all
	 * @param int $offset
	 * @return \OCP\Share\IShare[]
	 * @since 9.0.0
	 */
	public function getSharedWith($userId, $shareType, $node, $limit, $offset);

	/**
	 * Get a share by token
	 *
	 * @param string $token
	 * @return \OCP\Share\IShare
	 * @throws ShareNotFound
	 * @since 9.0.0
	 */
	public function getShareByToken($token);

	/**
	 * Get the shares which are associated with an invalid or missing fileid.
	 * This means that the share isn't valid any longer because the source file
	 * has been deleted.
	 *
	 * @param int $limit limit the number of results, -1 to get all results without limit
	 * @return \OCP\Share\IShare[]
	 * @since 10.7.0
	 */
	public function getSharesWithInvalidFileid(int $limit);

	/**
	 * A user is deleted from the system
	 * So clean up the relevant shares.
	 *
	 * @param string $uid
	 * @param int $shareType
	 * @since 9.1.0
	 */
	public function userDeleted($uid, $shareType);

	/**
	 * A group is deleted from the system.
	 * We have to clean up all shares to this group.
	 * Providers not handling group shares should just return
	 *
	 * @param string $gid
	 * @since 9.1.0
	 */
	public function groupDeleted($gid);

	/**
	 * A user is deleted from a group
	 * We have to clean up all the related user specific group shares
	 * Providers not handling group shares should just return
	 *
	 * @param string $uid
	 * @param string $gid
	 * @since 9.1.0
	 */
	public function userDeletedFromGroup($uid, $gid);

	/**
	 * Updates the share entry of the given recipient
	 *
	 * For group shares, only the state for the given recipient is changed,
	 * not for the whole group share.
	 *
	 * @param \OCP\Share\IShare $share
	 * @param string $recipient userId of recipient
	 * @param int $state state to set
	 * @return \OCP\Share\IShare
	 * @since 10.0.9
	 */
	public function updateForRecipient(\OCP\Share\IShare $share, $recipient);

	/**
	 * Get the share provider's capabilities. It will return a map with the supported
	 * share type with the list of capabilities for that share type:
	 * [
	 *   \OCP\Share::CONVERT_SHARE_TYPE_TO_STRING[\OCP\Share::SHARE_TYPE_USER] => [
	 *     IShareProvider::CAPABILITY_STORE_EXPIRATION
	 *   ],
	 *   \OCP\Share::CONVERT_SHARE_TYPE_TO_STRING[\OCP\Share::SHARE_TYPE_LINK] => [
	 *     IShareProvider::CAPABILITY_STORE_EXPIRATION,
	 *     IShareProvider::CAPABILITY_STORE_PASSWORD
	 *   ],
	 *   \OCP\Share::CONVERT_SHARE_TYPE_TO_STRING[\OCP\Share::SHARE_TYPE_GROUP] => []
	 * ]
	 * Supported share types by this provider should have the corresponding entry even if
	 * it doesn't support extra capabilities
	 *
	 * @return array
	 * @since 10.3.2
	 */
	public function getProviderCapabilities();
}
