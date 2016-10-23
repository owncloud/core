<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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
 * Interface for the class that manages loading and returning ISection and
 * IPanel objects, primarily for the settings UI.
 * @since 9.2
 */
interface ISettingsManager {

  /**
   * Retrieves sections for a personal
   * @since 9.2
   * @return array of OCP\Settings\ISection (sorted by priority)
   */
  public function getPersonalSections();

  /**
   * Retrieves sections for a admin
   * @since 9.2
   * @return array of OCP\Settings\ISection (sorted by priority)
   */
  public function getAdminSections();

  /**
   * Retrives all personal panels for a given section
   * @since 9.2
   * @param string $sectionID
   * @return array of IPanels (sorted by priority)
   */
  public function getPersonalPanels($sectionID);

  /**
   * Retrives all admin panels for a given section
   * @since 9.2
   * @param string $sectionID
   * @return array of IPanels (sorted by priority)
   */
  public function getAdminPanels($sectionID);

}
