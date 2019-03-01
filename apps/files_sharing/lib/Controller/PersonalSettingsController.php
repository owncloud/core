<?php

namespace OCA\Files_Sharing\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\IConfig;
use OCP\IRequest;
use OCP\IUserSession;

/**
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
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

class PersonalSettingsController extends Controller {
	const USERCONFIGS = [
		'auto_accept_share'
	];

	/** @var IConfig $config */
	private $config;

	/** @var IUserSession $userSession */
	private $userSession;

	public function __construct(string $appName, IRequest $request, IConfig $config, IUserSession $userSession) {
		parent::__construct($appName, $request);
		$this->config = $config;
		$this->userSession = $userSession;
	}

	/**
	 * @NoAdminRequired
	 *
	 * @return DataResponse
	 */
	public function setUserConfig() {
		$acceptedKeys = [];
		$rejectedKeys = [];

		$params = $this->getUserRequestParams();
		foreach ($params as $key => $value) {
			if ($this->validateParameter($key, $value)) {
				$this->config->setUserValue(
					$this->userSession->getUser()->getUID(),
					'files_sharing',
					$key,
					$value
				);
				$acceptedKeys[] = $key;
			} else {
				$rejectedKeys[] = $key;
			}
		}
		$status = Http::STATUS_OK;
		if (empty($acceptedKeys)) {
			$status = Http::STATUS_BAD_REQUEST;
		}
		return new DataResponse(
			['accepted' => $acceptedKeys, 'rejected' => $rejectedKeys],
			$status
		);
	}

	/**
	 * @param $key
	 * @param $value
	 * @return bool
	 */
	private function validateParameter($key, $value) {
		return \in_array($key, self::USERCONFIGS) && ($value === 'yes' || $value === 'no');
	}

	/**
	 * Exclude params starting with '_' from request parameters
	 *
	 * @return array
	 */
	private function getUserRequestParams() {
		return \array_filter($this->request->getParams(),
			function ($key) {
				return (\substr($key, 0, 1) !== '_');
			},
			ARRAY_FILTER_USE_KEY
		);
	}
}
