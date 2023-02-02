<?php
/**
 *
 * @copyright Copyright (c) 2023, ownCloud GmbH
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
namespace OC\Authentication\LoginPolicies;

use OCP\IGroupManager;
use OCP\IConfig;
use OCP\IUser;
use OCP\IL10N;
use OCP\Authentication\LoginPolicies\ILoginPolicy;
use OC\User\LoginException;

/**
 * A login policy to allow or deny access based on groups.
 * A specific group could be allowed only via token. Another group could
 * be denied to access via username + password.
 *
 * Configuration is done via config.php file
 * ```
 * loginPolicy.groupLoginPolicy.forbidMap => [
 *  'password' => [
 *    'allowOnly' => ['group1, group2'],
 *    'reject' => ['group3'],
 *  ],
 *  'token' => [
 *    'reject' => ['admin'],
 *  ],
 *  '' => [
 *    'allowOnly' => ['group2'],
 *  ],
 * ]
 * ```
 */
class GroupLoginPolicy implements ILoginPolicy {
	/** @var IGroupManager */
	private $groupManager;
	/** @var IConfig */
	private $config;
	/** @var IL10N */
	private $l10n;

	public function __construct(IGroupManager $groupManager, IConfig $config, IL10N $l10n) {
		$this->groupManager = $groupManager;
		$this->config = $config;
		$this->l10n = $l10n;
	}

	public function checkPolicy(string $loginType, IUser $user): bool {
		$policyConfig = $this->config->getSystemValue('loginPolicy.groupLoginPolicy.forbidMap', []);
		if (!\is_array($policyConfig)) {
			// if not properly configured, allow access
			return true;
		}

		$policyForType = $policyConfig[$loginType] ?? [];  // empty map if not defined: reject and allowOnly won't be set

		if (isset($policyForType['reject'])) {
			$this->checkRejectGroupPolicy($user, $policyForType['reject']);
		}

		if (isset($policyForType['allowOnly'])) {
			return $this->checkAllowGroupPolicy($user, $policyForType['allowOnly']);
		}

		return true;
	}

	private function checkRejectGroupPolicy(IUser $user, array $rejectGroups) {
		foreach ($rejectGroups as $rejectGroup) {
			if ($this->groupManager->isInGroup($user->getUID(), $rejectGroup)) {
				throw new LoginException(
					$this->l10n->t("%s is member of a group not allowed to access through this login mechanism", [$user->getDisplayName()])
				);
			}
		}
	}

	private function checkAllowGroupPolicy(IUser $user, array $allowOnlyGroups) {
		foreach ($allowOnlyGroups as $allowOnlyGroup) {
			if ($this->groupManager->isInGroup($user->getUID(), $allowOnlyGroup)) {
				return true;
			}
		}
		throw new LoginException(
			$this->l10n->t("%s isn't member of a group allowed to access through this login mechanism", [$user->getDisplayName()])
		);
	}
}
