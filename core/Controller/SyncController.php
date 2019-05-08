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
use OCP\IRequest;
use OCP\IConfig;

class SyncController extends Controller {
	/** @var SyncService */
	private $syncService;
	/** @var IConfig */
	private $config;

	private $notificationTypes = [
		'soft',
		'hard',
	];

	public function __construct($appName, IRequest $request, SyncService $syncService, IConfig $config) {
		parent::__construct($appName, $request);
		$this->syncService = $syncService;
		$this->config = $config;
	}

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
	 * @param string $backend the backend for the notification
	 * @param string $type the type of notification
	 */
	public function markNotificationAsRead($backend, $type) {
		if (!in_array($type, $this->notificationTypes, true)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}

		$configKey = "sync_read_{$type}_{$backend}";
		$this->config->setAppValue('core', $configKey, \time());
		return new JSONResponse([]);
	}
}
