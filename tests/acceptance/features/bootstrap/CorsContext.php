<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2019, ownCloud GmbH
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use PHPUnit\Framework\Assert;

require_once 'bootstrap.php';

/**
 * Steps that relate to CORS tests
 */
class CorsContext implements Context {
	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	private $originalAdminCorsDomains = null;

	/**
	 * @Given user :user has added :domain to the list of personal CORS domains
	 *
	 * @param string $user
	 * @param string $domain
	 *
	 * @return void
	 * @throws Exception
	 */
	public function addDomainToPrivateCORSLists(string $user, string $domain):void {
		$user = $this->featureContext->getActualUsername($user);
		$occStatus = $this->featureContext->runOcc(
			[
				'user:setting',
				$user,
				'core',
				'domains'
			]
		);
		if ($occStatus === 0) {
			$domainsJson = $this->featureContext->getStdOutOfOccCommand();
			$domains = \json_decode($domainsJson);
		} else {
			$domainsJson = "";
			$domains = [];
		}
		if ($user === $this->featureContext->getAdminUsername()
			&& $this->originalAdminCorsDomains === null
		) {
			$this->originalAdminCorsDomains = $domainsJson;
		}

		$domains[] = $domain;
		$valueString = \json_encode($domains);
		$occStatus = $this->featureContext->runOcc(
			[
				'user:setting',
				$user,
				'core',
				'domains',
				'--value=\'' . $valueString . '\''
			]
		);
		if ($occStatus !== 0) {
			throw new \Exception(
				"could not set CORS domain. " .
				$this->featureContext->getStdErrOfOccCommand()
			);
		}
		//double check if it was set
		$this->featureContext->runOcc(
			[
				'user:setting',
				$user,
				'core',
				'domains'
			]
		);
		$domains = \json_decode($this->featureContext->getStdOutOfOccCommand());

		Assert::assertIsArray(
			$domains,
			__METHOD__ . " The output of 'occ user:setting $user core domains' was not valid JSON"
		);

		if (!\in_array($domain, $domains)) {
			throw new \Exception(
				"domain $domain is not included in CORS domain $domains, but was expected to be"
			);
		}
	}

	/**
	 * @Given the administrator has added :domain to the list of personal CORS domains
	 *
	 * @param string $domain
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminAddDomainToPrivateCORSLists(string $domain):void {
		$this->addDomainToPrivateCORSLists(
			$this->featureContext->getAdminUsername(),
			$domain
		);
	}

	/**
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @BeforeScenario
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function before(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}

	/**
	 * @AfterScenario
	 *
	 * @return void
	 * @throws Exception
	 */
	public function resetAdminCors():void {
		if ($this->originalAdminCorsDomains !== null) {
			if ($this->originalAdminCorsDomains !== "") {
				$this->featureContext->runOcc(
					[
						'user:setting',
						$this->featureContext->getAdminUsername(),
						'core',
						'domains',
						'--value=\'' . $this->originalAdminCorsDomains . '\''
					]
				);
			} else {
				$this->featureContext->runOcc(
					[
						'user:setting',
						$this->featureContext->getAdminUsername(),
						'core',
						'domains',
						'--delete'
					]
				);
			}
		}
	}
}
