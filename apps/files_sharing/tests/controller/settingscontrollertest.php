<?php

/**
 * ownCloud
 *
 * @copyright (C) 2015 ownCloud, Inc.
 *
 * @author Bjoern Schiessle <schiessle@owncloud.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCA\Files_Sharing\Tests\Controller;

use OCA\Files_Sharing\Controllers\SettingsController;

class SettingsControllerTest extends \Test\TestCase {
	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $user;

	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $request;

	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $urlGenerator;

	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $aliasManager;

	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $userManager;

	/** @var \OCP\IL10N */
	protected $l10n;

	/** @var SettingsController */
	protected $controller;

	protected function setUp() {
		parent::setUp();

		$this->aliasManager = $this->getMockBuilder('OCA\Files_Sharing\External\AliasManager')
			->disableOriginalConstructor()
			->getMock();

		$this->user = $this->getMock('OCP\IUser');
		$this->request = $this->getMock('OCP\IRequest');
		$this->urlGenerator = $this->getMock('OCP\IURLGenerator');
		$this->l10n = \OCP\Util::getL10N('activity', 'en');
		$this->userManager = $this->getMock('OCP\IUserManager');

		$this->controller = new SettingsController(
			'files_sharing',
			$this->request,
			$this->user,
			$this->urlGenerator,
			$this->l10n,
			$this->aliasManager,
			$this->userManager
		);
	}

	/**
	 *
	 * @dataProvider urlProvider
	 */
	public function testNormalizePath($url, $expectedResult) {
		$this->assertSame($expectedResult,
			\Test_Helper::invokePrivate($this->controller, 'normalizeUrl', array($url))
		);
	}

	public function urlProvider() {
		return array(
			array('https://owncloud.org', 'owncloud.org'),
			array('http://owncloud.org', 'owncloud.org'),
			array('owncloud.org', 'owncloud.org'),
			array('owncloud.org/', 'owncloud.org'),
		);
	}

	public function testDisplayPanelWithAlias() {
		$this->user->expects($this->any())
			->method('getUid')
			->willReturn('user1');
		$this->urlGenerator->expects($this->once())
			->method('getAbsoluteURL')
			->with($this->equalTo('/'))
			->willReturn('http://owncloud.org');
		$this->aliasManager->expects($this->once())
			->method('getAlias')
			->with($this->equalTo('user1'))
			->willReturn('alias1');

		$result = $this->controller->displayPanel()->render();

		$this->assertContains('<form id="federatedCloudIdForm" class="section">', $result);
		$this->assertContains('value="alias1"', $result);
		$this->assertContains('@owncloud.org', $result);
	}

	public function testDisplayPanelWithoutAlias() {
		$this->user->expects($this->any())
			->method('getUid')
			->willReturn('user1');
		$this->urlGenerator->expects($this->once())
			->method('getAbsoluteURL')
			->with($this->equalTo('/'))
			->willReturn('owncloud.org');
		$this->aliasManager->expects($this->once())
			->method('getAlias')
			->with($this->equalTo('user1'))
			->willReturn(null);

		$result = $this->controller->displayPanel()->render();

		$this->assertContains('<form id="federatedCloudIdForm" class="section">', $result);
		$this->assertContains('value="user1"', $result);
		$this->assertContains('@owncloud.org', $result);
	}

	/**
	 *
	 * @dataProvider personalDataProvider
	 */
	public function testPersonal($alias, $expectedResult) {
		$this->user->expects($this->any())
			->method('getUid')
			->willReturn('user1');
		$this->aliasManager->expects($this->any())
			->method('aliasExists')
			->will($this->returnCallback(array($this, 'aliasExistsCallback')));

		$this->aliasManager->expects($this->any())
			->method('updateAlias')
			->willReturn(true);
		$this->userManager->expects($this->any())
			->method('userExists')
			->will($this->returnCallback(array($this, 'userExistsCallback')));

		$result = $this->controller->personal($alias);
		$data = $result->getData();
		$this->assertSame($expectedResult, $data['status']);
	}

	public function personalDataProvider() {
		return array(
			array('alias1', 'error'),
			array('alias2', 'success'),
			array('alias3', 'error'),
			array('alias4', 'error'),
			array('user1', 'success'),
		);
	}

	public function aliasExistsCallback() {
		$result = false;
		$args = func_get_args();

		switch ($args[0]) {
			case 'alias1':
				$result = true;
				break;
			case 'alias2':
				$result = false;
				break;
			case 'alias3':
				$result = false;
				break;
			case 'alias4':
				$result = true;
				break;
			case 'user1':
				$result = true;
				break;
			default:
				$this->fail('unexpected argument');
		}

		return $result;
	}

	public function userExistsCallback() {
		$result = false;
		$args = func_get_args();

		switch ($args[0]) {
			case 'alias1':
				$result = true;
				break;
			case 'alias2':
				$result = false;
				break;
			case 'alias3':
				$result = true;
				break;
			case 'alias4':
				$result = false;
				break;
			case 'user1':
				$result = true;
				break;
			default:
				$this->fail('unexpected argument');
		}

		return $result;
	}

}
