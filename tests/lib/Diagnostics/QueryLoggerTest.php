<?php
/**
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

namespace Test\Diagnostics;

use OC\Diagnostics\QueryLogger;
use Test\TestCase;

class QueryLoggerTest extends TestCase {
	/** @var \OC\Diagnostics\QueryLogger */
	private $logger;

	public function setUp(): void {
		parent::setUp();

		$this->logger = new QueryLogger(2444666668888888);
	}

	public function testQueryLogger(): void {
		// Module is not activated and this should not be logged
		$this->logger->startQuery("SELECT", ["testuser", "count"], ["string", "int"]);
		$this->logger->stopQuery();
		$queries = $this->logger->getQueries();
		self::assertCount(0, $queries);

		// Activate module and log some query
		$this->logger->activate();
		$this->logger->startQuery("SELECT", ["testuser", "count"], ["string", "int"]);
		$this->logger->stopQuery();

		$queries = $this->logger->getQueries();
		self::assertCount(1, $queries);

		# assert json serialize
		self::assertEquals([
			'query' => 'SELECT',
			'parameters' => [
				'testuser',
				'count'
			],
			'duration' => 0,
			'start' => 2444666668888888,
			'end' => 2444666668888888
		], $queries[0]->jsonSerialize());
	}
}
