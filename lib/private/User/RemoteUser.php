<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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


namespace OC\User;


use OCP\IImage;
use OCP\IUser;

class RemoteUser implements IUser {

	/** @var string */
	private $userId;

	/**
	 * RemoteUser constructor.
	 *
	 * @param string $userId
	 */
	public function __construct($userId) {
		$this->userId = $userId;
	}

	/**
	 * get the user id
	 *
	 * @return string
	 * @since 8.0.0
	 */
	public function getUID() {
		return $this->userId;
	}

	/**
	 * get the display name for the user, if no specific display name is set it will fallback to the user id
	 *
	 * @return string
	 * @since 8.0.0
	 */
	public function getDisplayName() {
		return $this->userId;
	}

	/**
	 * set the display name for the user
	 *
	 * @param string $displayName
	 * @return bool
	 * @since 8.0.0
	 */
	public function setDisplayName($displayName) {
		return false;
	}

	/**
	 * returns the timestamp of the user's last login or 0 if the user did never
	 * login
	 *
	 * @return int
	 * @since 8.0.0
	 */
	public function getLastLogin() {
		return 0;
	}

	/**
	 * updates the timestamp of the most recent login of this user
	 *
	 * @since 8.0.0
	 */
	public function updateLastLoginTimestamp() {
	}

	/**
	 * Delete the user
	 *
	 * @return bool
	 * @since 8.0.0
	 */
	public function delete() {
		return false;
	}

	/**
	 * Set the password of the user
	 *
	 * @param string $password
	 * @param string $recoveryPassword for the encryption app to reset encryption keys
	 * @return bool
	 * @since 8.0.0
	 */
	public function setPassword($password, $recoveryPassword = null) {
		return false;
	}

	/**
	 * get the users home folder to mount
	 *
	 * @return string
	 * @since 8.0.0
	 */
	public function getHome() {
	}

	/**
	 * Get the name of the backend class the user is connected with
	 *
	 * @return string
	 * @since 8.0.0
	 */
	public function getBackendClassName() {
		return 'Remote';
	}

	/**
	 * check if the backend allows the user to change his avatar on Personal page
	 *
	 * @return bool
	 * @since 8.0.0
	 */
	public function canChangeAvatar() {
		return false;
	}

	/**
	 * check if the backend supports changing passwords
	 *
	 * @return bool
	 * @since 8.0.0
	 */
	public function canChangePassword() {
		return false;
	}

	/**
	 * check if the backend supports changing display names
	 *
	 * @return bool
	 * @since 8.0.0
	 */
	public function canChangeDisplayName() {
		return false;
	}

	/**
	 * check if the user is enabled
	 *
	 * @return bool
	 * @since 8.0.0
	 */
	public function isEnabled() {
		return true;
	}

	/**
	 * set the enabled status for the user
	 *
	 * @param bool $enabled
	 * @since 8.0.0
	 */
	public function setEnabled($enabled) {
		return false;
	}

	/**
	 * get the users email address
	 *
	 * @return string|null
	 * @since 9.0.0
	 */
	public function getEMailAddress() {
		return false;
	}

	/**
	 * get the avatar image if it exists
	 *
	 * @param int $size
	 * @return IImage|null
	 * @since 9.0.0
	 */
	public function getAvatarImage($size) {
		return null;
	}

	/**
	 * get the federation cloud id
	 *
	 * @return string
	 * @since 9.0.0
	 */
	public function getCloudId() {
		$uid = $this->getUID();
		$server = \OC::$server->getURLGenerator()->getAbsoluteURL('/');
		return $uid . '@' . rtrim( $this->removeProtocolFromUrl($server), '/');
	}

	/**
	 * @param string $url
	 * @return string
	 */
	private function removeProtocolFromUrl($url) {
		if (strpos($url, 'https://') === 0) {
			return substr($url, strlen('https://'));
		} else if (strpos($url, 'http://') === 0) {
			return substr($url, strlen('http://'));
		}

		return $url;
	}

	/**
	 * set the email address of the user
	 *
	 * @param string|null $mailAddress
	 * @return void
	 * @since 9.0.0
	 */
	public function setEMailAddress($mailAddress) {
	}

	/**
	 * get the users' quota in human readable form. If a specific quota is not
	 * set for the user, the default value is returned. If a default setting
	 * was not set otherwise, it is return as 'none', i.e. quota is not limited.
	 *
	 * @return string
	 * @since 9.0.0
	 */
	public function getQuota() {
		return 'none';
	}

	/**
	 * set the users' quota
	 *
	 * @param string $quota
	 * @return void
	 * @since 9.0.0
	 */
	public function setQuota($quota) {
	}

}
