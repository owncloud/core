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
use GuzzleHttp\Message\ResponseInterface;
use SimpleXMLElement;

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
		return \json_decode(
			self::runOcc(['group:list', '--output=json'])['stdOut']
		);
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
	 * Fixup OC path so that it always starts with a "/" and does not end with
	 * a "/".
	 *
	 * @param string $ocPath
	 *
	 * @return string
	 */
	private static function normaliseOcPath($ocPath) {
		return '/' . \trim($ocPath, '/');
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
	public static function init(
		$adminUsername, $adminPassword, $baseUrl, $ocPath
	) {
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
		self::$ocPath = self::normaliseOcPath($ocPath);
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
	 *
	 * @param string $baseUrl
	 * @param string $adminUsername
	 * @param string $adminPassword
	 *
	 * @return SimpleXMLElement
	 * @throws Exception
	 */
	public static function getSysInfo(
		$baseUrl, $adminUsername, $adminPassword
	) {
		$result = OcsApiHelper::sendRequest(
			$baseUrl, $adminUsername, $adminPassword, "GET",
			"/apps/testing/api/v1/sysinfo"
		);
		if ($result->getStatusCode() !== 200) {
			throw new \Exception(
				"could not get sysinfo " . $result->getReasonPhrase()
			);
		}
		return HttpRequestHelper::getResponseXml($result)->data;
	}

	/**
	 *
	 * @param string $baseUrl
	 * @param string $adminUsername
	 * @param string $adminPassword
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function getServerRoot(
		$baseUrl, $adminUsername, $adminPassword
	) {
		$sysInfo = self::getSysInfo(
			$baseUrl, $adminUsername, $adminPassword
		);
		return $sysInfo->server_root;
	}

	/**
	 * @param string|null $adminUsername
	 * @param string $callerName
	 *
	 * @return string
	 * @throws Exception
	 */
	private static function checkAdminUsername(
		$adminUsername, $callerName) {
		if (self::$adminUsername === null
			&& $adminUsername === null
		) {
			throw new Exception(
				"$callerName called without adminUsername - pass the username or call SetupHelper::init"
			);
		}
		if ($adminUsername === null) {
			$adminUsername = self::$adminUsername;
		}
		return $adminUsername;
	}

	/**
	 * @param string|null $adminPassword
	 * @param string $callerName
	 *
	 * @return string
	 * @throws Exception
	 */
	private static function checkAdminPassword(
		$adminPassword, $callerName) {
		if (self::$adminPassword === null
			&& $adminPassword === null
		) {
			throw new Exception(
				"$callerName called without adminPassword - pass the password or call SetupHelper::init"
			);
		}
		if ($adminPassword === null) {
			$adminPassword = self::$adminPassword;
		}
		return $adminPassword;
	}

	/**
	 * @param string|null $baseUrl
	 * @param string $callerName
	 *
	 * @return string
	 * @throws Exception
	 */
	private static function checkBaseUrl(
		$baseUrl, $callerName) {
		if (self::$baseUrl === null
			&& $baseUrl === null
		) {
			throw new Exception(
				"$callerName called without baseUrl - pass the baseUrl or call SetupHelper::init"
			);
		}
		if ($baseUrl === null) {
			$baseUrl = self::$baseUrl;
		}
		return $baseUrl;
	}

	/**
	 *
	 * @param string $dirPathFromServerRoot e.g. 'apps2/myapp/appinfo'
	 * @param string|null $baseUrl
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function mkDirOnServer(
		$dirPathFromServerRoot,
		$baseUrl = null,
		$adminUsername = null,
		$adminPassword = null
	) {
		$baseUrl = self::checkBaseUrl($baseUrl, "mkDirOnServer");
		$adminUsername = self::checkAdminUsername($adminUsername, "mkDirOnServer");
		$adminPassword = self::checkAdminPassword($adminPassword, "mkDirOnServer");
		$result = OcsApiHelper::sendRequest(
			$baseUrl, $adminUsername, $adminPassword, "POST",
			"/apps/testing/api/v1/dir",
			['dir' => $dirPathFromServerRoot]
		);

		if ($result->getStatusCode() !== 200) {
			throw new \Exception(
				"could not create directory $dirPathFromServerRoot " . $result->getReasonPhrase()
			);
		}
	}

	/**
	 *
	 * @param string $dirPathFromServerRoot e.g. 'apps2/myapp/appinfo'
	 * @param string|null $baseUrl
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function rmDirOnServer(
		$dirPathFromServerRoot,
		$baseUrl = null,
		$adminUsername = null,
		$adminPassword = null
	) {
		$baseUrl = self::checkBaseUrl($baseUrl, "rmDirOnServer");
		$adminUsername = self::checkAdminUsername($adminUsername, "rmDirOnServer");
		$adminPassword = self::checkAdminPassword($adminPassword, "rmDirOnServer");
		$result = OcsApiHelper::sendRequest(
			$baseUrl, $adminUsername, $adminPassword, "DELETE",
			"/apps/testing/api/v1/dir",
			['dir' => $dirPathFromServerRoot]
		);

		if ($result->getStatusCode() !== 200) {
			throw new \Exception(
				"could not delete directory $dirPathFromServerRoot " . $result->getReasonPhrase()
			);
		}
	}

	/**
	 *
	 * @param string $filePathFromServerRoot e.g. 'app2/myapp/appinfo/info.xml'
	 * @param string $content
	 * @param string|null $baseUrl
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function createFileOnServer(
		$filePathFromServerRoot,
		$content,
		$baseUrl = null,
		$adminUsername = null,
		$adminPassword = null
	) {
		$baseUrl = self::checkBaseUrl($baseUrl, "createFileOnServer");
		$adminUsername = self::checkAdminUsername($adminUsername, "createFileOnServer");
		$adminPassword = self::checkAdminPassword($adminPassword, "createFileOnServer");
		$result = OcsApiHelper::sendRequest(
			$baseUrl, $adminUsername, $adminPassword, "POST",
			"/apps/testing/api/v1/file",
			[
				'file' => $filePathFromServerRoot,
				'content' => $content
			]
		);

		if ($result->getStatusCode() !== 200) {
			throw new \Exception(
				"could not create file $filePathFromServerRoot " . $result->getReasonPhrase()
			);
		}
	}

	/**
	 *
	 * @param string $filePathFromServerRoot e.g. 'app2/myapp/appinfo/info.xml'
	 * @param string|null $baseUrl
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function deleteFileOnServer(
		$filePathFromServerRoot,
		$baseUrl = null,
		$adminUsername = null,
		$adminPassword = null
	) {
		$baseUrl = self::checkBaseUrl($baseUrl, "deleteFileOnServer");
		$adminUsername = self::checkAdminUsername($adminUsername, "deleteFileOnServer");
		$adminPassword = self::checkAdminPassword($adminPassword, "deleteFileOnServer");
		$result = OcsApiHelper::sendRequest(
			$baseUrl, $adminUsername, $adminPassword, "DELETE",
			"/apps/testing/api/v1/file",
			[
				'file' => $filePathFromServerRoot
			]
		);

		if ($result->getStatusCode() !== 200) {
			throw new \Exception(
				"could not delete file $filePathFromServerRoot " . $result->getReasonPhrase()
			);
		}
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
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 * @param string|null $baseUrl
	 * @param string|null $ocPath
	 * @param array|null $envVariables
	 *
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 * @throws Exception if parameters have not been provided yet or the testing app is not enabled
	 */
	public static function runOcc(
		$args,
		$adminUsername = null,
		$adminPassword = null,
		$baseUrl = null,
		$ocPath = null,
		$envVariables = null
	) {
		$baseUrl = self::checkBaseUrl($baseUrl, "runOcc");
		$adminUsername = self::checkAdminUsername($adminUsername, "runOcc");
		$adminPassword = self::checkAdminPassword($adminPassword, "runOcc");
		if (self::$ocPath === null
			&& $ocPath === null
		) {
			throw new Exception(
				"runOcc called without ocPath - pass the ocPath or call SetupHelper::init"
			);
		}
		if ($ocPath === null) {
			$ocPath = self::$ocPath;
		} else {
			$ocPath = self::normaliseOcPath($ocPath);
		}

		$body = [];
		$body['command'] = \implode(' ', $args);

		if ($envVariables !== null) {
			$body['env_variables'] = $envVariables;
		}

		try {
			$result = OcsApiHelper::sendRequest(
				$baseUrl, $adminUsername, $adminPassword,
				"POST", $ocPath, $body
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
		self::resetOpcache($baseUrl, $adminUsername, $adminPassword);
		return $return;
	}

	/**
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 *
	 * @return ResponseInterface
	 */
	public static function resetOpcache(
		$baseUrl,
		$user,
		$password
	) {
		try {
			return OcsApiHelper::sendRequest(
				$baseUrl, $user,
				$password, "DELETE", "/apps/testing/api/v1/opcache"
			);
		} catch (ServerException $e) {
			echo "could not reset opcache, if tests fail try to set " .
				"'opcache.revalidate_freq=0' in the php.ini file\n";
		}
	}

	/**
	 * Create local storage mount
	 *
	 * @param string $mount (name of local storage mount)
	 *
	 * @return integer
	 */
	public static function createLocalStorageMount($mount) {
		$mountPath = TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER . "/$mount";
		SetupHelper::mkDirOnServer($mountPath);
		// files_external:create requires absolute path
		$serverRoot = self::getServerRoot(
			self::$baseUrl,
			self::$adminUsername,
			self::$adminPassword
		);
		$result = self::runOcc(
			[
				'files_external:create',
				$mount,
				'local',
				'null::null',
				'-c',
				'datadir=' . $serverRoot . '/' . $mountPath
			]
		);
		// stdOut should have a string like "Storage created with id 65"
		$storageIdWords = \explode(" ", \trim($result['stdOut']));
		$storageId = (int)$storageIdWords[4];
		return $storageId;
	}
}
