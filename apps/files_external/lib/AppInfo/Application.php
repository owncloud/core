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

		$container->registerService('OCP\Files\Config\IUserMountCache', function (IAppContainer $c) {
			return $c->getServer()->query('UserMountCache');
		});
		$container->registerService('OCP\Files\External\IStoragesBackendService', function (IAppContainer $c) {
			return $c->getServer()->query('StoragesBackendService');
		});
		$container->registerService('OCP\Files\External\Service\IGlobalStoragesService', function (IAppContainer $c) {
			return $c->getServer()->query('OCP\Files\External\Service\IGlobalStoragesService');
		});
		$container->registerService('OCP\Files\External\Service\IUserGlobalStoragesService', function (IAppContainer $c) {
			return $c->getServer()->query('OCP\Files\External\Service\IUserGlobalStoragesService');
		});
		$container->registerService('OCP\Files\External\Service\IUserStoragesService', function (IAppContainer $c) {
			return $c->getServer()->query('OCP\Files\External\Service\IUserStoragesService');
		});

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
			$container->query('OCA\Files_External\Lib\Backend\DAV'),
			$container->query('OCA\Files_External\Lib\Backend\OwnCloud'),
			$container->query('OCA\Files_External\Lib\Backend\SFTP'),
			$container->query('OCA\Files_External\Lib\Backend\AmazonS3'),
			$container->query('OCA\Files_External\Lib\Backend\Google'),
			$container->query('OCA\Files_External\Lib\Backend\Swift'),
			$container->query('OCA\Files_External\Lib\Backend\SFTP_Key'),
			$container->query('OCA\Files_External\Lib\Backend\SMB'),
			$container->query('OCA\Files_External\Lib\Backend\SMB_OC'),
		];

		$backends[] = $container->query('OCA\Files_External\Lib\Backend\Local');

		return $backends;
	}

	/**
	 * @{inheritdoc}
	 */
	public function getAuthMechanisms() {
		$container = $this->getContainer();

		return [
			// AuthMechanism::SCHEME_OAUTH1 mechanisms
			$container->query('OCA\Files_External\Lib\Auth\OAuth1\OAuth1'),

			// AuthMechanism::SCHEME_OAUTH2 mechanisms
			$container->query('OCA\Files_External\Lib\Auth\OAuth2\OAuth2'),

			// AuthMechanism::SCHEME_PUBLICKEY mechanisms
			$container->query('OCA\Files_External\Lib\Auth\PublicKey\RSA'),

			// AuthMechanism::SCHEME_OPENSTACK mechanisms
			$container->query('OCA\Files_External\Lib\Auth\OpenStack\OpenStack'),
			$container->query('OCA\Files_External\Lib\Auth\OpenStack\Rackspace'),

			// Specialized mechanisms
			$container->query('OCA\Files_External\Lib\Auth\AmazonS3\AccessKey'),
		];
	}
}
