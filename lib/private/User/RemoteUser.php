<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OC\User;

use OCP\IUser;

/**
 * Class RemoteUser - an implementation of IUser for user on a remote/federated server
 *
 * @package OC\User
 */
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
	 * @inheritdoc
	 */
	public function getUID() {
		return $this->userId;
	}

	/**
	 * @inheritdoc
	 */
	public function getUserName() {
		return $this->getUID();
	}

	/**
	 * @inheritdoc
	 */
	public function setUserName($userName) {
	}

	/**
	 * @inheritdoc
	 */
	public function getDisplayName() {
		return $this->userId;
	}

	/**
	 * @inheritdoc
	 */
	public function setDisplayName($displayName) {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function getLastLogin() {
		return 0;
	}

	/**
	 * @inheritdoc
	 */
	public function updateLastLoginTimestamp() {
	}

	/**
	 * @inheritdoc
	 */
	public function delete() {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function setPassword($password, $recoveryPassword = null) {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function getHome() {
	}

	/**
	 * @inheritdoc
	 */
	public function getBackendClassName() {
		return 'Remote';
	}

	/**
	 * @inheritdoc
	 */
	public function canChangeAvatar() {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function canChangePassword() {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function canChangeDisplayName() {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function isEnabled() {
		return true;
	}

	/**
	 * @inheritdoc
	 */
	public function setEnabled($enabled) {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function getEMailAddress() {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function getAvatarImage($size) {
		return null;
	}

	/**
	 * @inheritdoc
	 */
	public function getCloudId() {
		$uid = $this->getUID();
		$server = \OC::$server->getURLGenerator()->getAbsoluteURL('/');
		return $uid . '@' . \rtrim($this->removeProtocolFromUrl($server), '/');
	}

	/**
	 * @param string $url
	 * @return string
	 */
	private function removeProtocolFromUrl($url) {
		if (\strpos($url, 'https://') === 0) {
			return \substr($url, \strlen('https://'));
		} elseif (\strpos($url, 'http://') === 0) {
			return \substr($url, \strlen('http://'));
		}

		return $url;
	}

	/**
	 * @inheritdoc
	 */
	public function setEMailAddress($mailAddress) {
	}

	/**
	 * @inheritdoc
	 */
	public function getQuota() {
		return 'none';
	}

	/**
	 * @inheritdoc
	 */
	public function setQuota($quota) {
	}

	/**
	 * @inheritdoc
	 */
	public function getSearchTerms() {
		return [];
	}

	/**
	 * @inheritdoc
	 */
	public function setSearchTerms(array $terms) {
	}
}
