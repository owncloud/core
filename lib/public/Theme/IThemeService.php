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
 * @package OCP\Theme
 * @since 10.0.3
 */
interface IThemeService {

	/**
	 * Returns the currently active theme.
	 * @return ITheme
	 * @since 10.0.3
	 */
	public function getTheme();

	/**
	 * Sets an app as the active theme.
	 * @param string $themeName
	 * @since 10.0.3
	 */
	public function setAppTheme($themeName = '');

	/**
	 * Gets legacy and app themes as an array of ITheme's.
	 * @return ITheme[]
	 * @since 10.0.3
	 */
	public function getAllThemes();

	/**
	 * Returns an ITheme by its name, or false if there is no theme
	 * with that name.
	 * @param string $themeName
	 * @return ITheme|false
	 * @since 10.0.3
	 */
	public function findTheme($themeName);
}
