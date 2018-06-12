<?php
/**
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

namespace OCP\Files\External\Backend;

use OC\Files\External\VisibilityTrait;
use OC\Files\External\FrontendDefinitionTrait;
use OC\Files\External\PriorityTrait;
use OC\Files\External\DependencyTrait;
use OC\Files\External\StorageModifierTrait;
use OC\Files\External\IdentifierTrait;
use OCP\Files\External\Auth\AuthMechanism;
use OCP\Files\External\IStorageConfig;

/**
 * Storage backend
 *
 * A backend can have services injected during construction,
 * such as \OCP\IDB for database operations. This allows a backend
 * to perform advanced operations based on provided information.
 *
 * An authenication scheme defines the parameter interface, common to the
 * storage implementation, the backend and the authentication mechanism.
 * A storage implementation expects parameters according to the authentication
 * scheme, which are provided from the authentication mechanism.
 *
 * This class uses the following traits:
 *  - VisibilityTrait
 *      Restrict usage to admin-only/none
 *  - FrontendDefinitionTrait
 *      Specify configuration parameters and other definitions
 *  - PriorityTrait
 *      Allow objects to prioritize over others with the same mountpoint
 *  - DependencyTrait
 *      The object requires certain dependencies to be met
 *  - StorageModifierTrait
 *      Object can affect storage mounting
 *
 * @since 10.0
 */
abstract class Backend implements \JsonSerializable {
	use VisibilityTrait;
	use FrontendDefinitionTrait;
	use PriorityTrait;
	use DependencyTrait;
	use StorageModifierTrait;
	use IdentifierTrait;

	/** @var string storage class */
	private $storageClass;

	/** @var array 'scheme' => true, supported authentication schemes */
	private $authSchemes = [];

	/** @var AuthMechanism|callable authentication mechanism fallback */
	private $legacyAuthMechanism;

	/**
	 * @return string
	 * @since 10.0
	 */
	public function getStorageClass() {
		return $this->storageClass;
	}

	/**
	 * @param string $class
	 * @return self
	 * @since 10.0
	 */
	public function setStorageClass($class) {
		$this->storageClass = $class;
		return $this;
	}

	/**
	 * @return array
	 * @since 10.0
	 */
	public function getAuthSchemes() {
		if (empty($this->authSchemes)) {
			return [AuthMechanism::SCHEME_NULL => true];
		}
		return $this->authSchemes;
	}

	/**
	 * @param string $scheme
	 * @return self
	 * @since 10.0
	 */
	public function addAuthScheme($scheme) {
		$this->authSchemes[$scheme] = true;
		return $this;
	}

	/**
	 * Serialize into JSON for client-side JS
	 *
	 * @return array
	 * @since 10.0
	 */
	public function jsonSerialize() {
		$data = $this->jsonSerializeDefinition();
		$data += $this->jsonSerializeIdentifier();

		$data['backend'] = $data['name']; // legacy compat
		$data['priority'] = $this->getPriority();
		$data['authSchemes'] = $this->getAuthSchemes();

		return $data;
	}

	/**
	 * Check if parameters are satisfied in a IStorageConfig
	 *
	 * @param IStorageConfig $storage
	 * @return bool
	 * @since 10.0
	 */
	public function validateStorage(IStorageConfig $storage) {
		return $this->validateStorageDefinition($storage);
	}
}
