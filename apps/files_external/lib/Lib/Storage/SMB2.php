<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

namespace OCA\Files_External\Lib\Storage;

use OCA\Files_External\Lib\Cache\SmbCacheWrapper;

class SMB2 extends SMB {
	/**
	 * @var SMB
	 */
	private $userSpecificSmb;

	public function __construct($params) {
		$this->userSpecificSmb = new SMB($params);

		$params2 = $params;
		$params2['user'] = $params['service-account'];
		$params2['password'] = $params['service-account-password'];

		parent::__construct($params2);
	}

	public function getId(): string {
		return 'smb2::' . $this->server->getHost() . '//' . $this->share->getName() . '/' . $this->root;
	}

	public function getCache($path = '', $storage = null) {
		$parentCache = parent::getCache($path, $storage);
		return new SmbCacheWrapper($parentCache, $this->userSpecificSmb);
	}
}
