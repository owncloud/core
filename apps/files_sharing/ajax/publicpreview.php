<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
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

// FIXME: rewrite this as a controller
use OCP\Share\Exceptions\ShareNotFound;

OCP\JSON::checkAppEnabled('files_sharing');

\OC_User::setIncognitoMode(true);

$file = \array_key_exists('file', $_GET) ? (string) $_GET['file'] : '';
$maxX = \array_key_exists('x', $_GET) ? (int) $_GET['x'] : '32';
$maxY = \array_key_exists('y', $_GET) ? (int) $_GET['y'] : '32';
$scalingUp = \array_key_exists('scalingup', $_GET) ? (bool) $_GET['scalingup'] : true;
$token = \array_key_exists('t', $_GET) ? (string) $_GET['t'] : '';
$keepAspect = \array_key_exists('a', $_GET) ? true : false;

if ($token === '') {
	\OC_Response::setStatus(\OC_Response::STATUS_BAD_REQUEST);
	\OCP\Util::writeLog('core-preview', 'No token parameter was passed', \OCP\Util::DEBUG);
	exit;
}

$shareManager = \OC::$server->getShareManager();
try {
	$linkedItem = $shareManager->getShareByToken($token);
} catch (ShareNotFound $e) {
	\OC_Response::setStatus(\OC_Response::STATUS_NOT_FOUND);
	\OCP\Util::writeLog('core-preview', 'Passed token parameter is not valid', \OCP\Util::DEBUG);
	exit;
}

$userId = $linkedItem->getShareOwner();
if ($userId === null) {
	\OC_Response::setStatus(\OC_Response::STATUS_INTERNAL_SERVER_ERROR);
	\OCP\Util::writeLog('core-preview', 'Passed token seems to be valid, but it does not contain all necessary information . ("' . $token . '")', \OCP\Util::WARN);
	exit;
}

OCP\JSON::checkUserExists($userId);

// FS setup and file existence check is already done in getNode()
try {
	$node = $linkedItem->getNode();
} catch (\OCP\Files\NotFoundException $e) {
	\OC_Response::setStatus(\OC_Response::STATUS_NOT_FOUND);
	\OCP\Util::writeLog('core-preview', 'Could not resolve file for shared item', \OCP\Util::WARN);
	exit;
}

$path = $node->getPath();

if ($linkedItem->getNodeType() === 'folder') {
	$isValid = \OC\Files\Filesystem::isValidPath($file);
	if (!$isValid) {
		\OC_Response::setStatus(\OC_Response::STATUS_BAD_REQUEST);
		\OCP\Util::writeLog('core-preview', 'Passed filename is not valid, might be malicious (file:"' . $file . '";ip:"' . \OC::$server->getRequest()->getRemoteAddress() . '")', \OCP\Util::WARN);
		exit;
	}
	$sharedFile = $node->get($file);
}

if ($linkedItem->getNodeType() === 'file') {
	$path = $node->getParent()->getPath();
	$sharedFile = $node;
}

$path = \ltrim(\OC\Files\Filesystem::normalizePath($path, false), '/');

if ($maxX === 0 || $maxY === 0) {
	\OC_Response::setStatus(\OC_Response::STATUS_BAD_REQUEST);
	\OCP\Util::writeLog('core-preview', 'x and/or y set to 0', \OCP\Util::DEBUG);
	exit;
}

// $path is relative to the data directory but Preview expects it to be relative to the user's
// so strip the first component
$root = \substr($path, \strpos($path, '/') + 1);

try {
	$preview = new \OC\Preview($userId, $root);
	$preview->setFile($sharedFile);
	$preview->setMaxX($maxX);
	$preview->setMaxY($maxY);
	$preview->setScalingUp($scalingUp);
	$preview->setKeepAspect($keepAspect);

	$preview->showPreview();
} catch (\OCP\Files\NotFoundException $e) {
	\OC_Response::setStatus(\OC_Response::STATUS_NOT_FOUND);
	\OCP\Util::writeLog('core-preview', 'Requested file not found', \OCP\Util::WARN);
} catch (\OCP\Files\ForbiddenException $e) {
	\OC_Response::setStatus(\OC_Response::STATUS_FORBIDDEN);
	\OCP\Util::writeLog('core', $e->getmessage(), \OCP\Util::DEBUG);
} catch (\Exception $e) {
	\OC_Response::setStatus(\OC_Response::STATUS_INTERNAL_SERVER_ERROR);
	\OCP\Util::writeLog('core', $e->getmessage(), \OCP\Util::DEBUG);
}
