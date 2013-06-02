<?php
/**
 * Created by JetBrains PhpStorm.
 * User: fp
 * Date: 01.06.13
 * Time: 00:06
 * To change this template use File | Settings | File Templates.
 */

namespace OCA\Files\External;

/**
 * Class Proxy
 * @package OCA\Files\External
 */
class Locks {

	const TIME_OUT = 10;

	private static $locks;

	public static $loaded = false;
	public static $lastLock = false;

	static public function init() {
		self::$locks = array();
		self::$loaded = true;
	}

	static public function addLock($path) {
		if(!isset(self::$locks[$path])) {
			self::$locks[$path] = true;
			self::$lastLock = time();
		}
	}

	static public function removeLock($path) {
		if(isset(self::$locks[$path])) {
			unset(self::$locks[$path]);
			self::$lastLock = time();
		}
	}

	static public function isLocked($path) {
		if(isset(self::$locks[$path])) {
			return true;
		} else {
			return false;
		}
	}

	static public function isTimeOutReached() {
		if(\OCA\Files\External\Locks::$lastLock === false) {
			return true;
		}

		$lastLockSeconds = time() - \OCA\Files\External\Locks::$lastLock;
		if($lastLockSeconds <= self::TIME_OUT) {
			return false;
		} else {
			return true;
		}

	}

}