<?php
/**
 * @author Arthur Schiwon <blizzz@owncloud.com>
 * @author Frank Karlitschek <frank@owncloud.org>
 * @author Jakob Sack <mail@jakobsack.de>
 * @author Lukas Reschke <lukas@owncloud.com>
 * @author Michael Göhler <somebody.here@gmx.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

OCP\User::checkAdminUser();
$l = \OC_L10N::get('files');

$uploadChangable = getenv('htaccessWorking') == 'true' && is_writable(OC::$SERVERROOT.'/.htaccess');
$maxFileSizeUnits = ['B', 'kB', 'MB', 'GB', 'TB'];

$phpIni = \OC::$server->getIniWrapper();
$maxUploadFileSize = min($phpIni->getBytes('upload_max_filesize'), $phpIni->getBytes('post_max_size'));

if ($uploadChangable && isset($_POST['maxUploadSizeValue']) && OC_Util::isCallRegistered()) {
	$postMaxSizeUnit = (string) $_POST['maxUploadSizeUnit'];
	$value = ((int) $_POST['maxUploadSizeValue']) . ' ';
	$value .= (in_array($postMaxSizeUnit, $maxFileSizeUnits)) ? $postMaxSizeUnit : 'B';
	if (($setMaxSize = OC_Files::setUploadLimit(OCP\Util::computerFileSize($value))) !== false) {
		$maxUploadFileSize = $setMaxSize;
	}
}

list($maxUploadFileSizeValue, $maxUploadFileSizeUnit) = explode(' ', \OCP\Util::humanFileSize($maxUploadFileSize));

$tmpl = new OCP\Template( 'files', 'admin' );
$tmpl->assign('uploadChangable', $uploadChangable);
$tmpl->assign('uploadMaxFileSizeValue', $maxUploadFileSizeValue);
$tmpl->assign('uploadMaxFileSizeUnit', $maxUploadFileSizeUnit);
$tmpl->assign('maxFileSizeUnits', $maxFileSizeUnits);
// max possible makes only sense on a 32 bit system
$tmpl->assign('displayMaxPossibleUploadSize', PHP_INT_SIZE===4);
$tmpl->assign('maxPossibleUploadSize', OCP\Util::humanFileSize(PHP_INT_MAX));
return $tmpl->fetchPage();
