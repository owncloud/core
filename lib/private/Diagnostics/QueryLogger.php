<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Piotr Mrowczynski <piotr@owncloud.com>
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

use OCP\Diagnostics\IQueryLogger;
use function microtime;

class QueryLogger implements IQueryLogger {
	protected ?Query $activeQuery = null;

	/**
	 * @var Query[]
	 */
	protected array $queries = [];

	private bool $activated = false;

	# allows to overwrite the current timestamp for testing purpose
	private ?float $testNow;

	public function __construct(?float $testNow = null) {
		$this->testNow = $testNow;
	}

	/**
	 * @inheritdoc
	 */
	public function startQuery($sql, array $params = null, array $types = null) {
		if ($this->activated) {
			$this->activeQuery = new Query($sql, $params ?? [], $this->getMicrotime());
		}
	}

	/**
	 * @inheritdoc
	 */
	public function stopQuery() {
		if ($this->activated && $this->activeQuery) {
			$this->activeQuery->end($this->getMicrotime());
			$this->queries[] = $this->activeQuery;
			$this->activeQuery = null;
		}
	}

	/**
	 * @inheritdoc
	 */
	public function getQueries() {
		return $this->queries;
	}

	/**
	 * @inheritdoc
	 */
	public function activate() {
		$this->activated = true;
	}

	public function flush(): void {
		$this->queries = [];
	}

	private function getMicrotime(): float {
		if ($this->testNow) {
			return $this->testNow;
		}
		return microtime(true);
	}
}
