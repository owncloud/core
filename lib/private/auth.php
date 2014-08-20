<?php
/**
 * @author Clark Tomlinson  <fallen013@gmail.com>
 * @since 8/20/14, 10:53 AM
 * @link http:/www.clarkt.com
 * @copyright Clark Tomlinson © 2014
 *
 */

namespace OC;


use OC;
use OC_App;
use OC_JSON;
use OC_User;
use OC_Util;

/**
 * Class Auth
 */
class Auth {

	/**
	 *
	 */
	public static function handleAuthHeaders() {
		//copy http auth headers for apache+php-fcgid work around
		if (isset($_SERVER['HTTP_XAUTHORIZATION']) && !isset($_SERVER['HTTP_AUTHORIZATION'])) {
			$_SERVER['HTTP_AUTHORIZATION'] = $_SERVER['HTTP_XAUTHORIZATION'];
		}

		// Extract PHP_AUTH_USER/PHP_AUTH_PW from other headers if necessary.
		$vars = array(
			'HTTP_AUTHORIZATION', // apache+php-cgi work around
			'REDIRECT_HTTP_AUTHORIZATION', // apache+php-cgi alternative
		);
		foreach ($vars as $var) {
			if (isset($_SERVER[$var]) && preg_match('/Basic\s+(.*)$/i', $_SERVER[$var], $matches)) {
				list($name, $password) = explode(':', base64_decode($matches[1]), 2);
				$_SERVER['PHP_AUTH_USER'] = $name;
				$_SERVER['PHP_AUTH_PW'] = $password;
				break;
			}
		}
	}

	/**
	 * Handles logins
	 */
	public static function handleLogin() {
		OC_App::loadApps(array('prelogin'));
		$error = array();

		// auth possible via apache module?
		if (Auth::tryApacheAuth()) {
			$error[] = 'apacheauthfailed';
		} // remember was checked after last login
		elseif (Auth::tryRememberLogin()) {
			$error[] = 'invalidcookie';
		} // logon via web form
		elseif (Auth::tryFormLogin()) {
			$error[] = 'invalidpassword';
		}

		OC_Util::displayLoginPage(array_unique($error));
	}

	/**
	 * Remove outdated and therefore invalid tokens for a user
	 *
	 * @param string $user
	 */
	protected static function cleanupLoginTokens($user) {
		$cutoff = time() - OC::$server->getConfig()->getSystemValue('remember_login_cookie_lifetime', 1296000);
		$tokens = OC::$server->getPreferences()->getKeys($user, 'login_token');
		foreach ($tokens as $token) {
			$time = OC::$server->getPreferences()->getValue($user, 'login_token', $token);
			if ($time < $cutoff) {
				OC::$server->getPreferences()->deleteKey($user, 'login_token', $token);
			}
		}
	}

	/**
	 * Try to login a user via HTTP authentication
	 *
	 * @return bool|void
	 */
	protected static function tryApacheAuth() {
		$return = OC_User::handleApacheAuth();

		// if return is true we are logged in -> redirect to the default page
		if ($return === true) {
			$_REQUEST['redirect_url'] = \OC_Request::requestUri();
			OC_Util::redirectToDefaultPage();
			exit;
		}

		// in case $return is null apache based auth is not enabled
		return is_null($return) ? false : true;
	}

	/**
	 * Try to login a user using the remember me cookie.
	 *
	 * @return bool Whether the provided cookie was valid
	 */
	protected static function tryRememberLogin() {
		if (!isset($_COOKIE["oc_remember_login"])
			|| !isset($_COOKIE["oc_token"])
			|| !isset($_COOKIE["oc_username"])
			|| !$_COOKIE["oc_remember_login"]
			|| !OC_Util::rememberLoginAllowed()
		) {
			return false;
		}

		if (defined("DEBUG") && DEBUG) {
			OC::$server->getLogger()
				->debug('Trying to login from cookie', array('app' => 'core'));
		}

		if (OC_User::userExists($_COOKIE['oc_username'])) {
			self::cleanupLoginTokens($_COOKIE['oc_username']);
			// verify whether the supplied "remember me" token was valid
			$granted = OC_User::loginWithCookie(
				$_COOKIE['oc_username'], $_COOKIE['oc_token']);
			if ($granted === true) {
				OC_Util::redirectToDefaultPage();
				// doesn't return
			}
			OC::$server->getLogger()
				->warning('Authentication cookie rejected for user ' . $_COOKIE['oc_username'], array('app' => 'core'));
			// if you reach this point you have changed your password
			// or you are an attacker
			// we can not delete tokens here because users may reach
			// this point multiple times after a password change
		}

		OC_User::unsetMagicInCookie();
		return true;
	}

	/**
	 * Tries to login a user using the form based authentication
	 *
	 * @return bool|void
	 */
	public static function tryFormLogin() {
		if (!isset($_POST["user"]) || !isset($_POST['password'])) {
			return false;
		}

		OC_JSON::callCheck();
		OC_App::loadApps();

		//setup extra user backends
		OC_User::setupBackends();

		if (OC_User::login($_POST["user"], $_POST["password"])) {
			// setting up the time zone
			if (isset($_POST['timezone-offset'])) {
				OC::$session->set('timezone', $_POST['timezone-offset']);
			}

			$userid = OC_User::getUser();
			self::cleanupLoginTokens($userid);
			if (!empty($_POST["remember_login"])) {
				if (defined("DEBUG") && DEBUG) {
					OC::$server->getLogger()->debug('Setting remember login to cookie', array('app' => 'core'));
				}
				$token = OC_Util::generateRandomBytes(32);
				OC::$server->getPreferences()->setValue($userid, 'login_token', $token, time());
				OC_User::setMagicInCookie($userid, $token);
			} else {
				OC_User::unsetMagicInCookie();
			}
			OC_Util::redirectToDefaultPage();
			exit();
		}
		return true;
	}

	/**
	 * Try to login a user using HTTP authentication.
	 *
	 * @return bool
	 */
	public static function tryBasicAuthLogin() {
		if (!isset($_SERVER["PHP_AUTH_USER"])
			|| !isset($_SERVER["PHP_AUTH_PW"])
			|| (isset($_COOKIE['oc_ignore_php_auth_user']) && $_COOKIE['oc_ignore_php_auth_user'] === $_SERVER['PHP_AUTH_USER'])
		) {
			return false;
		}

		if (OC_User::login($_SERVER["PHP_AUTH_USER"], $_SERVER["PHP_AUTH_PW"])) {
			//OC_Log::write('core',"Logged in with HTTP Authentication", OC_Log::DEBUG);
			OC_User::unsetMagicInCookie();
			$_SERVER['HTTP_REQUESTTOKEN'] = OC_Util::callRegister();
		}
		return true;
	}
}