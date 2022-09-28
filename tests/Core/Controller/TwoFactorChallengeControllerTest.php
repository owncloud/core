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
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;
use OCP\Authentication\TwoFactorAuth\IProvider;
use OCP\IUser;
use OCP\Template;

class TwoFactorChallengeControllerTest extends TestCase {
	/** @var IRequest | MockObject */
	private $request;
	/** @var Manager | MockObject */
	private $twoFactorManager;
	/** @var IUserSession | MockObject */
	private $userSession;
	/** @var ISession | MockObject */
	private $session;
	/** @var IURLGenerator | MockObject */
	private $urlGenerator;

	/** @var TwoFactorChallengeController|MockObject */
	private $controller;

	protected function setUp(): void {
		parent::setUp();

		$this->request = $this->createMock(IRequest::class);
		$this->twoFactorManager = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()
			->getMock();
		$this->userSession = $this->createMock(IUserSession::class);
		$this->session = $this->createMock(ISession::class);
		$this->urlGenerator = $this->createMock(IURLGenerator::class);

		$this->controller = $this->getMockBuilder(TwoFactorChallengeController::class)
			->setConstructorArgs([
				'core',
				$this->request,
				$this->twoFactorManager,
				$this->userSession,
				$this->session,
				$this->urlGenerator,
			])
			->setMethods(['getLogoutAttribute', 'getDefaultPageUrl'])
			->getMock();
		$this->controller->expects($this->any())
			->method('getLogoutAttribute')
			->willReturn('logoutAttribute');
		$this->controller->expects($this->any())
			->method('getDefaultPageUrl')
			->willReturn('getDefaultPageUrl');
	}

	public function testSelectChallenge() {
		$user = $this->createMock(IUser::class);
		$providers = [
			'prov1',
			'prov2',
		];

		$this->userSession->expects($this->once())
			->method('getUser')
			->willReturn($user);
		$this->twoFactorManager->expects($this->once())
			->method('getProviders')
			->with($user)
			->willReturn($providers);

		$expected = new TemplateResponse('core', 'twofactorselectchallenge', [
			'providers' => $providers,
			'redirect_url' => '/some/url',
			'logout_attribute' => 'logoutAttribute',
		], 'guest');

		$this->assertEquals($expected, $this->controller->selectChallenge('/some/url'));
	}

	public function testSelectChallengeSingleEntry() {
		$provider = $this->createMock(IProvider::class);
		$user = $this->createMock(IUser::class);
		$providers = [$provider];

		$this->userSession->expects($this->once())
			->method('getUser')
			->willReturn($user);
		$this->twoFactorManager->expects($this->once())
			->method('getProviders')
			->with($user)
			->willReturn($providers);

		$provider->expects($this->once())
			->method('getId')
			->willReturn('prov1');

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
		$user = $this->createMock(IUser::class);
		$provider = $this->getMockBuilder(IProvider::class)
			->disableOriginalConstructor()
			->getMock();
		$tmpl = $this->getMockBuilder(Template::class)
			->disableOriginalConstructor()
			->getMock();

		$this->userSession->expects($this->once())
			->method('getUser')
			->willReturn($user);
		$this->twoFactorManager->expects($this->once())
			->method('getProvider')
			->with($user, 'myprovider')
			->willReturn($provider);

		$this->session->expects($this->once())
			->method('exists')
			->with('two_factor_auth_error')
			->willReturn(true);
		$this->session->expects($this->exactly(2))
			->method('remove')
			->with($this->logicalOr(
				$this->equalTo('two_factor_auth_error'),
				$this->equalTo('two_factor_auth_error_message')
			));
		$provider->expects($this->once())
			->method('getTemplate')
			->with($user)
			->willReturn($tmpl);
		$tmpl->expects($this->once())
			->method('fetchPage')
			->willReturn('<html/>');

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
		$user = $this->createMock(IUser::class);

		$this->userSession->expects($this->once())
			->method('getUser')
			->willReturn($user);
		$this->twoFactorManager->expects($this->once())
			->method('getProvider')
			->with($user, 'myprovider')
			->willReturn(null);
		$this->urlGenerator->expects($this->once())
			->method('linkToRoute')
			->with('core.TwoFactorChallenge.selectChallenge')
			->willReturn('select/challenge/url');

		$expected = new RedirectResponse('select/challenge/url');

		$this->assertEquals($expected, $this->controller->showChallenge('myprovider', 'redirect/url'));
	}

	public function testSolveChallenge() {
		$user = $this->createMock(IUser::class);
		$provider = $this->getMockBuilder(IProvider::class)
			->disableOriginalConstructor()
			->getMock();

		$this->userSession->expects($this->once())
			->method('getUser')
			->willReturn($user);
		$this->twoFactorManager->expects($this->once())
			->method('getProvider')
			->with($user, 'myprovider')
			->willReturn($provider);

		$this->twoFactorManager->expects($this->once())
			->method('verifyChallenge')
			->with('myprovider', $user, 'token')
			->willReturn(true);

		$expected = new RedirectResponse('getDefaultPageUrl');
		$this->assertEquals($expected, $this->controller->solveChallenge('myprovider', 'token'));
	}

	public function testSolveChallengeInvalidProvider() {
		$user = $this->createMock(IUser::class);

		$this->userSession->expects($this->once())
			->method('getUser')
			->willReturn($user);
		$this->twoFactorManager->expects($this->once())
			->method('getProvider')
			->with($user, 'myprovider')
			->willReturn(null);
		$this->urlGenerator->expects($this->once())
			->method('linkToRoute')
			->with('core.TwoFactorChallenge.selectChallenge')
			->willReturn('select/challenge/url');

		$expected = new RedirectResponse('select/challenge/url');

		$this->assertEquals($expected, $this->controller->solveChallenge('myprovider', 'token'));
	}

	public function testSolveInvalidChallenge() {
		$user = $this->createMock(IUser::class);
		$provider = $this->getMockBuilder(IProvider::class)
			->disableOriginalConstructor()
			->getMock();

		$this->userSession->expects($this->once())
			->method('getUser')
			->willReturn($user);
		$this->twoFactorManager->expects($this->once())
			->method('getProvider')
			->with($user, 'myprovider')
			->willReturn($provider);

		$this->twoFactorManager->expects($this->once())
			->method('verifyChallenge')
			->with('myprovider', $user, 'token')
			->willReturn(false);
		$this->session->expects($this->once())
			->method('set')
			->with('two_factor_auth_error', true);
		$this->urlGenerator->expects($this->once())
			->method('linkToRoute')
			->with('core.TwoFactorChallenge.showChallenge', [
				'challengeProviderId' => 'myprovider',
				'redirect_url' => '/url',
			])
			->willReturn('files/index/url');
		$provider->expects($this->once())
			->method('getId')
			->willReturn('myprovider');

		$expected = new RedirectResponse('files/index/url');
		$this->assertEquals($expected, $this->controller->solveChallenge('myprovider', 'token', '/url'));
	}
}
