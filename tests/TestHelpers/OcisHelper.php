<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author    Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2020 Artur Neumann artur@jankaritech.com
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

use Exception;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class OcisHelper
 *
 * Helper functions that are needed to run tests on OCIS
 *
 * @package TestHelpers
 */
class OcisHelper {
	/**
	 * @return bool
	 */
	public static function isTestingOnOcis():bool {
		return (\getenv("TEST_OCIS") === "true");
	}

	/**
	 * @return bool
	 */
	public static function isTestingOnReva():bool {
		return (\getenv("TEST_REVA") === "true");
	}

	/**
	 * @return bool
	 */
	public static function isTestingOnOcisOrReva():bool {
		return (self::isTestingOnOcis() || self::isTestingOnReva());
	}

	/**
	 * @return bool
	 */
	public static function isTestingOnOc10():bool {
		return (!self::isTestingOnOcisOrReva());
	}

	/**
	 * @return bool
	 */
	public static function isTestingParallelDeployment(): bool {
		return (\getenv("TEST_PARALLEL_DEPLOYMENT") === "true");
	}

	/**
	 * @return bool
	 */
	public static function isTestingWithGraphApi(): bool {
		return \getenv('TEST_WITH_GRAPH_API') === 'true';
	}

	/**
	 * @return bool|string false if no command given or the command as string
	 */
	public static function getDeleteUserDataCommand() {
		$cmd = \getenv("DELETE_USER_DATA_CMD");
		if ($cmd === false || \trim($cmd) === "") {
			return false;
		}
		return $cmd;
	}

	/**
	 * @return string
	 * @throws Exception
	 */
	public static function getStorageDriver():string {
		$storageDriver = (\getenv("STORAGE_DRIVER"));
		if ($storageDriver === false) {
			return "OWNCLOUD";
		}
		$storageDriver = \strtoupper($storageDriver);
		if ($storageDriver !== "OCIS" && $storageDriver !== "EOS" && $storageDriver !== "OWNCLOUD" && $storageDriver !== "S3NG") {
			throw new Exception(
				"Invalid storage driver. " .
				"STORAGE_DRIVER must be OCIS|EOS|OWNCLOUD|S3NG"
			);
		}
		return $storageDriver;
	}

	/**
	 * @param string|null $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function deleteRevaUserData(?string $user = ""):void {
		$deleteCmd = self::getDeleteUserDataCommand();
		if ($deleteCmd === false) {
			if (self::getStorageDriver() === "OWNCLOUD") {
				self::recurseRmdir(self::getOcisRevaDataRoot() . $user);
			}
			return;
		}
		if (self::getStorageDriver() === "EOS") {
			$deleteCmd = \str_replace(
				"%s",
				$user[0] . '/' . $user,
				$deleteCmd
			);
		} else {
			$deleteCmd = \sprintf($deleteCmd, $user);
		}
		\exec($deleteCmd);
	}

	/**
	 * Helper for Recursive Copy of file/folder
	 * For more info check this out https://gist.github.com/gserrano/4c9648ec9eb293b9377b
	 *
	 * @param string|null $source
	 * @param string|null $destination
	 *
	 * @return void
	 */
	public static function recurseCopy(?string $source, ?string $destination):void {
		$dir = \opendir($source);
		@\mkdir($destination);
		while (($file = \readdir($dir)) !== false) {
			if (($file != '.') && ($file != '..')) {
				if (\is_dir($source . '/' . $file)) {
					self::recurseCopy($source . '/' . $file, $destination . '/' . $file);
				} else {
					\copy($source . '/' . $file, $destination . '/' . $file);
				}
			}
		}
		\closedir($dir);
	}

	/**
	 * Helper for Recursive Upload of file/folder
	 *
	 * @param string|null $baseUrl
	 * @param string|null $source
	 * @param string|null $userId
	 * @param string|null $password
	 * @param string|null $xRequestId
	 * @param string|null $destination
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function recurseUpload(
		?string $baseUrl,
		?string $source,
		?string $userId,
		?string $password,
		?string $xRequestId = '',
		?string $destination = ''
	):void {
		if ($destination !== '') {
			$response = WebDavHelper::makeDavRequest(
				$baseUrl,
				$userId,
				$password,
				"MKCOL",
				$destination,
				[],
				$xRequestId
			);
			if ($response->getStatusCode() !== 201) {
				throw new Exception("Could not create folder destination" . $response->getBody()->getContents());
			}
		}

		$dir = \opendir($source);
		while (($file = \readdir($dir)) !== false) {
			if (($file != '.') && ($file != '..')) {
				$sourcePath = $source . '/' . $file;
				$destinationPath = $destination . '/' . $file;
				if (\is_dir($sourcePath)) {
					self::recurseUpload(
						$baseUrl,
						$sourcePath,
						$userId,
						$password,
						$xRequestId,
						$destinationPath
					);
				} else {
					$response = UploadHelper::upload(
						$baseUrl,
						$userId,
						$password,
						$sourcePath,
						$destinationPath,
						$xRequestId
					);
					$responseStatus = $response->getStatusCode();
					if ($responseStatus !== 201) {
						throw new Exception(
							"Could not upload skeleton file $sourcePath to $destinationPath for user '$userId' status '$responseStatus' response body: '"
							. $response->getBody()->getContents() . "'"
						);
					}
				}
			}
		}
		\closedir($dir);
	}

	/**
	 * @return int
	 */
	public static function getLdapPort():int {
		$port = \getenv("REVA_LDAP_PORT");
		return $port ? (int)$port : 636;
	}

	/**
	 * @return bool
	 */
	public static function useSsl():bool {
		$useSsl = \getenv("REVA_LDAP_USESSL");
		if ($useSsl === false) {
			return (self::getLdapPort() === 636);
		} else {
			return $useSsl === "true";
		}
	}

	/**
	 * @return string
	 */
	public static function getBaseDN():string {
		$dn = \getenv("REVA_LDAP_BASE_DN");
		return $dn ? $dn : "dc=owncloud,dc=com";
	}

	/**
	 * @return string
	 */
	public static function getGroupsOU():string {
		$ou = \getenv("REVA_LDAP_GROUPS_OU");
		return $ou ? $ou : "TestGroups";
	}

	/**
	 * @return string
	 */
	public static function getUsersOU():string {
		$ou = \getenv("REVA_LDAP_USERS_OU");
		return $ou ? $ou : "TestUsers";
	}

	/**
	 * @return string
	 */
	public static function getGroupSchema():string {
		$schema = \getenv("REVA_LDAP_GROUP_SCHEMA");
		return $schema ? $schema : "rfc2307";
	}
	/**
	 * @return string
	 */
	public static function getHostname():string {
		$hostname = \getenv("REVA_LDAP_HOSTNAME");
		return $hostname ? $hostname : "localhost";
	}

	/**
	 * @return string
	 */
	public static function getBindDN():string {
		$dn = \getenv("REVA_LDAP_BIND_DN");
		return $dn ? $dn : "cn=admin,dc=owncloud,dc=com";
	}

	/**
	 * @return string
	 */
	public static function getBindPassword():string {
		$pw = \getenv("REVA_LDAP_BIND_PASSWORD");
		return $pw ? $pw : "";
	}

	/**
	 * @return string
	 */
	private static function getOcisRevaDataRoot():string {
		$root = \getenv("OCIS_REVA_DATA_ROOT");
		if (($root === false || $root === "") && self::isTestingOnOcisOrReva()) {
			$root = "/var/tmp/ocis/owncloud/";
		}
		if (!\file_exists($root)) {
			echo "WARNING: reva data root folder ($root) does not exist\n";
		}
		return $root;
	}

	/**
	 * @param string|null $dir
	 *
	 * @return bool
	 */
	private static function recurseRmdir(?string $dir):bool {
		if (\file_exists($dir) === true) {
			$files = \array_diff(\scandir($dir), ['.', '..']);
			foreach ($files as $file) {
				if (\is_dir("$dir/$file")) {
					self::recurseRmdir("$dir/$file");
				} else {
					\unlink("$dir/$file");
				}
			}
			return \rmdir($dir);
		}
		return true;
	}

	/**
	 * On Eos storage backend when the user data is cleared after test run
	 * Running another test immediately fails. So Send this request to create user home directory
	 *
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $xRequestId
	 *
	 * @return void
	 * @throws GuzzleException
	 */
	public static function createEOSStorageHome(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $xRequestId = ''
	):void {
		HttpRequestHelper::get(
			$baseUrl . "/ocs/v2.php/apps/notifications/api/v1/notifications",
			$xRequestId,
			$user,
			$password
		);
	}

	/**
	 *
	 * @param string $selector
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function validateOCSelector(string $selector): void {
		$selectorOptions = ["oc10", "ocis"];
		if (!\in_array($selector, $selectorOptions)) {
			throw new Exception("Invalid selector '$selector'. Please provide one of these ['$selectorOptions[0]', '$selectorOptions[1]']");
		};
	}

	/**
	 * @return string
	 */
	public static function getOCSelectorGivenStep(): string {
		$selector = \getenv("GIVEN_OC_SELECTOR");
		$selector = $selector ? \strtolower($selector) : "oc10";
		OcisHelper::validateOCSelector($selector);

		return $selector;
	}

	/**
	 * @return string
	 */
	public static function getOCSelectorWhenStep(): string {
		$selector = \getenv("WHEN_OC_SELECTOR");
		$selector = $selector ? \strtolower($selector) : "ocis";
		OcisHelper::validateOCSelector($selector);

		return $selector;
	}

	/**
	 * @return string
	 */
	public static function getOCSelectorThenStep(): string {
		$selector = \getenv("THEN_OC_SELECTOR");
		$selector = $selector ? \strtolower($selector) : "ocis";
		self::validateOCSelector($selector);

		return $selector;
	}

	/**
	 * @param string $step
	 *
	 * @return string
	 */
	public static function getOCSelectorForStep(string $step): string {
		switch ($step) {
			case "Given":
				return self::getOCSelectorGivenStep();
				break;
			case "When":
				return self::getOCSelectorWhenStep();
				break;
			case "Then":
				return self::getOCSelectorThenStep();
				break;
			default:
				throw new Exception("Unknown step name '$step'");
		}
	}
}
