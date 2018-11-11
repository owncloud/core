<?php
/**
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
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

namespace OCA\Files\Tests\Controller;

use OC\L10N\L10NString;
use OCA\Files\Controller\ViewController;
use OCP\App\IAppManager;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\Files\Folder;
use OCP\IConfig;
use OCP\IL10N;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserSession;
use OCP\Template;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Test\TestCase;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class ViewControllerTest
 *
 * @package OCA\Files\Tests\Controller
 */
class ViewControllerTest extends TestCase {
	/** @var IRequest | \PHPUnit_Framework_MockObject_MockObject */
	private $request;
	/** @var IURLGenerator | \PHPUnit_Framework_MockObject_MockObject */
	private $urlGenerator;
	/** @var IL10N */
	private $l10n;
	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject */
	private $config;
	/** @var EventDispatcherInterface */
	private $eventDispatcher;
	/** @var ViewController | \PHPUnit_Framework_MockObject_MockObject */
	private $viewController;
	/** @var IUser */
	private $user;
	/** @var IUserSession */
	private $userSession;
	/** @var IAppManager | \PHPUnit_Framework_MockObject_MockObject */
	private $appManager;
	/** @var Folder | \PHPUnit_Framework_MockObject_MockObject */
	private $rootFolder;

	public function setUp() {
		parent::setUp();
		$this->request = $this->createMock('\OCP\IRequest');
		$this->urlGenerator = $this->createMock('\OCP\IURLGenerator');
		$this->l10n = $this->createMock('\OCP\IL10N');
		$this->config = $this->createMock('\OCP\IConfig');
		$this->eventDispatcher = $this->createMock('\Symfony\Component\EventDispatcher\EventDispatcherInterface');
		$this->userSession = $this->createMock('\OCP\IUserSession');
		$this->appManager = $this->createMock('\OCP\App\IAppManager');
		$this->user = $this->createMock('\OCP\IUser');
		$this->user->expects($this->any())
			->method('getUID')
			->will($this->returnValue('test@#?%test'));
		$this->userSession->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));
		$this->rootFolder = $this->createMock('\OCP\Files\Folder');
		$this->viewController = $this->getMockBuilder('\OCA\Files\Controller\ViewController')
			->setConstructorArgs([
				'files',
				$this->request,
				$this->urlGenerator,
				$this->l10n,
				$this->config,
				$this->eventDispatcher,
				$this->userSession,
				$this->appManager,
				$this->rootFolder
			])
			->setMethods([
				'getStorageInfo',
				'renderScript'
			])
			->getMock();

		$this->urlGenerator
			->expects($this->any())
			->method('linkTo')
			->with('', 'remote.php')
			->will($this->returnValue('/owncloud/remote.php'));
	}

	public function testIndexWithIE8RedirectAndDirDefined() {
		$this->request
			->expects($this->once())
			->method('isUserAgent')
			->with(['/MSIE 8.0/'])
			->will($this->returnValue(true));
		$this->urlGenerator
			->expects($this->once())
			->method('linkToRoute')
			->with('files.view.index')
			->will($this->returnValue('/owncloud/index.php/apps/files/'));

		$expected = new Http\RedirectResponse('/owncloud/index.php/apps/files/#?dir=MyDir');
		$this->assertEquals($expected, $this->viewController->index('MyDir'));
	}

	public function testIndexWithIE8RedirectAndViewDefined() {
		$this->request
			->expects($this->once())
			->method('isUserAgent')
			->with(['/MSIE 8.0/'])
			->will($this->returnValue(true));
		$this->urlGenerator
			->expects($this->once())
			->method('linkToRoute')
			->with('files.view.index')
			->will($this->returnValue('/owncloud/index.php/apps/files/'));

		$expected = new Http\RedirectResponse('/owncloud/index.php/apps/files/#?dir=/&view=MyView');
		$this->assertEquals($expected, $this->viewController->index('', 'MyView'));
	}

	public function testIndexWithIE8RedirectAndViewAndDirDefined() {
		$this->request
			->expects($this->once())
			->method('isUserAgent')
			->with(['/MSIE 8.0/'])
			->will($this->returnValue(true));
		$this->urlGenerator
			->expects($this->once())
			->method('linkToRoute')
			->with('files.view.index')
			->will($this->returnValue('/owncloud/index.php/apps/files/'));

		$expected = new RedirectResponse('/owncloud/index.php/apps/files/#?dir=MyDir&view=MyView');
		$this->assertEquals($expected, $this->viewController->index('MyDir', 'MyView'));
	}

	public function testIndexWithRegularBrowser() {
		$this->request
			->expects($this->once())
			->method('isUserAgent')
			->with(['/MSIE 8.0/'])
			->will($this->returnValue(false));
		$this->viewController
			->expects($this->once())
			->method('getStorageInfo')
			->will($this->returnValue([
				'relative' => 123,
				'owner' => 'MyName',
				'ownerDisplayName' => 'MyDisplayName',
			]));
		$this->config->expects($this->exactly(3))
			->method('getUserValue')
			->will($this->returnValueMap([
				[$this->user->getUID(), 'files', 'file_sorting', 'name', 'name'],
				[$this->user->getUID(), 'files', 'file_sorting_direction', 'asc', 'asc'],
				[$this->user->getUID(), 'files', 'show_hidden', false, false],
			]));

		$this->config
			->expects($this->any())
			->method('getAppValue')
			->will($this->returnArgument(2));

		$this->urlGenerator->method('linkTo')
			->with('', 'remote.php')
			->willReturn('/owncloud/remote.php');
		$this->urlGenerator->method('getAbsoluteUrl')
			->with('/owncloud/remote.php/dav/files/test%40%23%3F%25test/')
			->willReturn('http://example.org/owncloud/remote.php/dav/files/test%40%23%3F%25test/');

		$nav = new Template('files', 'appnavigation');
		$nav->assign('navigationItems', [
			[
				'id' => 'files',
				'appname' => 'files',
				'script' => 'list.php',
				'order' => 0,
				'name' => new L10NString(\OC::$server->getL10NFactory()->get('files'), 'All files', []),
				'active' => false,
				'icon' => '',
			],
			[
				'id' => 'favorites',
				'appname' => 'files',
				'script' => 'simplelist.php',
				'order' => 5,
				'name' => null,
				'active' => false,
				'icon' => '',
			],
			[
				'id' => 'sharingin',
				'appname' => 'files_sharing',
				'script' => 'list.php',
				'order' => 10,
				'name' => new L10NString(\OC::$server->getL10NFactory()->get('files_sharing'), 'Shared with you', []),
				'active' => false,
				'icon' => '',
			],
			[
				'id' => 'sharingout',
				'appname' => 'files_sharing',
				'script' => 'list.php',
				'order' => 15,
				'name' => new L10NString(\OC::$server->getL10NFactory()->get('files_sharing'), 'Shared with others', []),
				'active' => false,
				'icon' => '',
			],
			[
				'id' => 'sharinglinks',
				'appname' => 'files_sharing',
				'script' => 'list.php',
				'order' => 20,
				'name' => new L10NString(\OC::$server->getL10NFactory()->get('files_sharing'), 'Shared by link', []),
				'active' => false,
				'icon' => '',
			],
			[
				'id' => 'systemtagsfilter',
				'appname' => 'systemtags',
				'script' => 'list.php',
				'order' => 25,
				'name' => new L10NString(\OC::$server->getL10NFactory()->get('systemtags'), 'Tags', []),
				'active' => false,
				'icon' => '',
			],
			[
				'id' => 'trashbin',
				'appname' => 'files_trashbin',
				'script' => 'list.php',
				'order' => 50,
				'name' => new L10NString(\OC::$server->getL10NFactory()->get('files_trashbin'), 'Deleted files', []),
				'active' => false,
				'icon' => '',
			],
		]);
		$nav->assign('webdavUrl', 'http://example.org/owncloud/remote.php/dav/files/test%40%23%3F%25test/');

		$expected = new Http\TemplateResponse(
			'files',
			'index',
			[
				'usedSpacePercent' => 123,
				'owner' => 'MyName',
				'ownerDisplayName' => 'MyDisplayName',
				'isPublic' => false,
				'defaultFileSorting' => 'name',
				'defaultFileSortingDirection' => 'asc',
				'showHiddenFiles' => 0,
				'fileNotFound' => 0,
				'mailNotificationEnabled' => 'no',
				'mailPublicNotificationEnabled' => 'no',
				'socialShareEnabled' => 'yes',
				'allowShareWithLink' => 'yes',
				'appNavigation' => $nav,
				'appContents' => [
					[
						'id' => 'files',
						'content' => null,
					],
					[
						'id' => 'favorites',
						'content' => null,
					],
					[
						'id' => 'sharingin',
						'content' => null,
					],
					[
						'id' => 'sharingout',
						'content' => null,
					],
					[
						'id' => 'sharinglinks',
						'content' => null,
					],
					[
						'id' => 'systemtagsfilter',
						'content' => null,
					],
					[
						'id' => 'trashbin',
						'content' => null,
					],
				],
			]
		);
		$policy = new Http\ContentSecurityPolicy();
		$policy->addAllowedFrameDomain('\'self\'');
		$expected->setContentSecurityPolicy($policy);
		$this->assertEquals($expected, $this->viewController->index('MyDir', 'MyView'));
	}

	public function showFileMethodProvider() {
		return [
			[true],
			[false],
		];
	}

	/**
	 * @dataProvider showFileMethodProvider
	 */
	public function testShowFileRouteWithFolder($useShowFile) {
		$node = $this->createMock('\OCP\Files\Folder');
		$node->expects($this->any())
			->method('getPath')
			->will($this->returnValue('/test@#?%test/files/to sp@ce/a@b#?%'));

		$baseFolder = $this->createMock('\OCP\Files\Folder');

		$this->rootFolder->expects($this->once())
			->method('get')
			->with('test@#?%test/files/')
			->will($this->returnValue($baseFolder));

		$baseFolder->expects($this->any())
			->method('getById')
			->with(123)
			->will($this->returnValue([$node]));
		$baseFolder->expects($this->any())
			->method('getRelativePath')
			->with('/test@#?%test/files/to sp@ce/a@b#?%')
			->will($this->returnValue('/to sp@ce/a@b#?%'));

		$this->urlGenerator
			->expects($this->once())
			->method('linkToRoute')
			->with('files.view.index', ['dir' => '/to sp@ce/a@b#?%'])
			->will($this->returnValue('/owncloud/index.php/apps/files/?dir=/to%20sp%40ce/a%40b%23%3F%25'));

		$expected = new Http\RedirectResponse('/owncloud/index.php/apps/files/?dir=/to%20sp%40ce/a%40b%23%3F%25');
		$expected->addHeader('Webdav-Location', '/owncloud/remote.php/dav/files/test%40%23%3F%25test/to%20sp%40ce/a%40b%23%3F%25');
		if ($useShowFile) {
			$this->assertEquals($expected, $this->viewController->showFile(123));
		} else {
			$this->assertEquals($expected, $this->viewController->index('/whatever', '', '123'));
		}
	}

	/**
	 * @dataProvider showFileMethodProvider
	 */
	public function testShowFileRouteWithFile($useShowFile) {
		$parentNode = $this->createMock('\OCP\Files\Folder');
		$parentNode->expects($this->any())
			->method('getPath')
			->will($this->returnValue('test@#?%test/files/test'));

		$baseFolder = $this->createMock('\OCP\Files\Folder');

		$this->rootFolder->expects($this->once())
			->method('get')
			->with('test@#?%test/files/')
			->will($this->returnValue($baseFolder));

		$node = $this->createMock('\OCP\Files\File');
		$node->expects($this->once())
			->method('getParent')
			->will($this->returnValue($parentNode));
		$node->expects($this->once())
			->method('getName')
			->will($this->returnValue('somefile.txt'));
		$node->expects($this->any())
			->method('getPath')
			->will($this->returnValue('test@#?%test/files/test/somefile.txt'));

		$baseFolder->expects($this->any())
			->method('getById')
			->with(123)
			->will($this->returnValue([$node]));
		$baseFolder->expects($this->any())
			->method('getRelativePath')
			->will($this->returnValueMap([
				['test@#?%test/files/test', '/test'],
				['test@#?%test/files/test/somefile.txt', '/test/somefile.txt'],
			]));

		$this->urlGenerator
			->expects($this->once())
			->method('linkToRoute')
			->with('files.view.index', ['dir' => '/test', 'scrollto' => 'somefile.txt'])
			->will($this->returnValue('/owncloud/index.php/apps/files/?dir=/test&scrollto=somefile.txt'));

		$expected = new Http\RedirectResponse('/owncloud/index.php/apps/files/?dir=/test&scrollto=somefile.txt');
		$expected->addHeader('Webdav-Location', '/owncloud/remote.php/dav/files/test%40%23%3F%25test/test/somefile.txt');
		if ($useShowFile) {
			$this->assertEquals($expected, $this->viewController->showFile(123));
		} else {
			$this->assertEquals($expected, $this->viewController->index('/whatever', '', '123'));
		}
	}

	/**
	 * @dataProvider showFileMethodProvider
	 */
	public function testShowFileRouteWithInvalidFileId($useShowFile) {
		$baseFolder = $this->createMock('\OCP\Files\Folder');
		$this->rootFolder->expects($this->once())
			->method('get')
			->with('test@#?%test/files/')
			->will($this->returnValue($baseFolder));

		$baseFolder->expects($this->at(0))
			->method('getById')
			->with(123)
			->will($this->returnValue([]));

		if ($useShowFile) {
			$this->expectException('OCP\Files\NotFoundException');
			$this->viewController->showFile(123);
		} else {
			$response = $this->viewController->index('MyDir', 'MyView', '123');
			$this->assertInstanceOf('OCP\AppFramework\Http\TemplateResponse', $response);
			$params = $response->getParams();
			$this->assertEquals(1, $params['fileNotFound']);
		}
	}

	/**
	 */
	public function testShowFileRouteWithInvalidFileIdLoggedIn() {
		$baseFolder = $this->createMock('\OCP\Files\Folder');
		$this->rootFolder->expects($this->once())
			->method('get')
			->with('test@#?%test/files/')
			->will($this->returnValue($baseFolder));

		$baseFolder->expects($this->at(0))
			->method('getById')
			->with(123)
			->will($this->returnValue([]));

		$this->userSession->expects($this->any())
			->method('isLoggedIn')
			->will($this->returnValue(true));

		$response = $this->viewController->index('MyDir', 'MyView', '123');
		$this->assertInstanceOf('OCP\AppFramework\Http\TemplateResponse', $response);
		$params = $response->getParams();
		$this->assertEquals(Http::STATUS_NOT_FOUND, $response->getStatus());
	}

	/**
	 * @dataProvider showFileMethodProvider
	 */
	public function testShowFileRouteWithDispatcher($useShowFile) {
		$baseFolder = $this->createMock('\OCP\Files\Folder');
		$this->rootFolder->expects($this->once())
			->method('get')
			->with('test@#?%test/files/')
			->will($this->returnValue($baseFolder));

		$baseFolder->expects($this->at(0))
			->method('getById')
			->with(123)
			->will($this->returnValue([]));

		$this->eventDispatcher->expects($this->once())
			->method('dispatch')
			->with('files.resolvePrivateLink')
			->will($this->returnCallback(function ($eventName, $event) {
				$event->setArgument('resolvedWebLink', '/owncloud/weblink/' . $event->getArgument('uid') . '/' . $event->getArgument('fileid'));
				$event->setArgument('resolvedDavLink', '/owncloud/davlink/' . $event->getArgument('uid') . '/' . $event->getArgument('fileid'));
			}));

		$expected = new Http\RedirectResponse('/owncloud/weblink/test@#?%test/123');
		$expected->addHeader('Webdav-Location', '/owncloud/davlink/test@#?%test/123');
		if ($useShowFile) {
			$this->assertEquals($expected, $this->viewController->showFile(123));
		} else {
			$this->assertEquals($expected, $this->viewController->index('/whatever', '', '123'));
		}
	}
}
