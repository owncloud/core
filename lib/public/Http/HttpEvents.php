<?php
/**
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
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

namespace OCP\Http;

use OCP\IRequest;
use Symfony\Component\EventDispatcher\Event;

/**
 * @since 10.0.3
 */
class HttpEvents extends Event {
	/** @var string */
	const EVENT_404 = 'resource.not_found';

	/** @var string */
	protected $event;
	/** @var IRequest */
	protected $request;

	/**
	 * @param string $event
	 * @param IRequest $request
	 * @since 10.0.3
	 */
	public function __construct($event, $request) {
		$this->event = $event;
		$this->request = $request;
	}

	/**
	 * @return string
	 * @since 10.0.3
	 */
	public function getEvent() {
		return $this->event;
	}

	/**
	 * @return IRequest
	 * @since 10.0.3
	 */
	public function getRequest() {
		return $this->request;
	}
}
