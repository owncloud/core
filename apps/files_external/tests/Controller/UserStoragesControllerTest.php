<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
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
namespace OCA\Files_External\Tests\Controller;

use OC\Files\External\StorageConfig;
use OCA\Files_External\Controller\UserStoragesController;
use OCP\AppFramework\Http;
use OCP\Files\External\IStoragesBackendService;

class UserStoragesControllerTest extends StoragesControllerTest {

	/**
	 * @var array
	 */
	private $oldAllowedBackends;

	public function setUp(): void {
		parent::setUp();
		$this->service = $this->createMock('\OCP\Files\External\Service\IUserStoragesService');

		$this->service->method('getVisibilityType')
			->willReturn(IStoragesBackendService::VISIBILITY_PERSONAL);

		$this->controller = new UserStoragesController(
			'files_external',
			$this->createMock('\OCP\IRequest'),
			$this->createMock('\OCP\IL10N'),
			$this->service,
			$this->createMock('\OCP\IUserSession'),
			$this->createMock('\OCP\ILogger')
		);
	}

	public function testAddOrUpdateStorageDisallowedBackend() {
		$backend = $this->getBackendMock();
		$backend->method('isVisibleFor')
			->with(IStoragesBackendService::VISIBILITY_PERSONAL)
			->willReturn(false);
		$authMech = $this->getAuthMechMock();

		$storageConfig = new StorageConfig(1);
		$storageConfig->setMountPoint('mount');
		$storageConfig->setBackend($backend);
		$storageConfig->setAuthMechanism($authMech);
		$storageConfig->setBackendOptions([]);

		$this->service->expects($this->exactly(2))
			->method('createStorage')
			->will($this->returnValue($storageConfig));
		$this->service->expects($this->never())
			->method('addStorage');
		$this->service->expects($this->never())
			->method('updateStorage');

		$response = $this->controller->create(
			'mount',
			'\OCA\Files_External\Lib\Storage\SMB',
			'\Auth\Mechanism',
			[],
			[],
			[],
			[],
			null
		);

		$this->assertEquals(Http::STATUS_UNPROCESSABLE_ENTITY, $response->getStatus());

		$response = $this->controller->update(
			1,
			'mount',
			'\OCA\Files_External\Lib\Storage\SMB',
			'\Auth\Mechanism',
			[],
			[],
			[],
			[],
			null
		);

		$this->assertEquals(Http::STATUS_UNPROCESSABLE_ENTITY, $response->getStatus());
	}
}
