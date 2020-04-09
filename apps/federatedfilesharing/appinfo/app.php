<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

use OCA\FederatedFileSharing\Notifier;

$app = new \OCA\FederatedFileSharing\AppInfo\Application();

$manager = \OC::$server->getNotificationManager();
$manager->registerNotifier(function () {
	return new Notifier(
		\OC::$server->getL10NFactory()
	);
}, function () {
	$l = \OC::$server->getL10N('files_sharing');
	return [
		'id' => 'files_sharing',
		'name' => $l->t('Federated sharing'),
	];
});

$app->registerListeners();
