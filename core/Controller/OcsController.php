<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OC\Core\Controller;

use OC\OCS\Result;
use OCP\IDBConnection;
use OCP\IRequest;
use OCP\IUserManager;
use OCP\IUserSession;

/**
 * This class encapsulates all legacy OCS endpoints moved from lib/private/OCS
 */
class OcsController extends \OCP\AppFramework\OCSController {
	public const SELECT_MULTIPLE_STMT = 'SELECT `key`, `app`, `value`  FROM `*PREFIX*privatedata` WHERE `user` = ? AND `app` = ? ';
	public const SELECT_SINGLE_STMT = 'SELECT `key`, `app`, `value`  FROM `*PREFIX*privatedata` WHERE `user` = ? AND `app` = ? AND `key` = ? ';
	public const DELETE_STMT = 'DELETE FROM `*PREFIX*privatedata`  WHERE `user` = ? AND `app` = ? AND `key` = ? ';

	/** @var IDBConnection */
	private $dbConnection;

	/** @var IUserSession */
	private $userSession;

	/** @var IUserManager */
	private $userManager;

	/**
	 * OccController constructor.
	 *
	 * @param string $appName
	 * @param IRequest $request
	 * @param IUserSession $userSession
	 */
	public function __construct($appName, IRequest $request,
								IDBConnection $dbConnection,
								IUserSession $userSession,
								IUserManager $userManager) {
		parent::__construct($appName, $request);
		$this->dbConnection = $dbConnection;
		$this->userSession = $userSession;
		$this->userManager = $userManager;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 * @return Result
	 */
	public function getConfig() {
		return new Result([
			'version' => '1.7',
			'website' => 'ownCloud',
			'host' => $this->request->getServerHost(),
			'contact' => '',
			'ssl' => 'false',
		]);
	}

	/**
	 * @NoAdminRequired
	 * @PublicPage
	 *
	 * @param string $login
	 * @param string $password
	 *
	 * @return Result
	 */
	public function checkPerson($login, $password) {
		if ($login && $password) {
			$user = $this->userManager->checkPassword($login, $password);
			if ($user !== false) {
				$xml = [];
				$xml['person']['personid'] = $user->getUID();
				return new Result($xml);
			} else {
				return new Result(null, 102);
			}
		} else {
			return new Result(null, 101);
		}
	}

	/**
	 * read keys
	 * test: curl http://login:passwd@oc/core/ocs/v1.php/privatedata/getattribute
	 *
	 * @NoAdminRequired
	 *
	 * @return Result
	 */
	public function getDefaultAttributes() {
		return $this->getAttribute('');
	}

	/**
	 * read keys
	 * test: curl http://login:passwd@oc/core/ocs/v1.php/privatedata/getattribute/testy
	 *
	 * @NoAdminRequired
	 *
	 * @param string $app
	 *
	 * @return Result
	 */
	public function getAppAttributes($app) {
		return $this->getAttribute($app);
	}

	/**
	 * read keys
	 * test: curl http://login:passwd@oc/core/ocs/v1.php/privatedata/getattribute/testy/123
	 *
	 * @NoAdminRequired
	 *
	 * @param string $app
	 * @param string|null $key
	 *
	 * @return Result
	 */
	public function getAttribute($app, $key = null) {
		$app = $this->escape($app);
		$user = $this->userSession->getUser()->getUID();

		if ($key === null) {
			$q = $this->dbConnection->prepare(self::SELECT_MULTIPLE_STMT);
			$result = $q->execute([$user, $app]);
		} else {
			$key = $this->escape($key);
			$q = $this->dbConnection->prepare(self::SELECT_SINGLE_STMT);
			$result = $q->execute([$user, $app, $key]);
		}

		$xml = [];
		if ($result === true) {
			while ($row = $q->fetch()) {
				$data= [];
				$data['key']=$row['key'];
				$data['app']=$row['app'];
				$data['value']=$row['value'];
				$xml[] = $data;
			}
		}

		return new Result($xml);
	}

	/**
	 * set a key
	 * test: curl http://login:passwd@oc/core/ocs/v1.php/privatedata/setattribute/testy/123  --data "value=foobar"
	 *
	 * @NoAdminRequired
	 *
	 * @param string $app
	 * @param string $key
	 *
	 * @return Result
	 */
	public function setAttribute($app, $key) {
		$app = $this->escape($app);
		$key = $this->escape($key);
		$user = $this->userSession->getUser()->getUID();
		$value = $this->request->getParam('value');

		$this->dbConnection->upsert(
			'*PREFIX*privatedata',
			[
				'value' => $value,
				'user' => $user,
				'app' => $app,
				'key' => $key
			],
			[
				'user',
				'app',
				'key'
			]
		);

		return new Result(null, 100);
	}

	/**
	 * delete a key
	 * test: curl http://login:passwd@oc/core/ocs/v1.php/privatedata/deleteattribute/testy/123 --data "post=1"
	 *
	 * @NoAdminRequired
	 *
	 * @param string $app
	 * @param string $key
	 *
	 * @return Result
	 */
	public function deleteAttribute($app, $key) {
		$app = $this->escape($app);
		$key = $this->escape($key);
		$user = $this->userSession->getUser()->getUID();

		// delete in DB
		$q = $this->dbConnection->prepare(self::DELETE_STMT);
		$q->execute([$user, $app, $key]);

		return new Result(null, 100);
	}

	/**
	 * @param string $value
	 * @return string
	 */
	private function escape($value) {
		return \addslashes(\strip_tags($value));
	}
}
