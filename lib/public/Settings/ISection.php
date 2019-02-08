<?php
/**
 * @author Tom Needham <tom@owncloud.com>
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

namespace OCP\Settings;

/*
 * Interface to register 'categories' for OCP\Settings\ISection objects within the UI.
 * @since 10.0
 */
interface ISection {

	/**
	 * A string used for section identification, eg: in HTML
	 * @since 10.0
	 * @return string
	 */
	public function getID();

	/**
	 * A string to be displayed to the user for the section
	 * @since 10.0
	 * @return string
	 */
	public function getName();

	/**
	 * @since 10.0
	 * @return int
	 */
	public function getPriority();

	/**
	 * @since 10.0
	 * @return string
	 */
	public function getIconName();
}
