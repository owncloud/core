<?php
/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Hooks;

class PublicEmitter extends BasicEmitter {
	/**
	 * @param string $scope
	 * @param string $method
	 * @param array $arguments optional
	 * @param bool $abortable optional Defines whether the hook is abortable or not
	 * @return bool true if not aborted, false otherwise
	 */
	public function emit($scope, $method, $arguments = array(), $abortable = false) {
		return parent::emit($scope, $method, $arguments, $abortable);
	}
}
