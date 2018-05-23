<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
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

use OCP\SystemTag\ManagerEvent;
use OCP\SystemTag\MapperEvent;

$eventDispatcher = \OC::$server->getEventDispatcher();
$eventDispatcher->addListener(
	'OCA\Files::loadAdditionalScripts',
	function () {
		\OCP\Util::addScript('select2-toggleselect');
		\OCP\Util::addScript('oc-backbone-webdav');
		\OCP\Util::addScript('systemtags/systemtags');
		\OCP\Util::addScript('systemtags/systemtagmodel');
		\OCP\Util::addScript('systemtags/systemtagsmappingcollection');
		\OCP\Util::addScript('systemtags/systemtagscollection');
		\OCP\Util::addScript('systemtags/systemtagsinputfield');
		\OCP\Util::addScript('systemtags', 'app');
		\OCP\Util::addScript('systemtags', 'systemtagsfilelist');
		\OCP\Util::addScript('systemtags', 'filesplugin');
		\OCP\Util::addScript('systemtags', 'systemtagsinfoview');
		\OCP\Util::addStyle('systemtags');
		\OCP\Util::addStyle('systemtags', 'systemtagsfilelist');
	}
);

$activityManager = \OC::$server->getActivityManager();
$activityManager->registerExtension(function () {
	$application = new \OCP\AppFramework\App('systemtags');
	/** @var \OCA\SystemTags\Activity\Extension $extension */
	$extension = $application->getContainer()->query('OCA\SystemTags\Activity\Extension');
	return $extension;
});

$managerListener = function (ManagerEvent $event) use ($activityManager) {
	$application = new \OCP\AppFramework\App('systemtags');
	/** @var \OCA\SystemTags\Activity\Listener $listener */
	$listener = $application->getContainer()->query('OCA\SystemTags\Activity\Listener');
	$listener->event($event);
};

$eventDispatcher->addListener(ManagerEvent::EVENT_CREATE, $managerListener);
$eventDispatcher->addListener(ManagerEvent::EVENT_DELETE, $managerListener);
$eventDispatcher->addListener(ManagerEvent::EVENT_UPDATE, $managerListener);

$mapperListener = function (MapperEvent $event) use ($activityManager) {
	$application = new \OCP\AppFramework\App('systemtags');
	/** @var \OCA\SystemTags\Activity\Listener $listener */
	$listener = $application->getContainer()->query('OCA\SystemTags\Activity\Listener');
	$listener->mapperEvent($event);
};

$eventDispatcher->addListener(MapperEvent::EVENT_ASSIGN, $mapperListener);
$eventDispatcher->addListener(MapperEvent::EVENT_UNASSIGN, $mapperListener);

\OCA\Files\App::getNavigationManager()->add(function () {
	$l = \OC::$server->getL10N('systemtags');
	return [
		'id' => 'systemtagsfilter',
		'appname' => 'systemtags',
		'script' => 'list.php',
		'order' => 25,
		'name' => $l->t('Tags')
	];
});
