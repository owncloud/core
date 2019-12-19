<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

declare(strict_types = 1);

namespace OC\Core\Controller;

use ArrayIterator;
use OC\AppFramework\Http;
use OC\OCS\Result;
use OC\User\SyncService;
use OCP\AppFramework\OCSController;
use OCP\IRequest;
use OCP\IUserManager;

/**
 * Class UserSyncController
 *
 * External systems for user provisioning can use this API to trigger a single-user
 * sync to update user settings from an external user management (e.g. LDAP) or even
 * to create the account in ownCloud if necessary.
 *
 * In contrary to the occ user:sync command this API will not disable or delete the
 * user if the user no longer exists. The external user provisioning system can use
 * existing APIs to disable or delete a user.
 *
 * @package OC\Core\Controller
 */
class UserSyncController extends OCSController {

	/**
	 * @var SyncService
	 */
	private $syncService;
	/**
	 * @var IUserManager
	 */
	private $userManager;

	/**
	 * UserSyncController constructor.
	 *
	 * @param string $appName
	 * @param IRequest $request
	 * @param SyncService $syncService
	 * @param IUserManager $userManager
	 */
	public function __construct($appName,
								IRequest $request,
								SyncService $syncService,
								IUserManager $userManager) {
		parent::__construct($appName, $request);
		$this->syncService = $syncService;
		$this->userManager = $userManager;
	}

	/**
	 * @NoCSRFRequired
	 *
	 * @param string $userId
	 * @return Result
	 */
	public function syncUser($userId): Result {
		foreach ($this->userManager->getBackends() as $backend) {
			$users = $backend->getUsers($userId, 2);
			$numberOfUsers = \count($users);
			if ($numberOfUsers > 1) {
				$backendName = \get_class($backend);
				return new Result([], Http::STATUS_CONFLICT, "Multiple users returned from backend($backendName) for: $userId. Cancelling sync.");
			}

			if ($numberOfUsers === 1) {
				// Run the sync using the internal username if mapped
				$this->syncService->run($backend, new ArrayIterator([$users[0]]));
				return new Result();
			}
		}

		return new Result([], Http::STATUS_NOT_FOUND, "User is not known in any user backend: $userId");
	}
}
