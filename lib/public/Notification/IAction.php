<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
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

namespace OCP\Notification;

/**
 * Interface IAction
 *
 * @package OCP\Notification
 * @since 9.0.0
 */
interface IAction {
	/**
	 * @param string $label
	 * @return $this
	 * @throws \InvalidArgumentException if the label is invalid
	 * @since 9.0.0
	 */
	public function setLabel($label);

	/**
	 * @return string
	 * @since 9.0.0
	 */
	public function getLabel();

	/**
	 * @param string $label
	 * @return $this
	 * @throws \InvalidArgumentException if the label is invalid
	 * @since 9.0.0
	 */
	public function setParsedLabel($label);

	/**
	 * @return string
	 * @since 9.0.0
	 */
	public function getParsedLabel();

	/**
	 * @param $primary bool
	 * @return $this
	 * @throws \InvalidArgumentException if $primary is invalid
	 * @since 9.0.0
	 */
	public function setPrimary($primary);

	/**
	 * @return bool
	 * @since 9.0.0
	 */
	public function isPrimary();

	/**
	 * Whenever a client want to execute this particular action, it should
	 * call the link set here with the same request type. Clients are
	 * expected to make a request to that endpoint, but not to open or
	 * redirect a browser there. The request might need to be authenticated
	 * somehow (via cookies, basic auth, oAuth token, etc)
	 *
	 * Clients are not expected to take further action UNLESS the response
	 * of the action is an OCS response with a "redirectTo" key in the data
	 * (ocs.data.redirectTo = <another-link>). In this case, clients are
	 * expected to open a browser or redirect it to the link specified
	 * in the "redirectTo" link
	 *
	 * @param string $link the endpoint where the client has to make the ajax
	 * (or similar) request
	 * @param string $requestType the request type (GET, POST, PUT, DELETE)
	 * @return $this
	 * @throws \InvalidArgumentException if the link is empty or above 255
	 * chars, or the request type isn't supported
	 * @since 9.0.0
	 */
	public function setLink($link, $requestType);

	/**
	 * @return string the link (request type not included) set via "setLink"
	 * or an empty string if a link hasn't been set
	 * @since 9.0.0
	 */
	public function getLink();

	/**
	 * @return string the request type set in "setLink" or an empty string if
	 * a link hasn't been set
	 * @since 9.0.0
	 */
	public function getRequestType();

	/**
	 * @return bool
	 * @since 9.0.0
	 */
	public function isValid();

	/**
	 * @return bool
	 * @since 9.0.0
	 */
	public function isValidParsed();
}
