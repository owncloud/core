<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
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

namespace OCA\Files_Sharing\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;
use OCP\IConfig;

class SettingsController extends Controller {
	/** @var IConfig */
	private $config;

	/**
	 * Set with the known configuration keys. Only these keys should be able to be set and retrieved
	 */
	private $knownKeys = [
		'blacklisted_group_displaynames' => true,
	];

	public function __construct(IConfig $config, IRequest $request) {
		parent::__construct('files_sharing', $request);
		$this->config = $config;
	}

	public function saveSettings() {
		// accessing to the parent request attribute (with protected visibility)
		$params = $this->request->getParams();
		$savedValues = [];
		foreach ($params as $key => $value) {
			if (isset($this->knownKeys[$key])) {
				$this->config->setAppValue('files_sharing', $key, $value);
			}
		}
		return new DataResponse(null, Http::STATUS_OK);
	}

	public function getSettings() {
		$result = [];
		foreach ($this->knownKeys as $key => $value) {
			$result[$key] = $this->config->getAppValue('files_sharing', $key, null);
		}
		return new DataResponse(['results' => $results], Http::STATUS_OK);
	}
}