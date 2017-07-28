<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <info@jankaritech.com>
 * @copyright 2017 Artur Neumann info@jankaritech.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace TestHelpers;

/**
 * Helper to setup UI / Integration tests
 * 
 * @author Artur Neumann <info@jankaritech.com>
 *
 */
class SetupHelper {
	/**
	 * creates a user
	 * 
	 * @param string $ocPath
	 * @param string $userName
	 * @param string $password
	 * @param string $displayName
	 * @param string $email
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function createUser(
		$ocPath,
		$userName,
		$password,
		$displayName = null,
		$email = null
	) {
		$occCommand = ['user:add', '--password-from-env'];
		if ($displayName !== null) {
			$occCommand = array_merge($occCommand, ["--display-name", $displayName]);
		}
		if ($email !== null) {
			$occCommand = array_merge($occCommand, ["--email", $email]);
		}
		putenv("OC_PASS=" . $password);
		return self::runOcc(array_merge($occCommand, [$userName]), $ocPath);
	}

	/**
	 * deletes a user
	 * 
	 * @param string $ocPath
	 * @param string $userName
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function deleteUser($ocPath, $userName) {
		return self::runOcc(['user:delete', $userName], $ocPath);
	}
	
	/**
	 * 
	 * @param string $ocPath
	 * @param string $userName
	 * @param string $app
	 * @param string $key
	 * @param string $value
	 * @return string[]
	 */
	public static function changeUserSetting(
		$ocPath, $userName, $app, $key, $value
	) {
		return self::runOcc(
			['user:setting', '--value ' . $value, $userName, $app, $key], $ocPath
		);
	}

	/**
	 * creates a group
	 * 
	 * @param string $ocPath
	 * @param string $groupName
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function createGroup($ocPath, $groupName) {
		return self::runOcc(['group:add', $groupName], $ocPath);
	}

	/**
	 * adds an existing user to a group, creating the group if it does not exist
	 * 
	 * @param string $ocPath
	 * @param string $groupName
	 * @param string $userName
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function addUserToGroup($ocPath, $groupName, $userName) {
		return self::runOcc(
			['group:add-member', '--member', $userName, $groupName], $ocPath
		);
	}

	/**
	 * removes a user from a group
	 * 
	 * @param string $ocPath
	 * @param string $groupName
	 * @param string $userName
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function removeUserFromGroup($ocPath, $groupName, $userName) {
		return self::runOcc(
			['group:remove-member', '--member', $userName, $groupName], $ocPath
		);
	}

	/**
	 * deletes a group
	 * 
	 * @param string $ocPath
	 * @param string $groupName
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function deleteGroup($ocPath, $groupName) {
		return self::runOcc(['group:delete', $groupName], $ocPath);
	}

	/**
	 * invokes an OCC command
	 *
	 * @param array $args anything behind "occ".
	 * For example: "files:transfer-ownership"
	 * @param string $ocPath
	 * @param string $escaping
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 */
	public static function runOcc($args, $ocPath, $escaping = true) {
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
			'php console.php ' . $args, $descriptor, $pipes, $ocPath
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
