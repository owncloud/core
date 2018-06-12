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

namespace OCP\Files\External\Auth;

use OC\Files\External\VisibilityTrait;
use OC\Files\External\IdentifierTrait;
use OC\Files\External\FrontendDefinitionTrait;
use OC\Files\External\StorageModifierTrait;
use OCP\Files\External\IStorageConfig;

/**
 * Authentication mechanism
 *
 * An authentication mechanism can have services injected during construction,
 * such as \OCP\IDB for database operations. This allows an authentication
 * mechanism to perform advanced operations based on provided information.
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
 *  - StorageModifierTrait
 *      Object can affect storage mounting
 *
 * @since 10.0
 */
abstract class AuthMechanism implements \JsonSerializable {

	/** Standard authentication schemes */
	const SCHEME_NULL = 'null';
	const SCHEME_BUILTIN = 'builtin';
	const SCHEME_PASSWORD = 'password';
	const SCHEME_OAUTH1 = 'oauth1';
	const SCHEME_OAUTH2 = 'oauth2';
	const SCHEME_PUBLICKEY = 'publickey';
	const SCHEME_OPENSTACK = 'openstack';

	use VisibilityTrait;
	use FrontendDefinitionTrait;
	use StorageModifierTrait;
	use IdentifierTrait;

	/** @var string */
	protected $scheme;

	/**
	 * Get the authentication scheme implemented
	 * See self::SCHEME_* constants
	 *
	 * @return string
	 * @since 10.0
	 */
	public function getScheme() {
		return $this->scheme;
	}

	/**
	 * @param string $scheme
	 * @return self
	 * @since 10.0
	 */
	public function setScheme($scheme) {
		$this->scheme = $scheme;
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

		$data['scheme'] = $this->getScheme();
		$data['visibility'] = $this->getVisibility();

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
		// does the backend actually support this scheme
		$supportedSchemes = $storage->getBackend()->getAuthSchemes();
		if (!isset($supportedSchemes[$this->getScheme()])) {
			return false;
		}

		return $this->validateStorageDefinition($storage);
	}
}
