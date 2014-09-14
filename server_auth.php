<?php
/**
 * ownCloud - HTTP authentication backend - authentication page
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

try {
	require_once 'lib/base.php';
	$secure_cookie = \OC_Config::getValue("forcessl", false); //stolen from user/session.php
	$shortexpires = time() + 120;

	// We set 'init' before coming here to catch the case where this page
	// 401s and redirects back. If we're running, status is now 'unsure' again,
	// so let's unset
	unset($_COOKIE["oc_http_auth_status"]);
	unset($_COOKIE["oc_http_auth_user"]);
	unset($_COOKIE["oc_http_auth_token"]);
	setcookie('oc_http_auth_status', '', time()-3600, \OC::$WEBROOT);
	setcookie('oc_http_auth_user', '', time()-3600, \OC::$WEBROOT);
	setcookie('oc_http_auth_token', '', time()-3600, \OC::$WEBROOT);

	// Do we have an authed user?
	$remoteuser = NULL;
	if (!empty($_SERVER['REMOTE_USER'])) {
		$remoteuser = $_SERVER['REMOTE_USER'];
	}
	else if (!empty($_SERVER['REDIRECT_REMOTE_USER'])) {
		$remoteuser = $_SERVER['REDIRECT_REMOTE_USER'];
	}
	
	if ($remoteuser) {
		// Set up stuff to tell index.php there's an authed user (and who it is)
		// and then send the browser back there
		$token = \OC::$server->getSecureRandom()->getMediumStrengthGenerator()->generate(32);
		setcookie("oc_http_auth_status", "preauth", $shortexpires, \OC::$WEBROOT);
		setcookie("oc_http_auth_user", $remoteuser, $shortexpires, \OC::$WEBROOT, '', $secure_cookie);
		setcookie("oc_http_auth_token", $token, $shortexpires, \OC::$WEBROOT, '', $secure_cookie);
		\OC_Appconfig::setValue('core', 'http_auth_token_' . $remoteuser, $token);
		// This magically seems to redirect to the right place. Thanks, OC.
		OC_Util::redirectToDefaultPage();
	} else {
		setcookie("oc_http_auth_status", "failure", $shortexpires, \OC::$WEBROOT);
		OC_Util::redirectToDefaultPage();
	}
	
} catch (\OC\ServiceUnavailableException $ex) {
	OC_Response::setStatus(OC_Response::STATUS_SERVICE_UNAVAILABLE);
	\OCP\Util::writeLog('remote', $ex->getMessage(), \OCP\Util::FATAL);
	OC_Template::printExceptionErrorPage($ex);
} catch (Exception $ex) {
	OC_Response::setStatus(OC_Response::STATUS_INTERNAL_SERVER_ERROR);
	\OCP\Util::writeLog('remote', $ex->getMessage(), \OCP\Util::FATAL);
	OC_Template::printExceptionErrorPage($ex);
}
