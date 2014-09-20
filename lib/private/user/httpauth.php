<?php
/**
 * ownCloud - HTTP authentication backend
 *
 * @author Adam Williamson
 * @copyright 2014 Adam Williamson - adamw@happyassassin.net
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
 * This implements HTTP authentication for ownCloud. If the HTTP server sets
 * REMOTE_USER or REDIRECT_REMOTE_USER, this backend (if enabled) causes
 * ownCloud to consider the user set to be 'logged in'. This is purely an
 *_authentication glue layer; it is not a full user information store, nor does
 * it actually perform any authentication. The account set by REMOTE_USER or
 * REDIRECT_REMOTE_USER must already exist in ownCloud's user database. If the
 * remote user does not also exist locally, login via this mechanism will fail.
 *
 * You should configure your web server such that REMOTE_USER will only be set
 * for /server_auth.php if a user has authenticated correctly. You do *not*
 * need to configure server authentication for the rest of ownCloud (and you
 * should not, if you want to allow authentication by other means as a
 * fallback).
 *
 * For optimal functionality, set your web server's 401 ErrorDocument for
 * server_auth.php to server_auth_failed.php.
 */

OC_Hook::connect('OC_User', 'logout', 'OC_User_HTTPAuth', 'httpLogout');
OC_Hook::connect('OC_User', 'pre_login', 'OC_User_HTTPAuth', 'httpPreLogin');
OC_Hook::connect('OC_User', 'post_login', 'OC_User_HTTPAuth', 'httpPostLogin');

class OC_User_HTTPAuth extends OC_User_Backend implements \OCP\Authentication\IApacheBackend {
	/**
	 * Has a user been authenticated by the server?
	 *
	 * If a user is already logged in, returns 'true' if oc_http_auth_status
	 * is set to 'authed', indicating the current user authenticated via
	 * HTTP. Returns 'false' otherwise.
	 *
	 * If no user is logged in at present, the following logic occurs.
	 *
	 * 1. If oc_http_auth_status is 'preauth', return 'true'. This indicates the
	 * HTTP authentication script (server_auth.php) ran on the previous request
	 * and successfully checked that a user is authenticated and populated
	 * oc_http_auth_user that will be read by getCurrentUserId() after we
	 * return 'true'.
	 *
	 * 2. If the request URI contains 'remote.php' we assume it's a DAV request
	 * and bail out, returning 'false'. This is obviously fake-able, but faking
	 * it doesn't *get* you anywhere, so it's not really a problem.
	 *
	 * 3. If oc_http_auth_status is empty or 'authed', we redirect to the
	 * authentication page, server_auth.php, which does the work of checking
	 * whether the server has authenticated a user, sets oc_http_auth_status to
	 * 'preauth', sets a session variable to identify the authenticated user,
	 * and directs back here.
	 
	 * Empty indicates a first ever attempt, first attempt for a long time, or
	 * after logout or some other condition in this backend has cleared the
	 * variable intentionally to trigger a new HTTP auth attempt.
	 *
	 * 'authed' but no user logged in indicates the OC user session has gone
	 * away for some reason, and we should run back through the auth process and
	 * set up a new one. This state shouldn't ever get hit, but let's be safe.
	 *
	 * Before redirecting, we set oc_http_auth_status to 'init'. The point of
	 * this is to catch failed HTTP auth attempts and skip HTTP auth on the next
	 * try. If server authentication fails on server_auth.php, it may not run at
	 * all, so we can't rely on being able to set this there. If the server
	 * admin configures the server as intended, the user will be directed back
	 * to index.php and so here, and we will catch the 'init' state and fail
	 * out on this second request.
	 *
	 * 4. If oc_http_auth_status is anything else, we treat this as a failure
	 * and return 'false'. If we're being called as part of an auth/login
	 * process, this will cause it to fail through to the next authentication
	 * method. Known oc_http_auth_status states treated as failure are:
	 *
	 * 'init' - indicating we redirected to server_auth.php and it 401ed back
	 * to us
	 * 'logout' - indicating an HTTP-authenticated user logged out manually
	 * (this mechanism allows an HTTP-authenticated user to switch between
	 * HTTP and non-HTTP auth)
	 * 'failure' - indicating server_auth ran but reported no authenticated
	 * user.
	 */
	public function isSessionActive() {
		if (OC_User::isLoggedIn()) {
			if (!empty($_SESSION["oc_http_auth_status"]) && $_SESSION["oc_http_auth_status"] === "authed") {
				return true;
			}
			return false;
		}
		if (!empty($_SESSION["oc_http_auth_status"]) && $_SESSION["oc_http_auth_status"] === "preauth") {
			return true;
		}
		$requestUri = urldecode(OC_Request::requestUri());
		if (strpos($requestUri, 'remote.php') !== false) {
			return false;
		}
		if (empty($_SESSION["oc_http_auth_status"]) || ($_SESSION["oc_http_auth_status"] === "authed")) {
			$_SESSION['oc_http_auth_status'] = "init";
			session_write_close();
			header('Location: ' . OC_Helper::linkToAbsolute('', 'server_auth.php',
					array('redirect_url' => OC_Request::requestUri())
					));
			exit();
		}
		return false;
	}

	/**
	 * The default is fine for our purposes, swiped it from user.php
	 *
	 * @return string with one or more HTML attributes.
	 */
	public function getLogoutAttribute() {
		return 'href="' . link_to('', 'index.php') . '?logout=true&requesttoken=' . OC_Util::callRegister() . '"';
	}

	/**
	 * Return the id of the authenticated user, as provided by server_auth.php
	 * @return string
	 */
	public function getCurrentUserId() {
		$user = NULL;
		$session = \OC::$server->getSession();
		$authUser = $_SESSION["oc_http_auth_user"];
		if (OC_User::userExists($authUser)) {
			$user = $authUser;
		}
		return $user;
	}

	/**
	 * Poke the auth state at pre-login - this helps user flip between HTTP
	 * auth and fallback. If we are in the HTTP auth path ("preauth"), leave
	 * it alone, it'll get set to "authed" in the post-login hook. Otherwise,
	 * we're in a fallback path, so unset it to make the next attempt try
	 * HTTP auth again.
	 */
	public static function httpPreLogin($parameters) {
		if (!empty($_SESSION["oc_http_auth_status"]) && $_SESSION["oc_http_auth_status"] == "preauth") {
			return;
		}
		$session = \OC::$server->getSession();
		$session->remove('oc_http_auth_status');
	}

	/**
	 * At post-login, if we're on the HTTP auth path, status should now be
	 * "authed".
	 */
	public static function httpPostLogin($parameters) {
		if (!empty($_SESSION["oc_http_auth_status"]) && $_SESSION["oc_http_auth_status"] == "preauth") {
			$session = \OC::$server->getSession();
			$session->set('oc_http_auth_status', "authed");
		}
	}
	
	/**
	 * Make sure all session variables are cleaned up on OC logout
	 */
	public static function httpLogout() {
		$session = \OC::$server->getSession();
		$user = OCP\User::getUser();
		$session->remove('oc_http_auth_user');
		// If the login was HTTP authed, set oc_http_auth_status to a value
		// that will be treated as 'failure' by isSessionActive() - this lets
		// an HTTP-authed user switch to password auth...
		if (!empty($_SESSION["oc_http_auth_status"]) && $_SESSION["oc_http_auth_status"] === "authed") {
			$session->set('oc_http_auth_status', "logout");
		// ...and if it was set to anything else, clear it, which will make
		// HTTP auth 'active' again for the next pass. pre-login hook should've
		// done this anyway, but...
		} else {
			$session->remove('oc_http_auth_status');
		}
	}
}
