<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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
namespace OCA\ConfigReport\Http;


use OCP\AppFramework\Http\DownloadResponse;

class ReportResponse extends DownloadResponse {

	/**
	 * @var array $data
	 */
	private $data;

	public function __construct(array $data) {
		parent::__construct('config_report_' . date('Ymd') . '.json', 'text/json');
		$this->data = $data;
	}

	public function render() {
		$settings = defined('JSON_PRETTY_PRINT') ? JSON_PRETTY_PRINT : 0;
		return json_encode($this->data, $settings);
	}
}