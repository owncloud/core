<?php
/**
 * ownCloud
 *
 * @author Frank Karlitschek
 * @copyright 2014 Thomas Müller deepdiver@owncloud.com
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

namespace OC\Session;

use Exception;
use OC_Config;
use OC_Response;
use OC_Template;
use OC_Util;

class Factory {

	/**
	 * Create a session
	 *
	 * @return \OC\Session\Internal|\OC\Session\Memory
	 */
	public static function create() {

		if (\OC::$CLI) {
			return new \OC\Session\Memory('');
		}

		// prevents javascript from accessing php session cookies
		ini_set('session.cookie_httponly', '1;');

		// set the cookie path to the ownCloud directory
		$cookie_path = \OC::$WEBROOT ? : '/';
		ini_set('session.cookie_path', $cookie_path);

		//set the session object to a dummy session so code relying on the session existing still works
		$session = new \OC\Session\Memory('');

		try {
			// set the session name to the instance id - which is unique
			$session = new \OC\Session\Internal(OC_Util::getInstanceId());
			// if session cant be started break with http 500 error
		} catch (Exception $e) {
			//show the user a detailed error page
			OC_Response::setStatus(OC_Response::STATUS_INTERNAL_SERVER_ERROR);
			OC_Template::printExceptionErrorPage($e);
		}

		$sessionLifeTime =  self::getSessionLifeTime();
		// regenerate session id periodically to avoid session fixation
		if (!$session->exists('SID_CREATED')) {
			$session->set('SID_CREATED', time());
		} else if (time() - $session->get('SID_CREATED') > $sessionLifeTime / 2) {
			session_regenerate_id(true);
			$session->set('SID_CREATED', time());
		}

		// session timeout
		if ($session->exists('LAST_ACTIVITY') && (time() - $session->get('LAST_ACTIVITY') > $sessionLifeTime)) {
			if (isset($_COOKIE[session_name()])) {
				setcookie(session_name(), '', time() - 42000, $cookie_path);
			}
			session_unset();
			session_destroy();
			session_start();
		}

		$session->set('LAST_ACTIVITY', time());

		//try to set the session lifetime
		$sessionLifeTime = self::getSessionLifeTime();
		@ini_set('gc_maxlifetime', (string)$sessionLifeTime);

		return $session;
	}

	/**
	 * @return int
	 */
	private static function getSessionLifeTime() {
		return OC_Config::getValue('session_lifetime', 60 * 60 * 24);
	}


} 
