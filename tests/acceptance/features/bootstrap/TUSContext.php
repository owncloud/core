<?php
/**
 * @author Artur Neumann <artur@jankaritech.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use TestHelpers\HttpRequestHelper;
use TestHelpers\WebDavHelper;

require_once 'bootstrap.php';

/**
 * TUS related test steps
 */
class TUSContext implements Context {

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @When user :user creates a new TUS resource on the WebDAV API with these headers:
	 *
	 * @param string    $user
	 * @param TableNode $headers
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function createNewTUSresourceWithHeaders(string $user, TableNode $headers) {
		$this->featureContext->verifyTableNodeColumnsCount($headers, 2);
		$user = $this->featureContext->getActualUsername($user);
		$password = $this->featureContext->getUserPassword($user);

		$this->featureContext->setResponse(
			HttpRequestHelper::post(
				$this->featureContext->getBaseUrl() . "/" .
				WebDavHelper::getDavPath(
					$user, $this->featureContext->getDavPathVersion()
				),
				$user,
				$password,
				$headers->getRowsHash()
			)
		);
	}

	/**
	 * @BeforeScenario
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function setUpScenario(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
