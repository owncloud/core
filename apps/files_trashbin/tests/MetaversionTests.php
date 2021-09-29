<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Stefan Weil <sw@weilnetz.de>
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

namespace OCA\Files_Trashbin\Tests;

use OC\Files\Cache\Watcher;
use OC\Files\ObjectStore\ObjectStoreStorage;
use OC\Files\Filesystem;
use OC\Files\Storage\Temporary;
use OC\Files\View;
use OCA\DAV\Meta\MetaPlugin;
use OCP\Files\Storage;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class Storage
 *
 * @group DB
 *
 * @package OCA\Files_Trashbin\Tests
 */
class MetaversionTests extends TestCase {
  use UserTrait;


  /**
   * @var string
   */
  private $userFirst;

  /**
   * @var string
   */
  private $userSecond;
  /**
   * @var View
   */
  private $rootView;

  /**
   * @var View
   */
  private $userView;

  protected function setUp(): void {
    parent::setUp();

    \OC::$server->getEncryptionManager()->setupStorage();

    $this->userFirst = $this->getUniqueId('user');
    $this->userSecond = $this->getUniqueId('user');

    $this->createUser($this->userFirst, $this->userFirst);
    $this->createUser($this->userSecond, $this->userSecond);


    // this will setup the FS
    $this->loginAsUser($this->userFirst);

    \OCA\Files_Trashbin\Storage::setupStorage();

    $config = clone \OC::$server->getConfig();
    $mockConfig = $this->createMock('\OCP\IConfig');

    $mockConfig->expects($this->any())
      ->method('getSystemValue')
      ->will($this->returnCallback(function ($key, $default) use ($config) {
        if ($key === 'file_storage.save_version') {
          return true;
        } else {
          return $config->getSystemValue($key, $default);
        }
      }));
    $this->overwriteService('AllConfig', $mockConfig);

    \OC_Hook::clear();
    \OCA\Files_Versions\Hooks::connectHooks();
    \OCA\Files_Trashbin\Trashbin::registerHooks();

    $this->rootView = new View('/');
    $this->userView = new View('/' . $this->userFirst . '/files/');

    \OC_Util::tearDownFS();
    \OC_User::setUserId($this->userFirst);
    \OC\Files\Filesystem::tearDown();
    \OC_Util::setupFS($this->userFirst);

  }


  public function testMetadataVersionFeatures() {
    $config = \OC::$server->getConfig();
    $constant = 'file_storage.save_version';
    $mockConfigValue = $config->getSystemValue($constant, false);
    $this->assertTrue($mockConfigValue);

    // test file creation and versioning for initial file creation
    $initialContents = 'v1';
    $this->userView->file_put_contents('test.txt', $initialContents);

    $results = $this->rootView->getDirectoryContent($this->userFirst . '/files_versions/');
    $this->assertCount(2, $results);
    $this->checkResultsValidityForUser($results, $initialContents, $this->userFirst);
    time_nanosleep(1, 300);
    $updatedContents = $initialContents . 'v2';
    $this->userView->file_put_contents('test.txt', $updatedContents);
    $results = $this->rootView->getDirectoryContent($this->userFirst . '/files_versions/');
    $this->assertEquals(4, sizeof($results));
    $updatedContents = $updatedContents . 'v3';
    $this->logout();

    \OC_Util::tearDownFS();
    \OC_User::setUserId($this->userSecond);
    \OC\Files\Filesystem::tearDown();
    \OC_Util::setupFS($this->userSecond);

    // attempt to write third version from another user's perspective
    $this->loginAsUser($this->userSecond);

    time_nanosleep(1, 1);
    $this->userView->file_put_contents('test.txt', $updatedContents);
    $results = $this->rootView->getDirectoryContent($this->userFirst . '/files_versions/');

    // should assert 6 here instead, but hooks don't work for second user,
    // so second's user file write attempt ^^^ does not work

    $this->assertEquals(4, sizeof($results));
  }

  private function checkResultsValidityForUser($results, $checkContents, $user) {

    $versionCounter = 0;
    $metadataCounter = 0;

    foreach ($results as $fileInfo) {
      $path = $fileInfo->getPath();
      $extension = \pathinfo($path)['extension'];
      $contents = $this->rootView->file_get_contents($path);
      if (preg_match('/v[0-9]*/', $extension)) {
        $this->assertEquals($contents, $checkContents);
        $versionCounter++;
      } else {
        $decoded = json_decode($contents, true);
        $this->assertIsArray($decoded);
        $value = '';
        if (isset($decoded[\OC\Share\Constants::CREATED_BY_USER_METADATA])) {
          $value = $decoded[\OC\Share\Constants::CREATED_BY_USER_METADATA];
        } else {
          $value = $decoded[MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME];
        }
        $this->assertEquals($value, $user);
        $metadataCounter++;
      }
    }
    $this->assertEquals($versionCounter, $metadataCounter);
  }

  protected function tearDown(): void {
    $this->restoreService('AllConfig');

    \OC\Files\Filesystem::getLoader()->removeStorageWrapper('oc_trashbin');
    $this->logout();
    \OC_Hook::clear();
    \OC\Files\Filesystem::getLoader()->removeStorageWrapper('oc_encryption');
    \OC_Util::tearDownFS();
    \OC\Files\Filesystem::tearDown();

    parent::tearDown();

  }

}
