<?php
/**
 * @author GitHubUser4234 <i_feel_happy@yahoo.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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

namespace OCA\user_ldap\lib;

use OCP\LDAP\ILDAPProvider;
use OCP\ILogger;
use OCP\IUserManager;

/**
 * LDAP provider for pulic access to the LDAP backend.
 */
class LDAPProvider implements ILDAPProvider {

	private $backend;
	private $logger;
	
	/**
	 * Create new LDAPProvider
	 * @param \OCP\IUserManager $userManager
	 * @param \OCP\ILogger $logger
	 */
	public function __construct(IUserManager $userManager, ILogger $logger) {
		$this->logger = $logger;
		foreach ($userManager->getBackends() as $backend){
			$name = get_class($backend);
			$this->logger->debug('instance '.$name.' backend.', ['app' => 'user_ldap']);
			if ($backend instanceof IUserBackend && $backend->getBackendName() == USER_LDAP::BACKEND_NAME) {
				$this->backend = $backend;
				break;
			}
        }
	}
	
	/**
	 * Translate an ownCloud username to LDAP DN
	 * @param string $uid
	 * @throws Exception
	 */
	public function getUserDN($uid) {
		return $this->backend->getLDAPAccess($uid)->username2dn($uid);
	}
	
	/**
	 * Return access for LDAP interaction for the specified user.
	 * @param string $uid
	 * @throws Exception
	 */
	public function getLDAPAccess($uid) {
		return $this->backend->getLDAPAccess($uid);
	}
}
