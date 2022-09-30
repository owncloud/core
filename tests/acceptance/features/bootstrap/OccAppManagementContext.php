<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Phil Davis <phil@jankaritech.com>
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
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;

require_once 'bootstrap.php';

/**
 * Occ context for test steps that test occ commands
 */
class OccAppManagementContext implements Context {
	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 *
	 * @var OccContext
	 */
	private $occContext;

	/**
	 * @When the administrator disables app :appName using the occ command
	 *
	 * @param string $appName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDisablesAppUsingTheOccCommand(string $appName):void {
		$this->occContext->invokingTheCommand(
			"app:disable $appName"
		);
	}

	/**
	 * @When the administrator enables app :appName using the occ command
	 *
	 * @param string $appName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorEnablesAppUsingTheOccCommand(string $appName):void {
		$this->occContext->invokingTheCommand(
			"app:enable $appName"
		);
	}

	/**
	 * @When the administrator gets the app info of app :appName
	 *
	 * @param string $appName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function administratorGetsTheAppInfoOfApp(string $appName):void {
		$this->occContext->invokingTheCommand(
			"config:list $appName"
		);
	}

	/**
	 * @When the administrator gets the list of apps using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorGetsTheListOfAppsUsingTheOccCommand():void {
		$this->occContext->invokingTheCommand(
			"config:list"
		);
	}

	/**
	 * @When the administrator checks the location of the :appName app using the occ command
	 *
	 * @param string $appName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorChecksTheLocationOfTheAppUsingTheOccCommand(string $appName):void {
		$this->occContext->invokingTheCommand(
			"app:getpath $appName"
		);
	}

	/**
	 * @Then the app name returned by the occ command should be :appName
	 *
	 * @param string $appName
	 *
	 * @return void
	 */
	public function theAppNameReturnedByTheOccCommandShouldBe(string $appName):void {
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		$lastOutputArray = \json_decode($lastOutput, true);
		Assert::assertEquals(
			$appName,
			\key($lastOutputArray['apps']),
			"The app name expected to be returned by the occ command is {$appName} but got "
			. \key($lastOutputArray['apps'])
		);
	}

	/**
	 * @Then the path returned by the occ command should be inside one of the apps paths in the config for the :appName app
	 *
	 * @param string $appName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function thePathReturnedByTheOccCommandShouldBeInsideOneOfTheAppsPathInTheConfig(string $appName):void {
		$appPath = $this->featureContext->getStdOutOfOccCommand();

		$this->occContext->invokingTheCommand("config:list");
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		$configOutputArray = \json_decode($lastOutput, true);

		// Default apps location is '${INSTALLED_LOCATION}/apps/${appName}
		if (\substr_compare($appPath, '/apps/${appName}', 0)) {
			return;
		}

		// We can also set it in the `apps_paths` in the `config`
		if (isset($configOutputArray['system']['apps_paths'])) {
			$appPaths = $configOutputArray['system']['apps_paths'];

			foreach ($appPaths as $path) {
				if (\substr_compare($appPath, $path['path'], 0)) {
					return;
				}
			}
		}

		// if it's neither in the default location, nor in `apps_paths`, where it could be?
		throw new Exception(__METHOD__ . " App path $appPath was not found in the config.");
	}

	/**
	 * @Then the app enabled status of app :appName should be :appStatus
	 *
	 * @param string $appName
	 * @param string $appStatus
	 *
	 * @return void
	 */
	public function theAppEnabledStatusShouldBe(string $appName, string $appStatus):void {
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		$lastOutputArray = \json_decode($lastOutput, true);
		$actualAppEnabledStatus = $lastOutputArray['apps'][$appName]['enabled'];
		Assert::assertEquals(
			$appStatus,
			$actualAppEnabledStatus,
			"The app enabled status of app {$appName} was expected to be {$appStatus}, but the actual status is {$actualAppEnabledStatus}"
		);
	}

	/**
	 * @Then the apps returned by the occ command should include
	 *
	 * @param TableNode $appListTable table with apps name with no header
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAppsReturnedByTheOccCommandShouldInclude(TableNode $appListTable):void {
		$this->featureContext->verifyTableNodeColumnsCount($appListTable, 1);
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		$lastOutputApps = \array_keys(\json_decode($lastOutput, true)['apps']);

		$apps = $appListTable->getRows();
		$appsSimplified = $this->featureContext->simplifyArray($apps);

		foreach ($appsSimplified as $app) {
			Assert::assertContains(
				$app,
				$lastOutputApps,
				"The apps: '"
				. \implode(', ', $lastOutputApps)
				. "' returned by the occ command were expected to include '$app', but does not"
			);
		}
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
		$this->occContext = $environment->getContext('OccContext');
	}
}
