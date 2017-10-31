<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright 2017 Artur Neumann artur@jankaritech.com
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
namespace TestHelpers;
use Behat\Testwork\Hook\Scope\HookScope;
use Exception;

/**
 * Helper to setup UI / Integration tests
 * 
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class SetupHelper {

	/**
	 * @var boolean
	 */
	private static $ocPath = null;

	/**
	 * creates a user
	 *
	 * @param string $userName
	 * @param string $password
	 * @param string $displayName
	 * @param string $email
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function createUser(
		$userName,
		$password,
		$displayName = null,
		$email = null
	) {
		$occCommand = ['user:add', '--password-from-env'];
		if (!is_null($displayName)) {
			$occCommand = array_merge($occCommand, ["--display-name", $displayName]);
		}
		if (!is_null($email)) {
			$occCommand = array_merge($occCommand, ["--email", $email]);
		}
		putenv("OC_PASS=" . $password);
		return self::runOcc(array_merge($occCommand, [$userName]));
	}

	/**
	 * deletes a user
	 *
	 * @param string $userName
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function deleteUser($userName) {
		return self::runOcc(['user:delete', $userName]);
	}

	/**
	 *
	 * @param string $userName
	 * @param string $app
	 * @param string $key
	 * @param string $value
	 * @return string[]
	 */
	public static function changeUserSetting(
		$userName, $app, $key, $value
	) {
		return self::runOcc(
			['user:setting', '--value ' . $value, $userName, $app, $key]
		);
	}

	/**
	 * creates a group
	 *
	 * @param string $groupName
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function createGroup($groupName) {
		return self::runOcc(['group:add', $groupName]);
	}

	/**
	 * adds an existing user to a group, creating the group if it does not exist
	 *
	 * @param string $groupName
	 * @param string $userName
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function addUserToGroup($groupName, $userName) {
		return self::runOcc(
			['group:add-member', '--member', $userName, $groupName]
		);
	}

	/**
	 * removes a user from a group
	 *
	 * @param string $groupName
	 * @param string $userName
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function removeUserFromGroup($groupName, $userName) {
		return self::runOcc(
			['group:remove-member', '--member', $userName, $groupName]
		);
	}

	/**
	 * deletes a group
	 *
	 * @param string $groupName
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function deleteGroup($groupName) {
		return self::runOcc(['group:delete', $groupName]);
	}

	/**
	 * 
	 * @return string[]
	 */
	public static function getGroups() {
		return json_decode(self::runOcc(['group:list', '--output=json'])['stdOut']);
	}
	/**
	 *
	 * @param HookScope $scope
	 * @return array of suite context parameters
	 */
	public static function getSuiteParameters(HookScope $scope) {
		return $scope->getEnvironment()->getSuite()
			->getSettings() ['context'] ['parameters'];
	}

	/**
	 *
	 * @param HookScope $scope
	 * @return void
	 */
	public static function setOcPath(HookScope $scope) {
		$suiteParameters = self::getSuiteParameters($scope);
		self::$ocPath = rtrim($suiteParameters['ocPath'], '/') . '/';
	}

	/**
	 *
	 * @return string path to ownCloud folder
	 * @throws Exception if ocPath has not been set yet
	 */
	public static function getOcPath() {
		if (is_null(self::$ocPath)) {
			throw new Exception(
				"getOcPath called before ocPath is set by setOcPath"
			);
		}

		return self::$ocPath;
	}

	/**
	 * enables an app
	 *
	 * @param string $appName
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function enableApp($appName) {
		return self::runOcc(['app:enable', $appName]);
	}

	/**
	 * disables an app
	 *
	 * @param string $appName
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function disableApp($appName) {
		return self::runOcc(['app:disable', $appName]);
	}

	/**
	 * checks if an app is currently enabled
	 *
	 * @param string $appName
	 * @return bool true if enabled, false if disabled or not existing
	 */
	public static function isAppEnabled($appName) {
		$result = self::runOcc(['app:list', '^' . $appName . '$']);
		return strtolower(substr($result['stdOut'], 0, 7)) === 'enabled';
	}

	/**
	 * lists app status (enabled or disabled)
	 *
	 * @param string $appName
	 * @return bool true if the app needed to be enabled, false otherwise
	 */
	public static function enableAppIfNotEnabled($appName) {
		if (!self::isAppEnabled($appName)) {
			self::enableApp($appName);
			return true;
		}

		return false;
	}

	/**
	 * invokes an OCC command
	 *
	 * @param array $args anything behind "occ".
	 *                    For example: "files:transfer-ownership"
	 * @param bool $escaping
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function runOcc($args, $escaping = true) {
		if ($escaping === true) {
			$args = array_map(
				function ($arg) {
					return escapeshellarg($arg);
				}, $args
			);
		}
		$args[] = '--no-ansi';
		$args = implode(' ', $args);

		$descriptor = [
				0 => ['pipe', 'r'],
				1 => ['pipe', 'w'],
				2 => ['pipe', 'w'],
		];
		$process = proc_open(
			'php console.php ' . $args,
			$descriptor,
			$pipes,
			self::getOcPath()
		);
		$lastStdOut = stream_get_contents($pipes[1]);
		$lastStdErr = stream_get_contents($pipes[2]);
		$lastCode = proc_close($process);
		return [ 
			"code" => $lastCode,
			"stdOut" => $lastStdOut,
			"stdErr" => $lastStdErr
		];
	}

}
