<?php
/**
 * Copyright (c) 2015 Bjoern Schiessle <schiessle@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

$app = new \OCA\Files_Sharing\Application();
/* @var $controller OCA\Files_Sharing\Controllers\SettingsController */
$controller = $app->getContainer()->query('SettingsController');
return $controller->displayPanel()->render();

