<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
 * @license GPL-2.0
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace OCA\OpenIdConnect;

require_once __DIR__ . '/../vendor/autoload.php';

use Jumbojett\OpenIDConnectClientException;
use OC;
use OC\HintException;
use OCP\AppFramework\App;

class Application extends App {
	public const APPID = 'openidconnect';

	/** @var Logger */
	private $logger;

	/**
	 * Application constructor.
	 *
	 * @param array $urlParams
	 * @codeCoverageIgnore
	 */
	public function __construct(array $urlParams = []) {
		parent::__construct(Application::APPID, $urlParams);
	}

	/**
	 * @throws OpenIDConnectClientException
	 * @throws HintException
	 * @codeCoverageIgnore
	 */
	public function boot(): void {
		$server = $this->getContainer()->getServer();
		$memCacheFactory = $server->getMemCacheFactory();
		if (!OC::$CLI && !$memCacheFactory->isAvailable()) {
			throw new HintException('A real distributed mem cache setup is required');
		}
		$this->logger = new Logger($server->getLogger());

		/** @var Client $client */
		$client = $server->query(Client::class);

		$openIdConfig = $client->getOpenIdConfig();
		if ($openIdConfig === null) {
			return;
		}
		$session = $server->getSession();
		$userSession = $server->getUserSession();
		$urlGenerator = $server->getURLGenerator();
		$request = $server->getRequest();
		$loginPage = new LoginPageBehaviour($this->logger, $userSession, $urlGenerator, $request);
		$loginPage->handleLoginPageBehaviour($openIdConfig);

		// Add event listener
		$dispatcher = $server->getEventDispatcher();
		$eventHandler = new EventHandler($dispatcher, $request, $userSession, $session);
		$eventHandler->registerEventHandler();

		// verify the session
		$sessionVerifier = new SessionVerifier($this->logger, $session, $userSession, $memCacheFactory, $dispatcher, $client);
		$sessionVerifier->verifySession();
	}
}
