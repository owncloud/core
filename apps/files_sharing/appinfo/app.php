<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2011 - 2013 Michael Gapczynski mtgap@owncloud.com
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
 */

OC::$CLASSPATH['OCA\Files\Share\FileShare'] = 'files_sharing/lib/share/fileshare.php';
OC::$CLASSPATH['OCA\Files\Share\FileShareBackend'] = 'files_sharing/lib/share/filesharebackend.php';
OC::$CLASSPATH['OCA\Files\Share\FolderShareBackend'] = 'files_sharing/lib/share/foldersharebackend.php';
OC::$CLASSPATH['OCA\Files\Share\FileShareFactory'] = 'files_sharing/lib/share/filesharefactory.php';
OC::$CLASSPATH['OCA\Files\Share\FileTargetMachine'] = 'files_sharing/lib/share/filetargetmachine.php';
OC::$CLASSPATH['OCA\Files\Share\FileShareFetcher'] = 'files_sharing/lib/share/filesharefetcher.php';
OC::$CLASSPATH['OC\Files\Storage\Shared'] = 'files_sharing/lib/sharedstorage.php';
OC::$CLASSPATH['OC\Files\Cache\SharedCache'] = 'files_sharing/lib/cache.php';
OC::$CLASSPATH['OC\Files\Cache\SharedPermissions'] = 'files_sharing/lib/permissions.php';
OC::$CLASSPATH['OC\Files\Cache\SharedUpdater'] = 'files_sharing/lib/updater.php';
OC::$CLASSPATH['OC\Files\Cache\SharedWatcher'] = 'files_sharing/lib/watcher.php';

// \OC_Hook::connect('OC_Filesystem', 'post_write', '\OC\Files\Cache\Shared_Updater', 'writeHook');
// \OC_Hook::connect('OC_Filesystem', 'delete', '\OC\Files\Cache\Shared_Updater', 'deleteHook');
// \OC_Hook::connect('OC_Filesystem', 'post_rename', '\OC\Files\Cache\Shared_Updater', 'renameHook');

$shareManager = \OCP\Share::getShareManager();
$timeMachine = new \OC\Share\TimeMachine();
$fileShareFactory = new \OCA\Files\Share\FileShareFactory();
$fileTargetMachine = new \OCA\Files\Share\FileTargetMachine();
$userManager = \OC_User::getManager();
$groupManager = \OC_Group::getManager();
$tokenMachine = new \OC\Share\ShareType\TokenMachine();
$hasher = new \PasswordHash(8, (CRYPT_BLOWFISH != 1));
$fileShareTypes = array(
	new \OC\Share\ShareType\User('file', $fileShareFactory, $fileTargetMachine, $userManager,
		$groupManager
	),
	new \OC\Share\ShareType\Group('file', $fileShareFactory, $fileTargetMachine, $groupManager,
		$userManager
	),
	new \OC\Share\ShareType\Link('file', $fileShareFactory, $fileTargetMachine, $userManager,
		$tokenMachine, $hasher
	),
);
$folderShareTypes = array(
	new \OC\Share\ShareType\User('folder', $fileShareFactory, $fileTargetMachine, $userManager,
		$groupManager
	),
	new \OC\Share\ShareType\Group('folder', $fileShareFactory, $fileTargetMachine, $groupManager,
		$userManager
	),
	new \OC\Share\ShareType\Link('folder', $fileShareFactory, $fileTargetMachine, $userManager,
		$tokenMachine, $hasher
	),
);
$fileShareBackend = new \OCA\Files\Share\FileShareBackend($timeMachine, $fileShareTypes);
$folderShareBackend = new \OCA\Files\Share\FolderShareBackend($timeMachine, $folderShareTypes);
$shareManager->registerShareBackend($fileShareBackend);
$shareManager->registerShareBackend($folderShareBackend);
// TODO Wait for hook changes so we can use a closure to replace setup and pass in ShareManager
\OCP\Util::connectHook('OC_Filesystem', 'setup', '\OC\Files\Storage\Shared', 'setup');
\OCP\Util::addScript('files_sharing', 'share');