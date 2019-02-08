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

namespace OCA\DAV\Repair;

use OCA\DAV\Connector\Sabre\Principal;
use OCA\DAV\DAV\GroupPrincipalBackend;
use OCP\IDBConnection;
use OCP\ILogger;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;

/**
 * Class RemoveInvalidShares - removes shared calendars and addressbook which
 * have no matching principal. Happened because of a bug in the calendar app.
 *
 * @package OCA\DAV\Repair
 */
class RemoveInvalidShares implements IRepairStep {

	/** @var IDBConnection */
	private $connection;
	/** @var Principal */
	private $principalBackend;
	/** @var GroupPrincipalBackend */
	private $groupPrincipalBackend;

	/**
	 * RemoveInvalidShares constructor.
	 *
	 * @param IDBConnection $connection
	 * @param Principal $principalBackend
	 * @param GroupPrincipalBackend $groupPrincipalBackend
	 */
	public function __construct(IDBConnection $connection,
								Principal $principalBackend,
								GroupPrincipalBackend $groupPrincipalBackend) {
		$this->connection = $connection;
		$this->principalBackend = $principalBackend;
		$this->groupPrincipalBackend = $groupPrincipalBackend;
	}

	/**
	 * Returns the step's name
	 *
	 * @return string
	 * @since 9.1.0
	 */
	public function getName() {
		return 'Remove invalid calendar and addressbook shares';
	}

	/**
	 * Run repair step.
	 * Must throw exception on error.
	 *
	 * @param IOutput $output
	 * @throws \Exception in case of failure
	 * @since 9.1.0
	 */
	public function run(IOutput $output) {
		$query = $this->connection->getQueryBuilder();
		$result = $query->selectDistinct('principaluri')
			->from('dav_shares')
			->execute();

		while ($row = $result->fetch()) {
			$principaluri = $row['principaluri'];
			$p = $this->principalBackend->getPrincipalByPath($principaluri);
			if ($p === null) {
				$p = $this->groupPrincipalBackend->getPrincipalByPath($principaluri);
				if ($p === null) {
					$output->info(" ... for principal '$principaluri'");
					$this->deleteSharesForPrincipal($principaluri);
				}
			}
		}

		$result->closeCursor();
	}

	/**
	 * @param string $principaluri
	 */
	private function deleteSharesForPrincipal($principaluri) {
		$delete = $this->connection->getQueryBuilder();
		$delete->delete('dav_shares')
			->where($delete->expr()->eq('principaluri', $delete->createNamedParameter($principaluri)));
		$delete->execute();
	}
}
