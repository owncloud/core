<?php
/**
 * @copyright Copyright (c) 2023, ownCloud GmbH
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

namespace OC\Sync;

use OCP\Sync\ISyncManager;
use OCP\Sync\ISyncer;
use OCP\Sync\User\IUserSyncer;

class SyncManager implements ISyncManager {
	/** @var array */
	private $register = [];

	/**
	 * @inheritDoc
	 */
	public function registerSyncer(string $name, ISyncer $syncer): bool {
		if (isset($this->register[$name])) {
			return false;
		}
		$this->register[$name] = $syncer;
		return true;
	}

	/**
	 * {@inheritDoc}
	 *
	 * This method will return false if the name is NOT taken (and we can't
	 * overwrite it)
	 */
	public function overwriteSyncer(string $name, ISyncer $syncer): bool {
		if (isset($this->register[$name])) {
			$this->register[$name] = $syncer;
			return true;
		}
		return false;
	}

	/**
	 * @inheritDoc
	 */
	public function getSyncer(string $name): ?ISyncer {
		return $this->register[$name] ?? null;
	}

	/**
	 * @inheritDoc
	 */
	public function getUserSyncer(): ?IUserSyncer {
		$syncer = $this->register['user'] ?? null;
		if ($syncer !== null && $syncer instanceof IUserSyncer) {
			return $syncer;
		}
		return null;
	}
}
