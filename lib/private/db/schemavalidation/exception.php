<?php
/**
 * Copyright (c) 2014 Thomas Müller <thomas.mueller@tmit.eu>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\DB\SchemaValidation;

class Exception extends \Exception{

	/**
	 * @param array $violation which have been detected
	 */
	public function __construct($violation) {
		$this->violation = $violation;
	}

}
