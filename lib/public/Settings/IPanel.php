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
 * Interface representing one small panel in the UI to hold settings for
 * various functionality within ownCloud. May be used by apps to register panes
 * in the personal and admin settings pages
 * @since 9.2
 */
interface IPanel {

  /**
   * The panel controller method that returns a template to the UI
   * @since 9.2
   * @return OCP\TemplateResponse
   */
  public function getTemplate();

  /**
   * A string to identify the section in the UI / HTML and URL
   * @since 9.2
   * @return string
   */
  public function getSectionID();

  /**
   * The name shown to the user in the UI
   * @since 9.2
   * @return string
   */
  public function getName();

  /**
   * The number used to order the section in the UI.
   * @since 9.2
   * @return int between 0 and 100, with 100 being the highest priority
   */
  public function getPriority();

}
