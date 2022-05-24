<?php
/**
 * @author Philipp Schaffrath <github@philipp.schaffrath.email>
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
 */
namespace OCP\Theme;

/**
 * The representation of a Theme.
 * @package OCP\Theme
 * @since 10.0.3
 */
interface ITheme {

	/**
	 * @return string
	 * @since 10.0.3
	 */
	public function getName();

	/**
	 * @return string
	 * @since 10.0.8
	 */
	public function getBaseDirectory();

	/**
	 * @return string
	 * @since 10.0.3
	 */
	public function getDirectory();

	/**
	 * @return string
	 * @since 10.0.3
	 */
	public function getWebPath();

	/**
	 * @param string $name
	 * @since 10.0.3
	 */
	public function setName($name);

	/**
	 * @param string $directory
	 * @since 10.0.3
	 */
	public function setDirectory($directory);

	/**
	 * @param string $webPath
	 * @since 10.0.3
	 */
	public function setWebPath($webPath);
}
