<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

namespace OCA\User_LDAP\Controller;

use OCA\User_LDAP\Connection;
use OCA\User_LDAP\Mapping\GroupMapping;
use OCA\User_LDAP\Mapping\UserMapping;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\IDBConnection;
use OCP\IL10N;
use OCP\IRequest;

/**
 * Class MappingController
 *
 * @package OCA\User_LDAP\Controller
 */
class MappingController extends Controller {

	/** @var IL10N */
	protected $l10n;

	/** @var IDBConnection | Connection */
	protected $connection;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param IL10N $l10n
	 * @param IDBConnection $connection
	 */
	public function __construct(
		$appName,
		IRequest $request,
		IL10N $l10n,
		IDBConnection $connection
	) {
		parent::__construct($appName, $request);
		$this->l10n = $l10n;
		$this->connection = $connection;
	}

	/**
	 * test the given ldap config
	 *
	 * @param string $ldap_clear_mapping subject, 'group' or 'user'
	 * @param string $ldap_serverconfig_chooser config id // FIXME remove in JS, is unneeded
	 * @return DataResponse
	 */
	public function clear($ldap_clear_mapping, $ldap_serverconfig_chooser = null) {
		$subject = $ldap_clear_mapping; // TODO if possible make JS send as 'subject' right away
		$mapping = null;
		if ($subject === 'user') {
			$mapping = new UserMapping($this->connection);
		} elseif ($subject === 'group') {
			$mapping = new GroupMapping($this->connection);
		}
		// TODO else return error 'unknown subject '
		try {
			if ($mapping === null || !$mapping->clear()) {
				throw new \Exception($this->l10n->t('Failed to clear the mappings.'));
			}
			return new DataResponse(['status' => 'success']);
		} catch (\Exception $e) {
			return new DataResponse([
				'status' => 'error',
				'message' => $e->getMessage()
			]);
		}
	}
}
