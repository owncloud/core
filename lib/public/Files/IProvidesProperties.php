<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
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

namespace OCP\Files;

/**
 * Interface IProvidesVersionTag
 * This interface provides version author retrieval for file version
 *
 * @package OCP\Files
 * @since 10.13.0
 */
interface IProvidesProperties {
	/**
	 * Returns the property value.
	 *
	 * @return string value of the property
	 * @since 10.13.0
	 */
	public function getProperty(string $name) : string;

	/**
	 * Returns the property value.
	 *
	 * @param string $name
	 * @param string $value
	 * @since 10.13.0
	 */
	public function setProperty(string $name, string $value) : void;
}
