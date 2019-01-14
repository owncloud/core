<?php
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
use TestHelpers\SetupHelper;

require __DIR__ . '/../../../../lib/composer/autoload.php';

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
	 *
	 * @param array $appsPaths of apps_paths entries
	 *
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 * @throws Exception
	 */
	public function setAppsPaths($appsPaths) {
		return $this->featureContext->setSystemConfig(
			'apps_paths',
			\json_encode($appsPaths),
			'json'
		);
	}

	/**
	 * @Given apps have been put in two directories :dir1 and :dir2
	 *
	 * @param string $dir1
	 * @param string $dir2
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setAppDirectories($dir1, $dir2) {
		$fullpath1 = $this->featureContext->getServerRoot() . "/$dir1";
		$fullpath2 = $this->featureContext->getServerRoot() . "/$dir2";

		$this->featureContext->mkDirOnServer($dir1);
		$this->featureContext->mkDirOnServer($dir2);
		$this->setAppsPaths(
			[
				['path' => $fullpath1, 'url' => $dir1, 'writable' => true],
				['path' => $fullpath2, 'url' => $dir2, 'writable' => true]
			]
		);
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
	public function appHasBeenPutInDir($appId, $version, $dir) {
		$ocVersion = $this->featureContext->getSystemConfigValue('version');
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
	}

	/**
	 * @When the administrator gets the path for app :appId using the occ command
	 * @Given the administrator has got the path for app :appId using the occ command
	 *
	 * @param string $appId app id
	 *
	 * @return void
	 */
	public function adminGetsPathForApp($appId) {
		$this->cmdOutput = SetupHelper::runOcc(
			['app:getpath', $appId, '--no-ansi']
		)['stdOut'];
	}

	/**
	 * @Then the path to :appId should be :dir
	 *
	 * @param string $appId
	 * @param string $dir
	 *
	 * @return void
	 */
	public function appPathIs($appId, $dir) {
		PHPUnit_Framework_Assert::assertEquals(
			$this->featureContext->getServerRoot() . "/$dir/$appId",
			\trim($this->cmdOutput)
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
	public function prepareParameters(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');

		$value = $this->featureContext->getSystemConfigValue(
			'apps_paths', 'json'
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
	public function undoChangingParameters() {
		if ($this->oldAppsPaths === null) {
			$this->featureContext->deleteSystemConfig('apps_paths');
		} else {
			$this->setAppsPaths($this->oldAppsPaths);
		}
	}
}
