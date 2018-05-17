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

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * App Management context.
 */
class AppManagementContext implements Context {
	private $oldAppPath;
	
	/**
	 * @var string stdout of last command
	 */
	private $cmdOutput;
	
	/**
	 * @BeforeScenario
	 *
	 * Remember the config values before each scenario
	 *
	 * @return void
	 */
	public function prepareParameters() {
		include_once __DIR__ . '/../../../../lib/base.php';
		$this->oldAppPath = \OC::$server->getConfig()->getSystemValue(
			'apps_paths', null
		);
	}
	
	/**
	 * @AfterScenario
	 *
	 * Reset the config values after each scenario
	 *
	 * @return void
	 */
	public function undoChangingParameters() {
		if ($this->oldAppPath !== null) {
			\OC::$server->getConfig()->setSystemValue(
				'apps_paths', $this->oldAppPath
			);
		} else {
			\OC::$server->getConfig()->deleteSystemValue('apps_paths');
		}
	}
	
	/**
	 * @Given apps have been put in two directories :dir1 and :dir2
	 *
	 * @param string $dir1
	 * @param string $dir2
	 *
	 * @return void
	 */
	public function setAppDirectories($dir1, $dir2) {
		$fullpath1 = \OC::$SERVERROOT . '/' . $dir1;
		$fullpath2 = \OC::$SERVERROOT . '/' . $dir2;
		\OC::$server->getConfig()->setSystemValue(
			'apps_paths',
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
	 */
	public function appHasBeenPutInDir($appId, $version, $dir) {
		$ocVersion = \OC::$server->getConfig()->getSystemValue('version', '0.0.0');
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
		$appsDir = \OC::$SERVERROOT . '/' . $dir;
		if (!\file_exists($appsDir)) {
			\mkdir($appsDir);
		}
		if (!\file_exists($appsDir . '/' . $appId)) {
			\mkdir($appsDir . '/' . $appId);
		}
		
		$fullpath = $appsDir . '/' . $appId;
		
		if (!\file_exists($fullpath . '/appinfo')) {
			\mkdir($fullpath . '/appinfo');
		}
		
		\file_put_contents($fullpath . '/appinfo/info.xml', $appInfo);
	}
	
	/**
	 * @When the administrator loads app :appId using the console
	 * @Given the administrator has loaded app :appId using the console
	 *
	 * @param string $appId app id
	 *
	 * @return void
	 */
	public function loadApp($appId) {
		$args = \explode(' ', "app:getpath $appId");
		$args = \array_map(
			function ($arg) {
				return \escapeshellarg($arg);
			}, $args
		);
		$args[] = '--no-ansi';
		$args = \implode(' ', $args);

		$descriptor = [
			0 => ['pipe', 'r'],
			1 => ['pipe', 'w'],
			2 => ['pipe', 'w'],
		];
		$process = \proc_open(
			'php console.php ' . $args,
			$descriptor,
			$pipes,
			\OC::$SERVERROOT
		);
		$this->cmdOutput = \stream_get_contents($pipes[1]);
		\proc_close($process);
	}
	
	/**
	 * @Then the path to :appId should be :dir
	 *
	 * @param string $appId
	 * @param string $dir
	 *
	 * @return void
	 */
	public function appVersionIs($appId, $dir) {
		PHPUnit_Framework_Assert::assertEquals(
			\OC::$SERVERROOT . '/' . $dir . '/' . $appId,
			\trim($this->cmdOutput)
		);
	}
}
