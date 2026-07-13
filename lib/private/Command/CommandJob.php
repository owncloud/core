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
		// allowed_classes => true: PHP's allowed_classes performs exact class-name
		// matching and does not resolve interface hierarchies. Passing ICommand::class
		// (an interface) would silently produce __PHP_Incomplete_Class for every real
		// payload. The existing instanceof check below still ensures only valid
		// ICommand objects are handled.
		$command = \unserialize($serializedCommand, ['allowed_classes' => true]);
		if ($command instanceof ICommand) {
			$command->handle();
		} else {
			throw new \InvalidArgumentException('Invalid serialized command');
		}
	}
}
