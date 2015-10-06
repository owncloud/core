<?php
/**
 * @author Joas Schilling <nickvergessen@owncloud.com>
 * @author Lukas Reschke <lukas@owncloud.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 * @author Tom Needham <tom@owncloud.com>
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

namespace OCA\Provisioning_API;

use \OC_OCS_Result;
use \OC_App;

class Apps {

	/** @var \OCP\App\IAppManager */
	private $appManager;

	/** @var  \OCA\user_ldap\User_Proxy|null */
	private $ldapBackend;

	/**
	 * @param \OCP\App\IAppManager $appManager
	 * @param \OCA\user_ldap\User_Proxy|null $ldapBackend
	 */
	public function __construct(\OCP\App\IAppManager $appManager,
								\OCA\user_ldap\User_Proxy $ldapBackend = null) {
		$this->appManager  = $appManager;
		$this->ldapBackend = $ldapBackend;
	}

	/**
	 * @param array $parameters
	 * @return OC_OCS_Result
	 */
	public function getApps($parameters) {
		$apps = OC_App::listAllApps();
		$list = [];
		foreach($apps as $app) {
			$list[] = $app['id'];
		}
		$filter = isset($_GET['filter']) ? $_GET['filter'] : false;
		if($filter){
			switch($filter){
				case 'enabled':
					return new OC_OCS_Result(array('apps' => \OC_App::getEnabledApps()));
					break;
				case 'disabled':
					$enabled = OC_App::getEnabledApps();
					return new OC_OCS_Result(array('apps' => array_diff($list, $enabled)));
					break;
				default:
					// Invalid filter variable
					return new OC_OCS_Result(null, 101);
					break;
			}

		} else {
			return new OC_OCS_Result(array('apps' => $list));
		}
	}

	/**
	 * @param array $parameters
	 * @return OC_OCS_Result
	 */
	public function getAppInfo($parameters) {
		$app = $parameters['appid'];
		$info = \OCP\App::getAppInfo($app);
		if(!is_null($info)) {
			return new OC_OCS_Result(OC_App::getAppInfo($app));
		} else {
			return new OC_OCS_Result(null, \OCP\API::RESPOND_NOT_FOUND, 'The request app was not found');
		}
	}

	/**
	 * @param array $parameters
	 * @return OC_OCS_Result
	 */
	public function enable($parameters) {
		$app = $parameters['appid'];
		$this->appManager->enableApp($app);
		return new OC_OCS_Result(null, 100);
	}

	/**
	 * @param array $parameters
	 * @return OC_OCS_Result
	 */
	public function disable($parameters) {
		$app = $parameters['appid'];
		$this->appManager->disableApp($app);
		return new OC_OCS_Result(null, 100);
	}

	/**
	 * resolves a provided LDAP login name to an ownCloud username that can be
	 * used with user-related API calls.
	 *
	 * @param array $parameters
	 * @return OC_OCS_Result
	 */
	public function resolveLDAPLoginName($parameters) {
		if(is_null($this->ldapBackend)) {
			return new OC_OCS_Result(null, \OCP\API::RESPOND_SERVER_ERROR, 'LDAP backend is not enabled');
		}
		$loginName = $parameters['loginname'];

		try {
			$userName = $this->ldapBackend->loginName2UserName($loginName);
			if($userName === false) {
				return new OC_OCS_Result(null, \OCP\API::RESPOND_NOT_FOUND, 'Could not resolve login name to user name');
			}
			return new OC_OCS_Result([$userName]);
		} catch(\Exception $e) {
			return new OC_OCS_Result(null, \OCP\API::RESPOND_SERVER_ERROR, $e->getMessage());
		}
	}

}
