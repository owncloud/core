<?php
/**
 * @author Christian Rost <rost@b1-systems.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Ross Nicoll <jrn@jrn.me.uk>
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

namespace OCA\Files_External\AppInfo;

use OCA\Files_External\Lib\Backend\SMB2;
use OCP\AppFramework\App;
use OCP\AppFramework\IAppContainer;
use OCP\Files\External\Config\IAuthMechanismProvider;
use OCP\Files\External\Config\IBackendProvider;

/**
 * @package OCA\Files_External\AppInfo
 */
class Application extends App implements IBackendProvider, IAuthMechanismProvider {
	public function __construct(array $urlParams = []) {
		parent::__construct('files_external', $urlParams);

		$container = $this->getContainer();

		$container->registerService(\OCP\Files\Config\IUserMountCache::class, fn (IAppContainer $c) => $c->getServer()->query('UserMountCache'));
		$container->registerService(\OCP\Files\External\IStoragesBackendService::class, fn (IAppContainer $c) => $c->getServer()->query('StoragesBackendService'));
		$container->registerService(\OCP\Files\External\Service\IGlobalStoragesService::class, fn (IAppContainer $c) => $c->getServer()->query(\OCP\Files\External\Service\IGlobalStoragesService::class));
		$container->registerService(\OCP\Files\External\Service\IUserGlobalStoragesService::class, fn (IAppContainer $c) => $c->getServer()->query(\OCP\Files\External\Service\IUserGlobalStoragesService::class));
		$container->registerService(\OCP\Files\External\Service\IUserStoragesService::class, fn (IAppContainer $c) => $c->getServer()->query(\OCP\Files\External\Service\IUserStoragesService::class));

		$backendService = $container->getServer()->query('StoragesBackendService');
		$backendService->registerBackendProvider($this);
		$backendService->registerAuthMechanismProvider($this);
	}

	/**
	 * @{inheritdoc}
	 */
	public function getBackends() {
		$container = $this->getContainer();

		$backends = [
			$container->query(\OCA\Files_External\Lib\Backend\DAV::class),
			$container->query(\OCA\Files_External\Lib\Backend\OwnCloud::class),
			$container->query(\OCA\Files_External\Lib\Backend\SFTP::class),
			$container->query(\OCA\Files_External\Lib\Backend\Google::class),
			$container->query(\OCA\Files_External\Lib\Backend\SFTP_Key::class),
			$container->query(\OCA\Files_External\Lib\Backend\SMB::class),
			$container->query(SMB2::class),
			$container->query(\OCA\Files_External\Lib\Backend\SMB_OC::class),
		];

		$backends[] = $container->query(\OCA\Files_External\Lib\Backend\Local::class);

		return $backends;
	}

	/**
	 * @{inheritdoc}
	 */
	public function getAuthMechanisms() {
		$container = $this->getContainer();

		return [
			// AuthMechanism::SCHEME_OAUTH1 mechanisms
			$container->query(\OCA\Files_External\Lib\Auth\OAuth1\OAuth1::class),

			// AuthMechanism::SCHEME_OAUTH2 mechanisms
			$container->query(\OCA\Files_External\Lib\Auth\OAuth2\OAuth2::class),

			// AuthMechanism::SCHEME_PUBLICKEY mechanisms
			$container->query(\OCA\Files_External\Lib\Auth\PublicKey\RSA::class),

			// AuthMechanism::SCHEME_OPENSTACK mechanisms
			$container->query(\OCA\Files_External\Lib\Auth\OpenStack\OpenStack::class),
			$container->query(\OCA\Files_External\Lib\Auth\OpenStack\Rackspace::class),
		];
	}
}
