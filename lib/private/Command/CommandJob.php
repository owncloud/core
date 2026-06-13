<?php
/**
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

namespace OC\Command;

use OC\BackgroundJob\QueuedJob;
use OCP\Command\ICommand;

/**
 * Wrap a command in the background job interface
 */
class CommandJob extends QueuedJob {
	protected function run($serializedCommand) {
		// First pass: deserialize without instantiating any objects so that no
		// __wakeup() / __destruct() magic methods are triggered on untrusted data.
		// This lets us safely extract the stored class name.
		$incomplete = \unserialize($serializedCommand, ['allowed_classes' => false]);

		// Retrieve the class name encoded in the serialized string.  When
		// allowed_classes is false PHP returns an __PHP_Incomplete_Class whose
		// ::class name is exposed via the "__PHP_Incomplete_Class_Name" property.
		if (!($incomplete instanceof \__PHP_Incomplete_Class)) {
			throw new \InvalidArgumentException('Invalid serialized command: expected a serialized object');
		}
		$classNameKey = '__PHP_Incomplete_Class_Name';
		$className = ((array) $incomplete)[$classNameKey] ?? null;
		if (!\is_string($className) || $className === '') {
			throw new \InvalidArgumentException('Invalid serialized command: could not determine class name');
		}

		// Verify that the stored class name is a known, loaded class that
		// actually implements ICommand before we allow it to be instantiated.
		if (!\class_exists($className) || !\is_a($className, ICommand::class, true)) {
			throw new \InvalidArgumentException(
				'Invalid serialized command: class "' . $className . '" does not implement ICommand'
			);
		}

		// Second pass: now safe to deserialize – only the verified class is
		// permitted, so no gadget chains from other classes can be triggered.
		$command = \unserialize($serializedCommand, ['allowed_classes' => [$className]]);
		if ($command instanceof ICommand) {
			$command->handle();
		} else {
			throw new \InvalidArgumentException('Invalid serialized command');
		}
	}
}
