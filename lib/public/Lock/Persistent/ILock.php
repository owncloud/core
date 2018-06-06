<?php
declare(strict_types=1);
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
 */

namespace OCP\Lock\Persistent;

/**
 * Interface ILock
 *
 * @package OCP\Lock\Persistent
 * @since 11.0.0
 */
interface ILock {
	// these values are in sync with \Sabre\DAV\Locks\LockInfo
	public const LOCK_SCOPE_EXCLUSIVE = 1;
	public const LOCK_SCOPE_SHARED = 2;
	public const LOCK_DEPTH_INFINITE = -1;
}
