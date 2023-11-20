<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OC\Diagnostics;

use OCP\Diagnostics\IQuery;

class Query implements IQuery, \JsonSerializable {
	private string $sql;

	private array $params;

	private int $start;

	private int $end;

	/**
	 * @param string $sql
	 * @param array $params
	 * @param int $start
	 */
	public function __construct(string $sql, $params, $start) {
		$this->sql = $sql;
		$this->params = $params;
		$this->start = $start;
	}

	public function end($time) {
		$this->end = $time;
	}

	/**
	 * @return array
	 */
	public function getParams() {
		return $this->params;
	}

	/**
	 * @return string
	 */
	public function getSql() {
		return $this->sql;
	}

	/**
	 * @return float
	 */
	public function getStart() {
		return $this->start;
	}
	
	/**
	 * @return float
	 */
	public function getDuration() {
		return $this->end - $this->start;
	}

	public function getFullSql(): string {
		$s = preg_replace('/\s\s+/', ' ', $this->sql);
		foreach ($this->params as $i => $param) {
			$param = json_encode($param);
			# NOTE: this might not result in a perfect sql query because ? must not be a placeholder
			# nevertheless for analysis purpose this is a good enough approach
			$pos = strpos($s, '?');
			if ($pos !== false) {
				$s = substr_replace($s, $param, $pos, \strlen('?'));
			} else {
				$s = str_replace(":$i", $param, $s);
			}
		}

		return $s;
	}

	public function jsonSerialize() {
		return [
			'query' => $this->sql,
			'parameters' => $this->params,
			'duration' => $this->getDuration(),
			'start' => $this->start,
			'end' => $this->end,
		];
	}
}
