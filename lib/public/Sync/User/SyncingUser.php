<?php
/**
 * @copyright Copyright (c) 2023, ownCloud GmbH
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

namespace OCP\Sync\User;

/**
 * Class representing a user that is being synced.
 * This is just a data holder to transfer information between the
 * `IUserSyncBackend` and the `IUserSyncer` because the backend will likely
 * be in a different app.
 * @since 10.14.0
 */
class SyncingUser {
	/** @var array */
	private $userData;

	/**
	 * @param string $uid
	 * @since 10.14.0
	 */
	public function __construct(string $uid) {
		$this->userData['uid'] = $uid;
	}

	/**
	 * Get the uid of the user
	 * @since 10.14.0
	 */
	public function getUid() {
		return $this->userData['uid'];
	}

	/**
	 * Set the displayName that should be used.
	 * This method will return this same instance
	 * @since 10.14.0
	 */
	public function setDisplayName(string $displayName) {
		$this->userData['displayName'] = $displayName;
		return $this;
	}

	/**
	 * Get the provided displayName or null if it wasn't provided
	 * @since 10.14.0
	 */
	public function getDisplayName() {
		return $this->userData['displayName'] ?? null;
	}

	/**
	 * Set the email
	 * @since 10.14.0
	 */
	public function setEmail(string $email) {
		$this->userData['email'] = $email;
		return $this;
	}

	/**
	 * Get the email or null if it wasn't provided
	 * @since 10.14.0
	 */
	public function getEmail() {
		return $this->userData['email'] ?? null;
	}

	/**
	 * Set the quota
	 * @since 10.14.0
	 */
	public function setQuota(string $quota) {
		$this->userData['quota'] = $quota;
		return $this;
	}

	/**
	 * Get the quota or null if it wasn't provided
	 * @since 10.14.0
	 */
	public function getQuota() {
		return $this->userData['quota'] ?? null;
	}

	/**
	 * Set the home
	 * @since 10.14.0
	 */
	public function setHome(string $home) {
		$this->userData['home'] = $home;
		return $this;
	}

	/**
	 * Get the home or null if it wasn't provided
	 * @since 10.14.0
	 */
	public function getHome() {
		return $this->userData['home'] ?? null;
	}

	/**
	 * Set the username
	 * @since 10.14.0
	 */
	public function setUsername(string $username) {
		$this->userData['username'] = $username;
		return $this;
	}

	/**
	 * Get the username or null if it wasn't provided
	 * @since 10.14.0
	 */
	public function getUsername() {
		return $this->userData['username'] ?? null;
	}

	/**
	 * Set a list of search terms
	 * @since 10.14.0
	 */
	public function setSearchTerms(array $searchTerms) {
		$this->userData['searchTerms'] = $searchTerms;
		return $this;
	}

	/**
	 * Get the list of search terms or null if it wasn't provided
	 * @since 10.14.0
	 */
	public function getSearchTerms() {
		return $this->userData['searchTerms'] ?? null;
	}

	/**
	 * Set additional information for the user
	 * Fields that can be set via the `set*` methods won't be set and this
	 * method will return false.
	 * @since 10.14.0
	 */
	public function setExtra(string $key, string $value) {
		$props = ['uid', 'displayName', 'email', 'quota', 'home', 'username', 'searchTerms'];
		if (\in_array($key, $props, true)) {
			// reserved name
			return false;
		}
		$this->userData[$key] = $value;
		return $this;
	}

	/**
	 * Get the additional information or null if the requested info isn't set
	 * @since 10.14.0
	 */
	public function getExtra(string $key) {
		return $this->userData[$key] ?? null;
	}

	/**
	 * Get all data already set, as a map (key => value)
	 * @since 10.14.0
	 */
	public function getAllData() {
		return $this->userData;
	}
}
