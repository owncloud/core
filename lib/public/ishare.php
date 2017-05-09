<?php

namespace OCP;

interface IShare {

	/**
	 * Get share id
	 *
	 * @return int
	 */
	public function getId();

	/**
	 * Get the itemsource
	 *
	 * @return string
	 */
	public function getItemSource();

	/**
	 * Get Item type;
	 *
	 * @return string
	 */
	public function getItemType();

	/**
	 * get the owner of the share
	 *
	 * @return IUser
	 */
	public function getOwner();

	/**
	 * Get the type of share
	 *
	 * @return int
	 */
	public function getShareType();

	/**
	 * Get sharedWith
	 *
	 * @return IUser|IGroup|string
	 */
	public function getSharedWith();

	/**
	 * Get expiration date
	 *
	 * @return DateTime
	 */
	public function getExpirationDate();

	/**
	 * Verify password
	 *
	 * @param $password string
	 * @return bool
	 */
	public function verifyPassword($password);

	/**
	 * Get Permissions
	 *
	 * @return int
	 */
	public function getPermissions();

	/**
	 * Set share password
	 *
	 * @param string $password
	 */
	public function setPassword($password);

	/**
	 * Set expiration date
	 *
	 * @param \DateTime $date
	 */
	public function setExpirationDate(\DateTime $date);

	/**
	 * Set Permissions
	 *
	 * @param int $permissions
	 */
	public function setPermissions($permissions);

	/**
	 * Check if a remote share is accepted
	 *
	 * @return bool
	 */
	public function isAccepted();

	/**
	 * Get Parent share
	 *
	 * @return IShare
	 */
	public function getParent();
}
