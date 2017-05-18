<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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


namespace OC\User;


use OCP\AppFramework\Db\Entity;
use OCP\AppFramework\QueryException;
use OCP\UserInterface;

/**
 * Class Account
 *
 * @method int getUserId()
 * @method string getDisplayName()
 * @method void setDisplayName(string $displayName)
 * @method string getEmail()
 * @method void setEmail(string $email)
 * @method int getLastLogin()
 * @method void setLastLogin(int $lastLogin)
 * @method string getBackend()
 * @method void setBackend(string $backEnd)
 * @method int getState()
 * @method void setState(integer $state)
 * @method string getQuota()
 * @method void setQuota(string $quota)
 * @method string getHome()
 * @method void setHome(string $home)
 * @method void setSearchAttributes(string $searchAttributes)
 * @method string getSearchAttributes()
 *
 * @package OC\User
 */
class Account extends Entity {

	const STATE_INITIAL = 0;
	const STATE_ENABLED = 1;
	const STATE_DISABLED = 2;
	const STATE_DELETED = 3;

	protected $email;
	protected $userId;
	protected $lowerUserId;
	protected $displayName;
	protected $quota;
	protected $lastLogin;
	protected $backend;
	protected $state;
	protected $home;
	protected $searchAttributes;

	public function __construct() {
		$this->addType('state', 'integer');
		$this->addType('lastLogin', 'integer');
	}

	public function setUserId($uid) {
		parent::setter('lowerUserId', [strtolower($uid)]);
		parent::setter('userId', [$uid]);
	}

	/**
	 * @return UserInterface
	 */
	public function getBackendInstance() {
		$backendClass = $this->getBackend();
		if (empty($backendClass)) {
			return null;
		}
		// actually stupid
		return \OC::$server->getUserManager()->getBackend($backendClass);
	}
}
