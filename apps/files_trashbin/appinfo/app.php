<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author Florin Peter <github@florin-peter.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
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

// register hooks
\OCA\Files_Trashbin\Trashbin::registerHooks();

if (\class_exists('OCA\Files\App')) {
	\OCA\Files\App::getNavigationManager()->add(function () {
		$l = \OC::$server->getL10N('files_trashbin');
		return [
			'id' => 'trashbin',
			'appname' => 'files_trashbin',
			'script' => 'list.php',
			'order' => 50,
			'name' => $l->t('Deleted files'),
		];
	});

	$app = new \OCA\Files_Trashbin\AppInfo\Application();
	$app->registerListeners();
}
