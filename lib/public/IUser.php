<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OCP;

use OCP\User\NotPermittedActionException;

/**
 * Interface IUser
 *
 * @package OCP
 * @since 8.0.0
 */
interface IUser {
	/**
	 * @return integer
	 * @since 11.0.0
	 */
	public function getAccountId();

	/**
	 * get the user id
	 *
	 * @return string
	 * @since 8.0.0
	 */
	public function getUID();

	/**
	 * get the user name
	 *
	 * @return string
	 * @since 10.0.10
	 */
	public function getUserName();

	/**
	 * set the user name
	 *
	 * @param string $userName
	 * @throws NotPermittedActionException
	 * @since 10.0.10
	 */
	public function setUserName($userName);

	/**
	 * get the display name for the user, if no specific display name is set it will fallback to the user id
	 *
	 * @return string
	 * @since 8.0.0
	 */
	public function getDisplayName();

	/**
	 * set the display name for the user
	 *
	 * @param string $displayName
	 * @return bool
	 * @throws NotPermittedActionException
	 * @since 8.0.0
	 */
	public function setDisplayName($displayName);

	/**
	 * returns the timestamp of the user's last login or 0 if the user did never
	 * login
	 *
	 * @return int
	 * @since 8.0.0
	 */
	public function getLastLogin();

	/**
	 * updates the timestamp of the most recent login of this user
	 *
	 * @return void
	 * @since 8.0.0
	 */
	public function updateLastLoginTimestamp();

	/**
	 * Delete the user
	 *
	 * @return bool
	 * @since 8.0.0
	 */
	public function delete();

	/**
	 * Set the password of the user
	 *
	 * @param string $password
	 * @param string $recoveryPassword for the encryption app to reset encryption keys
	 * @return bool
	 * @throws NotPermittedActionException
	 * @since 8.0.0
	 */
	public function setPassword($password, $recoveryPassword = null);

	/**
	 * get the users home folder to mount
	 *
	 * @return string
	 * @since 8.0.0
	 */
	public function getHome();

	/**
	 * set the users home folder to mount
	 *
	 * @return void
	 * @since 10.9.0
	 */
	public function setHome(string $newLocation);

	/**
	 * Get the name of the backend class the user is connected with
	 *
	 * @return string
	 * @since 8.0.0
	 */
	public function getBackendClassName();

	/**
	 * check if the backend allows the user to change his avatar on Personal page
	 *
	 * @return bool
	 * @since 8.0.0
	 */
	public function canChangeAvatar();

	/**
	 * check if the backend supports changing passwords
	 *
	 * @return bool
	 * @since 8.0.0
	 */
	public function canChangePassword();

	/**
	 * check if the backend supports changing display names
	 *
	 * @return bool
	 * @since 8.0.0
	 */
	public function canChangeDisplayName();

	/**
	 * check if the backend supports changing email addresses
	 *
	 * @return bool
	 * @since 10.9.0
	 */
	public function canChangeMailAddress();

	/**
	 * check if the user is enabled
	 *
	 * @return bool
	 * @since 8.0.0
	 */
	public function isEnabled();

	/**
	 * Set the enabled status for the user
	 *
	 * @param bool $enabled
	 * @throws NotPermittedActionException
	 * @since 8.0.0
	 */
	public function setEnabled($enabled);

	/**
	 * get the users email address
	 *
	 * @return string|null
	 * @since 9.0.0
	 */
	public function getEMailAddress();

	/**
	 * get the avatar image if it exists
	 *
	 * @param int $size
	 * @return IImage|null
	 * @since 9.0.0
	 */
	public function getAvatarImage($size);

	/**
	 * get the federation cloud id
	 *
	 * @return string
	 * @since 9.0.0
	 */
	public function getCloudId();

	/**
	 * set the email address of the user
	 *
	 * @param string|null $mailAddress
	 * @return void
	 * @throws NotPermittedActionException
	 * @since 9.0.0
	 */
	public function setEMailAddress($mailAddress);

	/**
	 * get the users' quota in human readable form. If a specific quota is not
	 * set for the user, the default value is returned. If a default setting
	 * was not set otherwise, it is return as 'none', i.e. quota is not limited.
	 *
	 * @return string
	 * @since 9.0.0
	 */
	public function getQuota();

	/**
	 * Set the users' quota
	 *
	 * @param string $quota
	 * @return void
	 * @throws NotPermittedActionException
	 * @since 9.0.0
	 */
	public function setQuota($quota);

	/**
	 * set the users' search terms
	 *
	 * @param array $terms
	 * @return void
	 * @throws NotPermittedActionException
	 * @since 10.0.1
	 */
	public function setSearchTerms(array $terms);

	/**
	 * get the users' search terms
	 *
	 * @return array
	 * @since 10.0.1
	 */
	public function getSearchTerms();

	/**
	 * get the attributes of user for apps
	 * This method sends event which is listened by the apps. The apps would add attributes which
	 * are specific to this user. Say for example a user might have access to a blog site, in such
	 * case the app which is responsible for this control could listen to this event and
	 * add an attribute say:
	 * "blogSite" => "https://foo/bar"
	 * Apps add attributes and their value in the form of key => value. The userExtendedAttributes
	 * does not care which app added the attributes. It only considers about the
	 * attributes.
	 * The argument clearCache is used to clear userExtendedAttributes. If there are
	 * external apps involved or under any circumstance we know there will be delay
	 * in response from the app, then its safe to use clearCache as false.
	 * New event is triggered under the following conditions:
	 * - if the userExtendedAttributes is null or empty array ( even if clearCache is set to false, in this condition, event will be triggered )
	 * - if clearCache is set to true
	 * The flag allowUserAccountUpdate is set to true by default. This flag is set to false before event is emitted.
	 * This flag is checked on all the set operations, in this class to make sure no user account
	 * table update is allowed when the extended attributes are provided by the apps. Once the
	 * event listeners have done their task, the flag is set back to true.
	 * The exception is thrown when the listener tries call this method again. This is to
	 * prevent infinite loop. Also the exceptions thrown during any operation by the listeners
	 * are allowed to go up. The exceptions are not caught in this method.
	 *
	 *
	 * @param bool $clearCache, set to true if user attributes should be created every time, else false is set to reuse the userExtendedAttributes cache.
	 * @return array
	 * @throws NotPermittedActionException
	 * @since 10.11.0
	 */
	public function getExtendedAttributes($clearCache = false);
}
