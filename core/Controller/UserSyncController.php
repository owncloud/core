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
		foreach ($this->userManager->getBackends() as $backEnd) {
			$users = $backEnd->getUsers($userId, 2);
			if (\count($users) > 1) {
				$backEndName = \get_class($backEnd);
				return new Result([], 409, "Multiple users returned from backend($backEndName) for: $userId. Cancelling sync.");
			}

			if (\count($users) === 1) {
				// Run the sync using the internal username if mapped
				$this->syncService->run($backEnd, new ArrayIterator([$users[0]]));
				return new Result();
			}
		}

		return new Result([], 404, "User is not known in any user backend: $userId");
	}
}
