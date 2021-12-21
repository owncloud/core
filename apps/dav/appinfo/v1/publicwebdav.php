<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

// load needed apps
use OC\Files\Filesystem;
use OC\Files\Storage\Wrapper\PermissionsMask;
use OC\Files\View;
use OCA\DAV\Connector\Sabre\AutorenamePlugin;
use OCA\DAV\Files\Sharing\PublicLinkCheckPlugin;
use OCA\DAV\Files\Sharing\PublicLinkEventsPlugin;
use OCA\FederatedFileSharing\AppInfo\Application;
use OCP\Constants;
use OCP\Files\NotFoundException;
use Sabre\DAV\Exception\NotAuthenticated;
use Sabre\DAV\Exception\NotFound;

$RUNTIME_APPTYPES = ['filesystem', 'authentication', 'logging'];

OC_App::loadApps($RUNTIME_APPTYPES);

OC_Util::obEnd();
\OC::$server->getSession()->close();

// Backends
$authBackend = new OCA\DAV\Connector\PublicAuth(
	\OC::$server->getRequest(),
	\OC::$server->getShareManager(),
	\OC::$server->getSession()
);

$serverFactory = new OCA\DAV\Connector\Sabre\ServerFactory(
	\OC::$server->getConfig(),
	\OC::$server->getLogger(),
	\OC::$server->getDatabaseConnection(),
	\OC::$server->getUserSession(),
	\OC::$server->getMountManager(),
	\OC::$server->getTagManager(),
	\OC::$server->getRequest(),
	\OC::$server->getTimeFactory()
);

$requestUri = \OC::$server->getRequest()->getRequestUri();

$linkCheckPlugin = new PublicLinkCheckPlugin();
$linkEventsPlugin = new PublicLinkEventsPlugin(\OC::$server->getEventDispatcher());

$server = $serverFactory->createServer($baseuri, $requestUri, $authBackend, function () use ($authBackend, $linkCheckPlugin) {
	$isAjax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest');
	$federatedSharingApp = new Application();
	$federatedShareProvider = $federatedSharingApp->getFederatedShareProvider();
	if ($federatedShareProvider->isOutgoingServer2serverShareEnabled() === false && !$isAjax) {
		// this is what is thrown when trying to access a nonexistent share
		throw new NotAuthenticated();
	}

	$share = $authBackend->getShare();
	$owner = $share->getShareOwner();
	$fileId = $share->getNodeId();

	// FIXME: should not add storage wrappers outside of preSetup, need to find a better way
	$previousLog = Filesystem::logWarningWhenAddingStorageWrapper(false);
	Filesystem::addStorageWrapper('sharePermissions', function ($mountPoint, $storage) use ($share) {
		return new PermissionsMask(['storage' => $storage, 'mask' => $share->getPermissions() | Constants::PERMISSION_SHARE]);
	});
	Filesystem::logWarningWhenAddingStorageWrapper($previousLog);

	# in case any fs is already mounted: tear it down
	OC_Util::tearDownFS();

	# setup fs for the share owner
	if (!OC_Util::setupFS($owner)) {
		# in absolute rare cases setting up the file system for a user might fail
		\OC::$server->getLogger()->error("Could not setup file system for $owner");
		throw new \Sabre\DAV\Exception();
	}
	$ownerView = Filesystem::getView();
	try {
		$path = $ownerView->getPath($fileId);
	} catch (NotFoundException $e) {
		\OC::$server->getLogger()->error("Could not get path for $fileId in files of user $owner");
		throw new NotFound();
	}
	$fileInfo = $ownerView->getFileInfo($path);
	$linkCheckPlugin->setFileInfo($fileInfo);

	\OC::$server->getEventDispatcher()->addListener(
		'public.user.resolve',
		function ($event) use ($share) {
			$event->setArgument('user', $share->getSharedWith());
		}
	);

	return new View($ownerView->getAbsolutePath($path));
}, true);

$server->addPlugin(new AutorenamePlugin());
$server->addPlugin($linkCheckPlugin);
$server->addPlugin($linkEventsPlugin);

// And off we go!
$server->start();
