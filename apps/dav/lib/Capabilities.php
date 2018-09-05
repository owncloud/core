<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV;

use OCP\Capabilities\ICapability;
use OCP\IConfig;

class Capabilities implements ICapability {
	/** @var IConfig */
	private $config;

	/**
	 * Capabilities constructor.
	 *
	 * @param IConfig $config
	 */
	public function __construct(IConfig $config) {
		$this->config = $config;
	}

	public function getCapabilities() {
		$cap =  [
			'dav' => [
				'chunking' => '1.0',
				'reports' => [
					'search-files',
				]
			]
		];

		if ($this->config->getSystemValue('dav.enable.async', false)) {
			$cap['async'] = '1.0';
		}

		return $cap;
	}
}
