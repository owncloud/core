<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Dominik Schmidt <dev@dominik-schmidt.de>
 * @author felixboehm <felix@webhippie.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Renaud Fortier <Renaud.Fortier@fsaa.ulaval.ca>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

namespace OCA\User_LDAP;

use OC\ServerNotAvailableException;
use OC\User\Backend;
use OC\User\NoUserException;
use OCA\User_LDAP\Exceptions\DoesNotExistOnLDAPException;
use OCA\User_LDAP\User\Manager;
use OCA\User_LDAP\User\UserEntry;
use OCP\IConfig;
use OCP\IImage;
use OCP\Image;
use OCP\IUserBackend;
use OCP\UserInterface;

/**
 * Class User_LDAP
 *
 * OCA\User_LDAP\User_Proxy - The actual User Backend that talks to ownCloud
 * ^
 * |
 * v
 * OCA\User_LDAP\User_Ldap - A single ldap server ... used to cache ... what?
 * |
 * v
 * OCA\User_LDAP\User\Manager - creates and caches User Objects
 * ^    - also names users based on the ldap entry and what is in oc
 * |
 * v
 * OCA\User_LDAP\User\UserEntry - Wrapper for an ldap entry representing a user
 * ^
 * |
 * v
 * OCA\User_LDAP\Access - Facade to fetch attibutes form ldap
 * ^
 * |
 * v
 * OCA\User_LDAP\Connection & OCA\User_LDAP\ILDAPWrapper
 * ^
 * |
 * v
 * OCA\User_LDAP\Configuration
 *
 * @package OCA\User_LDAP
 */
// FIXME write tests for User_Proxy so we can remove these interfaces which are required to test checkPassword etc. see User_LDAPTest
class User_LDAP implements IUserBackend, UserInterface {

	/** @var IConfig */
	protected $config;

	/**
	 * @var Manager
	 */
	protected $userManager;

	/**
	 * @param IConfig $config
	 * @param Manager $userManager
	 */
	public function __construct(IConfig $config, Manager $userManager) {
		$this->config = $config;
		$this->userManager = $userManager;
	}

	/**
	 * checks whether the user is allowed to change his avatar in ownCloud
	 * @param string $uid the ownCloud user name
	 * @return boolean either the user can or cannot
	 */
	public function canChangeAvatar($uid) {
		$userEntry = $this->userManager->getCachedEntry($uid);
		if ($userEntry === null) {
			return false;
		}

		if ($userEntry->getAvatarImage() === null) {
			return true;
		}

		return false;
	}

	/**
	 * returns the internal ownCloud userid for the given login name, if available
	 *
	 * @param string $loginName
	 * @return string|false
	 */
	public function loginName2UserName($loginName) {
		try {
			return $this->userManager->getLDAPUserByLoginName($loginName)
				->getOwnCloudUID();
		} catch (\Exception $e) {
			return false;
		}
	}

	/**
	 * Check if the password is correct
	 * @param string $uid The username
	 * @param string $password The password
	 * @return false|string
	 *
	 * Check if the password is correct without logging in the user
	 */
	public function checkPassword($uid, $password) {
		try {
			$userEntry = $this->userManager->getLDAPUserByLoginName($uid);
			//are the credentials OK?
			if (!$this->userManager->areCredentialsValid($userEntry->getDN(), $password)) {
				return false;
			}
		} catch (DoesNotExistOnLDAPException $e) {
			return false;
		} catch (\Exception $e) {
			// Something more serious than not found occured
			\OC::$server->getLogger()->logException($e, ['app' => 'user_ldap']);
			return false;
		}

		//FIXME how can we trigger this for saml? needs to move to core!
		if ($this->config->getSystemValue('enable_avatars', true) === true) {
			$this->userManager->registerAvatarHook($userEntry);
		}

		$this->userManager->markLogin($userEntry->getOwnCloudUID());

		return $userEntry->getOwncloudUid();
	}

	/**
	 * Get a list of all users
	 *
	 * WARNING: Using this function combined with LIMIT $limit and OFFSET $offset
	 * will search in parallel all provided base DNs in this server,
	 * and thus can return more then LIMIT $limit users. This function shall
	 * be used with limit and offset by iterators that can
	 * support this kind of parallel paging.
	 *
	 * @param string $search
	 * @param integer $limit
	 * @param integer $offset
	 * @return string[] an array of all uids
	 */
	public function getUsers($search = '', $limit = 10, $offset = 0) {
		return $this->userManager->getUsers($search, $limit, $offset);
	}

	/**
	 * check if a user exists
	 *
	 * @param string $uid the username
	 * @return boolean
	 * @throws \OutOfBoundsException
	 * @throws \InvalidArgumentException
	 * @throws \BadMethodCallException
	 * @throws ServerNotAvailableException when connection could not be established
	 */
	public function userExists($uid) {
		// check if an LdapEntry has been cached already
		if ($this->userManager->getCachedEntry($uid) !== null) {
			return true;
		}

		// TODO username might be a uuid ... instead of looking it up in the db talk to ldap?
		$dn = $this->userManager->username2dn($uid);
		if ($dn === false) {
			return false;
		}

		// Try to get the entry from LDAP and convert to a user (so it is cached from now onwards)
		try {
			$this->userManager->getUserEntryByDn($dn);
			return true;
		} catch (DoesNotExistOnLDAPException $e) {
			// Was DN moved? Try to find a new DN by UUID
			return $this->userManager->resolveMissingDN($dn);
		}
	}

	/**
	* returns whether a user was deleted in LDAP
	*
	* @param string $uid The username of the user to delete
	* @return bool
	*/
	public function deleteUser($uid) {
		\OC::$server->getLogger()->info(
			'Cleaning up after user ' . $uid,
			['app' => 'user_ldap']
		);

		$this->userManager->getUserMapper()->unmap($uid);

		return true;
	}

	/**
	 * get the user's home directory
	 *
	 * @param string $uid the username
	 * @return string|null|false FIXME we need to use exceptions to make the proxy handle the user does not exist here case correctly
	 * @throws NoUserException
	 * @throws \Exception
	 */
	public function getHome($uid) {
		$userEntry = $this->userManager->getCachedEntry($uid);
		if ($userEntry === null) {
			return false;
		}
		return $userEntry->getHome();
	}

	/**
	 * get display name of the user
	 * @param string $uid user ID of the user
	 * @return string|null|false display name
	 */
	public function getDisplayName($uid) {
		$userEntry = $this->userManager->getCachedEntry($uid);
		if ($userEntry === null) {
			return false;
		}
		return $userEntry->getDisplayName();
	}

	/**
	 * Get a list of all display names
	 *
	 * WARNING: Using this function combined with LIMIT $limit and OFFSET $offset
	 * will search in parallel all provided base DNs in this server,
	 * and thus can return more then LIMIT $limit users. This function shall
	 * be used with limit and offset by iterators that can
	 * support this kind of parallel paging.
	 *
	 * @param string $search
	 * @param int|string|null $limit
	 * @param int|string|null $offset
	 * @return array an array of all displayNames (value) and the corresponding uids (key)
	 */
	public function getDisplayNames($search = '', $limit = null, $offset = null) {
		$displayNames = [];
		$users = $this->getUsers($search, $limit, $offset);
		foreach ($users as $user) {
			$displayNames[$user] = $this->getDisplayName($user);
		}
		return $displayNames;
	}

	/**
	* Check if backend implements actions
	* @param int $actions bitwise-or'ed actions
	* @return boolean
	*
	* Returns the supported actions as int to be
	* compared with OC_USER_BACKEND_CREATE_USER etc.
	 * TODO move to Proxy ... is only here to satisfy interfaces which are no longer exposed because we always use the proxy
	*/
	public function implementsActions($actions) {
		return (bool)((Backend::CHECK_PASSWORD
			| Backend::GET_HOME
			| Backend::GET_DISPLAYNAME
			| Backend::PROVIDE_AVATAR
			| Backend::COUNT_USERS)
			& $actions);
	}

	/**
	 * @return bool
	 */
	public function hasUserListings() {
		return true;
	}

	/**
	 * counts the users in LDAP
	 *
	 * @return int|bool
	 */
	public function countUsers() {
		$filter = $this->userManager->getFilterForUserCount();
		return $this->userManager->countUsers($filter);
	}

	/**
	 * Backend name to be shown in user management
	 * @return string the name of the backend to be shown
	 */
	public function getBackendName() {
		return 'LDAP';
	}

	/**
	 * @param int $uid
	 * @return string[]|false false if user was not found
	 */
	public function getSearchTerms($uid) {
		$userEntry = $this->userManager->getCachedEntry($uid);
		if ($userEntry === null) {
			return false;
		}
		return $userEntry->getSearchTerms();
	}

	/**
	 * Get a users email address
	 *
	 * @param string $uid The username
	 * @return string|null|false false if user was not found, null if no email is set
	 * @since 10.0
	 */
	public function getEMailAddress($uid) {
		$userEntry = $this->userManager->getCachedEntry($uid);
		if ($userEntry === null) {
			return false;
		}
		return $userEntry->getEMailAddress();
	}

	/**
	 * Get a users quota
	 *
	 * @param string $uid The username
	 * @return string|null|false false if user was not found, null if no quota is set
	 * @since 10.0
	 */
	public function getQuota($uid) {
		$userEntry = $this->userManager->getCachedEntry($uid);
		if ($userEntry === null) {
			return false;
		}
		return $userEntry->getQuota();
	}

	/**
	 * Get a username
	 *
	 * @param string $uid The userid
	 * @return string|null|false false if user was not found, null if username is empty
	 * @since 10.0
	 */
	public function getUserName($uid) {
		$userEntry = $this->userManager->getCachedEntry($uid);
		if ($userEntry === null) {
			return false;
		}
		return $userEntry->getUserName();
	}

	/**
	 * Get avatar for a users account for core powered user search
	 *
	 * FIXME This is an expensive operation and takes roughly half a second to parse the data and create the image. This might be too slow for sync jobs.
	 *
	 * @param string $uid The username
	 * @return IImage|null|false false if user was not found, null if no image is set
	 * @throws \OutOfBoundsException if the avatar could not be determined as expected
	 */
	public function getAvatar($uid) {
		$userEntry = $this->userManager->getCachedEntry($uid);
		if ($userEntry === null) {
			return false;
		}

		$image = new Image();
		if ($image->loadFromData($userEntry->getAvatarImage())) {
			//make sure it is a square and not bigger than 128x128
			$size = \min([$image->width(), $image->height(), 128]);
			if (!$image->centerCrop($size)) {
				throw new \OutOfBoundsException('cropping image for avatar failed for '.$userEntry->getDN());
			}
			return $image;
		}
		return null;
	}

	public function clearConnectionCache() {
		$this->userManager->getConnection()->clearCache();
	}
}
