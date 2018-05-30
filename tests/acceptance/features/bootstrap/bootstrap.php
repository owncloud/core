<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */

require __DIR__ . '/../../../../lib/composer/autoload.php';

$classLoader = new \Composer\Autoload\ClassLoader();
$classLoader->addPsr4("Page\\", __DIR__ . "/../lib", true);
$classLoader->addPsr4("TestHelpers\\", __DIR__ . "/../../../TestHelpers", true);
$classLoader->addPsr4(
	"", __DIR__ . "/../../../../apps/notifications/tests/acceptance/features/bootstrap", true
);
$classLoader->register();

// Sleep for 10 milliseconds
const STANDARDSLEEPTIMEMILLISEC = 10;
const STANDARDSLEEPTIMEMICROSEC = STANDARDSLEEPTIMEMILLISEC * 1000;

// Long timeout for use in code that needs to wait for known slow UI
const LONGUIWAITTIMEOUTMILLISEC = 60000;
// Default timeout for use in code that needs to wait for the UI
const STANDARDUIWAITTIMEOUTMILLISEC = 10000;
// Minimum timeout for use in code that needs to wait for the UI
const MINIMUMUIWAITTIMEOUTMILLISEC = 500;
// Default number of times to retry where retries are useful
const STANDARDRETRYCOUNT = 5;
// Minimum number of times to retry where retries are useful
const MINIMUMRETRYCOUNT = 2;
