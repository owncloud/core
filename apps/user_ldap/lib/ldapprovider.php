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

use OCP\IUserBackend;
use OCP\LDAP\ILDAPProvider;
use OCP\IServerContainer;
use OCA\user_ldap\USER_LDAP;

/**
 * LDAP provider for pulic access to the LDAP backend.
 */
class LDAPProvider implements ILDAPProvider {

	private $backend;
	private $logger;
	
	/**
	 * Create new LDAPProvider
	 * @param \OCP\IServerContainer $serverContainer
	 * @throws \Exception if user_ldap app was not enabled
	 */
	public function __construct(IServerContainer $serverContainer) {
		$this->logger = $serverContainer->getLogger();
		foreach ($serverContainer->getUserManager()->getBackends() as $backend){
			$name = get_class($backend);
			$this->logger->debug('instance '.$name.' backend.', ['app' => 'user_ldap']);
			if ($backend instanceof IUserBackend && $backend->getBackendName() == USER_LDAP::BACKEND_NAME) {
				$this->backend = $backend;
				return;
			}
        }
		throw new \Exception('To use the LDAPProvider, user_ldap app must be enabled');
	}
	
	/**
	 * Translate an ownCloud user id to LDAP DN
	 * @param string $uid ownCloud user id
	 * @return string with the LDAP DN
	 * @throws \Exception if translation was unsuccessful
	 */
	public function getUserDN($uid) {
		if(!$this->backend->userExists($uid)){
			throw new \Exception('User id not found in LDAP');
		}
		$result = $this->backend->getLDAPAccess($uid)->username2dn($userName);
		if(!$result){
			throw new \Exception('Translation to LDAP DN unsuccessful');
		}
		return $result;
	}
	
	/**
	 * Convert a stored DN so it can be used as base parameter for LDAP queries.
	 * @param string $dn the DN in question
	 * @return string
	 */
	public function DNasBaseParameter($dn) {
		return Access::DNasBaseParameter($dn);
	}
	
	/**
	 * Sanitize a DN received from the LDAP server.
	 * @param array $dn the DN in question
	 * @return array the sanitized DN
	 */
	public function sanitizeDN($dn) {
		return Access::sanitizeDN($dn);
	}
	
	/**
	 * Return a new LDAP connection resource for the specified user. 
	 * This should only be called once and the connection resource should be reused thereafter.
	 * @param string $uid ownCloud user id
	 * @return resource of the LDAP connection
	 * @throws \Exception if user id was not found in LDAP
	 */
	public function getLDAPConnection($uid) {
		if(!$this->backend->userExists($uid)){
			throw new \Exception('User id not found in LDAP');
		}
		return $this->backend->getNewLDAPConnection($uid);
	}
}
