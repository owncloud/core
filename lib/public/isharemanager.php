<?php

namespace OCP;

interface IShareManager {

	/**
	 * Get a share by id
	 *
	 * @param int $id
	 * @return IShare
	 */
	public getShareById($id);

	/**
	 * Create a new share
	 *
	 * @param string $itemType
	 * @param string $itemSource
	 * @param int $shareType
	 * @param string $shareWith
	 * @param int $permissions
	 * @param \DateTime $expirationDate
	 *
	 * @return IShare
	 */
	public function newShare($itemType, $itemSource, $shareType, $shareWith, $permissions, $expirationDate = null);

	/**
	 * Create a new share
	 *
	 * @param IShare $share
	 * @param int $shareType
	 * @param string $shareWith
	 * @param int $permissions
	 * @param \DateTime $expirationDate
	 *
	 * @return IShare
	 */
	public function reShare($share, $shareType, $shareWith, $permissions, $expirationDate = null);

	/**
	 * Get shares of users
	 *
	 * @param IUser $user
	 *
	 * @return IShare[]
	 */
	public function getSharesByUser($user)

	/**
	 * Get shares
	 *
	 * @param string $itemType
	 * @param string $itemSource
	 *
	 * @return IShare[]
	 */
	public getShares($itemType, $itemSource);

	/**
	 * Get share by Token
	 *
	 * @param string $token
	 * @return IShare
	 */
	public getShareByToken($token);

	/**
	 * Sharing enabled
	 *
	 * @return bool
	 */
	public isEnabled();
}
