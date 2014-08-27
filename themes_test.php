<?php

/**
* ownCloud
*
* @author Frank Karlitschek
* @copyright 2010 Frank Karlitschek karlitschek@kde.org
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

	// $l = OC_L10N::get('files_sharing');

	// OC::$CLASSPATH['OC_Share_Backend_File'] = 'files_sharing/lib/share/file.php';
	// OC::$CLASSPATH['OC_Share_Backend_Folder'] = 'files_sharing/lib/share/folder.php';
	// OC::$CLASSPATH['OC\Files\Storage\Shared'] = 'files_sharing/lib/sharedstorage.php';
	// OC::$CLASSPATH['OC\Files\Cache\Shared_Cache'] = 'files_sharing/lib/cache.php';
	// OC::$CLASSPATH['OC\Files\Cache\Shared_Permissions'] = 'files_sharing/lib/permissions.php';
	// OC::$CLASSPATH['OC\Files\Cache\Shared_Updater'] = 'files_sharing/lib/updater.php';
	// OC::$CLASSPATH['OC\Files\Cache\Shared_Watcher'] = 'files_sharing/lib/watcher.php';
	// OC::$CLASSPATH['OCA\Files\Share\Api'] = 'files_sharing/lib/api.php';
	// OC::$CLASSPATH['OCA\Files\Share\Maintainer'] = 'files_sharing/lib/maintainer.php';
	// OC::$CLASSPATH['OCA\Files\Share\Proxy'] = 'files_sharing/lib/proxy.php';

	// \OCP\App::registerAdmin('files_sharing', 'settings-admin');

	// \OCA\Files_Sharing\Helper::registerHooks();

	// OCP\Share::registerBackend('file', 'OC_Share_Backend_File');
	// OCP\Share::registerBackend('folder', 'OC_Share_Backend_Folder', 'file');

	// OCP\Util::addScript('files_sharing', 'share');
	// OCP\Util::addScript('files_sharing', 'external');

	// OC_FileProxy::register(new OCA\Files\Share\Proxy());

	// $config = \OC::$server->getConfig();
	//oc_owncloud / facc7377cfcd54de12e9012547819c
	// // $share = \OC\Share\Share::getItemSharedWithUser('file','9','quisa137');
	// $share = Helper::generateTarget('file', $itemSource, self::SHARE_TYPE_USER, 'quisa137','owncloud', $suggestedItemTarget, $parent);
	// print_r($share);
} catch (Exception $ex) {
	\OCP\Util::logException('index', $ex);

	//show the user a detailed error page
	OC_Response::setStatus(OC_Response::STATUS_INTERNAL_SERVER_ERROR);
	OC_Template::printExceptionErrorPage($ex);
}
phpinfo();
?>