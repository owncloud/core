<?php declare(strict_types=1);
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
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

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;
use TestHelpers\SetupHelper;

/**
 * Context for steps that test apps_paths.
 */
class AppManagementContext implements Context {
	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	private $oldAppsPaths;

	/**
	 * @var string stdout of last command
	 */
	private $cmdOutput;

	/**
	 * @var array[]
	 */
	private $createdApps = [];

	/**
	 *
	 * @param array $appsPaths of apps_paths entries
	 *
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 * @throws Exception
	 */
	public function setAppsPaths(array $appsPaths):array {
		return SetupHelper::setSystemConfig(
			'apps_paths',
			\json_encode($appsPaths),
			$this->featureContext->getStepLineRef(),
			'json'
		);
	}

	/**
	 * @Given these apps' path has been configured additionally with following attributes:
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setAppDirectories(TableNode $table):void {
		$appsPathsConfigs = \json_decode(
			SetupHelper::getSystemConfig(
				"apps_paths",
				$this->featureContext->getStepLineRef(),
				"json"
			)['stdOut'],
			true
		);
		$this->featureContext->verifyTableNodeColumns($table, ['dir'], ['is_writable']);
		foreach ($table as $appsPathToAdd) {
			$dir = $appsPathToAdd['dir'];
			$appsPathsConfigs[] = [
				'url' => $dir,
				'path' => $this->featureContext->getServerRoot() . "/$dir",
				'writable' => $appsPathToAdd['is_writable'] === 'true',
			];
			$this->featureContext->mkDirOnServer($appsPathToAdd['dir']);
		}
		$resp = $this->setAppsPaths($appsPathsConfigs);
		if (!empty($resp['stdErr'])) {
			throw new \Exception(
				__METHOD__
				. " Expected to set app path but failed due to error: " . $resp['stdErr']
			);
		}
	}

	/**
	 * @When the administrator puts app :appId with version :version in dir :dir
	 *
	 * @param string $appId app id
	 * @param string $version app version
	 * @param string $dir app directory
	 *
	 * @return void
	 * @throws Exception
	 */
	public function putAppInDir(string $appId, string $version, string $dir):void {
		$ocVersion = SetupHelper::getSystemConfigValue(
			'version',
			$this->featureContext->getStepLineRef()
		);
		$appInfo = \sprintf(
			'<?xml version="1.0"?>
			<info>
				<id>%s</id>
				<name>%s</name>
				<description>description</description>
				<licence>AGPL</licence>
				<author>Author</author>
				<version>%s</version>
				<category>collaboration</category>
				<website>https://github.com/owncloud/</website>
				<bugs>https://github.com/owncloud/</bugs>
				<repository type="git">https://github.com/owncloud/</repository>
				<screenshot>https://raw.githubusercontent.com/owncloud/screenshots/</screenshot>
				<dependencies>
					<owncloud min-version="%s" max-version="%s" />
				</dependencies>
			</info>',
			$appId,
			$appId,
			$version,
			$ocVersion,
			$ocVersion
		);
		$targetDir = "$dir/$appId/appinfo";
		$this->featureContext->mkDirOnServer($targetDir);
		$this->featureContext->createFileOnServerWithContent("$targetDir/info.xml", $appInfo);
		if (!\array_key_exists($appId, $this->createdApps)) {
			$this->createdApps[$appId][] = $targetDir;
		} else {
			if (!\in_array($targetDir, $this->createdApps[$appId])) {
				$this->createdApps[$appId][] = $targetDir;
			}
		}
	}

	/**
	 * @Given app :appId with version :version has been put in dir :dir
	 *
	 * @param string $appId app id
	 * @param string $version app version
	 * @param string $dir app directory
	 *
	 * @return void
	 * @throws Exception
	 */
	public function appHasBeenPutInDir(string $appId, string $version, string $dir):void {
		$this->putAppInDir($appId, $version, $dir);
		$check = SetupHelper::runOcc(
			['app:list', '--output json'],
			$this->featureContext->getStepLineRef()
		);
		$appsDisabled = \json_decode($check['stdOut'], true)['disabled'];
		if (!\array_key_exists($appId, $appsDisabled)) {
			throw new \Exception(
				__METHOD__
				. ' Expected: ' . $appId . 'to be present in apps(disabled) list, but not found'
			);
		}
	}

	/**
	 * @When the administrator gets the path for app :appId using the occ command
	 * @Given the administrator has got the path for app :appId using the occ command
	 *
	 * @param string $appId app id
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminGetsPathForApp(string $appId):void {
		$this->featureContext->setOccLastCode(
			$this->featureContext->runOcc(
				['app:getpath', $appId, '--no-ansi']
			)
		);
		$this->cmdOutput = $this->featureContext->getStdOutOfOccCommand();
		// check that the command seems to have executed OK, for both When and Given
		// step forms. There is no point continuing the scenario if the command itself
		// has reported an error.
		$statusCode = $this->featureContext->getExitStatusCodeOfOccCommand();
		Assert::assertEquals(
			"0",
			$statusCode,
			"app:getpath returned error code " . $statusCode
		);
	}

	/**
	 * @When the administrator lists the apps using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminListsTheApps():void {
		$this->featureContext->setOccLastCode(
			$this->featureContext->runOcc(
				['app:list', '--no-ansi']
			)
		);
	}

	/**
	 * @When the administrator lists the enabled apps using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminListsTheEnabledApps():void {
		$this->featureContext->setOccLastCode(
			$this->featureContext->runOcc(
				['app:list', '--enabled', '--no-ansi']
			)
		);
	}

	/**
	 * @When the administrator lists the disabled apps using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminListsTheDisabledApps():void {
		$this->featureContext->setOccLastCode(
			$this->featureContext->runOcc(
				['app:list', '--disabled', '--no-ansi']
			)
		);
	}

	/**
	 * @When the administrator lists the enabled and disabled apps using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminListsTheEnabledAndDisabledApps():void {
		$this->featureContext->setOccLastCode(
			$this->featureContext->runOcc(
				['app:list', '--enabled', '--disabled', '--no-ansi']
			)
		);
	}

	/**
	 * @When the administrator lists the apps in minimal format using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminListsTheAppsInMinimalFormat():void {
		$this->featureContext->setOccLastCode(
			$this->featureContext->runOcc(
				['app:list', '--minimal --no-ansi']
			)
		);
	}

	/**
	 * @Then app :appId with version :appVersion and path :appPath should have been listed in the enabled apps section
	 *
	 * @param string $appId
	 * @param string $appVersion
	 * @param string $appPath
	 *
	 * @return void
	 * @throws Exception
	 */
	public function appWithVersionAndPathShouldHaveBeenListedInTheEnabledAppsSection(
		$appId,
		$appVersion,
		$appPath
	):void {
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		$expectedStartOfOutput = "Enabled:";
		Assert::assertEquals(
			$expectedStartOfOutput,
			\substr($commandOutput, 0, 8),
			"app:list command output did not start with '$expectedStartOfOutput'"
		);
		$startOfDisabledSection = \strpos($commandOutput, "Disabled:");
		if ($startOfDisabledSection) {
			$commandOutput = \substr($commandOutput, 0, $startOfDisabledSection);
		}
		$expectedString = \sprintf("- %s:\n    - Version: %s\n    - Path: %s/%s", $appId, $appVersion, $this->featureContext->getServerRoot(), $appPath);
		Assert::assertNotFalse(
			\strpos($commandOutput, $expectedString),
			"app:list output did not contain '$expectedString' in the enabled section"
		);
	}

	/**
	 * @Then app :appId with version :appVersion and path :appPath should have been listed in the disabled apps section
	 *
	 * @param string $appId
	 * @param string $appVersion
	 * @param string $appPath
	 *
	 * @return void
	 * @throws Exception
	 */
	public function appWithVersionAndPathShouldHaveBeenListedInTheDisabledAppsSection(
		string $appId,
		string $appVersion,
		string $appPath
	):void {
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		$startOfDisabledSection = \strpos($commandOutput, "Disabled:");
		Assert::assertNotFalse(
			$startOfDisabledSection,
			"app:list output did not contain the disabled section"
		);
		$commandOutput = \substr($commandOutput, $startOfDisabledSection);
		$expectedString = \sprintf("- %s:\n    - Version: %s\n    - Path: %s/%s", $appId, $appVersion, $this->featureContext->getServerRoot(), $appPath);
		Assert::assertNotFalse(
			\strpos($commandOutput, $expectedString),
			"app:list output did not contain '$expectedString' in the disabled section"
		);
	}

	/**
	 * @Then app :appId should have been listed in the enabled apps section
	 *
	 * @param string $appId
	 *
	 * @return void
	 */
	public function appShouldHaveBeenListedInTheEnabledAppsSection(string $appId):void {
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		$expectedStartOfOutput = "Enabled:";
		Assert::assertEquals(
			$expectedStartOfOutput,
			\substr($commandOutput, 0, 8),
			"app:list command output did not start with '$expectedStartOfOutput'"
		);
		$startOfDisabledSection = \strpos($commandOutput, "Disabled:");
		if ($startOfDisabledSection) {
			$commandOutput = \substr($commandOutput, 0, $startOfDisabledSection);
		}
		$expectedString = "- $appId";
		Assert::assertNotFalse(
			\strpos($commandOutput, $expectedString),
			"app:list output did not contain '$expectedString' in the enabled section"
		);
	}

	/**
	 * @Then app :appId should have been listed in the disabled apps section
	 *
	 * @param string $appId
	 *
	 * @return void
	 */
	public function appShouldHaveBeenListedInTheDisabledAppsSection(string $appId):void {
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		$startOfDisabledSection = \strpos($commandOutput, "Disabled:");
		Assert::assertNotFalse(
			$startOfDisabledSection,
			"app:list output did not contain the disabled section"
		);
		$commandOutput = \substr($commandOutput, $startOfDisabledSection);
		$expectedString = "- $appId";
		Assert::assertNotFalse(
			\strpos($commandOutput, $expectedString),
			"app:list output did not contain '$expectedString' in the disabled section"
		);
	}

	/**
	 * @Then app version and path lines should not exist in the list app output
	 *
	 * @return void
	 */
	public function appVersionAndPathLinesShouldNotExist():void {
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		Assert::assertStringNotContainsString(
			"Version:",
			$commandOutput
		);
		Assert::assertStringNotContainsString(
			"Path:",
			$commandOutput
		);
	}

	/**
	 * @Then the enabled apps section should not exist
	 *
	 * @return void
	 */
	public function theEnabledAppsSectionShouldNotExist():void {
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		Assert::assertFalse(
			\strpos($commandOutput, "Enabled:"),
			"app:list output contains the enabled section but it should not"
		);
	}

	/**
	 * @Then the disabled apps section should not exist
	 *
	 * @return void
	 */
	public function theDisabledAppsSectionShouldNotExist():void {
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		Assert::assertFalse(
			\strpos($commandOutput, "Disabled:"),
			"app:list output contains the disabled section but it should not"
		);
	}

	/**
	 * @Then the path to :appId should be :dir
	 *
	 * @param string $appId
	 * @param string $dir
	 *
	 * @return void
	 * @throws Exception
	 */
	public function appPathIs(string $appId, string $dir):void {
		Assert::assertEquals(
			$this->featureContext->getServerRoot() . "/$dir/$appId",
			\trim($this->cmdOutput),
			"Expected: the path to ${appId} should be ${dir} but got "
			. \trim($this->cmdOutput)
		);
	}

	/**
	 * @Then the installed version of :appId should be :version
	 *
	 * @param string $appId
	 * @param string $version
	 *
	 * @return void
	 * @throws Exception
	 */
	public function assertInstalledVersionOfAppIs(string $appId, string $version):void {
		$cmdOutput = SetupHelper::runOcc(
			['config:app:get', $appId, 'installed_version', '--no-ansi'],
			$this->featureContext->getStepLineRef()
		)['stdOut'];
		Assert::assertEquals(
			$version,
			\trim($cmdOutput),
			"Expected: the installed version of ${appId} should be ${version} but got " . \trim($cmdOutput)
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
	 * @throws Exception
	 */
	public function prepareParameters(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');

		$value = SetupHelper::getSystemConfigValue(
			'apps_paths',
			$this->featureContext->getStepLineRef(),
			'json'
		);

		if ($value === '') {
			$this->oldAppsPaths = null;
		} else {
			$this->oldAppsPaths = \json_decode($value, true);
		}
	}

	/**
	 * @AfterScenario
	 *
	 * Reset the config values after each scenario
	 *
	 * @return void
	 * @throws Exception
	 */
	public function undoChangingParameters():void {
		if ($this->oldAppsPaths === null) {
			SetupHelper::deleteSystemConfig(
				'apps_paths',
				$this->featureContext->getStepLineRef()
			);
		} else {
			$this->setAppsPaths($this->oldAppsPaths);
		}
	}

	/**
	 * @AfterScenario
	 *
	 * delete created apps including files and values in DB after each scenario
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteCreatedApps():void {
		$configJson = SetupHelper::runOcc(
			['config:list'],
			$this->featureContext->getStepLineRef()
		)['stdOut'];
		$configList = \json_decode($configJson, true);
		foreach ($this->createdApps as $app => $paths) {
			//disable the app
			$this->featureContext->appHasBeenDisabled($app, 'disables');

			//delete config values out of the database
			if (\array_key_exists($app, $configList['apps'])) {
				foreach ($configList['apps'][$app] as $key => $value) {
					SetupHelper::runOcc(
						['config:app:delete', $app, $key],
						$this->featureContext->getStepLineRef()
					);
				}
			}

			//delete the app from the drive
			foreach ($paths as $path) {
				SetupHelper::rmDirOnServer(
					\dirname($path),
					$this->featureContext->getStepLineRef()
				);
			}
		}
	}
}
