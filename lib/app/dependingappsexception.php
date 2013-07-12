<?php
/**
 * Copyright (c) 2013 Christopher Schäpers <christopher@schaepers.it>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\App;

class DependingAppsException extends \Exception {
	private $dependent;

	public function __construct($dependent){
		$this->dependent = $dependent;
	}

	public function getDependent() {
		return $this->dependent;
	}
}
