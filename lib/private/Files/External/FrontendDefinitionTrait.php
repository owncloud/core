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

namespace OC\Files\External;

use OCP\Files\External\DefinitionParameter;
use OCP\Files\External\IStorageConfig;

/**
 * Trait for objects that have a frontend representation
 */
trait FrontendDefinitionTrait {

	/** @var string human-readable mechanism name */
	private $text;

	/** @var DefinitionParameter[] parameters for mechanism */
	private $parameters = [];

	/** @var string[] custom JS */
	private $customJs = [];

	/**
	 * @return string
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * @param string $text
	 * @return self
	 */
	public function setText($text) {
		$this->text = $text;
		return $this;
	}

	/**
	 * @param FrontendDefinitionTrait $a
	 * @param FrontendDefinitionTrait $b
	 * @return int
	 */
	public static function lexicalCompare(FrontendDefinitionTrait $a, FrontendDefinitionTrait $b) {
		return \strcmp($a->getText(), $b->getText());
	}

	/**
	 * @return DefinitionParameter[]
	 */
	public function getParameters() {
		return $this->parameters;
	}

	/**
	 * @param DefinitionParameter[] $parameters
	 * @return self
	 */
	public function addParameters(array $parameters) {
		foreach ($parameters as $parameter) {
			$this->addParameter($parameter);
		}
		return $this;
	}

	/**
	 * @param DefinitionParameter $parameter
	 * @return self
	 */
	public function addParameter(DefinitionParameter $parameter) {
		$this->parameters[$parameter->getName()] = $parameter;
		return $this;
	}

	/**
	 * @return string[]
	 */
	public function getCustomJs() {
		return $this->customJs;
	}

	/**
	 * @param string $custom
	 * @return self
	 */
	public function addCustomJs($custom) {
		$this->customJs[] = $custom;
		return $this;
	}

	/**
	 * @param string $custom
	 * @return self
	 * @deprecated 9.1.0, use addCustomJs() instead
	 */
	public function setCustomJs($custom) {
		$this->customJs = [$custom];
		return $this;
	}

	/**
	 * Serialize into JSON for client-side JS
	 *
	 * @return array
	 */
	public function jsonSerializeDefinition() {
		$configuration = [];
		foreach ($this->getParameters() as $parameter) {
			$configuration[$parameter->getName()] = $parameter;
		}

		$data = [
			'name' => $this->getText(),
			'configuration' => $configuration,
			'custom' => $this->getCustomJs(),
		];
		return $data;
	}

	/**
	 * Check if parameters are satisfied in a IStorageConfig
	 *
	 * @param IStorageConfig $storage
	 * @return bool
	 */
	public function validateStorageDefinition(IStorageConfig $storage) {
		foreach ($this->getParameters() as $name => $parameter) {
			$value = $storage->getBackendOption($name);
			if ($value !== null || !$parameter->isOptional()) {
				if (!$parameter->validateValue($value)) {
					return false;
				}
				if (($name === 'public_key') || ($name === 'private_key')) {
					$storage->setBackendOption($name, \base64_encode($value));
				} else {
					$storage->setBackendOption($name, $value);
				}
			}
		}
		return true;
	}
}
