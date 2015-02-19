<?php
/**
 * Created by PhpStorm.
 * User: blizzz
 * Date: 11/02/15
 * Time: 15:29
 */

namespace OC\App;


class AppCache {
	/** @var  array $apps */
	private $apps = [];

	/** @var array $properties */
	private $properties = [];

	/**
	 * adds information on apps to the cache
	 *
	 * @param array $data
	 * @param $key
	 */
	public function addData(array $data, $key) {
		if(!is_string($key)) {
			throw new \InvalidArgumentException('String expected');
		}
		$this->properties[$key] = true;
		foreach($data as $appID => $value) {
			$this->apps[$appID][$key] = $value;
		}
	}

	/**
	 * reports whether a property of apps was indexed (e.g. enabled, types)
	 *
	 * @param $key
	 * @return bool
	 */
	public function isPropertyIndexed($key) {
		return isset($this->properties[$key]);
	}

	/**
	 * filters the indexed apps on the given property and returns the resulting
	 * subset
	 *
	 * @param $callback
	 * @param string $singleKey
	 * @return array $appID => $propertyValue
	 */
	public function filter($callback, $singleKey = '') {
		if(!is_callable($callback)) {
			throw new \InvalidArgumentException('Callback expected');
		}
		if(!is_string($singleKey)) {
			throw new \InvalidArgumentException('String expected');
		}
		$selection = [];
		foreach ($this->apps as $appID => $app) {
			if(call_user_func($callback, $app)) {
				if(!empty($singleKey) && isset($app[$singleKey])) {
					$selection[$appID] = $app[$singleKey];
				} else {
					$selection[$appID] = $app;
				}
			}
		}
		return $selection;
	}

	/**
	 * returns all appIDs and its values for the specified property
	 *
	 * @param $key
	 * @return array
	 */
	public function getWithPropertyValue($key) {
		if(!is_string($key)) {
			throw new \InvalidArgumentException('String expected');
		}
		return $this->filter(function() { return true; }, $key);
	}

}