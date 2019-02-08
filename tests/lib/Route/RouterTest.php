<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@owncloud.com>
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

namespace Test\Route;

use OC\Route\Router;
use OCP\ILogger;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class LoadableRouter extends Router {
	/**
	 * @param bool $loaded
	 */
	public function setLoaded($loaded) {
		$this->loaded = $loaded;
	}
}

class RouterTest extends \Test\TestCase {

	/** @var ILogger */
	private $l;

	protected function setUp() {
		parent::setUp();
		$this->l = $this->createMock(ILogger::class);
	}

	/**
	 * @dataProvider providesWebRoot
	 * @param $expectedBase
	 * @param $webRoot
	 */
	public function testWebRootSetup($expectedBase, $webRoot) {
		$router = new Router($this->l, $webRoot);

		$this->assertEquals($expectedBase, $router->getGenerator()->getContext()->getBaseUrl());
	}

	public function providesWebRoot() {
		return [
			['/index.php', ''],
			['/index.php', '/'],
			['/oc/index.php', '/oc'],
			['/oc/index.php', '/oc/'],
		];
	}

	/**
	 * @dataProvider urlParamSlashProvider
	 */
	public function testMatchURLParamContainingSlash($routeUrl, $slashesAllowed, $matchUrl, $expectedCalled) {
		$router = new LoadableRouter($this->l, '');

		$called = false;

		$router->useCollection('root');
		$route = $router->create('test', $routeUrl)
			->action(function () use (&$called) {
				$called = true;
			});
		if ($slashesAllowed) {
			$route->requirements(['id' => '.+']);
		}

		// don't load any apps
		$router->setLoaded(true);

		try {
			$router->match($matchUrl);
		} catch (ResourceNotFoundException $e) {
			$called = false;
		}

		self::assertEquals($expectedCalled, $called);
	}

	public function urlParamSlashProvider() {
		return [
			// slashed disallowed
			['/resource/{id}', false, '/resource/id%2Fwith%2Fslashes', false],
			['/resource/{id}/sub', false, '/resource/id%2Fwith%2Fslashes/sub', false],
			['/resource/{id}/sub', false, '/resource/id%2Fwith%2Fslashes/subx', false],
			['/resource/{id}', false, '/resource/id/with/slashes', false],
			['/resource/{id}/sub', false, '/resource/id/with/slashes/sub', false],

			// slashed allowed
			['/resource/{id}', true, '/resource/id%2Fwith%2Fslashes', true],
			['/resource/{id}/sub', true, '/resource/id%2Fwith%2Fslashes/sub', true],
			['/resource/{id}/sub', true, '/resource/id%2Fwith%2Fslashes/subx', false],
			['/resource/{id}', true, '/resource/id/with/slashes', true],
			['/resource/{id}/sub', true, '/resource/id/with/slashes/sub', true],
		];
	}
}
