<?php declare(strict_types=1);
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

$classLoader = new \Composer\Autoload\ClassLoader();
$classLoader->addPsr4("Page\\", __DIR__ . "/../lib", true);
$classLoader->addPsr4("TestHelpers\\", __DIR__ . "/../../../TestHelpers", true);
$classLoader->register();

// Sleep for 10 milliseconds
const STANDARD_SLEEP_TIME_MILLISEC = 10;
const STANDARD_SLEEP_TIME_MICROSEC = STANDARD_SLEEP_TIME_MILLISEC * 1000;

// Long timeout for use in code that needs to wait for known slow UI
const LONG_UI_WAIT_TIMEOUT_MILLISEC = 60000;
// Default timeout for use in code that needs to wait for the UI
const STANDARD_UI_WAIT_TIMEOUT_MILLISEC = 10000;
// Minimum timeout for use in code that needs to wait for the UI
const MINIMUM_UI_WAIT_TIMEOUT_MILLISEC = 500;
const MINIMUM_UI_WAIT_TIMEOUT_MICROSEC = MINIMUM_UI_WAIT_TIMEOUT_MILLISEC * 1000;

// Minimum timeout for emails
const EMAIL_WAIT_TIMEOUT_SEC = 10;
const EMAIL_WAIT_TIMEOUT_MILLISEC = EMAIL_WAIT_TIMEOUT_SEC * 1000;

// Default number of times to retry where retries are useful
const STANDARD_RETRY_COUNT = 5;
// Minimum number of times to retry where retries are useful
const MINIMUM_RETRY_COUNT = 2;

// The remote server-under-test might or might not happen to have this directory.
// If it does not exist, then the tests may end up creating it.
const ACCEPTANCE_TEST_DIR_ON_REMOTE_SERVER = "tests/acceptance";

// The following directory should NOT already exist on the remote server-under-test.
// Acceptance tests are free to do anything needed in this directory, and to
// delete it during or at the end of testing.
const TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER = ACCEPTANCE_TEST_DIR_ON_REMOTE_SERVER . "/server_tmp";

// The following directory is created, used, and deleted by tests that need to
// use some "local external storage" on the server.
const LOCAL_STORAGE_DIR_ON_REMOTE_SERVER = TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER . "/local_storage";
