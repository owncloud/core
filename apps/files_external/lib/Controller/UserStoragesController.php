<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
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

namespace OCA\Files_External\Controller;

use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\Files\External\Auth\AuthMechanism;
use OCP\Files\External\IStorageConfig;
use OCP\Files\External\NotFoundException;
use OCP\Files\External\Service\IUserStoragesService;
use OCP\IConfig;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IUserSession;

/**
 * User storages controller
 */
class UserStoragesController extends StoragesController {
	/**
	 * @var IUserSession
	 */
	private $userSession;
	private IConfig $config;

	public function __construct(
		$AppName,
		IRequest $request,
		IL10N $l10n,
		IUserStoragesService $userStoragesService,
		IUserSession $userSession,
		IConfig $config,
		ILogger $logger
	) {
		parent::__construct(
			$AppName,
			$request,
			$l10n,
			$userStoragesService,
			$logger
		);
		$this->userSession = $userSession;
		$this->config = $config;
	}

	protected function manipulateStorageConfig(IStorageConfig $storage) {
		$authMechanism = $storage->getAuthMechanism();
		$authMechanism->manipulateStorageConfig($storage, $this->userSession->getUser());
		$backend = $storage->getBackend();
		$backend->manipulateStorageConfig($storage, $this->userSession->getUser());
	}

	/**
	 * Get all storage entries
	 *
	 * @NoAdminRequired
	 *
	 * @return DataResponse
	 */
	public function index() {
		if (!$this->isUserMountingAllowed()) {
			return new DataResponse(
				null,
				Http::STATUS_FORBIDDEN
			);
		}
		return parent::index();
	}

	/**
	 * Return storage
	 *
	 * @NoAdminRequired
	 *
	 * {@inheritdoc}
	 */
	public function show($id, $testOnly = true) {
		return parent::show($id, $testOnly);
	}

	/**
	 * Create an external storage entry.
	 *
	 * @param string $mountPoint storage mount point
	 * @param string $backend backend identifier
	 * @param string $authMechanism authentication mechanism identifier
	 * @param array $backendOptions backend-specific options
	 * @param array $mountOptions backend-specific mount options
	 *
	 * @return DataResponse
	 *
	 * @NoAdminRequired
	 */
	public function create(
		$mountPoint,
		$backend,
		$authMechanism,
		$backendOptions,
		$mountOptions
	) {
		if (!$this->isUserMountingAllowed()) {
			return new DataResponse(
				null,
				Http::STATUS_FORBIDDEN
			);
		}
		$canCreateNewLocalStorage = \OC::$server->getConfig()->getSystemValue('files_external_allow_create_new_local', false);
		if ($backend === 'local' && $canCreateNewLocalStorage === false) {
			return new DataResponse(
				null,
				Http::STATUS_FORBIDDEN
			);
		}

		$newStorage = $this->createStorage(
			$mountPoint,
			$backend,
			$authMechanism,
			$backendOptions,
			$mountOptions
		);
		if ($newStorage instanceof DataResponse) {
			return $newStorage;
		}

		$response = $this->validate($newStorage);
		if (!empty($response)) {
			return $response;
		}

		$newStorage = $this->service->addStorage($newStorage);
		$this->updateStorageStatus($newStorage);

		// replace the password to prevent leaking it
		$this->replacePasswords($newStorage);

		return new DataResponse(
			$newStorage,
			Http::STATUS_CREATED
		);
	}

	/**
	 * Update an external storage entry.
	 *
	 * @param int $id storage id
	 * @param string $mountPoint storage mount point
	 * @param string $backend backend identifier
	 * @param string $authMechanism authentication mechanism identifier
	 * @param array $backendOptions backend-specific options
	 * @param array $mountOptions backend-specific mount options
	 * @param bool $testOnly whether to storage should only test the connection or do more things
	 *
	 * @return DataResponse
	 *
	 * @NoAdminRequired
	 */
	public function update(
		$id,
		$mountPoint,
		$backend,
		$authMechanism,
		$backendOptions,
		$mountOptions,
		$testOnly = true
	) {
		if (!$this->isUserMountingAllowed()) {
			return new DataResponse(
				null,
				Http::STATUS_FORBIDDEN
			);
		}
		$storage = $this->createStorage(
			$mountPoint,
			$backend,
			$authMechanism,
			$backendOptions,
			$mountOptions
		);
		if ($storage instanceof DataResponse) {
			return $storage;
		}
		$storage->setId($id);

		$response = $this->validate($storage);
		if (!empty($response)) {
			return $response;
		}

		try {
			$storage = $this->service->updateStorage($storage);
		} catch (NotFoundException $e) {
			return new DataResponse(
				[
					'message' => (string)$this->l10n->t('Storage with id "%i" not found', [$id])
				],
				Http::STATUS_NOT_FOUND
			);
		}

		$this->updateStorageStatus($storage, $testOnly);

		// replace the password to prevent leaking it
		$this->replacePasswords($storage);

		return new DataResponse(
			$storage,
			Http::STATUS_OK
		);
	}

	/**
	 * Delete storage
	 *
	 * @NoAdminRequired
	 *
	 * {@inheritdoc}
	 */
	public function destroy($id) {
		if (!$this->isUserMountingAllowed()) {
			return new DataResponse(
				null,
				Http::STATUS_FORBIDDEN
			);
		}

		return parent::destroy($id);
	}

	private function isUserMountingAllowed(): bool {
		return $this->config->getAppValue('files_external', 'allow_user_mounting', 'no') === 'yes';
	}
}
