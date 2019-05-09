<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgeargroup.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

use OC\User\SyncService;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IRequest;
use OCP\IConfig;

class SyncController extends Controller {
	/** @var SyncService */
	private $syncService;
	/** @var IConfig */
	private $config;
	/** @var ITimeFactory */
	private $timeFactory;

	private $notificationTypes = [
		'soft',
		'hard',
	];

	public function __construct($appName, IRequest $request, SyncService $syncService, ITimeFactory $timeFactory, IConfig $config) {
		parent::__construct($appName, $request);
		$this->syncService = $syncService;
		$this->timeFactory = $timeFactory;
		$this->config = $config;
	}

	/**
	 * Get the information used by the SyncService
	 * For each known backend (some backends might not appear), it will show:
	 * - the applicable limits ('soft' and 'hard', or false if the limits are disabled)
	 * - the user state stats: state -> user count
	 * - the timestamp whether a particular notification has been read (or marked as read)
	 * This function will return a Json with the following structure:
	 * {
	 *   'myBackend': {
	 *     'limits': {
	 *       'soft': 50,
	 *       'hard': 100
	 *     },
	 *     'userStats': {
	 *       'Enabled': 178,
	 *       'Disabled': 4,
	 *       'Auto Disabled': 20
	 *     },
	 *     'warningRead': {
	 *       'soft': 15678956,
	 *       'hard': 0
	 *     }
	 *   },
	 *   'myOtherBackend': {
	 *     'limits': false,
	 *     'userStats': {
	 *       'Enabled': 43
	 *     },
	 *     'warningRead': {
	 *       'soft': 0,
	 *       'hard': 0,
	 *     }
	 *   },
	 * }
	 * @return JSONResponse
	 */
	public function getInfo() {
		$stats = $this->syncService->getLimitInfoStats();

		foreach ($stats as $backend => $backendStats) {
			unset($stats[$backend]['usersStatsCode']);  // hide internal codes

			// include information about when the notification has been read
			$stats[$backend]['warningRead'] = [];
			foreach ($this->notificationTypes as $notificationType) {
				$configKey = "sync_read_{$notificationType}_{$backend}";
				$timing = intval($this->config->getAppValue('core', $configKey, 0));
				$stats[$backend]['warningRead'][$notificationType] = $timing;
			}
		}

		return new JSONResponse($stats);
	}

	/**
	 * Mark the notification $type notification as read for the $backend.
	 * Known notification types are "soft" and "hard"
	 * @param string $backend the backend for the notification
	 * @param string $type the type of notification
	 * @return JSONResponse
	 */
	public function markNotificationAsRead($backend, $type) {
		if (!in_array($type, $this->notificationTypes, true)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}

		$configKey = "sync_read_{$type}_{$backend}";
		$timestamp = $this->timeFactory->getTime();
		$this->config->setAppValue('core', $configKey, $timestamp);
		return new JSONResponse($timestamp);
	}
}
