<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

use OCP\Migration\IOutput;
use OCP\Util;

class SyncServiceCallback {

	/**
	 * @var IOutput
	 */
	private $output;

	/**
	 * @var int
	 */
	private $logLevel;

	/**
	 * @var int
	 */
	private $start;

	/**
	 * SyncServiceCallback constructor.
	 * TODO use ITimeFactory to test output when it provides microtime
	 *
	 * @param IOutput $output
	 * @param int $logLevel
	 */
	public function __construct(IOutput $output, $logLevel) {
		$this->output = $output;
		$this->logLevel = $logLevel;
	}

	/**
	 * @param string $uid
	 */
	public function startSync ($uid) {
		$this->start = microtime(true);
		$this->output->info("Syncing $uid: ", false);
	}

	/**
	 * @param BackendMismatchException $ex
	 */
	public function onBackendMismatchException(BackendMismatchException $ex) {
		$this->output->warning($ex->getMessage());
		$this->output->advance();
	}

	/**
	 * @param Account $account
	 */
	public function endCreated(Account $account) {
		$this->endSync($account, 'created');
	}

	/**
	 * @param Account $account
	 */
	public function endUpdated(Account $account) {
		$this->endSync($account, 'updated');
	}

	/**
	 * @param string $action
	 * @param Account $account
	 */
	private function endSync (Account $account, $action) {
		$delta = microtime(true)-$this->start;
		switch ($this->logLevel) {
			case Util::DEBUG:
				//$account = $this->mapper->getByUid($account->getUserId());
				$this->output->warning("$action with ".json_encode([
						'id' => $account->getId(),
						'backend' => $account->getBackend(),
						'userId' => $account->getUserId(),
						'displayName' => $account->getDisplayName(),
						'email' => $account->getEmail(),
						'home' => $account->getHome(),
						'lastLogin' => $account->getLastLogin(),
						'quota' => $account->getQuota(),
						'searchTerms' => $account->getSearchTerms()
					]). " in {$delta}s");
				break;
			case Util::INFO:
				$this->output->info("$action in {$delta}s");
				break;
			default:
				// call the callback
				$this->output->advance();
		}
	}

}