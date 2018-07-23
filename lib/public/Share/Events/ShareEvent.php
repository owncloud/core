<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

namespace OCP\Share\Events;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class ShareEvent
 *
 * @package OCP\Share\Events
 * @since 10.0.2
 */
class ShareEvent extends Event {

	// TODO when the sharing code uses a Share entity use that instead of an array
	/** @var array */
	private $share;

	/**
	 * ShareEvent constructor.
	 *
	 * @param array $share
	 * @since 10.0.2
	 */
	public function __construct($share) {
		$this->share = $share;
	}

	/**
	 * @return array
	 * @since 10.0.2
	 */
	public function getShare() {
		return $this->share;
	}

	/**
	 * @return string url
	 * @since 10.0.2
	 */
	public function getRemote() {
		return $this->share['remote'];
	}

	/**
	 * @return int
	 * @since 10.0.2
	 */
	public function getRemoteId() {
		return (int)$this->share['remote_id'];
	}

	/**
	 * @return string
	 * @since 10.0.2
	 */
	public function getShareToken() {
		return $this->share['share_token'];
	}
}
