<?php

/**
 * @author Christoph Wurst <christoph@owncloud.com>
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

namespace Test\Core\Controller;

use OC\Authentication\TwoFactorAuth\Manager;
use OC\Core\Controller\TwoFactorChallengeController;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IRequest;
use OCP\ISession;
use OCP\IURLGenerator;
use OCP\IUserSession;
use Test\TestCase;

class TwoFactorChallengeControllerTest extends TestCase {

	/** @var IRequest | \PHPUnit\Framework\MockObject\MockObject */
	private $request;
	/** @var Manager | \PHPUnit\Framework\MockObject\MockObject */
	private $twoFactorManager;
	/** @var IUserSession | \PHPUnit\Framework\MockObject\MockObject */
	private $userSession;
	/** @var ISession | \PHPUnit\Framework\MockObject\MockObject */
	private $session;
	/** @var IURLGenerator | \PHPUnit\Framework\MockObject\MockObject */
	private $urlGenerator;

	/** @var TwoFactorChallengeController|\PHPUnit\Framework\MockObject\MockObject */
	private $controller;

	protected function setUp(): void {
		parent::setUp();

		$this->request = $this->createMock('\OCP\IRequest');
		$this->twoFactorManager = $this->getMockBuilder('\OC\Authentication\TwoFactorAuth\Manager')
			->disableOriginalConstructor()
			->getMock();
		$this->userSession = $this->createMock('\OCP\IUserSession');
		$this->session = $this->createMock('\OCP\ISession');
		$this->urlGenerator = $this->createMock('\OCP\IURLGenerator');

		$this->controller = $this->getMockBuilder('OC\Core\Controller\TwoFactorChallengeController')
			->setConstructorArgs([
				'core',
				$this->request,
				$this->twoFactorManager,
				$this->userSession,
				$this->session,
				$this->urlGenerator,
			])
			->setMethods(['getLogoutAttribute'])
			->getMock();
		$this->controller->expects($this->any())
			->method('getLogoutAttribute')
			->willReturn('logoutAttribute');
	}

	public function testSelectChallenge() {
		$user = $this->createMock('\OCP\IUser');
		$providers = [
			'prov1',
			'prov2',
		];

		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));
		$this->twoFactorManager->expects($this->once())
			->method('getProviders')
			->with($user)
			->will($this->returnValue($providers));

		$expected = new TemplateResponse('core', 'twofactorselectchallenge', [
			'providers' => $providers,
			'redirect_url' => '/some/url',
			'logout_attribute' => 'logoutAttribute',
		], 'guest');

		$this->assertEquals($expected, $this->controller->selectChallenge('/some/url'));
	}

	public function testSelectChallengeSingleEntry() {
		$provider = $this->createMock('\OCP\Authentication\TwoFactorAuth\IProvider');
		$user = $this->createMock('\OCP\IUser');
		$providers = [$provider];

		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));
		$this->twoFactorManager->expects($this->once())
			->method('getProviders')
			->with($user)
			->will($this->returnValue($providers));

		$provider->expects($this->once())
			->method('getId')
			->will($this->returnValue('prov1'));

		$url = $this->urlGenerator->linkToRoute(
			'core.TwoFactorChallenge.showChallenge',
			[
				'challengeProviderId' => 'prov1',
				'redirect_url' => '/some/url',
			]
		);
		$expected = new RedirectResponse($url);

		$response = $this->controller->selectChallenge('/some/url');
		$this->assertEquals($expected, $response);
		$this->assertEquals($url, $response->getRedirectURL());
	}

	public function testShowChallenge() {
		$user = $this->createMock('\OCP\IUser');
		$provider = $this->getMockBuilder('\OCP\Authentication\TwoFactorAuth\IProvider')
			->disableOriginalConstructor()
			->getMock();
		$tmpl = $this->getMockBuilder('\OCP\Template')
			->disableOriginalConstructor()
			->getMock();

		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));
		$this->twoFactorManager->expects($this->once())
			->method('getProvider')
			->with($user, 'myprovider')
			->will($this->returnValue($provider));

		$this->session->expects($this->once())
			->method('exists')
			->with('two_factor_auth_error')
			->will($this->returnValue(true));
		$this->session->expects($this->exactly(2))
			->method('remove')
			->with($this->logicalOr(
				$this->equalTo('two_factor_auth_error'),
				$this->equalTo('two_factor_auth_error_message')));
		$provider->expects($this->once())
			->method('getTemplate')
			->with($user)
			->will($this->returnValue($tmpl));
		$tmpl->expects($this->once())
			->method('fetchPage')
			->will($this->returnValue('<html/>'));

		$expected = new TemplateResponse('core', 'twofactorshowchallenge', [
			'error' => true,
			'provider' => $provider,
			'logout_attribute' => 'logoutAttribute',
			'template' => '<html/>',
			'error_message' => null,
			], 'guest');

		$this->assertEquals($expected, $this->controller->showChallenge('myprovider', '/re/dir/ect/url'));
	}

	public function testShowInvalidChallenge() {
		$user = $this->createMock('\OCP\IUser');

		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));
		$this->twoFactorManager->expects($this->once())
			->method('getProvider')
			->with($user, 'myprovider')
			->will($this->returnValue(null));
		$this->urlGenerator->expects($this->once())
			->method('linkToRoute')
			->with('core.TwoFactorChallenge.selectChallenge')
			->will($this->returnValue('select/challenge/url'));

		$expected = new RedirectResponse('select/challenge/url');

		$this->assertEquals($expected, $this->controller->showChallenge('myprovider', 'redirect/url'));
	}

	public function testSolveChallenge() {
		$user = $this->createMock('\OCP\IUser');
		$provider = $this->getMockBuilder('\OCP\Authentication\TwoFactorAuth\IProvider')
			->disableOriginalConstructor()
			->getMock();

		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));
		$this->twoFactorManager->expects($this->once())
			->method('getProvider')
			->with($user, 'myprovider')
			->will($this->returnValue($provider));

		$this->twoFactorManager->expects($this->once())
			->method('verifyChallenge')
			->with('myprovider', $user, 'token')
			->will($this->returnValue(true));
		$this->urlGenerator->expects($this->once())
			->method('linkToRoute')
			->with('files.view.index')
			->will($this->returnValue('files/index/url'));

		$expected = new RedirectResponse('files/index/url');
		$this->assertEquals($expected, $this->controller->solveChallenge('myprovider', 'token'));
	}

	public function testSolveChallengeInvalidProvider() {
		$user = $this->createMock('\OCP\IUser');

		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));
		$this->twoFactorManager->expects($this->once())
			->method('getProvider')
			->with($user, 'myprovider')
			->will($this->returnValue(null));
		$this->urlGenerator->expects($this->once())
			->method('linkToRoute')
			->with('core.TwoFactorChallenge.selectChallenge')
			->will($this->returnValue('select/challenge/url'));

		$expected = new RedirectResponse('select/challenge/url');

		$this->assertEquals($expected, $this->controller->solveChallenge('myprovider', 'token'));
	}

	public function testSolveInvalidChallenge() {
		$user = $this->createMock('\OCP\IUser');
		$provider = $this->getMockBuilder('\OCP\Authentication\TwoFactorAuth\IProvider')
			->disableOriginalConstructor()
			->getMock();

		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));
		$this->twoFactorManager->expects($this->once())
			->method('getProvider')
			->with($user, 'myprovider')
			->will($this->returnValue($provider));

		$this->twoFactorManager->expects($this->once())
			->method('verifyChallenge')
			->with('myprovider', $user, 'token')
			->will($this->returnValue(false));
		$this->session->expects($this->once())
			->method('set')
			->with('two_factor_auth_error', true);
		$this->urlGenerator->expects($this->once())
			->method('linkToRoute')
			->with('core.TwoFactorChallenge.showChallenge', [
				'challengeProviderId' => 'myprovider',
				'redirect_url' => '/url',
			])
			->will($this->returnValue('files/index/url'));
		$provider->expects($this->once())
			->method('getId')
			->will($this->returnValue('myprovider'));

		$expected = new RedirectResponse('files/index/url');
		$this->assertEquals($expected, $this->controller->solveChallenge('myprovider', 'token', '/url'));
	}
}
