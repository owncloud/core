<?php declare(strict_types=1);

/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace Test\Files;

use OC\Files\View;
use OCP\Files\Folder;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class FilePropertiesTest
 *
 * @package Test\Files
 * @group DB
 */
class FilePropertiesTest extends TestCase {
	use UserTrait;

	private $userId;
	private $file;

	protected function tearDown() {
		self::logout();
		parent::tearDown();
	}

	/**
	 * @throws \Exception
	 */
	protected function setUp() {
		parent::setUp();

		// create user
		$this->userId = 'file-props-user';
		$this->createUser($this->userId);
		self::loginAsUser($this->userId);

		// create file
		$this->file = self::getUniqueID('file') . '.txt';
		$fileName = "{$this->userId}/files/{$this->file}";
		$view = new View();
		$view->file_put_contents($fileName, '1234');
	}

	/**
	 * @throws \Exception
	 * @throws \OCP\Files\NotFoundException
	 */
	public function testFilePropertiesInNodeAPI() :void {

		// work on node api
		/** @var Folder $metaNodeOfFile */
		$file = \OC::$server->getUserFolder($this->userId)->get($this->file);
		$props = $file->getProperties();
		self::assertEmpty($props);

		$file->addProperty('{http://owncloud.org/ns}upload-time', '2018-11-29T00:47:24-08:00');

		$props = $file->getProperties();
		self::assertEquals($props, ['{http://owncloud.org/ns}upload-time' => '2018-11-29T00:47:24-08:00']);

		$file->deleteProperty('{http://owncloud.org/ns}upload-time');

		$props = $file->getProperties();
		self::assertEmpty($props);
	}
}
