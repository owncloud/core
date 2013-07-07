<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2013 Michael Gapczynski mtgap@owncloud.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OC\Share;

/**
 * An alternative to ShareFactory that can reduce the number of queries to create a Share entity
 * Setups JOINs in the share queries to retrieve additional properties for the Share entity
 * The columns specified in getColumns() will be returned in the $row passed to mapToShare($row)
 */
abstract class AdvancedShareFactory extends ShareFactory {
	
	/**
	 * Get JOIN(s) to app table(s)
	 * @return string
	 * 
	 * Example: JOIN `*PREFIX*table1` ON `*PREFIX*share`.`item_source` = `*PREFIX*table1`.`id`
	 * 
	 */
	abstract public function getJoins();

	/**
	 * Get app table column(s)
	 * @return string
	 * 
	 * Example: `*PREFIX*table1`.`id`, `*PREFIX*table1`.`name`
	 * 
	 */
	abstract public function getColumns();
	
}