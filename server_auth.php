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
	unset($_SESSION["oc_http_auth_user"]);

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
		$_SESSION['oc_http_auth_status'] = "preauth";
		$_SESSION['oc_http_auth_user'] = $remoteuser;
		// This magically seems to redirect to the right place. Thanks, OC.
		session_write_close();
		OC_Util::redirectToDefaultPage();
	}
	$_SESSION['oc_http_auth_status'] = "failure";
	session_write_close();
	OC_Util::redirectToDefaultPage();

} catch (\OC\ServiceUnavailableException $ex) {
	OC_Response::setStatus(OC_Response::STATUS_SERVICE_UNAVAILABLE);
	\OCP\Util::writeLog('server_auth', $ex->getMessage(), \OCP\Util::FATAL);
	OC_Template::printExceptionErrorPage($ex);
} catch (Exception $ex) {
	OC_Response::setStatus(OC_Response::STATUS_INTERNAL_SERVER_ERROR);
	\OCP\Util::writeLog('server_auth', $ex->getMessage(), \OCP\Util::FATAL);
	OC_Template::printExceptionErrorPage($ex);
}
