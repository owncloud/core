<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace OCP\Events;

use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Trait EventEmitterTrait
 *
 * This trait helps developers to trigger before & after events
 * of actions to be sent as Symfony events.
 *
 * @package OCP\Events
 */
trait EventEmitterTrait {
	/**
	 * The function with accepts functions which needs before and/or after
	 * events to be triggered using Symfony dispatcher
	 *
	 * @param \Closure $fn
	 * @param $arguments
	 * @param $class
	 * @param $eventName
	 * @return mixed
	 * @since 10.0.5
	 */
	public function emittingCall(\Closure $fn, $arguments, $class, $eventName) {
		if (isset($arguments['before']) && \count($arguments['before']) > 0) {
			\OC::$server->getEventDispatcher()->dispatch("$class.before$eventName", new GenericEvent(null, $arguments['before']));
		}
		$result = isset($arguments['after']) ? $fn($arguments['after']) : $fn([]);
		if (($result !== false) && ($result !== null) &&
			(isset($arguments['after']) && \count($arguments['after']) > 0)) {
			\OC::$server->getEventDispatcher()->dispatch("$class.after$eventName", new GenericEvent(null, $arguments['after']));
		}
		return $result;
	}
}
