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

$app = new \OCA\FederatedFileSharing\AppInfo\Application('federatedfilesharing');

use OCA\FederatedFileSharing\Notifier;
use OCP\Share\Events\AcceptShare;
use OCP\Share\Events\DeclineShare;
use OCP\Defaults;

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

// add 'Add to your ownCloud' button to public pages
// FIXME the OCA\Files::loadAdditionalScripts event is only fired by the ViewController of the files app ... but we are nowadays using webdav.
// FIXME versions, comments, tags and sharing ui still uses it https://github.com/owncloud/core/search?utf8=%E2%9C%93&q=loadAdditionalScripts&type=
OCP\Util::connectHook('OCP\Share', 'share_link_access', 'OCA\FederatedFileSharing\HookHandler', 'loadPublicJS');

// react to accept and decline share events
$eventDispatcher = \OC::$server->getEventDispatcher();
$eventDispatcher->addListener(
	AcceptShare::class,
	function (AcceptShare $event) use ($app) {
		/** @var \OCA\FederatedFileSharing\Notifications $notifications */
		$notifications = $app->getContainer()->query('OCA\FederatedFileSharing\Notifications');
		$notifications->sendAcceptShare(
			$event->getRemote(),
			$event->getRemoteId(),
			$event->getShareToken()
		);
	}
);

$eventDispatcher->addListener(
	DeclineShare::class,
	function (DeclineShare $event) use ($app) {
		/** @var \OCA\FederatedFileSharing\Notifications $notifications */
		$notifications = $app->getContainer()->query('OCA\FederatedFileSharing\Notifications');
		$notifications->sendDeclineShare(
			$event->getRemote(),
			$event->getRemoteId(),
			$event->getShareToken()
		);
	}
);
