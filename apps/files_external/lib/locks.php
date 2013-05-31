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

	private static $locks;

	public static $loaded = false;

	static public function init() {
		self::$locks = array();
		self::$loaded = true;
	}

	static public function addLock($path) {
		if(!isset(self::$locks[$path])) {
			self::$locks[$path] = true;
		}
	}

	static public function removeLock($path) {
		if(isset(self::$locks[$path])) {
			unset(self::$locks[$path]);
		}
	}

	static public function isLocked($path) {
		if(isset(self::$locks[$path])) {
			return true;
		} else {
			return false;
		}
	}

}