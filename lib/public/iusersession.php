<?php
/**
 * ownCloud
 *
 * @author Bart Visscher
 * @copyright 2013 Bart Visscher bartv@thisnet.nl
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

/**
 * Public interface of ownCloud for apps to use.
 * User session interface
 *
 */

// use OCP namespace for all classes that are considered public.
// This means that they should be used by apps instead of the internal ownCloud classes
namespace OCP;

/**
 * User session
 */
interface IUserSession {
	/**
	 * Do a user login
	 *
	 * @param string $user the username
	 * @param string $password the password
	 * @return bool true if successful
	 */
	public function login($user, $password);

	/**
	 * Logs the user out including all the session data
	 * Logout, destroys session
	 */
	public function logout();

	/**
	 * Used to enable or disable the incognito mode
	 *
	 * @deprecated The incognito mode has been implemented as work-around around
	 * 				ownCloud applications that otherwise construct the wrong path
	 * 				when handling public files. One example includes the encryption
	 * 				app which otherwise seems to use the wrong encryption keys.
	 * 				If your app requires this mode it might be a better choice to
	 * 				fix the underlying problems before relying on this method.
	 * @link https://github.com/owncloud/core/issues/12888
	 * @param bool $state True for enabling the incognito mode, false for disabling it.
	 */
	public function setIncognitoMode($state);

	/**
	 * Get the current incognito state of the
	 *
	 * @deprecated The incognito mode has been implemented as work-around around
	 * 				ownCloud applications that otherwise construct the wrong path
	 * 				when handling public files. One example includes the encryption
	 * 				app which otherwise seems to use the wrong encryption keys.
	 * 				If your app requires this mode it might be a better choice to
	 * 				fix the underlying problems before relying on this method.
	 * @link https://github.com/owncloud/core/issues/12888
	 * @return bool True if incognito mode is enabled, false otherwise
	 */
	public function isIncognito();

	/**
	 * Set the currently active user
	 *
	 * @param \OCP\IUser|null $user
	 */
	public function setUser($user);

	/**
	 * Get the current active user
	 * This function is influenced by the incognito mode an thus
	 * might also return null when the incognito mode is enabled.
	 * (for example on public sharing pages)
	 *
	 * @return \OCP\IUser|null IUser or null when no user found
	 */
	public function getUser();
}
