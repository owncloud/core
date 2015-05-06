<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace OC\App\CodeChecker\Exception;

/**
 * Represents an error found by the code checker
 *
 * @package OC\App\CodeChecker\Exception
 */
class Error {
	/** @var int */
	private $line = 0;
	/** @var string */
	private $message = '';
	/** @var int */
	private $code = 0;
	/** @var string */
	private $disallowedToken;

	/**
	 * @return $this
	 */
	public function __construct() {
		return $this;
	}

	/**
	 * @param int $line
	 */
	public function addLine($line) {
		$this->line = $line;
	}

	/**
	 * @param string $message
	 */
	public function addMessage($message) {
		$this->message = $message;
	}

	/**
	 * @param int $code
	 */
	public function addCode($code) {
		$this->code = $code;
	}

	/**
	 * @param string $token
	 */
	public function addDisallowedToken($token) {
		$this->disallowedToken = $token;
	}

	/**
	 * @return int
	 */
	public function getLine() {
		return $this->line;
	}

	/**
	 * @return string
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * @return int
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * @return string
	 */
	public function getDisallowedToken() {
		return $this->disallowedToken;
	}

}
