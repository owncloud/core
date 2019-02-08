<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OC\Files\External;

use phpseclib\Crypt\AES;
use \OCP\Files\External\IStorageConfig;
use \OCP\Files\External\Backend\Backend;
use \OCP\Files\StorageNotAvailableException;

/**
 * Utility class with legacy implementation that used to be
 * in OC_Mount_Config.
 *
 * Can be removed once all consumers of this private APIs are moved
 * to the public ones.
 */
class LegacyUtil {
	const MOUNT_TYPE_GLOBAL = 'global';
	const MOUNT_TYPE_GROUP = 'group';
	const MOUNT_TYPE_USER = 'user';
	const MOUNT_TYPE_PERSONAL = 'personal';

	// whether to skip backend test (for unit tests, as this static class is not mockable)
	public static $skipTest = false;

	/**
	 * Returns the mount points for the given user.
	 * The mount point is relative to the data directory.
	 *
	 * @param string $uid user
	 * @return array of mount point string as key, mountpoint config as value
	 *
	 * @deprecated 8.2.0 use IUserGlobalStoragesService::getStorages() and IUserStoragesService::getStorages()
	 */
	public static function getAbsoluteMountPoints($uid) {
		$mountPoints = [];

		$userGlobalStoragesService = \OC::$server->getUserGlobalStoragesService();
		$userStoragesService = \OC::$server->getUserStoragesService();
		$user = \OC::$server->getUserManager()->get($uid);

		$userGlobalStoragesService->setUser($user);
		$userStoragesService->setUser($user);

		foreach ($userGlobalStoragesService->getStorages() as $storage) {
			/** @var IStorageConfig $storage */
			$mountPoint = '/'.$uid.'/files'.$storage->getMountPoint();
			$mountEntry = self::prepareMountPointEntry($storage, false);
			foreach ($mountEntry['options'] as &$option) {
				$option = self::setUserVars($user->getUserName(), $option);
			}
			$mountPoints[$mountPoint] = $mountEntry;
		}

		foreach ($userStoragesService->getStorages() as $storage) {
			$mountPoint = '/'.$uid.'/files'.$storage->getMountPoint();
			$mountEntry = self::prepareMountPointEntry($storage, true);
			foreach ($mountEntry['options'] as &$option) {
				$option = self::setUserVars($user->getUserName(), $option);
			}
			$mountPoints[$mountPoint] = $mountEntry;
		}

		$userGlobalStoragesService->resetUser();
		$userStoragesService->resetUser();

		return $mountPoints;
	}

	/**
	 * Get the system mount points
	 *
	 * @return array
	 *
	 * @deprecated 8.2.0 use IGlobalStoragesService::getStorages()
	 */
	public static function getSystemMountPoints() {
		$mountPoints = [];
		$service = \OC::$server->getGlobalStoragesService();

		foreach ($service->getStorages() as $storage) {
			$mountPoints[] = self::prepareMountPointEntry($storage, false);
		}

		return $mountPoints;
	}

	/**
	 * Get the personal mount points of the current user
	 *
	 * @return array
	 *
	 * @deprecated 8.2.0 use IUserStoragesService::getStorages()
	 */
	public static function getPersonalMountPoints() {
		$mountPoints = [];
		$service = \OC::$server->getUserStoragesService();

		foreach ($service->getStorages() as $storage) {
			$mountPoints[] = self::prepareMountPointEntry($storage, true);
		}

		return $mountPoints;
	}

	/**
	 * Convert a IStorageConfig to the legacy mountPoints array format
	 * There's a lot of extra information in here, to satisfy all of the legacy functions
	 *
	 * @param IStorageConfig $storage
	 * @param bool $isPersonal
	 * @return array
	 */
	private static function prepareMountPointEntry(IStorageConfig $storage, $isPersonal) {
		$mountEntry = [];

		$mountEntry['mountpoint'] = \substr($storage->getMountPoint(), 1); // remove leading slash
		$mountEntry['class'] = $storage->getBackend()->getIdentifier();
		$mountEntry['backend'] = $storage->getBackend()->getText();
		$mountEntry['authMechanism'] = $storage->getAuthMechanism()->getIdentifier();
		$mountEntry['personal'] = $isPersonal;
		$mountEntry['options'] = self::decryptPasswords($storage->getBackendOptions());
		$mountEntry['mountOptions'] = $storage->getMountOptions();
		$mountEntry['priority'] = $storage->getPriority();
		$mountEntry['applicable'] = [
			'groups' => $storage->getApplicableGroups(),
			'users' => $storage->getApplicableUsers(),
		];
		// if mountpoint is applicable to all users the old API expects ['all']
		if (empty($mountEntry['applicable']['groups']) && empty($mountEntry['applicable']['users'])) {
			$mountEntry['applicable']['users'] = ['all'];
		}

		$mountEntry['id'] = $storage->getId();

		return $mountEntry;
	}

	/**
	 * fill in the correct values for $user
	 *
	 * @param string $user user value
	 * @param string|array $input
	 * @return string
	 */
	public static function setUserVars($user, $input) {
		if (\is_array($input)) {
			foreach ($input as $key => $value) {
				if (\is_string($value)) {
					$input[$key] = \str_replace('$user', $user, $value);
				}
			}
		} else {
			if (\is_string($input)) {
				$input = \str_replace('$user', $user, $input);
			}
		}
		return $input;
	}

	/**
	 * Test connecting using the given backend configuration
	 *
	 * @param string $class backend class name
	 * @param array $options backend configuration options
	 * @param boolean $isPersonal
	 * @return int see self::STATUS_*
	 * @throws Exception
	 */
	public static function getBackendStatus($class, $options, $isPersonal, $testOnly = true) {
		if (self::$skipTest) {
			return StorageNotAvailableException::STATUS_SUCCESS;
		}
		$user = \OC::$server->getUserSession()->getUser();
		if ($user) {
			foreach ($options as $key => $option) {
				$options[$key] = self::setUserVars($user->getUserName(), $option);
			}
		}
		if (\class_exists($class)) {
			try {
				/** @var \OC\Files\Storage\Common $storage */
				$storage = new $class($options);

				try {
					$result = $storage->test($isPersonal, $testOnly);
					$storage->setAvailability($result);
					if ($result) {
						return StorageNotAvailableException::STATUS_SUCCESS;
					}
				} catch (\Exception $e) {
					$storage->setAvailability(false);
					throw $e;
				}
			} catch (\Exception $exception) {
				\OCP\Util::logException('files_external', $exception);
				throw $exception;
			}
		}
		return StorageNotAvailableException::STATUS_ERROR;
	}

	/**
	 * Read the mount points in the config file into an array
	 *
	 * @param string|null $user If not null, personal for $user, otherwise system
	 * @return array
	 */
	public function readData($user = null) {
		if (isset($user)) {
			$jsonFile = \OC::$server->getUserManager()->get($user)->getHome() . '/mount.json';
		} else {
			$config = \OC::$server->getConfig();
			$datadir = $config->getSystemValue('datadirectory', \OC::$SERVERROOT . '/data/');
			$jsonFile = $config->getSystemValue('mount_file', $datadir . '/mount.json');
		}
		if (\is_file($jsonFile)) {
			$mountPoints = \json_decode(\file_get_contents($jsonFile), true);
			if (\is_array($mountPoints)) {
				return $mountPoints;
			}
		}
		return [];
	}

	/**
	 * Encrypt passwords in the given config options
	 *
	 * @param array $options mount options
	 * @return array updated options
	 */
	public static function encryptPasswords($options) {
		if (isset($options['password'])) {
			$options['password_encrypted'] = self::encryptPassword($options['password']);
			// do not unset the password, we want to keep the keys order
			// on load... because that's how the UI currently works
			$options['password'] = '';
		}
		return $options;
	}

	/**
	 * Decrypt passwords in the given config options
	 *
	 * @param array $options mount options
	 * @return array updated options
	 */
	public static function decryptPasswords($options) {
		// note: legacy options might still have the unencrypted password in the "password" field
		if (isset($options['password_encrypted'])) {
			$options['password'] = self::decryptPassword($options['password_encrypted']);
			unset($options['password_encrypted']);
		}
		return $options;
	}

	/**
	 * Encrypt a single password
	 *
	 * @param string $password plain text password
	 * @return string encrypted password
	 */
	private static function encryptPassword($password) {
		$cipher = self::getCipher();
		$iv = \OCP\Util::generateRandomBytes(16);
		$cipher->setIV($iv);
		return \base64_encode($iv . $cipher->encrypt($password));
	}

	/**
	 * Decrypts a single password
	 *
	 * @param string $encryptedPassword encrypted password
	 * @return string plain text password
	 */
	private static function decryptPassword($encryptedPassword) {
		$cipher = self::getCipher();
		$binaryPassword = \base64_decode($encryptedPassword);
		$iv = \substr($binaryPassword, 0, 16);
		$cipher->setIV($iv);
		$binaryPassword = \substr($binaryPassword, 16);
		return $cipher->decrypt($binaryPassword);
	}

	/**
	 * Returns the encryption cipher
	 *
	 * @return AES
	 */
	private static function getCipher() {
		$cipher = new AES(AES::MODE_CBC);
		$cipher->setKey(\OC::$server->getConfig()->getSystemValue('passwordsalt', null));
		return $cipher;
	}

	/**
	 * Computes a hash based on the given configuration.
	 * This is mostly used to find out whether configurations
	 * are the same.
	 *
	 * @param array $config
	 * @return string
	 */
	public static function makeConfigHash($config) {
		$data = \json_encode(
			[
				'c' => $config['backend'],
				'a' => $config['authMechanism'],
				'm' => $config['mountpoint'],
				'o' => $config['options'],
				'p' => isset($config['priority']) ? $config['priority'] : -1,
				'mo' => isset($config['mountOptions']) ? $config['mountOptions'] : [],
			]
		);
		return \hash('md5', $data);
	}
}
