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

use OCP\IConfig;
use OCP\ILogger;
use OCP\IL10N;
use OCP\IUser;
use OCP\Authentication\LoginPolicies\ILoginPolicy;
use OC\User\LoginException;

class LoginPolicyManager {
	/** @var IConfig */
	private $config;
	/** @var ILogger */
	private $logger;
	/** @var IL10N */
	private $l10n;
	/** @var Array<string, ILoginPolicy> */
	private $registeredPolicies = [];

	public function __construct(IConfig $config, ILogger $logger, IL10N $l10n) {
		$this->config = $config;
		$this->logger = $logger;
		$this->l10n = $l10n;
	}

	/**
	 * Register the policy.
	 * The registration checks the classname of the policy to prevent
	 * duplications. Multiple policies can be registered as long as the
	 * classnames are different
	 */
	public function registerPolicy(ILoginPolicy $loginPolicy) {
		$classname = \get_class($loginPolicy);
		$this->registeredPolicies[$classname] = $loginPolicy;

		$this->logger->debug("{$classname} policy registered", ['app' => 'core']);
	}

	/**
	 * Get the policies that have been registered and will be used based on the
	 * configured order. Not all the registered policies might be used.
	 * The policies will be returned sorted based on the configured list
	 */
	private function getPolicyOrder() {
		$policyOrder = $this->config->getSystemValue('loginPolicy.order', []);
		if (!\is_array($policyOrder)) {
			return [];
		}

		$realPolicyOrder = [];
		foreach ($policyOrder as $configuredPolicyName) {
			if (isset($this->registeredPolicies[$configuredPolicyName])) {
				$realPolicyOrder[] = $this->registeredPolicies[$configuredPolicyName];
			} else {
				$this->logger->debug("{$configuredPolicyName} policy not found registered", ['app' => 'core']);
			}
		}

		return $realPolicyOrder;
	}

	/**
	 * Check if the user is allowed to login based on the configured policies.
	 * This method will throw a LoginException if the user is rejected. If the
	 * user is allowed, this method won't return anything.
	 * @throws LoginException if the user is rejected
	 */
	public function checkUserLogin(string $loginType, IUser $user) {
		$policies = $this->getPolicyOrder();

		foreach ($policies as $policy) {
			// checkPolicy can throw a LoginException with a better message
			$policyOk = true;
			try {
				$policyOk = $policy->checkPolicy($loginType, $user);
			} catch (LoginException $e) {
				$this->logger->warning(\get_class($policy) . " policy has rejected user {$user->getUID()}", ['app' => 'core']);
				throw $e;
			}

			if (!$policyOk) {
				// policy failed -> throw LoginException
				$this->logger->warning(\get_class($policy) . " policy has rejected user {$user->getUID()}", ['app' => 'core']);
				throw new LoginException($this->l10n->t('A login policy has blocked the login'));
			}
		}
	}
}
