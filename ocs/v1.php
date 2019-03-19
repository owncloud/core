<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Philipp Schaffrath <github@philippschaffrath.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@users.noreply.github.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Tom Needham <tom@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
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

use OC\OCS\Exception;
use OC\OCS\Result;
use OC\User\LoginException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

require_once __DIR__ . '/../lib/base.php';

if (\OCP\Util::needUpgrade()
	|| \OC::$server->getSystemConfig()->getValue('maintenance', false)
	|| \OC::$server->getSystemConfig()->getValue('singleuser', false)) {
	// since the behavior of apps or remotes are unpredictable during
	// an upgrade, return a 503 directly
	OC_Response::setStatus(OC_Response::STATUS_SERVICE_UNAVAILABLE);
	$response = new Result(null, OC_Response::STATUS_SERVICE_UNAVAILABLE, 'Service unavailable');
	OC_API::respond($response, OC_API::requestedFormat());
	exit;
}

/*
 * First we try the routes of the appframework
 */
try {
	OC_App::loadApps(['session']);
	OC_App::loadApps(['authentication']);
	// load all apps to get all api routes properly setup
	OC_App::loadApps();

	// force language as given in the http request
	\OC::$server->getL10NFactory()->setLanguageFromRequest();

	OC::$server->getRouter()->match('/ocs'.\OC::$server->getRequest()->getRawPathInfo());
	return;
} catch (ResourceNotFoundException $e) {
	// Fall through the not found
} catch (MethodNotAllowedException $e) {
	OC_API::setContentType();
	OC_Response::setStatus(405);
	exit();
} catch (Exception $ex) {
	OC_API::respond($ex->getResult(), OC_API::requestedFormat());
	exit();
}

/*
 * Then we try the old OCS routes
 */
try {
	if (!\OC::$server->getUserSession()->isLoggedIn() || !\OC::$server->getUserSession()->verifyAuthHeaders(\OC::$server->getRequest())) {
		OC::handleLogin(\OC::$server->getRequest());
	}

	OC::$server->getRouter()->match('/ocsapp'.\OC::$server->getRequest()->getRawPathInfo());
} catch (LoginException $e) {
	OC_API::respond(new Result(null, \OCP\API::RESPOND_UNAUTHORISED, 'Unauthorised'), OC_API::requestedFormat());
} catch (ResourceNotFoundException $e) {
	OC_API::setContentType();
	OC_API::notFound();
} catch (MethodNotAllowedException $e) {
	OC_API::setContentType();
	OC_Response::setStatus(405);
} catch (Exception $ex) {
	OC_API::respond($ex->getResult(), OC_API::requestedFormat());
}
