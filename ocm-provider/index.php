<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

require_once __DIR__ . '/../lib/base.php';

$server = \OC::$server;

$isFederationEnabled = $server->getAppManager()
	->isEnabledForUser('federatedfilesharing');
if ($isFederationEnabled) {
	\OC_App::loadApp('federatedfilesharing');
	$federatedSharingApp = new \OCA\FederatedFileSharing\AppInfo\Application();
	$federatedSharingApp->dispatch('OcmController', 'discovery');
} else {
	$output = new \OC\AppFramework\Http\Output('');
	$output->setHttpResponseCode(
		\OCP\AppFramework\Http::STATUS_NOT_IMPLEMENTED
	);
	$output->setOutput('501 Not Implemented');
}
