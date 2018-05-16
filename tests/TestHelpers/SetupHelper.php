<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
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
use GuzzleHttp\Exception\ServerException;
use Exception;

/**
 * Helper to setup UI / Integration tests
 *
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class SetupHelper {

	/**
	 * @var string
	 */
	private static $ocPath = null;
	/**
	 * @var string
	 */
	private static $baseUrl = null;
	/**
	 * @var string
	 */
	private static $adminUsername = null;
	/**
	 * @var string
	 */
	private static $adminPassword = null;

	/**
	 * creates a user
	 *
	 * @param string $userName
	 * @param string $password
	 * @param string $displayName
	 * @param string $email
	 *
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function createUser(
		$userName,
		$password,
		$displayName = null,
		$email = null
	) {
		$occCommand = ['user:add', '--password-from-env'];
		if ($displayName !== null) {
			$occCommand = \array_merge($occCommand, ["--display-name", $displayName]);
		}
		if ($email !== null) {
			$occCommand = \array_merge($occCommand, ["--email", $email]);
		}
		\putenv("OC_PASS=" . $password);
		return self::runOcc(\array_merge($occCommand, [$userName]));
	}

	/**
	 * deletes a user
	 *
	 * @param string $userName
	 *
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
	 *
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
	 *
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
	 *
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
	 *
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
	 *
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
		return \json_decode(self::runOcc(['group:list', '--output=json'])['stdOut']);
	}
	/**
	 *
	 * @param HookScope $scope
	 *
	 * @return array of suite context parameters
	 */
	public static function getSuiteParameters(HookScope $scope) {
		return $scope->getEnvironment()->getSuite()
			->getSettings() ['context'] ['parameters'];
	}

	/**
	 *
	 * @param string $adminUsername
	 * @param string $adminPassword
	 * @param string $baseUrl
	 * @param string $ocPath
	 *
	 * @return void
	 */
	public static function init($adminUsername, $adminPassword, $baseUrl, $ocPath) {
		foreach (\func_get_args() as $variableToCheck) {
			if (!\is_string($variableToCheck)) {
				throw new \InvalidArgumentException(
					"mandatory argument missing or wrong type ($variableToCheck => "
					. \gettype($variableToCheck) . ")"
				);
			}
		}
		self::$adminUsername = $adminUsername;
		self::$adminPassword = $adminPassword;
		self::$baseUrl = \rtrim($baseUrl, '/');
		self::$ocPath = '/' . \trim($ocPath, '/');
	}

	/**
	 *
	 * @return string path to the testing app occ endpoint
	 * @throws Exception if ocPath has not been set yet
	 */
	public static function getOcPath() {
		if (self::$ocPath === null) {
			throw new Exception(
				"getOcPath called before ocPath is set by init"
			);
		}

		return self::$ocPath;
	}

	/**
	 * enables an app
	 *
	 * @param string $appName
	 *
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function enableApp($appName) {
		return self::runOcc(['app:enable', $appName]);
	}

	/**
	 * disables an app
	 *
	 * @param string $appName
	 *
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function disableApp($appName) {
		return self::runOcc(['app:disable', $appName]);
	}

	/**
	 * checks if an app is currently enabled
	 *
	 * @param string $appName
	 *
	 * @return bool true if enabled, false if disabled or not existing
	 */
	public static function isAppEnabled($appName) {
		$result = self::runOcc(['app:list', '^' . $appName . '$']);
		return \strtolower(\substr($result['stdOut'], 0, 7)) === 'enabled';
	}

	/**
	 * lists app status (enabled or disabled)
	 *
	 * @param string $appName
	 *
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
	 *
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function runOcc($args) {
		if (self::$adminUsername === null
			|| self::$adminPassword === null
			|| self::$baseUrl === null
			|| self::$ocPath === null
		) {
			throw new Exception(
				"runOcc called before init"
			);
		}
		try {
			$result = OcsApiHelper::sendRequest(
				self::$baseUrl, self::$adminUsername,
				self::$adminPassword, "POST", self::$ocPath,
				['command' => \implode(' ', $args)]
			);
		} catch (ServerException $e) {
			throw new Exception(
				"Could not execute 'occ'. " .
				"Is the testing app installed and enabled?\n" .
				$e->getResponse()->getBody()
			);
		}

		$return = [];
		$return['code'] = $result->xml()->xpath("//ocs/data/code");
		$return['stdOut'] = $result->xml()->xpath("//ocs/data/stdOut");
		$return['stdErr'] = $result->xml()->xpath("//ocs/data/stdErr");

		if (!\is_a($return['code'][0], "SimpleXMLElement")
			|| !\is_a($return['stdOut'][0], "SimpleXMLElement")
			|| !\is_a($return['stdErr'][0], "SimpleXMLElement")
		) {
			throw new Exception(
				"Could not execute 'occ'. " .
				"Is the testing app installed and enabled?\n" .
				$result->getBody()
			);
		}
		$return['code'] = $return['code'][0]->__toString();
		$return['stdOut'] = $return['stdOut'][0]->__toString();
		$return['stdErr'] = $return['stdErr'][0]->__toString();
		return $return;
	}
}
