<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
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

namespace OCP\Files\External;

/**
 * Parameter for an external storage definition
 *
 * @since 10.0
 */
class DefinitionParameter implements \JsonSerializable {

	/** Value constants */
	const VALUE_TEXT = 0;
	const VALUE_BOOLEAN = 1;
	const VALUE_PASSWORD = 2;
	const VALUE_HIDDEN = 3;

	/** Flag constants */
	const FLAG_NONE = 0;
	const FLAG_OPTIONAL = 1;
	const FLAG_USER_PROVIDED = 2;

	/** @var string name of parameter */
	private $name;

	/** @var string human-readable parameter text */
	private $text;

	/** @var int value type, see self::VALUE_* constants */
	private $type = self::VALUE_TEXT;

	/** @var int flags, see self::FLAG_* constants */
	private $flags = self::FLAG_NONE;

	/**
	 * @param string $name
	 * @param string $text
	 * @since 10.0
	 */
	public function __construct($name, $text) {
		$this->name = $name;
		$this->text = $text;
	}

	/**
	 * @return string
	 * @since 10.0
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return string
	 * @since 10.0
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * Get value type
	 *
	 * @return int
	 * @since 10.0
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Set value type
	 *
	 * @param int $type
	 * @return self
	 * @since 10.0
	 */
	public function setType($type) {
		$this->type = $type;
		return $this;
	}

	/**
	 * @return string
	 * @since 10.0
	 */
	public function getTypeName() {
		switch ($this->type) {
			case self::VALUE_BOOLEAN:
				return 'boolean';
			case self::VALUE_TEXT:
				return 'text';
			case self::VALUE_PASSWORD:
				return 'password';
			default:
				return 'unknown';
		}
	}

	/**
	 * @return int
	 * @since 10.0
	 */
	public function getFlags() {
		return $this->flags;
	}

	/**
	 * @param int $flags
	 * @return self
	 * @since 10.0
	 */
	public function setFlags($flags) {
		$this->flags = $flags;
		return $this;
	}

	/**
	 * @param int $flag
	 * @return self
	 * @since 10.0
	 */
	public function setFlag($flag) {
		$this->flags |= $flag;
		return $this;
	}

	/**
	 * @param int $flag
	 * @return bool
	 * @since 10.0
	 */
	public function isFlagSet($flag) {
		return (bool)($this->flags & $flag);
	}

	/**
	 * Serialize into JSON for client-side JS
	 *
	 * @return string
	 * @since 10.0
	 */
	public function jsonSerialize() {
		return [
			'value' => $this->getText(),
			'flags' => $this->getFlags(),
			'type' => $this->getType()
		];
	}

	/**
	 * Returns whether the parameter is optional
	 *
	 * @return bool true if optional, false otherwise
	 * @since 10.0
	 */
	public function isOptional() {
		return $this->isFlagSet(self::FLAG_OPTIONAL) || $this->isFlagSet(self::FLAG_USER_PROVIDED);
	}

	/**
	 * Validate a parameter value against this
	 * Convert type as necessary
	 *
	 * @param mixed $value Value to check
	 * @return bool success
	 * @since 10.0
	 */
	public function validateValue(&$value) {
		switch ($this->getType()) {
			case self::VALUE_BOOLEAN:
				if (!\is_bool($value)) {
					switch ($value) {
						case 'true':
							$value = true;
							break;
						case 'false':
							$value = false;
							break;
						default:
							return false;
					}
				}
				break;
			default:
				if (!$value && !$this->isOptional()) {
					return false;
				}
				break;
		}
		return true;
	}
}
