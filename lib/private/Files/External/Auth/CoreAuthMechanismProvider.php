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

namespace OC\Files\External\Auth;

use OC\ServerContainer;
use OCP\Files\External\Config\IAuthMechanismProvider;

/**
 * @package OC\Files\External
 */
class CoreAuthMechanismProvider implements IAuthMechanismProvider {

	/** @var ServerContainer */
	private $server;

	/** @var array class names */
	private $classNames;

	/**
	 * Constructs a new provider
	 *
	 * @param array array of auth mechanism class names to provide
	 */
	public function __construct(ServerContainer $server, array $classNames = []) {
		$this->server = $server;
		$this->classNames = $classNames;
	}

	/**
	 * @{inheritdoc}
	 */
	public function getAuthMechanisms() {
		return \array_map(function ($className) {
			return $this->server->query($className);
		}, $this->classNames);
	}
}
