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

use Laravel\SerializableClosure\SerializableClosure;
use Laravel\SerializableClosure\UnsignedSerializableClosure;
use OC\BackgroundJob\QueuedJob;

class ClosureJob extends QueuedJob {
	/**
	 * List of classes that are permitted during unserialize().
	 * Restricting to these prevents PHP Object Injection via arbitrary
	 * gadget chains while still allowing SerializableClosure to reconstruct
	 * itself correctly.
	 */
	private const ALLOWED_CLASSES = [
		SerializableClosure::class,
		UnsignedSerializableClosure::class,
		\Laravel\SerializableClosure\Serializers\Native::class,
		\Laravel\SerializableClosure\Serializers\Signed::class,
		\Laravel\SerializableClosure\Support\ClosureScope::class,
		\Laravel\SerializableClosure\Support\SelfReference::class,
	];

	protected function run($serializedCallable) {
		$serializedClosure = \unserialize($serializedCallable, ['allowed_classes' => self::ALLOWED_CLASSES]);
		if (\method_exists($serializedClosure, 'getClosure')) {
			$callable = $serializedClosure->getClosure();
			if (\is_callable($callable)) {
				$callable();
				return;
			}
		}
		throw new \InvalidArgumentException('Invalid serialized callable');
	}
}
