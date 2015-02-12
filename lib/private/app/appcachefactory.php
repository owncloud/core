<?php
/**
 * Created by PhpStorm.
 * User: blizzz
 * Date: 11/02/15
 * Time: 15:48
 */

namespace OC\App;

/**
 * Class AppCacheFactory
 *
 * @package OC\App
 */
class AppCacheFactory {

	/**
	 * returns a new and shiny instance of AppCache
	 *
	 * @return AppCache
	 */
	public function get() {
		return new AppCache();
	}
}