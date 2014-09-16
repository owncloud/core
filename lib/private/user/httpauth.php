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
 * need to configure server authentication for the rest of ownCloud.
 */

OC_Hook::connect('OC_User', 'logout', 'OC_User_HTTPAuth', 'httpLogout');

class OC_User_HTTPAuth extends OC_User_Backend implements \OCP\Authentication\IApacheBackend {
	/**
	 * Has a user been authenticated by the server?
	 *
	 * If a user is already logged in, returns 'true' if oc_http_auth_status
	 * cookie is set to 'authed', indicating the current user authenticated via
	 * HTTP. Returns 'false' otherwise. Note that it's not safe to assume
	 * isSessionActive() is only hit during a login procedure; there's a
	 * couple of other paths that hit it. Handling it this way if a user is
	 * logged in protects against some failures hit in testing.
	 *
	 * If no user is logged in at present, the following logic occurs.
	 * 
	 * 1. If the request URI contains 'remote.php' we assume it's a DAV request
	 * and bail out, returning 'false'; DAV isn't going to work properly via
	 * HTTP auth in most (any?) cases. You can trivially 'spoof' this mechanism
	 * by appending ?remote.php to an otherwise-valid request, but this
	 * shouldn't be a security issue of any kind because you'd still have to
	 * auth through some other mechanism to get anywhere after doing that.
	 *
	 * 2. If oc_http_auth_status is empty or 'authed', we redirect to the
	 * authentication page, server_auth.php, which does the work of checking
	 * whether the server has authenticated a user, sets some cookies if one
	 * is - including setting oc_http_auth_status to 'preauth' - and redirects
	 * back here (where we'll hit the 'preauth' state below).
	 
	 * Empty indicates a sort of 'base state' - first ever attempt, or first
	 * attempt for a long time, or after logout or some other condition has
	 * cleared the cookie.
	 *
	 * 'authed' but no user is logged in indicates the OC user session has gone
	 * away for some reason, and we should run back through the auth process and
	 * set up a new one.
	 *
	 * Before redirecting, we set oc_http_auth_status to 'init', with a short
	 * expiry. The point of this is that if server authentication fails on
	 * server_auth.php, it won't run at all. The server admin can configure its
	 * 401 error to redirect back here, though, and then we catch the 'init'
	 * state and treat it as a failure, thus falling through to password
	 * auth. The short expiry gives the user a couple of minutes to login via
	 * password auth, otherwise the next reload will try HTTP auth again.
	 *
	 * 3. If oc_http_auth_status is 'preauth', return 'true'. This is the
	 * value set by the HTTP authentication script (server_auth.php) when we
	 * have run it and it has successfully checked that a user is authenticated
	 * and populated some other cookies with values that will be read by
	 * getCurrentUserId(). This is the expected state when we are in the middle
	 * of HTTP authentication (after we were already hit once and decided to
	 * hand off to server_auth.php).
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
			if (!empty($_COOKIE["oc_http_auth_status"])) {
				if ($_COOKIE["oc_http_auth_status"] === "authed") {
					return true;
				}
			}
			return false;
		} else {
			$requestUri = urldecode(OC_Request::requestUri());
			if (strpos($requestUri, 'remote.php') !== false) {
				return false;
			}
			if (empty($_COOKIE["oc_http_auth_status"]) || ($_COOKIE["oc_http_auth_status"] === "authed")) {
				setcookie("oc_http_auth_status", "init", time() + 120, \OC::$WEBROOT);
				header('Location: ' . OC_Helper::linkToAbsolute('', 'server_auth.php',
						array('redirect_url' => OC_Request::requestUri())
					));
				exit();
			} else if ($_COOKIE["oc_http_auth_status"] === "preauth") {
				return true;
			} else {
				return false;
			}
		}
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
		// read in the values server_auth.php gave us, then unset the cookies
		$authUser = $_COOKIE["oc_http_auth_user"];
		$authToken = $_COOKIE["oc_http_auth_token"];
		unset($_COOKIE["oc_http_auth_user"]);
		unset($_COOKIE["oc_http_auth_token"]);
		setcookie('oc_http_auth_user', '', time()-3600, \OC::$WEBROOT);
		setcookie('oc_http_auth_token', '', time()-3600, \OC::$WEBROOT);
		$storedToken = \OC_Appconfig::getValue('core', 'http_auth_token_' . $authUser);
		\OC_Appconfig::deleteKey('core', 'http_auth_token' . $authUser);
		
		// test that the tokens match.
		if ($authToken === $storedToken) {
			if (OC_User::userExists($authUser)) {
				$user = $authUser;
				// stolen from user/session.php
				$expires = time() + \OC_Config::getValue('remember_login_cookie_lifetime', 60 * 60 * 24 * 15);
				// This should really happen in a postLogin hook, but this is
				// probably good enough. You could conceivably wind up in a
				// loop if loginWithApache() somehow failed after this is set.				
				setcookie("oc_http_auth_status", "authed", $expires, \OC::$WEBROOT);
			}
		}
		return $user;
	}
	
	/**
	 * Make sure all cookies (and stored token) are cleaned up on OC logout
	 */
	public static function httpLogout() {
		unset($_COOKIE["oc_http_auth_user"]);
		unset($_COOKIE["oc_http_auth_token"]);
		unset($_COOKIE["oc_http_auth_identified"]);
		setcookie('oc_http_auth_user', '', time()-3600, \OC::$WEBROOT);
		setcookie('oc_http_auth_token', '', time()-3600, \OC::$WEBROOT);
		setcookie('oc_http_auth_identified', '', time()-3600, \OC::$WEBROOT);
		\OC_Appconfig::deleteKey('core', 'http_auth_token');
		// If the login was HTTP authed, set oc_http_auth_status to a value
		// that will be treated as 'failure' by isSessionActive() - this lets
		// an HTTP-authed user switch to password auth...
		if ($_COOKIE["oc_http_auth_status"] === "authed") {
			setcookie("oc_http_auth_status", "logout", time() + 120, \OC::$WEBROOT);
		// ...and if it was set to anything else, clear it, which will make
		// HTTP auth 'active' again for the next pass.
		} else {
			unset($_COOKIE["oc_http_auth_status"]);
			setcookie('oc_http_auth_status', '', time()-3600, \OC::$WEBROOT);
		}
	}
}
