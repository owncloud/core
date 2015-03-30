<?php
/**
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
namespace OCA\Files_Sharing\Controller;

use OC\Files\Filesystem;
use OCA\Files_Sharing\Application;
use OCP\AppFramework\IAppContainer;
use OCP\AppFramework\Http;
use OCP\Security\ISecureRandom;
use OC\Files\View;
use OCP\Share;

/**
 * @package OCA\Files_Sharing\Controllers
 */
class AjaxControllerTest extends \Test\Testcase {

	/** @var IAppContainer */
	private $container;
	/** @var string */
	private $user;
	/** @var string */
	private $token;
	/** @var string */
	private $oldUser;
	/** @var AjaxController */
	private $ajaxController;

	protected function setUp() {
		$app = new Application();
		$this->container = $app->getContainer();
		$this->container['Config'] = $this->getMockBuilder('\OCP\IConfig')
			->disableOriginalConstructor()->getMock();
		$this->container['AppName'] = 'files_sharing';
		$this->container['Session'] = $this->getMockBuilder('\OCP\ISession')
			->disableOriginalConstructor()->getMock();
		$this->container['AppConfig'] = $this->getMockBuilder('\OC\AppConfig')
			->disableOriginalConstructor()->getMock();
		$this->ajaxController = $this->container['AjaxController'];

		// Store current user
		$this->oldUser = \OC_User::getUser();

		// Create a dummy user
		$this->user = \OC::$server->getSecureRandom()->getLowStrengthGenerator()->generate(12, ISecureRandom::CHAR_LOWER);

		\OC_User::createUser($this->user, $this->user);
		\OC_Util::tearDownFS();
		\OC_User::setUserId('');
		Filesystem::tearDown();
		\OC_User::setUserId($this->user);
		\OC_Util::setupFS($this->user);

		// Create a dummy shared file
		$view = new View('/'. $this->user . '/files');
		$view->mkdir("foo");
		$view->mkdir("foo/bar");
		$view->file_put_contents('foo/file1.txt', 'I am such an awesome shared file!');
		$this->token = \OCP\Share::shareItem(
			'folder',
			Filesystem::getFileInfo('foo')->getId(),
			\OCP\Share::SHARE_TYPE_LINK,
			'IAmPasswordProtected!',
			1
		);
	}

	protected function tearDown() {
		\OC_Util::tearDownFS();
		\OC_User::setUserId('');
		Filesystem::tearDown();
		\OC_User::deleteUser($this->user);
		\OC_User::setIncognitoMode(false);

		\OC::$server->getSession()->set('public_link_authenticated', '');

		// Set old user
		\OC_User::setUserId($this->oldUser);
		\OC_Util::setupFS($this->oldUser);
	}

	public function testInvalidShareToken() {
		$response = $this->ajaxController->getList($this->token.'x', '/');

		$this->assertCount(0, $response->getData());
		$this->assertEquals(Http::STATUS_NOT_FOUND, $response->getStatus());
	}

	public function testInvalidAuth() {
		$this->container['Session']->method('exists')->willReturn(false);

		$response = $this->ajaxController->getList($this->token, '/');

		$this->assertCount(0, $response->getData());
		$this->assertEquals(Http::STATUS_FORBIDDEN, $response->getStatus());
	}

	public function testBasicResponse() {
		$linkItem = \OCP\Share::getShareByToken($this->token, false);
		$this->container['Session']->method('exists')->willReturn(true);
		$this->container['Session']->method('get')->willReturn($linkItem['id']);

		$response = $this->ajaxController->getList($this->token, '/');

		$this->assertEquals(Http::STATUS_OK, $response->getStatus());
		$this->assertCount(2, $response->getData());

		$this->assertArrayHasKey('status', $response->getData());
		$this->assertEquals('success', $response->getData()['status']);
	}

	public function testCorrectElements() {
		$linkItem = \OCP\Share::getShareByToken($this->token, false);
		$this->container['Session']->method('exists')->willReturn(true);
		$this->container['Session']->method('get')->willReturn($linkItem['id']);

		$response = $this->ajaxController->getList($this->token, '/');

		$this->assertArrayHasKey('data', $response->getData());
		$this->assertArrayHasKey('files', $response->getData()['data']);

		$gotFile = false;
		$gotDir = false;

		foreach ($response->getData()['data']['files'] as $file) {
			if ($file['mimetype'] === 'httpd/unix-directory' &&
				$file['name'] === 'bar') {
				$gotDir = true;
			} else if ($file['mimetype'] === 'text/plain' &&
			           $file['name'] === 'file1.txt') {
				$gotFile = true;
			}
		}

		$this->assertTrue($gotFile);
		$this->assertTrue($gotDir);
	}


	public function testRemovedAttributes() {
		$linkItem = \OCP\Share::getShareByToken($this->token, false);
		$this->container['Session']->method('exists')->willReturn(true);
		$this->container['Session']->method('get')->willReturn($linkItem['id']);

		$response = $this->ajaxController->getList($this->token, '/');

		$this->assertArrayHasKey('data', $response->getData());
		$this->assertArrayHasKey('files', $response->getData()['data']);

		foreach ($response->getData()['data']['files'] as $file) {
			$this->assertArrayNotHasKey('directory', $file);
			$this->assertArrayNotHasKey('shareOwner', $file);
			$this->assertArrayNotHasKey('mountType', $file);
			$this->assertArrayNotHasKey('icon', $file);
		}
	}

	public function testSubFolder() {
		$linkItem = \OCP\Share::getShareByToken($this->token, false);
		$this->container['Session']->method('exists')->willReturn(true);
		$this->container['Session']->method('get')->willReturn($linkItem['id']);

		$response = $this->ajaxController->getList($this->token, '/bar');

		$this->assertEquals(Http::STATUS_OK, $response->getStatus());
		$this->assertCount(2, $response->getData());

		$this->assertArrayHasKey('status', $response->getData());
		$this->assertEquals('success', $response->getData()['status']);
	}

	/**
	 * Invalid subdir should throw 404
	 */
	public function testInvalidSubFolder() {
		$linkItem = \OCP\Share::getShareByToken($this->token, false);
		$this->container['Session']->method('exists')->willReturn(true);
		$this->container['Session']->method('get')->willReturn($linkItem['id']);

		$response = $this->ajaxController->getList($this->token, '/baz');

		$this->assertEquals(Http::STATUS_NOT_FOUND, $response->getStatus());
		$this->assertCount(0, $response->getData());
	}
}
