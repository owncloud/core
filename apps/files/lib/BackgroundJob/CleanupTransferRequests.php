<?php
/**
 * @author Tom Needham <tom@owncloud.com>
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

namespace OCA\Files\BackgroundJob;

use OC\BackgroundJob\TimedJob;
use OC\Lock\Persistent\LockMapper;
use OCA\Files\Service\TransferOwnership\TransferRequestMapper;

/**
 * Clean up transfer requests that are long since unaccepted
 */
class CleanupTransferRequests extends TimedJob {

	/**
	 * Default interval in minutes
	 *
	 * @var int $defaultIntervalMin
	 **/
	protected $defaultIntervalMin = 60;
	/** @var TransferRequestMapper */
	private $mapper;

	/**
	 * CleanupTransferRequests constructor.
	 *
	 * @param LockMapper $lockMapper
	 */
	public function __construct(TransferRequestMapper $mapper) {
		$this->interval = $this->defaultIntervalMin * 60;
		$this->mapper = $mapper;
	}

	/**
	 * @param $argument
	 */
	public function run($argument) {
		$this->mapper->cleanup();
	}
}
