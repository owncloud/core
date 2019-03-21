<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Cloutier <vincent1cloutier@gmail.com>
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

namespace OCA\Files_Sharing\Tests\Controllers;

use OC\Files\Filesystem;
use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\Files_Sharing\Controllers\ShareController;
use OCP\AppFramework\Http\NotFoundResponse;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\ISession;
use OCP\IURLGenerator;
use OCP\IUserManager;
use OCP\Security\ISecureRandom;
use OCP\Share\Exceptions\ShareNotFound;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * @group DB
 *
 * @package OCA\Files_Sharing\Controllers
 */
class ShareControllerTest extends \Test\TestCase {

	/** @var string */
	private $user;
	/** @var string */
	private $oldUser;

	/** @var string */
	private $appName = 'files_sharing';
	/** @var ShareController */
	private $shareController;
	/** @var IURLGenerator | \PHPUnit\Framework\MockObject\MockObject */
	private $urlGenerator;
	/** @var ISession | \PHPUnit\Framework\MockObject\MockObject */
	private $session;
	/** @var \OCP\IPreview | \PHPUnit\Framework\MockObject\MockObject */
	private $previewManager;
	/** @var \OCP\IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;
	/** @var  \OC\Share20\Manager | \PHPUnit\Framework\MockObject\MockObject */
	private $shareManager;
	/** @var IUserManager | \PHPUnit\Framework\MockObject\MockObject */
	private $userManager;
	/** @var EventDispatcher | \PHPUnit\Framework\MockObject\MockObject */
	private $eventDispatcher;

	protected function setUp() {
		parent::setUp();
		$this->appName = 'files_sharing';

		$this->shareManager = $this->getMockBuilder('\OC\Share20\Manager')->disableOriginalConstructor()->getMock();
		$this->urlGenerator = $this->createMock('\OCP\IURLGenerator');
		$this->session = $this->createMock('\OCP\ISession');
		$this->previewManager = $this->createMock('\OCP\IPreview');
		$this->config = $this->createMock('\OCP\IConfig');
		$this->userManager = $this->createMock('\OCP\IUserManager');
		$this->eventDispatcher = new EventDispatcher();

		$this->shareController = new \OCA\Files_Sharing\Controllers\ShareController(
			$this->appName,
			$this->createMock('\OCP\IRequest'),
			$this->config,
			$this->urlGenerator,
			$this->userManager,
			$this->createMock('\OCP\ILogger'),
			$this->createMock('\OCP\Activity\IManager'),
			$this->shareManager,
			$this->session,
			$this->previewManager,
			$this->createMock('\OCP\Files\IRootFolder'),
			$this->eventDispatcher
		);

		// Store current user
		$this->oldUser = \OC_User::getUser();

		// Create a dummy user
		$this->user = \OC::$server->getSecureRandom()->generate(12, ISecureRandom::CHAR_LOWER);

		\OC::$server->getUserManager()->createUser($this->user, $this->user);
		\OC_Util::tearDownFS();
		$this->loginAsUser($this->user);
	}

	protected function tearDown() {
		\OC_Util::tearDownFS();
		\OC_User::setUserId('');
		Filesystem::tearDown();
		$user = \OC::$server->getUserManager()->get($this->user);
		if ($user !== null) {
			$user->delete();
		}
		\OC_User::setIncognitoMode(false);

		\OC::$server->getSession()->set('public_link_authenticated', '');

		// Set old user
		\OC_User::setUserId($this->oldUser);
		\OC_Util::setupFS($this->oldUser);
		parent::tearDown();
	}

	public function testShowAuthenticateNotAuthenticated() {
		$share = \OC::$server->getShareManager()->newShare();

		$this->shareManager
			->expects($this->once())
			->method('getShareByToken')
			->with('token')
			->willReturn($share);

		$response = $this->shareController->showAuthenticate('token');
		$expectedResponse =  new TemplateResponse($this->appName, 'authenticate', [], 'guest');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testShowAuthenticateAuthenticatedForDifferentShare() {
		$share = \OC::$server->getShareManager()->newShare();
		$share->setId(1);

		$this->shareManager
			->expects($this->once())
			->method('getShareByToken')
			->with('token')
			->willReturn($share);

		$this->session->method('exists')->with('public_link_authenticated')->willReturn(true);
		$this->session->method('get')->with('public_link_authenticated')->willReturn('2');

		$response = $this->shareController->showAuthenticate('token');
		$expectedResponse =  new TemplateResponse($this->appName, 'authenticate', [], 'guest');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testShowAuthenticateCorrectShare() {
		$share = \OC::$server->getShareManager()->newShare();
		$share->setId(1);

		$this->shareManager
			->expects($this->once())
			->method('getShareByToken')
			->with('token')
			->willReturn($share);

		$this->session->method('exists')->with('public_link_authenticated')->willReturn(true);
		$this->session->method('get')->with('public_link_authenticated')->willReturn('1');

		$this->urlGenerator->expects($this->once())
			->method('linkToRoute')
			->with('files_sharing.sharecontroller.showShare', ['token' => 'token'])
			->willReturn('redirect');

		$response = $this->shareController->showAuthenticate('token');
		$expectedResponse =  new RedirectResponse('redirect');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testAuthenticateInvalidToken() {
		$this->shareManager
			->expects($this->once())
			->method('getShareByToken')
			->with('token')
			->will($this->throwException(new \OCP\Share\Exceptions\ShareNotFound()));

		$response = $this->shareController->authenticate('token');
		$expectedResponse =  new NotFoundResponse();
		$this->assertEquals($expectedResponse, $response);
	}

	public function testAuthenticateValidPassword() {
		$share = \OC::$server->getShareManager()->newShare();
		$share->setId(42);

		$this->shareManager
			->expects($this->once())
			->method('getShareByToken')
			->with('token')
			->willReturn($share);

		$this->shareManager
			->expects($this->once())
			->method('checkPassword')
			->with($share, 'validpassword')
			->willReturn(true);

		$this->session
			->expects($this->once())
			->method('set')
			->with('public_link_authenticated', '42');

		$this->urlGenerator->expects($this->once())
			->method('linkToRoute')
			->with('files_sharing.sharecontroller.showShare', ['token'=>'token'])
			->willReturn('redirect');

		$beforeLinkAuthCalled = false;
		$this->eventDispatcher->addListener(
			'share.beforelinkauth', function () use (&$beforeLinkAuthCalled) {
				$beforeLinkAuthCalled = true;
			}
		);
		$afterLinkAuthCalled = false;
		$this->eventDispatcher->addListener(
			'share.afterlinkauth', function () use (&$afterLinkAuthCalled) {
				$afterLinkAuthCalled = true;
			}
		);

		$response = $this->shareController->authenticate('token', 'validpassword');
		$expectedResponse =  new RedirectResponse('redirect');
		$this->assertEquals($expectedResponse, $response);
		$this->assertEquals(true, $beforeLinkAuthCalled);
		$this->assertEquals(true, $afterLinkAuthCalled);
	}

	public function testAuthenticateInvalidPassword() {
		$share = \OC::$server->getShareManager()->newShare();
		$share->setNodeId(100)
			->setNodeType('file')
			->setToken('token')
			->setSharedBy('initiator')
			->setId(42);

		$this->shareManager
			->expects($this->once())
			->method('getShareByToken')
			->with('token')
			->willReturn($share);

		$this->shareManager
			->expects($this->once())
			->method('checkPassword')
			->with($share, 'invalidpassword')
			->willReturn(false);

		$this->session
			->expects($this->never())
			->method('set');

		$hookListner = $this->getMockBuilder('Dummy')->setMethods(['access'])->getMock();
		\OCP\Util::connectHook('OCP\Share', 'share_link_access', $hookListner, 'access');

		$calledShareLinkAccess = [];
		$this->eventDispatcher->addListener('share.linkaccess',
			function (GenericEvent $event) use (&$calledShareLinkAccess) {
				$calledShareLinkAccess[] = 'share.linkaccess';
				$calledShareLinkAccess[] = $event;
			});

		$beforeLinkAuthCalled = false;
		$this->eventDispatcher->addListener(
			'share.beforelinkauth', function () use (&$beforeLinkAuthCalled) {
				$beforeLinkAuthCalled = true;
			}
		);
		$afterLinkAuthCalled = false;
		$this->eventDispatcher->addListener(
			'share.afterlinkauth', function () use (&$afterLinkAuthCalled) {
				$afterLinkAuthCalled = true;
			}
		);

		$hookListner->expects($this->once())
			->method('access')
			->with($this->callback(function (array $data) {
				return $data['itemType'] === 'file' &&
					$data['itemSource'] === 100 &&
					$data['uidOwner'] === 'initiator' &&
					$data['token'] === 'token' &&
					$data['errorCode'] === 403 &&
					$data['errorMessage'] === 'Wrong password';
			}));

		$response = $this->shareController->authenticate('token', 'invalidpassword');
		$expectedResponse =  new TemplateResponse($this->appName, 'authenticate', ['wrongpw' => true], 'guest');
		$this->assertEquals($expectedResponse, $response);

		$this->assertEquals('share.linkaccess', $calledShareLinkAccess[0]);
		$this->assertInstanceOf(GenericEvent::class, $calledShareLinkAccess[1]);
		$this->assertArrayHasKey('shareObject', $calledShareLinkAccess[1]);
		$this->assertEquals('42', $calledShareLinkAccess[1]->getArgument('shareObject')->getId());
		$this->assertEquals('file', $calledShareLinkAccess[1]->getArgument('shareObject')->getNodeType());
		$this->assertEquals('initiator', $calledShareLinkAccess[1]->getArgument('shareObject')->getSharedBy());
		$this->assertEquals('token', $calledShareLinkAccess[1]->getArgument('shareObject')->getToken());
		$this->assertEquals(403, $calledShareLinkAccess[1]->getArgument('errorCode'));
		$this->assertEquals('Wrong password', $calledShareLinkAccess[1]->getArgument('errorMessage'));
		$this->assertEquals(true, $beforeLinkAuthCalled);
		$this->assertEquals(false, $afterLinkAuthCalled);
	}

	public function testShowShareInvalidToken() {
		$this->shareManager
			->expects($this->once())
			->method('getShareByToken')
			->with('invalidtoken')
			->will($this->throwException(new ShareNotFound()));

		// Test without a not existing token
		$response = $this->shareController->showShare('invalidtoken');
		$expectedResponse =  new NotFoundResponse();
		$this->assertEquals($expectedResponse, $response);
	}

	public function testShowShareNotAuthenticated() {
		$share = \OC::$server->getShareManager()->newShare();
		$share->setPassword('password');

		$this->shareManager
			->expects($this->once())
			->method('getShareByToken')
			->with('validtoken')
			->willReturn($share);

		$this->urlGenerator->expects($this->once())
			->method('linkToRoute')
			->with('files_sharing.sharecontroller.authenticate', ['token' => 'validtoken'])
			->willReturn('redirect');

		// Test without a not existing token
		$response = $this->shareController->showShare('validtoken');
		$expectedResponse = new RedirectResponse('redirect');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testShowShare() {
		$owner = $this->createMock('OCP\IUser');
		$owner->method('getDisplayName')->willReturn('ownerDisplay');
		$owner->method('getUID')->willReturn('ownerUID');

		$file = $this->createMock('OCP\Files\File');
		$file->method('getName')->willReturn('file1.txt');
		$file->method('getMimetype')->willReturn('text/plain');
		$file->method('getSize')->willReturn(33);
		$file->method('isReadable')->willReturn(true);
		$file->method('isShareable')->willReturn(true);

		$share = \OC::$server->getShareManager()->newShare();
		$share->setId(42);
		$share->setPassword('password')
			->setShareOwner('ownerUID')
			->setNode($file)
			->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setTarget('/file1.txt');

		$this->session->method('exists')->with('public_link_authenticated')->willReturn(true);
		$this->session->method('get')->with('public_link_authenticated')->willReturn('42');

		$this->previewManager->method('isMimeSupported')->with('text/plain')->willReturn(true);

		$this->config->method('getSystemValue')
			->willReturnMap(
				[
					['max_filesize_animated_gifs_public_sharing', 10, 10],
					['enable_previews', true, true],
					['preview_max_x', 1024, 1024],
					['preview_max_y', 1024, 1024],
				]
			);
		$shareTmpl['maxSizeAnimateGif'] = $this->config->getSystemValue('max_filesize_animated_gifs_public_sharing', 10);
		$shareTmpl['previewEnabled'] = $this->config->getSystemValue('enable_previews', true);

		$this->shareManager
			->expects($this->once())
			->method('getShareByToken')
			->with('token')
			->willReturn($share);

		$this->userManager->method('get')->with('ownerUID')->willReturn($owner);

		$loadAdditionalScriptsCalled = false;
		$this->eventDispatcher->addListener('OCA\Files_Sharing::loadAdditionalScripts', function () use (&$loadAdditionalScriptsCalled) {
			$loadAdditionalScriptsCalled = true;
		});

		$response = $this->shareController->showShare('token');
		$sharedTmplParams = [
			'displayName' => 'ownerDisplay',
			'owner' => 'ownerUID',
			'filename' => 'file1.txt',
			'directory_path' => '/file1.txt',
			'mimetype' => 'text/plain',
			'dirToken' => 'token',
			'sharingToken' => 'token',
			'protected' => 'true',
			'dir' => '',
			'downloadURL' => null,
			'fileSize' => '33 B',
			'nonHumanFileSize' => 33,
			'maxSizeAnimateGif' => 10,
			'previewSupported' => true,
			'previewEnabled' => true,
			'previewMaxX' => 1024,
			'previewMaxY' => 1024,
			'shareUrl' => null,
			'previewImage' => null,
			'canDownload' => true,
		];

		$csp = new \OCP\AppFramework\Http\ContentSecurityPolicy();
		$csp->addAllowedFrameDomain('\'self\'');
		$expectedResponse = new TemplateResponse($this->appName, 'public', $sharedTmplParams, 'base');
		$expectedResponse->setContentSecurityPolicy($csp);

		$this->assertEquals($expectedResponse, $response);

		$this->assertTrue($loadAdditionalScriptsCalled, 'Hook for loading additional scripts was called');
	}

	/**
	 * @expectedException \OCP\Files\NotFoundException
	 */
	public function testShowShareInvalid() {
		$owner = $this->createMock('OCP\IUser');
		$owner->method('getDisplayName')->willReturn('ownerDisplay');
		$owner->method('getUID')->willReturn('ownerUID');

		$file = $this->createMock('OCP\Files\File');
		$file->method('getName')->willReturn('file1.txt');
		$file->method('getMimetype')->willReturn('text/plain');
		$file->method('getSize')->willReturn(33);
		$file->method('isShareable')->willReturn(false);
		$file->method('isReadable')->willReturn(true);

		$share = \OC::$server->getShareManager()->newShare();
		$share->setId(42);
		$share->setPassword('password')
			->setShareOwner('ownerUID')
			->setNode($file)
			->setTarget('/file1.txt');

		$this->session->method('exists')->with('public_link_authenticated')->willReturn(true);
		$this->session->method('get')->with('public_link_authenticated')->willReturn('42');

		$this->previewManager->method('isMimeSupported')->with('text/plain')->willReturn(true);

		$this->config->method('getSystemValue')
			->willReturnMap(
				[
					['max_filesize_animated_gifs_public_sharing', 10, 10],
					['enable_previews', true, true],
				]
			);
		$shareTmpl['maxSizeAnimateGif'] = $this->config->getSystemValue('max_filesize_animated_gifs_public_sharing', 10);
		$shareTmpl['previewEnabled'] = $this->config->getSystemValue('enable_previews', true);

		$this->shareManager
			->expects($this->once())
			->method('getShareByToken')
			->with('token')
			->willReturn($share);

		$this->userManager->method('get')->with('ownerUID')->willReturn($owner);

		$this->shareController->showShare('token');
	}

	public function testDownloadShare() {
		$share = $this->createMock('\OCP\Share\IShare');
		$share->method('getPassword')->willReturn('password');

		$this->shareManager
			->expects($this->once())
			->method('getShareByToken')
			->with('validtoken')
			->willReturn($share);

		$this->urlGenerator->expects($this->once())
			->method('linkToRoute')
			->with('files_sharing.sharecontroller.authenticate', ['token' => 'validtoken'])
			->willReturn('redirect');

		// Test with a password protected share and no authentication
		$response = $this->shareController->downloadShare('validtoken');
		$expectedResponse = new RedirectResponse('redirect');
		$this->assertEquals($expectedResponse, $response);
	}

	/**
	 * @expectedException \OCP\Files\NotFoundException
	 */
	public function testDownloadShareNoReadPermission() {
		$share = $this->createMock('\OCP\Share\IShare');
		$share->method('getPermissions')->willReturn(\OCP\Constants::PERMISSION_CREATE);

		$this->shareManager
			->expects($this->once())
			->method('getShareByToken')
			->with('validtoken')
			->willReturn($share);

		$this->shareController->downloadShare('validtoken');
	}
}
